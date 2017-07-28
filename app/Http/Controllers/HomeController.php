<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $id = Auth::id();

        $ingreso = DB::select( DB::raw("select COUNT(*) as total FROM ingreso WHERE usu_id = '$id' and ingreso.in_status=1 ") );
        //dd($ingreso);

        $gasto = DB::select( DB::raw("select COUNT(*) as total FROM gasto WHERE usu_id = '$id' and gasto.ga_status=1 ") );

        $pago = DB::select( DB::raw("select COUNT(*) as total FROM pago WHERE usu_id = '$id' and pago.pa_estatus=1 and DATEDIFF(pa_fecha_pagar, CURDATE())<5 ") );

        $ingresos = DB::select( DB::raw(" select ingreso.in_description, ingreso.in_id  from ingreso WHERE usu_id = '$id' and ingreso.in_status =1 limit 4") );

        $gastos = DB::select( DB::raw(" select gasto.ga_description, gasto.ga_id  from gasto WHERE usu_id = '$id' and gasto.ga_status =1 limit 4") );

        
        
       
        return view('inicio', compact('ingreso','gasto', 'pago', 'ingresos', 'gastos'));
    }
}
