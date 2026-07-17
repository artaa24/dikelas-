<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelpCenterController extends Controller
{
    /**
     * Tampilkan halaman pusat bantuan.
     * Menampilkan sidebar sesuai role user yang login.
     */
    public function index()
    {
        return view('auth.help-center');
    }
}
