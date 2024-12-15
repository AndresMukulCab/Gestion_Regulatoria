<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Para autenticación
use Illuminate\Notifications\Notifiable; // Para notificaciones
use Laravel\Sanctum\HasApiTokens; // Para manejo de tokens de API

class Usuario extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * Tabla asociada al modelo.
     *
     * @var string
     */
    protected $table = 'usuarios'; // Nombre de la tabla

    /**
     * Clave primaria personalizada.
     *
     * @var string
     */
    protected $primaryKey = 'idUsuario'; // Nombre de la clave primaria

    /**
     * Atributos que se pueden asignar masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'password',
        'nombreUsuario',
        'apellidoPaterno',
        'apellidoMaterno',
        'email',
        'idDependencia',
        'rol',
        'estado',
    ];

    /**
     * Atributos ocultos para serialización.
     *
     * @var array
     */
    protected $hidden = [
        'password',      // Oculta la contraseña
        'remember_token', // Oculta el token de "recordarme"
    ];

    /**
     * Atributos que deben ser convertidos a tipos nativos.
     *
     * @var array
     */
    protected $casts = [
        'estado' => 'boolean', // Convierte el estado a booleano
    ];
}
