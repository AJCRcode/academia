<?php

namespace App\Livewire\Examen;

use App\Models\Form;
use App\Models\Materia;
use App\Models\Question;
use App\Models\QuestionOption;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class EditForm extends Component
{
    public $form = [
        'id' => null,
        'title' => '',
        'description' => '',
        'materia_id' => null, // Materia asociada
    ];

    public $questions = []; // Preguntas del formulario
    public $isalone = true; // Estado del formulario (independiente o no)
    public $materia_id, $materias; // Materias disponibles para selección

    /**
     * Inicializa el componente con datos del formulario.
     */
    public function mount($formId)
    {
        // Cargar materias según el rol del usuario
        $this->materias = Auth::user()->hasRole('admin')
            ? Materia::all()
            : Auth::user()->materias;

        $this->materia_id = $this->materias->first()?->id;

        // Cargar el formulario y sus preguntas
        $form = Form::with('questions.options')->findOrFail($formId);

        $this->form = [
            'id' => $form->id,
            'title' => $form->title,
            'description' => $form->description,
            'materia_id' => $form->materia_id,
        ];

        // Preparar las preguntas y sus opciones
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

    /**
     * Reglas de validación para el formulario.
     */
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

    /**
     * Cambiar el estado de independencia del formulario.
     */
    public function toggleAlone()
    {
        $this->isalone = !$this->isalone;
    }

    /**
     * Agregar una nueva pregunta al formulario.
     */
    public function addQuestion()
    {
        $this->questions[] = [
            'id' => null,
            'titulo' => '',
            'tipo' => 'radio',
            'options' => [['id' => null, 'opcion' => '', 'es_correcta' => false]],
        ];
    }

    /**
     * Eliminar una pregunta del formulario.
     */
    public function removeQuestion($index)
    {
        unset($this->questions[$index]);
        $this->questions = array_values($this->questions);
    }

    /**
     * Agregar una nueva opción a una pregunta específica.
     */
    public function addOption($questionIndex)
    {
        $this->questions[$questionIndex]['options'][] = ['id' => null, 'opcion' => '', 'es_correcta' => false];
    }

    /**
     * Eliminar una opción de una pregunta específica.
     */
    public function removeOption($questionIndex, $optionIndex)
    {
        unset($this->questions[$questionIndex]['options'][$optionIndex]);
        $this->questions[$questionIndex]['options'] = array_values($this->questions[$questionIndex]['options']);
    }

    /**
     * Guardar el formulario junto con sus preguntas y opciones.
     */
    public function save()
    {
        $this->validate();

        DB::transaction(function () {
            // Actualizar el formulario
            $form = Form::findOrFail($this->form['id']);
            $form->update([
                'title' => $this->form['title'],
                'description' => $this->form['description'],
                'materia_id' => $this->isalone ? $this->form['materia_id'] : null,
            ]);

            Log::info('Formulario actualizado.', ['form' => $form]);

            $existingQuestionIds = [];
            foreach ($this->questions as $questionData) {
                $question = Question::updateOrCreate(
                    ['id' => $questionData['id']],
                    [
                        'form_id' => $form->id,
                        'titulo' => $questionData['titulo'],
                        'materia_id' => $this->isalone ? $form->materia_id : $questionData['materia_id'],
                        'tipo' => $questionData['tipo'],
                    ]
                );

                $existingQuestionIds[] = $question->id;

                // Actualizar opciones de la pregunta
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
            Question::where('form_id', $form->id)
                ->whereNotIn('id', $existingQuestionIds)
                ->delete();
        });

        flash()->success('Formulario actualizado con éxito.');

        return redirect()->route('examen.index');
    }

    /**
     * Renderizar la vista del componente.
     */
    public function render()
    {
        return view('livewire.examen.edit-form');
    }
}
