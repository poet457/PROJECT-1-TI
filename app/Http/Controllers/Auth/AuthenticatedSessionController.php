<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\Response;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(Request $request): View
    {
        return view('auth.login', [
            'as' => $request->query('as') === 'admin' ? 'admin' : 'student',
        ]);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $homeRoute = Auth::user()->role === 'admin' ? 'admin.dashboard' : 'dashboard';

        return redirect()->intended(route($homeRoute, absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): Response
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        // Halaman "/" adalah view Blade biasa (bukan Inertia). Pakai
        // Inertia::location() supaya browser benar-benar pindah halaman
        // penuh, bukan me-render HTML landing page di dalam SPA.
        return Inertia::location('/');
    }
}
