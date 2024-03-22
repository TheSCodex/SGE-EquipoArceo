<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'status' => $this->faker->randomElement(['Aprobado', 'En revisión', 'Borrador', 'Cancelado']),
            'like' => $this->faker->numberBetween(0, 100),
            'dislike' => $this->faker->numberBetween(0, 100),
            'start_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'end_date' => $this->faker->dateTimeBetween('now', '+1 year'),
            'adviser_id' => function () {
                return \App\Models\BusinessAdvisor::factory()->create()->id;
            },

        ];
    }
}

