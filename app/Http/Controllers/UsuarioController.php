<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Para verificar contraseñas
use Illuminate\Support\Facades\Auth; // Para autenticación
use App\Models\Usuario; // Modelo de usuarios 


class UsuarioController extends Controller
{
    public function login(Request $request)
    {
        // Validar entrada
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Verificar credenciales
        $usuario = Usuario::where('email', $request->email)->first();
    
        if (!$usuario || !Hash::check($request->password, $usuario->password)) {
            return response()->json(['message' => 'Credenciales incorrectas'], 401);
        }
    
        // Generar un token
        $token = $usuario->createToken('authToken')->plainTextToken;
    
        // Retornar respuesta
        return response()->json([
            'message' => 'Inicio de sesión exitoso',
            'token' => $token,
            'usuario' => $usuario,
        ]);
    }     

}
