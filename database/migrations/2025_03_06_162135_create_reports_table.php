<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * - description
     * - patient_id
     * - psychologist_id
     * - report_template_id
     */
    public function up(): void
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->foreignId('patient_id')->constrained();
            $table->foreignId('psychologist_id')->constrained();
            $table->foreignId('report_template_id')->constrained();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reports', function (Blueprint $table) {
            $table->dropForeign(['patient_id']);
            $table->dropForeign(['psychologist_id']);
            $table->dropForeign(['report_template_id']);
        });
        Schema::dropIfExists('reports');
    }
};
