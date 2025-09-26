<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    public function index()
    {
        $horarios = Horario::all();
        return view('horarios.index', ['horarios' => $horarios]);
    }

    public function create()
    {
        return view('horarios.create');
    }

    public function store(Request $request)
    {
        // ✅ Validación
        $request->validate([
            'dia'         => 'required|string|max:50',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin'    => 'nullable|date_format:H:i', // si existe en tu migración
        ]);

        // ✅ Crear horario manualmente
        $horario = new Horario();
        $horario->dia = $request->dia;
        $horario->hora_inicio = $request->hora_inicio;
        $horario->hora_fin = $request->hora_fin; // si tu tabla lo tiene
        $horario->save();

        return redirect()->route('horarios.index')
                         ->with('success', 'Horario creado correctamente.');
    }
}
