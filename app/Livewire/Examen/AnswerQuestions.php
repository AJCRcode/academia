<?php

namespace App\Livewire\Examen;

use App\Models\Answer;
use App\Models\Materia;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AnswerQuestions extends Component
{
    public $materia;
    public $questions;
    public $answers = [];

    public function mount(Materia $materia)
    {
        $this->materia = $materia;
        $this->questions = Question::where('materia_id', $this->materia->id)->get();
    }

    public function submitAnswers()
    {
        $student = Auth::user();

        foreach ($this->questions as $question) {
            $answer = new Answer();
            $answer->question_id = $question->id;
            $answer->student_id = $student->id;
            $answer->answer = $this->answers[$question->id] ?? null;
            $answer->save();
        }

        session()->flash('message', 'Tus respuestas se han guardado correctamente.');

        return redirect()->route('materia.questions.results', $this->materia->id);
    }

    public function render()
    {
        return view('livewire.examen.answer-questions');
    }
}
