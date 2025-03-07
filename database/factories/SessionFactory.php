<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Session>
 */
class SessionFactory extends Factory
{
    /**
     * Define the model's default state.
     *$table->text("description");
     * $table->integer("feedback");
     * $table->foreignId("psychologist_id")->constrained();
     * $table->foreignId("patient_id")->constrained();
     * $table->foreignId("schedule_id")->constrained();
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "description" => $this->faker->text(),
            "feedback" => $this->faker->randomNumber(),
            "psychologist_id" => \App\Models\Psychologist::factory(),
            "patient_id" => \App\Models\Patient::factory(),
            "schedule_id" => \App\Models\Schedule::factory(),

        ];
    }
}
