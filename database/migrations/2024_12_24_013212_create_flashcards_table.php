<?php

// database/migrations/xxxx_xx_xx_create_flashcards_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlashcardsTable extends Migration
{
    public function up()
    {
        Schema::create('flashcards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('materia_id')->constrained()->onDelete('cascade'); // Relación con Materia
            $table->text('question'); // La pregunta
            $table->text('answer'); // La respuesta
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('flashcards');
    }
}

