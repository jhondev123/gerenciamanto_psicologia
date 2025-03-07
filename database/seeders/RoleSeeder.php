<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * - admin
     * - manager
     * - psychologist
     * - patient
     * - secretary
     */
    public function run(): void
    {
        Role::create([
            'name' => 'Admin',
            'description' => 'Administrador do sistema',
        ]);
        Role::create([
            'name' => 'Manager',
            'description' => 'Gerente do sistema',
        ]);
        Role::create([
            'name' => 'Psychologist',
            'description' => 'Psicólogo',
        ]);
        Role::create([
            'name' => 'Patient',
            'description' => 'Paciente',
        ]);
        Role::create([
            'name' => 'Secretary',
            'description' => 'Secretário',
        ]);
    }
}
