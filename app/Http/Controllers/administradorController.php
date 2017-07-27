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
        return view('masterAdmin');
    } 
    public function perfil(){
      
      //dd($historialingresos);
        return view('perfiladmin');
    } 

    public function configuraciones(){
        return view('configuracionesAdmin');
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
    public function listaUsuarios(){
        $users=DB::table('users')->where('usu_status', '=', '1')->get();
        return view('listaUsuarios',compact('users'));
    }
    public function eliminarusuario($idusuario){
        try{
            DB::table('users')
            ->where('id', $idusuario)
            ->update(['usu_status' => 0]);
        
            flash('!Se elimino exitosamente el usuario ')->success();
        }catch(\Illuminate\Database\QueryException $e){
            flash('Error al eliminar usuario, intenta de nuevo¡')->error();
        }
        return redirect('listaUsuarios');
    }
     public function editarusuario($idusuario){
        $user =DB::table('users')
        ->where ('users.id','=',$idusuario)
        ->first();
        //dd($user);
        return view('Actualizarusuario',compact('user'));
    }
     public function Actualizar(Request $datos,$idusuario){
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
             $user->usu_type=$datos->input('tipo');
             $user->usu_status=Auth::user()->usu_status;
             $user->save(); 

            flash('!Se Actualizaron exitosamente los datos del Usuario ')->success();
         }catch(\Illuminate\Database\QueryException $e){
            flash('Error al actualizar Usuario, intenta de nuevo¡')->error();
        }
        return redirect('listaUsuarios');
    }

    // nuevo ingreso

    public function registrarUA(){
         return view('registroUA');
    }

    public function guardarUA(Request $data){
        //try{
            $hoy = getdate();
            $fecha = $hoy['month'].' '.$hoy['year'];
            $password = str_random(6);   
            $user= User::create([
                'name' => $data['nombre'],
                'email' => $data['email'],
                'password' => bcrypt($password),

                'usu_sex' => $data['sexo'],
                'usu_age' => $data['edad'],
                'usu_occupation' => $data['ocupacion'],
                'usu_address' => $data['Direccion'],
                'usu_city' => $data['Ciudad'],
                'usu_state' => $data['Estado'],
                'usu_type' => $data['tipo'],

            ]);
             
            Mail::to($data['email'],$data['nombre'])
            ->send(new bienvenidaEmail($data['nombre'],$password,$data['email'],$fecha));

            flash('!Registro Correcto¡')->success();
        //}catch(\Illuminate\Database\QueryException $e){
          //  flash('Error al registrar, intenta de nuevo')->error();
        //}

        return redirect('listaUsuarios');
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
