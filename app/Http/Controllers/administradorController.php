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
use Illuminate\Support\Facades\Mail;
use App\Mail\bienvenidaEmail;
use App\ejemplo;

class administradorController extends Controller{
    
    public function home(){
      
      //dd($historialingresos);
        return view('inicioAdmin');
    } 
    

    public function configuraciones(){
        return view('configuracionesAdmin');
    }
   
    public function editarContraseña(Request $datos,$idAdmin)
    {
        $user= User::Find($idAdmin);
         
        if (Hash::check($datos->input('contra'), Auth::user()->password)) 
        {
            if ($datos->input('newpass') == $datos->input('password')) {
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
             flash('!Ocurrió un error al cambiar contraseña. Intente de nuevo')->error();
        }
        return redirect('configuracionesAdmin');   
    }
}
