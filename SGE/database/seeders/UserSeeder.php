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
        ];

        $rolAdmin->update([
            'permissions' => $permisosAdmin,
        ]);
    }
}
