<?php

namespace App\Livewire\Card;

use App\Models\Flashcard;
use App\Models\Materia;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CardsView extends Component
{
    public $flashcards = null;
    public $materias = null;
    public $materia_id = null;
    public $isChange = false;

    public function mount()
    {
        $this->initializeData();
    }

    public function initializeData($mat_id = null)
    {
        $this->dispatch('flashcardDeleted', $mat_id);
        $this->materias = Auth::user()->hasRole('admin')
            ? Materia::all()
            : Auth::user()->materias;

        $this->materia_id = $this->materias->first()?->id;
        $this->setFlashcards();
    }

    public function updatedMateriaId($value)
    {
        $this->materia_id = $value;
        $this->setFlashcards();
    }

    public function change()
    {
        $this->isChange = !$this->isChange;
    }

    protected function setFlashcards()
    {
        $this->flashcards = Materia::find($this->materia_id)?->flashcards ?? collect();
    }

    public function handleFlashcardDeleted($materia_id)
    {
        if ($this->materia_id == $materia_id) {
            $this->setFlashcards();
        }
    }

    public function render()
    {
        return view('livewire.card.cards-view');
    }
    public function delete(Flashcard $flashcard)
    {
        $flashcard->estado = false;
        if ($flashcard->save()) {
            flash()->success('Eliminado Correctamente');
        }
        $this->setFlashcards();
    }
}
