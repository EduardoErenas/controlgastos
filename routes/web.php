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
	Route::get('/editarIngreso/{id}','ingresoController@editar');
	Route::post('/actualizarIngreso/{id}','ingresoController@actualizar');
	Route::get('/eliminarIngreso/{id}','ingresoController@eliminar');

	//GASTOS
	Route::get('/gastos', 'GastoController@registrar');
	Route::post('/guardarGasto','GastoController@guardar');
	Route::get('/editarGasto/{id}', 'GastoController@editar');
	Route::post('/actualizarGasto/{ga_id}', 'GastoController@actualizar');
	Route::get('/eliminarGasto/{id}', 'GastoController@eliminar');

	//PAGOS
	Route::get('/pagos', 'PagoController@mostrar');
	Route::get('/pagar/{id}/{monto}', 'PagoController@pagar');

	//REPORTES
	Route::get('/reportes', 'reportesController@mostrar');

	//CATALOGOS
	Route::get('/catalogos', 'CatalogosController@registrar');
	Route::post('/guardarCatIngreso','CatalogosController@guardarCatIngreso');
	Route::post('/guardarCatGasto','CatalogosController@guardarCatGasto');
	Route::get('/editarCatIngreso/{id}','CatalogosController@editarCatIngreso');
	Route::get('/editarCatGasto/{id}','CatalogosController@editarCatGasto');
	Route::post('/actualizarCatIngreso/{id}','CatalogosController@actualizarCatIngreso');
	Route::post('/actualizarCatGasto/{id}','CatalogosController@actualizarCatGasto');
	Route::get('/eliminarCatIngreso/{id}','CatalogosController@eliminarCatIngreso');
	Route::get('/eliminarCatGasto/{id}','CatalogosController@eliminarCatGasto');

	//CONFIGURACIONES
	Route::get('/configuraciones', function () {
	    return view('configuraciones');
	});
	Route::post('/editarContraseña/{id}', 'UsuarioController@editarContraseña');
	Route::post('/editarAlgoritmo/{id}', 'UsuarioController@editarAlgoritmo');
});


//routes administrador
Route::group(['middleware' => ['admin']], function () {
Route::get('/administrador', 'administradorController@home');
Route::get('/perfiladministrador', 'administradorController@perfil');
Route::post('/editarperfiladmin/{id}', 'administradorController@editarperfil');
Route::get('/listaUsuarios', 'administradorController@listaUsuarios');
Route::get('/eliminarusuario/{id}', 'administradorController@eliminarusuario');
Route::get('/editarusuario/{id}', 'administradorController@editarusuario');
Route::post('/Actualizar/{id}', 'administradorController@Actualizar');
Route::get('/registrarua', 'administradorController@registrarUA');
Route::post('/registrarUA','administradorController@guardarUA');
});
Auth::routes();