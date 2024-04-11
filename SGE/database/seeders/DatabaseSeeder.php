<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Company;
use App\Models\BusinessSector;
use App\Models\Academy;
use App\Models\Project_division;
use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\BusinessAdvisor;
use Database\Seeders\CareersSeeder;
use Database\Seeders\DocRevisionsSeeders;
use Database\Seeders\penaltySeeder;






class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        BusinessSector::factory()->count(10)->create();
        Book::factory(10)->create();
        Company::factory()->count(10)->create();
        $this->call(BusinessAdvisorSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(DivisionSeeder::class);
        $this->call(AcademiesSeeder::class);
        $this->call(CareersSeeder::class);
        $this->call(AcademicAdvisorSeeder::class); 
        $this->call(StudentStatusSeeder::class);
        $this->call(StudyGradeSeeder::class);
        $this->call(InternSeeder::class);
        $this->call(ProjectSeeder::class);
        $this->call(PenalizationSeeder::class);
        $this->call(DocRevisionsSeeders::class);
        $this->call(CommentSeeder::class);
        $this->call(penaltySeeder::class);
        
        // ! ISRAEL: Yo lo agregue la neta no se si exita pero estuve buscando y no encontre ninguna tabla con los campos que necesito
        $project_division = Project_division::factory()->count(30)->create();

    }
}