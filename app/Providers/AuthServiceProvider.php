<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Auth\SessionGuard;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot()
    {
        $this->registerPolicies();

        // Konfigurasi cookie session berbeda untuk setiap guard
        Auth::resolved(function ($auth) {
            $auth->extend('session', function ($app, $name, array $config) {
                $provider = $app['auth']->createUserProvider($config['provider']);

                $guard = new SessionGuard($name, $provider, $app['session.store']);

                if (method_exists($guard, 'setCookieJar')) {
                    $guard->setCookieJar($app['cookie']);
                }

                if (method_exists($guard, 'setDispatcher')) {
                    $guard->setDispatcher($app['events']);
                }

                if (method_exists($guard, 'setRequest')) {
                    $guard->setRequest($app->refresh('request', $guard, 'setRequest'));
                }

                return $guard;
            });
        });
    }
}