<?php

namespace App\Livewire\Profile;

use App\Models\Flashcard;
use App\Models\Materia;
use App\Models\Material;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class NewFashCard extends Component
{
    use WithFileUploads;
    #[Validate('required')]
    public $question;
    #[Validate('required')]
    public $answer;

    #[Validate('required')]
    public $materia;

    public $materias;
    public function mount()
    {
        $this->materias = Auth::user()->hasRole('admin') ? Materia::all():Auth::user()->materias ;
    }
    public function render()
    {
        return view('livewire.profile.new-fash-card');
    }
    public function save(){
        $this->validate();
        $flashcard = Flashcard::create([
            'question' => $this->question,
            'answer' => $this->answer,
            'materia_id' => $this->materia,
        ]);

        $this->dispatch('newFlashCard');

        $this->reset(['question','answer','materia']);

    }
}
