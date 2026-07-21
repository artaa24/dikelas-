<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
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
                return redirect('/courses')->with('error', 'Anda tidak terdaftar di kelas ini.');
            }
        } elseif ($user->role->name == 'teacher') {
            if ($classroom->teacher_id != $user->id) {
                return redirect('/guru/classes')->with('error', 'Anda tidak memiliki akses ke kelas ini.');
            }
        }

        // Ambil materi
        $materials = Material::where('classroom_id', $id)->orderBy('created_at', 'desc')->get();
        
        // Ambil tugas
        $assignments = \App\Models\Assignment::where('classroom_id', $id)->orderBy('deadline_at', 'asc')->get();

        // Ambil kuis
        $quizzes = \App\Models\Quiz::where('classroom_id', $id)->orderBy('created_at', 'desc')->get();

        return view('auth.class-detail', compact('classroom', 'materials', 'assignments', 'quizzes'));
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
            'file' => 'nullable|file|max:10240', // Max 10MB
            'link_url' => 'nullable|url|max:500'
        ]);

        if (!$request->hasFile('file') && empty($request->link_url)) {
            return back()->with('error', 'Anda harus mengunggah file atau memasukkan link URL.');
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            $fileSize = $file->getSize();
            $mimeType = $file->getMimeType();
            
            $extension = strtolower($file->getClientOriginalExtension());
            $fileType = 'document';
            if (in_array($extension, ['pdf'])) $fileType = 'pdf';
            elseif (in_array($extension, ['mp4', 'mkv', 'avi'])) $fileType = 'video';
            elseif (in_array($extension, ['ppt', 'pptx'])) $fileType = 'presentation';

            $filePath = $file->storeAs('materials/' . $classroom->id, time() . '_' . Str::slug($request->title) . '.' . $extension, 'public');
        } else {
            $filePath = $request->link_url;
            $fileName = 'Tautan Eksternal';
            $fileType = 'link';
            $fileSize = 0;
            $mimeType = 'text/uri-list';
        }

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

        return redirect()->route('classrooms.show', $id)->with('success', 'Materi berhasil ditambahkan!');
    }

    /**
     * Keluarkan murid dari kelas (Khusus Guru pemilik kelas).
     */
    public function removeStudent(Request $request, $classroomId, $studentId)
    {
        $classroom = Classroom::where('teacher_id', auth()->id())->findOrFail($classroomId);

        // Hapus relasi murid dari kelas
        DB::table('classroom_student')
            ->where('classroom_id', $classroomId)
            ->where('student_id', $studentId)
            ->delete();

        return redirect()->route('classrooms.show', $classroomId)->with('success', 'Murid berhasil dikeluarkan dari kelas.');
    }

    /**
     * Update pengaturan kelas (max students, is_active).
     */
    public function updateSettings(Request $request, $id)
    {
        $classroom = Classroom::where('teacher_id', auth()->id())->findOrFail($id);

        $request->validate([
            'max_students' => 'nullable|integer|min:1|max:999',
            'is_active' => 'required|boolean',
        ]);

        $classroom->update([
            'max_students' => $request->max_students,
            'is_active' => $request->is_active,
        ]);

        return redirect()->route('classrooms.show', $id)->with('success', 'Pengaturan kelas berhasil diperbarui.');
    }
}
