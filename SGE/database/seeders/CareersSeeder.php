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
            ['name' => 'TÉCNICO SUPERIOR UNIVERSITARIO EN ADMINISTRACIÓN, ÁREA CAPITAL HUMANO', 'academy_id' => 7],
            ['name' => 'TÉCNICO SUPERIOR UNIVERSITARIO EN DESARROLLO DE NEGOCIOS, ÁREA MERCADOTECNIA', 'academy_id' => 8],
            ['name' => 'TÉCNICO SUPERIOR UNIVERSITARIO EN CONTADURÍA', 'academy_id' => 9],
            ['name' => 'TÉCNICO SUPERIOR UNIVERSITARIO EN GASTRONOMÍA', 'academy_id' => 6],
            ['name' => 'TÉCNICO SUPERIOR UNIVERSITARIO EN MANTENIMIENTO, ÁREA INSTALACIONES', 'academy_id' => 5],
            ['name' => 'TÉCNICO SUPERIOR UNIVERSITARIO EN MANTENIMIENTO, ÁREA NAVAL', 'academy_id' => 5],
            ['name' => 'TÉCNICO SUPERIOR UNIVERSITARIO EN TECNOLOGÍAS DE LA INFORMACIÓN, ÁREA DESARROLLO DE SOFTWARE MULTIPLATAFORMA', 'academy_id' => 4],
            ['name' => 'TÉCNICO SUPERIOR UNIVERSITARIO EN TECNOLOGÍAS DE LA INFORMACIÓN, ÁREA INFRAESTRUCTURA DE REDES DIGITALES', 'academy_id' => 4],
            ['name' => 'TÉCNICO SUPERIOR UNIVERSITARIO EN TURISMO, ÁREA DESARROLLO DE PRODUCTOS ALTERNATIVOS', 'academy_id' => 1],
            ['name' => 'TÉCNICO SUPERIOR UNIVERSITARIO EN TURISMO, ÁREA HOTELERÍA', 'academy_id' => 1],
            ['name' => 'TÉCNICO SUPERIOR UNIVERSITARIO EN TERAPIA FÍSICA', 'academy_id' => 4],
            ['name' => 'LICENCIATURA EN GESTIÓN DEL CAPITAL HUMANO', 'academy_id' => 4],
            ['name' => 'LICENCIATURA EN INNOVACIÓN DE NEGOCIOS Y MERCADOTECNIA', 'academy_id' => 4],
            ['name' => 'LICENCIATURA EN CONTADURÍA', 'academy_id' => 4],
            ['name' => 'LICENCIATURA EN GASTRONOMÍA', 'academy_id' => 3],
            ['name' => 'INGENIERÍA EN MANTENIMIENTO INDUSTRIAL', 'academy_id' => 5],
            ['name' => 'INGENIERÍA EN DESARROLLO Y GESTIÓN DE SOFTWARE', 'academy_id' => 4],
            ['name' => 'INGENIERÍA EN REDES INTELIGENTES Y CIBERSEGURIDAD', 'academy_id' => 1],
            ['name' => 'LICENCIATURA EN GESTIÓN Y DESARROLLO TURÍSTICO', 'academy_id' => 3],
            ['name' => 'LICENCIATURA EN TERAPIA FÍSICA', 'academy_id' => 1],
            ['name' => 'SIN ESPECIALIDAD', 'academy_id' => null],
        ];

        // ['name' => 'TSU en Administración área Capital Humano', 'academy_id' => 7],
        // ['name' => 'TSU en Desarrollo de Negocios área Mercadotecnia', 'academy_id' => 8],
        // ['name' => 'TSU en Contaduría', 'academy_id' => 9],
        // ['name' => 'TSU en Gastronomía', 'academy_id' => 6],
        // ['name' => 'TSU en Mantenimiento área Instalaciones', 'academy_id' => 5],
        // ['name' => 'TSU en Mantenimiento área Naval', 'academy_id' => 5],
        // ['name' => 'TSU en Tecnologías de la Información área Desarrollo de Software Multiplataforma', 'academy_id' => 4],
        // ['name' => 'TSU en Tecnologías de la Información área Infraestructura de Redes Digitales', 'academy_id' => 4],
        // ['name' => 'TSU en Turismo área Desarrollo de Productos Alternativos', 'academy_id' => 1],
        // ['name' => 'TSU en Turismo área Hotelería', 'academy_id' => 1],
        // ['name' => 'TSU en Terapia Física', 'academy_id' => 4],
        // ['name' => 'Licenciatura en Gestión del Capital Humano', 'academy_id' => 4],
        // ['name' => 'Licenciatura en Innovación de Negocios y Mercadotecnia', 'academy_id' => 4],
        // ['name' => 'Licenciatura en Contaduría', 'academy_id' => 4],
        // ['name' => 'Licenciatura en Gastronomía', 'academy_id' => 3],
        // ['name' => 'Ingeniería en Mantenimiento Industrial', 'academy_id' => 5],
        // ['name' => 'Ingeniería en Desarrollo y Gestión de Software', 'academy_id' => 4],
        // ['name' => 'Ingeniería en Redes Inteligentes y Ciberseguridad', 'academy_id' => 1],
        // ['name' => 'Licenciatura en Gestión y Desarrollo Turístico', 'academy_id' => 3],
        // ['name' => 'Licenciatura en Terapia Física', 'academy_id' => 1],
        // ['name' => 'Sin especialidad', 'academy_id' => null],
    
        foreach ($careers as $career) {
            DB::table('Careers')->insert($career);
        }
    }
    
    
}
