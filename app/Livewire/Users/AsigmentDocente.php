<?php

namespace App\Livewire\Users;

use App\Models\Materia;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class AsigmentDocente extends Component
{
    public $materia = null;
    public $isactive = ' blur-xl';
    //public $isactive = '';

    #[On('newMateria')]
    public function habilited(Materia $materia) {
        $this->materia = $materia;
        $this->isactive = $this->materia != null ? '' : 'blur-3xl';
    }
    public function render()
    {
        if ($this->materia != null) {
            $docentes_list = $this->materia->docentes;
            $docentes_not = Role::findByName('docente')->users()->get()->diff($docentes_list);//
            return view('livewire.users.asigment-docente', compact('docentes_not', 'docentes_list'));
        }
        return view('livewire.users.asigment-docente');
    }

    public function addDocente($docente)
    {
        $this->materia->docentes()->attach($docente);
    }
    public function removeDocente($docente){
        $this->materia->docentes()->detach($docente);
    }
}
