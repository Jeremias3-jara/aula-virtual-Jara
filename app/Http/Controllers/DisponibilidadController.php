<?php

namespace App\Http\Controllers;

use App\Models\Disponibilidad;
use App\Models\Aula;
use Illuminate\Http\Request;

class DisponibilidadController extends Controller
{
    public function index()
    {
        // Cargamos las disponibilidades con su aula
        $disponibilidades = Disponibilidad::with('aula')->get();
        return view('disponibilidades.index', compact('disponibilidades'));
    }

    public function create()
    {
        // Para el formulario
        $aulas = Aula::all();
        return view('disponibilidades.create', compact('aulas'));
    }

    public function store(Request $request)
    {
        // Validar datos
        $validated = $request->validate([
            'aula_id'      => 'required|exists:aulas,id',
            'fecha'        => 'required|date',
            'hora_inicio'  => 'required|date_format:H:i',
            'hora_fin'     => 'required|date_format:H:i|after:hora_inicio',
            'disponible'   => 'required|boolean',
        ]);

        // Crear registro
        Disponibilidad::create($validated);

        return redirect()->route('disponibilidades.index')
                         ->with('success', '✅ Disponibilidad creada correctamente');
    }

    public function edit(Disponibilidad $disponibilidad)
    {
        $aulas = Aula::all();
        return view('disponibilidades.edit', compact('disponibilidad', 'aulas'));
    }

    public function update(Request $request, Disponibilidad $disponibilidad)
    {
        $validated = $request->validate([
            'aula_id'      => 'required|exists:aulas,id',
            'fecha'        => 'required|date',
            'hora_inicio'  => 'required|date_format:H:i',
            'hora_fin'     => 'required|date_format:H:i|after:hora_inicio',
            'disponible'   => 'required|boolean',
        ]);

        $disponibilidad->update($validated);

        return redirect()->route('disponibilidades.index')
                         ->with('success', '✅ Disponibilidad actualizada correctamente');
    }

    public function destroy(Disponibilidad $disponibilidad)
    {
        $disponibilidad->delete();
        return redirect()->route('disponibilidades.index')
                         ->with('success', '🗑️ Disponibilidad eliminada correctamente');
    }
}
