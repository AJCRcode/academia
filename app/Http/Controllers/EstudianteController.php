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

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estudiantes = Role::findByName('estudiante')->users()->orderBy('id','desc')->paginate(10);
        return view('estudiante.index', compact('estudiantes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('estudiante.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $estudiante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $estudiante)
    {
        return view('estudiante.edit', compact('estudiante'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $estudiante)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $estudiante)
    {
        //
    }
}
