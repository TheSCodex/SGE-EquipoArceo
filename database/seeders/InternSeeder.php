<?php

namespace Database\Seeders;

use App\Models\Intern;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InternSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Intern::factory()->count(10)->create();
    }
}
