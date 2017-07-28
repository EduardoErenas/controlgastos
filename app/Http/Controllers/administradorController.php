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
    
    public function home()
    {
         $id = Auth::id();
        
        $users = DB::select( DB::raw("select COUNT(*) as total FROM users WHERE usu_status=1 and id <> '$id'") );
        //dd($ingreso);

        $usersA = DB::select( DB::raw("select COUNT(*) as total FROM users WHERE usu_type=0 and usu_status=1 and id <> '$id' ") );

        $usersS = DB::select( DB::raw("select COUNT(*) as total FROM users WHERE usu_type=1 and usu_status=1 and id <> '$id'") );
 
        $usuarioA = DB::select( DB::raw("select name from users where usu_status =1 and usu_type=0 and id <> '$id' order by created_at desc limit 4") );

        $usuarioS = DB::select( DB::raw("select name from users WHERE usu_status =1 and usu_type=1 and id <> '$id' order by created_at desc limit 4 ") );

        
        return view('inicioAdmin', compact('users','usersA','usersS','usuarioA', 'usuarioS'));  
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
