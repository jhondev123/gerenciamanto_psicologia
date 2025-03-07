<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'session_price' => $this->faker->randomFloat(2, 0, 999999.99),
            'amount_paid' => $this->faker->randomFloat(2, 0, 999999.99),
            'paid' => $this->faker->boolean,
            'date' => $this->faker->date(),
            'description' => $this->faker->text,
            'session_id' => \App\Models\Session::factory(),
        ];
    }
}
