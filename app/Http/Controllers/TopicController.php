<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Topic;
use App\Http\Controllers\Traits\AuthorizesClassroomAccess;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    use AuthorizesClassroomAccess;

    public function store(Request $request, $classroomId)
    {
        $request->validate([
            'name' => 'required|string|max:200',
            'description' => 'nullable|string',
        ]);

        $classroom = Classroom::findOrFail($classroomId);
        $this->ensureClassroomOwner($classroom);

        Topic::create([
            'classroom_id' => $classroomId,
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return back()->with('success', 'Topik materi berhasil ditambahkan!');
    }

    public function destroy($classroomId, $topicId)
    {
        $classroom = Classroom::findOrFail($classroomId);
        $this->ensureClassroomOwner($classroom);

        $topic = Topic::where('classroom_id', $classroomId)->findOrFail($topicId);
        $topic->delete();

        return back()->with('success', 'Topik berhasil dihapus!');
    }
}
