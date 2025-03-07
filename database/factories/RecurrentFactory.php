<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recurrent>
 */
class RecurrentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'description' => $this->faker->sentence,
            'value' => $this->faker->randomFloat(2, 0, 1000),
            'day_of_week' => $this->faker->numberBetween(0, 6),
            'hour' => $this->faker->time(),
            'active' => $this->faker->boolean,
            'psychologist_id' => \App\Models\Psychologist::factory(),
            'patient_id' => \App\Models\Patient::factory(),
        ];
    }
}
