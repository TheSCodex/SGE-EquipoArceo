<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Division;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Insertar las divisiones de la UT Cancún
        Division::create(['name' => 'División de Turismo','director_id' => 1]);
        Division::create(['name' => 'División de Ingeniería y Tecnología','director_id' => 2]);
        Division::create(['name' => 'División de Gastronomía','director_id' => 3]);
        Division::create(['name' => 'División Económico-Administrativa','director_id' => 4]);
    }
}
