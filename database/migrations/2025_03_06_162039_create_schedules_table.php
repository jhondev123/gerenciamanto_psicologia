<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * - Schedules
     * - id
     * - date
     * - start_time
     * - end_time
     * - psychologist_id
     * - patient_id
     * - created_at
     * - updated_at
     * - deleted_at
     */
    public function up(): void
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->foreignId('psychologist_id')->constrained();
            $table->foreignId('patient_id')->constrained();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('schedules', function (Blueprint $table) {
            $table->dropForeign(['psychologist_id']);
            $table->dropForeign(['patient_id']);
        });
        Schema::dropIfExists('schedules');
    }
};
