<?php

namespace App\Livewire\Examen;

use App\Models\Form;
use App\Models\Materia;
use App\Models\Question;
use App\Models\QuestionOption;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class EditForm extends Component
{
    public $form;
    public $questions = [];
    public $isalone = true;
    public $materia_id, $materias;
    public function toggleAlone()
    {
        $this->isalone = !$this->isalone;
    }
    public function mount($formId)
    {
        // Cargar materias según el rol
        $this->materias = Auth::user()->hasRole('admin')
            ? Materia::all()
            : Auth::user()->materias;

        $this->materia_id = $this->materias->first()?->id;

        // Carga el formulario con las preguntas y opciones
        $form = Form::findOrFail($formId);

        // Asigna los datos del formulario a la propiedad
        $this->form = [
            'title' => $form->title,
            'description' => $form->description,
            'materia_id' => $form->materia_id, // Si aplica
        ];

        // Carga las preguntas relacionadas
        $this->questions = $form->questions->map(function ($question) {
            return [
                'id' => $question->id,
                'titulo' => $question->titulo,
                'tipo' => $question->tipo,
                'materia_id' => $question->materia_id,
                'options' => $question->options->map(fn($option) => [
                    'id' => $option->id,
                    'opcion' => $option->opcion,
                    'es_correcta' => $option->es_correcta,
                ])->toArray(),
            ];
        })->toArray();

        $this->isalone = $form->materia_id ? true : false;
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
            'id' => null,
            'titulo' => '',
            'tipo' => 'radio',
            'options' => [['id' => null, 'opcion' => '', 'es_correcta' => false]],
        ];
    }

    public function removeQuestion($index)
    {
        unset($this->questions[$index]);
        $this->questions = array_values($this->questions); // Reindexar array
    }

    public function addOption($questionIndex)
    {
        $this->questions[$questionIndex]['options'][] = ['id' => null, 'opcion' => '', 'es_correcta' => false];
    }

    public function removeOption($questionIndex, $optionIndex)
    {
        unset($this->questions[$questionIndex]['options'][$optionIndex]);
        $this->questions[$questionIndex]['options'] = array_values($this->questions[$questionIndex]['options']); // Reindexar
    }

    public function save()
    {
        $this->validate();

        // Actualizar el formulario
        $this->form->update([
            'title' => $this->form['title'],
            'description' => $this->form['description'],
            'materia_id' => $this->isalone ? $this->form['materia_id'] : null,
        ]);

        Log::info('Formulario actualizado.', ['form' => $this->form->toArray()]);

        // Guardar preguntas y opciones
        $existingQuestionIds = [];

        foreach ($this->questions as $questionData) {
            $question = Question::updateOrCreate(
                ['id' => $questionData['id']],
                [
                    'form_id' => $this->form->id,
                    'titulo' => $questionData['titulo'],
                    'materia_id' => $this->isalone ? $this->form['materia_id'] : $questionData['materia_id'],
                    'tipo' => $questionData['tipo'],
                ]
            );

            $existingQuestionIds[] = $question->id;

            // Guardar opciones
            $existingOptionIds = [];
            foreach ($questionData['options'] as $optionData) {
                $option = QuestionOption::updateOrCreate(
                    ['id' => $optionData['id']],
                    [
                        'question_id' => $question->id,
                        'opcion' => $optionData['opcion'],
                        'es_correcta' => $optionData['es_correcta'] ?? false,
                    ]
                );
                $existingOptionIds[] = $option->id;
            }

            // Eliminar opciones no incluidas
            QuestionOption::where('question_id', $question->id)
                ->whereNotIn('id', $existingOptionIds)
                ->delete();
        }

        // Eliminar preguntas no incluidas
        Question::where('form_id', $this->form->id)
            ->whereNotIn('id', $existingQuestionIds)
            ->delete();

        flash()->success('Formulario actualizado con éxito.');
    }

    public function render()
    {
        return view('livewire.examen.edit-form');
    }
}
