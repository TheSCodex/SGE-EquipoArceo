<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Project_division;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\projectsDivision>
 */
class Project_divisionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'designated_students' => $this->faker->name,
            'votes_received' => $this->faker->numberBetween(0, 100),
            'academic_consultant' => $this->faker->name,
            'publication_date' => $this->faker->date(),
            'status' => $this->faker->randomElement(['Aprobado', 'En revisión', 'Borrador', 'Cancelado']),
        ];
    }
}
