<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Company;
use App\Models\BusinessSector;
use App\Models\CareerAcademy;
use App\Models\Academy;
use App\Models\Career;
use App\Models\User;
use App\Models\Division;
use App\Models\Role;
use App\Models\Project_division;
use Illuminate\Database\Seeder;
use App\Models\Book;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        BusinessSector::factory()->count(10)->create();
        Book::factory(10)->create();
        Company::factory()->count(10)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Division::factory()->count(5)->create();
        Academy::factory()->count(5)->create();
        Career::factory()->count(5)->create();
        // Role::factory()->count(10)->create();
        CareerAcademy::factory()->count(5)->create();
        // User::factory()->count(10)->create();



        //* Test
        $this->call(RolesSeeder::class);

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

        // ! ISRAEL: Yo lo agregue la neta no se si exita pero estuve buscando y no encontre ninguna tabla con los campos que necesito
        $project_division = Project_division::factory()->count(30)->create();

    }
}