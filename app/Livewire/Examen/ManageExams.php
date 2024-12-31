<?php

namespace App\Livewire\Examen;

use App\Models\User;
use Livewire\Component;
use App\Models\Form;
use App\Models\ExamAssignment;
use Spatie\Permission\Models\Role;

class ManageExams extends Component
{
    public $exams;
    public $selectedExam = null; // Examen seleccionado para editar o asignar
    public $students = []; // Lista de estudiantes con rol asignado
    public $assignedStudents = []; // IDs de estudiantes asignados

    public function mount()
    {
        $this->exams = Form::with('questions')->get(); // Carga todos los exámenes

        // Obtén estudiantes con rol de estudiante
        $this->students = User::role('estudiante')->get();
    }

    public function selectExam($examId)
    {
        $this->selectedExam = Form::with('questions.options')->find($examId);
        $this->assignedStudents = ExamAssignment::where('form_id', $examId)->pluck('student_id')->toArray();
    }

    public function addStudent($studentId)
    {
        ExamAssignment::create([
            'form_id' => $this->selectedExam->id,
            'student_id' => $studentId,
        ]);
    }

    public function removeStudent(ExamAssignment $studentId){
        $studentId->delete();
    }

    public function saveAssignments()
    {
        if (!$this->selectedExam) return;

        // Eliminar asignaciones existentes
        ExamAssignment::where('form_id', $this->selectedExam->id)->delete();

        // Crear nuevas asignaciones
        foreach ($this->assignedStudents as $studentId) {
            ExamAssignment::create([
                'form_id' => $this->selectedExam->id,
                'student_id' => $studentId,
            ]);
        }

        session()->flash('message', 'Estudiantes asignados correctamente.');
    }

    public function close()
    {
        $this->selectedExam = null;
    }

    public function render()
    {
        return view('livewire.examen.manage-exams');
    }
}
