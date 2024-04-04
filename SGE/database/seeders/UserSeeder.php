<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Crear un usuario estudiante
        $estudiante = User::factory()->create([
            'name' => 'Estudiante',
            'email' => 'estudiante@test.com',
            'password' => bcrypt('12345678'),
        ]);

        $rolEstudiante = Role::where('title', 'estudiante')->first();
        $estudiante->role()->associate($rolEstudiante);
        $estudiante->save();

        // permisos predeterminados del estudiante

        $permisosEstudiante = [
            'crear-anteproyecto' => true,
            'editar-anteproyecto' => true,
            'leer-observaciones' => true,
            'comentar-observaciones' => true,
            'leer-calendario' => true,
            'leer-estudiantes-asignados' => false,
            'leer-anteproyectos-publicados' => false,
            'crear-observacion' => false,
            'resolver-eliminar-observacion' => false,
            'votar-anteproyecto' => false,
            'crear-actividad-calendario' => false,
            'gestionar-bajas' => false,
            'leer-reportes' => false,
            'generar-reportes-documentos' => false,
            'gestionar-documentos' => false,
            'leer-lista-libros' => false,
            'crear-libro' => false,
            'editar-libro' => false,
            'eliminar-libro' => false,
            'editar-formatos' => false,
            'crud-usuarios' => false,
            'crud-empresas' => false,
            'crud-roles-permisos' => false,
            'crud-asesores' => false,
            'crud-carreras-divisiones' => false,
        ];

        $rolEstudiante->update([
            'permissions' => $permisosEstudiante,
        ]);

        // Crear un usuario asesor academico
        $asesorAcademico = User::factory()->create([
            'name' => 'Asesor Academico',
            'email' => 'asesorAcademico@test.com',
            'password' => bcrypt('12345678'),
        ]);
        $rolAsesorAcademico = Role::where('title', 'asesorAcademico')->first();
        $asesorAcademico->role()->associate($rolAsesorAcademico);
        $asesorAcademico->save();

        // permisos de asesor académico

        $permisosAsesor = [
            'leer-estudiantes-asignados' => true,
            'leer-anteproyectos-asignados' => true,
            'leer-anteproyecto-detalles' => true,
            'leer-anteproyectos-publicados' => true,
            'leer-calendario' => true,
            'crear-observacion' => true,
            'resolver-eliminar-observacion' => true,
            'votar-anteproyecto' => true,
            'crear-actividad-calendario' => true,
            'gestionar-bajas' => true,
            'generar-reportes-documentos' => true,
            'leer-observaciones' => false,
            'comentar-observaciones' => false,
            'leer-anteproyecto-especifico' => false,
            'leer-asesores-academicos' => false,
            'crear-asesores-academicos' => false,
            'editar-asesores-academicos' => false,
            'eliminar-asesores-academicos' => false,
            'leer-estudiantes' => false,
            'asignar-asesor-estudiante' => false,
            'leer-reportes' => false,
            'gestionar-documentos' => false,
            'leer-lista-libros' => false,
            'crear-libro' => false,
            'editar-libro' => false,
            'eliminar-libro' => false,
            'editar-formatos' => false,
            'crud-usuarios' => false,
            'crud-empresas' => false,
            'crud-roles-permisos' => false,
            'crud-asesores' => false,
            'crud-carreras-divisiones' => false,
        ];        

        $rolAsesorAcademico->update([
            'permissions' => $permisosAsesor,
        ]);

        // Crear un usuario presidente de la academia
        $presidenteAcademia = User::factory()->create([
            'name' => 'Presidente de la academia',
            'email' => 'presidenteAcademia@test.com',
            'password' => bcrypt('12345678'),
        ]);
        $rolPresidenteAcademia = Role::where('title', 'presidenteAcademia')->first();
        $presidenteAcademia->role()->associate($rolPresidenteAcademia);
        $presidenteAcademia->save();

        // permisos presidente de academia

        $permisosPresidente = [
            'leer-anteproyectos-division' => true,
            'leer-anteproyecto-especifico' => true,
            'leer-asesores-academicos' => true,
            'crear-asesores-academicos' => true,
            'editar-asesores-academicos' => true,
            'eliminar-asesores-academicos' => true,
            'leer-estudiantes' => true,
            'asignar-asesor-estudiante' => true,
            'crear-anteproyecto' => false,
            'editar-anteproyecto' => false,
            'leer-observaciones' => false,
            'comentar-observaciones' => false,
            'leer-calendario' => false,
            'leer-estudiantes-asignados' => false,
            'leer-anteproyectos-publicados' => false,
            'crear-observacion' => false,
            'resolver-eliminar-observacion' => false,
            'votar-anteproyecto' => false,
            'crear-actividad-calendario' => false,
            'gestionar-bajas' => false,
            'leer-reportes' => false,
            'generar-reportes-documentos' => false,
            'gestionar-documentos' => false,
            'leer-lista-libros' => false,
            'crear-libro' => false,
            'editar-libro' => false,
            'eliminar-libro' => false,
            'editar-formatos' => false,
            'crud-usuarios' => false,
            'crud-empresas' => false,
            'crud-roles-permisos' => false,
            'crud-asesores' => false,
            'crud-carreras-divisiones' => false,
        ];
        

        $rolPresidenteAcademia->update([
            'permissions' => $permisosPresidente,
        ]);

        // Crear un usuario directora
        $directora = User::factory()->create([
            'name' => 'Directora',
            'email' => 'directora@test.com',
            'password' => bcrypt('12345678'),
        ]);
        $rolDirectora = Role::where('title', 'director')->first();
        $directora->role()->associate($rolDirectora);
        $directora->save();

        // permisos de directora

        $permisosDirectora = [
            'leer-reportes' => true,
            'leer-anteproyectos-division' => true,
            'leer-estudiantes' => true,
            'generar-reportes-documentos' => true,
            'gestionar-documentos' => true,
            'leer-bajas' => true,
            'editar-formatos' => true,
            'crear-anteproyecto' => false,
            'editar-anteproyecto' => false,
            'leer-observaciones' => false,
            'comentar-observaciones' => false,
            'leer-calendario' => false,
            'leer-anteproyectos-asignados' => false,
            'leer-anteproyecto-detalles' => false,
            'leer-anteproyectos-publicados' => false,
            'crear-observacion' => false,
            'resolver-eliminar-observacion' => false,
            'votar-anteproyecto' => false,
            'crear-actividad-calendario' => false,
            'gestionar-bajas' => false,
            'leer-lista-libros' => false,
            'crear-libro' => false,
            'editar-libro' => false,
            'eliminar-libro' => false,
            'crud-usuarios' => false,
            'crud-empresas' => false,
            'crud-roles-permisos' => false,
            'crud-asesores' => false,
            'crud-carreras-divisiones' => false,
        ];
        

        $rolDirectora->update([
            'permissions' => $permisosDirectora,
        ]);

        // Crear un usuario asistente de direccion
        $asistenteDireccion = User::factory()->create([
            'name' => 'Asistente de direccion',
            'email' => 'asistenteDireccion@test.com',
            'password' => bcrypt('12345678'),
        ]);
        $rolAsistenteDireccion = Role::where('title', 'asistenteDireccion')->first();
        $asistenteDireccion->role()->associate($rolAsistenteDireccion);
        $asistenteDireccion->save();

        // permisos de asistente de direccion

        $permisosAsistente = [
            'leer-bajas' => true,
            'leer-reportes' => true,
            'generar-reportes-documentos' => true,
            'gestionar-documentos' => true,
            'leer-lista-libros' => true,
            'crear-libro' => true,
            'editar-libro' => true,
            'eliminar-libro' => true,
            'leer-estudiantes' => true,
            'crear-anteproyecto' => false,
            'editar-anteproyecto' => false,
            'leer-observaciones' => false,
            'comentar-observaciones' => false,
            'leer-calendario' => false,
            'leer-estudiantes-asignados' => false,
            'leer-anteproyectos-asignados' => false,
            'leer-anteproyecto-detalles' => false,
            'leer-anteproyectos-publicados' => false,
            'crear-observacion' => false,
            'resolver-eliminar-observacion' => false,
            'votar-anteproyecto' => false,
            'crear-actividad-calendario' => false,
            'gestionar-bajas' => false,
            'editar-formatos' => false,
            'crud-usuarios' => false,
            'crud-empresas' => false,
            'crud-roles-permisos' => false,
            'crud-asesores' => false,
            'crud-carreras-divisiones' => false,
        ];
        

        $rolAsistenteDireccion->update([
            'permissions' => $permisosAsistente,
        ]);

        // Crear un usuario admin
        $admin = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('12345678'),
        ]);
        $rolAdmin = Role::where('title', 'admin')->first();
        $admin->role()->associate($rolAdmin);
        $admin->save();

        $permisosAdmin = [
            'crud-usuarios' => true,
            'crud-empresas' => true,
            'crud-roles-permisos' => true,
            'crud-asesores' => true,
            'crud-carreras-divisiones' => true,
            'crear-anteproyecto' => false,
            'editar-anteproyecto' => false,
            'leer-observaciones' => false,
            'comentar-observaciones' => false,
            'leer-calendario' => false,
            'leer-estudiantes-asignados' => false,
            'leer-anteproyectos-asignados' => false,
            'leer-anteproyecto-detalles' => false,
            'leer-anteproyectos-publicados' => false,
            'crear-observacion' => false,
            'resolver-eliminar-observacion' => false,
            'votar-anteproyecto' => false,
            'crear-actividad-calendario' => false,
            'gestionar-bajas' => false,
            'editar-formatos' => false,
        ];

        $rolAdmin->update([
            'permissions' => $permisosAdmin,
        ]);
    }
}
