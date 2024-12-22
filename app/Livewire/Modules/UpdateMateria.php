<?php

namespace App\Livewire\Modules;

use App\Models\Materia;
use Illuminate\Auth\Events\Registered;
use Livewire\Component;

class UpdateMateria extends Component
{

    public string $nombre = '';
    public string $fecha_inicio = '';
    public string $horario = '';
    public string $fecha_fin = '';
    public string $gestion = '';
    public $materia;

    public function mount(Materia $materia){
        $this->materia = $materia;
        $this->nombre = $materia->nombre;
        $this->fecha_inicio = $materia->fecha_inicio;
        $this->horario = $materia->horario;
        $this->fecha_fin = $materia->fecha_fin;
        $this->gestion = $materia->gestion;
    }

    public function register(): void
    {
        $validated = $this->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'fecha_inicio' => ['required', 'date'],
            'horario' => ['required', 'string', 'max:255'],
            'fecha_fin' => ['required', 'date'],
            'gestion' => ['required', 'string', 'max:255'],
        ]);
        $this->materia->fill($validated);

        $this->dispatch('updateMateria', ['id' => $this->materias->id, 'nombre' => $this->materias->nombre]);
    }
    public function render()
    {
        return view('livewire.modules.update-materia');
    }
}
