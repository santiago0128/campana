<?php

namespace App\Http\Controllers;

use App\Models\ModelGestion;
use App\Models\ModelProceso;
use App\Models\ModelUsuario;
use App\Models\ModelClientes;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{

    public function index(){
        session(['idUsuario' => $_GET['idUsuario']]);
        $usuario = ModelUsuario::getUsuariosId(session('idUsuario'));
        return view('inicio')->with('usuario', $usuario);
    }

    public function portafolio()
    {
        if(isset($_GET['procesos'])){
            $shema_procesos = ModelProceso::proceso_table_schema();
            return view('portafolio.procesos',['schema'=>$shema_procesos]);
            
        }elseif(isset($_GET['movimientos'])){
            return view('portafolio.movimientos');
        }elseif(isset($_GET['novedades'])){
            return view('portafolio.novedades');
        }
    }
    public function gestion()
    {
        if(isset($_GET['tareas'])){
            $shema_procesos = DB::table('sys.schema_procesos')->get();
            return view('gestion.procesos')->with('schema', $shema_procesos);
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

    public function reportes(){
        if(isset($_GET['reportes'])){
            return view('reportes.reportes');
        }
    }

    public function upload(){
        if (isset($_GET['upload'])){
            return view('upload.upload');
        }
    }

    

  
}
