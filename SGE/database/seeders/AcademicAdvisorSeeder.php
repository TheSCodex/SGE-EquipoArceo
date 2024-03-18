<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AcademicAdvisor;

class AcademicAdvisorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Insertar las academias con los division_id correspondientes
        AcademicAdvisor::create(['user_id' => 2, 'max_advisors' => 2, 'quantity_advised' => 2]);   
    }
}
