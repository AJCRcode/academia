<?php

namespace App\Livewire\Modules;


use App\Models\User;
use App\Models\Materia;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Component;

class AddMateria extends Component
{
    public string $nombre = '';
    public string $fecha_inicio = '';
    public string $horario = '';
    public string $fecha_fin = '';
    public string $gestion = '';

    public function register(): void
    {
        $validated = $this->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'fecha_inicio' => ['required', 'date'],
            'horario' => ['required', 'string', 'max:255'],
            'fecha_fin' => ['required', 'date'],
            'gestion' => ['required', 'string', 'max:255'],
        ]);
        $materia = Materia::create($validated);

        event(new Registered($materia));
        $this->dispatch('newMateria', ['id' => $materia->id, 'nombre' => $materia->nombre]);
    }

    public function render()
    {
        return view('livewire.modules.add-materia');
    }
}

