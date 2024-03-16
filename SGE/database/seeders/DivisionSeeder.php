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
        Division::create(['name' => 'División de Turismo']);
        Division::create(['name' => 'División de Ingeniería y Tecnología']);
        Division::create(['name' => 'División de Gastronomía']);
        Division::create(['name' => 'División Económico-Administrativa']);
    }
}
