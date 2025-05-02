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
        Schema::create('matieres', function (Blueprint $table) {
            $table->id();
            $table->string('nom_matiere', 50);
            $table->decimal('coefficient', 3, 1)->default(1.0);
            $table->string('langue', 20)->nullable();
            $table->foreignId('id_niveau')->nullable()->constrained('niveaux')->onDelete('set null');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matieres');
    }
};