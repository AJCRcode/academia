<?php

namespace App\Livewire\Modules;

use App\Models\Materia;
use App\Models\Material;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ViewMateriales extends Component
{
    public $materiaMain = null;

    public function mount()
    {
        $this->materiaMain = Auth::user()->materias()->first();
    }

    public function render()
    {
        return view('livewire.modules.view-materiales');
    }

    public function changeMateria(Materia $materia)
    {
        $this->materiaMain = $materia;
    }

    public function descargarMateriales(Material $material)
    {
        try {
            $filePath = storage_path('app/public/'.$material->uri);
            // Verificar si el archivo existe
            if (!file_exists($filePath)) {
                dd("El archivo $filePath no existe");
                return response()->json(['error' => 'Archivo no encontrado.'], 404);
            }

            // Descargar el archivo
            return response()->download($filePath);

        } catch (\Exception $e) {
            // Manejo de excepciones
            return response()->json(['error' => 'Error al descargar el archivo.'], 500);
        }
    }


}
