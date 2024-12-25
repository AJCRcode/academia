<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Materia;

class FlashcardsIndex extends Component
{
    public $flashcards = null;
    public $materia = null;

    public function mount()
    {
        $this->materia = Materia::all()->first();
        $this->flashcards = $this->materia->flashcards;  // Obtener solo los flashcards de esta materia
    }

    public function render()
    {
        return view('livewire.flashcards-index');
    }
}
