<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Academy;

class AcademiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Insertar las academias con los division_id correspondientes
        Academy::create(['name' => 'División de Turismo', 'division_id' => 1, 'president_id' => 1]);
        Academy::create(['name' => 'División de Ingeniería y Tecnología', 'division_id' => 2, 'president_id' => 2]);
        Academy::create(['name' => 'División de Gastronomía', 'division_id' => 3, 'president_id' => 3]);
        Academy::create(['name' => 'División Económico-Administrativa', 'division_id' => 4, 'president_id' => 4]);
    }
}
