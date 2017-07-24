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



/*
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
*/

//***************** GRUPO DE MIDDLEWARE ******************
 
Route::group(['middleware' => ['auth']], function () {
    //INICIO
	Route::get('/', 'HomeController@index');
	Route::get('/home', 'HomeController@index')->name('home');

	// PERFIL 
	Route::get('/perfil', 'perfilController@inicio');
	Route::post('/editarperfil/{id}', 'perfilController@editarperfil');
	//INGRESOS
	Route::get('/ingresos', 'ingresoController@registrar');
	Route::post('/guardarIngreso','ingresoController@guardar'); 
	Route::get('/eliminarIngreso/{id}','ingresoController@eliminar');

	//GASTOS
	Route::get('/gastos', 'GastoController@registrar');
	Route::post('/guardarGasto','GastoController@guardar');

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
});

Auth::routes();