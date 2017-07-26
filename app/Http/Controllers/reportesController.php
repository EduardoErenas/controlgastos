<?php  
 
namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use App\Meses;
use App\Ingresos;
use App\Usuario_ingreso;
use App\Ingresos_cliente;
use App\Categoria_Ingreso;
use DB;

class reportesController extends Controller{
    
    public function mostrar(){
        $meses = DB::table('mes')->select('mes_name')->get();
        
        //$ingresos = Ingresos_cliente::where('usu_id',Auth::id())->get(); 
        
        return view('reportes',compact('meses'));
    }

}
