<?php

namespace App\Livewire\Examen;

use App\Models\Materia;
use App\Models\Form;
use App\Models\Question;
use App\Models\QuestionOption;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NewForm extends Component
{
    public ?int $materia_id = null;
    public $materias;
    public bool $isalone = true;

    public array $form = [
        'title' => '',
        'description' => '',
        'teacher_id' => null,
        'materia_id' => null,
    ];

    public array $questions = [];
    /**
     * Define las reglas de validación para Livewire.
     */
    protected function rules(): array
    {
        return $this->getValidationRules();
    }


    /**
     * Inicializa los datos del componente.
     */
    public function mount(): void
    {
        $this->materias = Auth::user()->hasRole('admin')
            ? Materia::all()
            : Auth::user()->materias;

        $this->materia_id = $this->materias->first()?->id;

        $this->initializeQuestions();
    }

    /**
     * Inicializa las preguntas con una estructura predeterminada.
     */
    private function initializeQuestions(): void
    {
        $this->questions = [
            [
                'titulo' => '',
                'tipo' => 'radio',
                'options' => [
                    ['opcion' => '', 'es_correcta' => false],
                ],
            ],
        ];
    }

    /**
     * Actualiza el ID de la materia seleccionada.
     */
    public function updatedMateriaId(int $value): void
    {
        $this->materia_id = $value;
    }

    /**
     * Cambia el estado de "isalone".
     */
    public function toggleAlone(): void
    {
        $this->isalone = !$this->isalone;
    }

    /**
     * Agrega una nueva pregunta.
     */
    public function addQuestion(): void
    {
        $this->questions[] = [
            'titulo' => '',
            'tipo' => 'radio',
            'materia_id' => null,
            'options' => [
                ['opcion' => '', 'es_correcta' => false],
            ],
        ];
    }

    /**
     * Elimina una pregunta por índice.
     */
    public function removeQuestion(int $index): void
    {
        unset($this->questions[$index]);
        $this->questions = array_values($this->questions);
    }

    /**
     * Agrega una nueva opción a una pregunta específica.
     */
    public function addOption(int $questionIndex): void
    {
        $this->questions[$questionIndex]['options'][] = ['opcion' => '', 'es_correcta' => false];
    }

    /**
     * Elimina una opción de una pregunta específica.
     */
    public function removeOption(int $questionIndex, int $optionIndex): void
    {
        unset($this->questions[$questionIndex]['options'][$optionIndex]);
        $this->questions[$questionIndex]['options'] = array_values($this->questions[$questionIndex]['options']);
    }

    /**
     * Obtiene las reglas de validación para el formulario.
     */
    private function getValidationRules(): array
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

// Mensajes personalizados
    private function getValidationMessages(): array
    {
        return [
            'form.title.required' => 'El título del examen es obligatorio.',
            'form.title.max' => 'El título del examen no puede superar los 255 caracteres.',
            'form.description.required' => 'La descripción del examen es obligatoria.',
            'form.description.max' => 'La descripción del examen no puede superar los 255 caracteres.',
            'questions.required' => 'Debe incluir al menos una pregunta.',
            'questions.array' => 'Las preguntas deben estar en formato de arreglo.',
            'questions.min' => 'Debe incluir al menos una pregunta.',
            'questions.*.titulo.required' => 'El título de cada pregunta es obligatorio.',
            'questions.*.titulo.max' => 'El título de cada pregunta no puede superar los 255 caracteres.',
            'questions.*.options.required' => 'Cada pregunta debe tener al menos una opción.',
            'questions.*.options.array' => 'Las opciones deben estar en formato de arreglo.',
            'questions.*.options.min' => 'Cada pregunta debe tener al menos una opción.',
            'questions.*.options.*.opcion.required' => 'Cada opción debe tener un texto.',
            'questions.*.options.*.opcion.max' => 'El texto de cada opción no puede superar los 255 caracteres.',
            'form.materia_id.required' => 'Debe seleccionar una materia para el examen.',
            'form.materia_id.integer' => 'La materia seleccionada debe ser válida.',
            'form.materia_id.exists' => 'La materia seleccionada no existe.',
            'questions.*.materia_id.required' => 'Debe seleccionar una materia para cada pregunta.',
            'questions.*.materia_id.integer' => 'La materia seleccionada debe ser válida.',
            'questions.*.materia_id.exists' => 'La materia seleccionada no existe.',
        ];
    }

// Nombres de atributos personalizados
    private function getAttributeNames(): array
    {
        return [
            'form.title' => 'título del examen',
            'form.description' => 'descripción del examen',
            'form.materia_id' => 'materia del examen',
            'questions' => 'preguntas',
            'questions.*.titulo' => 'título de la pregunta',
            'questions.*.options' => 'opciones de la pregunta',
            'questions.*.options.*.opcion' => 'texto de la opción',
            'questions.*.materia_id' => 'materia de la pregunta',
        ];
    }

// Validar con reglas, mensajes y atributos personalizados
    private function validateForm()
    {
        $rules = $this->getValidationRules();
        $messages = $this->getValidationMessages();
        $attributes = $this->getAttributeNames();

        $this->validate($rules, $messages, $attributes);
    }


    /**
     * Guarda el formulario junto con las preguntas y opciones.
     */
    public function save(): void
    {
        $this->validate($this->validateForm());

        $form = Form::create([
            'title' => $this->form['title'],
            'description' => $this->form['description'],
            'teacher_id' => Auth::id(),
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

        // La redirección ocurre aquí, pero no se retorna directamente.
        redirect()->route('examen.index');
    }

    /**
     * Renderiza la vista del componente.
     */
    public function render()
    {
        return view('livewire.examen.new-form');
    }
}
