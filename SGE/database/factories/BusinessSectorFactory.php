<?php

namespace Database\Factories;

use App\Models\Companie;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BusinessSector>
 */
class BusinessSectorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $sectors = [
            'Tecnología de la Información',
            'Salud',
            'Educación',
            'Finanzas',
            'Manufactura',
            'Comercio minorista',
            'Servicios profesionales',
        ];

        $randomIndex = array_rand($sectors);

        return [
            'title' => $sectors[$randomIndex],
        ];
    }
    public function companies()
    {
        return $this->hasMany(Companie::class);
    }
}
