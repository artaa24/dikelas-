<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Classroom;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class CertificateController extends Controller
{
    /**
     * Tampilkan daftar sertifikat milik murid yang sedang login.
     */
    public function index()
    {
        $student = auth()->user();
        $certificates = Certificate::with(['classroom.teacher', 'issuer'])
            ->where('student_id', $student->id)
            ->orderBy('issued_at', 'desc')
            ->get();

        return view('auth.certificates', compact('certificates'));
    }

    /**
     * Tampilkan halaman manajemen sertifikat untuk guru (per kelas).
     */
    public function manage($classroomId)
    {
        $classroom = Classroom::with(['students', 'certificates.student'])
            ->where('teacher_id', auth()->id())
            ->findOrFail($classroomId);

        // Ambil murid yang sudah punya sertifikat
        $certifiedStudentIds = $classroom->certificates->pluck('student_id')->toArray();

        // Hitung rata-rata nilai per murid
        $studentScores = [];
        foreach ($classroom->students as $student) {
            // Rata-rata dari submissions
            $submissionAvg = DB::table('submissions')
                ->join('assignments', 'submissions.assignment_id', '=', 'assignments.id')
                ->where('assignments.classroom_id', $classroomId)
                ->where('submissions.student_id', $student->id)
                ->whereNotNull('submissions.score')
                ->avg('submissions.score');

            // Rata-rata dari quiz attempts
            $quizAvg = DB::table('quiz_attempts')
                ->join('quizzes', 'quiz_attempts.quiz_id', '=', 'quizzes.id')
                ->where('quizzes.classroom_id', $classroomId)
                ->where('quiz_attempts.student_id', $student->id)
                ->where('quiz_attempts.status', 'completed')
                ->avg('quiz_attempts.total_score');

            $scores = array_filter([$submissionAvg, $quizAvg]);
            $studentScores[$student->id] = count($scores) > 0 ? round(array_sum($scores) / count($scores), 1) : null;
        }

        return view('auth.guru.certificates', compact('classroom', 'certifiedStudentIds', 'studentScores'));
    }

    /**
     * Terbitkan sertifikat untuk murid.
     */
    public function issue(Request $request, $classroomId)
    {
        $classroom = Classroom::where('teacher_id', auth()->id())->findOrFail($classroomId);

        $request->validate([
            'student_ids' => 'required|array|min:1',
            'student_ids.*' => 'exists:users,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|in:completion,achievement,participation',
        ]);

        $issued = 0;
        foreach ($request->student_ids as $studentId) {
            // Cek apakah murid terdaftar di kelas ini
            $isEnrolled = $classroom->students()->where('users.id', $studentId)->exists();
            if (!$isEnrolled) continue;

            // Cek apakah sudah punya sertifikat
            $exists = Certificate::where('student_id', $studentId)
                ->where('classroom_id', $classroomId)
                ->exists();
            if ($exists) continue;

            // Hitung skor akhir
            $submissionAvg = DB::table('submissions')
                ->join('assignments', 'submissions.assignment_id', '=', 'assignments.id')
                ->where('assignments.classroom_id', $classroomId)
                ->where('submissions.student_id', $studentId)
                ->whereNotNull('submissions.score')
                ->avg('submissions.score');

            $quizAvg = DB::table('quiz_attempts')
                ->join('quizzes', 'quiz_attempts.quiz_id', '=', 'quizzes.id')
                ->where('quizzes.classroom_id', $classroomId)
                ->where('quiz_attempts.student_id', $studentId)
                ->where('quiz_attempts.status', 'completed')
                ->avg('quiz_attempts.total_score');

            $scores = array_filter([$submissionAvg, $quizAvg]);
            $finalScore = count($scores) > 0 ? round(array_sum($scores) / count($scores), 1) : null;

            Certificate::create([
                'student_id' => $studentId,
                'classroom_id' => $classroomId,
                'issued_by' => auth()->id(),
                'certificate_number' => Certificate::generateNumber(),
                'title' => $request->title,
                'description' => $request->description,
                'type' => $request->type,
                'final_score' => $finalScore,
                'issued_at' => now(),
            ]);

            $issued++;
        }

        return redirect()->back()->with('success', "$issued sertifikat berhasil diterbitkan!");
    }

    /**
     * Download sertifikat sebagai PDF.
     */
    public function download($id)
    {
        $certificate = Certificate::with(['student', 'classroom.teacher', 'issuer'])->findOrFail($id);

        // Pastikan hanya pemilik sertifikat, guru penerbit, atau admin yang bisa download
        $user = auth()->user();
        if ($user->id !== $certificate->student_id &&
            $user->id !== $certificate->issued_by &&
            !$user->isAdmin()) {
            return abort(403, 'Akses ditolak.');
        }

        $pdf = Pdf::loadView('pdf.certificate', compact('certificate'));
        $pdf->setPaper('A4', 'landscape');

        return $pdf->download('Sertifikat_' . \Illuminate\Support\Str::slug($certificate->title) . '_' . $certificate->certificate_number . '.pdf');
    }

    /**
     * Preview sertifikat di browser.
     */
    public function preview($id)
    {
        $certificate = Certificate::with(['student', 'classroom.teacher', 'issuer'])->findOrFail($id);

        $user = auth()->user();
        if ($user->id !== $certificate->student_id &&
            $user->id !== $certificate->issued_by &&
            !$user->isAdmin()) {
            return abort(403, 'Akses ditolak.');
        }

        $pdf = Pdf::loadView('pdf.certificate', compact('certificate'));
        $pdf->setPaper('A4', 'landscape');

        return $pdf->stream();
    }
}
