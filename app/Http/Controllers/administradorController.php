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
        /*
        $ingreso = DB::select( DB::raw("select COUNT(*) as total FROM ingreso WHERE usu_id = '$id' and ingreso.in_status=1 ") );
        //dd($ingreso);

        $gasto = DB::select( DB::raw("select COUNT(*) as total FROM gasto WHERE usu_id = '$id' and gasto.ga_status=1 ") );

        $pago = DB::select( DB::raw("select COUNT(*) as total FROM pago WHERE usu_id = '$id' and pago.pa_estatus=1 and DATEDIFF(pa_fecha_pagar, CURDATE())<5 ") );

        */

        $usuarioA = DB::select( DB::raw(" SELECT users.name from users WHERE users.id = '$id' and users.usu_status =1 and users.usu_type=0") );

        $usuarioS = DB::select( DB::raw(" SELECT users.name from users WHERE users.id = '$id' and users.usu_status =1 and users.usu_type=1 ") );

        
        return view('inicioAdmin', compact('usuarioA', 'usuarioS'));  
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
