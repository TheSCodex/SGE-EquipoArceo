<?php

namespace Database\Seeders;

use App\Models\Intern;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Factories\ProjectFactory;
use App\Models\Project;


class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Project::create([
            "name" => "Anteproyecto aprobado uno", 
            "description" => "eso tilin", 
            "status" => "aprobado", 
            "like" => "3", 
            "start_date" => "2024-05-28",
            "end_date" => "2024-07-06",
            "adviser_id" => 10,
            "problem_statement" => "eso tilin",
            "project_justificaction" => "eso tilin",
            "activities_to_do" => "eso tilin",
            "approval date" => "2024-05-29"
        ]);
        Project::create([
            "name" => "Anteproyecto aprobado dos", 
            "description" => "eso tilin", 
            "status" => "aprobado", 
            "like" => "3", 
            "start_date" => "2024-05-28",
            "end_date" => "2024-07-06",
            "adviser_id" => 10,
            "problem_statement" => "eso tilin",
            "project_justificaction" => "eso tilin",
            "activities_to_do" => "eso tilin",
            "approval date" => "2024-06-29"
        ]);
        Project::create([
            "name" => "Anteproyecto aprobado tres", 
            "description" => "eso tilin", 
            "status" => "aprobado", 
            "like" => "3", 
            "start_date" => "2024-05-28",
            "end_date" => "2024-07-06",
            "adviser_id" => 10,
            "problem_statement" => "eso tilin",
            "project_justificaction" => "eso tilin",
            "activities_to_do" => "eso tilin",
            "approval date" => "2024-07-29"
        ]);
        Project::create([
            "name" => "Anteproyecto en revisión ejemplo", 
            "description" => "eso tilin", 
            "status" => "en revision", 
            "start_date" => "2024-05-28",
            "end_date" => "2024-07-06",
            "adviser_id" => 10,
            "problem_statement" => "eso tilin",
            "project_justificaction" => "eso tilin",
            "activities_to_do" => "eso tilin",
        ]);

        for ($i = 1; $i <= 4; $i++) {
            $intern = Intern::find($i);
            $intern->project_id = $i;
            $intern->save();
        }
    }
}
