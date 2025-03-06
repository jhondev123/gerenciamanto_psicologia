<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * - id
     * - description
     * - value
     * - day_of_week
     * - hour
     * - active
     * - psychologist_id
     * - patient_id
     * - created_at
     * - updated_at
     * - deleted_at
     */
    public function up(): void
    {
        Schema::create('recurrents', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->decimal('value', 10, 2);
            $table->tinyInteger('day_of_week');
            $table->time('hour');
            $table->boolean('active')->default(true);
            $table->foreignId('psychologist_id')->constrained();
            $table->foreignId('patient_id')->constrained();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('recurrents', function (Blueprint $table) {
            $table->dropForeign(['psychologist_id']);
            $table->dropForeign(['patient_id']);
        });
        Schema::dropIfExists('recurrents');
    }
};
