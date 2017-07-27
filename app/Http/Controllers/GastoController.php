<?php   

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use App\Gastos;
use App\Pagos;
use App\Categoria_Gasto;
use App\Frecuencia_Gasto; 
use DB; 

class GastoController extends Controller{
    
    public function registrar(){
        $categorias = Categoria_Gasto::where('cat_status', '<>', 0)->where('usu_id',Auth::id())->get();
        $frecuencia = Frecuencia_Gasto::all();
        $gastos = DB::table('gasto')
        ->where([
            ['ga_status', '=', '1'],
            ['gasto.usu_id', '=', Auth::id()],
        ]) 
        ->join('category_gasto', 'category_gasto.cat_id', '=', 'gasto.cat_id')
        ->join('frecuency_type', 'frecuency_type.ft_id', '=', 'gasto.ft_id')
        ->select('gasto.ga_id', 'gasto.ga_description', 'gasto.ga_numpagos','gasto.ga_pagoactual','gasto.ga_amount','gasto.ga_restante', 'category_gasto.cat_description', 'frecuency_type.ft_description', 'gasto.ga_status', 'gasto.ga_dia', 'gasto.ga_mes', 'gasto.ga_ano')
        ->get();

        //dd($gastos);
       
       $liquidados = DB::table('gasto')
        ->where([
            ['ga_status', '=', '2'],
            ['gasto.usu_id', '=', Auth::id()],
        ])
        ->join('category_gasto', 'category_gasto.cat_id', '=', 'gasto.cat_id')
        ->join('frecuency_type', 'frecuency_type.ft_id', '=', 'gasto.ft_id')
        ->select('gasto.ga_id', 'gasto.ga_description', 'gasto.ga_numpagos','gasto.ga_pagoactual','gasto.ga_amount', 'gasto.ga_restante','category_gasto.cat_description', 'frecuency_type.ft_description', 'gasto.ga_status', 'gasto.ga_dia', 'gasto.ga_mes', 'gasto.ga_ano')
        ->get();

        return view('gastos',compact('gastos','categorias', 'frecuencia','liquidados'));
    }

    public function guardar(Request $datos){
    	try{
              
            $gasto = new Gastos();
            $gasto->usu_id=Auth::id();
            $gasto->ga_description=$datos->input('descri');
            $gasto->ga_amount=$datos->input('cantidad');
            $gasto->ga_restante=$datos->input('cantidad');
            $gasto->ga_numpagos=$datos->input('pagos');
            $gasto->cat_id=$datos->input('cat');
            $gasto->ft_id=$datos->input('frecuen');
            $gasto->ga_ano=substr($datos->input('inicio'),6,9);
            $gasto->ga_mes=substr($datos->input('inicio'),0,2);
            $gasto->ga_dia=substr($datos->input('inicio'),3,2);
            $gasto->ga_prioridad=$datos->input('prio'); 
            $gasto->save();

            flash('!Se guardaron exitosamente los datos del Gasto ')->success();
            

        }catch(\Illuminate\Database\QueryException $e){
            flash('Error al Registrar Gasto, intenta de nuevo ')->error();

        }
    	
    	return redirect('/gastos');
    }

    public function editar($id){
        try{
            $gasto = DB::table('gasto')
            ->where('ga_id', '=', $id)
            ->first();

            $categorias = Categoria_Gasto::all();
            $frecuencia = Frecuencia_Gasto::all();

            return view('editargasto', compact('gasto','frecuencia','categorias'));

        }catch(\Illuminate\Database\QueryException $e){
            flash('Error nose puede Editar Gasto, intenta de nuevo ')->error();

            return redirect ('/gastos');
        }
    }

    public function actualizar($ga_id, Request $datos){
        try{
            $gasto = Gastos::find($ga_id);
            $gasto->ga_description=$datos->input('descri');
            $gasto->cat_id=$datos->input('cat');
            $gasto->ga_prioridad=$datos->input('prio');
            $gasto->save();

            flash('!Se Actualizaron exitosamente los datos del Gasto ')->success();            

        }catch(\Illuminate\Database\QueryException $e){
            flash('Error al Actualizar Gasto, intenta de nuevo ')->error();

        }
        
        return redirect('/gastos');
    }

    public function eliminar($id){
        try{
            DB::table('gasto')
            ->where('ga_id', $id)
            ->update(['ga_status' => 0]);

            $pagos = DB::table('pago')
            ->where('pa_id', '=' , $id)
            ->get();

            
            DB::table('pago')
            ->where('ga_id', $id)
            ->update(['pa_estatus' => 0]);   

            flash('!Se Elimino Gasto exitosamente¡')->success();

        }catch(\Illuminate\Database\QueryException $e){
            flash('Error al Eliminar Gasto, intenta de nuevo¡')->error();
        }

        return redirect ('/gastos');
    }

}
