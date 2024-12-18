<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;

    protected $table = 'solicitudes';

    protected $fillable = [
        'usuario_id',
        'homoclave_formato',
        'nombre_responsable_oficial',
        'cargo_responsable_oficial',
        'fecha_presentacion',
        'nombre_preeliminar',
        'materia_regulacion',
        'accion_regulatoria',
        'nombre_responsable_propuesta',
        'cargo_responsable_propuesta',
        'descripcion_propuesta',
        'problematica_propuesta',
        'justificacion_propuesta',
        'beneficio_propuesta',
        'fundamento_juridico',
        'fecha_tentativa_presentacion',
        'fecha_tentativa_publicacion',
        'nombre_responsable_elabora',
        'cargo_responsable_elabora',
        'nombre_titular',
        'cargo_titular',
        'publicacion',
    ];

   
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
}
