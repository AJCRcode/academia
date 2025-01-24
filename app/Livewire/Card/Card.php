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
    public bool $isQuestion = true;
    public string $animation = 'animate__backInLeft';

    public function mount($flashcard)
    {
        $this->flashcard = $flashcard;
        $this->flashcards = $flashcard->materia->flashcards;
        $this->updateCardData($flashcard);
    }

    public function render()
    {
        return view('livewire.card.card');
    }

    public function next()
    {
        $nextFlashcard = $this->flashcards->where('id', '>', $this->flashcard->id)->first() ?? $this->flashcards->first();
        $this->animation = 'animate__fadeOut';

        $this->dispatch('change-card', ['animation' => $this->animation]);

        $this->updateCardData($nextFlashcard);
        $this->animation = 'animate__fadeIn';
    }

    public function open()
    {
        $this->isOpen = true;
        $this->animation = 'animate__fadeIn';
    }

    public function close()
    {
        $this->animation = 'animate__fadeOut';
        $this->dispatch('close-modal', ['animation' => $this->animation]);

        $this->isOpen = false;
        $this->updateCardData($this->flashcard);
    }

    public function change()
    {
        $this->animation = '';
        $this->isQuestion = !$this->isQuestion;
        $this->animation = $this->isQuestion? 'animate__rotateInDownLeft':'animate__rotateInDownRight';
    }

    private function updateCardData($flashcard)
    {
        $this->flashcard = $flashcard;
        $this->pregunta = $flashcard->question;
        $this->respuesta = $flashcard->answer;
    }
}
