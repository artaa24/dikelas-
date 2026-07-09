<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TeacherController extends Controller
{
    /**
     * Tampilkan dashboard Guru.
     */
    public function dashboard()
    {
        $teacher = auth()->user();
        
        // Total Kelas yang diajar
        $totalClasses = Classroom::where('teacher_id', $teacher->id)->count();
        
        // Total Murid di semua kelasnya
        // Karena relasi murid ada di tabel classroom_student, kita bisa hitung via relasi
        // (Untuk MVP ini kita hitung kasar dari kelas yang ada, atau kita ambil count dari query)
        $totalStudents = \DB::table('classroom_student')
            ->join('classrooms', 'classroom_student.classroom_id', '=', 'classrooms.id')
            ->where('classrooms.teacher_id', $teacher->id)
            ->count();
            
        // Total Materi dari semua kelas guru ini
        $classroomIds = Classroom::where('teacher_id', $teacher->id)->pluck('id');
        $totalMaterials = \App\Models\Material::whereIn('classroom_id', $classroomIds)->count();
        
        // Tugas yang perlu dinilai (submission yang belum dinilai)
        $assignmentIds = \App\Models\Assignment::whereIn('classroom_id', $classroomIds)->pluck('id');
        $pendingGrades = \App\Models\Submission::whereIn('assignment_id', $assignmentIds)
            ->where('status', 'submitted')
            ->count();

        return view('auth.guru.dashboard', compact('totalClasses', 'totalStudents', 'totalMaterials', 'pendingGrades'));
    }

    /**
     * Tampilkan daftar Kelas Guru.
     */
    public function classes()
    {
        $teacher = auth()->user();
        $classrooms = Classroom::withCount('students')->where('teacher_id', $teacher->id)->orderBy('created_at', 'desc')->get();
        
        return view('auth.guru.classes', compact('classrooms'));
    }

    /**
     * Proses pembuatan Kelas Baru.
     */
    public function storeClass(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'subject_id' => 'nullable|exists:subjects,id', // Optional untuk MVP
            'description' => 'nullable|string',
        ]);

        // Generate unique class code
        $code = strtoupper(Str::random(6));
        
        // Pastikan ada dummy data agar tidak kena foreign key constraint
        $subject = \App\Models\Subject::firstOrCreate(
            ['id' => 1],
            ['name' => 'Mata Pelajaran Umum', 'code' => 'UMUM']
        );

        $academicYear = \App\Models\AcademicYear::firstOrCreate(
            ['id' => 1],
            ['name' => '2026/2027', 'start_date' => '2026-07-01', 'end_date' => '2027-06-30', 'is_active' => true]
        );

        $semester = \App\Models\Semester::firstOrCreate(
            ['id' => 1],
            [
                'name' => 'Semester Ganjil 2026/2027', 
                'academic_year_id' => $academicYear->id, 
                'type' => 'odd',
                'start_date' => '2026-07-01',
                'end_date' => '2026-12-31',
                'is_active' => true
            ]
        );

        Classroom::create([
            'teacher_id' => auth()->id(),
            'subject_id' => $request->subject_id ?? $subject->id,
            'semester_id' => $semester->id,
            'name' => $request->name,
            'code' => $code,
            'description' => $request->description,
            'cover_image' => null,
            'is_active' => true,
        ]);

        return redirect('/guru/classes')->with('success', 'Kelas baru berhasil dibuat!');
    }

    /**
     * Tampilkan daftar tugas untuk Guru
     */
    public function assignments()
    {
        $teacher = auth()->user();
        
        $classroomIds = Classroom::where('teacher_id', $teacher->id)->pluck('id');
        
        $assignments = \App\Models\Assignment::with(['classroom.students', 'submissions'])
            ->whereIn('classroom_id', $classroomIds)
            ->orderBy('deadline_at', 'desc')
            ->get();
            
        return view('auth.guru.assignments', compact('assignments'));
    }
}
