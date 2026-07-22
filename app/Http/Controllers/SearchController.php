<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classroom;
use App\Models\Assignment;
use App\Models\Material;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q');
        $user = auth()->user();
        
        $results = [
            'classrooms' => collect(),
            'assignments' => collect(),
            'materials' => collect(),
            'users' => collect(),
        ];

        if (empty($query)) {
            return view('auth.search', compact('query', 'results'));
        }

        if ($user->isAdmin()) {
            $results['users'] = User::where('name', 'like', "%{$query}%")
                ->orWhere('email', 'like', "%{$query}%")
                ->orWhere('nip', 'like', "%{$query}%")
                ->orWhere('nis', 'like', "%{$query}%")
                ->limit(20)
                ->get();
                
            $results['classrooms'] = Classroom::where('name', 'like', "%{$query}%")
                ->orWhere('code', 'like', "%{$query}%")
                ->limit(20)
                ->get();
        } 
        elseif ($user->isTeacher()) {
            $results['classrooms'] = Classroom::where('teacher_id', $user->id)
                ->where(function($q) use ($query) {
                    $q->where('name', 'like', "%{$query}%")
                      ->orWhere('code', 'like', "%{$query}%");
                })
                ->limit(10)
                ->get();
                
            $classroomIds = Classroom::where('teacher_id', $user->id)->pluck('id');
            
            $results['assignments'] = Assignment::with('classroom')
                ->whereIn('classroom_id', $classroomIds)
                ->where('title', 'like', "%{$query}%")
                ->limit(10)
                ->get();
                
            $results['materials'] = Material::with('classroom')
                ->whereIn('classroom_id', $classroomIds)
                ->where('title', 'like', "%{$query}%")
                ->limit(10)
                ->get();
        }
        else { // Student
            $classroomIds = DB::table('classroom_student')
                ->where('student_id', $user->id)
                ->pluck('classroom_id');

            $results['classrooms'] = Classroom::whereIn('id', $classroomIds)
                ->where(function($q) use ($query) {
                    $q->where('name', 'like', "%{$query}%")
                      ->orWhere('code', 'like', "%{$query}%")
                      ->orWhereHas('teacher', function($q2) use ($query) {
                          $q2->where('name', 'like', "%{$query}%");
                      });
                })
                ->limit(10)
                ->get();
                
            $results['assignments'] = Assignment::with('classroom')
                ->whereIn('classroom_id', $classroomIds)
                ->where('title', 'like', "%{$query}%")
                ->limit(10)
                ->get();
                
            $results['materials'] = Material::with('classroom')
                ->whereIn('classroom_id', $classroomIds)
                ->where('title', 'like', "%{$query}%")
                ->limit(10)
                ->get();
        }

        return view('auth.search', compact('query', 'results'));
    }
}
