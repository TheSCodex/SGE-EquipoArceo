<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // Obtener el rol del usuario
        $userRole = Auth::user()->role;
        // dd($userRole -> title);
        // Redirigir según el rol del usuario
        switch ($userRole -> title) {
            case 'estudiante':
                return redirect(RouteServiceProvider::ESTUDIANTE);
            case 'asesorAcademico':
                return redirect(RouteServiceProvider::ASESORACADEMICO);
            case 'presidenteAcademia':
                return redirect(RouteServiceProvider::PRESIDENTEACADEMIA);
            case 'director':
                return redirect(RouteServiceProvider::DIRECTOR);
            case 'asistenteDireccion':
                return redirect(RouteServiceProvider::ASISTENTEDIRECCION);
            case 'admin':
                return redirect(RouteServiceProvider::ADMIN);
            default:
                return redirect(RouteServiceProvider::HOME);
        }
    }


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
