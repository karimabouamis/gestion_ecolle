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
        Schema::create('eleves', function (Blueprint $table) {
            $table->id();
            
            $table->string('nom', 50);
            $table->string('prenom', 50);
            $table->text('adresse')->nullable();
            $table->string('email', 100)->nullable();
            $table->string('tel', 15)->nullable();
            $table->string('genre',50);
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
            $table->foreignId('id_classe')->nullable()->constrained('classes')->onDelete('set null');
            $table->string('photo')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eleves');
    }
};