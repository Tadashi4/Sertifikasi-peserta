<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Menampilkan Form Login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Menampilkan Form Login Admin
    public function showAdminLoginForm()
    {
        return view('auth.login-admin');
    }

    // Proses login dari form USER
    public function login(Request $request)
    {
        return $this->attemptLogin($request, 'user');
    }

    // Proses login dari form ADMIN
    public function adminLogin(Request $request)
    {
        return $this->attemptLogin($request, 'admin');
    }

    // Logika login yang dipakai bersama
    private function attemptLogin(Request $request, string $role)
    {
        // Validasi Input
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'Email wajib diisi!',
            'email.email' => 'Format email tidak valid!',
            'password.required' => 'Password wajib diisi!',
        ]);

        // Syarat tambahan: role akun harus sesuai dengan form yang dipakai
        $credentials['role'] = $role;

        // Cek Kredensial
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if ($role === 'admin') {
                return redirect()->intended('/dashboard')->with('success', 'Berhasil login!');
            }
    

            return redirect()->route('user.dashboard')->with('success', 'Berhasil login!');
        }

        // Jika Gagal
        return back()->withErrors([
            'email' => 'Email atau password anda salah.',
        ])->onlyInput('email');
    }

    // Untuk Menampilkan Form Registrasi
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Untuk Proses Registrasi
    public function register(Request $request)
    {
        $data = $request->validate([
            'name'     => ['required', 'string', 'max:100'],
            'email'    => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:8', 'confirmed'],
        ], [
            'name.required'      => 'Nama wajib diisi!',
            'email.required'     => 'Email wajib diisi!',
            'email.email'        => 'Format email tidak valid!',
            'email.unique'       => 'Email sudah terdaftar!',
            'password.required'  => 'Password wajib diisi!',
            'password.min'       => 'Password minimal 8 karakter!',
            'password.confirmed' => 'Konfirmasi password tidak cocok!',
        ]);

        $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('user.dashboard')
            ->with('success', 'Registrasi berhasil! Selamat datang.');
    }

    // Proses Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('welcome')->with('success', 'Berhasil logout!');
    }
}
