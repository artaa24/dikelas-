<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function index($classroomId)
    {
        $classroom = Classroom::with('students')->findOrFail($classroomId);
        
        // Logika rekapitulasi nilai untuk semua murid di kelas ini
        $grades = Grade::where('classroom_id', $classroomId)->get();
        
        return view('auth.grades.index', compact('classroom', 'grades'));
    }

    public function studentGrades($classroomId, $studentId)
    {
        $classroom = Classroom::findOrFail($classroomId);
        $grades = Grade::where('classroom_id', $classroomId)
                       ->where('student_id', $studentId)
                       ->get();
                       
        return view('auth.grades.student', compact('classroom', 'grades'));
    }
}
