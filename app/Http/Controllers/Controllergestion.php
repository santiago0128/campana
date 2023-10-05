<?php

namespace App\Http\Controllers;


use App\Models\ModelGestion;

class Controllergestion extends Controller
{


    public function saveGestion()
    {

        $hora = request()['hora'];
        $minuto = request()['minuto'];
        $segundos = request()['segundos'];
        $gestion = request()['texto'];
        $accion = request()['accion'];
        $contacto = request()['contacto'];
        $perfil = request()['perfil'];
        $fecha_agendado = request()['fecha_agendado'];
        $identificacion = request()['identificacion'];
        $obligacion = request()['obligacion'];
        $id = 1;
        $ip = $_SERVER['REMOTE_ADDR'];
        $login = "prueba";

        $fecha_agendado = !empty($fecha_agendado) ? $fecha_agendado : "NULL";

        $hora = $hora < 10 ? '0' . $hora : $hora;
        $minuto = $minuto < 10 ? '0' . $minuto : $minuto;
        $segundos = $segundos < 10 ? '0' . $segundos : $segundos;

        $tiempo_gestion = "$hora : $minuto : $segundos";

        try {
            $gestion2 = ModelGestion::InsertarGestion( $gestion, $tiempo_gestion, $perfil, $contacto ,$accion, $id, $ip, $identificacion, $fecha_agendado, $login, $obligacion);
            return $gestion2;
        } catch (\Throwable $th) {
            echo "Error Insertar Gestion" . $th;
        }
    }

    public function savefechas_proceso()
    {
      
        $id = $_POST['id'];
        $fecha_entrega_garantias = $_POST['fecha_entrega_garantias'];
        $fecha_sentencia = $_POST['fecha_sentencia'];
        $fecha_presentacion_demanda = $_POST['fecha_presentacion_demanda'];
        $fecha_liquidacion_credito = $_POST['fecha_liquidacion_credito'];
        $fecha_admision = $_POST['fecha_admision'];
        $fecha_terminacion = $_POST['fecha_terminacion'];
        $fecha_notificacion = $_POST['fecha_notificacion'];
        $fecha_ultima_actualizacion = $_POST['fecha_ultima_actualizacion'];

        if (!empty($fecha_entrega_garantias)) {
            $fecha_entrega_garantias = $fecha_entrega_garantias;
        } else {
            $fecha_entrega_garantias = "NULL";
        }

        if (!empty($fecha_sentencia)) {
            $fecha_sentencia = $fecha_sentencia;
        } else {
            $fecha_sentencia = "NULL";
        }

        if (!empty($fecha_presentacion_demanda)) {
            $fecha_presentacion_demanda = $fecha_presentacion_demanda;
        } else {
            $fecha_presentacion_demanda = "NULL";
        }

        if (!empty($fecha_liquidacion_credito)) {
            $fecha_liquidacion_credito = $fecha_liquidacion_credito;
        } else {
            $fecha_liquidacion_credito = "NULL";
        }

        if (!empty($fecha_admision)) {
            $fecha_admision = $fecha_admision;
        } else {
            $fecha_admision = "NULL";
        }

        if (!empty($fecha_terminacion)) {
            $fecha_terminacion = $fecha_terminacion;
        } else {
            $fecha_terminacion = "NULL";
        }

        if (!empty($fecha_notificacion)) {
            $fecha_notificacion = $fecha_notificacion;
        } else {
            $fecha_notificacion = "NULL";
        }

        if (!empty($fecha_ultima_actualizacion)) {
            $fecha_ultima_actualizacion = $fecha_ultima_actualizacion;
        } else {
            $fecha_ultima_actualizacion = "NULL";
        }


        try {
            $gestion2 = ModelGestion::InsertarfechasProcesos($id,$fecha_entrega_garantias, $fecha_sentencia, $fecha_presentacion_demanda, $fecha_liquidacion_credito, $fecha_admision, $fecha_terminacion, $fecha_notificacion, $fecha_ultima_actualizacion);
            return 1;
        } catch (\Throwable $th) {
            echo "Error Insertar Gestion" . $th;
        }
    }

    public function buscarhistorico()
    {
        $identificacion = $_POST['identificacion'];
        $historico = ModelGestion::getHistorico($identificacion);
        return $historico;
    }
    public function buscaretapa()
    {
        $identificacion = $_POST['identificacion'];
        $etapa = ModelGestion::getUltimaEtapa($identificacion);
        return $etapa;
    }
}
