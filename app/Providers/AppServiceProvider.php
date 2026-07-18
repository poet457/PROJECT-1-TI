<?php

namespace App\Providers;

use Illuminate\Auth\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Kalau user yang sudah login (misal masih sesi admin) membuka
        // halaman tamu (login/register/pilih peran), arahkan ke dashboard
        // sesuai role-nya, bukan selalu ke /dashboard (student).
        RedirectIfAuthenticated::redirectUsing(function () {
            return Auth::user()?->role === 'admin'
                ? route('admin.dashboard')
                : route('dashboard');
        });
    }
}
