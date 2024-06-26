<?php

namespace App\Http\Controllers;

use App\Models\ModelGestion;
use App\Models\ModelProceso;
use App\Models\ModelUsuario;
use Illuminate\Http\Request;
use App\Models\ModelClientes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;


class Controllerprocesos extends Controller
{

    public  function procesouploadfile()
    {
        return view('upload.upload');
    }
    public  function proceso_table_schema()
    {

        $tipo_carga = $_POST['tipo_cargue'];

        $dir = "$_SERVER[DOCUMENT_ROOT]/filesUpload/procesos" . date('Y-m-d-h-m-s') . "-Proceso.csv";
        move_uploaded_file($_FILES['csv']['tmp_name'], $dir);
        $file_handle = fopen($dir, 'r');

        while (!feof($file_handle)) {
            $linea_de_texto[] = fgetcsv($file_handle, 0, ';');
        }

        $totalRegistros = count($linea_de_texto);

        for ($i = 1; $i < count($linea_de_texto); $i++) {
            $data[] = $linea_de_texto[$i];
        }


        $table = '<div class="">';
        $table .= '<form method="POST" id="formUploadFile">';
        $table .= '<div class="form-group text-center">';
        $table .= '<input type="hidden" name="uploadFile" value="uploadFile">';
        $table .= "<input type='hidden' name='tipo_cargue' value='" . $tipo_carga . "'>";
        $table .= "<input type='hidden' name='dataFile' value='" . $dir . "'>";
        $table .= "<input type='hidden' name='url' value='" . $dir . "'>";
        $table .= "<table class='table'>";
        $table .= " <thead>";
        $table .= " <tr>";
        foreach ($linea_de_texto[0] as $value) {
            $table .= " <th> $value </th>";
        }
        $table .= "  </tr>";
        $table .= " </thead>";
        $table .= " <tbody>";
        for ($i = 1; $i < count($linea_de_texto); $i++) {
            // $table .= "<tr>";
            // for ($j = 0; $j < count($linea_de_texto[$i]); $j++) {
            //  $table .=  $linea_de_texto[1][$j];
            // }
            // $table .= "</tr>";
        }
        $table .= " <tbody>";
        $table .= "</table>";
        $table .= '<button class="btn btn-primary text-white" id="btn_cargar" type="button" onclick="sendData()"><i class="fa fa-upload"></i>&nbsp;Cargar Data</button>';
        $table .= '<br>';
        $table .= '<span class="progresocargadatos"></span>';
        $table .= '</div>';
        $table .= '</form>';
        $table .= '</div>';
        fclose($file_handle);
        die(print($table));
    }
    public function uploadfile()
    {

        if ($_POST['tipo_cargue'] == "estructura") {

            $file = ModelProceso::InsertarEstructura($_POST['url']);
            Artisan::call('migrate');
            $archivo = public_path('filesDownload\estructuraProcesos.csv');
            $esquema = self::getSchemaProcesos();
            $schema = implode(';', $esquema);
            File::put($archivo, $schema);
        } else {

            $esquema = self::getSchemaProcesos();
            $schema = implode(',', $esquema);
            $file = ModelProceso::InsertarProceso($_POST['url'], $schema);
            ModelProceso::InsertarObligaciones();
        }
        $alert = '<div class="alert alert-success" role="alert">' . $file . '</div>';
        die(print($alert));
    }

    public static function getSchemaProcesos()
    {
        $esquema = [];
        $schema_table = DB::table('sys.schema_procesos')->select('nombre')->get();
        for ($i = 0; $i < count($schema_table); $i++) {
            array_push($esquema,  $schema_table[$i]->nombre);
        }
        return $esquema;
    }
    public function buscarReporteProcesos()
    {

        $body2 = json_decode($_POST['json']);
        $body = implode(",", $body2);
        $reporte = ModelProceso::getProcesos($body);
        foreach ($reporte as $key) {
            $report = json_encode($key);
            $array[] = json_decode($report, true);
        }
        foreach ($array as $key2) {
            $reportes34[] = (array_values($key2));
        }
        return $reportes34;
    }
    public function buscarReporteProcesosfiltro()
    {

        $obligacion = request()['obligacion'];
        $identificacion = request()['identificacion'];
        $fecha_desde = request()['fecha_limite_desde'];
        $fecha_hasta = request()['fecha_limite_hasta'];
        $estado = request()['estado'];
        $usuario = request()['usuario'];
        $procesos = ModelProceso::getProcesosfiltro($obligacion, $identificacion, $fecha_desde, $fecha_hasta, $estado, $usuario);
        $usuarios = ModelUsuario::getUsuarios();

        foreach ($procesos as $key) {
            $report = json_encode($key);
            $array[] = json_decode($report, true);
        }
        return response()->json([
            'procesos' => $array,
            'usuario' => $usuarios
        ]);
    }

    public function buscarProcesoId()
    {
        $identificacion = request()['identificacion'];
        $obligacion = request()['obligacion'];
        $obligaciones = ModelGestion::getobligacion($identificacion, $obligacion);
        if ($obligaciones) {
            if ($obligaciones[0]->estado == 'Pendiente') {
                ModelProceso::updateAbrirObligacion($identificacion, $obligacion);
            }
            return view('gestion.gestion_procesos');
        } else {
            echo '<script>
            alert("No se puede abrir el proceso, por favor contactese con la persona encargada")
            </script>';
            return view('gestion.calendario');
        }
    }

