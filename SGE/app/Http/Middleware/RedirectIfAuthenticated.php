<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
{
    $guards = empty($guards) ? [null] : $guards;

    foreach ($guards as $guard) {
        if (Auth::guard($guard)->check()) {
            // Obtener el rol del usuario
            $userRole = Auth::user()->role;

            // Redirigir según el rol del usuario
            $redirectRoute = $this->getRedirectRoute($userRole);

            return redirect($redirectRoute);
        }
    }

    return $next($request);
}

protected function getRedirectRoute($userRole)
{
    switch ($userRole) {
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
}