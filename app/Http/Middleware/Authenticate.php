<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            // Cek apakah route yang diakses adalah milik warga
            if (Request::is('menu*') || Request::is('formulir*') || Request::is('profile*') || 
                Request::is('notifikasi*') || Request::is('riwayat*') || Request::is('pengajuan*')) {
                return route('warga.login.form');
            }
            
            // Default redirect ke login admin
            return route('login');
        }
    }
}