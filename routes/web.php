<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::view('dashboard', 'dashboard')->name('dashboard');

    Route::view('profile', 'profile')->name('profile');

    //Route::resource('users', 'UserController');
    Route::resource('docente', \App\Http\Controllers\DocenteController::class);
    Route::resource('estudiante', \App\Http\Controllers\EstudianteController::class);
    Route::resource('materia', \App\Http\Controllers\MateriaController::class);
    Route::resource('examen', \App\Http\Controllers\MateriaController::class);
    Route::resource('notas', \App\Http\Controllers\MateriaController::class);
});

require __DIR__.'/auth.php';
