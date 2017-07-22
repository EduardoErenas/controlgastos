<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use App\Gastos;
use App\Categoria_Gasto;
use App\Frecuencia_Gasto;
use DB;

class GastoController extends Controller{
    
    public function registrar(){
        $categorias = Categoria_Gasto::all();
        $frecuencia = Frecuencia_Gasto::all();
        $gastos = DB::table('gasto')
        ->where('usu_id', '=', Auth::id())
        ->get(); 
       
        return view('gastos',compact('gastos','categorias', 'frecuencia'));
    }

    public function guardar(Request $datos){
    	try{
            $gasto = new Gastos();
            $gasto->ga_description=$datos->input('descri');
            $gasto->ga_amount=$datos->input('cantidad');
            $gasto->ga_numpagos=$datos->input('pagos');
            $gasto->cat_id=$datos->input('cat');
            $gasto->ga_ano=substr($datos->input('corte'),6,9);
            $gasto->ga_mes=substr($datos->input('corte'),0,2);
            $gasto->ga_dia=substr($datos->input('corte'),3,2);
            $gasto->ga_prioridad=$datos->input('prio');

            $gasto->save();

            $gasto_user= Gastos::all();
            $gasto_user=$gasto_user->last();

            flash('!Se guardaron exitosamente los datos del Gasto ')->success();

        }catch(\Illuminate\Database\QueryException $e){
            flash('Error al Registrar Gasto, intenta de nuevo ')->error();

        }
    	
    	return redirect('/gastos');
    }

}
