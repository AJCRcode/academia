<?php

namespace App\Livewire\Modules;

use App\Models\Materia;
use App\Models\Material;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ViewMateriales extends Component
{
    public $materiales = null;
    public $materias = null;
    public $materia_id = null;

    public function mount()
    {
        $this->materias = Auth::user()->hasrole('admin') ? Materia::all() : Auth::user()->materias;
        $this->materia_id = Auth::user()->hasrole('admin') ? Materia::first()->id : Auth::user()->materias->first()->id;
    }

    public function render()
    {
        $this->materiales = Material::where('materia_id',$this->materia_id)->get();
        return view('livewire.modules.view-materiales');
    }

    public function descargarMateriales(Material $material)
    {
        try {
            $filePath = storage_path('app/public/'.$material->uri);

            if (!file_exists($filePath)) {
                return response()->json(['error' => 'Archivo no encontrado.'], 404);
            }

            return response()->download($filePath);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al descargar el archivo.'], 500);
        }
    }

    public function isImage($filePath)
    {
        $extension = pathinfo($filePath, PATHINFO_EXTENSION);
        $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp'];
        return in_array(strtolower($extension), $imageExtensions);
    }
}
