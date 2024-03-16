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

        // Crear un usuario asesor academico
        $asesorAcademico = User::factory()->create([
            'name' => 'Asesor Academico',
            'email' => 'asesorAcademico@test.com',
            'password' => bcrypt('12345678'),
        ]);
        $rolAsesorAcademico = Role::where('title', 'asesorAcademico')->first();
        $asesorAcademico->role()->associate($rolAsesorAcademico);
        $asesorAcademico->save();

        // Crear un usuario presidente de la academia
        $presidenteAcademia = User::factory()->create([
            'name' => 'Presidente de la academia',
            'email' => 'presidenteAcademia@test.com',
            'password' => bcrypt('12345678'),
        ]);
        $rolPresidenteAcademia = Role::where('title', 'presidenteAcademia')->first();
        $presidenteAcademia->role()->associate($rolPresidenteAcademia);
        $presidenteAcademia->save();

        // Crear un usuario directora
        $directora = User::factory()->create([
            'name' => 'Directora',
            'email' => 'directora@test.com',
            'password' => bcrypt('12345678'),
        ]);
        $rolDirectora = Role::where('title', 'director')->first();
        $directora->role()->associate($rolDirectora);
        $directora->save();

        // Crear un usuario asistente de direccion
        $asistenteDireccion = User::factory()->create([
            'name' => 'Asistente de direccion',
            'email' => 'asistenteDireccion@test.com',
            'password' => bcrypt('12345678'),
        ]);
        $rolAsistenteDireccion = Role::where('title', 'asistenteDireccion')->first();
        $asistenteDireccion->role()->associate($rolAsistenteDireccion);
        $asistenteDireccion->save();

        // Crear un usuario admin
        $admin = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('12345678'),
        ]);
        $rolAdmin = Role::where('title', 'admin')->first();
        $admin->role()->associate($rolAdmin);
        $admin->save();
    }
}
