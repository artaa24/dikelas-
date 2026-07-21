<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Discussion;
use Illuminate\Http\Request;

class DiscussionController extends Controller
{
    public function index($classroomId)
    {
        $classroom = Classroom::findOrFail($classroomId);
        $discussions = $classroom->discussions()->with('user', 'replies')->latest()->get();
        return view('auth.discussions.index', compact('classroom', 'discussions'));
    }

    public function store(Request $request, $classroomId)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $classroom = Classroom::findOrFail($classroomId);

        Discussion::create([
            'classroom_id' => $classroom->id,
            'user_id' => auth()->id(),
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return back()->with('success', 'Topik diskusi berhasil dibuat!');
    }

    public function show($classroomId, $discussionId)
    {
        $classroom = Classroom::findOrFail($classroomId);
        $discussion = Discussion::with(['user', 'replies.user'])->findOrFail($discussionId);
        return view('auth.discussions.show', compact('classroom', 'discussion'));
    }

    public function reply(Request $request, $classroomId, $discussionId)
    {
        $request->validate(['content' => 'required|string']);

        $discussion = Discussion::findOrFail($discussionId);
        
        $discussion->replies()->create([
            'user_id' => auth()->id(),
            'content' => $request->content,
        ]);
        
        $discussion->increment('replies_count');

        return back()->with('success', 'Balasan berhasil dikirim!');
    }
}
