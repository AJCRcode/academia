<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class DocenteController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $docentes = Role::findByName('docente')->users()->orderBy('id','desc')->paginate(5);
        return view('docente.index', compact('docentes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('docente.create');
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
    public function show(User $docente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $docente)
    {
        return view('docente.edit', compact('docente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $docente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $docente)
    {
        //
    }
}
