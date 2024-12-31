<?php

namespace App\Livewire\Examen;

use App\Models\Materia;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Form;
use App\Models\Question;
use App\Models\QuestionOption;
class NewForm extends Component
{
    public $materia_id,$materias;
    public $isalone = true ;
    public $form = [
        'title' => '',
        'description' => '',
        'teacher_id' => null, // Asigna el ID del docente actual
        'materia_id' => null,
    ];

    public $questions = []; // Array para las preguntas dinámicas

    public function mount()
    {
        $this->materias = Auth::user()->hasRole('admin')
            ? Materia::all()
            : Auth::user()->materias;
        $this->materia_id = $this->materias->first()?->id;
        // Inicializa con un formulario vacío
        $this->questions = [
            [
                'titulo' => '',
                'tipo' => 'radio', // Tipo por defecto
                'options' => [
                    ['opcion' => '', 'es_correcta' => false]
                ]
            ]
        ];
    }

    public function updatedMateriaId($value)
    {
        $this->materia_id = $value;
    }

    public function changealone()
    {
        $this->isalone = !$this->isalone;
    }

    public function addQuestion()
    {
        $this->questions[] = [
            'titulo' => '',
            'tipo' => 'radio',
            'materia_id' => null,
            'options' => [
                ['opcion' => '', 'es_correcta' => false]
            ]
        ];
    }

    public function removeQuestion($index)
    {
        unset($this->questions[$index]);
        $this->questions = array_values($this->questions); // Reindexar el array
    }

    public function addOption($questionIndex)
    {
        $this->questions[$questionIndex]['options'][] = ['opcion' => '', 'es_correcta' => false];
    }

    public function removeOption($questionIndex, $optionIndex)
    {
        unset($this->questions[$questionIndex]['options'][$optionIndex]);
        $this->questions[$questionIndex]['options'] = array_values($this->questions[$questionIndex]['options']); // Reindexar
    }

    public function save()
    {
        // Validación básica
        if($this->isalone){
            $this->validate([
                'form.title' => 'required|string|max:255',
                'form.description' => 'required|string|max:255',
                'form.materia_id' => 'required|integer|exists:materias,id',
                'questions' => 'required|array|min:1',
                'questions.*.titulo' => 'required|string|max:255',
                'questions.*.options' => 'required|array|min:1',
                'questions.*.options.*.opcion' => 'required|string|max:255',
            ]);
        }else{
            $this->validate([
                'form.title' => 'required|string|max:255',
                'form.description' => 'required|string|max:255',
                'questions' => 'required|array|min:1',
                'questions.*.titulo' => 'required|string|max:255',
                'questions.*.materia_id' => 'required|integer|exists:materias,id',
                'questions.*.options' => 'required|array|min:1',
                'questions.*.options.*.opcion' => 'required|string|max:255',
            ]);
        }

        // Crear el formulario
        $form = Form::create([
            'title' => $this->form['title'],
            'description' => $this->form['description'],
            'teacher_id' => auth()->id(), // Asigna el ID del usuario autenticado
            'materia_id' => $this->isalone ? $this->form['materia_id'] : null,
        ]);

        // Crear las preguntas y opciones
        foreach ($this->questions as $question) {
            $questionModel = Question::create([
                'form_id' => $form->id,
                'materia_id' => $this->isalone ? $this->form['materia_id'] : $question['materia_id'],
                'titulo' => $question['titulo'],
                'tipo' => $question['tipo'],
            ]);

            foreach ($question['options'] as $option) {
                QuestionOption::create([
                    'question_id' => $questionModel->id,
                    'opcion' => $option['opcion'],
                    'es_correcta' => $option['es_correcta'],
                ]);
            }
        }

        session()->flash('message', 'Formulario creado con éxito.');
        return redirect()->route('examen.index'); // Redirige a una lista de formularios
    }

    public function render()
    {
        return view('livewire.examen.new-form');
    }
}
