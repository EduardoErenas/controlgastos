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
        //$meses = DB::table('mes')->select('mes_name')->get();
        $id = Auth::id();

        $meses = DB::select( DB::raw("select mes_id,mes_name,sum(if(month(created_at)=mes_id,in_amount,0)) as total from ingreso ing right join mes on mes.mes_id = month(created_at) and year(created_at)=year(now()) and ing.usu_id = '$id' and ing.in_status in (1,2) group by 1,2") );
        $categoriasIngresos = DB::select( DB::raw("select ct.cat_id,ct.cat_description,sum(if(ct.cat_id = ing.cat_id,in_amount,0)) as total from ingreso ing right join category_ingreso ct on ct.cat_id = ing.cat_id and year(ing.created_at)=year(now()) and ing.usu_id = '$id' and ing.in_status in (1,2) group by 1,2;") );

        $gastos = DB::select( DB::raw("select mes_id,mes_name,sum(if(month(created_at)=mes_id,ga_amount,0)) as total from gasto right  join mes on mes.mes_id = month(created_at) and year(created_at)=year(now()) and gasto.usu_id = '$id' and gasto.ga_status in (1,2) group by 1,2;") );

        


        
        dd($gastos);
        
        //$ingresos = Ingresos_cliente::where('usu_id',Auth::id())->get(); 
        
        return view('reportes',compact('meses', 'categoriasIngresos'));
    }

}
