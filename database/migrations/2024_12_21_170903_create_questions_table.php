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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('form_id'); // Relación con forms
            $table->unsignedBigInteger('materia_id'); // Relación con materias
            $table->string('titulo');
            $table->text('descripcion')->nullable();
            $table->enum('tipo', ['text', 'radio', 'checkbox']);
            $table->timestamps();
        
            // Relaciones
            $table->foreign('form_id')->references('id')->on('forms')->onDelete('cascade');
            $table->foreign('materia_id')->references('id')->on('materias')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
