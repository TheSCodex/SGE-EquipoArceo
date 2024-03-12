<?php

namespace Database\Seeders;

use App\Models\BusinessAdvisor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BusinessAdvisorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BusinessAdvisor::factory()->count(10)->create();
    }
}
