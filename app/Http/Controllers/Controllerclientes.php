<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\ModelClientes;

class Controllerclientes extends Controller
{
    public function consultarclientes()
    {
        $rows = $_POST['index'];
        if ($rows <= 1) {
         $rows = 1;
        }else{
           $rows = $rows; 
        }
        $cliente = ModelClientes::getClientes($rows);
        return $cliente;
     
    }
    public function consultarclientesFiltro()
    {
      
        $data = $_POST['data'];
        $cliente = ModelClientes::getClientesFiltro($data);
        return $cliente;

       
     
    }
  
   

}
