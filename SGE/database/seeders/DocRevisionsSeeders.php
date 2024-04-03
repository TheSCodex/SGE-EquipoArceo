<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DocRevisionsSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('doc_revisions')->insert([
            'name' => 'Formato Control de Estadias',
            'revision_number' => 1,
            'revision_id' => '111-11-1-1111',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);

         DB::table('doc_revisions')->insert([
            'name' => 'Formato Carta de Aprobacion',
            'revision_number' => 1,
            'revision_id' => '111-11-1-1111',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);

         DB::table('doc_revisions')->insert([
            'name' => 'Formato Carta de Digitalizacion',
            'revision_number' => 1,
            'revision_id' => '111-11-1-1111',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);

        DB::table('doc_revisions')->insert([
            'name' => 'Formato Carta de Penalización',
            'revision_number' => 1,
            'revision_id' => '111-11-1-1111',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
    }
}
