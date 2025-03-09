<?php

namespace Database\Seeders;

use App\Models\Person;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * $table->string('name');
     * $table->string('email')->unique();
     * $table->string('phone')->nullable();
     * $table->string('cpf')->unique();
     * $table->string('rg')->unique()->nullable();
     * $table->date('birth_date')->nullable();
     */
    public function run(): void
    {
        $person = Person::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'phone' => '12345678901',
            'cpf' => '12345678901',
            'rg' => '12345678901',

            'birth_date' => '1990-01-01',
        ]);
        User::create([
            'email' => 'admin@gmail.com',
            'password' => bcrypt('Admin123$'),
            'people_id' => $person->id,
            'role_id' => 1
            ]);

    }
}
