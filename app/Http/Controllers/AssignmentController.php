<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Classroom;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AssignmentController extends Controller
{
    /**
     * Membuat tugas baru (Guru)
     */
    public function store(Request $request, $classroomId)
    {
        $classroom = Classroom::findOrFail($classroomId);

        if (auth()->user()->id != $classroom->teacher_id) {
            return abort(403, 'Akses ditolak.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'deadline_at' => 'required|date',
            'max_score' => 'required|integer|min:0|max:100',
        ]);

        Assignment::create([
            'classroom_id' => $classroom->id,
            'title' => $request->title,
            'description' => $request->description,
            'deadline_at' => $request->deadline_at,
            'max_score' => $request->max_score,
            'is_published' => true,
        ]);

        return redirect()->route('classrooms.show', $classroom->id)->with('success', 'Tugas berhasil dibuat!');
    }

    /**
     * Menampilkan detail tugas
     */
    public function show($id)
    {
        $assignment = Assignment::with(['classroom', 'classroom.teacher'])->findOrFail($id);
        $user = auth()->user();

        // Validasi akses
        if ($user->role->name == 'student') {
            $isEnrolled = $assignment->classroom->students()->where('users.id', $user->id)->exists();
            if (!$isEnrolled) {
                return redirect()->route('courses')->with('error', 'Akses ditolak.');
            }
            
            // Ambil submission milik murid ini
            $submission = Submission::where('assignment_id', $assignment->id)
                                    ->where('student_id', $user->id)
                                    ->first();
            
            return view('auth.assignment-detail', compact('assignment', 'submission'));
        } elseif ($user->role->name == 'teacher') {
            if ($assignment->classroom->teacher_id != $user->id) {
                return redirect()->route('guru.classes')->with('error', 'Akses ditolak.');
            }
            
            // Ambil semua submissions dari murid-murid di kelas ini
            $submissions = Submission::with('student')
                                     ->where('assignment_id', $assignment->id)
                                     ->get();
                                     
            $students = $assignment->classroom->students;

            return view('auth.assignment-detail', compact('assignment', 'submissions', 'students'));
        }
    }

    /**
     * Mengirim jawaban tugas (Murid)
     */
    public function submit(Request $request, $id)
    {
        $assignment = Assignment::findOrFail($id);
        $user = auth()->user();

        $request->validate([
            'file' => 'required|file|max:10240', // Max 10MB
        ]);

        $file = $request->file('file');
        $extension = strtolower($file->getClientOriginalExtension());
        $filePath = $file->storeAs('submissions/' . $assignment->id, time() . '_' . $user->id . '.' . $extension, 'public');

        // Cek jika telat
        $status = now()->gt($assignment->deadline_at) ? 'late' : 'submitted';

        Submission::updateOrCreate(
            ['assignment_id' => $assignment->id, 'student_id' => $user->id],
            [
                'file_path' => $filePath,
                'file_name' => $file->getClientOriginalName(),
                'file_size' => $file->getSize(),
                'status' => $status,
                'submitted_at' => now(),
            ]
        );

        return redirect()->route('assignments.show', $assignment->id)->with('success', 'Tugas berhasil diserahkan!');
    }

    /**
     * Menilai jawaban tugas (Guru)
     */
    public function grade(Request $request, $submissionId)
    {
        $submission = Submission::findOrFail($submissionId);
        
        // Validasi guru (diabaikan sementara asumsi route dilindungi middleware role:teacher)

        $request->validate([
            'score' => 'required|numeric|min:0|max:100',
            'feedback' => 'nullable|string',
        ]);

        $submission->update([
            'score' => $request->score,
            'feedback' => $request->feedback,
            'status' => 'graded',
            'graded_at' => now(),
        ]);

        return redirect()->route('assignments.show', $submission->assignment_id)->with('success', 'Nilai berhasil disimpan!');
    }

    /**
     * Unduh file tugas (Guru/Murid terkait)
     */
    public function download($submissionId)
    {
        $submission = Submission::findOrFail($submissionId);
        $user = auth()->user();
        
        // Cek izin: Hanya murid yang mengumpulkan ATAU guru kelas yang bisa unduh
        $isTeacher = $submission->assignment->classroom->teacher_id == $user->id;
        $isOwner = $submission->student_id == $user->id;
        
        if (!$isTeacher && !$isOwner) {
            abort(403, 'Anda tidak memiliki akses ke file ini.');
        }

        if (!\Illuminate\Support\Facades\Storage::disk('public')->exists($submission->file_path)) {
            abort(404, 'File tidak ditemukan di server.');
        }

        return \Illuminate\Support\Facades\Storage::disk('public')->download(
            $submission->file_path,
            $submission->file_name
        );
    }
}
