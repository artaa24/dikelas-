<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            $user = Auth::user();

            // Cek apakah akun aktif
            if (!$user->is_active) {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return back()->withErrors([
                    'email' => 'Akun Anda telah dinonaktifkan. Silakan hubungi administrator.',
                ])->onlyInput('email');
            }

            // Update last_login_at
            $user->last_login_at = now();
            $user->save();

            // Redirect berdasarkan role — menggunakan nama role, bukan hardcoded ID
            $roleName = $user->role->name;

            if ($roleName === 'super_admin') {
                return redirect()->intended('/admin/dashboard');
            } elseif ($roleName === 'teacher') {
                return redirect()->intended('/guru/dashboard');
            } else {
                return redirect()->intended('/dashboard');
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan salah.',
        ])->onlyInput('email');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:murid,guru',
        ]);

        // Ambil role berdasarkan nama, bukan hardcoded ID
        $roleName = $request->role === 'guru' ? 'teacher' : 'student';
        $role = Role::where('name', $roleName)->firstOrFail();

        $user = \App\Models\User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => \Illuminate\Support\Facades\Hash::make($request->password),
            'role_id' => $role->id,
            'is_active' => true,
        ]);

        return redirect()->route('login')->with('success', 'Akun berhasil dibuat. Silakan login.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function requestReset(Request $request)
    {
        $request->validate([
            'identifier' => 'required|string|max:255',
        ]);

        \App\Models\PasswordResetRequest::create([
            'identifier' => $request->identifier,
            'status' => 'pending',
        ]);

        return back()->with('success', 'Permintaan reset password untuk ' . $request->identifier . ' telah dikirim ke Admin. Silakan hubungi Tata Usaha untuk konfirmasi.');
    }
}
