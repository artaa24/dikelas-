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
        
        // Total Murid unik di semua kelasnya
        $totalStudents = \DB::table('classroom_student')
            ->join('classrooms', 'classroom_student.classroom_id', '=', 'classrooms.id')
            ->where('classrooms.teacher_id', $teacher->id)
            ->distinct('classroom_student.student_id')
            ->count('classroom_student.student_id');
            
        // Total Materi dari semua kelas guru ini
        $classroomIds = Classroom::where('teacher_id', $teacher->id)->pluck('id');
        $totalMaterials = \App\Models\Material::whereIn('classroom_id', $classroomIds)->count();
        
        // Tugas yang perlu dinilai (submission yang belum dinilai)
        $assignmentIds = \App\Models\Assignment::whereIn('classroom_id', $classroomIds)->pluck('id');
        $pendingGrades = \App\Models\Submission::whereIn('assignment_id', $assignmentIds)
            ->whereNull('score')
            ->count();

        // Get active classes for table
        $activeClasses = Classroom::withCount('students')
            ->where('teacher_id', $teacher->id)
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();
            
        // Get recent assignments that might need grading
        $recentAssignments = \App\Models\Assignment::with(['classroom', 'submissions' => function($q) {
                $q->where('status', 'submitted');
            }])
            ->whereIn('classroom_id', $classroomIds)
            ->orderBy('deadline_at', 'desc')
            ->limit(4)
            ->get();

        return view('auth.guru.dashboard', compact('totalClasses', 'totalStudents', 'totalMaterials', 'pendingGrades', 'activeClasses', 'recentAssignments'));
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
            'max_students' => 'nullable|integer|min:1|max:999',
            'banner_image' => 'nullable|image|max:2048',
        ]);

        // Generate unique class code
        $code = strtoupper(Str::random(6));
        
        $subjectId = $request->subject_id ?? 1;
        $subject = \App\Models\Subject::firstOrCreate(
            ['id' => $subjectId],
            ['name' => 'Mata Pelajaran ' . $subjectId, 'code' => 'MAPEL' . $subjectId]
        );

        $academicYear = \App\Models\AcademicYear::where('is_active', true)->first();
        if (!$academicYear) {
            $academicYear = \App\Models\AcademicYear::firstOrCreate(
                ['id' => 1],
                ['name' => '2026/2027', 'start_date' => '2026-07-01', 'end_date' => '2027-06-30', 'is_active' => true]
            );
        }

        $semester = \App\Models\Semester::where('is_active', true)->first();
        if (!$semester) {
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
        }

        $bannerPath = null;
        if ($request->hasFile('banner_image')) {
            $bannerPath = $request->file('banner_image')->store('class_banners', 'public');
        }

        $classroom = Classroom::create([
            'teacher_id' => auth()->id(),
            'subject_id' => $subject->id,
            'semester_id' => $semester->id,
            'name' => $request->name,
            'code' => $code,
            'description' => $request->description,
            'cover_image' => null,
            'banner_image' => $bannerPath,
            'is_active' => true,
            'max_students' => $request->max_students,
        ]);

        \App\Models\ActivityLog::log('create_class', 'Guru membuat kelas: ' . $classroom->name, $classroom);

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
            'max_students' => 'nullable|integer|min:1|max:999',
            'banner_image' => 'nullable|image|max:2048',
        ]);
        
        $classroom = Classroom::where('teacher_id', auth()->id())->findOrFail($id);
        
        if ($request->hasFile('banner_image')) {
            $bannerPath = $request->file('banner_image')->store('class_banners', 'public');
            $classroom->banner_image = $bannerPath;
        }
        
        $classroom->update([
            'name' => $request->name,
            'description' => $request->description,
            'max_students' => $request->max_students,
        ]);
        
        \App\Models\ActivityLog::log('update_class', 'Guru memperbarui kelas: ' . $classroom->name, $classroom);
        
        return redirect('/guru/classes')->with('success', 'Kelas berhasil diupdate!');
    }

    /**
     * Hapus Kelas.
     */
    public function destroyClass($id)
    {
        $classroom = Classroom::where('teacher_id', auth()->id())->findOrFail($id);
        $className = $classroom->name;
        $classroom->delete();
        \App\Models\ActivityLog::log('delete_class', 'Guru menghapus kelas: ' . $className);
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

        $assignment = \App\Models\Assignment::create([
            'classroom_id' => $classroom->id,
            'title' => $request->title,
            'description' => $request->description,
            'deadline_at' => $request->deadline_at,
            'max_score' => 100,
            'is_published' => true,
            'allow_late' => true,
        ]);

        \App\Models\ActivityLog::log('create_assignment', 'Guru membuat tugas: ' . $assignment->title, $assignment);

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
        
        \App\Models\ActivityLog::log('update_assignment', 'Guru memperbarui tugas: ' . $assignment->title, $assignment);
        
        return redirect('/guru/assignments')->with('success', 'Tugas berhasil diupdate!');
    }

    public function destroyAssignment($id)
    {
        $assignment = \App\Models\Assignment::findOrFail($id);
        $assignmentTitle = $assignment->title;
        $assignment->delete();
        \App\Models\ActivityLog::log('delete_assignment', 'Guru menghapus tugas: ' . $assignmentTitle);
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

        $material = \App\Models\Material::create([
            'classroom_id' => $classroom->id,
            'title' => $request->title,
            'description' => 'Materi baru',
            'file_path' => '/dummy/path.pdf',
            'file_name' => $request->title . '.pdf',
            'file_type' => 'pdf',
            'file_size' => 1024,
        ]);

        \App\Models\ActivityLog::log('create_material', 'Guru membuat materi: ' . $material->title, $material);

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
        \App\Models\ActivityLog::log('update_material', 'Guru memperbarui materi: ' . $material->title, $material);
        return redirect('/guru/materials')->with('success', 'Materi berhasil diupdate!');
    }

    public function destroyMaterial($id)
    {
        $material = \App\Models\Material::findOrFail($id);
        $materialTitle = $material->title;
        $material->delete();
        \App\Models\ActivityLog::log('delete_material', 'Guru menghapus materi: ' . $materialTitle);
        return redirect('/guru/materials')->with('success', 'Materi berhasil dihapus!');
    }

    public function grades(\Illuminate\Http\Request $request)
    {
        $teacher = auth()->user();
        $classroomIds = \App\Models\Classroom::where('teacher_id', $teacher->id)->pluck('id');
        
        $assignments = \App\Models\Assignment::with('classroom')
            ->whereIn('classroom_id', $classroomIds)
            ->orderBy('created_at', 'desc')
            ->get();
            
        $selectedAssignmentId = $request->get('assignment_id');
        if (!$selectedAssignmentId && $assignments->count() > 0) {
            $selectedAssignmentId = $assignments->first()->id;
        }
        
        $selectedAssignment = null;
        $submissions = collect();
        
        if ($selectedAssignmentId) {
            $selectedAssignment = \App\Models\Assignment::with('classroom.students')->find($selectedAssignmentId);
            if ($selectedAssignment) {
                $students = $selectedAssignment->classroom->students;
                $existingSubmissions = \App\Models\Submission::where('assignment_id', $selectedAssignmentId)
                    ->get()
                    ->keyBy('student_id');
                    
                foreach ($students as $student) {
                    $submissions->push((object)[
                        'student' => $student,
                        'submission' => $existingSubmissions->get($student->id)
                    ]);
                }
            }
        }

        return view('auth.guru.grades', compact('assignments', 'selectedAssignment', 'submissions', 'selectedAssignmentId'));
    }

    /**
     * Export nilai tugas ke PDF
     */
    public function exportGrades(Request $request)
    {
        $teacher = auth()->user();
        $classroomIds = Classroom::where('teacher_id', $teacher->id)->pluck('id');
        
        $selectedAssignmentId = $request->get('assignment_id');
        
        $selectedAssignment = null;
        $submissions = collect();
        
        if ($selectedAssignmentId) {
            $selectedAssignment = \App\Models\Assignment::with('classroom.students')->whereIn('classroom_id', $classroomIds)->find($selectedAssignmentId);
            if ($selectedAssignment) {
                $students = $selectedAssignment->classroom->students;
                $existingSubmissions = \App\Models\Submission::where('assignment_id', $selectedAssignmentId)
                    ->get()
                    ->keyBy('student_id');
                    
                foreach ($students as $student) {
                    $submissions->push((object)[
                        'student' => $student,
                        'submission' => $existingSubmissions->get($student->id)
                    ]);
                }
            }
        }
        
        if (!$selectedAssignment) {
            return redirect()->back()->with('error', 'Tugas tidak ditemukan untuk diekspor.');
        }

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.grades', compact('selectedAssignment', 'submissions'));
        return $pdf->download('Nilai_Tugas_' . \Illuminate\Support\Str::slug($selectedAssignment->title) . '.pdf');
    }

    /**
     * Tampilkan jadwal akademik (Tugas & Kuis) yang dibuat oleh Guru.
     */
    public function schedule()
    {
        $teacher = auth()->user();
        
        $classroomIds = Classroom::where('teacher_id', $teacher->id)->pluck('id');
            
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

        return view('auth.guru.schedule', compact('assignments', 'quizzes'));
    }
}
