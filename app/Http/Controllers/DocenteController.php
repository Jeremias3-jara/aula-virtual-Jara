<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    public function index()
    {
        $docentes = Docente::all();
        return view('docentes.index', ['docentes' => $docentes]);
    }

    public function create()
    {
        return view('docentes.create');
    }

    public function store(Request $request)
    {
        // ✅ Validación de datos
        $request->validate([
            'nombre'   => 'required|string|max:255',
            'apellido' => 'nullable|string|max:255', // 👈 Puede ser nulo si quieres
            'email'    => 'required|email|unique:docentes,email',
        ]);

        // ✅ Crear docente manualmente (evita error de campos faltantes)
        $docente = new Docente();
        $docente->nombre = $request->nombre;
        $docente->apellido = $request->apellido ?? ''; // 👈 Si no hay apellido, guarda vacío
        $docente->email = $request->email;
        $docente->save();

        return redirect()->route('docentes.index')->with('success', 'Docente creado correctamente.');
    }
}

