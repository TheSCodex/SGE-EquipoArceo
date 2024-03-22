<?php

namespace Database\Factories;

use App\Models\Career;
use Illuminate\Database\Eloquent\Factories\Factory;

class CareerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Career::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
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

        return [
            'name' => $this->faker->unique()->randomElement($careers),
            'academy_id' => $this->faker->numberBetween(1, 5),
        ];
    }
}
