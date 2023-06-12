<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parqueo;
use App\Models\Vehiculo;
use App\Models\Cliente;
use App\Models\guardia;
use App\Models\Sitio;
use App\Models\Ingreso;
use App\Models\ingreso_no_logueados;
use App\Models\salida_no_logueados;
use App\Models\Salida;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\BD;
use \administracionparqueo;
use DateTime;
use Carbon\Carbon;
class parqueoController extends Controller
{
    public function createLista(){
        $sitios = Sitio::all();

        $now = Carbon::now(); 
        $now->format('d/m/Y H:i');

        return view('administrador.mapeoParqueo', compact('now', 'sitios'));
    }
    public function createListaCli($id){
        $sitios = Sitio::all();

        $now = Carbon::now(); 
        $now->format('d/m/Y H:i');
        $cliente = Cliente::find($id);

        return view('cliente.mapeoParqueo', compact('now', 'sitios','cliente'));
    }
    public function createListaGu($id){
        $sitios = Sitio::all();

        $now = Carbon::now(); 
        $now->format('d/m/Y H:i');
        $guardia = Guardia::find($id);

        return view('guardia.mapeoParqueo', compact('now', 'sitios','guardia'));
    }

    public function aumentarSitio(){
        $cantSitios  = Sitio::max('nro_sitio');
        $cantSitios = $cantSitios+1;

        $sitio=new sitio();

        $sitio->id = $cantSitios;
        $sitio->nro_sitio = $cantSitios;
        $sitio->estado = "Libre";
        $sitio->id_parqueo = 1;
        $sitio->save();

        return redirect('/administrador/mapeoParqueo')->with('message', 'Sitio nuevo agregado correctamente');;
    }
    public function quitarSitio(){
        $cantSitios  = Sitio::max('nro_sitio');

        $sitioaElim = Sitio::where('nro_sitio', $cantSitios)->get();
        $estadoSitio = $sitioaElim->pluck('estado');
        $estadoSitio = $estadoSitio->implode(" ");

        if($estadoSitio == "Libre"){
            $Sitio = Sitio::destroy($cantSitios);
            return redirect('/administrador/mapeoParqueo')->with('message', 'Sitio eliminado correctamente');
        }else if($estadoSitio == "Ocupado"){
            return redirect('/administrador/mapeoParqueo')->with('msjdelete', 'El sitio: '.$cantSitios.' se encuentra ocupado.');
        }else if($estadoSitio == "Reservado"){
            return redirect('/administrador/mapeoParqueo')->with('msjdelete', 'El sitio: '.$cantSitios.' se encuentra Reservado.');
        } 
    }

