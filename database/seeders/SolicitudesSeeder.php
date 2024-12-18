<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SolicitudesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'usuario_id' => 7,
                'homoclave_formato' => 'CEMER-AR-001',
                'nombre_responsable_oficial' => 'Br. Ángel Gabriel Castillo Jiménez',
                'cargo_responsable_oficial' => 'Subsecretario de Ganadería',
                'fecha_presentacion' => Carbon::createFromFormat('d/m/Y', '16/04/2024')->toDateString(),
                'nombre_preeliminar' => 'Reglas de operación del programa uso de energías verdes en la agricultura familiar',
                'materia_regulacion' => 'Programas sociales, Desarrollo agropecuario',
                'accion_regulatoria' => 'a) Emitir. La creación de una nueva regulación',
                'nombre_responsable_propuesta' => 'Marcelo Carreón Mundo',
                'cargo_responsable_propuesta' => 'Subsecretario de Desarrollo Rural',
                'descripcion_propuesta' => 'Se regulará el procedimiento y requisitos para que la ciudadanía pueda acceder al programa de "Uso de energías verdes en la Agricultura familiar".',
                'problematica_propuesta' => 'Actualmente en el Estado se ha advertido según la CONAGUA, que la seguridad alimentaria y el agua están directamente relacionadas.',
                'justificacion_propuesta' => 'Contar con un marco regulatorio que permita conocer a la ciudadanía y a las personas servidoras públicas cómo acceder al programa.',
                'beneficio_propuesta' => 'Se conocerá el procedimiento y requisitos que se deben cumplir para poder acceder al programa.',
                'fundamento_juridico' => 'Artículo 39 Fracciones X y XXI de la Ley Orgánica de la Administración Pública del Estado de Quintana Roo.',
                'fecha_tentativa_presentacion' => Carbon::createFromFormat('d/m/Y', '26/04/2024')->toDateString(),
                'fecha_tentativa_publicacion' => Carbon::createFromFormat('d/m/Y', '03/06/2024')->toDateString(),
                'nombre_responsable_elabora' => 'Angel Gabriel Castillo Jimenez',
                'cargo_responsable_elabora' => 'Subsecretario de Ganadería',
                'nombre_titular' => 'Ing. Linda Saray Cobos Castro',
                'cargo_titular' => 'Secretaria de la SEDARPE',
                'publicacion' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
           
        ];

        for ($i = 2; $i <= 12; $i++) {
            $registro = $data[0];
            $registro['usuario_id'] = $i; 
            $registro['homoclave_formato'] = 'CEMER-AR-' . str_pad($i, 3, '0', STR_PAD_LEFT);
            $registro['fecha_presentacion'] = Carbon::now()->subDays($i)->toDateString();
            $registro['fecha_tentativa_presentacion'] = Carbon::now()->addDays($i)->toDateString();
            $registro['fecha_tentativa_publicacion'] = Carbon::now()->addDays($i + 5)->toDateString();
            $registro['publicacion'] = $i % 2 === 0; 
            $data[] = $registro;
        }

        DB::table('solicitudes')->insert($data);
    }
}
