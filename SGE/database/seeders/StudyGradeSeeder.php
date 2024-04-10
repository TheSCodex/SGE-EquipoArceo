<?php

namespace Database\Seeders;

use App\Models\GradeOfStudy;
use App\Models\StudyGrade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudyGradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StudyGrade::create(['degree' => 'ING']);
        StudyGrade::create(['degree' => 'LIC']);
        StudyGrade::create(['degree' => 'TSU']);
    }
}
