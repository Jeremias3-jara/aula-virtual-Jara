<?php

namespace App\Http\Controllers;

use App\Models\HistorialAireAcondicionado;
use Illuminate\Http\Request;

class HistorialAireAcondicionadoController extends Controller
{
    /**
     * Display a listing of the resource.
     * Muestra una lista de todos los historiales de aire acondicionado.
     */
    public function index()
    {
        // Retorna todos los registros. Puedes añadir paginación si la lista es muy grande:
        // return HistorialAireAcondicionado::paginate(15);
        return HistorialAireAcondicionado::all();
    }

    /**
     * Store a newly created resource in storage.
     * Almacena un recurso recién creado en la base de datos (POST).
     */
    public function store(Request $request)
    {
        // 1. Validar los datos de entrada
        $validated = $request->validate([
            // Asumo que tienes una tabla 'aires' y 'aire_id' es una clave foránea
            'aire_id' => 'required|integer|exists:aires,id',
            'temperatura' => 'required|numeric|min:15|max:30', // Rango de temperatura razonable
            'inicio' => 'required|date_format:Y-m-d H:i:s', // Formato de fecha y hora
            'fin' => 'nullable|date_format:Y-m-d H:i:s|after:inicio', // 'fin' es opcional y debe ser posterior a 'inicio'
        ]);

        // 2. Crear el registro
        $historial = HistorialAireAcondicionado::create($validated);

        // 3. Retornar la respuesta con el nuevo recurso y un código 201 (Created)
        return response()->json($historial, 201);
    }

    /**
     * Display the specified resource.
     * Muestra el recurso especificado (GET por ID).
     */
    public function show(HistorialAireAcondicionado $historialAireAcondicionado)
    {
        // Laravel automáticamente inyecta el modelo si usas Route Model Binding.
        return $historialAireAcondicionado;
    }

    /**
     * Update the specified resource in storage.
     * Actualiza el recurso especificado en la base de datos (PUT/PATCH).
     */
    public function update(Request $request, HistorialAireAcondicionado $historialAireAcondicionado)
    {
        // 1. Validar los datos de entrada para la actualización
        $validated = $request->validate([
            'aire_id' => 'sometimes|required|integer|exists:aires,id',
            'temperatura' => 'sometimes|required|numeric|min:15|max:30',
            'inicio' => 'sometimes|required|date_format:Y-m-d H:i:s',
            // 'sometimes' asegura que solo se valide si el campo está presente en la solicitud
            'fin' => 'nullable|date_format:Y-m-d H:i:s|after:inicio',
        ]);

        // 2. Actualizar el registro
        $historialAireAcondicionado->update($validated);

        // 3. Retornar el recurso actualizado
        return response()->json($historialAireAcondicionado, 200);
    }

    /**
     * Remove the specified resource from storage.
     * Elimina el recurso especificado (DELETE).
     */
    public function destroy(HistorialAireAcondicionado $historialAireAcondicionado)
    {
        $historialAireAcondicionado->delete();

        // Retorna una respuesta vacía con código 204 (No Content)
        return response()->json(null, 204);
    }
}
