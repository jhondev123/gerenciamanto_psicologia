<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->id();
            $table->text("description");
            $table->integer("feedback");
            $table->foreignId("psychologist_id")->constrained();
            $table->foreignId("patient_id")->constrained();
            $table->foreignId("schedule_id")->constrained();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sessions', function (Blueprint $table) {
            $table->dropForeign(['psychologist_id']);
            $table->dropForeign(['patient_id']);
            $table->dropForeign(['schedule_id']);
        });
        Schema::dropIfExists('sessions');
    }
};
