<?php

namespace App\Http\Controllers;


use App\Models\ModelGestion;
use App\Models\ModelProceso;
use App\Models\ModelUsuario;

class Controllergestion extends Controller
{


    public function saveGestion()
    {
        
        $usuarioid = ModelUsuario::getUsuariosId(session('idUsuario'));

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
        $idproceso = request()['id'];
        $id = $usuarioid[0]->id;
        $ip = $_SERVER['REMOTE_ADDR'];
        $login = $usuarioid[0]->email;
        
        ModelProceso::updateCerrarObligacion($identificacion, $obligacion);

        $fecha_agendado = !empty($fecha_agendado) ? $fecha_agendado : NULL;

        if (!empty($fecha_agendado)) {
            self::agregarAgenda($fecha_agendado, $identificacion, $obligacion, $idproceso);
        }


        $hora = $hora < 10 ? '0' . $hora : $hora;
        $minuto = $minuto < 10 ? '0' . $minuto : $minuto;
        $segundos = $segundos < 10 ? '0' . $segundos : $segundos;

        $tiempo_gestion = "$hora : $minuto : $segundos";

        try {
            $gestion2 = ModelGestion::InsertarGestion($gestion, $tiempo_gestion, $perfil, $contacto, $accion, $id, $ip, $identificacion, $fecha_agendado, $login, $obligacion);
            return $gestion2;
        } catch (\Throwable $th) {
            echo "Error Insertar Gestion" . $th;
        }
    }

    public function agregarAgenda($fecha_agendado, $identificacion, $obligacion, $idproceso){
        ModelGestion::Agregaragenda($fecha_agendado, $identificacion, $obligacion,$idproceso);
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

    public function getAgenda()
    {
        $etapa = ModelGestion::getAgenda(session('idUsuario'));
        return $etapa;
    }
}
