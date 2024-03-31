<?php

namespace Database\Seeders;

use App\Models\penalization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenalizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        penalization::create([
            "penalty_name" => "10 horas de servicio social",
            "description" => "ejemplo de penalizacion"
        ]);
        penalization::create([
            "penalty_name" => "20 horas de servicio social",
            "description" => "ejemplo de penalizacion"
        ]);
    }
}
