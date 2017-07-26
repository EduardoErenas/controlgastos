<?php  
 
namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use App\Ingresos;
use App\Usuario_ingreso;
use App\Ingresos_cliente;
use App\Categoria_Ingreso;
use App\Categoria_Gasto;
use DB;
use App\ejemplo;

class CatalogosController extends Controller{
    
    public function registrar(){
        $catIngreso = Categoria_Ingreso::where('cat_status','<>',0)->get();
        $catGasto = Categoria_Gasto::where('cat_status', '<>', 0)->get();
        
        return view('catalogos',compact('catIngreso', 'catGasto'));
    }

    public function editarCatIngreso($id){
        try{
            $catIngreso=DB::table('category_ingreso')
                ->where('cat_id', '=', $id)
                ->first();

            return view('/editarCatIngreso', compact('catIngreso'));

        }catch(\Illuminate\Database\QueryException $e){
            flash('Error nose puede Editar la Categoría, intenta de nuevo ')->error();

            return redirect ('/catalogos');
        }
    }
    
    public function editarCatGasto($id){
        try{
            $catGasto=DB::table('category_gasto')
                ->where('cat_id', '=', $id)
                ->first();

            return view('/editarCatGasto', compact('catGasto'));

        }catch(\Illuminate\Database\QueryException $e){
            flash('Error nose puede Editar la Categoría, intenta de nuevo ')->error();

            return redirect ('/catalogos');
        }
    }

    public function actualizarCatIngreso($cat_id,Request $datos){
       // try{
            $catIngreso = Categoria_Ingreso::find($cat_id);
            $catIngreso ->cat_description = $datos->input('description');
            $catIngreso->save();

         //   flash('!Se actualizo Ingreso exitosamente¡')->success();

        //}catch(\Illuminate\Database\QueryException $e){
          //  flash('Error al actualizar Ingreso, intenta de nuevo¡')->error();
       // }

        return redirect ('/catalogos');
    }
    public function actualizarCatGasto($cat_id,Request $datos){
       // try{
            $catGasto = Categoria_Gasto::find($cat_id);
            $catGasto ->cat_description = $datos->input('description');
            $catGasto->save();

         //   flash('!Se actualizo Ingreso exitosamente¡')->success();

        //}catch(\Illuminate\Database\QueryException $e){
          //  flash('Error al actualizar Ingreso, intenta de nuevo¡')->error();
       // }

        return redirect ('/catalogos');
    }

    public function guardarCatIngreso(Request $datos){
    	try{
            $catIngreso = new Categoria_ingreso();
            $catIngreso->cat_description=$datos->input('descripcion');
            $catIngreso->save();

            flash('!Se guardaron exitosamente los datos de categoría ')->success();

        }catch(\Illuminate\Database\QueryException $e){
            flash('Error al Registrar Categoria, intenta de nuevo ')->error();

        }
    	 
    	return redirect('/catalogos');
    } 

    public function guardarCatGasto(Request $datos){
        try{
            $catGasto = new Categoria_Gasto();
            $catGasto->cat_description=$datos->input('descripcion');
            $catGasto->save();

            flash('!Se guardaron exitosamente los datos de Categoría ')->success();

        }catch(\Illuminate\Database\QueryException $e){
            flash('Error al Registrar Categoría, intenta de nuevo ')->error();

        }
         
        return redirect('/catalogos');
    }

    public function eliminarCatIngreso($id){
        try{
            DB::table('category_ingreso')
            ->where('cat_id', $id)
            ->update(['cat_status' => 0]);

            flash('!Se Elimino la Categoría exitosamente¡')->success();

        }catch(\Illuminate\Database\QueryException $e){
            flash('Error al Eliminar la Categoría, intenta de nuevo¡')->error();
        }

        return redirect ('/catalogos');
    }
    public function eliminarCatGasto($id){
        try{
            DB::table('category_gasto')
            ->where('cat_id', $id)
            ->update(['cat_status' => 0]);

            flash('!Se Elimino la Categoría exitosamente¡')->success();

        }catch(\Illuminate\Database\QueryException $e){
            flash('Error al Eliminar la Categoría, intenta de nuevo¡')->error();
        }

        return redirect ('/catalogos');
    }

}
