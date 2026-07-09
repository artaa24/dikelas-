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
            'subject_id' => 'nullable', // Dihapus exists:subjects,id untuk MVP
            'description' => 'nullable|string',
        ]);

        // Generate unique class code
        $code = strtoupper(Str::random(6));
        
        $subjectId = $request->subject_id ?? 1;
        $subject = \App\Models\Subject::firstOrCreate(
            ['id' => $subjectId],
            ['name' => 'Mata Pelajaran ' . $subjectId, 'code' => 'MAPEL' . $subjectId]
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
            'subject_id' => $subject->id,
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
     * Update Kelas.
     */
    public function updateClass(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        
        $classroom = Classroom::where('teacher_id', auth()->id())->findOrFail($id);
        $classroom->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        
        return redirect('/guru/classes')->with('success', 'Kelas berhasil diupdate!');
    }

    /**
     * Hapus Kelas.
     */
    public function destroyClass($id)
    {
        $classroom = Classroom::where('teacher_id', auth()->id())->findOrFail($id);
        $classroom->delete();
        return redirect('/guru/classes')->with('success', 'Kelas berhasil dihapus!');
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
            
        $classrooms = Classroom::where('teacher_id', $teacher->id)->get();
            
        return view('auth.guru.assignments', compact('assignments', 'classrooms'));
    }

    /**
     * Proses pembuatan Tugas Baru.
     */
    public function storeAssignment(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'classroom_id' => 'required',
            'description' => 'nullable|string',
            'deadline_at' => 'required|date',
        ]);

        $classroom = \App\Models\Classroom::firstOrCreate(
            ['id' => $request->classroom_id],
            [
                'teacher_id' => auth()->id(),
                'subject_id' => 1,
                'semester_id' => 1,
                'name' => 'Kelas Dummy ' . $request->classroom_id,
                'code' => 'DUMMY' . $request->classroom_id,
                'is_active' => true
            ]
        );

        \App\Models\Assignment::create([
            'classroom_id' => $classroom->id,
            'title' => $request->title,
            'description' => $request->description,
            'deadline_at' => $request->deadline_at,
            'max_score' => 100,
            'is_published' => true,
            'allow_late' => true,
        ]);

        return redirect('/guru/assignments')->with('success', 'Tugas baru berhasil dibuat!');
    }

    public function updateAssignment(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'deadline_at' => 'required|date',
        ]);
        
        $assignment = \App\Models\Assignment::findOrFail($id);
        $assignment->update([
            'title' => $request->title,
            'description' => $request->description,
            'deadline_at' => $request->deadline_at,
        ]);
        return redirect('/guru/assignments')->with('success', 'Tugas berhasil diupdate!');
    }

    public function destroyAssignment($id)
    {
        $assignment = \App\Models\Assignment::findOrFail($id);
        $assignment->delete();
        return redirect('/guru/assignments')->with('success', 'Tugas berhasil dihapus!');
    }

    /**
     * Tampilkan daftar Materi
     */
    public function materials()
    {
        $teacher = auth()->user();
        $classroomIds = Classroom::where('teacher_id', $teacher->id)->pluck('id');
        $materials = \App\Models\Material::with('classroom')->whereIn('classroom_id', $classroomIds)->orderBy('created_at', 'desc')->get();
        $classrooms = Classroom::where('teacher_id', $teacher->id)->get();
        return view('auth.guru.materials', compact('materials', 'classrooms'));
    }

    /**
     * Proses pembuatan Materi Baru.
     */
    public function storeMaterial(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'classroom_id' => 'required',
        ]);

        $classroom = \App\Models\Classroom::firstOrCreate(
            ['id' => $request->classroom_id],
            [
                'teacher_id' => auth()->id(),
                'subject_id' => 1,
                'semester_id' => 1,
                'name' => 'Kelas Dummy ' . $request->classroom_id,
                'code' => 'DUMMY' . $request->classroom_id,
                'is_active' => true
            ]
        );

        \App\Models\Material::create([
            'classroom_id' => $classroom->id,
            'title' => $request->title,
            'description' => 'Materi baru',
            'file_path' => '/dummy/path.pdf',
            'file_name' => $request->title . '.pdf',
            'file_type' => 'pdf',
            'file_size' => 1024,
        ]);

        return redirect('/guru/materials')->with('success', 'Materi berhasil diunggah!');
    }

    public function updateMaterial(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);
        $material = \App\Models\Material::findOrFail($id);
        $material->update([
            'title' => $request->title,
        ]);
        return redirect('/guru/materials')->with('success', 'Materi berhasil diupdate!');
    }

    public function destroyMaterial($id)
    {
        $material = \App\Models\Material::findOrFail($id);
        $material->delete();
        return redirect('/guru/materials')->with('success', 'Materi berhasil dihapus!');
    }
}
