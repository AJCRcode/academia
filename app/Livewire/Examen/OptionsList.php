<?php

namespace App\Livewire\Examen;

use App\Models\Materia;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class OptionsList extends Component
{
    public $options = [];
    public $materias, $isalone=true;
    public function render()
    {
        return view('livewire.examen.options-list');
    }

    public function mount()
    {
        $this->materias = Auth::user()->hasRole('admin')
            ? Materia::all()
            : Auth::user()->materias;
    }


    public function addOption()
    {
        $this->options[] = uniqid();
    }
}
