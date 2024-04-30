<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session as FacadesSession;
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

        // primero se asegura de que la contraseña sea la misma
        if (!password_verify($userData['password'], $user->password)) {
            return redirect()->back()->withInput()->withErrors(['password' => 'La contraseña es incorrecta.']);
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
    // public function destroy(Request $request): RedirectResponse
    // {
    //     Auth::guard('web')->logout();

    //     $request->session()->invalidate();

    //     $request->session()->regenerateToken();

    //     return redirect('/');
    // }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();
    
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        // Agregar encabezados de respuesta HTTP más estrictos
        return Redirect::to('/')->withHeaders([
            'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
            'Pragma' => 'no-cache',
            'Expires' => 'Sat, 01 Jan 2000 00:00:00 GMT',
        ]);
    }


}
