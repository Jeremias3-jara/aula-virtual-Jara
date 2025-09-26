<?php

namespace App\Http\Controllers;

use App\Models\Disponibilidad;
use Illuminate\Http\Request;

class DisponibilidadController extends Controller
{
    public function index()
    {
        $disponibilidads = Disponibilidad::all();
        return view('disponibilidades.index', ['disponibilidads' => $disponibilidads]);
    }

    public function create()
    {
        return view('disponibilidades.create');
    }

    public function store(Request $request)
    {
        Disponibilidad::create($request->all());
        return redirect()->route('disponibilidades.index');
    }
}
