<?php

namespace App\Livewire\Card;

use Livewire\Component;

class Card extends Component
{
    public $pregunta;
    public $respuesta;
    public $flashcards;
    public $flashcard;

    public bool $isOpen = false;

    public function mount($flashcard){
        $this->pregunta = $flashcard->question;
        $this->respuesta = $flashcard->answer;
        $this->flashcard = $flashcard;
        $this->flashcards = $flashcard->materia->flashcards;
    }

    public function render()
    {
        return view('livewire.card.card');
    }

    public function next()
    {
        $flashcard = $this->flashcards->where('id', '>', $this->flashcard->id)->first();
        if(!$flashcard){
            $this->flashcard = $this->flashcards->first();
        }
        $this->pregunta = $flashcard->question;
        $this->respuesta = $flashcard->answer;
    }

    public function open(){
        $this->isOpen = true;
    }
    public function close(){
        $this->isOpen = false;
        $this->pregunta = $this->flashcard->question;
        $this->respuesta = $this->flashcard->answer;
    }
}
