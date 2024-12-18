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

    public function register(Request $request)
{
    // Validar los datos de entrada
    $request->validate([
        'nombreUsuario' => 'required|string|max:255',
        'apellidoPaterno' => 'required|string|max:255',
        'apellidoMaterno' => 'required|string|max:255',
        'email' => 'required|email|unique:usuarios,email',
        'password' => 'required|min:6',
        'idDependencia' => 'nullable|integer',
        'rol' => 'required|in:Enlace,SujetoObligado,Ciudadano',
    ]);

    // Crear el nuevo usuario
    $usuario = Usuario::create([
        'nombreUsuario' => $request->nombreUsuario,
        'apellidoPaterno' => $request->apellidoPaterno,
        'apellidoMaterno' => $request->apellidoMaterno,
        'email' => $request->email,
        'password' => Hash::make($request->password), // Cifrar la contraseña
        'idDependencia' => $request->idDependencia,
        'rol' => $request->rol,
        'estado' => true, // Estado activo por defecto
    ]);

    // Generar un token
    $token = $usuario->createToken('authToken')->plainTextToken;

    // Retornar la respuesta
    return response()->json([
        'message' => 'Usuario registrado exitosamente',
        'token' => $token,
        'usuario' => $usuario
    ], 201);
}




}
