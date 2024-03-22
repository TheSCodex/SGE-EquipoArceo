<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate; 
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('crear-anteproyecto', function ($user) {
            return $user->hasPermission('crear-anteproyecto');
        });
        
        Gate::define('editar-anteproyecto', function ($user) {
            return $user->hasPermission('editar-anteproyecto');
        });

        Gate::define('leer-observaciones', function ($user) {
            return $user->hasPermission('leer-observaciones');
        });

        Gate::define('comentar-observaciones', function ($user) {
            return $user->hasPermission('comentar-observaciones');
        });

        Gate::define('leer-calendario', function ($user) {
            return $user->hasPermission('leer-calendario');
        });

        Gate::define('leer-estudiantes-asignados', function ($user) {
            return $user->hasPermission('leer-estudiantes-asignados');
        });

        Gate::define('leer-anteproyectos-asignados', function ($user) {
            return $user->hasPermission('leer-anteproyectos-asignados');
        });

        Gate::define('leer-anteproyecto-detalles', function ($user) {
            return $user->hasPermission('leer-anteproyecto-detalles');
        });


        Gate::define('leer-anteproyectos-publicados', function ($user) {
            return $user->hasPermission('leer-anteproyectos-publicados');
        });

        Gate::define('crear-observacion', function ($user) {
            return $user->hasPermission('crear-observacion');
        });

        Gate::define('resolver-eliminar-observacion', function ($user) {
            return $user->hasPermission('resolver-eliminar-observacion');
        });

        Gate::define('votar-anteproyecto', function ($user) {
            return $user->hasPermission('votar-anteproyecto');
        });

        Gate::define('crear-actividad-calendario', function ($user) {
            return $user->hasPermission('crear-actividad-calendario');
        });

        Gate::define('gestionar-bajas', function ($user) {
            return $user->hasPermission('gestionar-bajas');
        });

        Gate::define('leer-anteproyectos-division', function ($user) {
            return $user->hasPermission('leer-anteproyectos-division');
        });

        Gate::define('leer-anteproyecto-especifico', function ($user) {
            return $user->hasPermission('leer-anteproyecto-especifico');
        });

        Gate::define('leer-asesores-academicos', function ($user) {
            return $user->hasPermission('leer-asesores-academicos');
        });

        Gate::define('crear-asesores-academicos', function ($user) {
            return $user->hasPermission('crear-asesores-academicos');
        });

        Gate::define('editar-asesores-academicos', function ($user) {
            return $user->hasPermission('editar-asesores-academicos');
        });

        Gate::define('eliminar-asesores-academicos', function ($user) {
            return $user->hasPermission('eliminar-asesores-academicos');
        });

        Gate::define('leer-estudiantes', function ($user) {
            return $user->hasPermission('leer-estudiantes');
        });

        Gate::define('asignar-asesor-estudiante', function ($user) {
            return $user->hasPermission('asignar-asesor-estudiante');
        });

        Gate::define('leer-bajas', function ($user) {
            return $user->hasPermission('leer-bajas');
        });

        Gate::define('leer-reportes', function ($user) {
            return $user->hasPermission('leer-reportes');
        });

        Gate::define('generar-reportes-documentos', function ($user) {
            return $user->hasPermission('generar-reportes-documentos');
        });

        Gate::define('gestionar-documentos', function ($user) {
            return $user->hasPermission('gestionar-documentos');
        });

        Gate::define('leer-lista-libros', function ($user) {
            return $user->hasPermission('leer-lista-libros');
        });

        Gate::define('crear-libro', function ($user) {
            return $user->hasPermission('crear-libro');
        });

        Gate::define('editar-libro', function ($user) {
            return $user->hasPermission('editar-libro');
        });

        Gate::define('eliminar-libro', function ($user) {
            return $user->hasPermission('eliminar-libro');
        });
        
        Gate::define('crud-usuarios', function ($user) {
            return $user->hasPermission('crud-usuarios');
        });

        Gate::define('crud-empresas', function ($user) {
            return $user->hasPermission('crud-empresas');
        });

        Gate::define('crud-roles-permisos', function ($user) {
            return $user->hasPermission('crud-roles-permisos');
        });

        Gate::define('crud-asesores', function ($user) {
            return $user->hasPermission('crud-asesores');
        });

        Gate::define('crud-carreras-divisiones', function ($user) {
            return $user->hasPermission('crud-carreras-divisiones');
        });
    }
}
