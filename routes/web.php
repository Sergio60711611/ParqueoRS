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
Route::get('/guardia/{id}/home',"App\Http\Controllers\homeController@createGuardia");
Route::get('/cliente/{id}/home',"App\Http\Controllers\homeController@createCliente");
Route::get('/cliente/{id}/perfil',"App\Http\Controllers\clientesController@perfil");
Route::get('/cliente/{id}/editarPerfil',"App\Http\Controllers\clientesController@createEditarCli");

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
Route::get('/cliente/{id}/vehiculos/','App\Http\Controllers\vehiculoController@createListaClienteCli');
Route::get('/cliente/{id}/agregarVehiculo/','App\Http\Controllers\vehiculoController@createAgregarClienteCli');
Route::get('/cliente/{idCli}/borrarVehiculo/{id}','App\Http\Controllers\vehiculoController@createborrarCli');

Route::get('/administrador/mapeoParqueo',"App\Http\Controllers\parqueoController@createLista");
Route::get('/administrador/createAgregarIngreso',"App\Http\Controllers\parqueoController@createAgregarIngreso");
//pagoscontrollers
//Route::get('/administrador/pagos2',"App\Http\Controllers\PagosController@PController");
Route::get('/pagos', function () {return view('pagosqr.pagos');})->name('pagosqr.pagos');

Route::get('/pagos', function () {
    $plan = request()->query('plan');
    $espacio = request()->query('espacio');
    $horas = request()->query('horas');
    $reserva = request()->query('reserva');
    $costo= request()->query('costo');
    
    return view('pagosqr.pagos', compact('plan', 'espacio', 'horas', 'reserva','costo'));
})->name('pagosqr.pagos');

Route::get('/administrador/pagoslista',"App\Http\Controllers\PagosController@ListaPagos");

Route::get('/ayudaprecios',"App\Http\Controllers\ayudaController@AController");

Route::get('/cliente/{id}/info',"App\Http\Controllers\InfoClienteController@see");
Route::get('/cliente/{id}/info/consultas',"App\Http\Controllers\InfoClienteController@seeConsultas");
Route::get('/cliente/{id}/info/anuncios',"App\Http\Controllers\InfoClienteController@seeAnuncios");
Route::get('/cliente/{id}/info/preguntas', "App\Http\Controllers\InfoClienteController@seePreguntas");
Route::get('/cliente/{id}/info/horarios', "App\Http\Controllers\InfoClienteController@seeHorarios");
Route::get('/cliente/{id}/info/reservas', "App\Http\Controllers\InfoClienteController@seeReservas");

Route::get('/administrador/anuncios',"App\Http\Controllers\AnuncioController@createLista");
Route::get('/administrador/agregarAnuncio',"App\Http\Controllers\AnuncioController@createAgregar");
Route::get('/administrador/editarAnuncio/{id}',"App\Http\Controllers\AnuncioController@createEditar");
Route::get('/administrador/borrarAnuncio/{id}',"App\Http\Controllers\AnuncioController@createborrar");
Route::get('/guardia/{id}/anuncios',"App\Http\Controllers\AnuncioController@createListaG");
Route::get('/guardia/{id}/agregarAnuncio',"App\Http\Controllers\AnuncioController@createAgregarG");

Route::get('/administrador/preguntas',"App\Http\Controllers\PreguntasFrecuentesController@createLista");
Route::get('/administrador/agregarPreguntas',"App\Http\Controllers\PreguntasFrecuentesController@createAgregar");
Route::get('/administrador/editarPreguntas/{id}',"App\Http\Controllers\PreguntasFrecuentesController@createEditar");
Route::get('/administrador/borrarPreguntas/{id}',"App\Http\Controllers\PreguntasFrecuentesController@createborrar");
Route::get('/guardia/{id}/preguntas',"App\Http\Controllers\PreguntasFrecuentesController@createListaG");
Route::get('/guardia/{id}/agregarPreguntas',"App\Http\Controllers\PreguntasFrecuentesController@createAgregarG");

Route::get('/cliente/{id}/info/reclamos', "App\Http\Controllers\clamosController@create")->name('reclamos.create');
Route::post('/cliente/info/reclamos', "App\Http\Controllers\clamosController@store")->name('reclamos.store');
Route::get('/cliente/{id}/mapeoParqueo',"App\Http\Controllers\parqueoController@createListaCli");

