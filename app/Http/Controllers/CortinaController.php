<?php

namespace App\Http\Controllers;

use App\Models\Cortina;
use Illuminate\Http\Request;

class CortinaController extends Controller
{
    public function index()
    {
        $cortinas = Cortina::all();
        return view('cortinas.index', compact('cortinas'));
    }

    public function create()
{
    $aulas = \App\Models\Aula::all(); // Asegúrate de que el modelo Aula exista
    return view('cortinas.create', compact('aulas'));
}

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'nullable|string|max:255',
            'estado' => 'required|boolean',
            'aula_id' => 'required|exists:aulas,id',
        ]);

        Cortina::create($request->all());

        return redirect()->route('cortinas.index')->with('success', 'Cortina creada correctamente');
    }

    public function edit($id)
    {
        $cortina = Cortina::findOrFail($id);
        return view('cortinas.edit', compact('cortina'));
    }

    public function destroy($id)
    {
        $cortina = Cortina::findOrFail($id);
        $cortina->delete();

        return redirect()->route('cortinas.index')->with('success', 'Cortina eliminada correctamente');
    }
}