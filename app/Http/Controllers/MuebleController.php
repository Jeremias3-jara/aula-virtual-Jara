<?php

namespace App\Http\Controllers;

use App\Models\Mueble;
use Illuminate\Http\Request;

class MuebleController extends Controller
{
    public function index()
    {
        $muebles = Mueble::all();
        return view('muebles.index', ['muebles' => $muebles]);
    }

    public function create()
    {
        return view('muebles.create');
    }

    public function store(Request $request)
    {
        Mueble::create($request->all());
        return redirect()->route('muebles.index');
    }
}
