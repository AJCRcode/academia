<?php

namespace App\Livewire\Users;

use App\Models\Materia;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class ReasigmentMateria extends Component
{
    public $user = null;
    //public $isactive = 'blur-3xl';
    public $isactive = '';

    public function mount(User $user){
        $this->user = $user;
    }

    public function render()
    {
        $materias_user = $this->user->materias;
        $materias_not = Materia::all()->diff($materias_user);
        return view('livewire.users.reasigment-materia', compact('materias_not','materias_user'));
    }

    public function addMateria($materia)
    {
        $this->user->materias()->attach($materia);
    }

    public function removeMateria($materia){
        $this->user->materias()->detach($materia);
    }
}
