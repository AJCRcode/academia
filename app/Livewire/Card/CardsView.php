<?php

namespace App\Livewire\Card;

use App\Models\Materia;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CardsView extends Component
{
    public $flashcards = null;
    public $materias = null;
    public $materia_id = null;

    public function mount()
    {
        $this->initializeData();
    }

    public function initializeData()
    {
        $this->materias = Auth::user()->hasRole('admin')
            ? Materia::all()
            : Auth::user()->materias;

        $this->materia_id = $this->materias->first()?->id; // Seleccionar la primera materia
        $this->setFlashcards();
    }

    public function updatedMateriaId($value)
    {
        $this->materia_id = $value;
        $this->setFlashcards();
    }

    protected function setFlashcards()
    {
        $this->flashcards = Materia::find($this->materia_id)?->flashcards ?? collect();
    }

    public function render()
    {
        return view('livewire.card.cards-view');
    }
}
