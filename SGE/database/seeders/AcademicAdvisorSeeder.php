<?php

namespace Database\Seeders;

use App\Models\AcademicAdvisor;
use App\Models\User;
use App\Models\Career;
use Illuminate\Database\Seeder;

class AcademicAdvisorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $asesorAcademicoUserIds = User::whereHas('role', function ($query) {
            $query->where('title', 'asesorAcademico');
        })->pluck('id');

        $careerIds = Career::pluck('id');

        foreach ($asesorAcademicoUserIds as $userId) {
            $randomCareerId = $careerIds->random();

            AcademicAdvisor::create([
                'user_id' => $userId,
                'career_id' => $randomCareerId,
                'max_advisors' => 4,
                'quantity_advised' => 4,
            ]);
        }
    }
}
