<?php

namespace App\Livewire\Card;

use Livewire\Component;

class Card extends Component
{
    public string $pregunta;
    public string $respuesta;

    public bool $isOpen = false;

    public function mount($pregunta, $respuesta){
        $this->pregunta = $pregunta;
        $this->respuesta = $respuesta;
    }

    public function render()
    {
        return view('livewire.card.card');
    }

    public function open(){
        $this->isOpen = true;
    }
    public function close(){
        $this->isOpen = false;
    }
}
