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
    public function handle($request, Closure $next, $roles)
{
    $rolesArray = array_map('trim', explode(',', $roles));
    $user = Auth::user();

    if (!$user || !in_array($user->role, $rolesArray)) {
        return redirect()->route('login')->withErrors(['akses' => 'Tidak memiliki akses']);
    }

    return $next($request);
}


        
        
}
