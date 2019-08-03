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

Route::get('/', function () {
    return view('auth.login');
});
// Lo que se hace aqui es decir vea vaya al controlador con @ el metodo que quiero que muestre
/*Esta ruta inmediatamente toma el metodo controlador
Route::get('/empleados','EmpleadosController@index');
Route::get('/empleados/create', 'EmpleadosController@create');
*/

//para trabajar no de una en una 
//creamos todas las rutas necesarias para acceder al controlador
Route::resource('empleados', 'EmpleadosController')->middleware('auth');
//todas las direcciones correspondientes a la autentificacion
Auth::routes(['register'=>false,'reset'=>false]);

Route::get('/home', 'HomeController@index')->name('home');
