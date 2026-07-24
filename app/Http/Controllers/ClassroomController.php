<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Material;
use App\Http\Controllers\Traits\AuthorizesClassroomAccess;
use App\Http\Requests\StoreMaterialRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ClassroomController extends Controller
{
    use AuthorizesClassroomAccess;

    /**
     * Tampilkan detail kelas (Materi, Tugas, Anggota).
     */
    public function show($id)
    {
        $classroom = Classroom::with(['teacher', 'students'])->findOrFail($id);

        $this->ensureClassroomAccess($classroom);

        $materials = Material::where('classroom_id', $id)->orderBy('created_at', 'desc')->get();
        $assignments = \App\Models\Assignment::where('classroom_id', $id)->orderBy('deadline_at', 'asc')->get();
        $quizzes = \App\Models\Quiz::where('classroom_id', $id)->orderBy('created_at', 'desc')->get();

        return view('auth.class-detail', compact('classroom', 'materials', 'assignments', 'quizzes'));
    }

    /**
     * Menyimpan materi baru (Khusus Guru).
     */
    public function storeMaterial(StoreMaterialRequest $request, $id)
    {
        $classroom = Classroom::findOrFail($id);
        $this->ensureClassroomOwner($classroom);

        $validated = $request->validated();

        if (!$request->hasFile('file') && empty($validated['link_url'])) {
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

            $filePath = $file->storeAs('materials/' . $classroom->id, time() . '_' . Str::slug($validated['title']) . '.' . $extension, 'public');
        } else {
            $filePath = $validated['link_url'];
            $fileName = 'Tautan Eksternal';
            $fileType = 'link';
            $fileSize = 0;
            $mimeType = 'text/uri-list';
        }

        Material::create([
            'classroom_id' => $classroom->id,
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
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
        $classroom = Classroom::findOrFail($classroomId);
        $this->ensureClassroomOwner($classroom);

        // Hapus relasi murid dari kelas
        $classroom->students()->detach($studentId);

        return redirect()->route('classrooms.show', $classroomId)->with('success', 'Murid berhasil dikeluarkan dari kelas.');
    }

    /**
     * Update pengaturan kelas (max students, is_active).
     */
    public function updateSettings(Request $request, $id)
    {
        $classroom = Classroom::findOrFail($id);
        $this->ensureClassroomOwner($classroom);

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
