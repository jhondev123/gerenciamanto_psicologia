<?php

namespace Tests\Feature\V1\Auth\Register;

use App\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\ApiTestCase;
use App\Models\User;

class RegisterTest extends ApiTestCase
{
    use RefreshDatabase;
    private int $roleId;
    public function setUp():void
    {
        parent::setUp();
        Role::create([
            'name' => 'Admin',
            'description' => 'admin',
        ]);
        Role::create([
            'name' => 'Psychologist',
            'description' => 'psychologist',
        ]);
        Role::create([
            'name' => 'Patient',
            'description' => 'patient',
        ]);
    }
    public function createAccount(
        string $name,
        string $email,
        string $phone,
        string $cpf,
        string $password
    ) {
        /**
         *
         */
        return $this->postJson(route('v1.auth.register'), [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'cpf' => $cpf,
            'password' => $password,
            'password_confirmation' => $password,
        ]);
    }

    public function test_create_valid_account()
    {
        /**
         * "name": "Test",
         * "email": "Test@gmail.com",
         * "phone": "45999128675",
         * "cpf": "09914581099",
         * "password": "Test123$",
         * "password_confirmation": "Test123$"
         */
        $response = $this->createAccount(
            'Test User',
            'test@gmail.com',
            '45999887766',
            '09914581099',
            'Valid@123'
        );
        dd($response->json());

        $response->assertStatus(201);
    }

    public function test_create_account_with_duplicate_email()
    {
        User::factory()->create(['email' => 'test@gmail.com']);

        $response = $this->createAccount(
            'Test User',
            'test@gmail.com',
            '45999887766',
            '09914581099',
            'Valid@123'
        );

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['email']);
    }

    public function test_create_account_with_invalid_email()
    {
        $response = $this->createAccount(
            'Test User',
            'invalid-email',
            '45999887766',
            '09914581099',
            'Valid@123'
        );

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['email']);
    }

    public function test_create_account_with_weak_password()
    {
        $response = $this->createAccount(
            'Test User',
            'test2@gmail.com',
            '45999887766',
            '09914581099',
            '123'
        );

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['password']);
    }
}
