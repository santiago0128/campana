<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class ModelUsuario extends Model
{

    public static function getUsuarios()
    {
        $query = "SELECT * FROM dblink('dbname=postgres user=postgres password=santiago10.', 'SELECT id,name,email,rol,campanas,activo FROM users') AS t(id INT, name TEXT,email TEXT,rol TEXT,campanas TEXT,activo TEXT)";
        $resultados = DB::select($query);
        return $resultados;  
    }
    public static function getUsuariosId($id)
    {
        $query = "SELECT * FROM dblink('dbname=postgres user=postgres password=santiago10.', 'SELECT id,name,email,rol,campanas,activo FROM users where id = $id') AS t(id INT, name TEXT,email TEXT,rol TEXT,campanas TEXT,activo TEXT)";
        $resultados = DB::select($query);
        return $resultados;  
    }
    
    
}
