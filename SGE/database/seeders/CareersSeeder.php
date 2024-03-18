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
        // Lógica de inserción de carreras
        $careers = [
            'TSU en Administración área Capital Humano',
            'TSU en Desarrollo de Negocios área Mercadotecnia',
            'TSU en Contaduría',
            'TSU en Gastronomía',
            'TSU en Mantenimiento área Instalaciones',
            'TSU en Mantenimiento área Naval',
            'TSU en Tecnologías de la Información área Desarrollo de Software Multiplataforma',
            'TSU en Tecnologías de la Información área Infraestructura de Redes Digitales',
            'TSU en Turismo área Desarrollo de Productos Alternativos',
            'TSU en Turismo área Hotelería',
            'TSU en Terapia Física',
            'Licenciatura en Gestión del Capital Humano',
            'Licenciatura en Innovación de Negocios y Mercadotecnia',
            'Licenciatura en Contaduría',
            'Licenciatura en Gastronomía',
            'Ingeniería en Mantenimiento Industrial',
            'Ingeniería en Desarrollo y Gestión de Software',
            'Ingeniería en Redes Inteligentes y Ciberseguridad',
            'Licenciatura en Gestión y Desarrollo Turístico',
            'Licenciatura en Terapia Física',
        ];

        foreach ($careers as $career) {
            DB::table('Careers')->insert([
                'name' => $career,
                'academy_id' => rand(1, 4),
            ]);
        }
    }
}
