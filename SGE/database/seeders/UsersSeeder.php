<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $names = ['John', 'Jane', 'Mary', 'James', 'Emily', 'Michael', 'Sarah', 'Jacob', 'Emma', 'Daniel', 'Kevin', 'Michell', 'Emmanuel', 'Luis', 'Peguero', 'Elizabeth', 'Liam', 'Olivia', 'Noah', 'Ava', 'Isabella', 'Sophia', 'Mia', 'Charlotte', 'Amelia', 'Harper', 'Ana', 'Charlie'];

        $rolEstudiante = Role::where('title', 'estudiante')->first();
        $rolAsesorAcademico = Role::where('title', 'asesorAcademico')->first();

        // Crear 10 usuarios estudiante
        for ($i = 0; $i < 16; $i++) {
            $user = User::factory()->create([
                'name' => $names[$i],
                'email' => strtolower($names[$i]) . '@utcancun.edu.mx',
                'password' => bcrypt('12345678'),
            ]);
            $user->role()->associate($rolEstudiante);
            $user->save();
        }

        // Crear 10 usuarios asesor academico
        for ($i = 17; $i < 27; $i++) {
            $user = User::factory()->create([
                'name' => $names[$i],
                'email' => strtolower($names[$i]) . '@utcancun.edu.mx',
                'password' => bcrypt('12345678'),
            ]);
            $user->role()->associate($rolAsesorAcademico);
            $user->save();
        }
    }
}
