<?php

namespace App\Http\Controllers;

use App\Models\Backup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class BackupController extends Controller
{
    public function index()
    {
        $backups = Backup::latest()->paginate(10);
        return view('auth.admin.backups.index', compact('backups'));
    }

    public function create()
    {
        $fileName = 'backup-' . date('Y-m-d-H-i-s') . '.sql';
        $backupDir = storage_path('app/backups');
        $filePath = $backupDir . '/' . $fileName;

        // Buat direktori backup jika belum ada
        if (!File::exists($backupDir)) {
            File::makeDirectory($backupDir, 0755, true);
        }

        $record = Backup::create([
            'file_name' => $fileName,
            'file_path' => 'backups/' . $fileName,
            'type' => 'manual',
            'status' => 'pending',
            'created_by' => auth()->id(),
        ]);

        try {
            $this->dumpDatabase($filePath);
            $fileSize = File::size($filePath);

            $record->update([
                'status' => 'completed',
                'file_size' => $fileSize,
                'completed_at' => now(),
            ]);

            \App\Models\ActivityLog::log('backup_create', 'Admin membuat backup database: ' . $fileName, $record);

            return back()->with('success', 'Backup berhasil dibuat! File: ' . $fileName);
        } catch (\Exception $e) {
            $record->update(['status' => 'failed']);

            return back()->with('error', 'Gagal membuat backup: ' . $e->getMessage());
        }
    }

    public function download($id)
    {
        $backup = Backup::findOrFail($id);
        $filePath = storage_path('app/' . $backup->file_path);

        if (!File::exists($filePath)) {
            abort(404, 'File backup tidak ditemukan.');
        }

        return response()->download($filePath, $backup->file_name);
    }

    /**
     * Dump database menggunakan mysqldump.
     */
    private function dumpDatabase(string $filePath): void
    {
        $host = config('database.connections.mysql.host', '127.0.0.1');
        $port = config('database.connections.mysql.port', '3306');
        $database = config('database.connections.mysql.database');
        $username = config('database.connections.mysql.username');
        $password = config('database.connections.mysql.password');

        // Cari mysqldump di XAMPP
        $mysqldumpPaths = [
            'C:\\xampp\\mysql\\bin\\mysqldump.exe',
            'C:\\Program Files\\MySQL\\MySQL Server 8.0\\bin\\mysqldump.exe',
            'mysqldump',
        ];

        $mysqldump = null;
        foreach ($mysqldumpPaths as $path) {
            if (File::exists($path)) {
                $mysqldump = $path;
                break;
            }
        }

        if (!$mysqldump) {
            throw new \Exception('mysqldump tidak ditemukan. Pastikan MySQL terinstal.');
        }

        $escapedPassword = escapeshellarg($password);
        $cmd = sprintf(
            '"%s" --host=%s --port=%s --user=%s --password=%s --routines --triggers --single-transaction "%s" > "%s" 2>&1',
            $mysqldump,
            escapeshellarg($host),
            escapeshellarg($port),
            escapeshellarg($username),
            $escapedPassword,
            escapeshellarg($database),
            escapeshellarg($filePath)
        );

        exec($cmd, $output, $returnCode);

        if ($returnCode !== 0) {
            throw new \Exception('mysqldump gagal: ' . implode("\n", $output));
        }

        if (!File::exists($filePath) || File::size($filePath) === 0) {
            throw new \Exception('File backup kosong atau tidak berhasil dibuat.');
        }
    }
}
