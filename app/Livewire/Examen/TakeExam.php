<?php

namespace App\Livewire\Examen;

use App\Models\Answer;
use App\Models\Form;
use Livewire\Component;

class TakeExam extends Component
{
    public $form; // El examen
    public $responses = []; // Respuestas del estudiante
    public $result = null; // Resultado del examen

    public function mount($formId)
    {
        // Carga el formulario con sus preguntas y opciones
        $this->form = Form::with('questions.options')->findOrFail($formId);

        // Inicializa las respuestas según el tipo de pregunta
        foreach ($this->form->questions as $question) {
            if ($question->tipo === 'checkbox') {
                $this->responses[$question->id] = [];
            } else {
                $this->responses[$question->id] = null;
            }
        }
    }

    public function submit()
    {
        // Validar respuestas
        foreach ($this->form->questions as $question) {
            if ($question->tipo === 'checkbox') {
                if (empty($this->responses[$question->id])) {
                    $this->addError("responses.$question->id", "Por favor selecciona al menos una opción.");
                }
            } else {
                if (is_null($this->responses[$question->id])) {
                    $this->addError("responses.$question->id", "Por favor responde esta pregunta.");
                }
            }
        }

        if ($this->getErrorBag()->isNotEmpty()) {
            return;
        }


        // Guardar las respuestas del estudiante
        foreach ($this->responses as $questionId => $response) {
            if (is_array($response)) {
                // Si es una selección múltiple (checkbox)
                foreach ($this->chekOptions($response) as $optionId) {
                    Answer::create([
                        'question_id' => $questionId,
                        'student_id' => auth()->id(),
                        'answer' => $optionId,
                    ]);
                }
            } else {
                // Si es una única respuesta (radio o texto)
                Answer::create([
                    'question_id' => $questionId,
                    'student_id' => auth()->id(),
                    'answer' => $response,
                ]);
            }
        }

        // Calcular el resultado
        $this->calculateResult();
    }

    private function chekOptions($options)
    {
        $optionsreturn = [];
        foreach ($options as $optionId => $isSelected) {
            if ($isSelected) {
                $optionsreturn[] = $optionId;
            }
        }
        return $optionsreturn;
    }

    private function calculateResult()
    {
        $correctAnswers = 0;
        $totalQuestions = count($this->form->questions);

        foreach ($this->form->questions as $question) {
            if ($question->tipo === 'checkbox') {
                // Verificar todas las respuestas correctas seleccionadas
                $correctOptions = $question->options->where('es_correcta', true)->pluck('id')->toArray();
                $selectedOptions = $this->chekOptions($this->responses[$question->id]) ?? [];

                if (count(array_diff($correctOptions, $selectedOptions)) === 0 && count(array_diff($selectedOptions, $correctOptions)) === 0) {
                    $correctAnswers++;
                }
            } elseif ($question->tipo === 'radio') {
                // Verificar si la única respuesta es correcta
                $correctOption = $question->options->firstWhere('es_correcta', true);
                if ($correctOption && $this->responses[$question->id] == $correctOption->id) {
                    $correctAnswers++;
                }
            } elseif ($question->tipo === 'text') {
                // Verificar si la respuesta es correcta
                $correctAnswer = $question->options->firstWhere('es_correcta', true);

                if ($correctAnswer->opcion && $this->responses[$question->id] == $correctAnswer->opcion) {
                    $correctAnswers++;
                }
            }
        }

        $this->result = [
            'correct' => $correctAnswers,
            'total' => $totalQuestions,
            'percentage' => round(($correctAnswers / $totalQuestions) * 100, 2),
        ];
    }

    public function close()
    {
        $this->result = null;
    }

    public function render()
    {
        return view('livewire.examen.take-exam');
    }
}
