<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use App\Gastos;
use App\Gastos_Cliente;
use App\Categoria_Gasto;
use App\Usuarios_Gastos;
use DB;

class GastoController extends Controller{
    
    public function registrar(){
        $categorias = Categoria_Gasto::all();
        $gastos = DB::table('vw_gastos_cliente')
        ->where('vw_gastos_cliente.usu_id', '=', Auth::id())
        ->get(); 
       
        return view('gastos',compact('gastos','categorias'));
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

            $usuario_gasto = new Usuarios_Gastos();
            $usuario_gasto->usu_id=Auth::id();
            $usuario_gasto->ga_id=$gasto_user->ga_id;

            $usuario_gasto->save();

            flash('!Se guardaron exitosamente los datos del Gasto ')->success();

        }catch(\Illuminate\Database\QueryException $e){
            flash('Error al Registrar Gasto, intenta de nuevo ')->error();

        }
    	
    	return redirect('/gastos');
    }

}
