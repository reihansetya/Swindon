<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        // jika sudah login maka tampilkan dashboard
        if (Auth::check()) {
            return redirect('/admin/dashboard');
        }

        return view('admin.login');
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Coba autentikasi
        if (Auth::attempt($credentials)) {
            // Regenerasi session
            $request->session()->regenerate();

            // Redirect ke dashboard atau halaman yang diinginkan
            return redirect()->intended('/admin/dashboard')->with('success', 'Login berhasil!');
        }

        // Jika gagal, kembali ke halaman login
        return back()
            ->withErrors([
                'email' => 'Email atau password salah.',
            ])
            ->onlyInput('email');
    }

    // Logout user
    public function logout(Request $request)
    {
        Auth::logout();

        // Hapus sesi
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin')->with('success', 'Logout berhasil!');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
