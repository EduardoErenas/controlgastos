<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Rutas de la API

Route::get('/getAlumnos', 'ejemploController@getAlumnos');


//Rutas de la Web




Route::get('/blank', function () {
    return view('blank');
});

Route::get('/blankPrimary', function () {
    return view('blankPrimary');
});

Route::get('/vistaAngular', function () {
    return view('vistaAngular');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/formularioGeneral', 'ejemploController@index');

Route::get('/tablaDatos', function () {
    return view('tablaDatos');
});

//INICIO
Route::get('/', function () {
    return view('home');
});

// PERFIL 
Route::get('/perfil', function () {
    return view('perfil');
});

//INGRESOS 
Route::get('/ingresos', 'ingresoController@registrar');
Route::post('/guardarIngreso','ingresoController@guardar'); 

//GASTOS
Route::get('/gastos', function () {
    return view('gastos');
});

//PAGOS
Route::get('/pagos', function () {
    return view('pagos');
});

//REPORTES
Route::get('/reportes', function () {
    return view('reportes');
});

//CONFIGURACIONES
Route::get('/configuraciones', function () {
    return view('configuraciones');
});