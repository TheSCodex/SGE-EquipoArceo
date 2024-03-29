<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CareersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $careers = [
            ['name' => 'TSU en Administración área Capital Humano', 'academy_id' => 4],
            ['name' => 'TSU en Desarrollo de Negocios área Mercadotecnia', 'academy_id' => 4],
            ['name' => 'TSU en Contaduría', 'academy_id' => 4],
            ['name' => 'TSU en Gastronomía', 'academy_id' => 3],
            ['name' => 'TSU en Mantenimiento área Instalaciones', 'academy_id' => 2],
            ['name' => 'TSU en Mantenimiento área Naval', 'academy_id' => 2],
            ['name' => 'TSU en Tecnologías de la Información área Desarrollo de Software Multiplataforma', 'academy_id' => 2],
            ['name' => 'TSU en Tecnologías de la Información área Infraestructura de Redes Digitales', 'academy_id' => 2],
            ['name' => 'TSU en Turismo área Desarrollo de Productos Alternativos', 'academy_id' => 1],
            ['name' => 'TSU en Turismo área Hotelería', 'academy_id' => 1],
            ['name' => 'TSU en Terapia Física', 'academy_id' => 4],
            ['name' => 'Licenciatura en Gestión del Capital Humano', 'academy_id' => 4],
            ['name' => 'Licenciatura en Innovación de Negocios y Mercadotecnia', 'academy_id' => 4],
            ['name' => 'Licenciatura en Contaduría', 'academy_id' => 4],
            ['name' => 'Licenciatura en Gastronomía', 'academy_id' => 3],
            ['name' => 'Ingeniería en Mantenimiento Industrial', 'academy_id' => 2],
            ['name' => 'Ingeniería en Desarrollo y Gestión de Software', 'academy_id' => 2],
            ['name' => 'Ingeniería en Redes Inteligentes y Ciberseguridad', 'academy_id' => 2],
            ['name' => 'Licenciatura en Gestión y Desarrollo Turístico', 'academy_id' => 1],
            ['name' => 'Licenciatura en Terapia Física', 'academy_id' => 4],
            ['name' => 'Sin especialidad', 'academy_id' => null],
        ];
    
        foreach ($careers as $career) {
            DB::table('Careers')->insert($career);
        }
    }
    
    
}
