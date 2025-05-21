<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class RegistrasiController extends Controller
{
    public function showRegistrasiForm()
    {
        return view('registrasi');
    }

    public function registrasi(Request $request)
    {
        // Validasi input lokal dulu
        $request->validate([
            'username' => 'required|string|max:50',
            'password' => 'required|min:6',
            'role' => 'required|string',
        ]);

        try {
            
            // Kirim data ke API backend
            $response = Http::post('http://localhost:8080/User', [
                'username' => $request->username,
                'password' => $request->password,
                'role' => $request->role,
            ]);

            Log::info('API Response Registrasi:', $response->json());

            if ($response->successful()) {
                return redirect()->route('login')->with('success', 'Registrasi berhasil, silakan login!');
            }

            return back()->withErrors(['registrasi_error' => $response->json()['message'] ?? 'Registrasi gagal']);
        } catch (\Exception $e) {
            return back()->withErrors(['registrasi_error' => 'Server error: ' . $e->getMessage()]);
        }
    }
}
