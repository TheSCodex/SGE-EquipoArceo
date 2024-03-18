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

        // Verificar si es la primera vez que el usuario inicia sesión
        if (Auth::user()->created_at == Auth::user()->updated_at) {
            return redirect(RouteServiceProvider::CHANGEPASSWORDFIRSTTIME);
        }
        
        switch (Auth::user()->role->title) {
            case 'estudiante':
                return RouteServiceProvider::ESTUDIANTE;
            case 'asesorAcademico':
                return RouteServiceProvider::ASESORACADEMICO;
            case 'presidenteAcademia':
                return RouteServiceProvider::PRESIDENTEACADEMIA;
            case 'director':
                return RouteServiceProvider::DIRECTOR;
            case 'asistenteDireccion':
                return RouteServiceProvider::ASISTENTEDIRECCION;
            case 'admin':
                return RouteServiceProvider::ADMIN;
            default:
                return RouteServiceProvider::HOME;
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
