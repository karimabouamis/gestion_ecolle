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
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->text('observation')->nullable();
            $table->foreignId('id_evaluation')->constrained('evaluations')->onDelete('cascade');
            $table->foreignId('id_eleve')->constrained('eleves')->onDelete('cascade');
            $table->decimal('valeur', 4, 2);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};