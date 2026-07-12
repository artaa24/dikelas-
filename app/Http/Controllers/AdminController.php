<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Tampilkan halaman dashboard Super Admin dengan metrik dinamis.
     */
    public function dashboard()
    {
        // Hitung total guru (role_id = 2)
        $totalTeachers = User::where('role_id', 2)->count();
        
        // Hitung total murid (role_id = 3)
        $totalStudents = User::where('role_id', 3)->count();
        
        // Karena kita Opsi B (Single-School), kita bisa set total sekolah menjadi 1 atau hilangkan saja, tapi kita kirim 1 sebagai dummy jika dibutuhkan di view.
        $totalSchools = 1;
        
        $pendingResets = \App\Models\PasswordResetRequest::where('status', 'pending')->count();

        return view('auth.admin.dashboard', compact('totalTeachers', 'totalStudents', 'totalSchools', 'pendingResets'));
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
