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

class perfilController extends Controller{
    
    public function inicio(){
        $gastos = DB::table('gasto')
        ->where('gasto.usu_id','=',Auth::id())
        ->count();
        $ingresos = DB::table('gasto')
        ->where('gasto.usu_id','=',Auth::id())
        ->count();
        $historialingresos=db::table('Ingreso')
        ->where('usu_id','=',Auth::id())
        ->get();
        $historialgastos=Gastos::All();
      //dd($historialingresos);
        return view('perfil',compact('ingresos','gastos','historialgastos','historialingresos'));
    } 

    public function editarperfil(Request $datos,$idusuario){
    	     $sex=0;
             $user= User::Find($idusuario);
             if($datos->input('sexo')=='Masculino'){
                $sex=1;
             }
            
             
             
             $user->name=$datos->input('nombre');
             $user->email=$datos->input('email');
             $user->password=Auth::user()->password;
             if($datos->input('sexo')=='Masculino') 
             
             $user->usu_age=$datos->input('edad');
             $user->usu_occupation=$datos->input('ocupacion');
             $user->usu_address=Auth::user()->usu_address;
             $user->usu_city=Auth::user()->usu_city;
             $user->usu_state=Auth::user()->usu_state;
             $user->usu_sex=$sex;
             $user->usu_type=Auth::user()->usu_type;
             $user->usu_status=Auth::user()->usu_status;
             
             $user->save(); 

             flash('!Se guardaron exitosamente los datos del Ingreso ')->success();
             return redirect('perfil');
        
    }

    public function eliminar($id){
        try{
            DB::table('ingreso')
            ->where('in_id', $id)
            ->update(['in_status' => 0]);

            flash('!Se Elimino Ingreso exitosamente¡')->success();

        }catch(\Illuminate\Database\QueryException $e){
            flash('Error al Eliminar Ingreso, intenta de nuevo¡')->error();
        }

        return redirect ('/ingresos');
    }

}
