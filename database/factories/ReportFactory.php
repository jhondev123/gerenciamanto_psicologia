<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Report>
 */
class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date' => $this->faker->date(),
            'description' => $this->faker->text(),
            'patient_id' => \App\Models\Patient::factory(),
            'psychologist_id' => \App\Models\Psychologist::factory(),
            'report_template_id' => 1,
        ];
    }
}
