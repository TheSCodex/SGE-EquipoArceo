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
use App\Models\Project_division;
use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\BusinessAdvisor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Intern;
use Carbon\Carbon;
use App\Models\Role;
use App\Models\StudentStatus;








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
        BusinessAdvisor::factory()->count(10)->create();

        // User::factory()->count(10)->create();

        DB::table('Careers')->insert([
            'name' => Str::random(10),
            'division_id' => rand(1, 10), 

        ]);

        DB::table('divisions')->insert([
            'name' => Str::random(10),

        ]);



        Role::create(['title' => 'estudiante']);
        Role::create(['title' => 'asesorAcademico']);
        Role::create(['title' => 'presidenteAcademia']);
        Role::create(['title' => 'director']);
        Role::create(['title' => 'asistenteDireccion']);
        Role::create(['title' => 'admin']);

        User::factory()->count(15)->create();


        StudentStatus::factory()->count(5)->create();

        Intern::factory()->count(10)->create();




        // //* Test
        // $this->call(RolesSeeder::class);

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

        // for ($i = 1; $i <= 5; $i++) {
        //     DB::table('comments')->insert([
        //         'content' => "Contenido del comentario $i",
        //         'fecha_hora' => Carbon::now(),
        //         'status' => rand(1, 3),
        //         'academic_advisor_id' => rand(1, 3),
        //         'project_id' => 1,
        //         'parent_comment_id' => null,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ]);
        // }

        // ! ISRAEL: Yo lo agregue la neta no se si exita pero estuve buscando y no encontre ninguna tabla con los campos que necesito
        $project_division = Project_division::factory()->count(30)->create();

    }
}