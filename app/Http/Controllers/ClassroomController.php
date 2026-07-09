<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ClassroomController extends Controller
{
    /**
     * Tampilkan detail kelas (Materi, Tugas, Anggota).
     */
    public function show($id)
    {
        $classroom = Classroom::with(['teacher', 'students'])->findOrFail($id);
        
        $user = auth()->user();

        // Validasi akses: Hanya Guru kelas ini atau Murid kelas ini yang bisa akses
        if ($user->role->name == 'student') {
            $isEnrolled = $classroom->students()->where('users.id', $user->id)->exists();
            if (!$isEnrolled) {
                return redirect()->route('courses')->with('error', 'Anda tidak terdaftar di kelas ini.');
            }
        } elseif ($user->role->name == 'teacher') {
            if ($classroom->teacher_id != $user->id) {
                return redirect()->route('guru.classes')->with('error', 'Anda tidak memiliki akses ke kelas ini.');
            }
        }

        // Ambil materi
        $materials = Material::where('classroom_id', $id)->orderBy('created_at', 'desc')->get();
        
        // Ambil tugas (segera di Fase 7, sementara kosongkan atau biarkan)
        $assignments = \App\Models\Assignment::where('classroom_id', $id)->orderBy('deadline_at', 'asc')->get();

        return view('auth.class-detail', compact('classroom', 'materials', 'assignments'));
    }

    /**
     * Menyimpan materi baru (Khusus Guru).
     */
    public function storeMaterial(Request $request, $id)
    {
        $classroom = Classroom::findOrFail($id);

        if (auth()->user()->id != $classroom->teacher_id) {
            return abort(403, 'Akses ditolak.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'required|file|max:10240', // Max 10MB
        ]);

        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $fileSize = $file->getSize();
        $mimeType = $file->getMimeType();
        
        // Ekstrak tipe dasar (pdf, video, document, dll)
        $extension = strtolower($file->getClientOriginalExtension());
        $fileType = 'document';
        if (in_array($extension, ['pdf'])) $fileType = 'pdf';
        elseif (in_array($extension, ['mp4', 'mkv', 'avi'])) $fileType = 'video';
        elseif (in_array($extension, ['ppt', 'pptx'])) $fileType = 'presentation';

        // Simpan file ke folder storage/app/public/materials
        $filePath = $file->storeAs('materials/' . $classroom->id, time() . '_' . Str::slug($request->title) . '.' . $extension, 'public');

        Material::create([
            'classroom_id' => $classroom->id,
            'title' => $request->title,
            'description' => $request->description,
            'file_path' => $filePath,
            'file_name' => $fileName,
            'file_type' => $fileType,
            'file_size' => $fileSize,
            'mime_type' => $mimeType,
        ]);

        return redirect()->route('classrooms.show', $id)->with('success', 'Materi berhasil diunggah!');
    }
}
