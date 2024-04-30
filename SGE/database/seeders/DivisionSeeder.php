<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Division;
use App\Models\User;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $directors = User::whereHas('role', function ($query) {
            $query->where('title', 'director');
        })->get();
    
        $directorAssistants = User::whereHas('role', function ($query) {
            $query->where('title', 'asistenteDireccion');
        })->get();
    
        Division::create(['name' => 'División de Turismo', 'initials' => 'DDT', 'director_id' => $directors[0]->id ?? null, 'directorAsistant_id' => $directorAssistants[0]->id ?? null]);
        Division::create(['name' => 'División de Ingeniería y Tecnología', 'initials' => 'DDIT', 'director_id' => $directors[1]->id ?? null, 'directorAsistant_id' => $directorAssistants[1]->id ?? null]);
        Division::create(['name' => 'División de Gastronomía', 'initials' => 'DDG', 'director_id' => $directors[2]->id ?? null, 'directorAsistant_id' => $directorAssistants[2]->id ?? null]);
        Division::create(['name' => 'División Económico-Administrativa', 'initials' => 'DDEA', 'director_id' => $directors[3]->id ?? null, 'directorAsistant_id' => $directorAssistants[3]->id ?? null]);
        Division::create(['name' => 'División de Gastronomia', 'initials' => 'DDG',  'director_id' => $directors[4]->id ?? null, 'directorAsistant_id' => $directorAssistants[4]->id ?? null]);

    }
    
    
    
}
