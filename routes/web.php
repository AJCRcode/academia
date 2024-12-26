<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('dashboard', \App\Http\Controllers\HomeController::class)->name('dashboard');

    Route::view('profile', 'profile')->name('profile');

    //Route::resource('users', 'UserController');
    Route::resource('docente', \App\Http\Controllers\DocenteController::class);
    Route::resource('estudiante', \App\Http\Controllers\EstudianteController::class);
    Route::resource('materia', \App\Http\Controllers\MateriaController::class);
    Route::resource('examen', \App\Http\Controllers\MateriaController::class);
    Route::resource('notas', \App\Http\Controllers\MateriaController::class);
    //Route::resource('questions', PreguntaController::class)->middleware('auth');
    // Rutas para Flashcards

    Route::resource('flashcard', \App\Http\Controllers\FlashcardController::class);

    Route::resource('examen',\App\Http\Controllers\ExamenController::class);

});

require __DIR__.'/auth.php';
