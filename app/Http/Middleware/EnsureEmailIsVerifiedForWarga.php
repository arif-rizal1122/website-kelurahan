<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class EnsureEmailIsVerifiedForWarga
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $redirectToRoute
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, $guard = null, $redirectToRoute = null)
    {
        // Tentukan guard yang akan digunakan
        $authGuard = $guard ?: (Auth::guard('warga')->check() ? 'warga' : null);
        
        if (!$authGuard) {
            return $request->expectsJson()
                ? abort(403, 'Your are not authenticated.')
                : Redirect::guest(URL::route('warga.login.form'));
        }

        // Gunakan guard yang ditentukan
        $user = Auth::guard($authGuard)->user();

        if (! $user ||
            ($user instanceof MustVerifyEmail &&
            ! $user->hasVerifiedEmail())) {
            return $request->expectsJson()
                ? abort(403, 'Your email address is not verified.')
                : Redirect::guest(URL::route($redirectToRoute ?: 'verification.notice'));
        }

        return $next($request);
    }
}