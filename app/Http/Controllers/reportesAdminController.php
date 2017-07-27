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

class reportesAdminController extends Controller{
    
    public function mostrar(){
        $id = Auth::id();

        $activos = DB::select( DB::raw("select mes_id,mes_name,count(id) as total from mes 
        left join users on mes.mes_id = month(users.created_at) and year(users.created_at)=year(now()) and users.usu_type=0 and users.usu_status=1
        group by 1,2 order by 1;") );
        
        $eliminados = DB::select( DB::raw("select mes_id,mes_name,count(id) as total from mes 
        left join users on mes.mes_id = month(users.created_at) and year(users.created_at)=year(now()) and users.usu_type=0 and users.usu_status=0
        group by 1,2 order by 1;") );
    
        return view('reportesAdmin',compact('activos','eliminados'));
    }

}
