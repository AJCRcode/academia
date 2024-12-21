<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMateriaRequest;
use App\Http\Requests\UpdateMateriaRequest;
use Spatie\Permission\Models\Role;

class MateriaController extends Controller
{
    public function index()
    {
        $materias = Materia::orderBy('id', 'desc')->paginate(10);
        return view('materia.index', compact('materias'));
    }

    public function create()
    {
        return view('materia.create');
    }

    public function edit($materia)
    {
        return view('materia.edit', compact('materia'));
    }
    public function destroy(Materia $materia)
    {
        //
    }
}
