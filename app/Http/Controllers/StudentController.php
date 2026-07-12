<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Tampilkan dashboard Murid.
     */
    public function dashboard()
    {
        $student = auth()->user();
        
        // Ambil kelas yang diikuti oleh murid ini (diurutkan berdasarkan waktu bergabung)
        $classrooms = DB::table('classrooms')
            ->join('classroom_student', 'classrooms.id', '=', 'classroom_student.classroom_id')
            ->where('classroom_student.student_id', $student->id)
            ->select('classrooms.*')
            ->get();
            
        $totalClasses = $classrooms->count();
        
        $classroomIds = $classrooms->pluck('id');
        
        // Tugas aktif = tugas dari kelas murid ini, yang belum dilewati deadlinenya, dan belum disubmit (atau biarkan semua yang belum disubmit).
        $activeAssignments = \App\Models\Assignment::whereIn('classroom_id', $classroomIds)
            ->whereNotIn('id', function($query) use ($student) {
                $query->select('assignment_id')
                      ->from('submissions')
                      ->where('student_id', $student->id);
            })
            ->count();
            
        $submissions = \App\Models\Submission::where('student_id', $student->id)
            ->whereNotNull('score')
            ->get();
            
        $completedAssignments = $submissions->count();
        $averageScore = $completedAssignments > 0 ? number_format($submissions->avg('score'), 1) : "0";

        // Get upcoming assignments for right sidebar
        $upcomingAssignments = \App\Models\Assignment::with('classroom')
            ->whereIn('classroom_id', $classroomIds)
            ->whereNotIn('id', function($query) use ($student) {
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
        
        // Ambil kelas yang diikuti beserta data gurunya dan jumlah materi/tugas
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
        
        // Cari kelas berdasarkan kode yang diinput
        $classroom = Classroom::where('code', strtoupper($request->class_code))->first();

        if (!$classroom) {
            return back()->withErrors(['class_code' => 'Kode kelas tidak ditemukan. Silakan periksa kembali.']);
        }

        // Cek apakah murid sudah terdaftar di kelas ini
        $alreadyJoined = DB::table('classroom_student')
            ->where('classroom_id', $classroom->id)
            ->where('student_id', $student->id)
            ->exists();

        if ($alreadyJoined) {
            return back()->withErrors(['class_code' => 'Anda sudah terdaftar di kelas ini.']);
        }

        // Daftarkan murid ke kelas
        DB::table('classroom_student')->insert([
            'classroom_id' => $classroom->id,
            'student_id' => $student->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/courses')->with('success', 'Berhasil bergabung dengan kelas ' . $classroom->name . '!');
    }

    /**
     * Tampilkan daftar tugas untuk Murid
     */
    public function assignments()
    {
        $student = auth()->user();
        
        // Ambil kelas yang diikuti
        $classroomIds = DB::table('classroom_student')
            ->where('student_id', $student->id)
            ->pluck('classroom_id');
            
        // Ambil semua tugas dari kelas-kelas tersebut
        $assignments = \App\Models\Assignment::with(['classroom', 'submissions' => function($query) use ($student) {
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
        
        $classroomIds = DB::table('classroom_student')
            ->where('student_id', $student->id)
            ->pluck('classroom_id');
            
        $assignments = \App\Models\Assignment::with('classroom')
            ->whereIn('classroom_id', $classroomIds)
            ->where('deadline_at', '>', now())
            ->orderBy('deadline_at', 'asc')
            ->get();
            
        $quizzes = \App\Models\Quiz::with('classroom')
            ->whereIn('classroom_id', $classroomIds)
            ->where('created_at', '>', now()->subDays(30)) // just show recent or upcoming
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
        
        $submissions = \App\Models\Submission::with(['assignment.classroom'])
            ->where('student_id', $student->id)
            ->whereNotNull('score')
            ->orderBy('updated_at', 'desc')
            ->get();
            
        return view('auth.grades', compact('submissions'));
    }
}
