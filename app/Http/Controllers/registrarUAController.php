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

class registrarUAController extends Controller{
    
    public function registrarUA(){
         return view('registroUA');
    }

    public function guardarUA(Request $data){
        try{
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
        }catch(\Illuminate\Database\QueryException $e){
            flash('Error al registrar, intenta de nuevo')->error();
        }

        return redirect('listaUsuarios');
    }
}
