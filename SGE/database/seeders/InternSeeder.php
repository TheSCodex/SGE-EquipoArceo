<?php

namespace Database\Seeders;

use App\Models\Intern;
use App\Models\User;
use App\Models\AcademicAdvisor;
use Illuminate\Database\Seeder;

class InternSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $estudianteUserIds = User::whereHas('role', function ($query) {
            $query->where('title', 'estudiante');
        })->pluck('id');

        $academicAdvisors = AcademicAdvisor::all();

        for ($i = 0; $i < count($estudianteUserIds); $i++) {
            $advisor = $academicAdvisors[$i % count($academicAdvisors)];
            $status_id = rand(1,2);
            Intern::create([
                'user_id' => $estudianteUserIds[$i],
                'academic_advisor_id' => $advisor->id,
                'career_id' => $advisor->career_id,
                'period' => 'Mayo - Julio',
                "student_status_id" => $status_id
            ]);
        }
    }
}

