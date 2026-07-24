<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Tampilkan dashboard Murid.
     */
    public function dashboard()
    {
        $student = auth()->user();

        // Ambil kelas yang diikuti oleh murid ini
        $classrooms = Classroom::whereHas('students', function ($query) use ($student) {
            $query->where('student_id', $student->id);
        })->get();

        $totalClasses = $classrooms->count();
        $classroomIds = $classrooms->pluck('id');

        // Tugas aktif (belum disubmit)
        $activeAssignments = \App\Models\Assignment::whereIn('classroom_id', $classroomIds)
            ->whereNotIn('id', function ($query) use ($student) {
                $query->select('assignment_id')
                      ->from('submissions')
                      ->where('student_id', $student->id);
            })
            ->count();

        // Kuis aktif (belum dikerjakan)
        $activeQuizzes = \App\Models\Quiz::whereIn('classroom_id', $classroomIds)
            ->whereNotIn('id', function ($query) use ($student) {
                $query->select('quiz_id')
                      ->from('quiz_attempts')
                      ->where('student_id', $student->id)
                      ->where('status', 'completed');
            })
            ->count();

        $activeAssignments = $activeAssignments + $activeQuizzes;

        // Tugas yang sudah selesai
        $submissions = \App\Models\Submission::where('student_id', $student->id)
            ->whereNotNull('score')
            ->get();

        $completedQuizzes = \App\Models\QuizAttempt::where('student_id', $student->id)
            ->where('status', 'completed')
            ->whereNotNull('total_score')
            ->get();

        $completedAssignments = $submissions->count() + $completedQuizzes->count();

        $totalScore = $submissions->sum('score') + $completedQuizzes->sum('total_score');
        $averageScore = $completedAssignments > 0 ? number_format($totalScore / $completedAssignments, 1) : "0";

        // Tugas yang akan datang
        $upcomingAssignments = \App\Models\Assignment::with('classroom')
            ->whereIn('classroom_id', $classroomIds)
            ->whereNotIn('id', function ($query) use ($student) {
                $query->select('assignment_id')
                    ->from('submissions')
                    ->where('student_id', $student->id);
            })
            ->orderBy('deadline_at', 'asc')
            ->limit(4)
            ->get();

        return view('auth.dashboard', compact('totalClasses', 'activeAssignments', 'averageScore', 'classrooms', 'upcomingAssignments', 'completedAssignments'));
    }

    /**
     * Tampilkan daftar Kursus (Kelas yang diikuti).
     */
    public function courses()
    {
        $student = auth()->user();

        $classrooms = Classroom::whereHas('students', function ($query) use ($student) {
            $query->where('student_id', $student->id);
        })->with('teacher')->withCount(['materials', 'assignments'])->get();

        return view('auth.courses', compact('classrooms'));
    }

    /**
     * Proses Bergabung ke Kelas.
     */
    public function joinClass(Request $request)
    {
        $request->validate([
            'class_code' => 'required|string',
        ]);

        $student = auth()->user();

        $classroom = Classroom::where('code', strtoupper($request->class_code))->first();

        if (!$classroom) {
            return back()->withErrors(['class_code' => 'Kode kelas tidak ditemukan. Silakan periksa kembali.']);
        }

        if (!$classroom->is_active) {
            return back()->withErrors(['class_code' => 'Kelas ini sedang tidak menerima murid baru.']);
        }

        if ($classroom->isFull()) {
            return back()->withErrors(['class_code' => 'Kelas ini sudah penuh (batas: ' . $classroom->max_students . ' murid).']);
        }

        if ($classroom->students()->where('users.id', $student->id)->exists()) {
            return back()->withErrors(['class_code' => 'Anda sudah terdaftar di kelas ini.']);
        }

        $classroom->students()->attach($student->id, [
            'joined_at' => now(),
        ]);

        \App\Models\ActivityLog::log('join_class', 'Murid bergabung dengan kelas: ' . $classroom->name, $classroom);

        return redirect('/courses')->with('success', 'Berhasil bergabung dengan kelas ' . $classroom->name . '!');
    }

    /**
     * Tampilkan daftar tugas untuk Murid
     */
    public function assignments()
    {
        $student = auth()->user();

        $classroomIds = $student->classrooms()->pluck('classrooms.id');

        $assignments = \App\Models\Assignment::with(['classroom', 'submissions' => function ($query) use ($student) {
                $query->where('student_id', $student->id);
            }])
            ->whereIn('classroom_id', $classroomIds)
            ->orderBy('deadline_at', 'asc')
            ->get();

        return view('auth.assignments', compact('assignments'));
    }

    /**
     * Tampilkan jadwal akademik (Tugas & Kuis yang akan datang).
     */
    public function schedule()
    {
        $student = auth()->user();

        $classroomIds = $student->classrooms()->pluck('classrooms.id');

        $assignments = \App\Models\Assignment::with('classroom')
            ->whereIn('classroom_id', $classroomIds)
            ->where('deadline_at', '>', now())
            ->orderBy('deadline_at', 'asc')
            ->get();

        $quizzes = \App\Models\Quiz::with('classroom')
            ->whereIn('classroom_id', $classroomIds)
            ->where('created_at', '>', now()->subDays(30))
            ->orderBy('created_at', 'desc')
            ->get();

        return view('auth.schedule', compact('assignments', 'quizzes'));
    }

    /**
     * Tampilkan halaman nilai untuk Murid
     */
    public function grades()
    {
        $student = auth()->user();

        // Nilai tugas
        $submissions = \App\Models\Submission::with(['assignment.classroom'])
            ->where('student_id', $student->id)
            ->whereNotNull('score')
            ->orderBy('updated_at', 'desc')
            ->get()
            ->map(fn($s) => (object)[
                'type' => 'Tugas',
                'name' => $s->assignment->title ?? 'Tugas',
                'classroom_name' => $s->assignment->classroom->name ?? '-',
                'submitted_at' => $s->submitted_at,
                'graded_at' => $s->updated_at,
                'score' => $s->score,
                'max_score' => $s->assignment->max_score ?? 100,
                'feedback' => $s->feedback,
            ]);

        // Nilai kuis
        $quizAttempts = \App\Models\QuizAttempt::with(['quiz.classroom'])
            ->where('student_id', $student->id)
            ->where('status', 'completed')
            ->whereNotNull('total_score')
            ->orderBy('finished_at', 'desc')
            ->get()
            ->map(fn($a) => (object)[
                'type' => 'Kuis',
                'name' => $a->quiz->title ?? 'Kuis',
                'classroom_name' => $a->quiz->classroom->name ?? '-',
                'submitted_at' => $a->finished_at,
                'graded_at' => $a->finished_at,
                'score' => $a->total_score,
                'max_score' => $a->quiz->max_score ?? 100,
                'feedback' => null,
            ]);

        $allGrades = $submissions->concat($quizAttempts)->sortByDesc('graded_at')->values();

        return view('auth.grades', compact('allGrades'));
    }
}
