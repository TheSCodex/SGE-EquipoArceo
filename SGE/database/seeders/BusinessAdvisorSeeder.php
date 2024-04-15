<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\BusinessAdvisor;
use App\Models\Company;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class BusinessAdvisorSeeder extends Seeder
{
    public function run()
    {
        // Obtener todas las compañías disponibles
        $companies = Company::all();

        // Crear 10 asesores empresariales
        for ($i = 0; $i < 10; $i++) {
            // Generar números de teléfono aleatorios
            $phone = '5512345678'; // Prefijo del país
            

            // Generar datos aleatorios para cada asesor
            $advisorData = [
                'name' => 'Asesor ' . ($i + 1),
                'email' => 'asesor' . ($i + 1) . '@example.com',
                'phone' => $phone, // Número de teléfono aleatorio generado
                'position' => 'Posición ' . ($i + 1),
                'companie_id' => $companies->random()->id, // Seleccionar una compañía aleatoria para cada asesor
            ];

            // Validar los datos del asesor usando las reglas de validación especificadas
            $validator = Validator::make($advisorData, [
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:business_advisors,email|max:255',
                'phone' => 'required|string|size:10|regex:/^[0-9]+$/',
                'position' => 'required|string|max:50',
                'companie_id' => 'required|exists:companies,id',
            ]);

            // Verificar si hay errores de validación
            if ($validator->fails()) {
                // Si hay errores, mostrarlos y omitir la creación del asesor
                $errors = $validator->errors()->all();
                foreach ($errors as $error) {
                    $this->command->warn('Error en la validación: ' . $error);
                }
                continue;
            }

            // Si no hay errores de validación, crear el asesor
            BusinessAdvisor::create($advisorData);
            $this->command->info('Asesor creado correctamente: ' . $advisorData['name']);
        }
    }
}

