<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class ejemplo extends Model
{
	protected $table='alumnos';

    //Ejemplo de método en el modelo para regresar datos

    public static function getAlumnos(){
    	$b=false;
    	try {
    		$alumnos=DB::table('alumnos')
    		->get();
    	} catch (Exception $e) {
    		$b=true;
    	}
    	return array("alumnos"=>$alumnos, "error" => $b);
    }
}
