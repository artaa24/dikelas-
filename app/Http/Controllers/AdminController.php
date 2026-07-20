<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Classroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Tampilkan halaman dashboard Super Admin dengan metrik dinamis.
     */
    public function dashboard()
    {
        // Hitung total guru berdasarkan nama role
        $teacherRole = Role::where('name', 'teacher')->first();
        $studentRole = Role::where('name', 'student')->first();

        $totalTeachers = $teacherRole ? User::where('role_id', $teacherRole->id)->count() : 0;
        $totalStudents = $studentRole ? User::where('role_id', $studentRole->id)->count() : 0;
        
        // Total Kelas Aktif
        $totalClasses = Classroom::where('is_active', true)->count();
        
        // Total Sertifikat yang telah diterbitkan
        $totalCertificates = \App\Models\Certificate::count();
        
        $pendingResets = \App\Models\PasswordResetRequest::where('status', 'pending')->count();

        // Kelas terbaru
        $recentClasses = Classroom::with(['teacher', 'students'])
            ->withCount('students')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        // Aktivitas terbaru (user registrations)
        $recentUsers = User::with('role')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('auth.admin.dashboard', compact(
            'totalTeachers', 'totalStudents', 'totalClasses', 
            'totalCertificates', 'pendingResets',
            'recentClasses', 'recentUsers'
        ));
    }

    /**
     * Tampilkan halaman daftar pengguna (Manajemen Pengguna).
     */
    public function users()
    {
        // Ambil semua pengguna beserta relasi role-nya
        $users = User::with('role')->orderBy('created_at', 'desc')->paginate(10);
        $roles = Role::all();
        $pendingResets = \App\Models\PasswordResetRequest::where('status', 'pending')->orderBy('created_at', 'desc')->get();
        
        return view('auth.admin.users', compact('users', 'roles', 'pendingResets'));
    }

    /**
     * Proses tambah pengguna baru.
     */
    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role_id' => 'required|exists:roles,id',
            'nip' => 'nullable|string',
            'nis' => 'nullable|string',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
            'nip' => $request->nip,
            'nis' => $request->nis,
            'is_active' => true,
        ]);

        return redirect('/admin/users')->with('success', 'Pengguna baru berhasil ditambahkan!');
    }

    /**
     * Proses pembaruan data pengguna.
     */
    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'role_id' => 'required|exists:roles,id',
            'nip' => 'nullable|string',
            'nis' => 'nullable|string',
        ]);

        $data = $request->except('password');
        if ($request->filled('password')) {
            $request->validate(['password' => 'string|min:8']);
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect('/admin/users')->with('success', 'Data pengguna berhasil diperbarui!');
    }

    /**
     * Hapus pengguna.
     */
    public function destroyUser($id)
    {
        $user = User::findOrFail($id);
        
        // Jangan izinkan menghapus diri sendiri
        if ($user->id === auth()->id()) {
            return redirect('/admin/users')->with('error', 'Anda tidak bisa menghapus akun sendiri.');
        }

        $user->delete();

        return redirect('/admin/users')->with('success', 'Pengguna berhasil dihapus!');
    }

    /**
     * Tandai permintaan reset password sebagai selesai.
     */
    public function resolveReset($id)
    {
        $resetReq = \App\Models\PasswordResetRequest::findOrFail($id);
        $resetReq->status = 'resolved';
        $resetReq->save();
        
        return redirect()->back()->with('success', 'Permintaan reset atas nama ' . $resetReq->identifier . ' telah ditandai selesai.');
    }
}
