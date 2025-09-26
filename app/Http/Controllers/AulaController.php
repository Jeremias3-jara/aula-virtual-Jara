<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use Illuminate\Http\Request;

class AulaController extends Controller
{
    public function create()
    {
        return view('aulas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'capacidad' => 'required|integer|min:1',
        ]);

        Aula::create($request->all());

        return redirect()->route('aulas.index')->with('success', 'Aula creada correctamente');
    }

    public function show($id)
    {
        $aula = Aula::findOrFail($id);
        return view('aulas.show', compact('aula'));
    }

    public function edit($id)
    {
        $aula = Aula::findOrFail($id);
        return view('aulas.edit', compact('aula'));
    }

    public function update(Request $request, $id)
    {
        $aula = Aula::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255',
            'capacidad' => 'required|integer|min:1',
        ]);

        $aula->update($request->all());

        return redirect()->route('aulas.index')->with('success', 'Aula actualizada correctamente');
    }

    public function destroy($id)
    {
        $aula = Aula::findOrFail($id);
        $aula->delete();

        return redirect()->route('aulas.index')->with('success', 'Aula eliminada correctamente');
    }

    public function index()
    {
        $aulas = Aula::all(); // obtenemos todas las aulas de la BD
        return view('aulas.index', compact('aulas')); // enviamos $aulas a la vista
    }
}