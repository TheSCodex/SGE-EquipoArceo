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
        Academy::create(['name' => 'Hoteleria', 'president_id' => 1, 'division_id' => 1]);
        Academy::create(['name' => 'Desarrollo de productos alternativos', 'president_id' => 1, 'division_id' => 1]);
        Academy::create(['name' => 'Gestion y desarrollo turistico', 'president_id' => 1, 'division_id' => 1]);
        Academy::create(['name' => 'Tecnologias de la informacion', 'president_id' => 2, 'division_id' => 2]);
        Academy::create(['name' => 'Mantenemiento industrial', 'president_id' => 2, 'division_id' => 2]);
        Academy::create(['name' => 'División de Gastronomía', 'president_id' => 3, 'division_id' => 5]);
        Academy::create(['name' => 'Capital humano', 'president_id' => 4, 'division_id' => 4]);
        Academy::create(['name' => 'Desarrollo de negocios', 'president_id' => 4, 'division_id' => 4]);
        Academy::create(['name' => 'Contaduria', 'president_id' => 4, 'division_id' => 4]);


    }
}
