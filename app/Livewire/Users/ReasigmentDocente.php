<?php

namespace App\Livewire\Users;

use App\Models\Materia;
use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class ReasigmentDocente extends Component
{
    public $materia = null;
    public $isactive = 'blur-3xl';
    //public $isactive = '';

    public function mount(Materia $materia){
        $this->materia = $materia;
    }

    public function render()
    {
        $docentes_list = $this->materia->docentes;
        $docentes_not = Role::findByName('docente')->users()->get()->diff($docentes_list);//
        return view('livewire.users.reasigment-docente', compact('docentes_not', 'docentes_list'));
    }
    public function addDocente($docente)
    {
        $this->materia->docentes()->attach($docente);
    }
    public function removeDocente($docente){
        $this->materia->docentes()->detach($docente);
    }
}
