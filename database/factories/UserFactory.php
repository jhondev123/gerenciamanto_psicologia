<?php

namespace Database\Factories;

use App\Models\Person;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *$table->foreignId('role_id')->constrained('roles', 'id');
     * $table->foreignId('people_id')->constrained('people', 'id');
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'role_id' => Role::factory(),
            'people_id' => \App\Models\Person::factory(),
            'password' => static::$password ??= Hash::make('password'),
            'email' => $this->faker->unique()->safeEmail,
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
