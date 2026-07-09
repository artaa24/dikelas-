<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

            // Update last_login_at
            $user->last_login_at = now();
            $user->save();

            // Redirect based on role
            // 1: Super Admin, 2: Guru, 3: Murid
            if ($user->role_id == 1) {
                return redirect()->intended('/admin/dashboard');
            } elseif ($user->role_id == 2) {
                return redirect()->intended('/guru/dashboard');
            } else {
                return redirect()->intended('/dashboard'); // Murid dashboard
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
