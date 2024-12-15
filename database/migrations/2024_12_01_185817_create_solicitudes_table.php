<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_id'); // Clave foránea
            $table->string('homoclave_formato');
            $table->string('nombre_responsable_oficial');
            $table->string('cargo_responsable_oficial');
            $table->date('fecha_presentacion');
            $table->string('nombre_preeliminar');
            $table->string('materia_regulacion');
            $table->string('accion_regulatoria');
            $table->string('nombre_responsable_propuesta');
            $table->string('cargo_responsable_propuesta');
            $table->text('descripcion_propuesta');
            $table->text('problematica_propuesta');
            $table->text('justificacion_propuesta');
            $table->text('beneficio_propuesta');
            $table->text('fundamento_juridico');
            $table->date('fecha_tentativa_presentacion');
            $table->date('fecha_tentativa_publicacion');
            $table->string('nombre_responsable_elabora');
            $table->string('cargo_responsable_elabora');
            $table->string('nombre_titular');
            $table->string('cargo_titular');
            $table->boolean('publicacion')->default(false);
            $table->timestamps();

            // Definir clave foránea
            $table->foreign('usuario_id')->references('idUsuario')->on('usuarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitudes');
    }
};
