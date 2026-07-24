<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Classroom;
use App\Models\Submission;
use App\Http\Controllers\Traits\AuthorizesClassroomAccess;
use App\Http\Requests\StoreAssignmentRequest;
use App\Http\Requests\GradeSubmissionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AssignmentController extends Controller
{
    use AuthorizesClassroomAccess;

    /**
     * Membuat tugas baru (Guru)
     */
    public function store(StoreAssignmentRequest $request, $classroomId)
    {
        $classroom = Classroom::findOrFail($classroomId);
        $this->ensureClassroomOwner($classroom);

        $validated = $request->validated();

        $assignment = Assignment::create([
            'classroom_id' => $classroom->id,
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'deadline_at' => $validated['deadline_at'],
            'max_score' => $validated['max_score'],
            'is_published' => true,
        ]);

        \App\Models\ActivityLog::log('create_assignment', 'Guru membuat tugas: ' . $assignment->title, $assignment);

        return redirect()->route('classrooms.show', $classroom->id)->with('success', 'Tugas berhasil dibuat!');
    }

    /**
     * Menampilkan detail tugas
     */
    public function show($id)
    {
        $assignment = Assignment::with(['classroom', 'classroom.teacher'])->findOrFail($id);
        $user = auth()->user();

        $this->ensureClassroomAccess($assignment->classroom);

        if ($user->isStudent()) {
            $submission = Submission::where('assignment_id', $assignment->id)
                                    ->where('student_id', $user->id)
                                    ->first();
            
            return view('auth.assignment-detail', compact('assignment', 'submission'));
        } elseif ($user->isTeacher()) {
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
            'file' => 'required|file|max:10240|mimes:pdf,doc,docx,ppt,pptx,xls,xlsx,jpg,jpeg,png,zip,rar,txt',
        ]);

        $file = $request->file('file');
        $extension = strtolower($file->getClientOriginalExtension());
        $filePath = $file->storeAs('submissions/' . $assignment->id, time() . '_' . $user->id . '.' . $extension, 'public');

        // Cek jika telat
        $status = now()->gt($assignment->deadline_at) ? 'late' : 'submitted';

        $submission = Submission::updateOrCreate(
            ['assignment_id' => $assignment->id, 'student_id' => $user->id],
            [
                'file_path' => $filePath,
                'file_name' => $file->getClientOriginalName(),
                'file_size' => $file->getSize(),
                'status' => $status,
                'submitted_at' => now(),
            ]
        );

        \App\Models\ActivityLog::log('submit_assignment', 'Murid mengumpulkan tugas: ' . $assignment->title, $submission);

        return redirect()->route('assignments.show', $assignment->id)->with('success', 'Tugas berhasil diserahkan!');
    }

    /**
     * Menilai jawaban tugas (Guru)
     */
    public function grade(GradeSubmissionRequest $request, $submissionId)
    {
        $submission = Submission::with('assignment.classroom')->findOrFail($submissionId);
        
        $user = auth()->user();
        if ($submission->assignment->classroom->teacher_id !== $user->id) {
            abort(403, 'Anda tidak berhak menilai submission dari kelas lain.');
        }

        $validated = $request->validated();

        $submission->update([
            'score' => $validated['score'],
            'feedback' => $validated['feedback'] ?? null,
            'status' => 'graded',
            'graded_at' => now(),
        ]);

        \App\Models\ActivityLog::log('grade_assignment', 'Guru menilai tugas untuk submission ID: ' . $submission->id, $submission);

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

        if (!Storage::disk('public')->exists($submission->file_path)) {
            abort(404, 'File tidak ditemukan di server.');
        }

        return Storage::disk('public')->download(
            $submission->file_path,
            $submission->file_name
        );
    }
}
