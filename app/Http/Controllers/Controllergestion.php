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

        $fecha_agendado = !empty($fecha_agendado) ? $fecha_agendado : NULL;

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