    public function getdataproceso()
    {
        $id = request()['id'];
        $identificacion = request()['identificacion'];
        $obligacion = request()['obligacion'];

        $procesos = ModelProceso::getProcesosIdentificacion($id);
        $historico = ModelGestion::getHistorico($identificacion);
        $obligaciones = ModelGestion::getobligacion($identificacion, $procesos[0]->obligacion);
        $accion = ModelGestion::getAccion();
        $mtvonopago = ModelGestion::getMtvonoPago();
        $tipocontacto = ModelGestion::getTipoContacto();
        $etapa = ModelGestion::getEtapa();
        $modulo_gestion = ModelGestion::modulos_gestion();
        $perfil = ModelGestion::perfil_gestion();
        $archivos = ModelGestion::getArchivosCargados($identificacion, $obligacion);

        return response()->json([
            'procesos' => $procesos,
            'historico' => $historico,
            'accion' => $accion,
            'tipocontacto' => $tipocontacto,
            'etapa' => $etapa,
            'modulo_gestion' => $modulo_gestion,
            'mtvonopago' => $mtvonopago,
            'perfil' => $perfil,
            'obligaciones' => $obligaciones[0],
            'archivos' => $archivos,
        ]);
    }

    public function activarcontacto()
    {

        $id = request()[0];
        $contacto = ModelGestion::getContactogestion($id);
        return response()->json([
            'contacto' => $contacto,
        ]);
    }
    public function activarperfil()
    {

        $id = request()[0];
        $perfil = ModelGestion::getPerfilgestion($id);
        return response()->json([
            'perfil' => $perfil,
        ]);
    }
    public function getCamposFiltro()
    {
        $data = request()->post();

        for ($i = 0; $i < count($data); $i++) {
            $campos[] = ModelProceso::getCamposFiltro($data[$i]);
        }

        return response()->json([
            'campo' => $campos,
        ]);
    }

    public function getDataIndex()
    {
        $usuarios = ModelUsuario::getUsuarios();
        $usuario_session = ModelUsuario::getUsuariosId(session('idUsuario'));
        $obligaciones = ModelProceso::getObligaciones();
        $cantidad_procesos = ModelProceso::getProcesosCantidad();

        return response()->json([
            'usuarios' => $usuarios,
            'usuario_session' => $usuario_session,
            'obligaciones' => $obligaciones,
            'cantidad_procesos' => $cantidad_procesos,
        ]);
    }

    public function aplicarFiltro()
    {
        $data = request()->post();
        $whereClauses = [];
        for ($i = 0; $i < count($data); $i++) {
            $campo = $data[$i]['tabla'];
            $valor = $data[$i]['value'];
            $whereClauses[] = "$campo = '$valor'";
        }
        $whereString = implode(' AND ', $whereClauses);
        $procesos = ModelProceso::getProcesosFiltrado($whereString);
        return response()->json([
            'procesos' => $procesos,
        ]);
    }
    public static function agregarUsuariosProcesos()
    {
        $data = request()->post();
        $usuarios = $data['usuario'];
        $casos = $data['procesos'];
        $casosPorUsuario = floor(count($casos) / count($usuarios));
        shuffle($casos);
        $asignacion = [];
        foreach ($usuarios as $usuario) {
            $asignacion[$usuario] = array_splice($casos, 0, $casosPorUsuario);
        }
        $i = 0;
        while (!empty($casos)) {
            $usuario = $usuarios[$i % count($usuarios)];
            $asignacion[$usuario][] = array_pop($casos);
            $i++;
        }
        for ($i = 0; $i < count($usuarios); $i++) {
            for ($j = 0; $j < count($asignacion[$usuarios[$i]]); $j++) {
                $usuario_key = array_keys($asignacion);
                $usuario = $usuario_key[$i];
                $casos = $asignacion[$usuarios[$i]][$j];
                ModelProceso::agregarUsuarioProcesos($usuario, $casos['identificacion'], $casos['obligacion']);
            }
        }
    }
    public static function uploadFileGestion()
    {
        $dir = "$_SERVER[DOCUMENT_ROOT]/filesGestion/" . request()->identificacion . "-" . request()->obligacion . "/";
        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }
        $originalName = request()->file('fileInput')->getClientOriginalName();
        $filePath = $dir . $originalName;
        try {

            move_uploaded_file(request()['fileInput'], $filePath);

            $data = ModelGestion::getArchivosCargadosIdentificacion($originalName, request()->identificacion, request()->obligacion, $originalName, date('Y-m-d-h-m-s'));
            if(!$data){
                ModelGestion::insertRegistroArchivo(request()->identificacion, request()->obligacion, $originalName, date('Y-m-d H:m:s'));
            }else{
                ModelGestion::updateRegistroArchivo(request()->identificacion, request()->obligacion, $originalName, date('Y-m-d H:m:s'));
            }

            return response()->json([
                'status' => 200,
                'msg' => 'El archivo se cargo de manera correcta'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 500,
                'msg' => 'Algo salio mal! Contacta con Soporte'
            ]);
        }
    }
}
