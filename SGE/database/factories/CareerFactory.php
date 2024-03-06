<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Career>
 */
class CareerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * 
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'division_id' => $this->faker->numberBetween(1, 5),

        ];
    }
}