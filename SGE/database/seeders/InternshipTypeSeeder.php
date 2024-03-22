<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InternshipType;

class InternshipTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     */
    public function run()
    {
        InternshipType::create([
            'name' => 'Pasantías educativas',
        ]);

        InternshipType::create([
            'name' => 'Pasantías internacionales',
        ]);

        InternshipType::create([
            'name' => 'Pasantías para créditos',
        ]);
    }
}
        // ! lo agregue por que no exitia 
