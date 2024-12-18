<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solicitud;

class SolicitudController extends Controller
{
    // Mostrar todas las solicitudes
    public function index()
    {
        return Solicitud::with('usuario')->get();
    }

    //Crear una nueva solicitud
    public function store(Request $request)
    {
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

        $solicitud = Solicitud::create($validated);

        return response()->json(['message' => 'Solicitud creada con éxito', 'solicitud' => $solicitud], 201);
    }

    //Mostrar una solicitud específica
    public function show($id)
    {
        $solicitud = Solicitud::with('usuario')->find($id);

        if (!$solicitud) {
            return response()->json(['message' => 'Solicitud no encontrada'], 404);
        }

        return response()->json($solicitud, 200);
    }

    //Actualizar una solicitud
    public function update(Request $request, $id)
    {
        $solicitud = Solicitud::find($id);

        if (!$solicitud) {
            return response()->json(['message' => 'Solicitud no encontrada'], 404);
        }

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

        $solicitud->update($validated);

        return response()->json(['message' => 'Solicitud actualizada con éxito', 'solicitud' => $solicitud], 200);
    }

    //Eliminar una solicitud
    public function destroy($id)
    {
        $solicitud = Solicitud::find($id);

        if (!$solicitud) {
            return response()->json(['message' => 'Solicitud no encontrada'], 404);
        }

        $solicitud->delete();

        return response()->json(['message' => 'Solicitud eliminada con éxito'], 200);
    }
}
