<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Ingreso;
use App\Ingresos_cliente;
use App\Categoria_Ingreso;
use DB;
use App\ejemplo;

class ingresoController extends Controller{
    
    public function registrar(){
        $categorias = Categoria_Ingreso::all();
        $ingresos = Ingresos_cliente::all(); 
        
        return view('ingresos',compact('ingresos','categorias'));
    }

}
