<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Pagos;
use App\Pagos_cliente;
use DB; 


class PagoController extends Controller{

    public function mostrar(){ 
        /*$pagos = Pagos_cliente::where('usu_id', '=', Auth::id())
            ->where('pa_estatus', '=',1)
            ->get();*/
        $algoritmo = Auth::user()->usu_algoritmo;
        $id = Auth::id();
        $rango = Auth::user()->usu_rango;

        if( $algoritmo ==1 ){
            $pagos = DB::select( DB::raw("select * from vw_pagos_cliente_completa
            where DATEDIFF(pa_fecha_pagar, CURDATE())<".$rango." and pa_estatus=1 and usu_id = ".$id."
            order by pa_fecha_pagar asc,ga_prioridad asc,created_at asc") );
        }elseif( $algoritmo ==2 ){
            $pagos = DB::select( DB::raw("select * from vw_pagos_cliente_completa
            where DATEDIFF(pa_fecha_pagar, CURDATE())<".$rango." and pa_estatus=1 and usu_id = ".$id."
            order by pa_monto asc,pa_fecha_pagar asc,created_at asc") );
        }elseif( $algoritmo ==3 ){
            $pagos = DB::select( DB::raw("select * from vw_pagos_cliente_completa
            where DATEDIFF(pa_fecha_pagar, CURDATE())<".$rango." and pa_estatus=1 and usu_id = ".$id."
            order by pa_monto desc,pa_fecha_pagar asc,created_at asc") );
        }

        $liquidados = Pagos_cliente::where('usu_id', '=', Auth::id())
            ->where('pa_estatus', '=',2)
            ->get();
        $hoy = getDate();

        return view('pagos', compact('pagos','liquidados','hoy'));
    }

    public function pagar($id,$monto){
        try{
            $ingreso = DB::table('ingreso')
            ->where('usu_id','=',Auth::id())
            ->where('in_status','=',1)
            ->sum('in_restante');
            
            if($ingreso<=0){
                flash('¡Error al Realizar Pago, no tienes ingresos disponibles¡')->error();
            }elseif($ingreso>0 and $ingreso<$monto){
                flash('¡Error al Realizar Pago, no tienes ingresos suficientes¡')->error();
            }
            else{
                DB::table('pago')
                ->where('pa_id', $id)
                ->update(['pa_estatus' => 2],['pa_fecha_pago' => 'now()']);

                flash('!Se Realizó Pago Exitosamente¡')->success();
            }
        }catch(\Illuminate\Database\QueryException $e){
            flash('Error al Hacer Pago, intenta de nuevo¡')->error();
        }

        return redirect ('/pagos');
    }

    public function updateRango(Request $datos,$idusuario){
        $user= User::Find($idusuario);

        try{
            $user->usu_rango = $datos->input('rango');
            $user->save();

            flash('!Se Actualizó el rango correctamente ')->success();
        }catch(\Illuminate\Database\QueryException $e){
            flash('!Ocurrió un error al cambiar contraseña. Intente de nuevo ')->error();
        }
        return redirect('configuraciones');
    }

    public function updateAlgoritmo(Request $datos,$idusuario){
        $user= User::Find($idusuario);

        try{
            $user->usu_algoritmo = $datos->input('algoritmo');
            $user->save();

            flash('!Se Actualizó el algoritmo de pago correctamente ')->success();
        }catch(\Illuminate\Database\QueryException $e){
            flash('!Ocurrió un error al cambiar el algoritmo¡. Intente de nuevo ')->error();
        }
        return redirect('configuraciones');   

    }
}
