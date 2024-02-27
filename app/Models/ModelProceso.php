<?php

namespace App\Models;

use PDOException;
use App\Models\ModelUsuario;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;


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
    public static function getProcesosCantidad()
    {
        $sql = ("SELECT count(*) as cantidad from sys.procesos");
        $report = DB::connection('pgsql')->select($sql);
        return $report;
    }
    public static function updateAbrirObligacion($identificacion, $obligacion)
    {

        $sql = ("UPDATE sys.obligaciones SET  estado='Abierto' where obligacion='$obligacion' and identificacion = $identificacion");
        $report = DB::connection('pgsql')->select($sql);
        return $report;
    }
    public static function updateCerrarObligacion($identificacion, $obligacion)
    {

        $sql = ("UPDATE sys.obligaciones SET  estado='Cerrado' where obligacion='$obligacion' and identificacion = $identificacion");
        $report = DB::connection('pgsql')->select($sql);
        return $report;
    }
    public static function getProcesosIdentificacion($id)
    {

        $sql = ("SELECT * from sys.procesos where id = '$id'");
        $report = DB::connection('pgsql')->select($sql);
        return $report;
    }
    public static function getProcesosfiltro($obligacion, $identificacion, $fecha_desde, $fecha_hasta, $estado)
    {
        $fecha_hoy = date('Y-m-d');
        $sql = "SELECT * from sys.procesos p inner join sys.obligaciones o on o.obligacion = p.obligacion and  o.identificacion = p.identificacion  where true";

        if (!empty($obligacion)) {
            $sql .= " AND p.obligacion = '$obligacion' ";
        }
        if (!empty($identificacion)) {
            $sql .= " AND p.identificacion = '$identificacion' ";
        }
        if (!empty($estado)) {
            $sql .= " AND o.estado = '$estado' ";
        }
        if (!empty($fecha_desde)) {
            if (!empty($fecha_hasta)) {
                $sql .= " AND fecha_ingreso = '$fecha_desde' between '$fecha_hasta' ";
            } else {
                $sql .= " AND fecha_ingreso = '$fecha_desde' between '$fecha_hoy'";
            }
        }
        $report = DB::connection('pgsql')->select($sql);
        return $report;
    }
    public static function Procesosall()
    {

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
        $schema = str_replace(' ', '', $schema);
        try {
            DB::connection('pgsql')->select(" truncate table sys.procesos RESTART IDENTITY ");
            DB::connection('pgsql')->select("COPY sys.procesos ($schema) FROM '$url' DELIMITER ';' CSV HEADER ENCODING 'LATIN1'");
            return ('Proceso Guardado');
        } catch (PDOException $th) {
            $returnedData[0] = $th->getMessage();
            die(json_encode($returnedData));
        }
    }
    public static function insertarObligaciones()
    {

        DB::connection('pgsql')->select(" truncate table sys.obligaciones RESTART IDENTITY ");
        $procesos = self::Procesosall();
        try {
            for ($i = 0; $i < count($procesos); $i++) {
                $identificacion = $procesos[$i]->identificacion;
                $obligacion = $procesos[$i]->obligacion;
                DB::connection('pgsql')->select("INSERT INTO sys.obligaciones (obligacion, identificacion, estado) VALUES('$obligacion', '$identificacion', 'Pendiente');");
            }
        } catch (\Throwable $th) {
            $returnedData[0] = $th->getMessage();
            die(json_encode($returnedData));
        }
    }
    public static function getObligaciones()
    {
        $sql = ("SELECT * from sys.obligaciones");
        $report = DB::connection('pgsql')->select($sql);
        return $report;
    }
    public static function getCamposFiltro($data)
    {
        $sql = ("SELECT distinct($data) from sys.procesos");
        $report = DB::connection('pgsql')->select($sql);
        return $report;
    }
    public static function getProcesosFiltrado($where)
    {
        $sql = ("SELECT * from sys.procesos where true and $where");
        $report = DB::connection('pgsql')->select($sql);
        return $report;
    }

    public static function agregarUsuarioProcesos($usuario, $identificacion, $obligacion)
    {
        $sql = ("UPDATE sys.obligaciones set  usuario = '$usuario' where obligacion = '$obligacion' and identificacion = '$identificacion'");
        $report = DB::connection('pgsql')->select($sql);
        return $report;
    }

    public static function getReportes(){
        $sql = "SELECT * from sys.tipo_reportes";
        $report = DB::connection('pgsql')->select($sql);
        return $report;
    }

}
