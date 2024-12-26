<?php

namespace App\Livewire\Examen;

use App\Models\Materia;
use App\Models\Question;
use Livewire\Component;

class QuestionList extends Component
{

    public $materia;

    public function mount(Materia $materia)
    {
        $this->materia = $materia;
    }

    public function deleteQuestion($questionId)
    {
        Question::findOrFail($questionId)->delete();
        session()->flash('message', 'Pregunta eliminada con éxito.');
    }


    public function render()
    {
        $questions = Question::where('materia_id', $this->materia->id)->get();
        return view('livewire.examen.question-list', compact('questions'));
    }
}
