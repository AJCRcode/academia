<?php

namespace App\Livewire\Examen;

use App\Models\Materia;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use function Symfony\Component\Translation\t;

class QuestionForm extends Component
{
    public $materia_id;
    public $materias;

    public $question;
    public $titulo, $descripcion, $tipo, $opciones = [], $respuesta_correcta;

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

    public function save()
    {
        $data = $this->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'tipo' => 'required|in:radio,checkbox',
            'opciones' => 'required|array|min:5|max:5',
            'respuesta_correcta' => 'required|string|in:A,B,C,D,E',
        ]);

        $data['materia_id'] = $this->materia->id;

        if ($this->question) {
            $this->question->update($data);
            session()->flash('message', 'Pregunta actualizada con éxito.');
        } else {
            Question::create($data);
            session()->flash('message', 'Pregunta creada con éxito.');
        }

        return redirect()->route('materia.questions.index', $this->materia->id);
    }

    public function render()
    {
        return view('livewire.examen.question-form');
    }
}
