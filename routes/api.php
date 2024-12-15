<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\SolicitudController;


Route::post('/login', [UsuarioController::class, 'login']);

Route::get('/solicitudes', [SolicitudController::class, 'index']);
Route::post('/solicitudes', [SolicitudController::class, 'store']);