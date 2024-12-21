<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use function Termwind\render;

class EstudianteController extends Controller
{
    public function index()
    {
        $estudiantes = Role::findByName('estudiante')->users()->orderBy('id','desc')->paginate(10);
        return view('estudiante.index', compact('estudiantes'));
    }

    public function create()
    {
        return view('estudiante.create');
    }

    public function edit(User $estudiante)
    {
        return view('estudiante.edit', compact('estudiante'));
    }

    public function destroy(User $estudiante)
    {
        //
    }
}
