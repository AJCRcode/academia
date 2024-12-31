<?php

namespace App\Livewire\Examen;

use App\Models\Materia;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\On;
use Livewire\Component;

class QuestionList extends Component
{
    public $isAlone = true;
    public $isView = true;
    public $formId;
    public $materiaId = null;
    public $preguntas = [];
    public $preguntasContent = [];
    public $materia = '';
    public $materias;

    // Escuchadores de eventos personalizados
    #[On('newFormAlone')]
    public function newFormAlone(array $request)
    {
        $this->isView = true;
        $this->formId = $request['form_id'];
        $this->materiaId = $request['materia_id'];
        $this->materia = Materia::find($this->materiaId)->nombre;
    }

    #[On('newFormMaterias')]
    public function newForm($formId)
    {
        $this->isView = true;
        $this->formId = $formId;
    }

    // Agrega una nueva pregunta
    public function addContent()
    {
        $uniqueId = uniqid();
        $this->preguntas[] = $uniqueId;
        $this->preguntasContent[$uniqueId] = new Question(['titulo' => "Pregunta $uniqueId"]);
    }

    // Envía y guarda las preguntas
    public function submit()
    {
        try {
            foreach ($this->preguntasContent as $pregunta) {
                $pregunta->save();
            }

            $this->dispatchBrowserEvent('success', ['message' => 'Preguntas guardadas exitosamente.']);
        } catch (\Exception $e) {
            throw ValidationException::withMessages(['error' => 'Ocurrió un error al guardar las preguntas.']);
        }
    }   

    // Renderiza el componente
    public function render()
    {
        return view('livewire.examen.question-list', [
            'materias' => Materia::all(), // Opción para cargar materias en la vista si es necesario
        ]);
    }
}
