<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Ingresos;
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

    public function guardar(Request $datos){
    	try{
            $ingreso = new Ingresos();
            $ingreso->in_id=2;
            $ingreso->in_description=$datos->input('descripcion');
            $ingreso->in_restante=0;
            $ingreso->in_amount=$datos->input('monto');
            $ingreso->cat_id=$datos->input('categoria');
            
            $ingreso->save();

            flash('!Se guardaron exitosamente los datos del Ingreso ')->success();

        }catch(\Illuminate\Database\QueryException $e){
            flash('Error al Registrar Ingreso, intenta de nuevo ')->error();

        }
    	
    	return redirect('/ingresos');
    }

}
