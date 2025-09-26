<?php

namespace App\Http\Controllers;

use App\Models\HistorialFoco;
use Illuminate\Http\Request;

class HistorialFocoController extends Controller
{
    public function index()
    {
        $historialfocos = HistorialFoco::all();
        return view('historial_focos.index', ['historialfocos' => $historialfocos]);
    }

    public function create()
    {
        return view('historial_focos.create');
    }

    public function store(Request $request)
    {
        HistorialFoco::create($request->all());
        return redirect()->route('historial_focos.index');
    }
}
