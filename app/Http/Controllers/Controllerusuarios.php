<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\ModelUsuario;
use Symfony\Component\VarDumper\VarDumper;

class Controllerusuarios extends Controller
{
    public function insertarUsuarios( Request $request)
    {
       $user = request()->all();
       $nombre = $user['nombre'];
       $apellido = $user['apellido'];
       $identificacion = $user['identificacion'];
       $correo = $user['correo'];
       $telefono = $user['telefono'];
       $celular = $user['celular'];
       $rol = $user['rol'];
       $usuario = $user['usuario'];
       $contrasena = $user['contrasena'];
       ModelUsuario::insertarUsuario($nombre,$apellido,$correo,$identificacion,$rol,$telefono,$celular,$usuario,$contrasena);
     
    }
   

}
