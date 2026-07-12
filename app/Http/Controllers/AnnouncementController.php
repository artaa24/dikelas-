<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index()
    {
        // Ambil pengumuman yang bersifat umum (classroom_id null) 
        // dan jika ada relasi ke kelas yang diikuti (bisa diimprove nanti)
        $announcements = Announcement::whereNull('classroom_id')
            ->orderBy('is_pinned', 'desc')
            ->orderBy('published_at', 'desc')
            ->get();
            
        return view('auth.announcements', compact('announcements'));
    }
}
