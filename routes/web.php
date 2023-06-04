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
Route::get('/administrador/home',"App\Http\Controllers\homeController@create");
Route::get('/inicio/loginUser',"App\Http\Controllers\loginController@createLoginUser");
Route::get('/inicio/loginGuardia',"App\Http\Controllers\loginController@createLoginGuardia");
Route::get('/inicio/loginAdmin',"App\Http\Controllers\loginController@createLoginAdmin");

Route::get('/administrador/clientes',"App\Http\Controllers\clientesController@createLista");
Route::get('/administrador/agregarCliente',"App\Http\Controllers\clientesController@createAgregar");
Route::get('/administrador/editarCliente/{id}',"App\Http\Controllers\clientesController@createEditar");
Route::get('/administrador/borrarCliente/{id}',"App\Http\Controllers\clientesController@createborrar");

Route::get('/administrador/vehiculosCliente/{id}/','App\Http\Controllers\vehiculoController@createListaCliente');
Route::get('/administrador/agregarVehiculoCliente/{id}/','App\Http\Controllers\vehiculoController@createAgregarCliente');
Route::get('/administrador/vehiculos','App\Http\Controllers\vehiculoController@createLista');
Route::get('/administrador/agregarVehiculo','App\Http\Controllers\vehiculoController@createAgregar');
Route::get('/administrador/borrarVehiculo/{id}','App\Http\Controllers\vehiculoController@createborrar');

Route::get('/administrador/mapeoParqueo',"App\Http\Controllers\parqueoController@createLista");
Route::get('/administrador/createAgregarIngreso',"App\Http\Controllers\parqueoController@createAgregarIngreso");

Route::get('/administrador/reserva/calendario/{id}','App\Http\Controllers\eventoController@createCalendar');

Route::get('/administrador/reservaSitio/{id}/','App\Http\Controllers\reservaController@createListaSitio');
Route::get('/administrador/reservasCliente/{id}/','App\Http\Controllers\reservaController@createListaCliente');
//vistaControl
Route::get('/show/{id}','App\Http\Controllers\eventoController@show');
//b
Route::post('/inicioSesion',"App\Http\Controllers\loginController@inicioSesion");
Route::post('/storeClienteVehiculo',"App\Http\Controllers\loginController@storeClienteVehiculo");

Route::post('/store',"App\Http\Controllers\clientesController@store");
Route::put('/update/{id}',"App\Http\Controllers\clientesController@update");
Route::delete('/deletec/{id}',"App\Http\Controllers\clientesController@delete");

Route::post('/storeVehiculo','App\Http\Controllers\vehiculoController@store');
Route::delete('/delete/{id}','App\Http\Controllers\vehiculoController@delete');

Route::post('/aumentarSitio','App\Http\Controllers\parqueoController@aumentarSitio');
Route::post('/quitarSitio','App\Http\Controllers\parqueoController@quitarSitio');
Route::post('/storeIngreso','App\Http\Controllers\parqueoController@storeIngreso');
Route::post('/storeSalida','App\Http\Controllers\parqueoController@storeSalida');

Route::post('/storeReservaDiaria','App\Http\Controllers\reservaController@storeDiario');
Route::post('/storeSemana','App\Http\Controllers\reservaController@storeSemana');
Route::post('/storeMesLV','App\Http\Controllers\reservaController@storeMesLV');
Route::post('/storeMesS','App\Http\Controllers\reservaController@storeMesS');
//Route::get('/storeEvento','App\Http\Controllers\eventoController@store');

//backend

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

Route::get('/reserva',"App\Http\Controllers\ocupaController@obtenerreserva"); //para tener todos los registros y mostrarlos
Route::post('/reservacreado',"App\Http\Controllers\ocupaController@store"); //crear un registro
Route::get('/reserva/{id}','App\Http\Controllers\ocupaController@show'); //para mostrarlos los registros
Route::put('/reserva/{id}','App\Http\Controllers\ocupaController@update'); //actualizar un registro
Route::delete('/reserva/{id}','App\Http\Controllers\ocupaController@destroy'); //borrar un registro


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

Route::get('/sitio_emergencia',"App\Http\Controllers\sitio_emergenciaController@obtenerparqueo"); //para tener todos los registros y mostrarlos
Route::post('/sitio_emergenciacreado',"App\Http\Controllers\sitio_emergenciaController@store"); //crear un registro
Route::get('/sitio_emergencia/{id}','App\Http\Controllers\sitio_emergenciaController@show'); //para mostrarlos los registros
Route::put('/sitio_emergencia/{id}','App\Http\Controllers\sitio_emergenciaController@update'); //actualizar un registro
Route::delete('/sitio_emergencia/{id}','App\Http\Controllers\sitio_emergenciaController@destroy'); //borrar un registro

Route::get('/contrato',"App\Http\Controllers\contratoController@obtenerparqueo"); //para tener todos los registros y mostrarlos
Route::post('/contratocreado',"App\Http\Controllers\contratoController@store"); //crear un registro
Route::get('/contrato/{id}','App\Http\Controllers\contratoController@show'); //para mostrarlos los registros
Route::put('/contrato/{id}','App\Http\Controllers\contratoController@update'); //actualizar un registro
Route::delete('/contrato/{id}','App\Http\Controllers\contratoController@destroy'); //borrar un registro

Route::get('/ingreso_no_logueados',"App\Http\Controllers\ingreso_no_logueadosController@obtenerparqueo"); //para tener todos los registros y mostrarlos
Route::post('/ingreso_no_logueadoscreado',"App\Http\Controllers\ingreso_no_logueadosController@store"); //crear un registro
Route::get('/ingreso_no_logueados/{id}','App\Http\Controllers\ingreso_no_logueadosController@show'); //para mostrarlos los registros
Route::put('/ingreso_no_logueados/{id}','App\Http\Controllers\ingreso_no_logueadosController@update'); //actualizar un registro
Route::delete('/ingreso_no_logueados/{id}','App\Http\Controllers\ingreso_no_logueadosController@destroy'); //borrar un registro