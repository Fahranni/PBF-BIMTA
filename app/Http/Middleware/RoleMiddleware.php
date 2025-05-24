<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $role)
    {
    Log::info('RoleMiddleware - session role: ' . session('role'));
    Log::info('RoleMiddleware - required role: ' . $role);
        
        if (session('role') !== $role){
            return redirect()->route('login')->withErrors(['akses'=>'Tidak memiliki akses']);
        }
    return $next($request);
}
}