<?php  
 
namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use App\Ingresos;
use App\Usuario_ingreso;
use App\Ingresos_cliente;
use App\Categoria_Ingreso;
use DB;
use App\ejemplo;

class ingresoController extends Controller{
    
    public function registrar(){
        $categorias = Categoria_Ingreso::all();
        $ingresos = Ingresos_cliente::where('usu_id',Auth::id())->get(); 
        
        return view('ingresos',compact('ingresos','categorias'));
    } 

    public function guardar(Request $datos){
    	try{
            $ingreso = new Ingresos();
            $ingreso->in_description=$datos->input('descripcion');
            $ingreso->in_amount=$datos->input('monto');
            $ingreso->in_restante=$datos->input('monto');
            $ingreso->cat_id=$datos->input('categoria');
            $ingreso->save();

            $lastInsertedId = $ingreso->id;

            $usu_ingreso = new Usuario_ingreso();
            $usu_ingreso->usu_id=Auth::id();
            $usu_ingreso->in_id=$lastInsertedId;
            $usu_ingreso->save();

            flash('!Se guardaron exitosamente los datos del Ingreso ')->success();

        }catch(\Illuminate\Database\QueryException $e){
            flash('Error al Registrar Ingreso, intenta de nuevo ')->error();

        }
    	 
    	return redirect('/ingresos');
    }

    public function eliminar($id){
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
