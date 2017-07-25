<?php  
 
namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use App\Pagos;
use App\Pagos_cliente;
use DB;


class PagoController extends Controller{
    
    public function mostrar(){
        $pagos = Pagos_cliente::where('usu_id', '=', Auth::id())->get();
        
        return view('pagos', compact('pagos'));
    }

    public function pagar($id){
        try{
            DB::table('ingreso')
            ->where('in_id', $id)
            ->update(['in_status' => 0]);

            flash('!Se Elimino Ingreso exitosamente¡')->success();

        }catch(\Illuminate\Database\QueryException $e){
            flash('Error al Eliminar Ingreso, intenta de nuevo¡')->error();
        }

        return redirect ('/ingresos');
    }
}
