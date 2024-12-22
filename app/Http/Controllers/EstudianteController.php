<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use function Termwind\render;

class EstudianteController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasRole('admin')) {
            $estudiantes = Role::findByName('estudiante')->users()->orderBy('id','desc')->paginate(10);
        }else{
            $materias = Auth::user()->materias()->pluck('materias.id'); // Obtén solo los IDs de las materias

            $estudiantes = Role::findByName('estudiante')
                ->users() // Relación de usuarios con el rol 'estudiante'
                ->whereHas('materias', function ($query) use ($materias) {
                    $query->whereIn('materias.id', $materias); // Desambiguar columna id
                })
                ->orderBy('users.id', 'desc') // Desambiguar la columna id
                ->paginate(10);
        }
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
