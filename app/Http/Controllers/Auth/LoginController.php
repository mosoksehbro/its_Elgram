<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class LoginController extends Controller
{
        // Method untuk menampilkan form login
    public function showLoginForm()
        {
            return view('auth.login'); // Pastikan view auth/login.blade.php ada
        }
        
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Coba login
        if (Auth::attempt($this->credentials($request))) {
            // Login berhasil, redirect
            return redirect()->intended('/profile');
        }

        // Jika gagal, beri pesan error
        return back()->withErrors([
            'username' => 'Username or password is incorrect',
        ]);
    }

    protected function credentials(Request $request)
    {
        return [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ];
    }

    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Tambahkan fungsi logout jika belum ada
    public function logout(Request $request)
    {
        Auth::logout(); // Log out the user
        $request->session()->invalidate(); // Invalidate the session
        $request->session()->regenerateToken(); // Regenerate the CSRF token

        return redirect('/'); // Redirect to homepage or login page
    }
}


