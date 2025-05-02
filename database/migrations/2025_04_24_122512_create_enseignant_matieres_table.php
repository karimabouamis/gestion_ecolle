<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('enseignant_matieres', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->unsignedBigInteger('id_matiere')->nullable(); 
            $table->foreign('id_matiere')
                  ->references('id')->on('matieres')
                  ->onDelete('set null');
            $table->foreignId('id_classe')->constrained('classes')->onDelete('cascade');
            $table->foreignId('id_annee_scolaire')->constrained('annee_scolaires')->onDelete('cascade');
            $table->foreignId('id_enseignant')->constrained('enseignants')->onDelete('cascade');
            $table->timestamps();
        });
    }

   
    public function down(): void
    {
        Schema::dropIfExists('enseignant_matieres');
    }
};