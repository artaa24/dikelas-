<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Tampilkan daftar notifikasi untuk user yang sedang login.
     */
    public function index()
    {
        $user = auth()->user();

        $notifications = Notification::where('notifiable_type', 'App\Models\User')
            ->where('notifiable_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->paginate(20);
        
        $unreadCount = Notification::where('notifiable_type', 'App\Models\User')
            ->where('notifiable_id', $user->id)
            ->unread()
            ->count();

        return view('auth.notifications', compact('notifications', 'unreadCount'));
    }

    /**
     * Tandai semua notifikasi sebagai sudah dibaca.
     */
    public function markAllRead()
    {
        $user = auth()->user();

        Notification::where('notifiable_type', 'App\Models\User')
            ->where('notifiable_id', $user->id)
            ->whereNull('read_at')
            ->update(['read_at' => now()]);

        return redirect()->back()->with('success', 'Semua notifikasi telah ditandai dibaca.');
    }

    /**
     * Tandai satu notifikasi sebagai sudah dibaca.
     */
    public function markRead($id)
    {
        $notification = Notification::findOrFail($id);

        // Pastikan notifikasi milik user ini
        if ($notification->notifiable_id != auth()->id() || $notification->notifiable_type !== 'App\Models\User') {
            abort(403);
        }

        $notification->update(['read_at' => now()]);

        return redirect()->back();
    }
}
