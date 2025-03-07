<?php

namespace Database\Seeders;

use App\Models\ReportTemplate;
use Illuminate\Database\Seeder;

class ReportTemplatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * - avaliação psicológica
     * - laudo psicológico
     * - atestado psicológico
     * - parecer psicológico
     * - relatório psicosocial
     */
    public function run(): void
    {
        ReportTemplate::create([
            'description' => 'Avaliação psicológica',
        ]);
        ReportTemplate::create([
            'description' => 'Laudo Psicológico',
        ]);
        ReportTemplate::create([
            'description' => 'Atestado Psicológico',
        ]);
        ReportTemplate::create([
            'description' => 'Parecer Psicológico',
        ]);
        ReportTemplate::create([
            'description' => 'Relatório Psicosocial',
        ]);
    }
}
