<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfNotWarga
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string|null  ...$guards
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, ...$guards): Response
    {
        // Jika pengguna sedang login sebagai admin (web) tapi mencoba akses area warga
        // Logout dari guard web untuk mencegah konflik session
        if (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }

        // Jika tidak login sebagai warga, redirect ke login warga
        if (!Auth::guard('warga')->check()) {
            return redirect()->route('warga.login.form');
        }

        return $next($request);
    }
}