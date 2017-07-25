<?php  
 
namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use App\Ingresos;
use App\Gastos;
use App\User;
use App\Usuario_ingreso;
use App\Ingresos_cliente;
use App\Categoria_Ingreso;
use DB;
use App\ejemplo;

class administradorController extends Controller{
    
    public function home(){
      
      //dd($historialingresos);
        return view('masterAdmin');
    } 

    
}
