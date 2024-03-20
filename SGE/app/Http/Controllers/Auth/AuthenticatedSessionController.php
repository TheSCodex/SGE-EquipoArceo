<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
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
        // Obtener los datos de usuario proporcionados en la solicitud
        $userData = $request->only('email', 'password');

        // Buscar el usuario en la base de datos usando el correo electrónico proporcionado
        $user = User::where('email', $userData['email'])->first();

        // si el usuario con ese correo no existe, lo regresa
        if (!$user) {
            return redirect()->back()->withInput()->withErrors(['email' => 'Usuario no encontrado.']);
        }

        if ($user->created_at == $user->updated_at) {
            session(['user' => $user]);
            return redirect(RouteServiceProvider::CHANGEPASSWORDFIRSTTIME);
        }
        

        $request->authenticate();
        $request->session()->regenerate();


        switch (Auth::user()->role->title) {
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
