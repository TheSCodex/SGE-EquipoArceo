<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Factories\ProjectFactory;


class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Comment::create([
            "content" => "¡Qué interesante proyecto! Me encantaría participar más activamente en él.",
            "project_id" => 1,
            "interns_id" => 2
        ]);
        
        Comment::create([
            "content" => "Creo que este proyecto tiene un gran potencial. ¿Podríamos discutir algunas ideas para mejorarlo?",
            "project_id" => 1,
            "interns_id" => 3
        ]);
        
        Comment::create([
            "content" => "Me gustaría agregar algunas sugerencias adicionales sobre el proyecto. ¿Hay alguna manera de hacerlo?",
            "project_id" => 1,
            "interns_id" => 4
        ]);
        
        Comment::create([
            "content" => "Estoy emocionado de ser parte de este proyecto. ¡Espero poder contribuir de manera significativa!",
            "project_id" => 1,
            "interns_id" => 5
        ]);
    }
}
