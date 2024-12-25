<?php

// app/Http/Controllers/FlashcardController.php
// app/Http/Controllers/FlashcardController.php
namespace App\Http\Controllers;

use App\Models\Flashcard;
use App\Models\Materia;
use Illuminate\Http\Request;

class FlashcardController extends Controller
{
    public function index()
    {
        return view('flashcards.index');
    }


    public function create(Materia $materia)
    {
        return view('flashcards.create', compact('materia'));
    }

    public function store(Request $request, Materia $materia)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        Flashcard::create([
            'materia_id' => $materia->id,
            'question' => $request->question,
            'answer' => $request->answer,
        ]);

        return redirect()->route('flashcards.index', $materia)->with('success', 'Flashcard creada exitosamente.');
    }

    public function edit(Flashcard $flashcard)
    {
        return view('flashcards.edit', compact('flashcard'));
    }

    public function update(Request $request, Flashcard $flashcard)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        $flashcard->update($request->all());

        return redirect()->route('flashcards.index', $flashcard->materia)->with('success', 'Flashcard actualizada exitosamente.');
    }

    public function destroy(Flashcard $flashcard)
    {
        $flashcard->delete();
        return redirect()->route('flashcards.index', $flashcard->materia)->with('success', 'Flashcard eliminada.');
    }
}