Route::get('/administrador/reserva/calendario/{id}','App\Http\Controllers\eventoController@createCalendar');

Route::get('/administrador/reservaSitio/{id}/','App\Http\Controllers\reservaController@createListaSitio');
Route::get('/administrador/reservasCliente/{id}/','App\Http\Controllers\reservaController@createListaCliente');
Route::get('/administrador/reservas','App\Http\Controllers\reservaController@createLista');
Route::get('/cliente/{id}/reservas/','App\Http\Controllers\reservaController@createListaCli');
//vistaControl
Route::get('/show/{id}','App\Http\Controllers\eventoController@show');
//b
Route::post('/inicioSesion',"App\Http\Controllers\loginController@inicioSesion");
Route::post('/storeClienteVehiculo',"App\Http\Controllers\loginController@storeClienteVehiculo");

Route::post('/store',"App\Http\Controllers\clientesController@store");
Route::put('/update/{id}',"App\Http\Controllers\clientesController@update");
Route::delete('/deletec/{id}',"App\Http\Controllers\clientesController@delete");
Route::put('/updateCli/{id}',"App\Http\Controllers\clientesController@updateCli");

Route::post('/storeVehiculo','App\Http\Controllers\vehiculoController@store');
Route::delete('/delete/{id}','App\Http\Controllers\vehiculoController@delete');
Route::post('/storeVehiculoCli','App\Http\Controllers\vehiculoController@storeCli');
Route::delete('/deleteVCli/{id}/{idCli}','App\Http\Controllers\vehiculoController@deleteVCli');

Route::post('/aumentarSitio','App\Http\Controllers\parqueoController@aumentarSitio');
Route::post('/quitarSitio','App\Http\Controllers\parqueoController@quitarSitio');
Route::post('/storeIngreso','App\Http\Controllers\parqueoController@storeIngreso');
Route::post('/storeSalida','App\Http\Controllers\parqueoController@storeSalida');

Route::post('/storeReservaDiaria','App\Http\Controllers\reservaController@storeDiario');
Route::post('/storeSemana','App\Http\Controllers\reservaController@storeSemana');
Route::post('/storeMesDia','App\Http\Controllers\reservaController@storeMesDia');
Route::post('/storeMesTarde','App\Http\Controllers\reservaController@storeMesTarde');
Route::post('/storeMesNoche','App\Http\Controllers\reservaController@storeMesNoche');
Route::post('/storeMesNoc','App\Http\Controllers\reservaController@storeMesNoc');
Route::post('/storeMesCompleto','App\Http\Controllers\reservaController@storeMesCompleto');
Route::post('/storeMesNum','App\Http\Controllers\reservaController@storeMesNum');
Route::post('/storeMesSabatico','App\Http\Controllers\reservaController@storeMesSabatico');
//Route::post('/storeMesS','App\Http\Controllers\reservaController@storeMesS');

Route::post('/storePagos','App\Http\Controllers\pagosController@store');
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

Route::get('/anuncios', "App\Http\Controllers\InfoClienteController@getAnuncios");
Route::get('/preguntas', "App\Http\Controllers\InfoClienteController@getPreguntas");
Route::get('/reservaInfo', "App\Http\Controllers\InfoClienteController@getReservas");

Route::post('/createAnuncio',"App\Http\Controllers\AnuncioController@store");
Route::post('/guardia/{id}/createAnuncioG',"App\Http\Controllers\AnuncioController@storeG");
Route::put('/updateAnuncio/{id}',"App\Http\Controllers\AnuncioController@update");
Route::delete('/deleteAnuncio/{id}',"App\Http\Controllers\AnuncioController@delete");

Route::post('/createPregunta',"App\Http\Controllers\PreguntasFrecuentesController@store");
Route::post('/guardia/createPreguntaG',"App\Http\Controllers\PreguntasFrecuentesController@storeG")->name('createPreguntaG');
Route::put('/updatePregunta/{id}',"App\Http\Controllers\PreguntasFrecuentesController@update");
Route::delete('/deletePregunta/{id}',"App\Http\Controllers\PreguntasFrecuentesController@delete");