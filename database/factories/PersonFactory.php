<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Person>
 */
class PersonFactory extends Factory
{
    /**
     * Define the model's default state.
     *$table->string('name');
     * $table->string('email')->unique();
     * $table->string('phone')->nullable();
     * $table->string('cpf')->unique();
     * $table->string('rg')->unique()->nullable();
     * $table->date('birth_date')->nullable();
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'cpf' => $this->faker->unique()->cpf,
            'rg' => $this->faker->unique()->rg,
            'birth_date' => $this->faker->date(),
        ];
    }
}
