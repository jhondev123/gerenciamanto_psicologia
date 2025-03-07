<?php

namespace Database\Seeders;

use App\Models\Configuration;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * - session_price
     * - session_price_recurrent
     * - work_hours
     * - work_days
     * - session_duration
     * - IA Suggestions
     */
    public function run(): void
    {
        Configuration::create([
            "key" => "session_price",
            'description' => 'Preço da sessão',
            'value' => 100.00,
        ]);
        Configuration::create([
            "key" => "session_price_recurrent",
            'description' => 'Preço da sessão recorrente',
            'value' => 90.00,
        ]);
        Configuration::create([
            "key" => "work_hours",
            'description' => 'Horas de expediente',
            'value' => 8,
        ]);
        // Dias da semana que o psicólogo trabalha começando de segunda a domingo
        // Exemplo: 1;2;3;4;5
        Configuration::create([
            "key" => "work_days",
            'description' => 'Dias de trabalho',
            'value' => "1;2;3;4;5",
        ]);
        Configuration::create([
            "key" => "session_duration",
            'description' => 'Duração da sessão em minutos',
            'value' => 60,
        ]);
        //
        /**
         * Booleano para ativar ou desativar as sugestões de IA
         */
        Configuration::create([
            "key" => "ia_suggestions",
            'description' => 'Sugestões de IA',
            'value' => 1,
        ]);
    }
}
