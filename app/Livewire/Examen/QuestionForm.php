<?php

namespace App\Livewire\Examen;

use App\Models\Form;
use App\Models\Materia;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use function Symfony\Component\Translation\t;

class QuestionForm extends Component
{
    public $materia_id,$materias;
    public $isalone = true ;
    public $issubmit = false;
    public $title, $description;

    public function mount()
    {
        $this->materias = Auth::user()->hasRole('admin')
            ? Materia::all()
            : Auth::user()->materias;
        $this->materia_id = $this->materias->first()?->id;
    }

    public function updatedMateriaId($value)
    {
        $this->materia_id = $value;
    }

    public function next()
    {
        $data = $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $data['teacher_id'] = Auth::id();
        $data['materia_id'] = $this->isalone ? $this->materia_id : null;

        $this->issubmit = true;

        $formulario = Form::create($data);

        if ($this->isalone){
            $this->dispatch('newFormAlone', ['form_id' => $formulario->id, 'materia_id' => $this->materia_id]);
        }else{
            $this->dispatch( 'newFormMaterias', ['form_id' => $formulario->id]);
        }

    }

    public function render()
    {
        return view('livewire.examen.question-form');
    }

}
