<?php

namespace App\Livewire\Profile;

use App\Models\Materia;
use App\Models\Material;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class NewMaterial extends Component
{
    use WithFileUploads;
    #[Validate('required')]
    public $titulo;
    #[Validate('required')]
    public $descripcion;

    #[Validate('required')]
    public $materia;
    #[Validate('required|file|mimes:jpeg,jpg,png,pdf,doc,docx|max:2048')]
    public $uri;

    public $materias;
    public function mount()
    {
        $this->materias = Auth::user()->hasRole('admin') ? Materia::all():Auth::user()->materias ;
    }
    public function render()
    {
        return view('livewire.profile.new-material');
    }
    public function save(){
        $this->validate();
        $material = Material::create([
            'titulo' => $this->titulo,
            'descripcion' => $this->descripcion,
            'uri' => null,
            'materia_id' => $this->materia,
            'docente_id' => Auth::user()->id
        ]);
        if($this->uri){
            $material->uri = $this->uri->store('materiales', 'public');
            $material->save();
        }

        $this->dispatch('newMaterial');

        $this->reset(['titulo', 'descripcion', 'uri', 'materia']);

    }
}
