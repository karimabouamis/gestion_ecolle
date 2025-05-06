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
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();
            $table->date('date_evaluation');
            $table->time('heure_evaluation')->nullable();
            $table->string('type_evaluation', 30)->nullable();
            $table->string('matiere_evaluation', 30)->nullable();
            $table->foreignId('id_matiere')->constrained('matieres')->onDelete('cascade');
            $table->foreignId('id_classe')->constrained('classes')->onDelete('cascade');
            $table->foreignId('id_enseignant')->constrained('enseignants')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluations');
    }
};