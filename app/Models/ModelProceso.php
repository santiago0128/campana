<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use PDOException;
use App\Models\ModelClientes;

class ModelProceso extends Model
{

    public static function proceso_table_schema()
    {

        $data = DB::connection('pgsql')->select("SELECT column_name AS columnas                
        FROM information_schema.columns    
        WHERE table_schema = 'sys' AND table_name  = 'procesos'");
        return $data;
    }
    public static function getProcesos($body)
    {

        $sql = ("SELECT $body from sys.procesos");
        $report = DB::connection('pgsql')->select($sql);
        return $report;

    }
    public static function getProcesosCantidad($body)
    {

        $sql = ("SELECT count(*) as cantidad from sys.procesos");
        $report = DB::connection('pgsql')->select($sql);
        return $report;

    }

    public static function getProcesosIdentificacion($id){

        $sql = ("SELECT * from sys.procesos where id = '$id'");
        $report = DB::connection('pgsql')->select($sql);
        return $report;

    }


    public static function getProcesosfiltro($obligacion,$identificacion,$fecha_desde,$fecha_hasta,$estado)
    {
        $fecha_hoy = date('Y-m-d');
        $sql = "SELECT * from sys.procesos where true";
       
        if (!empty($obligacion)) {
        $sql .= " AND obligacion = '$obligacion' ";
        }
        if (!empty($identificacion)) {
        $sql .= " AND identificacion = '$identificacion' ";
        }
        if (!empty($estado)) {
        $sql .= " AND idestatus = '$estado' ";
        }
        if (!empty($fecha_desde)) {
            if (!empty($fecha_hasta)) {
                $sql .= " AND fecha_ingreso = '$fecha_desde' between '$fecha_hasta' ";
            }else{
                $sql .= " AND fecha_ingreso = '$fecha_desde' between '$fecha_hoy'";
            }
        }
        $report = DB::connection('pgsql')->select($sql);
        return $report;

    }

    public static function Procesosall(){

        $sql = ("SELECT * from sys.procesos ");
        $report = DB::connection('pgsql')->select($sql);
        return $report;
    }
    
    public static function InsertarEstructura($url)
    {
        try {
            
            DB::connection('pgsql')->select(" truncate table sys.schema_procesos RESTART IDENTITY ");
            DB::connection('pgsql')->select(" truncate table migrations RESTART IDENTITY ");
            DB::connection('pgsql')->select("COPY sys.schema_procesos (nombre) FROM '$url' DELIMITER ';' CSV HEADER ENCODING 'LATIN1'");

            return ('Estructura Guardado');
        } catch (PDOException $th) {
            $returnedData[0] = $th->getMessage();
            die(json_encode($returnedData));
        }
    }
    public static function InsertarProceso($url, $schema)
    {
        try {
            DB::connection('pgsql')->select(" truncate table sys.procesos RESTART IDENTITY ");
            DB::connection('pgsql')->select("COPY sys.procesos ($schema) FROM '$url' DELIMITER ';' CSV HEADER ENCODING 'LATIN1'");
            return ('Proceso Guardado');
        } catch (PDOException $th) {
            $returnedData[0] = $th->getMessage();
            die(json_encode($returnedData));
        }
    }
}
