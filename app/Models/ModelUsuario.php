<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class ModelUsuario extends Model
{

   


    public static function insertarUsuario($nombre, $apellido, $correo, $identificacion, $rol, $telefono, $celular, $usuario, $contrasena)
    {
        $contrasena2 = md5($contrasena);
        $data = DB::connection('pgsql')
            ->select('SELECT * FROM sys.insertusuarios(?,?,?,?,?,?,?,?,?)', [$nombre, $apellido, $correo, $identificacion, $rol, $telefono, $celular, $usuario, $contrasena2]);
        return $data;
    }
    public static function getRolUsuario()
    {
        $rol = DB::connection('pgsql')
            ->select('SELECT * FROM sys.roles');
        return $rol;
    }
    public static function getUsuarios()
    {
        $query = "select * from sys.dblink('dbname=cct_adm user=postgres password=N3xtG3n2020//*', 'SELECT  usuarios.idusu, usuarios.documento, usuarios.logusu,usuarios.nomusu ,usuarios.apeusu FROM sys.usuarios ') usuarios(idusu int, documento bigint, logusu text,nomusu text, apeusu text)";
        $usuarios = DB::connection('pgsql')->select($query);
        $result = new Paginator($usuarios, 10);       
        return $result;  
        
    }
    
    
}