    public function storeIngreso(Request $request)
    {   
        $tipoCli = $request->input('selectOpcion');
        
        if($tipoCli == 1){
            $placaVehiculo = $request->placaVehiculo;
            $vehiculos = Vehiculo::where('placa', $placaVehiculo)->get();

            if(count($vehiculos) === 0){
                return redirect('/administrador/mapeoParqueo')->with('msjdelete', 'La placa '.$placaVehiculo.' No se encuentra registrada');
            }else{
                $cantIngresos  = Ingreso::max('id');
                $idIngreso = $cantIngresos+1;

                $cantSalidas  = Salida::max('id');
                $idSalida = $cantSalidas+1;

                $now = Carbon::now(); 
                $now->format('Y/m/dTH:i');

                $idVehi = $vehiculos->pluck('id');
                $idVehi= intval($idVehi->first());
                
                $ingreso = new Ingreso();
                $ingreso->estado_ingreso ="Pendiente";
                $ingreso->id = $idIngreso;
                $ingreso->fecha_hora_ingreso = $now;
                $ingreso->id_sitio = $request->id_sitio;
                $ingreso->id_vehiculo = $idVehi;
                $ingreso->save();

                $sitio = new Sitio();
                $sitio = Sitio::findOrFail($request->id_sitio);
                $sitio ->estado = "Ocupado";
                $sitio ->save();

                $salida = new Salida();
                $salida->id = $idSalida;
                $salida->estado_salida = "Pendiente";
                $salida->fecha_hora_salida = $now;
                $salida->id_ingreso = $idIngreso;
                $salida ->save();
                
                return redirect('/administrador/mapeoParqueo')->with('message', 'Ingreso de cliente Logueado registrado correctamente');
            }
        }else if($tipoCli == 2){
            $validation= $request->validate([
                'nombreCli' => 'required | min:3 | max: 30',
                'apellidoCli' => 'required | min:3 | max: 30',
                'ciCli' => 'required|numeric| digits_between:6,10 ',
                'horas' => 'required|numeric',
            ]);

            $cantIngresos  = Ingreso_no_logueados::max('id');
            $idIngreso = $cantIngresos+1;

            $cantSalidas  = Salida_no_logueados::max('id');
            $idSalida = $cantSalidas+1;

            $precioHora = 2;
            $monto = $request->horas * $precioHora;

            $now = Carbon::now(); 
            $now->format('Y/m/dTH:i');

            $horaIngresoNL = Carbon::parse($now);
            $horas = $request->horas;
            $horaNueva = $horaIngresoNL->addHours($horas);

            $ingreso = new Ingreso_no_logueados();
            $ingreso->id = $idIngreso;
            $ingreso->estado_ingreso = "Pendiente";
            $ingreso->fecha_hora_ingreso = $now;
            $ingreso->nombre = $request->nombreCli;
            $ingreso->apellido = $request->apellidoCli;
            $ingreso->ci = $request->ciCli;
            $ingreso->placa = $request->placaCli;
            $ingreso->monto = $monto;
            $ingreso->cantidad_horas = $request->horas;
            $ingreso->hora_salida = $horaNueva;
            $ingreso->id_sitio = $request->id_sitio;
            $ingreso->save();

            $sitio = new Sitio();
            $sitio = Sitio::findOrFail($request->id_sitio);
            $sitio ->estado = "Ocupado";
            $sitio ->save();

            $salida = new Salida_no_logueados();
            $salida->id = $idSalida;
            $salida->estado_salida = "Pendiente";
            $salida->fecha_hora_salida = $now;
            $salida->monto_excedido =0;
            $salida->horas_exedidas =0;
            $salida->id_ingreso_no_logueados = $idIngreso;
            $salida ->save();

            $message = 'Ingreso Cliente No Logueado: ' .$request->apellidoCli. ' tiene valides de:<br>'
           . 'Inicio: (' .$now. '), <br>'
           . 'Fin: (' .$horaNueva. '), <br>'
           . 'Monto Pagado: (' .$monto. '), <br>'
           . 'Luego de la finalizacion del periodo de ingreso. Las horas excedidas seran cobradas. <br>';
            
            return redirect('/administrador/mapeoParqueo')->with('messageTicket', $message);;
        }else{
            $sitio = new Sitio();
            $sitio = Sitio::findOrFail($request->id_sitio);
            $sitio ->estado = "Reservado";
            $sitio ->save();
            return redirect('/administrador/mapeoParqueo')->with('message', 'Estado del cuviculo: '.$request->id_sitio.' se cambio a "Reservado" de forma satisfactoria');
        }
    }
    public function storeIngresoGu(Request $request)
    {   
        $idGu = $request->idGu;
        $guardia = Guardia::findOrFail($idGu);
        $tipoCli = $request->input('selectOpcion');
        
        if($tipoCli == 1){
            $placaVehiculo = $request->placaVehiculo;
            $vehiculos = Vehiculo::where('placa', $placaVehiculo)->get();

            if(count($vehiculos) === 0){
                return redirect('/guardia/'.($idGu).'/mapeoParqueo')->with(compact('guardia'))->with('msjdelete', 'La placa '.$placaVehiculo.' No se encuentra registrada');
            }else{
                $cantIngresos  = Ingreso::max('id');
                $idIngreso = $cantIngresos+1;

                $cantSalidas  = Salida::max('id');
                $idSalida = $cantSalidas+1;

                $now = Carbon::now(); 
                $now->format('Y/m/dTH:i');

                $idVehi = $vehiculos->pluck('id');
                $idVehi= intval($idVehi->first());
                
                $ingreso = new Ingreso();
                $ingreso->estado_ingreso ="Pendiente";
                $ingreso->id = $idIngreso;
                $ingreso->fecha_hora_ingreso = $now;
                $ingreso->id_sitio = $request->id_sitio;
                $ingreso->id_vehiculo = $idVehi;
                $ingreso->save();

                $sitio = new Sitio();
                $sitio = Sitio::findOrFail($request->id_sitio);
                $sitio ->estado = "Ocupado";
                $sitio ->save();

                $salida = new Salida();
                $salida->id = $idSalida;
                $salida->estado_salida = "Pendiente";
                $salida->fecha_hora_salida = $now;
                $salida->id_ingreso = $idIngreso;
                $salida ->save();

                return redirect('/guardia/'.($idGu).'/mapeoParqueo')->with(compact('guardia'))->with('message', 'Ingreso de cliente Logueado registrado correctamente');
                //return redirect('/administrador/mapeoParqueo')->with('message', 'Ingreso de cliente Logueado registrado correctamente');
            }
        }else if($tipoCli == 2){
            $validation= $request->validate([
                'nombreCli' => 'required | min:3 | max: 30',
                'apellidoCli' => 'required | min:3 | max: 30',
                'ciCli' => 'required|numeric| digits_between:6,10 ',
                'horas' => 'required|numeric',
            ]);

            $cantIngresos  = Ingreso_no_logueados::max('id');
            $idIngreso = $cantIngresos+1;

            $cantSalidas  = Salida_no_logueados::max('id');
            $idSalida = $cantSalidas+1;

            $precioHora = 2;
            $monto = $request->horas * $precioHora;

            $now = Carbon::now(); 
            $now->format('Y/m/dTH:i');

            $horaIngresoNL = Carbon::parse($now);
            $horas = $request->horas;
            $horaNueva = $horaIngresoNL->addHours($horas);

            $ingreso = new Ingreso_no_logueados();
            $ingreso->id = $idIngreso;
            $ingreso->estado_ingreso = "Pendiente";
            $ingreso->fecha_hora_ingreso = $now;
            $ingreso->nombre = $request->nombreCli;
            $ingreso->apellido = $request->apellidoCli;
            $ingreso->ci = $request->ciCli;
            $ingreso->placa = $request->placaCli;
            $ingreso->monto = $monto;
            $ingreso->cantidad_horas = $request->horas;
            $ingreso->hora_salida = $horaNueva;
            $ingreso->id_sitio = $request->id_sitio;
            $ingreso->save();

            $sitio = new Sitio();
            $sitio = Sitio::findOrFail($request->id_sitio);
            $sitio ->estado = "Ocupado";
            $sitio ->save();

            $salida = new Salida_no_logueados();
            $salida->id = $idSalida;
            $salida->estado_salida = "Pendiente";
            $salida->fecha_hora_salida = $now;
            $salida->monto_excedido =0;
            $salida->horas_exedidas =0;
            $salida->id_ingreso_no_logueados = $idIngreso;
            $salida ->save();

            $message = 'Ingreso Cliente No Logueado: ' .$request->apellidoCli. ' tiene valides de:<br>'
           . 'Inicio: (' .$now. '), <br>'
           . 'Fin: (' .$horaNueva. '), <br>'
           . 'Monto Pagado: (' .$monto. '), <br>'
           . 'Luego de la finalizacion del periodo de ingreso. Las horas excedidas seran cobradas. <br>';
            
           return redirect('/guardia/'.($idGu).'/mapeoParqueo')->with(compact('guardia'))->with('messageTicket', $message);;
        }else{
            $sitio = new Sitio();
            $sitio = Sitio::findOrFail($request->id_sitio);
            $sitio ->estado = "Reservado";
            $sitio ->save();
            return redirect('/guardia/'.($idGu).'/mapeoParqueo')->with(compact('guardia'))->with('message', 'Estado del cuviculo: '.$request->id_sitio.' se cambio a "Reservado" de forma satisfactoria');
        }
    }
    public function storeSalida(Request $request)
    {   
        $estado = $request->estado;
        if($estado == "Reservado"){
            $sitio = new Sitio();
            $sitio = Sitio::findOrFail($request->id_sitio);
            $sitio ->estado = "Libre";
            
            $sitio ->save();
            return redirect('/administrador/mapeoParqueo')->with('message', 'Estado del cuviculo: '.$request->id_sitio.' se cambio a "Libre" de forma satisfactoria');
        }else{
            $ingresos = Ingreso::where('id_sitio', $request->id_sitio)
                            ->Where('estado_ingreso', 'Pendiente')
                            ->get();
            if($ingresos->isNotEmpty()){
                $ingreso = $ingresos->first();
                $idingreso = $ingreso->id;        

                $salidas = Salida::where('id_ingreso',  $idingreso)
                                ->Where('estado_salida', 'Pendiente')
                                ->get();
                $salida = $salidas->first();

                $now = Carbon::now(); 
                $now->format('Y/m/dTH:i');

                $precioHora = 2;

                $fechaInicio = Carbon::parse($salida->fecha_hora_salida);
                $fechaFin = Carbon::parse($now);

                $horasDiferencia = $fechaInicio->floatDiffInSeconds($fechaFin) / 3600;

                $pago =  $horasDiferencia * $precioHora;

                $salida->estado_salida = "Finalizado";
                $salida->fecha_hora_salida = $now;
                //$salida->pago = $pago;

                $ingreso->estado_ingreso = "Finalizado";

                $sitio = new Sitio();
                $sitio = Sitio::findOrFail($request->id_sitio);
                $sitio ->estado = "Libre";
                
                $sitio ->save();
                $ingreso->save();
                $salida ->save();
                
                return redirect('/administrador/mapeoParqueo')->with('message', 'Estado:Libre del sitio cambiado correctamente. Se registro la salida de un cliente logueado');
            }else{
                $ingresos = ingreso_no_logueados::where('id_sitio', $request->id_sitio)
                            ->Where('estado_ingreso', 'Pendiente')
                            ->get();
                $ingreso = $ingresos->first();
                $idingreso = $ingreso->id;        

                $salidas = salida_no_logueados::where('id_ingreso_no_logueados',  $idingreso)
                                ->Where('estado_salida', 'Pendiente')
                                ->get();
                $salida = $salidas->first();

                $now = Carbon::now(); 
                $now->format('Y/m/dTH:i');

                $fechaSalid = Carbon::parse($ingreso->hora_salida);
                $fechaFin = Carbon::parse($now);
                $entero = 0 ;
                
                if ($fechaSalid->greaterThan($fechaFin)) {
                    $horasDiferencia = 0;
                } else {
                    $horasDiferencia = $fechaSalid->floatDiffInSeconds($fechaFin)/3600;
                    $entero = intval($horasDiferencia);
                }

                $entero = intval($horasDiferencia);
                
                $precioHora = 2;
                $pago2 =  $precioHora * $entero;

                
                $salida->estado_salida = "Finalizado";
                $salida->fecha_hora_salida = $now;
                $salida->monto_excedido = $pago2;
                $salida->horas_exedidas = $entero;

                $ingreso->estado_ingreso = "Finalizado";

                $sitio = new Sitio();
                $sitio = Sitio::findOrFail($request->id_sitio);
                $sitio ->estado = "Libre";
                
                $sitio ->save();
                $ingreso->save();
                $salida ->save();
                return redirect('/administrador/mapeoParqueo')->with('message', 'Estado:Libre del sitio cambiado correctamente. Se registro la salida de un cliente NO logueado');   
            }
        }
    }
    public function storeSalidaGu(Request $request)
    {   
        $idGu = $request->idGu;
        $guardia = Guardia::findOrFail($idGu);
        $estado = $request->estado;
        if($estado == "Reservado"){
            $sitio = new Sitio();
            $sitio = Sitio::findOrFail($request->id_sitio);
            $sitio ->estado = "Libre";
            
            $sitio ->save();
            return redirect('/guardia/'.($idGu).'/mapeoParqueo')->with(compact('guardia'))->with('message', 'Estado del cuviculo: '.$request->id_sitio.' se cambio a "Libre" de forma satisfactoria');
        }else{
            $ingresos = Ingreso::where('id_sitio', $request->id_sitio)
                            ->Where('estado_ingreso', 'Pendiente')
                            ->get();
            if($ingresos->isNotEmpty()){
                $ingreso = $ingresos->first();
                $idingreso = $ingreso->id;        

                $salidas = Salida::where('id_ingreso',  $idingreso)
                                ->Where('estado_salida', 'Pendiente')
                                ->get();
                $salida = $salidas->first();

                $now = Carbon::now(); 
                $now->format('Y/m/dTH:i');

                $precioHora = 2;

                $fechaInicio = Carbon::parse($salida->fecha_hora_salida);
                $fechaFin = Carbon::parse($now);

                $horasDiferencia = $fechaInicio->floatDiffInSeconds($fechaFin) / 3600;

                $pago =  $horasDiferencia * $precioHora;

                $salida->estado_salida = "Finalizado";
                $salida->fecha_hora_salida = $now;
                //$salida->pago = $pago;

                $ingreso->estado_ingreso = "Finalizado";

                $sitio = new Sitio();
                $sitio = Sitio::findOrFail($request->id_sitio);
                $sitio ->estado = "Libre";
                
                $sitio ->save();
                $ingreso->save();
                $salida ->save();
                
                return redirect('/guardia/'.($idGu).'/mapeoParqueo')->with(compact('guardia'))->with('message', 'Estado:Libre del sitio cambiado correctamente. Se registro la salida de un cliente logueado');
            }else{
                $ingresos = ingreso_no_logueados::where('id_sitio', $request->id_sitio)
                            ->Where('estado_ingreso', 'Pendiente')
                            ->get();
                $ingreso = $ingresos->first();
                $idingreso = $ingreso->id;        

                $salidas = salida_no_logueados::where('id_ingreso_no_logueados',  $idingreso)
                                ->Where('estado_salida', 'Pendiente')
                                ->get();
                $salida = $salidas->first();

                $now = Carbon::now(); 
                $now->format('Y/m/dTH:i');

                $fechaSalid = Carbon::parse($ingreso->hora_salida);
                $fechaFin = Carbon::parse($now);
                $entero = 0 ;
                
                if ($fechaSalid->greaterThan($fechaFin)) {
                    $horasDiferencia = 0;
                } else {
                    $horasDiferencia = $fechaSalid->floatDiffInSeconds($fechaFin)/3600;
                    $entero = intval($horasDiferencia);
                }

                $entero = intval($horasDiferencia);
                
                $precioHora = 2;
                $pago2 =  $precioHora * $entero;

                
                $salida->estado_salida = "Finalizado";
                $salida->fecha_hora_salida = $now;
                $salida->monto_excedido = $pago2;
                $salida->horas_exedidas = $entero;

                $ingreso->estado_ingreso = "Finalizado";

                $sitio = new Sitio();
                $sitio = Sitio::findOrFail($request->id_sitio);
                $sitio ->estado = "Libre";
                
                $sitio ->save();
                $ingreso->save();
                $salida ->save();
                return redirect('/guardia/'.($idGu).'/mapeoParqueo')->with(compact('guardia'))->with('message', 'Estado:Libre del sitio cambiado correctamente. Se registro la salida de un cliente NO logueado');   
            }
        }
    }
}