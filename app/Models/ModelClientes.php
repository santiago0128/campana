<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;


class ModelClientes extends Model
{

    public static function getClientes($rows)
    {
        $index = ($rows -1) * 10;
        $query = "select * from sys.dblink('dbname=cct_occidente_castigo user=postgres password=N3xtG3n2020//*', 'SELECT cliente.id, cliente.nombrecompleto, cliente.motvnopago, cliente.asesor, cliente.identificacion, cliente.idcliente FROM sys.cliente  order by cliente.id asc offset $index rows fetch next 10 rows only ') cliente(id int ,nombrecompleto text, motvnopago text, asesor text, identificacion int, idcliente int)";
        $usuarios = DB::connection('pgsql')->select($query);
        return $usuarios;  
    }

    public static function getClientescount()
    {
        $sql = "SELECT count(*) as cantidad FROM sys.cliente ";
        $data = DB::connection('pgsql')->select($sql);
        return $data;
    }
   
    public static function getClientesIdentificacion($identificacion)
    {
        $query = "SELECT cliente.nombre,  cliente.identificacion, cliente.id, obligaciones.obligacion FROM sys.cliente inner join sys.obligaciones on cliente.identificacion = obligaciones.identificacion  where cliente.identificacion = $identificacion";
        $usuarios = DB::connection('pgsql')->select($query);
        return $usuarios;  
        
    }
    public static function getClientesFiltro($data)
    {

        $query = "SELECT cliente.id, cliente.nombrecompleto, cliente.motvnopago, cliente.asesor, cliente.identificacion, cliente.idcliente FROM sys.cliente where true and cliente.identificacion::varchar like '%$data%' or cliente.nombrecompleto::varchar like '%$data%' or cliente.id::varchar like '%$data%' order by cliente.id asc offset 0 rows fetch next 10 rows only";
        $usuarios = DB::connection('pgsql')->select($query);
        return $usuarios;  
        
    }
    
    
}
