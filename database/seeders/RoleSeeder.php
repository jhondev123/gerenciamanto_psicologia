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
        Role::created([
            'name' => 'Admin',
            'description' => 'Administrador do sistema',
        ]);
        Role::created([
            'name' => 'Manager',
            'description' => 'Gerente do sistema',
        ]);
        Role::created([
            'name' => 'Psychologist',
            'description' => 'Psicólogo',
        ]);
        Role::created([
            'name' => 'Patient',
            'description' => 'Paciente',
        ]);
        Role::created([
            'name' => 'Secretary',
            'description' => 'Secretário',
        ]);
    }
}
