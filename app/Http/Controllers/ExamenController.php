<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;

class ExamenController extends Controller
{
    public function index(){
        return view('examen.index');
    }
    public function create()
    {
        return view('examen.create');
    }

    public function show($examen)
    {
        return view('examen.show', compact('examen'));
    }

    public function edit($examen)
    {
        return view('examen.edit', compact('examen'));
    }

    public function destroy(Form $examan)
    {
        $examan->estado = false;
        if($examan->save()) {
            flash()->success('Eliminado Correctamente');
            return back();
        } else {
            toastr()->error('Hubo un Error al eliminar');
            return back();
        }
    }

}
