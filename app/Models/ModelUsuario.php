<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;


class ModelUsuario extends Model
{

    public static function getUsuarios()
    {
        $query = "SELECT * FROM dblink('dbname=postgres user=postgres password=postgres', 'SELECT id,name,email,rol,campanas,activo,campana_activa,fecha_ingreso_campana FROM users') AS t(id INT, name TEXT,email TEXT,rol TEXT,campanas TEXT,activo TEXT, campana_activa TEXT, fecha_ingreso_campana TEXT)";
        $resultados = DB::select($query);
        return $resultados;  
    }
    public static function getUsuariosId($id)
    {
        $query = "SELECT * FROM dblink('dbname=postgres user=postgres password=postgres', 'SELECT id,name,email,rol,campanas,activo,estado,campana_activa,fecha_ingreso_campana FROM users where id = $id') AS t(id INT, name TEXT,email TEXT,rol TEXT,campanas TEXT,activo TEXT,estado TEXT, campana_activa TEXT, fecha_ingreso_campana TEXT)";
        $resultados = DB::select($query);
        return $resultados;  
    }
    public static function updateUsuariosEstado($id, $estado)
    {
        $query = "SELECT dblink_exec('dbname=postgres user=postgres password=postgres', 'UPDATE public.users SET estado = $estado WHERE id = $id');";
        $resultados = DB::select($query);
        return $resultados;  
    }

    public static function salirCampana(){
        $id = session('idUsuario');
        $query = "SELECT dblink_exec('dbname=postgres user=postgres password=postgres', 'UPDATE public.users SET campana_activa = null WHERE id =  $id');";
        $resultados = DB::select($query);
        return $resultados;  
    }
    
    
}
