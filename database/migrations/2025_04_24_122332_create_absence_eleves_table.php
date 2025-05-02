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
        Schema::create('absence_eleves', function (Blueprint $table) {
            $table->id();
            $table->date('date_absence');
            $table->boolean('justifiee')->default(false);
            $table->text('motif')->nullable();
            $table->foreignId('id_eleve')->constrained('eleves')->onDelete('cascade');
            $table->unsignedBigInteger('matiere_id')->nullable(); 
            $table->foreign('matiere_id')
                  ->references('id')->on('matieres')
                  ->onDelete('set null');
            $table->timestamps();
        });
   
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absence_eleves');
    }
};