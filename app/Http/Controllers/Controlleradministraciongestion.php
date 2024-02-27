<?php

namespace App\Http\Controllers;


use App\Models\ModelAdministracion;
use App\Models\ModelGestion;
use Illuminate\Http\Request;

class Controlleradministraciongestion extends Controller
{

    public function getAdminGestion()
    {

        $accion_admin = ModelGestion::getAccion_admin();
        $accion = ModelGestion::getAccion();
        $mtvonopago = ModelGestion::getMtvonoPago();
        $contacto = ModelGestion::getTipoContacto();
        $etapa = ModelGestion::getEtapaAdmin();
        $modulos = ModelGestion::modulos_gestion();
        $modulos_activos = ModelGestion::modulos_gestion_activos();
        $perfil = ModelGestion::perfil_gestion();
        $perfil_admin = ModelGestion::perfil_gestion_admin();
        $perfil_admin_edit = ModelGestion::perfil_gestion_admin();

        return response()->json([
            'accion_admin' => $accion_admin,
            'accion' => $accion,
            'mtvonopago' => $mtvonopago,
            'contacto' => $contacto,
            'etapa' => $etapa,
            'modulos' => $modulos,
            'modulos_activos' => $modulos_activos,
            'perfil' => $perfil,
            'perfil_admin' => $perfil_admin,
            'perfil_admin_edit' => $perfil_admin_edit,
        ]);
    }
    public function deshabilitarcontacto()
    {
        $id = request()[0];
        $etapa = ModelAdministracion::deshabilitarcontacto($id);
        return self::getAdminGestion();
    }
    public function habilitarcontacto()
    {
        $id = request()[0];
        $etapa = ModelAdministracion::habilitarcontacto($id);
        return self::getAdminGestion();
    }
    public function deshabilitaretapa()
    {
        $id = request()[0];
        $etapa = ModelAdministracion::deshabilitarEtapa($id);
        return self::getAdminGestion();
    }
    public function habilitaretapa()
    {
        $id = request()[0];
        $etapa = ModelAdministracion::habilitarEtapa($id);
        return self::getAdminGestion();
    }
    public function consultaretapas()
    {
        $etapa = ModelGestion::getEtapaAdmin();
        return $etapa;
    }
    public function insertaretapa()
    {
        $nombre = request()[0];
        
        $nombre = strtoupper($nombre);
        $etapa = ModelGestion::insertarEtapa($nombre);

        if ($etapa == 1) {
            $etapas = ModelGestion::getEtapa();
            for ($i = 0; $i < count($etapas); $i++) {
                $nombres[] = $etapas[$i]->nombre;
                $cantidad = count($etapas);
                $progreso = 100 / $cantidad;
                $progreso2 = 0;
                for ($z = 0; $z < $cantidad; $z++) {
                    if ($progreso2 >= $progreso) {
                        $progreso2 = $progreso2 + $progreso;
                    } else {
                        $progreso2 = $progreso;
                    }
                    $progreso3[] = $progreso2;
                }
            }
            for ($t = 0; $t < $cantidad; $t++) {
                $etapa = ModelGestion::UpdateProgresoEtapa($progreso3[$t], $nombres[$t]);
            }
        }
        return self::getAdminGestion();
    }
    public function actualizaretapa(Request $request)
    {
        $data = $request->collect();
        for ($i = 0; $i < count($data); $i++) {
            ModelGestion::UpdateEtapa($data[$i]['id'], $data[$i]['orden'], $data[$i]['bg']);
        }
        return self::getAdminGestion();
    }
    public function editaraccion(Request $request)
    {
        $data = $request->collect();
        for ($i = 0; $i < count($data); $i++) {
            ModelGestion::editaraccion($data[$i]['id'], $data[$i]['nombre']);
        }
        return self::getAdminGestion();
    }
    public function eliminar_etapa()
    {
        $id = request()[0];
        $etapa = ModelGestion::deleteEtapa($id['id']);
        if ($etapa == 1) {
            $etapas = ModelGestion::getEtapa();
            for ($i = 0; $i < count($etapas); $i++) {
                $nombres[] = $etapas[$i]->nombre;
                $cantidad = count($etapas);
                $progreso = 100 / $cantidad;
                $progreso2 = 0;
                for ($z = 0; $z < $cantidad; $z++) {
                    if ($progreso2 >= $progreso) {
                        $progreso2 = $progreso2 + $progreso;
                    } else {
                        $progreso2 = $progreso;
                    }
                    $progreso3[] = $progreso2;
                }
            }
            for ($t = 0; $t < $cantidad; $t++) {
                $etapa = ModelGestion::UpdateProgresoEtapa($progreso3[$t], $nombres[$t]);
            }
        }
        return self::getAdminGestion();
    }
    public function eliminar_perfil()
    {
        $id = request()[0];
        ModelGestion::deletePerfil($id);
        return self::getAdminGestion();
    }
    public function eliminaraccion()
    {
        $id = request()[0];
        ModelGestion::eliminaraccion($id);
        return self::getAdminGestion();
    }
    public function deshabilitarmodulos()
    {
        $id = request()[0];
        ModelAdministracion::deshabilitarmodulos($id);
       return self::getAdminGestion();
    }
    public function habilitarmodulos()
    {
        $id = request()[0];
        ModelAdministracion::habilitarmodulos($id);
       return self::getAdminGestion();
    }
    public function consultarmodulos()
    {
        $etapa = ModelGestion::modulos_gestion();
        return $etapa;
    }
    public function consultarmodulosactivos()
    {
        $etapa = ModelGestion::modulos_gestion_activos();
        return $etapa;
    }
    public function deshabilitaraccion()
    {
        $id = request()[0];
        $etapa = ModelAdministracion::deshabilitaraccion($id);
        return self::getAdminGestion();
    }
    public function deshabilitarperfil()
    {
        $id = request()[0];
        $etapa = ModelAdministracion::deshabilitarperfil($id);
        return self::getAdminGestion();
    }
    public function habilitarperfil()
    {
        $id = request()[0];
        $etapa = ModelAdministracion::habilitarperfil($id);
        return self::getAdminGestion();
    }
    public function habilitaraccion()
    {
        $id = request()[0];
        $etapa = ModelAdministracion::habilitaraccion($id);
        return self::getAdminGestion();
    }
    public function consultaraccion()
    {
        $etapa = ModelGestion::getAccion_admin();
        return $etapa;
    }
    public function consultarperfil()
    {
        $etapa = ModelGestion::perfil_gestion_admin();
        return $etapa;
    }
    public function insertaraccion()
    {
        $nombre = request()[0];
        $etapa = ModelGestion::insertaraccion($nombre);
        return self::getAdminGestion();
    }
    public function insertarperfil()
    {
        $nombre = request()[0];
        $etapa = ModelGestion::insertarperfil($nombre);
        return self::getAdminGestion();
    }
}
