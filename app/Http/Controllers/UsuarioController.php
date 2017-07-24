<?php  
 
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
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
         
        if (Hash::check($datos->input('contra'), Auth::user()->password)) 
        {
            if ($datos->input('newpas') == $datos->input('password')) {
                $user->password=bcrypt($datos->input('password'));
                $user->save(); 
                flash('!Se Actualizó la contraseña correctamente ')->success();
            }
            else{
                flash('!Los campos no coinciden. Favor de escribir correctamente la contraseña nueva ')->error();
            }    
        }    
        else
        {
             flash('!Esto está mal '.Auth::user()->password)->error();
        }
        return redirect('configuraciones');   
    }
}
