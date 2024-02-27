<?php

namespace App\Http\Controllers;

use App\Models\ModelProceso;
use App\Models\MyExport;
use Maatwebsite\Excel\Facades\Excel;



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
        $data = request()->post();
        
        $data = [
            ['Name', 'Email'],
            ['John Doe', 'john@example.com'],
            ['Jane Doe', 'jane@example.com'],
        ];

        return Excel::download(new MyExport($data), 'users.xlsx');
       
    }
}
