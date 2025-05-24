<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;


class LoginController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        if (session()->has('token')) {
            return redirect()->route('home');
        }

        return view('login');
    }

    // Proses login dengan mengirim POST ke API eksternal
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|String',
            'password' => 'required|min:6',
        ]);
        

        try {
            $response = Http::post('http://localhost:8080/Login', [
                'username' => $request->username,
                'password' => $request->password,
            ]);

            Log::info('API Response:', $response->json()); 

            if ($response->successful()) {
                $data = $response->json();

                if (!isset($data['user']) || !isset($data['user']['role'])) {
                    return back()->withErrors([
                        'login_error' => 'Data user atau role tidak ditemukan dari API.'
                    ]);
                }

                // Simpan ke session
                session([
                    //'token' => $data['token'],
                    'id_user' => $data['user']['id_user'],
                    'username' => $data['user']['username'],
                    'role' => $data['user']['role'],
                    'user' => (object) $data['user']
                ]);

    switch (session('role')) {
    case 'admin':
        return redirect()->route('home')->with('success', 'Login sebagai admin');
    case 'dosen':
        return redirect()->route('home')->with('success', 'Login sebagai dosen');
    case 'mahasiswa':
        return redirect()->route('home')->with('success', 'Login sebagai mahasiswa');
    default:
        return redirect()->route('login')->withErrors(['login_error' => 'Role tidak dikenali.']);
    }

    }

            return back()->withErrors([
                'login_error' => $response->json()['message'] ?? 'Login gagal'
            ]);

        } catch (\Exception $e) {
            return back()->withErrors([
                'login_error' => 'Server error: ' . $e->getMessage()
            ]);
        }
    }

    // Proses logout
    public function logout()
    {
        session()->flush();
        return redirect()->route('login')->with('success', 'Logout berhasil!');
    }
}
