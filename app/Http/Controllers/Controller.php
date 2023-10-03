<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\ModelUsuario;
use App\Models\ModelProceso;
use App\Models\ModelClientes;
use App\Models\ModelGestion;
use Symfony\Component\VarDumper\VarDumper;

class Controller extends BaseController
{
    public function portafolio()
    {
        if(isset($_GET['procesos'])){
            $shema_procesos = ModelProceso::proceso_table_schema();
            return view('portafolio.procesos',['shema'=>$shema_procesos]);
        }elseif(isset($_GET['movimientos'])){
            return view('portafolio.movimientos');
        }elseif(isset($_GET['novedades'])){
            return view('portafolio.novedades');
        }elseif(isset($_GET['reportes'])){
            return view('portafolio.reportes');
        }
    }
    public function gestion()
    {
        if(isset($_GET['tareas'])){
            return view('gestion.procesos');
        }elseif(isset($_GET['calendario'])){
            return view('gestion.calendario');
        }
    }
    public function administracion()
    {
        if(isset($_GET['usuarios'])){
            $rol = ModelUsuario::getRolUsuario();
            $usuarios = ModelUsuario::getUsuarios();
            return view('administracion.usuario', ['rol' => $rol],['usuarios' => $usuarios]);
        }elseif(isset($_GET['clientes'])){
            $rows = 1;
            $cliente = ModelClientes::getClientes($rows);
            $cantidad = ModelClientes::getClientescount();
            return view('administracion.cliente', ['cliente'=>$cliente],['cantidad'=>$cantidad]);
        }elseif(isset($_GET['gestion'])){
            return view('administracion.administrar_datos');
        }
    }

    public function upload(){
        if (isset($_GET['upload'])){
            return view('upload.upload');
        }
    }

    

  
}
