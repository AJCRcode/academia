<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Support\Facades\Auth;

class MateriaController extends Controller
{
    public function index()
    {
        $materias = Materia::query()->orderBy('id', 'desc')->activa()->paginate(10);
        $view = Auth::user()->hasRole('admin') || Auth::user()->hasRole('docente') ? 'materia.index' : 'materia.show';

        return view($view, compact('materias'));
    }

    public function create()
    {
        return view('materia.create');
    }

    public function edit($materia)
    {
        return view('materia.edit', compact('materia'));
    }
    public function show($materia)
    {
        return view('materia.show', compact('materia'));
    }
    public function destroy(Materia $materium)
    {
        $materium->estado = false;
        if($materium->save()) {
            flash()->success('Eliminado Correctamente');
            return back();
        } else {
            toastr()->error('Hubo un Error al eliminar');
            return back();
        }
    }

}
