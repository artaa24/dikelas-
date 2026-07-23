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

        $quiz = Quiz::create([
            'classroom_id' => $classroom->id,
            'title' => $request->title,
            'description' => $request->description,
            'duration_minutes' => $request->duration_minutes,
            'max_score' => $request->max_score,
            'is_published' => true,
        ]);

        \App\Models\ActivityLog::log('create_quiz', 'Guru membuat kuis: ' . $quiz->title, $quiz);

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
            \App\Models\ActivityLog::log('add_question', 'Guru menambahkan soal ke kuis: ' . $quiz->title, $question);
            return back()->with('success', 'Soal berhasil ditambahkan!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal menambahkan soal: ' . $e->getMessage());
        }
    }

    /**
     * Import soal dari file PDF ke kuis (Guru).
     */
    public function importQuestions(Request $request, $quizId)
    {
        $quiz = Quiz::findOrFail($quizId);

        if (auth()->user()->id != $quiz->classroom->teacher_id) {
            return abort(403, 'Akses ditolak.');
        }

        $request->validate([
            'import_file' => 'required|file|mimes:pdf|max:5120',
        ]);

        $file = $request->file('import_file');

        try {
            $parser = new \Smalot\PdfParser\Parser();
            $pdf    = $parser->parseFile($file->getRealPath());
            $text = $pdf->getText();
            
            // Bersihkan teks: normalisasi enter
            $text = str_replace(["\r\n", "\r"], "\n", $text);
            
            $blocks = explode('Soal:', $text);
            array_shift($blocks); // Hapus bagian sebelum 'Soal:' pertama

            DB::beginTransaction();
            $imported = 0;
            
            foreach ($blocks as $block) {
                $block = trim($block);
                if (empty($block)) continue;
                
                $lines = explode("\n", $block);
                $questionContent = trim($lines[0]); // Baris pertama setelah 'Soal:' adalah pertanyaan
                $points = 10;
                $options = [];
                $answer = '';
                
                for ($i = 1; $i < count($lines); $i++) {
                    $line = trim($lines[$i]);
                    if (empty($line)) continue;
                    
                    if (stripos($line, 'Poin:') === 0) {
                        $points = (int) trim(substr($line, 5));
                    } elseif (preg_match('/^([A-D])\s*[:\.]\s*(.+)/i', $line, $matches)) {
                        $label = strtoupper($matches[1]);
                        $options[$label] = trim($matches[2]);
                    } elseif (stripos($line, 'Jawaban:') === 0) {
                        $answer = strtoupper(trim(substr($line, 8)));
                    }
                }
                
                if (empty($questionContent) || empty($options) || empty($answer)) {
                    continue; // Skip jika format tidak lengkap
                }
                
                $question = Question::create([
                    'quiz_id' => $quiz->id,
                    'type' => 'multiple_choice',
                    'content' => $questionContent,
                    'points' => $points,
                    'sort_order' => $quiz->questions()->count() + $imported,
                ]);

                $labels = ['A', 'B', 'C', 'D'];
                foreach ($labels as $label) {
                    if (isset($options[$label])) {
                        QuestionOption::create([
                            'question_id' => $question->id,
                            'label' => $label,
                            'content' => $options[$label],
                            'is_correct' => ($answer === $label),
                        ]);
                    }
                }
                
                $imported++;
            }

            DB::commit();
            \App\Models\ActivityLog::log('import_questions', 'Guru mengimport ' . $imported . ' soal ke kuis: ' . $quiz->title, $quiz);
            return back()->with('success', "$imported soal berhasil diimport dari PDF!");
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal mengimport soal: ' . $e->getMessage());
        }
    }

    /**
     * Export soal kuis ke JSON (untuk backup/sharing).
     */
    public function exportQuestions($quizId)
    {
        $quiz = Quiz::with('questions.options')->findOrFail($quizId);

        if (auth()->user()->id != $quiz->classroom->teacher_id) {
            return abort(403, 'Akses ditolak.');
        }

        $exportData = [];
        foreach ($quiz->questions as $question) {
            $options = [];
            $answer = '';
            foreach ($question->options as $option) {
                $options[$option->label] = $option->content;
                if ($option->is_correct) {
                    $answer = $option->label;
                }
            }

            $exportData[] = [
                'question' => $question->content,
                'points' => $question->points,
                'options' => $options,
                'answer' => $answer,
            ];
        }

        $fileName = 'quiz_' . \Illuminate\Support\Str::slug($quiz->title) . '_export.json';
        
        return response()->json($exportData)
            ->header('Content-Disposition', 'attachment; filename="' . $fileName . '"')
            ->header('Content-Type', 'application/json');
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

        \App\Models\ActivityLog::log('start_quiz', 'Murid mulai mengerjakan kuis: ' . $quiz->title, $attempt);

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

        \App\Models\ActivityLog::log('submit_quiz', 'Murid menyelesaikan kuis: ' . $attempt->quiz->title, $attempt);

        return redirect()->route('quizzes.show', $attempt->quiz_id)->with('success', 'Kuis berhasil diselesaikan!');
    }
}
