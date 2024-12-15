<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

class UsuarioSeeder extends Seeder
{

public function run()
{
    Usuario::create([
        'nombreUsuario' => 'Marcos',
        'apellidoPaterno' => 'Lopez',
        'apellidoMaterno' => 'Aquino',
        'email' => 'Marcos.aquino@example.com',
        'idDependencia' => 2,
        'rol' => 'SujetoObligado',
        'estado' => 1,
        'password' => Hash::make('hola123'),
    ]);
}

}