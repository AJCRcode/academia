<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMateriaRequest;
use App\Http\Requests\UpdateMateriaRequest;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class MateriaController extends Controller
{
    public function index()
    {
        $materias = Materia::orderBy('id', 'desc')->paginate(10);
        if (Auth::user()->hasRole('admin')) {
            return view('materia.index', compact('materias'));
        } elseif (Auth::user()->hasRole('docente')) {
            return view('materia.index', compact('materias'));
        } else {
            return view('materia.show');
        }
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
    public function destroy(Materia $materia)
    {
        //
    }
}
