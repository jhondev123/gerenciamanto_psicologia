<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations
     * - Payments
     * - id
     * - session_price
     * - amount_paid
     * - paid
     * - date
     * - description
     * - session_id
     * - patient_id
     * - psychologist_id
     * - created_at
     * - updated_at
     * - deleted_at
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->decimal('session_price', 8, 2);
            $table->decimal('amount_paid', 8, 2);
            $table->boolean('paid')->default(false);
            $table->date('date');
            $table->string('description')->nullable();
            $table->foreignId('session_id')->constrained()->onDelete('cascade');
            $table->foreignId('patient_id')->constrained()->onDelete('cascade');
            $table->foreignId('psychologist_id')->constrained()->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->dropForeign(['session_id']);
            $table->dropForeign(['patient_id']);
            $table->dropForeign(['psychologist_id']);
        });
        Schema::dropIfExists('payments');
    }
};
