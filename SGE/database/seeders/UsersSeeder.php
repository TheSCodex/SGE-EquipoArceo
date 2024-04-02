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
        $rolPresidenteAcademia = Role::where('title', 'presidenteAcademia')->first();
        $rolDirector = Role::where('title', 'director')->first();
        $rolDirectorAssistant = Role::where('title', 'asistenteDireccion')->first();

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
                    
                    // Nombres específicos para presidentes académicos
        $presidentes_nombres = [
            'Giovanny Director',
            'Elizabeth Director',
            'Michelle',
            'Luis Director',
            'Tadeo Director',
            'Octavio Director',
            'Juan Director',
            'Francisco Director',
            'Elenor Director',
            'Carrillo Director'
        ];

        // Crear 10 usuarios presidente académico
        for ($i = 0; $i < 10; $i++) {
            $user = User::factory()->create([
                'name' => $presidentes_nombres[$i], // Asignar nombres específicos
                'email' => strtolower($presidentes_nombres[$i]) . '@utcancun.edu.mx',
                'password' => bcrypt('12345678'),
            ]);
            $user->role()->associate($rolPresidenteAcademia);
            $user->save();
        }

        // Nombres específicos para directores
        $directores_nombres = [
            'Rocío Arceo',
            'Mayra Fuentes',
            'Marlene Juárez',
            'Luis Villafañana',
        ];

        // Crear 4 usuarios director
        for ($i = 0; $i < 4; $i++) {
            $user = User::factory()->create([
                'name' => $directores_nombres[$i], // Asignar nombres específicos
                'email' => strtolower($directores_nombres[$i]) . '@utcancun.edu.mx',
                'password' => bcrypt('12345678'),
            ]);
            $user->role()->associate($rolDirector);
            $user->save();
        }


        $directorAssistants_names = [
            'Norma Hernández',
            'David Hernández',
            'Sara Hernández',
            'Juan Hernández',
        ];
        
        for ($i = 0; $i < 4; $i++) {
            $user = User::factory()->create([
                'name' => $directorAssistants_names[$i],
                'email' => strtolower(str_replace(' ', '', $directorAssistants_names[$i])) . '@utcancun.edu.mx',
                'password' => bcrypt('12345678'),
            ]);
            $user->role()->associate($rolDirectorAssistant);
            $user->save();
        }
    
    
}

}
