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
        ReportTemplate::created([
            'description' => 'Avaliação psicológica',
        ]);
        ReportTemplate::created([
            'description' => 'Laudo Psicológico',
        ]);
        ReportTemplate::created([
            'description' => 'Atestado Psicológico',
        ]);
        ReportTemplate::created([
            'description' => 'Parecer Psicológico',
        ]);
        ReportTemplate::created([
            'description' => 'Relatório Psicosocial',
        ]);
    }
}
