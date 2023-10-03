<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;


class ModelGestion extends Model
{

    public static function getAccion_admin()
    {
        $sql = "SELECT * FROM sys.acciongestion order by id ";
        $data = DB::connection('pgsql')->select($sql);
        return $data;
        
    }
    public static function insertaraccion($nombre)
    {
        $sql = "INSERT INTO sys.acciongestion (nombre,idestatus) values ('$nombre', 1)";
        $data = DB::connection('pgsql')->select($sql);
        return 1;
        
    }
    public static function insertarperfil($nombre)
    {
        $sql = "INSERT INTO sys.perfil_gestion (nombre,idestatus,peso) values ('$nombre', 1, 100)";
        $data = DB::connection('pgsql')->select($sql);
        return 1;
        
    }
    public static function getAccion()
    {
        $sql = "SELECT * FROM sys.acciongestion where idestatus = 1 order by id";
        $data = DB::connection('pgsql')->select($sql);
        return $data;
        
    }
    public static function getContacto()
    {
        $sql = "SELECT * FROM sys.contacto ";
        $data = DB::connection('pgsql')->select($sql);
        return $data;
        
    }
    public static function getPerfilGestion()
    {
        $sql = "SELECT * FROM sys.perfilgestion";
        $data = DB::connection('pgsql')->select($sql);
        return $data;
        
    }
    public static function getMtvonoPago()
    {
        $sql = "SELECT * FROM sys.motivonopago";
        $data = DB::connection('pgsql')->select($sql);
        return $data;
        
    }
    public static function getActividadEconomica()
    {
        $sql = "SELECT * FROM sys.actividadeconomica";
        $data = DB::connection('pgsql')->select($sql);
        return $data;
        
    }
    public static function getTipoContacto()
    {
        $sql = "SELECT * FROM sys.tipocontacto";
        $data = DB::connection('pgsql')->select($sql);
        return $data;
        
    }
    public static function getEtapa()
    {
        $sql = "SELECT * FROM sys.etapa where idestatus = 1 order by orden";
        $data = DB::connection('pgsql')->select($sql);
        return $data;
        
    }
   
    public static function getEtapaAdmin()
    {
        $sql = "SELECT * FROM sys.etapa  order by id";
        $data = DB::connection('pgsql')->select($sql);
        return $data;
        
    }
    public static function modulos_gestion()
    {
        $sql = "SELECT * FROM sys.modulos_gestion  order by id";
        $data = DB::connection('pgsql')->select($sql);
        return $data;
        
    }
    public static function modulos_gestion_activos()
    {
        $sql = "SELECT * FROM sys.modulos_gestion where idestatus = 1 order by id";
        $data = DB::connection('pgsql')->select($sql);
        return $data;
        
    }
    public static function perfil_gestion()
    {
        $sql = "SELECT * FROM sys.perfil_gestion where idestatus = 1 order by id";
        $data = DB::connection('pgsql')->select($sql);
        return $data;
        
    }
    public static function perfil_gestion_admin()
    {
        $sql = "SELECT * FROM sys.perfil_gestion  order by id";
        $data = DB::connection('pgsql')->select($sql);
        return $data;
        
    }
   
    public static function insertarEtapa($nombre)
    {
        $sql = "INSERT INTO sys.etapa (nombre, idestatus) values ('$nombre', 1)";
        $data = DB::connection('pgsql')->select($sql);
        return 1;
        
    }
    public static function UpdateProgresoEtapa($progreso ,$nombre)
    {
       
        $sql = "UPDATE sys.etapa set progreso = CAST($progreso as int) where nombre = '$nombre'";
        $data = DB::connection('pgsql')->select($sql);
        return 1;
        
    }
    public static function UpdateEtapa($id ,$orden, $color)
    {
       
        $sql = "UPDATE sys.etapa set orden = $orden, bg = '$color' where id = '$id'";
        $data = DB::connection('pgsql')->select($sql);
        return 1;
        
    }
    public static function editaraccion($id ,$nombre)
    {
        
        $sql = "UPDATE sys.acciongestion set nombre = '$nombre' where id = '$id'";
        $data = DB::connection('pgsql')->select($sql);
        return 1;
    }
    public static function deleteEtapa($id)
    {
        $sql = "DELETE FROM sys.etapa  where id = '$id'";
        $data = DB::connection('pgsql')->select($sql);
        return 1;
        
    }
    public static function deletePerfil($id)
    {
        $sql = "DELETE FROM sys.perfil_gestion  where id = '$id'";
        $data = DB::connection('pgsql')->select($sql);
        return 1;
    }
    public static function eliminaraccion($id)
    {
        $sql = "DELETE FROM sys.acciongestion  where id = '$id'";
        $data = DB::connection('pgsql')->select($sql);
        return 1;
    }


    public static function InsertarGestion( $gestion, $segundos_totales, $etapa, $accion, $id, $ip, $identificacion,  $fecha_agendado, $codllamada, $login, $obligacion)
    {
                               
        $sql = "INSERT INTO sys.historicogestion ( fechagestion,gestion, ipequipo, tiempogestion, etapa, idaccion, idusuario,  codllamada,  fechaagendado, obligacion,  identificacion, login)
         VALUES( current_timestamp,  '$gestion', '$ip',  $segundos_totales, $etapa, $accion, $id,  '$codllamada', '$fecha_agendado', '$obligacion', '$identificacion', '$login') RETURNING id";
        $data = DB::connection('pgsql')->select($sql);
        return $data;
        
    }
    public static function InsertarfechasProcesos($id,$fecha_entrega_garantias, $fecha_sentencia, $fecha_presentacion_demanda, $fecha_liquidacion_credito,$fecha_admision,$fecha_terminacion,$fecha_notificacion,$fecha_ultima_actualizacion)
    {
                               
        $sql = "UPDATE sys.historicogestion SET  fecha_entrega_garantias='$fecha_entrega_garantias', fecha_sentencia='$fecha_sentencia', fecha_presentacion_demanda='$fecha_presentacion_demanda', fecha_liquidacion_credito='$fecha_liquidacion_credito', fecha_admision='$fecha_admision', fecha_terminacion='$fecha_terminacion', fecha_notificacion='$fecha_notificacion', fecha_ultima_actualizacion='$fecha_ultima_actualizacion' WHERE id = $id ";
        $data = DB::connection('pgsql')->select($sql);
        return $data;
        
    }
  
    public static function getHistorico($identificacion){

        $sql = "SELECT h.idprocesos,h.fechagestion,h.gestion,
        (select pg.nombre from sys.perfilgestion pg where h.idperfil = pg.id) as perfil,
        (select e.nombre from sys.etapa e where h.etapa = e.id) as etapa,
        (select a.nombre from sys.acciongestion a  where h.idaccion = a.id) as accion
        --(select c.nombre from sys.contacto c  where h.contacto = c.id) as contacto,
       -- (select m.nombre from sys.motivonopago m   where h.motnopago = m.id) as mtvonopago
        from sys.historicogestion h where h.identificacion = $identificacion order by h.fechagestion desc";


        $data = DB::connection('pgsql')->select($sql);
        return $data;
    }
    public static function getUltimaEtapa($identificacion){

        $sql = "SELECT e.nombre, e.bg, e.progreso from sys.historicogestion h inner join sys.etapa e on h.etapa = e.id where h.identificacion = $identificacion order by h.fechagestion desc limit 1";
        $data = DB::connection('pgsql')->select($sql);
        return $data;
    }
   
   
    
    
}
