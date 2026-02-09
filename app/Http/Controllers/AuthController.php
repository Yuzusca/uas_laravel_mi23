<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // --- FITUR REGISTER (SOAL NO 4) ---
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        // Simpan ke Database (Soal No 4.1)
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Redirect ke halaman login setelah daftar
        return redirect()->route('login')->with('success', 'Registrasi berhasil, silakan login!');
    }

    // --- FITUR LOGIN (SOAL NO 5) ---
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Cek input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cek kecocokan data di Database (Soal No 5.2)
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Jika berhasil, arahkan ke Dashboard (Soal No 6.3)
            return redirect()->intended('admin');
        }

        // Jika gagal, tampilkan pesan spesifik (Soal No 6.2)
        return back()->withErrors([
            'email' => 'Username / Password tidak sesuai',
        ]);
    }

    // Fitur Keluar (Logout)
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
