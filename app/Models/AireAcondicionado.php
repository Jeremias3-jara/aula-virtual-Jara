<?php

namespace App\Http\Controllers;

use App\Models\AireAcondicionado; // Importación necesaria para que la clase sea reconocida
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AireAcondicionadoController extends Controller
{
    /**
     * Display a listing of the resource.
     * Muestra una lista de todos los equipos de aire acondicionado.
     */
    public function index()
    {
        // Retorna todos los registros de aires acondicionados, incluyendo la relación 'aula'.
        // Asegúrate de que el método 'aula()' esté definido en App\Models\AireAcondicionado.
        return AireAcondicionado::with('aula')->get();
    }

    /**
     * Store a newly created resource in storage.
     * Almacena un nuevo equipo de aire acondicionado en la base de datos (POST).
     */
    public function store(Request $request)
    {
        // 1. Validar los datos de entrada
        $validated = $request->validate([
            'marca' => 'required|string|max:255',
            'modelo' => 'required|string|max:255|unique:aires_acondicionados,modelo',
            // Valida que 'aula_id' exista en la tabla 'aulas'
            'aula_id' => 'required|integer|exists:aulas,id',
        ]);

        // 2. Crear el registro
        $aireAcondicionado = AireAcondicionado::create($validated);

        // 3. Retornar la respuesta con el nuevo recurso y un código 201 (Created)
        return response()->json($aireAcondicionado->load('aula'), 201);
    }

    /**
     * Display the specified resource.
     * Muestra el equipo de aire acondicionado especificado (GET por ID).
     */
    public function show(AireAcondicionado $aireAcondicionado)
    {
        // Carga la relación 'aula' antes de retornar el modelo
        return $aireAcondicionado->load('aula');
    }

    /**
     * Update the specified resource in storage.
     * Actualiza el equipo de aire acondicionado especificado en la base de datos (PUT/PATCH).
     */
    public function update(Request $request, AireAcondicionado $aireAcondicionado)
    {
        // 1. Validar los datos de entrada para la actualización
        $validated = $request->validate([
            'marca' => 'sometimes|required|string|max:255',
            // La validación 'unique' debe ignorar el ID del registro actual
            'modelo' => 'sometimes|required|string|max:255|unique:aires_acondicionados,modelo,' . $aireAcondicionado->id,
            'aula_id' => 'sometimes|required|integer|exists:aulas,id',
        ]);

        // 2. Actualizar el registro
        $aireAcondicionado->update($validated);

        // 3. Retornar el recurso actualizado
        return response()->json($aireAcondicionado->load('aula'), 200);
    }

    /**
     * Remove the specified resource from storage.
     * Elimina el equipo de aire acondicionado especificado (DELETE).
     */
    public function destroy(AireAcondicionado $aireAcondicionado)
    {
        $aireAcondicionado->delete();

        // Retorna una respuesta vacía con código 204 (No Content)
        return response()->json(null, 204);
    }
}
