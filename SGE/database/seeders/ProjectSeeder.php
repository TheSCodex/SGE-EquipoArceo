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
            "description" => "Fomentar prácticas sostenibles y responsables con el medio ambiente entre los miembros de la comunidad.",
            "status" => "aprobado",
            "like" => "3",
            "start_date" => "2024-05-28",
            "end_date" => "2024-07-06",
            "adviser_id" => 10,
            "problem_statement" => "Es vital tomar medidas para proteger nuestro entorno natural y reducir nuestro impacto ambiental.",
            "project_justificaction" => "A través de actividades educativas, eventos comunitarios y campañas de sensibilización, se busca involucrar a los residentes locales en la adopción de comportamientos más respetuosos con el medio ambiente",
            "activities_to_do" => "Organizar charlas y talleres sobre temas ambientales
            Realizar jornadas de limpieza de espacios públicos",
        ]);
        Project::create([
            "name" => "Anteproyecto aprobado dos",
            "description" => "Fomentar prácticas sostenibles y responsables con el medio ambiente entre los miembros de la comunidad.",
            "status" => "aprobado",
            "like" => "3",
            "start_date" => "2024-05-28",
            "end_date" => "2024-07-06",
            "adviser_id" => 10,
            "problem_statement" => "Es vital tomar medidas para proteger nuestro entorno natural y reducir nuestro impacto ambiental.",
            "project_justificaction" => "A través de actividades educativas, eventos comunitarios y campañas de sensibilización, se busca involucrar a los residentes locales en la adopción de comportamientos más respetuosos con el medio ambiente",
            "activities_to_do" => "Organizar charlas y talleres sobre temas ambientales
            Realizar jornadas de limpieza de espacios públicos",
        ]);
        Project::create([
            "name" => "Anteproyecto aprobado tres",
            "description" => "Fomentar prácticas sostenibles y responsables con el medio ambiente entre los miembros de la comunidad.",
            "status" => "aprobado",
            "like" => "3",
            "start_date" => "2024-05-28",
            "end_date" => "2024-07-06",
            "adviser_id" => 10,
            "problem_statement" => "Es vital tomar medidas para proteger nuestro entorno natural y reducir nuestro impacto ambiental.",
            "project_justificaction" => "A través de actividades educativas, eventos comunitarios y campañas de sensibilización, se busca involucrar a los residentes locales en la adopción de comportamientos más respetuosos con el medio ambiente",
            "activities_to_do" => "Organizar charlas y talleres sobre temas ambientales
            Realizar jornadas de limpieza de espacios públicos",
        ]);
        Project::create([
            "name" => "Anteproyecto en revisión ejemplo",
            "description" => "Fomentar prácticas sostenibles y responsables con el medio ambiente entre los miembros de la comunidad.",
            "status" => "en revision",
            "start_date" => "2024-05-28",
            "end_date" => "2024-07-06",
            "adviser_id" => 10,
            "problem_statement" => "Es vital tomar medidas para proteger nuestro entorno natural y reducir nuestro impacto ambiental.",
            "project_justificaction" => "A través de actividades educativas, eventos comunitarios y campañas de sensibilización, se busca involucrar a los residentes locales en la adopción de comportamientos más respetuosos con el medio ambiente",
            "activities_to_do" => "Organizar charlas y talleres sobre temas ambientales
            Realizar jornadas de limpieza de espacios públicos",
        ]);

        for ($i = 1; $i <= 4; $i++) {
            $intern = Intern::find($i);
            $intern->project_id = $i;
            $intern->save();
        }
    }
}
