<?php

namespace App\Http\Controllers;

use App\Models\AireAcondicionado;
use Illuminate\Http\Request;

class AireAcondicionadoController extends Controller
{
    public function index()
    {
        $aireacondicionados = AireAcondicionado::all();
        return view('aires_acondicionados.index', ['aireacondicionados' => $aireacondicionados]);
    }

    public function create()
    {
        return view('aires_acondicionados.create');
    }

    public function store(Request $request)
    {
        AireAcondicionado::create($request->all());
        return redirect()->route('aires_acondicionados.index');
    }
    public function show($id)
{
    $aire = AireAcondicionado::findOrFail($id);
    return view('aires_acondicionados.show', compact('aire'));
}

}
