<?php

namespace App\Livewire\Examen;

use App\Models\Answer;
use App\Models\Form;
use Livewire\Component;

class TakeExam extends Component
{
    public $form; // Datos del examen
    public $responses = []; // Respuestas del estudiante
    public $result = null; // Resultado del examen

    /**
     * Inicializa el componente con el formulario y prepara las respuestas.
     */
    public function mount($formId)
    {
        // Cargar el formulario con preguntas y opciones
        $this->form = Form::with('questions.options')->findOrFail($formId);

        // Inicializar respuestas para todas las preguntas
        $this->responses = $this->form->questions->mapWithKeys(function ($question) {
            return [$question->id => $question->tipo === 'checkbox' ? [] : null];
        })->toArray();
    }

    /**
     * Envía las respuestas y calcula el resultado.
     */
    public function submit()
    {
        // Limpiar errores previos antes de validar
        $this->resetValidation();

        // Validar las respuestas
        $this->validateResponses();

        // Si hay errores, detener el flujo
        if ($this->getErrorBag()->isNotEmpty()) {
            return;
        }

        // Guardar respuestas del estudiante
        $this->saveResponses();

        // Calcular resultado del examen
        $this->calculateResult();
    }

    /**
     * Valida las respuestas según el tipo de pregunta.
     */
    private function validateResponses()
    {
        foreach ($this->form->questions as $question) {
            if ($question->tipo === 'checkbox') {
                if (empty($this->responses[$question->id])) {
                    $this->addError("responses.{$question->id}", "Por favor selecciona al menos una opción.");
                }
            } else {
                if (is_null($this->responses[$question->id])) {
                    $this->addError("responses.{$question->id}", "Por favor responde esta pregunta.");
                }
            }
        }
    }

    /**
     * Guarda las respuestas del estudiante en la base de datos.
     */
    private function saveResponses()
    {
        foreach ($this->responses as $questionId => $response) {
            if (is_array($response)) {
                // Para preguntas de selección múltiple (checkbox)
                foreach ($this->getSelectedOptions($response) as $optionId) {
                    Answer::create([
                        'question_id' => $questionId,
                        'student_id' => auth()->id(),
                        'answer' => $optionId,
                    ]);
                }
            } else {
                // Para respuestas únicas (radio o texto)
                Answer::create([
                    'question_id' => $questionId,
                    'student_id' => auth()->id(),
                    'answer' => $response,
                ]);
            }
        }
    }

    /**
     * Retorna los IDs de opciones seleccionadas en una pregunta.
     */
    private function getSelectedOptions($options)
    {
        return array_keys(array_filter($options));
    }

    /**
     * Calcula el resultado del examen.
     */
    private function calculateResult()
    {
        $correctAnswers = 0;
        $totalQuestions = count($this->form->questions);

        foreach ($this->form->questions as $question) {
            $isCorrect = false;

            if ($question->tipo === 'checkbox') {
                // Validar selección múltiple
                $correctOptions = $question->options->where('es_correcta', true)->pluck('id')->toArray();
                $selectedOptions = $this->getSelectedOptions($this->responses[$question->id]);

                $isCorrect = $this->areArraysEqual($correctOptions, $selectedOptions);
            } elseif ($question->tipo === 'radio') {
                // Validar selección única
                $correctOption = $question->options->firstWhere('es_correcta', true);
                $isCorrect = $correctOption && $this->responses[$question->id] == $correctOption->id;
            } elseif ($question->tipo === 'text') {
                // Validar texto
                $correctAnswer = $question->options->firstWhere('es_correcta', true);
                $isCorrect = $correctAnswer && $this->responses[$question->id] === $correctAnswer->opcion;
            }

            if ($isCorrect) {
                $correctAnswers++;
            }
        }

        $this->result = [
            'correct' => $correctAnswers,
            'total' => $totalQuestions,
            'percentage' => round(($correctAnswers / $totalQuestions) * 100, 2),
        ];
    }

    /**
     * Compara dos arrays para verificar si son iguales.
     */
    private function areArraysEqual($array1, $array2)
    {
        return empty(array_diff($array1, $array2)) && empty(array_diff($array2, $array1));
    }

    /**
     * Cierra el resultado del examen.
     */
    public function close()
    {
        $this->result = null;
    }

    /**
     * Renderiza la vista del componente.
     */
    public function render()
    {
        return view('livewire.examen.take-exam');
    }
}
