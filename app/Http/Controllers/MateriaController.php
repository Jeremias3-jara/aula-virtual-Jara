<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    public function index()
    {
        $materias = Materia::all();
        return view('materias.index', ['materias' => $materias]);
    }

    public function create()
    {
        return view('materias.create');
    }

    public function store(Request $request)
    {
        Materia::create($request->all());
        return redirect()->route('materias.index');
    }
}
