<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solicitud;

class SolicitudController extends Controller
{
    public function index()
    {
        // Retorna todas las solicitudes con información del usuario
        return Solicitud::with('usuario')->get();
    }

    public function store(Request $request)
    {
        // Valida los datos
        $validated = $request->validate([
            'usuario_id' => 'required|exists:usuarios,idUsuario',
            'homoclave_formato' => 'required|string',
            'nombre_responsable_oficial' => 'required|string',
            'cargo_responsable_oficial' => 'required|string',
            'fecha_presentacion' => 'required|date',
            'nombre_preeliminar' => 'required|string',
            'materia_regulacion' => 'required|string',
            'accion_regulatoria' => 'required|string',
            'nombre_responsable_propuesta' => 'required|string',
            'cargo_responsable_propuesta' => 'required|string',
            'descripcion_propuesta' => 'required|string',
            'problematica_propuesta' => 'required|string',
            'justificacion_propuesta' => 'required|string',
            'beneficio_propuesta' => 'required|string',
            'fundamento_juridico' => 'required|string',
            'fecha_tentativa_presentacion' => 'required|date',
            'fecha_tentativa_publicacion' => 'required|date',
            'nombre_responsable_elabora' => 'required|string',
            'cargo_responsable_elabora' => 'required|string',
            'nombre_titular' => 'required|string',
            'cargo_titular' => 'required|string',
            'publicacion' => 'boolean',
        ]);

        // Crea la solicitud
        $solicitud = Solicitud::create($validated);

        return response()->json(['message' => 'Solicitud creada con éxito', 'solicitud' => $solicitud], 201);
    }

    //Update y delete
    public function update(Request $request, $id)
{
    // Encuentra la solicitud por ID
    $solicitud = Solicitud::find($id);

    // Verifica si existe la solicitud
    if (!$solicitud) {
        return response()->json(['message' => 'Solicitud no encontrada'], 404);
    }

    // Valida los datos enviados para la actualización
    $validated = $request->validate([
        'usuario_id' => 'sometimes|exists:usuarios,idUsuario',
        'homoclave_formato' => 'sometimes|string',
        'nombre_responsable_oficial' => 'sometimes|string',
        'cargo_responsable_oficial' => 'sometimes|string',
        'fecha_presentacion' => 'sometimes|date',
        'nombre_preeliminar' => 'sometimes|string',
        'materia_regulacion' => 'sometimes|string',
        'accion_regulatoria' => 'sometimes|string',
        'nombre_responsable_propuesta' => 'sometimes|string',
        'cargo_responsable_propuesta' => 'sometimes|string',
        'descripcion_propuesta' => 'sometimes|string',
        'problematica_propuesta' => 'sometimes|string',
        'justificacion_propuesta' => 'sometimes|string',
        'beneficio_propuesta' => 'sometimes|string',
        'fundamento_juridico' => 'sometimes|string',
        'fecha_tentativa_presentacion' => 'sometimes|date',
        'fecha_tentativa_publicacion' => 'sometimes|date',
        'nombre_responsable_elabora' => 'sometimes|string',
        'cargo_responsable_elabora' => 'sometimes|string',
        'nombre_titular' => 'sometimes|string',
        'cargo_titular' => 'sometimes|string',
        'publicacion' => 'sometimes|boolean',
    ]);

    // Actualiza los campos de la solicitud
    $solicitud->update($validated);

    return response()->json(['message' => 'Solicitud actualizada con éxito', 'solicitud' => $solicitud], 200);
}

public function destroy($id)
{
    // Encuentra la solicitud por ID
    $solicitud = Solicitud::find($id);

    // Verifica si existe la solicitud
    if (!$solicitud) {
        return response()->json(['message' => 'Solicitud no encontrada'], 404);
    }

    // Elimina la solicitud
    $solicitud->delete();

    return response()->json(['message' => 'Solicitud eliminada con éxito'], 200);
}

}
