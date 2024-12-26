<?php

namespace App\Livewire\Examen;

use App\Models\Answer;
use App\Models\Materia;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Results extends Component
{
    public $materia;
    public $answers;
    public $correctAnswers = 0;
    public $totalQuestions;

    public function mount(Materia $materia)
    {
        $this->materia = $materia;
        $this->answers = Answer::where('student_id', Auth::id())
            ->whereIn('question_id', Question::where('materia_id', $materia->id)->pluck('id'))
            ->get();

        $this->totalQuestions = $this->answers->count();
    }

    public function calculateResults()
    {
        foreach ($this->answers as $answer) {
            $question = $answer->question;
            if ($answer->answer == $question->respuesta_correcta) {
                $this->correctAnswers++;
            }
        }
    }

    public function render()
    {
        $this->calculateResults();

        return view('livewire.examen.results');
    }
}
