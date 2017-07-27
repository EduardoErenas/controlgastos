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

class perfilAdminController extends Controller{
     
    public function perfil(){
      
      //dd($historialingresos);
        return view('perfiladmin');
    } 

    public function editarperfil(Request $datos,$idusuario){
        try{
             $user= User::Find($idusuario);
             $user->name=$datos->input('nombre');
             $user->email=$datos->input('email');
             $user->password=Auth::user()->password;
             $user->usu_age=$datos->input('edad');
             $user->usu_occupation=$datos->input('ocupacion');
             $user->usu_address=$datos->input('Direccion');
             $user->usu_city=$datos->input('Ciudad');
             $user->usu_state=$datos->input('Estado');
             $user->usu_sex=$datos->input('sexo');
             $user->usu_type=Auth::user()->usu_type;
             $user->usu_status=Auth::user()->usu_status;
             
             $user->save(); 

            flash('!Se guardaron exitosamente los datos del Perfil ')->success();
         }catch(\Illuminate\Database\QueryException $e){
            flash('Error al actualizar Perfil, intenta de nuevo¡')->error();
        }
        return redirect('perfiladministrador');
        
    }
}
