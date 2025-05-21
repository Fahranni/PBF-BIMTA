<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role = null)
    {
        // Cek apakah user sudah login (session ada)
        if (!Session::has('user')) {
            // Jika belum login, redirect ke login page
            return redirect('/login')->withErrors(['login' => 'Silakan login terlebih dahulu']);
        }

        // Jika ada role yang diharapkan dan role user tidak cocok
        if ($role && Session::get('role') !== $role) {
            // Bisa diarahkan ke halaman lain atau kasih pesan error
            return abort(403, 'Unauthorized access');
        }

        return $next($request);
    }
}
