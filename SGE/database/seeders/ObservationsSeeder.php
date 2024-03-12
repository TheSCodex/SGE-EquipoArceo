<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 
use Carbon\Carbon;

class ObservationsSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 5; $i++) {
            DB::table('comments')->insert([
                'content' => "Contenido del comentario $i",
                'fecha_hora' => Carbon::now(),
                'status' => rand(1,3), 
                'academic_advisor_id' => rand(1, 10), // ID de asesor académico de ejemplo
                'project_id' => rand(1, 10), // ID de proyecto de ejemplo
                'parent_comment_id' => null, // Sin comentario padre
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
