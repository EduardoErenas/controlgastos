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

    public function guardarUA(Request $datos){
        try{
            $hoy = getdate();
            $fecha = $hoy['month'].' '.$hoy['year'];
            $password = str_random(6);   
            $user= User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($password),

                'usu_sex' => $data['usu_sex'],
                'usu_age' => $data['usu_age'],
                'usu_occupation' => $data['usu_occupation'],
                'usu_address' => $data['usu_address'],
                'usu_city' => $data['usu_city'],
                'usu_state' => $data['usu_state'],
                'usu_type' => 0,

            ]);
             
            Mail::to($data['email'],$data['name'])
            ->send(new bienvenidaEmail($data['name'],$password,$data['email'],$fecha));

            flash('!Registro Correcto¡')->success();
        }catch(\Illuminate\Database\QueryException $e){
            flash('Error al registrar, intenta de nuevo')->success();
        }

        return redirect('listaUsuarios');
    }
    
}
