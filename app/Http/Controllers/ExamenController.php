<?php

namespace App\Http\Controllers;

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

}
