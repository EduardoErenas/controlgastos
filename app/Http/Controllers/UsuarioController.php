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

class UsuarioController extends Controller{

    public function editarContraseña(Request $datos,$idusuario){
             $user= User::Find($idusuario);
             $user->password=bcrypt($datos->input('password'));
            
             $user->save(); 

             flash('!Se guardaron exitosamente los datos del Ingreso ')->success();
             return redirect('configuraciones');
        
    }

   
}
