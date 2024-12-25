<?php

namespace App\Livewire\Card;

use App\Models\Materia;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CardsView extends Component
{
    public $flashcards = null;
    public $materia = null;
    public $materias = null;

    public function mount()
    {
        if (Auth::user()->hasRole('admin')) {
            $this->materias = Materia::all();
        }else{
            $this->materias = Auth::user()->materias;
        }
        $this->materia = $this->materias->first();
        $this->flashcards = $this->materia->flashcards;
    }

    public function render()
    {
        return view('livewire.card.cards-view');
    }
}
