<?php

namespace App\Http\Controllers;

use App\Models\ModelProceso;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;




class ControllerReporte extends Controller
{

    public function getReportes()
    {
        $reporte = ModelProceso::getReportes();
        return response()->json([
            'reportes' => $reporte,
        ]);
    }
    public function mountedReport()
    {
        $request = request()->post();
        $spreadsheet = new Spreadsheet();

        $resultados = self::getDataReporte($request);
        
        $sheet = $spreadsheet->getActiveSheet();
        $claves = array_keys($resultados[0]);
        for ($i = 0; $i < count($claves); $i++) {
            $columnHeaders[$i] = $claves[$i];
        }
        $sheet->fromArray([$columnHeaders], null, 'A1');
        $columnHeaders2 = [$claves];
        $row = 2;
        foreach ($resultados as $row_data) {
            $column = 'A';
            for ($i = 0; $i < count($columnHeaders2[0]); $i++) {
                $sheet->setCellValue($column++ . $row, $row_data[$columnHeaders2[0][$i]]);
            }
            $row++;
        }

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="ejemplo_excel.xlsx"');
        header('Cache-Control: max-age=0');
        $writer = new Xlsx($spreadsheet);
        $writer->save('../public/filesDownload/prueba.xlsx');
        exit;
        
        
    }

    public function getDataReporte($data){

        $fecha_inicio = $data['fecha_inicio'];
        $fecha_fin = $data['fecha_fin'];
        $reporte = $data['tipo_reporte'];

        if($reporte == 'Gestion'){

            $sql = "SELECT h.obligacion,  h.fechagestion, h.gestion, a.nombre, pg.nombre, c.nombre,
            (SELECT * FROM dblink('dbname=postgres user=postgres password=postgres', 'SELECT name FROM users where id =' || h.idusuario )AS t( name TEXT)) AS subquery_result
            from sys.historicogestion h  inner join sys.acciongestion a on a.id = h.idaccion inner join sys.perfil_gestion pg on pg.id = h.idperfil inner join sys.contacto c on c.id = h.idaccion where h.fechagestion between '$fecha_inicio' and '$fecha_fin'";

        }else if($reporte == 'Productividad'){

        
        }else if($reporte == 'Usuario'){

        }

        $data = DB::connection('pgsql')->select($sql);
        return $data;
    }
}
