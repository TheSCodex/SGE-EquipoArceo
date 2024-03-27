<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CheckRoleOrPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @param  string  $permission
     * @return mixed
     */
    public function handle($request, Closure $next, $role, $permission)
    {
        if (!Auth::check()) {
            abort(403, 'No tienes permiso para acceder a esta ruta.');
        }

        if (Auth::user()->hasRole($role)) {
            return $next($request);
        }

        if (Gate::allows($permission)) {
            return $next($request);
        }

        abort(403, 'No tienes permiso para acceder a esta ruta.');
    }
}
