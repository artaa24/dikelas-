<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Submission;
use App\Models\QuizAttempt;
use App\Models\Assignment;
use App\Models\Quiz;
use App\Http\Controllers\Traits\AuthorizesClassroomAccess;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    use AuthorizesClassroomAccess;

    /**
     * Rekap nilai seluruh murid di kelas ini.
     */
    public function index($classroomId)
    {
        $classroom = Classroom::with('students')->findOrFail($classroomId);
        $this->ensureClassroomAccess($classroom);

        if (auth()->user()->isStudent()) {
            return redirect()->route('grades.index');
        }

        $students = $classroom->students;

        // Ambil semua tugas di kelas ini
        $assignments = Assignment::where('classroom_id', $classroomId)
            ->orderBy('deadline_at', 'asc')
            ->get();

        // Ambil semua kuis di kelas ini
        $quizzes = Quiz::where('classroom_id', $classroomId)
            ->orderBy('created_at', 'asc')
            ->get();

        // Ambil semua submission (nilai tugas) untuk kelas ini
        $submissions = Submission::whereIn('assignment_id', $assignments->pluck('id'))
            ->whereNotNull('score')
            ->get()
            ->keyBy(fn($s) => $s->student_id . '_' . $s->assignment_id);

        // Ambil semua attempt (nilai kuis) untuk kelas ini
        $attempts = QuizAttempt::whereHas('quiz', fn($q) => $q->where('classroom_id', $classroomId))
            ->where('status', 'completed')
            ->whereNotNull('total_score')
            ->get()
            ->keyBy(fn($a) => $a->student_id . '_' . $a->quiz_id);

        // Bangun data rekap per murid
        $recap = [];
        foreach ($students as $student) {
            $totalScore = 0;
            $totalMaxScore = 0;
            $grades = [];

            // Nilai tugas
            foreach ($assignments as $assignment) {
                $key = $student->id . '_' . $assignment->id;
                $submission = $submissions->get($key);
                $score = $submission?->score;
                $maxScore = $assignment->max_score ?? 100;

                $grades[] = [
                    'type' => 'Tugas',
                    'name' => $assignment->title,
                    'score' => $score,
                    'max_score' => $maxScore,
                    'graded_at' => $submission?->graded_at,
                    'status' => $submission ? ($submission->status === 'graded' ? 'Dinilai' : 'Dikumpulkan') : 'Belum',
                ];

                if ($score !== null) {
                    $totalScore += $score;
                    $totalMaxScore += $maxScore;
                }
            }

            // Nilai kuis
            foreach ($quizzes as $quiz) {
                $key = $student->id . '_' . $quiz->id;
                $attempt = $attempts->get($key);
                $score = $attempt?->total_score;
                $maxScore = $quiz->max_score ?? 100;

                $grades[] = [
                    'type' => 'Kuis',
                    'name' => $quiz->title,
                    'score' => $score,
                    'max_score' => $maxScore,
                    'graded_at' => $attempt?->finished_at,
                    'status' => $attempt ? ($attempt->status === 'completed' ? 'Selesai' : 'Berlangsung') : 'Belum',
                ];

                if ($score !== null) {
                    $totalScore += $score;
                    $totalMaxScore += $maxScore;
                }
            }

            $average = $totalMaxScore > 0 ? round($totalScore / $totalMaxScore * 100, 1) : null;

            $recap[] = [
                'student' => $student,
                'grades' => $grades,
                'total_score' => $totalScore,
                'total_max_score' => $totalMaxScore,
                'average' => $average,
            ];
        }

        return view('auth.grades.index', compact('classroom', 'recap', 'assignments', 'quizzes'));
    }

    /**
     * Detail nilai seorang murid di kelas tertentu.
     */
    public function studentGrades($classroomId, $studentId)
    {
        $classroom = Classroom::findOrFail($classroomId);
        $this->ensureClassroomAccess($classroom);

        // Submissions (nilai tugas)
        $submissions = Submission::whereHas('assignment', fn($q) => $q->where('classroom_id', $classroomId))
            ->where('student_id', $studentId)
            ->with('assignment')
            ->orderBy('created_at', 'desc')
            ->get();

        // Quiz attempts (nilai kuis)
        $attempts = QuizAttempt::whereHas('quiz', fn($q) => $q->where('classroom_id', $classroomId))
            ->where('student_id', $studentId)
            ->where('status', 'completed')
            ->with('quiz')
            ->orderBy('finished_at', 'desc')
            ->get();

        // Gabungkan jadi satu collection untuk view
        $grades = collect();

        foreach ($submissions as $sub) {
            $grades->push((object)[
                'type' => 'Tugas',
                'name' => $sub->assignment->title ?? 'Tugas',
                'score' => $sub->score,
                'max_score' => $sub->assignment->max_score ?? 100,
                'graded_at' => $sub->graded_at,
                'feedback' => $sub->feedback,
                'status' => $sub->status,
            ]);
        }

        foreach ($attempts as $attempt) {
            $grades->push((object)[
                'type' => 'Kuis',
                'name' => $attempt->quiz->title ?? 'Kuis',
                'score' => $attempt->total_score,
                'max_score' => $attempt->quiz->max_score ?? 100,
                'graded_at' => $attempt->finished_at,
                'feedback' => null,
                'status' => $attempt->status,
            ]);
        }

        $grades = $grades->sortByDesc('graded_at')->values();

        return view('auth.grades.student', compact('classroom', 'grades'));
    }
}
