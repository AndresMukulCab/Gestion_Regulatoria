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
}
