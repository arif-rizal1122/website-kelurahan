<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfNotAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Jika pengguna sedang login sebagai warga tapi mencoba akses area admin
        // Logout dari guard warga untuk mencegah konflik session
        if (Auth::guard('warga')->check()) {
            Auth::guard('warga')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }

        // Jika tidak login sebagai admin (user), redirect ke login admin
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        return $next($request);
    }
}