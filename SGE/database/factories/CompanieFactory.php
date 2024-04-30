<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Companie>
 */
class CompanieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'address' => $this->faker->address,
            'phone' => $this->faker->numerify('998######'),
            'email' => $this->faker->unique()->safeEmail,
            'registration_date' => $this->faker->date,
            'rfc' => $this->faker->regexify('[A-Z0-9]{13}'),
            'business_sector_id' => $this->faker->numberBetween(1, 10), // Ajusta el rango según tu necesidad
        ];
    }
}
