<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class penaltySeeder extends Seeder
{
    /**
     * Run the database seeds.
     * <option value="1">Amonestación escrita
                                                                            </option>
                                                                            <option value="2">Amonestación con horas de
                                                                                labor social</option>
                                                                            <option value="3">Cancelación de Estadía
                                                                            </option>
     */
    public function run(): void
    {
        DB::table('penalizations')->insert([
            'penalty_name' => 'Amonestación escrita',
            'description' => 'POR MOTIVOS ACADÉMICOS',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);

        DB::table('penalizations')->insert([
            'penalty_name' => 'Amonestación con horas de labor social',
            'description' => 'POR MOTIVOS ACADÉMICOS',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);

        DB::table('penalizations')->insert([
            'penalty_name' => 'Cancelación de Estadía',
            'description' => 'POR MOTIVOS ACADÉMICOS',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);

        DB::table('penalizations')->insert([
            'penalty_name' => 'Amonestación escrita',
            'description' => 'POR TEMAS RELACIONADOS EN GESTIÓN EMPRESARIAL',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);

        DB::table('penalizations')->insert([
            'penalty_name' => 'Amonestación con horas de labor social',
            'description' => 'POR TEMAS RELACIONADOS EN GESTIÓN EMPRESARIAL',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);

        DB::table('penalizations')->insert([
            'penalty_name' => 'Cancelación de Estadía',
            'description' => 'POR TEMAS RELACIONADOS EN GESTIÓN EMPRESARIAL',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
    }
}
