<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Question;
use App\Models\QuestionOption;
use App\Models\Quiz;
use App\Models\QuizAttempt;
use App\Models\QuizAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
    /**
     * Membuat kuis baru (Guru).
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
            'duration_minutes' => 'required|integer|min:1',
            'max_score' => 'required|integer|min:1',
        ]);

        Quiz::create([
            'classroom_id' => $classroom->id,
            'title' => $request->title,
            'description' => $request->description,
            'duration_minutes' => $request->duration_minutes,
            'max_score' => $request->max_score,
            'is_published' => true,
        ]);

        return redirect()->route('classrooms.show', $classroom->id)->with('success', 'Kuis berhasil dibuat!');
    }

    /**
     * Tampilkan detail kuis untuk Guru (manajemen soal).
     */
    public function showTeacher($id)
    {
        $quiz = Quiz::with(['questions.options', 'attempts.student'])->findOrFail($id);
        
        if (auth()->user()->id != $quiz->classroom->teacher_id) {
            return abort(403, 'Akses ditolak.');
        }

        return view('auth.guru.quiz-detail', compact('quiz'));
    }

    /**
     * Menambahkan pertanyaan ke kuis (Guru).
     */
    public function storeQuestion(Request $request, $quizId)
    {
        $quiz = Quiz::findOrFail($quizId);

        if (auth()->user()->id != $quiz->classroom->teacher_id) {
            return abort(403, 'Akses ditolak.');
        }

        $request->validate([
            'type' => 'required|in:multiple_choice',
            'content' => 'required|string',
            'points' => 'required|integer|min:1',
        ]);

        DB::beginTransaction();
        try {
            $question = Question::create([
                'quiz_id' => $quiz->id,
                'type' => $request->type,
                'content' => $request->content,
                'points' => $request->points,
            ]);

            if ($request->type == 'multiple_choice') {
                $labels = ['A', 'B', 'C', 'D'];
                foreach ($labels as $index => $label) {
                    QuestionOption::create([
                        'question_id' => $question->id,
                        'label' => $label,
                        'content' => $request->input('option_' . strtolower($label)),
                        'is_correct' => ($request->correct_option == $label),
                    ]);
                }
            }

            DB::commit();
            return back()->with('success', 'Soal berhasil ditambahkan!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal menambahkan soal: ' . $e->getMessage());
        }
    }

    /**
     * Tampilkan detail kuis untuk Murid.
     */
    public function show($id)
    {
        $quiz = Quiz::with('classroom')->findOrFail($id);
        $user = auth()->user();

        // Cek apakah murid terdaftar di kelas ini
        $isEnrolled = DB::table('classroom_student')
            ->where('classroom_id', $quiz->classroom_id)
            ->where('student_id', $user->id)
            ->exists();

        if (!$isEnrolled) {
            return redirect()->route('courses')->with('error', 'Akses ditolak.');
        }

        // Cek attempt
        $attempt = QuizAttempt::where('quiz_id', $quiz->id)
            ->where('student_id', $user->id)
            ->first();

        // Jika sedang mengerjakan, redirect ke attempt page
        if ($attempt && $attempt->status == 'in_progress') {
            return view('auth.quiz-attempt', compact('quiz', 'attempt'));
        }

        return view('auth.quiz-detail', compact('quiz', 'attempt'));
    }

    /**
     * Mulai mengerjakan kuis.
     */
    public function startAttempt($quizId)
    {
        $quiz = Quiz::findOrFail($quizId);
        $user = auth()->user();

        // Pastikan kuis memiliki soal
        if ($quiz->questions()->count() === 0) {
            return redirect()->route('quizzes.show', $quiz->id)->with('error', 'Kuis ini belum memiliki soal.');
        }

        // Pastikan belum ada attempt
        $attempt = QuizAttempt::where('quiz_id', $quiz->id)->where('student_id', $user->id)->first();
        if ($attempt) {
            return redirect()->route('quizzes.show', $quiz->id)->with('error', 'Anda sudah mengerjakan kuis ini.');
        }

        $attempt = QuizAttempt::create([
            'quiz_id' => $quiz->id,
            'student_id' => $user->id,
            'started_at' => now(),
            'status' => 'in_progress'
        ]);

        return redirect()->route('quizzes.show', $quiz->id);
    }

    /**
     * Submit kuis.
     */
    public function submitAttempt(Request $request, $attemptId)
    {
        $attempt = QuizAttempt::with('quiz.questions.options')->findOrFail($attemptId);
        
        if ($attempt->student_id != auth()->user()->id || $attempt->status != 'in_progress') {
            return abort(403);
        }

        $totalScore = 0;
        $maxQuizScore = $attempt->quiz->max_score;
        $totalPoints = $attempt->quiz->questions->sum('points');
        if ($totalPoints == 0) $totalPoints = 1; // Prevent division by zero

        foreach ($attempt->quiz->questions as $question) {
            $answer = $request->input('q_' . $question->id);
            $isCorrect = false;
            $score = 0;

            $option = $question->options->where('id', $answer)->first();
            if ($option && $option->is_correct) {
                $isCorrect = true;
                $score = $question->points;
            }

            QuizAnswer::create([
                'attempt_id' => $attempt->id,
                'question_id' => $question->id,
                'answer' => $answer,
                'is_correct' => $isCorrect,
                'score' => $score,
            ]);

            $totalScore += $score;
        }

        // Kalkulasi skor proporsional ke max_score
        $finalScore = ($totalScore / $totalPoints) * $maxQuizScore;

        $attempt->update([
            'finished_at' => now(),
            'total_score' => $finalScore,
            'status' => 'completed'
        ]);

        return redirect()->route('quizzes.show', $attempt->quiz_id)->with('success', 'Kuis berhasil diselesaikan!');
    }
}
