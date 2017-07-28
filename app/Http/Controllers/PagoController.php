<?php   
  
namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use App\Pagos; 
use App\Pagos_cliente;
use DB; 


class PagoController extends Controller{
    
    public function mostrar(){ 
        $pagos = Pagos_cliente::where('usu_id', '=', Auth::id())->where('pa_estatus', '=',1)->get();
        $liquidados = Pagos_cliente::where('usu_id', '=', Auth::id())->where('pa_estatus', '=',2)->get();
        
        return view('pagos', compact('pagos','liquidados'));
    }

    public function pagar($id,$monto){
        try{
            $ingreso = DB::table('ingreso')
            ->where('usu_id','=',Auth::id())
            ->where('in_status','=',1)
            ->sum('in_restante');
            
            if($ingreso<=0){
                flash('¡Error al Realizar Pago, no tienes ingresos disponibles¡')->error();            
            }elseif($ingreso>0 and $ingreso<$monto){
                flash('¡Error al Realizar Pago, no tienes ingresos suficientes¡')->error();            
            }
            else{
                DB::table('pago')
                ->where('pa_id', $id)
                ->update(['pa_estatus' => 2],['pa_fecha_pago' => 'now()']);

                flash('!Se Realizó Pago Exitosamente¡')->success();
            }
        }catch(\Illuminate\Database\QueryException $e){
            flash('Error al Hacer Pago, intenta de nuevo¡')->error();
        }

        return redirect ('/pagos');
    }
}
