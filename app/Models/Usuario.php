<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Para autenticación
use Illuminate\Notifications\Notifiable; 
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     *
     *
     * @var string
     */
    protected $table = 'usuarios'; // Nombre de la tabla

    /**
     *
     *
     * @var string
     */
    protected $primaryKey = 'idUsuario'; 

    /**
     * 
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
     * 
     *
     * @var array
     */
    protected $hidden = [
        'password',      // Se oculta la contra
        'remember_token',
    ];

    /**
     * Atributo de publicacion
     *
     * @var array
     */
    protected $casts = [
        'estado' => 'boolean',
    ];
}
