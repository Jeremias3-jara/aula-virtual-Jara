<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\User;
use App\Models\Recurso;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function index()
    {
        $reservas = Reserva::with(['usuario', 'recurso'])->get(); // eager loading
        return view('reservas.index', compact('reservas'));
    }

    public function create()
    {
        // Traemos todos los usuarios y recursos
        $usuarios = User::all();
        $recursos = Recurso::all();

        // Pasamos los datos a la vista
        return view('reservas.create', compact('usuarios', 'recursos'));
    }

    public function store(Request $request)
    {
        // Validación
        $validated = $request->validate([
            'usuario_id'   => 'required|exists:users,id',
            'recurso_id'   => 'required|exists:recursos,id',
            'fecha'        => 'required|date',
            'hora_inicio'  => 'required|date_format:H:i',
            'hora_fin'     => 'required|date_format:H:i|after:hora_inicio',
        ]);

        // Guardar la reserva
        Reserva::create($validated);

        return redirect()->route('reservas.index')
                         ->with('success', '✅ Reserva creada correctamente');
    }
}
