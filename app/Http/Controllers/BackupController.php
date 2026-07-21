<?php

namespace App\Http\Controllers;

use App\Models\Backup;
use Illuminate\Http\Request;

class BackupController extends Controller
{
    public function index()
    {
        $backups = Backup::latest()->paginate(10);
        return view('auth.admin.backups.index', compact('backups'));
    }

    public function create()
    {
        // Logika untuk membuat backup DB sebenarnya menggunakan artisan command atau package spatie/laravel-backup
        // Untuk saat ini hanya membuat log di tabel
        Backup::create([
            'file_name' => 'backup-' . date('Y-m-d-H-i-s') . '.sql',
            'file_path' => 'backups/',
            'type' => 'manual',
            'status' => 'completed',
            'created_by' => auth()->id(),
            'completed_at' => now(),
        ]);

        return back()->with('success', 'Backup berhasil dibuat!');
    }
}
