<?php

namespace App\Livewire\Users;

use App\Models\Materia;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;

class AsigmentMateria extends Component
{
    public $user = null;
    public $isactive = 'blur-xl';
    //public $isactive = '';

    #[On('newUser')]
    public function habilited(User $id,$nombre) {
        $this->user = $id;
        $this->isactive = $this->user != null ? '' : 'blur-3xl';
    }
    public function render()
    {
        if ($this->user != null) {
            $materias_user = $this->user->materias;
            $materias_not = Materia::all()->diff($materias_user);
            return view('livewire.users.asigment-materia', compact('materias_not','materias_user'));
        }
        return view('livewire.users.asigment-materia');
    }

    public function addMateria($materia)
    {
        $this->user->materias()->attach($materia);
    }
    public function removeMateria($materia){
        $this->user->materias()->detach($materia);
    }
}
