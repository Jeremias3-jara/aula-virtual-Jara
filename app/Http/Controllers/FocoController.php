<?php

namespace App\Http\Controllers;

use App\Models\Foco;
use Illuminate\Http\Request;

class FocoController extends Controller
{
    public function index()
    {
        $focos = Foco::all();
        return view('focos.index', compact('focos'));
    }

    public function create()
    {
        return view('focos.create');
    }

public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
    ]);

    $foco = new Foco();
    $foco->nombre = $request->nombre;
    $foco->save();

    return redirect()->route('focos.index')->with('success', 'Foco creado correctamente.');
}


    public function edit(Foco $foco)
    {
        return view('focos.edit', compact('foco'));
    }

    public function update(Request $request, Foco $foco)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'estado' => 'required|boolean',
        ]);

        $foco->update($request->all());

        return redirect()->route('focos.index')->with('success', 'Foco actualizado correctamente.');
    }

    public function destroy(Foco $foco)
    {
        $foco->delete();

        return redirect()->route('focos.index')->with('success', 'Foco eliminado correctamente.');
    }
}
