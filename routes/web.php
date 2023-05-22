<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

//FE
Route::get('/inicio/login',"App\Http\Controllers\loginController@create");
Route::get('/administrador/home',"App\Http\Controllers\homeController@create");

Route::get('/administrador/clientes',"App\Http\Controllers\clientesController@createLista");
Route::get('/administrador/agregarCliente',"App\Http\Controllers\clientesController@createAgregar");
Route::get('/administrador/editarCliente/{id}',"App\Http\Controllers\clientesController@createEditar");
Route::get('/administrador/borrarCliente/{id}',"App\Http\Controllers\clientesController@createborrar");

Route::get('/administrador/vehiculos','App\Http\Controllers\vehiculoController@createLista');
Route::get('/administrador/agregarVehiculo','App\Http\Controllers\vehiculoController@createAgregar');
Route::get('/administrador/borrarVehiculo/{id}','App\Http\Controllers\vehiculoController@createborrar');

Route::get('/administrador/mapeoParqueo',"App\Http\Controllers\parqueoController@createLista");

//backend
Route::get('/cliente',"App\Http\Controllers\clienteController@obtenercliente"); //para tener todos los registros y mostrarlos
Route::post('/clientecreado',"App\Http\Controllers\clienteController@store"); //crear un registro
Route::get('/cliente/{id}','App\Http\Controllers\clienteController@show'); //para mostrarlos los registros
Route::put('/cliente/{id}','App\Http\Controllers\clienteController@update'); //actualizar un registro
Route::delete('/cliente/{id}','App\Http\Controllers\clienteController@destroy'); //borrar un registro

Route::get('/reserva',"App\Http\Controllers\ocupaController@obtenerreserva"); //para tener todos los registros y mostrarlos
Route::post('/reservacreado',"App\Http\Controllers\ocupaController@store"); //crear un registro
Route::get('/reserva/{id}','App\Http\Controllers\ocupaController@show'); //para mostrarlos los registros
Route::put('/reserva/{id}','App\Http\Controllers\ocupaController@update'); //actualizar un registro
Route::delete('/reserva/{id}','App\Http\Controllers\ocupaController@destroy'); //borrar un registro


Route::get('/parqueo',"App\Http\Controllers\parqueoController@obtenerparqueo"); //para tener todos los registros y mostrarlos
Route::post('/parqueocreado',"App\Http\Controllers\parqueoController@store"); //crear un registro
Route::get('/parqueo/{id}','App\Http\Controllers\parqueoController@show'); //para mostrarlos los registros
Route::put('/parqueo/{id}','App\Http\Controllers\parqueoController@update'); //actualizar un registro
Route::delete('/parqueo/{id}','App\Http\Controllers\parqueoController@destroy'); //borrar un registro

Route::get('/horario',"App\Http\Controllers\horarioController@obtenerhorario"); //para tener todos los registros y mostrarlos
Route::post('/horariocreado',"App\Http\Controllers\horarioController@store"); //crear un registro
Route::get('/horario/{id}','App\Http\Controllers\horarioController@show'); //para mostrarlos los registros
Route::put('/horario/{id}','App\Http\Controllers\horarioController@update'); //actualizar un registro
Route::delete('/horario/{id}','App\Http\Controllers\horarioController@destroy'); //borrar un registro

Route::get('/guardia',"App\Http\Controllers\guardiaController@obtenerhorario"); //para tener todos los registros y mostrarlos
Route::post('/guardiacreado',"App\Http\Controllers\guardiaController@store"); //crear un registro
Route::get('/guardia/{id}','App\Http\Controllers\guardiaController@show'); //para mostrarlos los registros
Route::put('/guardia/{id}','App\Http\Controllers\guardiaController@update'); //actualizar un registro
Route::delete('/guardia/{id}','App\Http\Controllers\guardiaController@destroy'); //borrar un registro

Route::get('/horario_emergencia',"App\Http\Controllers\horario_emergenciaController@obtenerhorario"); //para tener todos los registros y mostrarlos
Route::post('/horario_emergenciacreado',"App\Http\Controllers\horario_emergenciaController@store"); //crear un registro
Route::get('/horario_emergencia/{id}','App\Http\Controllers\horario_emergenciaController@show'); //para mostrarlos los registros
Route::put('/horario_emergencia/{id}','App\Http\Controllers\horario_emergenciaController@update'); //actualizar un registro
Route::delete('/horario_emergencia/{id}','App\Http\Controllers\horario_emergenciaController@destroy'); //borrar un registro