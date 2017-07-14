<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\ejemplo;

class ejemploController extends Controller
{
    public function index(){
    	return view('formularioGeneral');
    }

    public function ejemplo(){
    	return view('propiedades');
    }
    //Ejemplo de API, regresar datos a la vista de angular
    
    // public function getAlumnos(){
    // 	$datos=ejemplo::getAlumnos();
    	
    // 	return response()->json($datos);
    // }
}
