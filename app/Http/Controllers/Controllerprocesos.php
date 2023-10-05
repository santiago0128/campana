<?php

namespace App\Http\Controllers;

use App\Models\ModelGestion;
use App\Models\ModelProceso;
use App\Models\ModelClientes;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Client\Request;
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

        $table = '<div class="col-6 card">';
        $table .= '<form method="POST" id="formUploadFile">';
        $table .= '<div class="form-group text-center">';
        $table .= '<input type="hidden" name="uploadFile" value="uploadFile">';
        $table .= "<input type='hidden' name='tipo_cargue' value='" . $tipo_carga . "'>";
        $table .= "<input type='hidden' name='dataFile' value='" . $dir . "'>";
        $table .= "<input type='hidden' name='url' value='" . $dir . "'>";
        $table .= '<h5>Total de los registros del archivo:' . $totalRegistros . '</h5><br>';
        $table .= '<button class="btn btn-primary text-white" type="button" onclick="sendData()"><i class="fa fa-upload"></i>&nbsp;Cargar Data</button>';
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
        $schema_table = DB::table('sys.schema_procesos')->select('nombre')->get();
        $esquema = [];
        for ($i = 0; $i < count($schema_table); $i++) {
            array_push($esquema,  $schema_table[$i]->nombre);
        }
        
        if ($_POST['tipo_cargue'] == "estructura") {
            $file = ModelProceso::InsertarEstructura($_POST['url']);
            Artisan::call('migrate');
            $archivo = public_path('filesDownload\estructuraProcesos.csv'); // Ruta al archivo de texto plano existente
            
            $schema = implode(';', $esquema);
            $nuevoContenido = "$schema";
            File::put($archivo, $nuevoContenido);
        } else {
            
            $schema = implode(',', $esquema);
            
            $file = ModelProceso::InsertarProceso($_POST['url'], $schema);
        }

        $alert = '<div class="alert alert-success" role="alert">' . $file . '</div>';

        die(print($alert));
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
        $procesos = ModelProceso::getProcesosfiltro($obligacion, $identificacion, $fecha_desde, $fecha_hasta, $estado);

        foreach ($procesos as $key) {
            $report = json_encode($key);
            $array[] = json_decode($report, true);
        }

        if (!empty($array)) {
            return $array;
        } else {
            return false;
        }
    }

    public function buscarProcesoId()
    {
        return view('gestion.gestion_procesos');
    }

    public function getdataproceso(){

        $identificacion = request()[0];
        $procesos = ModelProceso::getProcesosIdentificacion($identificacion);
        $historico = ModelGestion::getHistorico($identificacion);
        $accion = ModelGestion::getAccion();
        $mtvonopago = ModelGestion::getMtvonoPago();
        $actividad = ModelGestion::getActividadEconomica();
        $tipocontacto = ModelGestion::getTipoContacto();
        $etapa = ModelGestion::getEtapa();
        $modulo_gestion = ModelGestion::modulos_gestion();
        $perfil = ModelGestion::perfil_gestion();

        return response()->json([
            'procesos' => $procesos,
            'historico' => $historico,
            'accion' => $accion,
            'actividad' => $actividad,
            'tipocontacto' => $tipocontacto,
            'etapa' => $etapa,
            'modulo_gestion' => $modulo_gestion,
            'mtvonopago' => $mtvonopago,
            'perfil' => $perfil,
        ]);

    }

    public function activarcontacto(){

        $id = request()[0];
        $contacto = ModelGestion::getContactogestion($id);
        return response()->json([
            'contacto' => $contacto,
        ]);
    }
    public function activarperfil(){

        $id = request()[0];
        $perfil = ModelGestion::getPerfilgestion($id);
        return response()->json([
            'perfil' => $perfil,
        ]);
    }

    // public function descargarProceso()
    // {

    //     $body2 = json_decode($_POST['json']);
    //     $body = implode(",", $body2);
    //     $reporte = ModelProceso::getProcesos($body);
    //     return Excel::download($reporte, 'invoices.xlsx');
    // }
}
