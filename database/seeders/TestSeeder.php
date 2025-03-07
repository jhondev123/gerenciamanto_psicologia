<?php

namespace Database\Seeders;

use App\Models\MedicalRecord;
use App\Models\Patient;
use App\Models\Payment;
use App\Models\Person;
use App\Models\Psychologist;
use App\Models\Recurrent;
use App\Models\Report;
use App\Models\Schedule;
use App\Models\Session;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Person::factory(10)->create();
        User::factory(10)->create();
        Patient::factory(10)->create();
        Psychologist::factory(10)->create();
        Session::factory(10)->create();
        Schedule::factory(10)->create();
        Recurrent::factory(10)->create();
        Report::factory(10)->create();
        Payment::factory(10)->create();
        MedicalRecord::factory(10)->create();
    }
}
