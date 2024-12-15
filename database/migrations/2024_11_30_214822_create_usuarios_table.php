<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('usuarios', function (Blueprint $table) {
        $table->id('idUsuario');
        $table->string('password');
        $table->string('nombreUsuario');
        $table->string('apellidoPaterno');
        $table->string('apellidoMaterno');
        $table->string('email')->unique();
        $table->unsignedBigInteger('idDependencia')->nullable();
        $table->enum('rol', ['Enlace', 'SujetoObligado', 'Ciudadano']);
        $table->boolean('estado')->default(1);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
