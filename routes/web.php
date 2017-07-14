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


Route::get('/', function () {
    return view('home');
});

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