<?php

namespace App\Livewire\Profile;

use App\Models\Materia;
use App\Models\Material;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithFileUploads;

class NewMaterial extends Component
{
    use WithFileUploads;

    public $titulo;
    public $descripcion;
    public $materia;
    public $uri;
    public $materias;

    public function mount()
    {
        // Cargar las materias dependiendo del rol del usuario
        $this->materias = Auth::user()->hasRole('admin')
            ? Materia::all()
            : Auth::user()->materias;
    }

    public function rules()
    {
        return [
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string|max:1000',
            'materia' => 'required|exists:materias,id',
            'uri' => 'required|file|mimes:jpeg,jpg,png,pdf,doc,docx|max:51200',
        ];
    }

    public function save()
    {
        $validatedData = $this->validate();

        // Crear el registro del material
        $material = Material::create([
            'titulo' => $validatedData['titulo'],
            'descripcion' => $validatedData['descripcion'],
            'uri' => null,
            'materia_id' => $validatedData['materia'],
            'docente_id' => Auth::id(),
        ]);

        if ($this->uri) {
            if ($this->uri->isValid()) {
                $originalName = $this->uri->getClientOriginalName();
                $path = $this->uri->storeAs('materiales', $originalName, 'public');
                $material->update(['uri' => $path]);
                Log::info('Archivo subido correctamente', ['path' => $path]);
            } else {
                $this->addError('uri', 'El archivo no es válido.');
                Log::error('El archivo subido no es válido');
            }
        } else {
            Log::warning('No se proporcionó un archivo para subir');
        }

        $this->dispatch('newMaterial');
        $this->resetExcept('materias');
    }

    public function render()
    {
        return view('livewire.profile.new-material');
    }
}
