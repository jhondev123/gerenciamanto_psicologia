<?php

namespace Tests\Feature\V1\Auth\Login;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\ApiTestCase;

class LoginTest extends ApiTestCase
{
    use RefreshDatabase;

    private function createAccount(string $email, string $password): User
    {
        return User::factory()->create([
            'email' => $email,
            'password' => bcrypt($password),
        ]);
    }

    public function test_login_with_valid_credentials(): void
    {
        $email = 'test@example.com';
        $password = 'Valid@123';
        $this->createAccount($email, $password);

        $response = $this->postJson(route('v1.auth.login'), [
            'email' => $email,
            'password' => $password,
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure(['token']);
    }

    public function test_login_with_invalid_email(): void
    {
        $this->createAccount('test@example.com', 'Valid@123');

        $response = $this->postJson(route('v1.auth.login'), [
            'email' => 'invalid@example.com',
            'password' => 'Valid@123',
        ]);

        $response->assertStatus(401)
            ->assertJson(['message' => 'Unauthorized']);
    }

    public function test_login_with_invalid_password(): void
    {
        $this->createAccount('test@example.com', 'Valid@123');

        $response = $this->postJson(route('v1.auth.login'), [
            'email' => 'test@example.com',
            'password' => 'Wrong@123',
        ]);

        $response->assertStatus(401)
            ->assertJson(['message' => 'Unauthorized']);
    }
}
