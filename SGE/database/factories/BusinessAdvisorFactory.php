<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\BusinessAdvisor;


class BusinessAdvisorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'position' => $this->faker->word,
            'companie_id' =>  $this->faker->unique()->numberBetween(1, 10)
            // Agrega más atributos y valores según sea necesario
        ];
    }
}
