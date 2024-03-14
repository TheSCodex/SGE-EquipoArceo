<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ObservationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 5; $i++) {
            DB::table('comments')->insert([
                'content' => "Contenido del comentario $i",
                'fecha_hora' => Carbon::now(),
                'status' => rand(1, 3),
                'academic_advisor_id' =>1,
                'project_id' => 1,
                'parent_comment_id' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
