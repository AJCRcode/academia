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
    public $materia_id, $materias;
    public $isalone = true;
    public $form = [
        'title' => '',
        'description' => '',
        'teacher_id' => null,
        'materia_id' => null,
    ];
    public $questions = [];

    public function mount()
    {
        $this->materias = Auth::user()->hasRole('admin')
            ? Materia::all()
            : Auth::user()->materias;

        $this->materia_id = $this->materias->first()?->id;
        $this->addQuestion(); // Inicializa con una pregunta vacía
    }

    public function rules()
    {
        $rules = [
            'form.title' => 'required|string|max:255',
            'form.description' => 'required|string|max:255',
            'questions' => 'required|array|min:1',
            'questions.*.titulo' => 'required|string|max:255',
            'questions.*.options' => 'required|array|min:1',
            'questions.*.options.*.opcion' => 'required|string|max:255',
        ];

        if ($this->isalone) {
            $rules['form.materia_id'] = 'required|integer|exists:materias,id';
        } else {
            $rules['questions.*.materia_id'] = 'required|integer|exists:materias,id';
        }

        return $rules;
    }

    public function addQuestion()
    {
        $this->questions[] = [
            'titulo' => '',
            'tipo' => 'radio',
            'materia_id' => $this->isalone ? $this->materia_id : null,
            'options' => [['opcion' => '', 'es_correcta' => false]],
        ];
    }

    public function addOption($questionIndex)
    {
        $this->questions[$questionIndex]['options'][] = ['opcion' => '', 'es_correcta' => false];
    }

    public function save()
    {
        $this->validate();

        $form = Form::create([
            'title' => $this->form['title'],
            'description' => $this->form['description'],
            'teacher_id' => auth()->id(),
            'materia_id' => $this->isalone ? $this->form['materia_id'] : null,
        ]);

        foreach ($this->questions as $question) {
            $questionModel = $form->questions()->create([
                'materia_id' => $this->isalone ? $this->form['materia_id'] : $question['materia_id'],
                'titulo' => $question['titulo'],
                'tipo' => $question['tipo'],
            ]);

            $questionModel->options()->createMany($question['options']);
        }

        session()->flash('message', 'Formulario creado con éxito.');
        return redirect()->route('examen.index');
    }

    public function toggleAlone()
    {
        $this->isalone = !$this->isalone;
    }

    public function render()
    {
        return view('livewire.examen.new-form', [
            'materias' => $this->materias,
        ]);
    }
}
