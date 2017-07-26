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
        $ingresos = Ingresos_cliente::where('usu_id',Auth::id())->where('in_status',1)->get();
        $agotados = Ingresos_cliente::where('usu_id',Auth::id())->where('in_status',2)->get();
        
        return view('ingresos',compact('ingresos','categorias','agotados'));
    }

    public function editar($id){
        try{
            $ingreso=DB::table('ingreso')
                ->where('in_id', '=', $id)
                ->first();

            $categorias =Categoria_Ingreso::all();

            return view('/editarIngreso', compact('ingreso','categorias'));

        }catch(\Illuminate\Database\QueryException $e){
            flash('Error nose puede Editar ingreso, intenta de nuevo ')->error();

            return redirect ('/ingresos');
        }
    }
    
    public function actualizar($in_id,Request $datos){
       // try{
            $ingreso = Ingresos::find($in_id);
            $ingreso ->in_description = $datos->input('descripcion');
            $ingreso ->in_amount = $datos->input('monto');
            $ingreso ->cat_id = $datos->input('categoria');
            $ingreso->save();

         //   flash('!Se actualizo Ingreso exitosamente¡')->success();

        //}catch(\Illuminate\Database\QueryException $e){
          //  flash('Error al actualizar Ingreso, intenta de nuevo¡')->error();
       // }

        return redirect ('/ingresos');
    }

    public function guardar(Request $datos){
    	try{
            $ingreso = new Ingresos();
            $ingreso->usu_id=Auth::id();
            $ingreso->in_description=$datos->input('descripcion');
            $ingreso->in_amount=$datos->input('monto');
            $ingreso->in_restante=$datos->input('monto');
            $ingreso->cat_id=$datos->input('categoria');
            $ingreso->save();

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
