<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Reserva;
use App\Models\evento;
use App\Models\guardia;
use App\Models\Pago;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use \administracionparqueo;
use Carbon\Carbon;

class reservaController extends Controller
{  
    public function createLista(){
        $lista = Reserva::all();
        $listaClientes = Cliente::all();
        
        $collection = collect([]);
        foreach($lista as $listaReserva){
            foreach($listaClientes as $listaCli){
                if($listaReserva->id_cliente == $listaCli->id){
                    $collection = $collection->push($listaCli->ci);
                    $collectionFinal = collect($collection);
                }
            }
        }

        return view('administrador.reservas', compact('lista','collection'));
    }
    public function createListaCliente($id){
        $listaRe= Reserva::where('id_cliente', $id)->get();
        $ciCli= Cliente::where('id', $id)->get();
        $ciCli= $ciCli->pluck('ci');

        return view('administrador.reservaCliente', compact('listaRe','id','ciCli'));
    }

    public function createListaSitio($id){
        $listaReservaSitio= Reserva::where('id_sitio', $id)->get();
        $listaClientes = Cliente::all();
        
        $collection = collect([]);
        foreach($listaReservaSitio as $listaReserva){
            foreach($listaClientes as $listaCli){
                if($listaReserva->id_cliente == $listaCli->id){
                    $collection = $collection->push($listaCli->ci);
                    $collectionFinal = collect($collection);
                }
            }
        }
        return view('administrador.reservaSitio', compact('listaReservaSitio','collection','id'));
    }
    public function createListaCli($id){
        $cliente = Cliente::find($id);

        $lista = Reserva::where('id_cliente', $id)->get();

        return view('cliente.reservas', compact('lista','cliente'));
    
    }
    public function createListaGu($id){
        $guardia = Guardia::find($id);
        $lista = Reserva::all();

        return view('guardia.reservas', compact('lista','guardia'));
    
    }
    //ADMIN
    public function storeDiario(Request $request)
    {
        $ciCliente = $request -> ciCliente;
        $cliente = Cliente::where('ci', $ciCliente)->get();

        $idSitio = $request->id_sitio;
        
        if(count($cliente) === 0){
            return redirect('/administrador/reserva/calendario/'.$idSitio)->with('msjdelete', 'No existe un cliente con id : ('.$ciCliente.')');
        }else{
            //Verifica si es posible reservar
                $horaIngresoS = Carbon::parse($request->hora_ingreso);
                $horasS = $request->horas1;

                $horaNuevaS = $horaIngresoS->addHours($horasS);
                $horaFormateadaS = $horaNuevaS->format('H:i:s');

                //Diario
                $eventos = Reserva::where('fecha_ingreso', $request->fecha_ingreso)
                            ->where('hora_ingreso', '<=', $request->hora_ingreso)
                            ->where('hora_salida', '>=', $horaFormateadaS)
                            ->where('dias', '1')
                            ->where('id_sitio', $request->id_sitio)
                            ->get();
                $eventos1 = Reserva::where('fecha_ingreso', $request->fecha_ingreso)
                            ->where('hora_ingreso', '>=', $request->hora_ingreso)
                            ->where('hora_ingreso', '<=', $horaFormateadaS)    
                            ->where('hora_salida', '>=', $horaFormateadaS)
                                ->where('dias', '1')
                                ->where('id_sitio', $request->id_sitio)
                            ->get();
                $eventos2 = Reserva::where('fecha_ingreso', $request->fecha_ingreso)
                            ->where('hora_ingreso', '<=', $request->hora_ingreso)
                            ->where('hora_salida', '>=', $request->hora_ingreso)    
                            ->where('hora_salida', '<=', $horaFormateadaS)
                                ->where('dias', '1')
                                ->where('id_sitio', $request->id_sitio)
                            ->get();

                //Semana
                $eventos3 = Reserva::where('fecha_ingreso', '<=', $request->fecha_ingreso)
                        ->where('fecha_salida', '>=', $request->fecha_ingreso)
                        ->where('hora_ingreso', '<=', $request->hora_ingreso)
                        ->where('hora_salida', '>=', $horaFormateadaS)
                        ->where('dias', '7')
                        ->where('id_sitio', $request->id_sitio)
                        ->get();
                $eventos4 = Reserva::where('fecha_ingreso', '<=', $request->fecha_ingreso)
                        ->where('fecha_salida', '>=', $request->fecha_ingreso)
                        ->where('hora_ingreso', '>=', $request->hora_ingreso)
                        ->where('hora_ingreso', '<=', $horaFormateadaS)    
                        ->where('hora_salida', '>=', $horaFormateadaS)
                        ->where('dias', '7')
                        ->where('id_sitio', $request->id_sitio)
                        ->get();
                $eventos5 = Reserva::where('fecha_ingreso', '<=', $request->fecha_ingreso)
                        ->where('fecha_salida', '>=', $request->fecha_ingreso)
                        ->where('hora_ingreso', '<=', $request->hora_ingreso)
                        ->where('hora_salida', '>=', $request->hora_ingreso)    
                        ->where('hora_salida', '<=', $horaFormateadaS)
                        ->where('dias', '7')
                        ->where('id_sitio', $request->id_sitio)
                        ->get();
                //MesDia
                
                if($request->hora_ingreso >= '06:00:00' && $request->hora_ingreso <= '11:00:00' || $horaFormateadaS >= '06:00:00' && $horaFormateadaS <= '11:00:00'){
                        $eventos6 = Reserva::where('fecha_ingreso', '<=', $request->fecha_ingreso)
                        ->where('fecha_salida', '>=', $request->fecha_ingreso)
                        //->whereTime('hora_ingreso', '06:00:00')
                        ->where('cantidad_de_horas', '5')
                        ->where('dias', '30')
                        ->where('id_sitio', $request->id_sitio)
                        ->get();
                }else{
                    $eventos6 = collect(array_fill(0, 0, null));
                }
                //MesTarde
                if($request->hora_ingreso >= '11:00:00' && $request->hora_ingreso <= '17:00:00' || $horaFormateadaS >= '11:00:00' && $horaFormateadaS <= '17:00:00'){
                    $eventos7 = Reserva::where('fecha_ingreso', '<=', $request->fecha_ingreso)
                    ->where('fecha_salida', '>=', $request->fecha_ingreso)
                    ->where('cantidad_de_horas', '6')
                    ->where('dias', '30')
                    ->where('id_sitio', $request->id_sitio)
                    ->get();
                }else{
                    $eventos7 = collect(array_fill(0, 0, null));
                }
                //MesNoche
                if($request->hora_ingreso >= '17:00:00' && $request->hora_ingreso <= '22:00:00' || $horaFormateadaS >= '17:00:00' && $horaFormateadaS <= '22:00:00'){
                    $eventos8 = Reserva::where('fecha_ingreso', '<=', $request->fecha_ingreso)
                    ->where('fecha_salida', '>=', $request->fecha_ingreso)
                    ->whereTime('hora_ingreso', '17:00:00')
                    ->where('cantidad_de_horas', '5')
                    ->where('dias', '30')
                    ->where('id_sitio', $request->id_sitio)
                    ->get();
                }else{
                    $eventos8 = collect(array_fill(0, 0, null));
                }
                //MesNocturno
                if($request->hora_ingreso >= '22:00:00' && $request->hora_ingreso <= '24:00:00' || $horaFormateadaS >= '22:00:00' && $horaFormateadaS <= '24:00:00'){
                    $eventos9 = Reserva::where('fecha_ingreso', '<=', $request->fecha_ingreso)
                    ->where('fecha_salida', '>=', $request->fecha_ingreso)
                    ->where('cantidad_de_horas', '8')
                    ->where('dias', '30')
                    ->where('id_sitio', $request->id_sitio)
                    ->get();
                }else{
                    $eventos9 = collect(array_fill(0, 0, null));
                }
                //MesCompleto
                if($request->hora_ingreso >= '06:00:00' && $request->hora_ingreso <= '22:00:00'|| $horaFormateadaS >= '06:00:00' && $horaFormateadaS <= '22:00:00'){
                    $eventos10 = Reserva::where('fecha_ingreso', '<=', $request->fecha_ingreso)
                    ->where('fecha_salida', '>=', $request->fecha_ingreso)
                    ->where('cantidad_de_horas', '16')
                    ->where('dias', '30')
                    ->where('id_sitio', $request->id_sitio)
                    ->get();
                }else{
                    $eventos10 = collect(array_fill(0, 0, null));
                }
                //Mes24/5
                $eventos11 = Reserva::where('fecha_ingreso', '<=', $request->fecha_ingreso)
                    ->where('fecha_salida', '>=', $request->fecha_ingreso)
                    ->where('cantidad_de_horas', '24')
                    ->where('dias', '30')
                    ->where('id_sitio', $request->id_sitio)
                    ->get();

            if(count($eventos) != 0 || count($eventos1) != 0 || count($eventos2) != 0 || count($eventos3) != 0 || count($eventos4) != 0 || count($eventos5) != 0 ||
                count($eventos6) != 0 || count($eventos7) != 0 || count($eventos8) != 0 || count($eventos9) != 0 || count($eventos10) != 0 || count($eventos11) != 0){
                return redirect('/administrador/reserva/calendario/'.$idSitio)->with('msjdelete', 'Ya existe una reserva en la fecha y hora indicada.');
            }else{
                $idcliente = $cliente->pluck('id');
                $idclienteNum = $idcliente->implode(" ");
                
                $horaIngreso = Carbon::parse($request->hora_ingreso);
                $horas = $request->horas1;

                $horaNueva = $horaIngreso->addHours($horas);
                $horaFormateada = $horaNueva->format('H:i');

                $idreserva  = Reserva::max('id');
                $idreserva = $idreserva+1;
                
                $reserva=new Reserva();
                $reserva->id = $idreserva;
                $reserva->fecha_ingreso = $request->fecha_ingreso;
                $reserva->fecha_salida = $request->fecha_ingreso;
                $reserva->hora_ingreso = $request->hora_ingreso;
                $reserva->hora_salida = $horaFormateada;
                $reserva->cantidad_de_horas = '1';
                $reserva->dias= 1;
                $reserva->id_sitio = $request->id_sitio;
                $reserva->id_cliente = $idclienteNum;

                $startD = Carbon::parse($request->fecha_ingreso . ' ' . $request->hora_ingreso);
                $endD = Carbon::parse($request->fecha_ingreso . ' ' . $horaFormateada);

                $idmenos  = Evento::max('id');
                $idEvento = $idmenos+1;

                $evento=new Evento();
                $evento->id = $idEvento;
                $evento->title = "RESERVADO";
                $evento->description = "Ci Cliente:". $ciCliente;
                $evento->start = $startD;
                $evento->end = $endD;
                $evento->id_sitio = $request->id_sitio;

                $pagado = 6 * $horas;
                $pagado2 = Pago::where('monto_pagado', $pagado)
                            ->whereNull('id_reserva')
                            ->get();

                if(count($pagado2)== 0){
                    return redirect('/administrador/reserva/calendario/'.$idSitio)->with('msjdelete', 'Realie el pago antes de Confirmar una reserva');
                }else{
                    $pagado3 = Pago::where('monto_pagado', $pagado)
                            ->whereNull('id_reserva')
                            ->first();

                    $idPago = $pagado3->id;
                    $pago = Pago::findOrFail($idPago);

                    $pago->id_reserva = $idreserva;

                    $evento->save();
                    $reserva->save();
                    $pago->save();

                    $message = 'Tu reserva se ha guardado exitosamente <br>'
                    . 'Dia: (' . $request->fecha_ingreso . '), <br>'
                    . 'Hora Ingreso: (' . $request->hora_ingreso . '), <br>'
                    . 'Hora Salida: (' . $horaFormateada . ')';
                
                    return redirect('/administrador/reserva/calendario/'.$idSitio)->with('messageTicket', $message);
                }
            }
        }
    } 
    public function storeSemana(Request $request)
    {
        $ciCliente = $request -> ciCliente;
        $cliente = Cliente::where('ci', $ciCliente)->get();

        $idsitio = $request->id_sitio;
        
        if(count($cliente) === 0){
            return redirect('/administrador/reserva/calendario/'.$idsitio)->with('msjdelete', 'No existe un cliente con id : ('.$ciCliente.')');
        }else{
            $idcliente = $cliente->pluck('id');
            $idclienteNum = $idcliente->implode(" ");
            
            $horaIngreso = Carbon::parse($request->hora_ingreso);
            $horas = $request->horas2;

            $horaNueva = $horaIngreso->addHours($horas);
            $horaFormateada = $horaNueva->format('H:i');

            $fechaIngreso = Carbon::parse($request->fecha_ingreso);
            $fechaSalida = $fechaIngreso->addDays(7);
            $fechaSalida = $fechaSalida->format('Y-m-d');

            $idreserva  = Reserva::max('id');
            $idreserva = $idreserva+1;
            
            $reserva=new Reserva();
            $reserva->id = $idreserva;
            $reserva->fecha_ingreso = $request->fecha_ingreso;
            $reserva->fecha_salida = $fechaSalida;
            $reserva->hora_ingreso = $request->hora_ingreso;
            $reserva->hora_salida = $horaFormateada;
            $reserva->cantidad_de_horas = '2';
            $reserva->cantidad_de_horas = $horas;
            $reserva->dias= 7;
            $reserva->id_cliente = $idclienteNum;
            $reserva->id_sitio = $request->id_sitio;
            
            $startD = Carbon::parse($request->fecha_ingreso . ' ' . $request->hora_ingreso);


            $idmenos  = Evento::max('id');
            $idEvento = $idmenos+1;

            $horaI = Carbon::parse($request->hora_ingreso);
            $horaI = $horaI->format('H:i:s');;

            $fechaIngreso2 = Carbon::parse($request->fecha_ingreso);
            $fechaNueva = $fechaIngreso2->format('Y-m-d');
            
            $dtstartf = Carbon::createFromFormat('Y-m-d', $fechaNueva)->format('Ymd');
            $dtstarth = Carbon::createFromFormat('H:i:s', $horaI)->format('His');
            $until = Carbon::createFromFormat('Y-m-d', $fechaSalida)->format('Ymd');

            $resultado = 'DTSTART:'.$dtstartf.'T'.$dtstarth.'Z\nRRULE:FREQ=WEEKLY;INTERVAL=1;UNTIL='.$until.';BYDAY=MO,TU,WE,TH,FR,SA';
            
            $evento=new Evento();
            $evento->id = $idEvento;
            $evento->title = "- $horaFormateada RESERVADO $horas hrs";
            $evento->description = "Ci Cliente:". $ciCliente;
            $evento->start = $startD;
            $evento->end = $horaNueva;
            $evento->rrule= $resultado;
            //$evento->rrule = "DTSTART:20230601T103000Z\nRRULE:FREQ=WEEKLY;INTERVAL=1;UNTIL=20230801;BYDAY=MO,TU,WE,TH,FR,SA";
                
            $evento->id_sitio = $request->id_sitio;

            
            $evento->save();
            $reserva->save();

            $message = 'Tu reserva se ha guardado exitosamente .Aqui tienes los detalles de tu plan de reserva<br>'
           . 'Dia Inicio del plan : (' . $fechaNueva. '), <br>'
           . 'Dia Fin del plan : (' . $fechaSalida . '), <br>'
           . 'Hora Ingreso Diario: (' . $request->hora_ingreso . '), <br>'
           . 'Hora Salida Diaria: (' . $horaFormateada . ')';
        
            return redirect('/administrador/reserva/calendario/'.$idsitio)->with('messageTicket', $message);
        }
    } 
    public function storeMesDia(Request $request)
    {
        $ciCliente = $request -> ciCliente;
        $cliente = Cliente::where('ci', $ciCliente)->get();

        $idsitio = $request->id_sitio;
        
        if(count($cliente) === 0){
            return redirect('/administrador/reserva/calendario/'.$idsitio)->with('msjdelete', 'No existe un cliente con id : ('.$ciCliente.')');
        }else{
            $rese = true;
            if($rese){
                $idcliente = $cliente->pluck('id');
                $idclienteNum = $idcliente->implode(" ");

                $fechaIngreso = Carbon::parse($request->fecha_ingreso);
                $fechaSalida = $fechaIngreso->addDays(30);
                $fechaSalida = $fechaSalida->format('Y-m-d');

                $idreserva  = Reserva::max('id');
                $idreserva = $idreserva+1;
                
                $reserva=new Reserva();
                $reserva->id = $idreserva;
                $reserva->fecha_ingreso = $request->fecha_ingreso;
                $reserva->fecha_salida = $fechaSalida;
                $reserva->hora_ingreso = $request->hora_ingreso;
                $reserva->hora_salida = $request->hora_salida;
                $reserva->cantidad_de_horas = 5;
                $reserva->dias= 30;
                $reserva->id_cliente = $idclienteNum;
                $reserva->id_sitio = $request->id_sitio;
            
                $startD = Carbon::parse($request->fecha_ingreso . ' ' . $request->hora_ingreso);
                $endD = Carbon::parse($fechaSalida . ' ' . $request->hora_salida);


                $idmenos  = Evento::max('id');
                $idEvento = $idmenos+1;

                $fechaIngreso2 = Carbon::parse($request->fecha_ingreso);
                $fechaNueva = $fechaIngreso2->format('Y-m-d');
                
                $dtstartf = Carbon::createFromFormat('Y-m-d', $fechaNueva)->format('Ymd');
                $until = Carbon::createFromFormat('Y-m-d', $fechaSalida)->format('Ymd');

                $resultado = 'DTSTART:'.$dtstartf.'T060000Z\nRRULE:FREQ=WEEKLY;INTERVAL=1;UNTIL='.$until.'T110000;BYDAY=MO,TU,WE,TH,FR';
                
                $evento=new Evento();
                $evento->id = $idEvento;
                $evento->title = "- 11:00 RESERVADO 5 hrs";
                $evento->description = "Ci Cliente:". $ciCliente;
                $evento->start = $startD;
                $evento->end = $endD;
                $evento->rrule= $resultado;
                //$evento->rrule = "DTSTART:20230601T103000Z\nRRULE:FREQ=WEEKLY;INTERVAL=1;UNTIL=20230801;BYDAY=MO,TU,WE,TH,FR,SA";
                $evento->id_sitio = $request->id_sitio;
                
                $evento->save();
                $reserva->save();

                $message = 'Tu reserva se ha guardado exitosamente .Aqui tienes los detalles de tu plan de reserva<br>'
                . 'Dia Inicio del plan : (' . $request->fecha_ingreso. '), <br>'
                . 'Dia Fin del plan : (' . $fechaSalida . '), <br>'
                . 'Hora Ingreso Diario: (' . $request->hora_ingreso . '), <br>'
                . 'Hora Salida Diaria: (' . $request->hora_salida . ')';
                
                return redirect('/administrador/reserva/calendario/'.$idsitio)->with('messageTicket', $message);
            }else{
                return redirect('/administrador/reserva/calendario/'.$idsitio)->with('msjdelete', 'Ya existe una reserva en la fecha y hora indicada.');
            }
        }
    }
    public function storeMesTarde(Request $request)
    {
        $ciCliente = $request -> ciCliente;
        $cliente = Cliente::where('ci', $ciCliente)->get();

        $idsitio = $request->id_sitio;
        
        if(count($cliente) === 0){
            return redirect('/administrador/reserva/calendario/'.$idsitio)->with('msjdelete', 'No existe un cliente con id : ('.$ciCliente.')');
        }else{
            $rese = true;
            if($rese){
                $idcliente = $cliente->pluck('id');
                $idclienteNum = $idcliente->implode(" ");

                $fechaIngreso = Carbon::parse($request->fecha_ingreso);
                $fechaSalida = $fechaIngreso->addDays(30);
                $fechaSalida = $fechaSalida->format('Y-m-d');

                $idreserva  = Reserva::max('id');
                $idreserva = $idreserva+1;
                
                $reserva=new Reserva();
                $reserva->id = $idreserva;
                $reserva->fecha_ingreso = $request->fecha_ingreso;
                $reserva->fecha_salida = $fechaSalida;
                $reserva->hora_ingreso = $request->hora_ingreso;
                $reserva->hora_salida = $request->hora_salida;
                $reserva->cantidad_de_horas = 6;
                $reserva->dias= 30;
                $reserva->id_cliente = $idclienteNum;
                $reserva->id_sitio = $request->id_sitio;
            
                $startD = Carbon::parse($request->fecha_ingreso . ' ' . $request->hora_ingreso);
                $endD = Carbon::parse($fechaSalida . ' ' . $request->hora_salida);


                $idmenos  = Evento::max('id');
                $idEvento = $idmenos+1;

                $fechaIngreso2 = Carbon::parse($request->fecha_ingreso);
                $fechaNueva = $fechaIngreso2->format('Y-m-d');
                
                $dtstartf = Carbon::createFromFormat('Y-m-d', $fechaNueva)->format('Ymd');
                $until = Carbon::createFromFormat('Y-m-d', $fechaSalida)->format('Ymd');

                $resultado = 'DTSTART:'.$dtstartf.'T110000Z\nRRULE:FREQ=WEEKLY;INTERVAL=1;UNTIL='.$until.'T170000;BYDAY=MO,TU,WE,TH,FR';
                
                $evento=new Evento();
                $evento->id = $idEvento;
                $evento->title = "- 17:00 RESERVADO 6 hrs";
                $evento->description = "Ci Cliente:". $ciCliente;
                $evento->start = $startD;
                $evento->end = $endD;
                $evento->rrule= $resultado;
                //$evento->rrule = "DTSTART:20230601T103000Z\nRRULE:FREQ=WEEKLY;INTERVAL=1;UNTIL=20230801;BYDAY=MO,TU,WE,TH,FR,SA";
                $evento->id_sitio = $request->id_sitio;
                
                $evento->save();
                $reserva->save();

                $message = 'Tu reserva se ha guardado exitosamente .Aqui tienes los detalles de tu plan de reserva<br>'
                . 'Dia Inicio del plan : (' . $request->fecha_ingreso. '), <br>'
                . 'Dia Fin del plan : (' . $fechaSalida . '), <br>'
                . 'Hora Ingreso Diario: (' . $request->hora_ingreso . '), <br>'
                . 'Hora Salida Diaria: (' . $request->hora_salida . ')';
                
                return redirect('/administrador/reserva/calendario/'.$idsitio)->with('messageTicket', $message);
            }else{
                return redirect('/administrador/reserva/calendario/'.$idsitio)->with('msjdelete', 'Ya existe una reserva en la fecha y hora indicada.');
            }
        }
    }
    public function storeMesNoche(Request $request)
    {
        $ciCliente = $request -> ciCliente;
        $cliente = Cliente::where('ci', $ciCliente)->get();

        $idsitio = $request->id_sitio;
        
        if(count($cliente) === 0){
            return redirect('/administrador/reserva/calendario/'.$idsitio)->with('msjdelete', 'No existe un cliente con id : ('.$ciCliente.')');
        }else{
            $rese = true;
            if($rese){
                $idcliente = $cliente->pluck('id');
                $idclienteNum = $idcliente->implode(" ");

                $fechaIngreso = Carbon::parse($request->fecha_ingreso);
                $fechaSalida = $fechaIngreso->addDays(30);
                $fechaSalida = $fechaSalida->format('Y-m-d');

                $idreserva  = Reserva::max('id');
                $idreserva = $idreserva+1;
                
                $reserva=new Reserva();
                $reserva->id = $idreserva;
                $reserva->fecha_ingreso = $request->fecha_ingreso;
                $reserva->fecha_salida = $fechaSalida;
                $reserva->hora_ingreso = $request->hora_ingreso;
                $reserva->hora_salida = $request->hora_salida;
                $reserva->cantidad_de_horas = 5;
                $reserva->dias= 30;
                $reserva->id_cliente = $idclienteNum;
                $reserva->id_sitio = $request->id_sitio;
            
                $startD = Carbon::parse($request->fecha_ingreso . ' ' . $request->hora_ingreso);
                $endD = Carbon::parse($fechaSalida . ' ' . $request->hora_salida);


                $idmenos  = Evento::max('id');
                $idEvento = $idmenos+1;

                $fechaIngreso2 = Carbon::parse($request->fecha_ingreso);
                $fechaNueva = $fechaIngreso2->format('Y-m-d');
                
                $dtstartf = Carbon::createFromFormat('Y-m-d', $fechaNueva)->format('Ymd');
                $until = Carbon::createFromFormat('Y-m-d', $fechaSalida)->format('Ymd');

                $resultado = 'DTSTART:'.$dtstartf.'T170000Z\nRRULE:FREQ=WEEKLY;INTERVAL=1;UNTIL='.$until.'T220000;BYDAY=MO,TU,WE,TH,FR';
                
                $evento=new Evento();
                $evento->id = $idEvento;
                $evento->title = "- 22:00 RESERVADO 5 hrs";
                $evento->description = "Ci Cliente:". $ciCliente;
                $evento->start = $startD;
                $evento->end = $endD;
                $evento->rrule= $resultado;
                //$evento->rrule = "DTSTART:20230601T103000Z\nRRULE:FREQ=WEEKLY;INTERVAL=1;UNTIL=20230801;BYDAY=MO,TU,WE,TH,FR,SA";
                $evento->id_sitio = $request->id_sitio;
                
                $evento->save();
                $reserva->save();

                $message = 'Tu reserva se ha guardado exitosamente .Aqui tienes los detalles de tu plan de reserva<br>'
                . 'Dia Inicio del plan : (' . $request->fecha_ingreso. '), <br>'
                . 'Dia Fin del plan : (' . $fechaSalida . '), <br>'
                . 'Hora Ingreso Diario: (' . $request->hora_ingreso . '), <br>'
                . 'Hora Salida Diaria: (' . $request->hora_salida . ')';
                
                return redirect('/administrador/reserva/calendario/'.$idsitio)->with('messageTicket', $message);
            }else{
                return redirect('/administrador/reserva/calendario/'.$idsitio)->with('msjdelete', 'Ya existe una reserva en la fecha y hora indicada.');
            }
        }
    }

    public function storeMesNoc(Request $request)
    {
        $ciCliente = $request -> ciCliente;
        $cliente = Cliente::where('ci', $ciCliente)->get();

        $idsitio = $request->id_sitio;
        
        if(count($cliente) === 0){
            return redirect('/administrador/reserva/calendario/'.$idsitio)->with('msjdelete', 'No existe un cliente con id : ('.$ciCliente.')');
        }else{
            $rese = true;
            if($rese){
                $idcliente = $cliente->pluck('id');
                $idclienteNum = $idcliente->implode(" ");

                $fechaIngreso = Carbon::parse($request->fecha_ingreso);
                $fechaSalida = $fechaIngreso->addDays(30);
                $fechaSalida = $fechaSalida->format('Y-m-d');

                $idreserva  = Reserva::max('id');
                $idreserva = $idreserva+1;
                
                $reserva=new Reserva();
                $reserva->id = $idreserva;
                $reserva->fecha_ingreso = $request->fecha_ingreso;
                $reserva->fecha_salida = $fechaSalida;
                $reserva->hora_ingreso = $request->hora_ingreso;
                $reserva->hora_salida = $request->hora_salida;
                $reserva->cantidad_de_horas = 8;
                $reserva->dias= 30;
                $reserva->id_cliente = $idclienteNum;
                $reserva->id_sitio = $request->id_sitio;
            
                $startD = Carbon::parse($request->fecha_ingreso . ' ' . $request->hora_ingreso);
                $endD = Carbon::parse($fechaSalida . ' ' . $request->hora_salida);


                $idmenos  = Evento::max('id');
                $idEvento = $idmenos+1;

                $fechaIngreso2 = Carbon::parse($request->fecha_ingreso);
                $fechaNueva = $fechaIngreso2->format('Y-m-d');
                
                $dtstartf = Carbon::createFromFormat('Y-m-d', $fechaNueva)->format('Ymd');
                $until = Carbon::createFromFormat('Y-m-d', $fechaSalida)->format('Ymd');

                $resultado = 'DTSTART:'.$dtstartf.'T220000Z\nRRULE:FREQ=WEEKLY;INTERVAL=1;UNTIL='.$until.'T060000;BYDAY=MO,TU,WE,TH,FR';
                
                $evento=new Evento();
                $evento->id = $idEvento;
                $evento->title = "- 06:00 RESERVADO 8 hrs";
                $evento->description = "Ci Cliente:". $ciCliente;
                $evento->start = $startD;
                $evento->end = $endD;
                $evento->rrule= $resultado;
                //$evento->rrule = "DTSTART:20230601T103000Z\nRRULE:FREQ=WEEKLY;INTERVAL=1;UNTIL=20230801;BYDAY=MO,TU,WE,TH,FR,SA";
                $evento->id_sitio = $request->id_sitio;
                
                $evento->save();
                $reserva->save();

                $message = 'Tu reserva se ha guardado exitosamente .Aqui tienes los detalles de tu plan de reserva<br>'
                . 'Dia Inicio del plan : (' . $request->fecha_ingreso. '), <br>'
                . 'Dia Fin del plan : (' . $fechaSalida . '), <br>'
                . 'Hora Ingreso Diario: (' . $request->hora_ingreso . '), <br>'
                . 'Hora Salida Diaria: (' . $request->hora_salida . ')';
                
                return redirect('/administrador/reserva/calendario/'.$idsitio)->with('messageTicket', $message);
            }else{
                return redirect('/administrador/reserva/calendario/'.$idsitio)->with('msjdelete', 'Ya existe una reserva en la fecha y hora indicada.');
            }
        }
    }

    public function storeMesCompleto(Request $request)
    {
        $ciCliente = $request -> ciCliente;
        $cliente = Cliente::where('ci', $ciCliente)->get();

        $idsitio = $request->id_sitio;
        
        if(count($cliente) === 0){
            return redirect('/administrador/reserva/calendario/'.$idsitio)->with('msjdelete', 'No existe un cliente con id : ('.$ciCliente.')');
        }else{
            /*$rese = Reserva::where('hora_ingreso', $request->hora_ingreso)
                ->where('cantidad_de_horas', '16')
                ->where('dias', '30')
                ->where('id_sitio', $request->id_sitio)
                ->get();*/
            $rese = true;
            if($rese){
                $idcliente = $cliente->pluck('id');
                $idclienteNum = $idcliente->implode(" ");

                $fechaIngreso = Carbon::parse($request->fecha_ingreso);
                $fechaSalida = $fechaIngreso->addDays(30);
                $fechaSalida = $fechaSalida->format('Y-m-d');

                $idreserva  = Reserva::max('id');
                $idreserva = $idreserva+1;
                
                $reserva=new Reserva();
                $reserva->id = $idreserva;
                $reserva->fecha_ingreso = $request->fecha_ingreso;
                $reserva->fecha_salida = $fechaSalida;
                $reserva->hora_ingreso = $request->hora_ingreso;
                $reserva->hora_salida = $request->hora_salida;
                $reserva->cantidad_de_horas = 16;
                $reserva->dias= 30;
                $reserva->id_cliente = $idclienteNum;
                $reserva->id_sitio = $request->id_sitio;
            
                $startD = Carbon::parse($request->fecha_ingreso . ' ' . $request->hora_ingreso);
                $endD = Carbon::parse($fechaSalida . ' ' . $request->hora_salida);


                $idmenos  = Evento::max('id');
                $idEvento = $idmenos+1;

                $fechaIngreso2 = Carbon::parse($request->fecha_ingreso);
                $fechaNueva = $fechaIngreso2->format('Y-m-d');
                
                $dtstartf = Carbon::createFromFormat('Y-m-d', $fechaNueva)->format('Ymd');
                $until = Carbon::createFromFormat('Y-m-d', $fechaSalida)->format('Ymd');

                $resultado = 'DTSTART:'.$dtstartf.'T060000Z\nRRULE:FREQ=WEEKLY;INTERVAL=1;UNTIL='.$until.'T220000;BYDAY=MO,TU,WE,TH,FR';
                
                $evento=new Evento();
                $evento->id = $idEvento;
                $evento->title = "- 22:00 RESERVADO 16 hrs";
                $evento->description = "Ci Cliente:". $ciCliente;
                $evento->start = $startD;
                $evento->end = $endD;
                $evento->rrule= $resultado;
                //$evento->rrule = "DTSTART:20230601T103000Z\nRRULE:FREQ=WEEKLY;INTERVAL=1;UNTIL=20230801;BYDAY=MO,TU,WE,TH,FR,SA";
                $evento->id_sitio = $request->id_sitio;
                
                $evento->save();
                $reserva->save();

                $message = 'Tu reserva se ha guardado exitosamente .Aqui tienes los detalles de tu plan de reserva<br>'
                . 'Dia Inicio del plan : (' . $request->fecha_ingreso. '), <br>'
                . 'Dia Fin del plan : (' . $fechaSalida . '), <br>'
                . 'Hora Ingreso Diario: (' . $request->hora_ingreso . '), <br>'
                . 'Hora Salida Diaria: (' . $request->hora_salida . ')';
                
                return redirect('/administrador/reserva/calendario/'.$idsitio)->with('messageTicket', $message);
            }else{
                return redirect('/administrador/reserva/calendario/'.$idsitio)->with('msjdelete', 'Ya existe una reserva en la fecha y hora indicada.');
            }
        }
    }

    public function storeMesNum(Request $request)
    {
        $ciCliente = $request -> ciCliente;
        $cliente = Cliente::where('ci', $ciCliente)->get();

        $idsitio = $request->id_sitio;
        
        if(count($cliente) === 0){
            return redirect('/administrador/reserva/calendario/'.$idsitio)->with('msjdelete', 'No existe un cliente con id : ('.$ciCliente.')');
        }else{
            $rese = true;
            if($rese){
                $idcliente = $cliente->pluck('id');
                $idclienteNum = $idcliente->implode(" ");

                $fechaIngreso = Carbon::parse($request->fecha_ingreso);
                $fechaSalida = $fechaIngreso->addDays(30);
                $fechaSalida = $fechaSalida->format('Y-m-d');

                $idreserva  = Reserva::max('id');
                $idreserva = $idreserva+1;
                
                $reserva=new Reserva();
                $reserva->id = $idreserva;
                $reserva->fecha_ingreso = $request->fecha_ingreso;
                $reserva->fecha_salida = $fechaSalida;
                $reserva->hora_ingreso = $request->hora_ingreso;
                $reserva->hora_salida = $request->hora_salida;
                $reserva->cantidad_de_horas = 24;
                $reserva->dias= 30;
                $reserva->id_cliente = $idclienteNum;
                $reserva->id_sitio = $request->id_sitio;
            
                $startD = Carbon::parse($request->fecha_ingreso . ' ' . $request->hora_ingreso);
                $endD = Carbon::parse($fechaSalida . ' ' . $request->hora_salida);


                $idmenos  = Evento::max('id');
                $idEvento = $idmenos+1;

                $fechaIngreso2 = Carbon::parse($request->fecha_ingreso);
                $fechaNueva = $fechaIngreso2->format('Y-m-d');
                
                $dtstartf = Carbon::createFromFormat('Y-m-d', $fechaNueva)->format('Ymd');
                $until = Carbon::createFromFormat('Y-m-d', $fechaSalida)->format('Ymd');

                $resultado = 'DTSTART:'.$dtstartf.'T060000Z\nRRULE:FREQ=WEEKLY;INTERVAL=1;UNTIL='.$until.'T060000;BYDAY=MO,TU,WE,TH,FR';
                
                $evento=new Evento();
                $evento->id = $idEvento;
                $evento->title = "- 06:00 RESERVADO 24 hrs";
                $evento->description = "Ci Cliente:". $ciCliente;
                $evento->start = $startD;
                $evento->end = $endD;
                $evento->rrule= $resultado;
                //$evento->rrule = "DTSTART:20230601T103000Z\nRRULE:FREQ=WEEKLY;INTERVAL=1;UNTIL=20230801;BYDAY=MO,TU,WE,TH,FR,SA";
                $evento->id_sitio = $request->id_sitio;
                
                $evento->save();
                $reserva->save();

                $message = 'Tu reserva se ha guardado exitosamente .Aqui tienes los detalles de tu plan de reserva<br>'
                . 'Dia Inicio del plan : (' . $request->fecha_ingreso. '), <br>'
                . 'Dia Fin del plan : (' . $fechaSalida . '), <br>'
                . 'Hora Ingreso Diario: (' . $request->hora_ingreso . '), <br>'
                . 'Hora Salida Diaria: (' . $request->hora_salida . ')';
                
                return redirect('/administrador/reserva/calendario/'.$idsitio)->with('messageTicket', $message);
            }else{
                return redirect('/administrador/reserva/calendario/'.$idsitio)->with('msjdelete', 'Ya existe una reserva en la fecha y hora indicada.');
            }
        }
    }

    public function storeMesSabatico(Request $request)
    {
        $ciCliente = $request -> ciCliente;
        $cliente = Cliente::where('ci', $ciCliente)->get();

        $idsitio = $request->id_sitio;
        
        if(count($cliente) === 0){
            return redirect('/administrador/reserva/calendario/'.$idsitio)->with('msjdelete', 'No existe un cliente con id : ('.$ciCliente.')');
        }else{
            $rese = true;
            if($rese){
                $idcliente = $cliente->pluck('id');
                $idclienteNum = $idcliente->implode(" ");

                $fechaIngreso = Carbon::parse($request->fecha_ingreso);
                $fechaSalida = $fechaIngreso->addDays(30);
                $fechaSalida = $fechaSalida->format('Y-m-d');

                $idreserva  = Reserva::max('id');
                $idreserva = $idreserva+1;
                
                $reserva=new Reserva();
                $reserva->id = $idreserva;
                $reserva->fecha_ingreso = $request->fecha_ingreso;
                $reserva->fecha_salida = $fechaSalida;
                $reserva->hora_ingreso = $request->hora_ingreso;
                $reserva->hora_salida = $request->hora_salida;
                $reserva->cantidad_de_horas = 10;
                $reserva->dias= 30;
                $reserva->id_cliente = $idclienteNum;
                $reserva->id_sitio = $request->id_sitio;
            
                $startD = Carbon::parse($request->fecha_ingreso . ' ' . $request->hora_ingreso);
                $endD = Carbon::parse($fechaSalida . ' ' . $request->hora_salida);


                $idmenos  = Evento::max('id');
                $idEvento = $idmenos+1;

                $fechaIngreso2 = Carbon::parse($request->fecha_ingreso);
                $fechaNueva = $fechaIngreso2->format('Y-m-d');
                
                $dtstartf = Carbon::createFromFormat('Y-m-d', $fechaNueva)->format('Ymd');
                $until = Carbon::createFromFormat('Y-m-d', $fechaSalida)->format('Ymd');

                $resultado = 'DTSTART:'.$dtstartf.'T060000Z\nRRULE:FREQ=WEEKLY;INTERVAL=1;UNTIL='.$until.'T160000;BYDAY=SA';
                
                $evento=new Evento();
                $evento->id = $idEvento;
                $evento->title = "- 16:00 RESERVADO 10 hrs";
                $evento->description = "Ci Cliente:". $ciCliente;
                $evento->start = $startD;
                $evento->end = $endD;
                $evento->rrule= $resultado;
                //$evento->rrule = "DTSTART:20230601T103000Z\nRRULE:FREQ=WEEKLY;INTERVAL=1;UNTIL=20230801;BYDAY=MO,TU,WE,TH,FR,SA";
                $evento->id_sitio = $request->id_sitio;
                
                $evento->save();
                $reserva->save();

                $message = 'Tu reserva se ha guardado exitosamente .Aqui tienes los detalles de tu plan de reserva<br>'
                . 'Dia Inicio del plan : (' . $request->fecha_ingreso. '), <br>'
                . 'Dia Fin del plan : (' . $fechaSalida . '), <br>'
                . 'Hora Ingreso Sabados: (' . $request->hora_ingreso . '), <br>'
                . 'Hora Salida Sabados: (' . $request->hora_salida . ')';
                
                return redirect('/administrador/reserva/calendario/'.$idsitio)->with('messageTicket', $message);
            }else{
                return redirect('/administrador/reserva/calendario/'.$idsitio)->with('msjdelete', 'Ya existe una reserva en la fecha y hora indicada.');
            }
        }
    }

    public function hayEventos($dataTimeFecha, $dataTimeFechaSalida, $idSitio)
    {
        $eventos = Evento::where('start', '<=', $dataTimeFecha)
                        ->where('start', '<=', $dataTimeFechaSalida)
                        ->where('end', '>=',  $dataTimeFecha)
                        ->where('end', '>=', $dataTimeFechaSalida)
                        ->where('id_sitio', $idSitio)
                        ->get();
        
        $eventos1 = Evento::where('start', '>=', $dataTimeFecha)
                        ->where('start', '<=', $dataTimeFechaSalida)
                        ->where('end', '>=',  $dataTimeFecha)
                        ->where('end', '<=', $dataTimeFechaSalida)
                        ->where('id_sitio', $idSitio)
                        ->get();

        $eventos2 = Evento::where('start', '>=', $dataTimeFecha)
                        ->where('start', '<=', $dataTimeFechaSalida)    
                        ->where('end', '>=', $dataTimeFecha)
                        ->where('end', '>=', $dataTimeFechaSalida)
                        ->where('id_sitio', $idSitio)
                        ->get();

        $eventos3 = Evento::where('start', '<=', $dataTimeFecha)
                        ->where('start', '<=', $dataTimeFechaSalida)    
                        ->where('end', '>=', $dataTimeFecha)
                        ->where('end', '<=', $dataTimeFechaSalida)
                        ->where('id_sitio', $idSitio)
                        ->get();

        if (count($eventos) != 0 || count($eventos1) != 0 || count($eventos2) != 0 || count($eventos3) != 0) {
            return true;
        } else {
            return false;
        }
    }
    //CLIENTE
    public function storeDiarioCli(Request $request)
    {
        $idCli = $request->idCli;
        $clinte = Cliente::findOrFail($idCli);

        $ciCliente = $request -> ciCliente;
        $cliente = Cliente::where('ci', $ciCliente)->get();

        $idSitio = $request->id_sitio;
        
        if(count($cliente) === 0){
            return redirect('/cliente/'.($idCli).'/reserva/calendario/'.($idSitio).'')->with(compact('clinte'))->with('msjdelete', 'No existe un cliente con id : ('.$ciCliente.')');
            //return redirect('/administrador/reserva/calendario/'.$idSitio)->with('msjdelete', 'No existe un cliente con id : ('.$ciCliente.')');
        }else{
            //Verifica si es posible reservar
                $dataTimeFecha = Carbon::parse($request->fecha_ingreso . ' ' . $request->hora_ingreso);
                
                $horaIngresoR = Carbon::parse($request->hora_ingreso);
                $horasR = $request->horas1;
                $horaNuevaR = $horaIngresoR->addHours($horasR);
                $horaFormateadaR = $horaNuevaR->format('H:i:s');
                $dataTimeFechaSalida = Carbon::parse($request->fecha_ingreso . ' ' . $horaFormateadaR);

                $hay = $this->hayEventos($dataTimeFecha, $dataTimeFechaSalida, $request->id_sitio);
            
            if($hay){
                    return redirect('/cliente/'.($idCli).'/reserva/calendario/'.($idSitio).'')->with(compact('clinte'))->with('msjdelete', 'Ya existe una reserva en la fecha y hora indicada.');
            }else{
                $idcliente = $cliente->pluck('id');
                $idclienteNum = $idcliente->implode(" ");
                
                $horaIngreso = Carbon::parse($request->hora_ingreso);
                $horas = $request->horas1;

                $horaNueva = $horaIngreso->addHours($horas);
                $horaFormateada = $horaNueva->format('H:i');

                $idreserva  = Reserva::max('id');
                $idreserva = $idreserva+1;
                
                $reserva=new Reserva();
                $reserva->id = $idreserva;
                $reserva->fecha_ingreso = $request->fecha_ingreso;
                $reserva->fecha_salida = $request->fecha_ingreso;
                $reserva->hora_ingreso = $request->hora_ingreso;
                $reserva->hora_salida = $horaFormateada;
                $reserva->cantidad_de_horas = $request->horas1;
                $reserva->dias= 1;
                $reserva->id_sitio = $request->id_sitio;
                $reserva->id_cliente = $idclienteNum;

                $startD = Carbon::parse($request->fecha_ingreso . ' ' . $request->hora_ingreso);
                $endD = Carbon::parse($request->fecha_ingreso . ' ' . $horaFormateada);

                $idmenos  = Evento::max('id');
                $idEvento = $idmenos+1;

                $pagado = 6 * $horas;
                $pagado2 = Pago::where('monto_pagado', $pagado)
                            ->whereNull('id_reserva')
                            ->get();

                if(count($pagado2)== 0){
                    return redirect('/cliente/'.($idCli).'/reserva/calendario/'.($idSitio).'')->with(compact('clinte'))->with('msjdelete', 'Realie el pago antes de Confirmar una reserva');
                }else{
                    $pagado3 = Pago::where('monto_pagado', $pagado)
                            ->whereNull('id_reserva')
                            ->first();

                    $idPago = $pagado3->id;
                    $pago = Pago::findOrFail($idPago);

                    $pago->id_reserva = $idreserva;

                    $evento=new Evento();
                    $evento->id = $idEvento;
                    $evento->title = "RESERVADO";
                    $evento->description = "Ci:". $ciCliente;
                    $evento->start = $startD;
                    $evento->end = $endD;
                    $evento->id_sitio = $request->id_sitio;
                    $evento->id_reserva = $idreserva;

                    $reserva->save();
                    $evento->save();
                    $pago->save();

                    $message = 'Tu reserva se ha guardado exitosamente <br>'
                    . 'Dia: (' . $request->fecha_ingreso . '), <br>'
                    . 'Hora Ingreso: (' . $request->hora_ingreso . '), <br>'
                    . 'Hora Salida: (' . $horaFormateada . ')';
                
                    return redirect('/cliente/'.($idCli).'/reserva/calendario/'.($idSitio).'')->with(compact('clinte'))->with('messageTicket', $message);
                }
            }
        }
    } 

    public function storeSemanaCli(Request $request)
    {
        $idCli = $request->idCli;
        $clinte = Cliente::findOrFail($idCli);

        $ciCliente = $request -> ciCliente;
        $cliente = Cliente::where('ci', $ciCliente)->get();

        $idsitio = $request->id_sitio;
        
        if(count($cliente) === 0){
            return redirect('/cliente/'.($idCli).'/reserva/calendario/'.($idsitio).'')->with(compact('clinte'))->with('msjdelete', 'No existe un cliente con id : ('.$ciCliente.')');
        }else{
            $idcliente = $cliente->pluck('id');
            $idclienteNum = $idcliente->implode(" ");
            
            $horaIngreso = Carbon::parse($request->hora_ingreso);
            $horas = $request->horas2;

            $horaNueva = $horaIngreso->addHours($horas);
            $horaFormateada = $horaNueva->format('H:i');

            $fechaIngreso = Carbon::parse($request->fecha_ingreso);
            $fechaSalida = $fechaIngreso->addDays(7);
            $fechaSalida = $fechaSalida->format('Y-m-d');

            $idreserva  = Reserva::max('id');
            $idreserva = $idreserva+1;
            
            $reserva=new Reserva();
            $reserva->id = $idreserva;
            $reserva->fecha_ingreso = $request->fecha_ingreso;
            $reserva->fecha_salida = $fechaSalida;
            $reserva->hora_ingreso = $request->hora_ingreso;
            $reserva->hora_salida = $horaFormateada;
            $reserva->cantidad_de_horas = '2';
            $reserva->cantidad_de_horas = $horas;
            $reserva->dias= 7;
            $reserva->id_cliente = $idclienteNum;
            $reserva->id_sitio = $request->id_sitio;
            
            $idmenos  = Evento::max('id');
            $idEvento = $idmenos+1;

            $pagado = 30 * $horas;
            $pagado2 = Pago::where('monto_pagado', $pagado)
                        ->whereNull('id_reserva')
                        ->get();

            if(count($pagado2)== 0){
                return redirect('/cliente/'.($idCli).'/reserva/calendario/'.($idsitio).'')->with(compact('clinte'))->with('msjdelete', 'Realie el pago antes de Confirmar una reserva');
            }else{
                $hay = true;
                    $fechaCli = $request->fecha_ingreso;
                    $horaRRCli = Carbon::parse($request->hora_ingreso);
                    $fechaCarbonCli = Carbon::createFromFormat('Y-m-d', $fechaCli);
                    $fechaHoraIngresoRCli = $fechaCarbonCli->setTimeFrom($horaRRCli);

                    $horasRCli = $request->horas2;
                    $fechaHoraSalidaDiariaCli = $fechaHoraIngresoRCli->copy()->addHours($horasRCli);

                    for ($i = 0; $i < 7; $i++) {
                        $hay = $this->hayEventos($fechaHoraIngresoRCli, $fechaHoraSalidaDiariaCli, $request->id_sitio);
                        if ($hay) {
                            break;
                        }
                        $fechaHoraIngresoRCli->addDay();
                        $fechaHoraSalidaDiariaCli->addDay();
                    }  
                if($hay == false){
                    $pagado3 = Pago::where('monto_pagado', $pagado)
                            ->whereNull('id_reserva')
                            ->first();

                    $idPago = $pagado3->id;
                    $pago = Pago::findOrFail($idPago);

                    $pago->id_reserva = $idreserva;

                    $reserva->save();
                    $pago->save();

                    $fecha = $request->fecha_ingreso;
                    $horaRR = Carbon::parse($request->hora_ingreso);
                    $fechaCarbon = Carbon::createFromFormat('Y-m-d', $fecha);
                    $fechaHoraIngresoR = $fechaCarbon->setTimeFrom($horaRR);

                    $horasR = $request->horas2;
                    $fechaHoraSalidaDiaria = $fechaHoraIngresoR->copy()->addHours($horasR);

                    for ($i = 0; $i < 7; $i++) {
                        if ($fechaHoraIngresoR->isSunday()) {
                            // La fecha es domingo
                            // No se hace nada
                        } else {
                            // La fecha no es domingo
                            $evento = new Evento(); 
                            $evento->id = $idEvento;
                            $evento->title = "RESERVADO";
                            $evento->description = "Ci: " . $ciCliente;
                            $evento->start = $fechaHoraIngresoR->copy(); 
                            $evento->end = $fechaHoraSalidaDiaria->copy(); 
                            $evento->id_sitio = $request->id_sitio;
                            $evento->id_reserva = $idreserva;
                            $evento->save();
                        }
                        $fechaHoraIngresoR->addDay();
                        $fechaHoraSalidaDiaria->addDay();
                        $idEvento++;
                    }             

                    $message = 'Tu reserva se ha guardado exitosamente .Aqui tienes los detalles de tu plan de reserva<br>'
                    . 'Dia Inicio del plan : (' . $request->fecha_ingreso. '), <br>'
                    . 'Dia Fin del plan : (' . $fechaSalida . '), <br>'
                    . 'Hora Ingreso Diario: (' . $request->hora_ingreso . '), <br>'
                    . 'Hora Salida Diaria: (' . $horaFormateada . ')';
                
                    return redirect('/cliente/'.($idCli).'/reserva/calendario/'.($idsitio).'')->with(compact('clinte'))->with('messageTicket', $message);
                }else{
                    return redirect('/cliente/'.($idCli).'/reserva/calendario/'.($idsitio).'')->with(compact('clinte'))->with('msjdelete', 'Ya existe una reserva en la fecha y hora indicada.');
                }
            }
        }
    } 
    public function storeMesDiaCli(Request $request)
    {
        $idCli = $request->idCli;
        $clinte = Cliente::findOrFail($idCli);

        $ciCliente = $request -> ciCliente;
        $cliente = Cliente::where('ci', $ciCliente)->get();

        $idsitio = $request->id_sitio;
        
        if(count($cliente) === 0){
            return redirect('/cliente/'.($idCli).'/reserva/calendario/'.($idsitio).'')->with(compact('clinte'))->with('msjdelete', 'No existe un cliente con id : ('.$ciCliente.')');
        }else{
            $hay = true;
            //Verifica si es posible reservar
            $dataTimeFecha = Carbon::parse($request->fecha_ingreso . ' ' . $request->hora_ingreso);
                
            $horaIngresoR = Carbon::parse($request->hora_ingreso);
            $horaNuevaR = $horaIngresoR->addHours(5);
            $horaFormateadaR = $horaNuevaR->format('H:i:s');
            $dataTimeFechaSalida = Carbon::parse($request->fecha_ingreso . ' ' . $horaFormateadaR);

            for ($i = 0; $i < 30; $i++) {
                $hay = $this->hayEventos($dataTimeFecha, $dataTimeFechaSalida, $request->id_sitio);
                if ($hay) {
                    break;
                }
                $dataTimeFecha->addDay();
                $dataTimeFechaSalida->addDay();
            }  
            
            if($hay == false){
                $idcliente = $cliente->pluck('id');
                $idclienteNum = $idcliente->implode(" ");

                $fechaIngreso = Carbon::parse($request->fecha_ingreso);
                $fechaSalida = $fechaIngreso->addDays(30);
                $fechaSalida = $fechaSalida->format('Y-m-d');

                $idreserva  = Reserva::max('id');
                $idreserva = $idreserva+1;
                
                $reserva=new Reserva();
                $reserva->id = $idreserva;
                $reserva->fecha_ingreso = $request->fecha_ingreso;
                $reserva->fecha_salida = $fechaSalida;
                $reserva->hora_ingreso = $request->hora_ingreso;
                $reserva->hora_salida = $request->hora_salida;
                $reserva->cantidad_de_horas = 5;
                $reserva->dias= 30;
                $reserva->id_cliente = $idclienteNum;
                $reserva->id_sitio = $request->id_sitio;
            
                $startD = Carbon::parse($request->fecha_ingreso . ' ' . $request->hora_ingreso);
                $endD = Carbon::parse($fechaSalida . ' ' . $request->hora_salida);


                $idmenos  = Evento::max('id');
                $idEvento = $idmenos+1;

                $pagado = 570;
                $pagado2 = Pago::where('monto_pagado', $pagado)
                                ->whereNull('id_reserva')
                                ->get();
                if(count($pagado2)== 0){
                    return redirect('/cliente/'.($idCli).'/reserva/calendario/'.($idsitio).'')->with(compact('clinte'))->with('msjdelete', 'Realie el pago antes de Confirmar una reserva');
                }else{
                    $pagado3 = Pago::where('monto_pagado', $pagado)
                            ->whereNull('id_reserva')
                            ->first();

                    $idPago = $pagado3->id;
                    $pago = Pago::findOrFail($idPago);

                    $pago->id_reserva = $idreserva;  
                    
                    $reserva->save();
                    $pago->save();

                    $fecha = $request->fecha_ingreso;
                    $horaRR = Carbon::parse($request->hora_ingreso);
                    $fechaCarbon = Carbon::createFromFormat('Y-m-d', $fecha);
                    $fechaHoraIngresoR = $fechaCarbon->setTimeFrom($horaRR);

                    $fechaHoraSalidaDiaria = $fechaHoraIngresoR->copy()->addHours(5);

                    for ($i = 0; $i < 30; $i++) {
                        if ($fechaHoraIngresoR->isSunday() || $fechaHoraIngresoR->isSaturday()) {
                            // La fecha es domingo
                            // No se hace nada
                        } else {
                            // La fecha no es domingo
                            $evento = new Evento(); 
                            $evento->id = $idEvento;
                            $evento->title = "RESERVADO";
                            $evento->description = "Ci: " . $ciCliente;
                            $evento->start = $fechaHoraIngresoR->copy(); 
                            $evento->end = $fechaHoraSalidaDiaria->copy(); 
                            $evento->id_sitio = $request->id_sitio;
                            $evento->id_reserva = $idreserva;
                            $evento->save();
                        }
                        $fechaHoraIngresoR->addDay();
                        $fechaHoraSalidaDiaria->addDay();
                        $idEvento++;
                    }

                    $message = 'Tu reserva se ha guardado exitosamente .Aqui tienes los detalles de tu plan de reserva<br>'
                    . 'Dia Inicio del plan : (' . $request->fecha_ingreso. '), <br>'
                    . 'Dia Fin del plan : (' . $fechaSalida . '), <br>'
                    . 'Hora Ingreso Diario: (' . $request->hora_ingreso . '), <br>'
                    . 'Hora Salida Diaria: (' . $request->hora_salida . ')';
                    //.$dataTimeFecha. '<br>'
                    //.$fechaHoraIngresoRCli1.'<br>'
                    //.$fechaHoraSalidaDiariaCli1.'<br>';
                    
                    return redirect('/cliente/'.($idCli).'/reserva/calendario/'.($idsitio).'')->with(compact('clinte'))->with('messageTicket', $message);
                }
            }else{
                return redirect('/cliente/'.($idCli).'/reserva/calendario/'.($idsitio).'')->with(compact('clinte'))->with('msjdelete', 'Ya existe una reserva en la fecha y hora indicada.');
            }
        }
    }
    public function storeMesTardeCli(Request $request)
    {
        $idCli = $request->idCli;
        $clinte = Cliente::findOrFail($idCli);

        $ciCliente = $request -> ciCliente;
        $cliente = Cliente::where('ci', $ciCliente)->get();

        $idsitio = $request->id_sitio;
        
        if(count($cliente) === 0){
            return redirect('/cliente/'.($idCli).'/reserva/calendario/'.($idsitio).'')->with(compact('clinte'))->with('msjdelete', 'No existe un cliente con id : ('.$ciCliente.')');
        }else{
            $hay = true;
            //Verifica si es posible reservar
            $dataTimeFecha = Carbon::parse($request->fecha_ingreso . ' ' . $request->hora_ingreso);
                
            $horaIngresoR = Carbon::parse($request->hora_ingreso);
            $horaNuevaR = $horaIngresoR->addHours(6);
            $horaFormateadaR = $horaNuevaR->format('H:i:s');
            $dataTimeFechaSalida = Carbon::parse($request->fecha_ingreso . ' ' . $horaFormateadaR);

            for ($i = 0; $i < 30; $i++) {
                $hay = $this->hayEventos($dataTimeFecha, $dataTimeFechaSalida, $request->id_sitio);
                if ($hay) {
                    break;
                }
                $dataTimeFecha->addDay();
                $dataTimeFechaSalida->addDay();
            }  
            
            if($hay == false){
                $idcliente = $cliente->pluck('id');
                $idclienteNum = $idcliente->implode(" ");

                $fechaIngreso = Carbon::parse($request->fecha_ingreso);
                $fechaSalida = $fechaIngreso->addDays(30);
                $fechaSalida = $fechaSalida->format('Y-m-d');

                $idreserva  = Reserva::max('id');
                $idreserva = $idreserva+1;
                
                $reserva=new Reserva();
                $reserva->id = $idreserva;
                $reserva->fecha_ingreso = $request->fecha_ingreso;
                $reserva->fecha_salida = $fechaSalida;
                $reserva->hora_ingreso = $request->hora_ingreso;
                $reserva->hora_salida = $request->hora_salida;
                $reserva->cantidad_de_horas = 6;
                $reserva->dias= 30;
                $reserva->id_cliente = $idclienteNum;
                $reserva->id_sitio = $request->id_sitio;
            
                $startD = Carbon::parse($request->fecha_ingreso . ' ' . $request->hora_ingreso);
                $endD = Carbon::parse($fechaSalida . ' ' . $request->hora_salida);

                $idmenos  = Evento::max('id');
                $idEvento = $idmenos+1;
                
                $pagado = 680;
                $pagado2 = Pago::where('monto_pagado', $pagado)
                                ->whereNull('id_reserva')
                                ->get();
                if(count($pagado2)== 0){
                    return redirect('/cliente/'.($idCli).'/reserva/calendario/'.($idsitio).'')->with(compact('clinte'))->with('msjdelete', 'Realie el pago antes de Confirmar una reserva');
                }else{
                    $pagado3 = Pago::where('monto_pagado', $pagado)
                            ->whereNull('id_reserva')
                            ->first();

                    $idPago = $pagado3->id;
                    $pago = Pago::findOrFail($idPago);

                    $pago->id_reserva = $idreserva;                               
                
                    $reserva->save();
                    $pago->save();

                    $fecha = $request->fecha_ingreso;
                    $horaRR = Carbon::parse($request->hora_ingreso);
                    $fechaCarbon = Carbon::createFromFormat('Y-m-d', $fecha);
                    $fechaHoraIngresoR = $fechaCarbon->setTimeFrom($horaRR);

                    $fechaHoraSalidaDiaria = $fechaHoraIngresoR->copy()->addHours(6);

                    for ($i = 0; $i < 30; $i++) {
                        if ($fechaHoraIngresoR->isSunday() || $fechaHoraIngresoR->isSaturday()) {
                            // La fecha es domingo
                            // No se hace nada
                        } else {
                            // La fecha no es domingo
                            $evento = new Evento(); 
                            $evento->id = $idEvento;
                            $evento->title = "RESERVADO";
                            $evento->description = "Ci: " . $ciCliente;
                            $evento->start = $fechaHoraIngresoR->copy(); 
                            $evento->end = $fechaHoraSalidaDiaria->copy(); 
                            $evento->id_sitio = $request->id_sitio;
                            $evento->id_reserva = $idreserva;
                            $evento->save();
                        }
                        $fechaHoraIngresoR->addDay();
                        $fechaHoraSalidaDiaria->addDay();
                        $idEvento++;
                    }

                    $message = 'Tu reserva se ha guardado exitosamente .Aqui tienes los detalles de tu plan de reserva<br>'
                    . 'Dia Inicio del plan : (' . $request->fecha_ingreso. '), <br>'
                    . 'Dia Fin del plan : (' . $fechaSalida . '), <br>'
                    . 'Hora Ingreso Diario: (' . $request->hora_ingreso . '), <br>'
                    . 'Hora Salida Diaria: (' . $request->hora_salida . ')';
                    
                    return redirect('/cliente/'.($idCli).'/reserva/calendario/'.($idsitio).'')->with(compact('clinte'))->with('messageTicket', $message);
                }
            }else{
                return redirect('/cliente/'.($idCli).'/reserva/calendario/'.($idsitio).'')->with(compact('clinte'))->with('msjdelete', 'Ya existe una reserva en la fecha y hora indicada.');
            }
        }
    }

    public function storeMesNocheCli(Request $request)
    {
        $idCli = $request->idCli;
        $clinte = Cliente::findOrFail($idCli);

        $ciCliente = $request -> ciCliente;
        $cliente = Cliente::where('ci', $ciCliente)->get();

        $idsitio = $request->id_sitio;
        
        if(count($cliente) === 0){
            return redirect('/cliente/'.($idCli).'/reserva/calendario/'.($idsitio).'')->with(compact('clinte'))->with('msjdelete', 'No existe un cliente con id : ('.$ciCliente.')');
        }else{
            $hay = true;
            //Verifica si es posible reservar
            $dataTimeFecha = Carbon::parse($request->fecha_ingreso . ' ' . $request->hora_ingreso);
                
            $horaIngresoR = Carbon::parse($request->hora_ingreso);
            $horaNuevaR = $horaIngresoR->addHours(5);
            $horaFormateadaR = $horaNuevaR->format('H:i:s');
            $dataTimeFechaSalida = Carbon::parse($request->fecha_ingreso . ' ' . $horaFormateadaR);

            for ($i = 0; $i < 30; $i++) {
                $hay = $this->hayEventos($dataTimeFecha, $dataTimeFechaSalida, $request->id_sitio);
                if ($hay) {
                    break;
                }
                $dataTimeFecha->addDay();
                $dataTimeFechaSalida->addDay();
            }  
            
            if($hay == false){
                $idcliente = $cliente->pluck('id');
                $idclienteNum = $idcliente->implode(" ");

                $fechaIngreso = Carbon::parse($request->fecha_ingreso);
                $fechaSalida = $fechaIngreso->addDays(30);
                $fechaSalida = $fechaSalida->format('Y-m-d');

                $idreserva  = Reserva::max('id');
                $idreserva = $idreserva+1;
                
                $reserva=new Reserva();
                $reserva->id = $idreserva;
                $reserva->fecha_ingreso = $request->fecha_ingreso;
                $reserva->fecha_salida = $fechaSalida;
                $reserva->hora_ingreso = $request->hora_ingreso;
                $reserva->hora_salida = $request->hora_salida;
                $reserva->cantidad_de_horas = 5;
                $reserva->dias= 30;
                $reserva->id_cliente = $idclienteNum;
                $reserva->id_sitio = $request->id_sitio;
            
                $startD = Carbon::parse($request->fecha_ingreso . ' ' . $request->hora_ingreso);
                $endD = Carbon::parse($fechaSalida . ' ' . $request->hora_salida);


                $idmenos  = Evento::max('id');
                $idEvento = $idmenos+1;
                
                $pagado = 570;
                $pagado2 = Pago::where('monto_pagado', $pagado)
                                ->whereNull('id_reserva')
                                ->get();
                if(count($pagado2)== 0){
                    return redirect('/cliente/'.($idCli).'/reserva/calendario/'.($idsitio).'')->with(compact('clinte'))->with('msjdelete', 'Realie el pago antes de Confirmar una reserva');
                }else{
                    $pagado3 = Pago::where('monto_pagado', $pagado)
                            ->whereNull('id_reserva')
                            ->first();

                    $idPago = $pagado3->id;
                    $pago = Pago::findOrFail($idPago);

                    $pago->id_reserva = $idreserva;                               
                
                    $reserva->save();
                    $pago->save();

                    $fecha = $request->fecha_ingreso;
                    $horaRR = Carbon::parse($request->hora_ingreso);
                    $fechaCarbon = Carbon::createFromFormat('Y-m-d', $fecha);
                    $fechaHoraIngresoR = $fechaCarbon->setTimeFrom($horaRR);

                    $fechaHoraSalidaDiaria = $fechaHoraIngresoR->copy()->addHours(5);

                    for ($i = 0; $i < 30; $i++) {
                        if ($fechaHoraIngresoR->isSunday() || $fechaHoraIngresoR->isSaturday()) {
                            // La fecha es domingo
                            // No se hace nada
                        } else {
                            // La fecha no es domingo
                            $evento = new Evento(); 
                            $evento->id = $idEvento;
                            $evento->title = "RESERVADO";
                            $evento->description = "Ci: " . $ciCliente;
                            $evento->start = $fechaHoraIngresoR->copy(); 
                            $evento->end = $fechaHoraSalidaDiaria->copy(); 
                            $evento->id_sitio = $request->id_sitio;
                            $evento->id_reserva = $idreserva;
                            $evento->save();
                        }
                        $fechaHoraIngresoR->addDay();
                        $fechaHoraSalidaDiaria->addDay();
                        $idEvento++;
                    }

                    $message = 'Tu reserva se ha guardado exitosamente .Aqui tienes los detalles de tu plan de reserva<br>'
                    . 'Dia Inicio del plan : (' . $request->fecha_ingreso. '), <br>'
                    . 'Dia Fin del plan : (' . $fechaSalida . '), <br>'
                    . 'Hora Ingreso Diario: (' . $request->hora_ingreso . '), <br>'
                    . 'Hora Salida Diaria: (' . $request->hora_salida . ')';
                    
                    return redirect('/cliente/'.($idCli).'/reserva/calendario/'.($idsitio).'')->with(compact('clinte'))->with('messageTicket', $message);
                }
            }else{
                return redirect('/cliente/'.($idCli).'/reserva/calendario/'.($idsitio).'')->with(compact('clinte'))->with('msjdelete', 'Ya existe una reserva en la fecha y hora indicada.');
            }
        }
    }
    public function storeMesNocCli(Request $request)
    {
        $idCli = $request->idCli;
        $clinte = Cliente::findOrFail($idCli);
        $ciCliente = $request -> ciCliente;
        $cliente = Cliente::where('ci', $ciCliente)->get();

        $idsitio = $request->id_sitio;
        
        if(count($cliente) === 0){
            return redirect('/cliente/'.($idCli).'/reserva/calendario/'.($idsitio).'')->with(compact('clinte'))->with('msjdelete', 'No existe un cliente con id : ('.$ciCliente.')');
        }else{
            $hay = true;
            //Verifica si es posible reservar
            $dataTimeFecha = Carbon::parse($request->fecha_ingreso . ' ' . $request->hora_ingreso);
                
            $horaIngresoR = Carbon::parse($request->hora_ingreso);
            $horaNuevaR = $horaIngresoR->addHours(8);
            $horaFormateadaR = $horaNuevaR->format('H:i:s');
            $dataTimeFechaSalida = Carbon::parse($request->fecha_ingreso . ' ' . $horaFormateadaR);

            for ($i = 0; $i < 30; $i++) {
                $hay = $this->hayEventos($dataTimeFecha, $dataTimeFechaSalida, $request->id_sitio);
                if ($hay) {
                    break;
                }
                $dataTimeFecha->addDay();
                $dataTimeFechaSalida->addDay();
            }  
            
            if($hay == false){
                $idcliente = $cliente->pluck('id');
                $idclienteNum = $idcliente->implode(" ");

                $fechaIngreso = Carbon::parse($request->fecha_ingreso);
                $fechaSalida = $fechaIngreso->addDays(30);
                $fechaSalida = $fechaSalida->format('Y-m-d');

                $idreserva  = Reserva::max('id');
                $idreserva = $idreserva+1;
                
                $reserva=new Reserva();
                $reserva->id = $idreserva;
                $reserva->fecha_ingreso = $request->fecha_ingreso;
                $reserva->fecha_salida = $fechaSalida;
                $reserva->hora_ingreso = $request->hora_ingreso;
                $reserva->hora_salida = $request->hora_salida;
                $reserva->cantidad_de_horas = 8;
                $reserva->dias= 30;
                $reserva->id_cliente = $idclienteNum;
                $reserva->id_sitio = $request->id_sitio;
            
                $startD = Carbon::parse($request->fecha_ingreso . ' ' . $request->hora_ingreso);
                $endD = Carbon::parse($fechaSalida . ' ' . $request->hora_salida);


                $idmenos  = Evento::max('id');
                $idEvento = $idmenos+1;
                
                $pagado = 900;
                $pagado2 = Pago::where('monto_pagado', $pagado)
                                ->whereNull('id_reserva')
                                ->get();
                if(count($pagado2)== 0){
                    return redirect('/cliente/'.($idCli).'/reserva/calendario/'.($idsitio).'')->with(compact('clinte'))->with('msjdelete', 'Realie el pago antes de Confirmar una reserva');
                }else{
                    $pagado3 = Pago::where('monto_pagado', $pagado)
                            ->whereNull('id_reserva')
                            ->first();

                    $idPago = $pagado3->id;
                    $pago = Pago::findOrFail($idPago);

                    $pago->id_reserva = $idreserva;                               
                
                    $reserva->save();
                    $pago->save();

                    $fecha = $request->fecha_ingreso;
                    $horaRR = Carbon::parse($request->hora_ingreso);
                    $fechaCarbon = Carbon::createFromFormat('Y-m-d', $fecha);
                    $fechaHoraIngresoR = $fechaCarbon->setTimeFrom($horaRR);

                    $fechaHoraSalidaDiaria = $fechaHoraIngresoR->copy()->addHours(8);

                    for ($i = 0; $i < 30; $i++) {
                        if ($fechaHoraIngresoR->isSunday() || $fechaHoraIngresoR->isSaturday()) {
                            // La fecha es domingo
                            // No se hace nada
                        } else {
                            // La fecha no es domingo
                            $evento = new Evento(); 
                            $evento->id = $idEvento;
                            $evento->title = "RESERVADO";
                            $evento->description = "Ci: " . $ciCliente;
                            $evento->start = $fechaHoraIngresoR->copy(); 
                            $evento->end = $fechaHoraSalidaDiaria->copy(); 
                            $evento->id_sitio = $request->id_sitio;
                            $evento->id_reserva = $idreserva;
                            $evento->save();
                        }
                        $fechaHoraIngresoR->addDay();
                        $fechaHoraSalidaDiaria->addDay();
                        $idEvento++;
                    }

                    $message = 'Tu reserva se ha guardado exitosamente .Aqui tienes los detalles de tu plan de reserva<br>'
                    . 'Dia Inicio del plan : (' . $request->fecha_ingreso. '), <br>'
                    . 'Dia Fin del plan : (' . $fechaSalida . '), <br>'
                    . 'Hora Ingreso Diario: (' . $request->hora_ingreso . '), <br>'
                    . 'Hora Salida Diaria: (' . $request->hora_salida . ')';
                    
                    return redirect('/cliente/'.($idCli).'/reserva/calendario/'.($idsitio).'')->with(compact('clinte'))->with('messageTicket', $message);
                }
            }else{
                return redirect('/cliente/'.($idCli).'/reserva/calendario/'.($idsitio).'')->with(compact('clinte'))->with('msjdelete', 'Ya existe una reserva en la fecha y hora indicada.');
            }
        }
    }

    public function storeMesCompletoCli(Request $request)
    {
        $idCli = $request->idCli;
        $clinte = Cliente::findOrFail($idCli);
        $ciCliente = $request -> ciCliente;
        $cliente = Cliente::where('ci', $ciCliente)->get();

        $idsitio = $request->id_sitio;
        
        if(count($cliente) === 0){
            return redirect('/cliente/'.($idCli).'/reserva/calendario/'.($idsitio).'')->with(compact('clinte'))->with('msjdelete', 'No existe un cliente con id : ('.$ciCliente.')');
        }else{
            $hay = true;
            //Verifica si es posible reservar
            $dataTimeFecha = Carbon::parse($request->fecha_ingreso . ' ' . $request->hora_ingreso);
                
            $horaIngresoR = Carbon::parse($request->hora_ingreso);
            $horaNuevaR = $horaIngresoR->addHours(16);
            $horaFormateadaR = $horaNuevaR->format('H:i:s');
            $dataTimeFechaSalida = Carbon::parse($request->fecha_ingreso . ' ' . $horaFormateadaR);

            for ($i = 0; $i < 30; $i++) {
                $hay = $this->hayEventos($dataTimeFecha, $dataTimeFechaSalida, $request->id_sitio);
                if ($hay) {
                    break;
                }
                $dataTimeFecha->addDay();
                $dataTimeFechaSalida->addDay();
            }  
            
            if($hay == false){
                $idcliente = $cliente->pluck('id');
                $idclienteNum = $idcliente->implode(" ");

                $fechaIngreso = Carbon::parse($request->fecha_ingreso);
                $fechaSalida = $fechaIngreso->addDays(30);
                $fechaSalida = $fechaSalida->format('Y-m-d');

                $idreserva  = Reserva::max('id');
                $idreserva = $idreserva+1;
                
                $reserva=new Reserva();
                $reserva->id = $idreserva;
                $reserva->fecha_ingreso = $request->fecha_ingreso;
                $reserva->fecha_salida = $fechaSalida;
                $reserva->hora_ingreso = $request->hora_ingreso;
                $reserva->hora_salida = $request->hora_salida;
                $reserva->cantidad_de_horas = 16;
                $reserva->dias= 30;
                $reserva->id_cliente = $idclienteNum;
                $reserva->id_sitio = $request->id_sitio;
            
                $startD = Carbon::parse($request->fecha_ingreso . ' ' . $request->hora_ingreso);
                $endD = Carbon::parse($fechaSalida . ' ' . $request->hora_salida);


                $idmenos  = Evento::max('id');
                $idEvento = $idmenos+1;
                
                $pagado = 1700;
                $pagado2 = Pago::where('monto_pagado', $pagado)
                                ->whereNull('id_reserva')
                                ->get();
                if(count($pagado2)== 0){
                    return redirect('/cliente/'.($idCli).'/reserva/calendario/'.($idsitio).'')->with(compact('clinte'))->with('msjdelete', 'Realie el pago antes de Confirmar una reserva');
                }else{
                    $pagado3 = Pago::where('monto_pagado', $pagado)
                            ->whereNull('id_reserva')
                            ->first();

                    $idPago = $pagado3->id;
                    $pago = Pago::findOrFail($idPago);

                    $pago->id_reserva = $idreserva;                               
                
                    $reserva->save();
                    $pago->save();

                    $fecha = $request->fecha_ingreso;
                    $horaRR = Carbon::parse($request->hora_ingreso);
                    $fechaCarbon = Carbon::createFromFormat('Y-m-d', $fecha);
                    $fechaHoraIngresoR = $fechaCarbon->setTimeFrom($horaRR);

                    $fechaHoraSalidaDiaria = $fechaHoraIngresoR->copy()->addHours(16);

                    for ($i = 0; $i < 30; $i++) {
                        if ($fechaHoraIngresoR->isSunday() || $fechaHoraIngresoR->isSaturday()) {
                            // La fecha es domingo
                            // No se hace nada
                        } else {
                            // La fecha no es domingo
                            $evento = new Evento(); 
                            $evento->id = $idEvento;
                            $evento->title = "RESERVADO";
                            $evento->description = "Ci: " . $ciCliente;
                            $evento->start = $fechaHoraIngresoR->copy(); 
                            $evento->end = $fechaHoraSalidaDiaria->copy(); 
                            $evento->id_sitio = $request->id_sitio;
                            $evento->id_reserva = $idreserva;
                            $evento->save();
                        }
                        $fechaHoraIngresoR->addDay();
                        $fechaHoraSalidaDiaria->addDay();
                        $idEvento++;
                    }

                    $message = 'Tu reserva se ha guardado exitosamente .Aqui tienes los detalles de tu plan de reserva<br>'
                    . 'Dia Inicio del plan : (' . $request->fecha_ingreso. '), <br>'
                    . 'Dia Fin del plan : (' . $fechaSalida . '), <br>'
                    . 'Hora Ingreso Diario: (' . $request->hora_ingreso . '), <br>'
                    . 'Hora Salida Diaria: (' . $request->hora_salida . ')';
                    
                    return redirect('/cliente/'.($idCli).'/reserva/calendario/'.($idsitio).'')->with(compact('clinte'))->with('messageTicket', $message);
                }
            }else{
                return redirect('/cliente/'.($idCli).'/reserva/calendario/'.($idsitio).'')->with(compact('clinte'))->with('msjdelete', 'Ya existe una reserva en la fecha y hora indicada.');
            }
        }
    }    

    public function storeMesNumCli(Request $request)
    {
        $idCli = $request->idCli;
        $clinte = Cliente::findOrFail($idCli);

        $ciCliente = $request -> ciCliente;
        $cliente = Cliente::where('ci', $ciCliente)->get();

        $idsitio = $request->id_sitio;
        
        if(count($cliente) === 0){
            return redirect('/cliente/'.($idCli).'/reserva/calendario/'.($idsitio).'')->with(compact('clinte'))->with('msjdelete', 'No existe un cliente con id : ('.$ciCliente.')');
        }else{
            $hay = true;
            //Verifica si es posible reservar
            $dataTimeFecha = Carbon::parse($request->fecha_ingreso . ' ' . $request->hora_ingreso);
                
            $horaIngresoR = Carbon::parse($request->hora_ingreso);
            $horaNuevaR = $horaIngresoR->addHours(24);
            $horaFormateadaR = $horaNuevaR->format('H:i:s');
            $dataTimeFechaSalida = Carbon::parse($request->fecha_ingreso . ' ' . $horaFormateadaR);

            for ($i = 0; $i < 30; $i++) {
                $hay = $this->hayEventos($dataTimeFecha, $dataTimeFechaSalida, $request->id_sitio);
                if ($hay) {
                    break;
                }
                $dataTimeFecha->addDay();
                $dataTimeFechaSalida->addDay();
            }  
            
            if($hay == false){
                $idcliente = $cliente->pluck('id');
                $idclienteNum = $idcliente->implode(" ");

                $fechaIngreso = Carbon::parse($request->fecha_ingreso);
                $fechaSalida = $fechaIngreso->addDays(30);
                $fechaSalida = $fechaSalida->format('Y-m-d');

                $idreserva  = Reserva::max('id');
                $idreserva = $idreserva+1;
                
                $reserva=new Reserva();
                $reserva->id = $idreserva;
                $reserva->fecha_ingreso = $request->fecha_ingreso;
                $reserva->fecha_salida = $fechaSalida;
                $reserva->hora_ingreso = $request->hora_ingreso;
                $reserva->hora_salida = $request->hora_salida;
                $reserva->cantidad_de_horas = 24;
                $reserva->dias= 30;
                $reserva->id_cliente = $idclienteNum;
                $reserva->id_sitio = $request->id_sitio;
            
                $startD = Carbon::parse($request->fecha_ingreso . ' ' . $request->hora_ingreso);
                $endD = Carbon::parse($fechaSalida . ' ' . $request->hora_salida);


                $idmenos  = Evento::max('id');
                $idEvento = $idmenos+1;
                
                $pagado = 2570;
                $pagado2 = Pago::where('monto_pagado', $pagado)
                                ->whereNull('id_reserva')
                                ->get();
                if(count($pagado2)== 0){
                    return redirect('/cliente/'.($idCli).'/reserva/calendario/'.($idsitio).'')->with(compact('clinte'))->with('msjdelete', 'Realie el pago antes de Confirmar una reserva');
                }else{
                    $pagado3 = Pago::where('monto_pagado', $pagado)
                            ->whereNull('id_reserva')
                            ->first();

                    $idPago = $pagado3->id;
                    $pago = Pago::findOrFail($idPago);

                    $pago->id_reserva = $idreserva;                               
                
                    $reserva->save();
                    $pago->save();

                    $fecha = $request->fecha_ingreso;
                    $horaRR = Carbon::parse($request->hora_ingreso);
                    $fechaCarbon = Carbon::createFromFormat('Y-m-d', $fecha);
                    $fechaHoraIngresoR = $fechaCarbon->setTimeFrom($horaRR);

                    $fechaHoraSalidaDiaria = $fechaHoraIngresoR->copy()->addHours(24);

                    for ($i = 0; $i < 30; $i++) {
                        if ($fechaHoraIngresoR->isSunday() || $fechaHoraIngresoR->isSaturday()) {
                            // La fecha es domingo
                            // No se hace nada
                        } else {
                            // La fecha no es domingo
                            $evento = new Evento(); 
                            $evento->id = $idEvento;
                            $evento->title = "RESERVADO";
                            $evento->description = "Ci: " . $ciCliente;
                            $evento->start = $fechaHoraIngresoR->copy(); 
                            $evento->end = $fechaHoraSalidaDiaria->copy(); 
                            $evento->id_sitio = $request->id_sitio;
                            $evento->id_reserva = $idreserva;
                            $evento->save();
                        }
                        $fechaHoraIngresoR->addDay();
                        $fechaHoraSalidaDiaria->addDay();
                        $idEvento++;
                    }

                    $message = 'Tu reserva se ha guardado exitosamente .Aqui tienes los detalles de tu plan de reserva<br>'
                    . 'Dia Inicio del plan : (' . $request->fecha_ingreso. '), <br>'
                    . 'Dia Fin del plan : (' . $fechaSalida . '), <br>'
                    . 'Hora Ingreso Diario: (' . $request->hora_ingreso . '), <br>'
                    . 'Hora Salida Diaria: (' . $request->hora_salida . ')';
                    
                    return redirect('/cliente/'.($idCli).'/reserva/calendario/'.($idsitio).'')->with(compact('clinte'))->with('messageTicket', $message);
                }
            }else{
                return redirect('/cliente/'.($idCli).'/reserva/calendario/'.($idsitio).'')->with(compact('clinte'))->with('msjdelete', 'Ya existe una reserva en la fecha y hora indicada.');
            }
        }
    }
    public function storeMesSabaticoCli(Request $request)
    {
        $idCli = $request->idCli;
        $clinte = Cliente::findOrFail($idCli);
        $ciCliente = $request -> ciCliente;
        $cliente = Cliente::where('ci', $ciCliente)->get();

        $idsitio = $request->id_sitio;
        
        if(count($cliente) === 0){
            return redirect('/cliente/'.($idCli).'/reserva/calendario/'.($idsitio).'')->with(compact('clinte'))->with('msjdelete', 'No existe un cliente con id : ('.$ciCliente.')');
        }else{
            $rese = true;
            if($rese){
                $idcliente = $cliente->pluck('id');
                $idclienteNum = $idcliente->implode(" ");

                $fechaIngreso = Carbon::parse($request->fecha_ingreso);
                $fechaSalida = $fechaIngreso->addDays(30);
                $fechaSalida = $fechaSalida->format('Y-m-d');

                $idreserva  = Reserva::max('id');
                $idreserva = $idreserva+1;
                
                $reserva=new Reserva();
                $reserva->id = $idreserva;
                $reserva->fecha_ingreso = $request->fecha_ingreso;
                $reserva->fecha_salida = $fechaSalida;
                $reserva->hora_ingreso = $request->hora_ingreso;
                $reserva->hora_salida = $request->hora_salida;
                $reserva->cantidad_de_horas = 10;
                $reserva->dias= 30;
                $reserva->id_cliente = $idclienteNum;
                $reserva->id_sitio = $request->id_sitio;
            
                $startD = Carbon::parse($request->fecha_ingreso . ' ' . $request->hora_ingreso);
                $endD = Carbon::parse($fechaSalida . ' ' . $request->hora_salida);


                $idmenos  = Evento::max('id');
                $idEvento = $idmenos+1;
                
                $pagado = 220;
                $pagado2 = Pago::where('monto_pagado', $pagado)
                                ->whereNull('id_reserva')
                                ->get();
                if(count($pagado2)== 0){
                    return redirect('/cliente/'.($idCli).'/reserva/calendario/'.($idsitio).'')->with(compact('clinte'))->with('msjdelete', 'Realie el pago antes de Confirmar una reserva');
                }else{
                    $pagado3 = Pago::where('monto_pagado', $pagado)
                            ->whereNull('id_reserva')
                            ->first();

                    $idPago = $pagado3->id;
                    $pago = Pago::findOrFail($idPago);

                    $pago->id_reserva = $idreserva;                               
                
                    $reserva->save();
                    $pago->save();

                    $fecha = $request->fecha_ingreso;
                    $horaRR = Carbon::parse($request->hora_ingreso);
                    $fechaCarbon = Carbon::createFromFormat('Y-m-d', $fecha);
                    $fechaHoraIngresoR = $fechaCarbon->setTimeFrom($horaRR);

                    $fechaHoraSalidaDiaria = $fechaHoraIngresoR->copy()->addHours(10);

                    for ($i = 0; $i < 30; $i++) {
                        if ($fechaHoraIngresoR->isSaturday()) {
                            // La fecha es sabado
                            $evento = new Evento(); 
                            $evento->id = $idEvento;
                            $evento->title = "RESERVADO";
                            $evento->description = "Ci: " . $ciCliente;
                            $evento->start = $fechaHoraIngresoR->copy(); 
                            $evento->end = $fechaHoraSalidaDiaria->copy(); 
                            $evento->id_sitio = $request->id_sitio;
                            $evento->id_reserva = $idreserva;
                            $evento->save();
                        }
                        $fechaHoraIngresoR->addDay();
                        $fechaHoraSalidaDiaria->addDay();
                        $idEvento++;
                    }

                    $message = 'Tu reserva se ha guardado exitosamente .Aqui tienes los detalles de tu plan de reserva<br>'
                    . 'Dia Inicio del plan : (' . $request->fecha_ingreso. '), <br>'
                    . 'Dia Fin del plan : (' . $fechaSalida . '), <br>'
                    . 'Hora Ingreso Sabados: (' . $request->hora_ingreso . '), <br>'
                    . 'Hora Salida Sabados: (' . $request->hora_salida . ')';
                    
                    return redirect('/cliente/'.($idCli).'/reserva/calendario/'.($idsitio).'')->with(compact('clinte'))->with('messageTicket', $message);
                }
            }else{
                return redirect('/cliente/'.($idCli).'/reserva/calendario/'.($idsitio).'')->with(compact('clinte'))->with('msjdelete', 'Ya existe una reserva en la fecha y hora indicada.');
            }
        }
    }
    //Guardia
    public function storeDiarioGu(Request $request)
    {
        $idGu = $request->idGu;
        $guard = Cliente::findOrFail($idGu);

        $ciCliente = $request -> ciCliente;
        $cliente = Cliente::where('ci', $ciCliente)->get();

        $idSitio = $request->id_sitio;
        
        if(count($cliente) === 0){
            return redirect('/guardia/'.($idGu).'/reserva/calendario/'.($idSitio).'')->with(compact('guard'))->with('msjdelete', 'No existe un cliente con id : ('.$ciCliente.')');
            //return redirect('/administrador/reserva/calendario/'.$idSitio)->with('msjdelete', 'No existe un cliente con id : ('.$ciCliente.')');
        }else{
            //Verifica si es posible reservar
            $dataTimeFecha = Carbon::parse($request->fecha_ingreso . ' ' . $request->hora_ingreso);
                
            $horaIngresoR = Carbon::parse($request->hora_ingreso);
            $horasR = $request->horas1;
            $horaNuevaR = $horaIngresoR->addHours($horasR);
            $horaFormateadaR = $horaNuevaR->format('H:i:s');
            $dataTimeFechaSalida = Carbon::parse($request->fecha_ingreso . ' ' . $horaFormateadaR);

            $hay = $this->hayEventos($dataTimeFecha, $dataTimeFechaSalida, $request->id_sitio);
        
        if($hay){
            return redirect('/guardia/'.($idGu).'/reserva/calendario/'.($idSitio).'')->with(compact('guard'))->with('msjdelete', 'Ya existe una reserva en la fecha y hora indicada.');
        }else{
                $idcliente = $cliente->pluck('id');
                $idclienteNum = $idcliente->implode(" ");
                
                $horaIngreso = Carbon::parse($request->hora_ingreso);
                $horas = $request->horas1;

                $horaNueva = $horaIngreso->addHours($horas);
                $horaFormateada = $horaNueva->format('H:i');

                $idreserva  = Reserva::max('id');
                $idreserva = $idreserva+1;
                
                $reserva=new Reserva();
                $reserva->id = $idreserva;
                $reserva->fecha_ingreso = $request->fecha_ingreso;
                $reserva->fecha_salida = $request->fecha_ingreso;
                $reserva->hora_ingreso = $request->hora_ingreso;
                $reserva->hora_salida = $horaFormateada;
                $reserva->cantidad_de_horas = '1';
                $reserva->dias= 1;
                $reserva->id_sitio = $request->id_sitio;
                $reserva->id_cliente = $idclienteNum;

                $startD = Carbon::parse($request->fecha_ingreso . ' ' . $request->hora_ingreso);
                $endD = Carbon::parse($request->fecha_ingreso . ' ' . $horaFormateada);

                $idmenos  = Evento::max('id');
                $idEvento = $idmenos+1;

                $pagado = 6 * $horas;
                $pagado2 = Pago::where('monto_pagado', $pagado)
                            ->whereNull('id_reserva')
                            ->get();

                if(count($pagado2)== 0){
                    return redirect('/guardia/'.($idGu).'/reserva/calendario/'.($idSitio).'')->with(compact('guard'))->with('msjdelete', 'Realie el pago antes de Confirmar una reserva');
                }else{
                    $pagado3 = Pago::where('monto_pagado', $pagado)
                            ->whereNull('id_reserva')
                            ->first();

                    $idPago = $pagado3->id;
                    $pago = Pago::findOrFail($idPago);

                    $pago->id_reserva = $idreserva;

                    $evento=new Evento();
                    $evento->id = $idEvento;
                    $evento->title = "RESERVADO";
                    $evento->description = "Ci:". $ciCliente;
                    $evento->start = $startD;
                    $evento->end = $endD;
                    $evento->id_sitio = $request->id_sitio;
                    $evento->id_reserva = $idreserva;

                    $reserva->save();
                    $evento->save();
                    $pago->save();

                    $message = 'Tu reserva se ha guardado exitosamente <br>'
                    . 'Dia: (' . $request->fecha_ingreso . '), <br>'
                    . 'Hora Ingreso: (' . $request->hora_ingreso . '), <br>'
                    . 'Hora Salida: (' . $horaFormateada . ')';
                
                    return redirect('/guardia/'.($idGu).'/reserva/calendario/'.($idSitio).'')->with(compact('guard'))->with('messageTicket', $message);
                }
            }
        }
    }

    public function storeSemanaGu(Request $request)
    {
        $idGu = $request->idGu;
        $guard = Cliente::findOrFail($idGu);

        $ciCliente = $request -> ciCliente;
        $cliente = Cliente::where('ci', $ciCliente)->get();

        $idsitio = $request->id_sitio;
        
        if(count($cliente) === 0){
            return redirect('/guardia/'.($idGu).'/reserva/calendario/'.($idsitio).'')->with(compact('guard'))->with('msjdelete', 'No existe un cliente con id : ('.$ciCliente.')');
        }else{
            $idcliente = $cliente->pluck('id');
            $idclienteNum = $idcliente->implode(" ");
            
            $horaIngreso = Carbon::parse($request->hora_ingreso);
            $horas = $request->horas2;

            $horaNueva = $horaIngreso->addHours($horas);
            $horaFormateada = $horaNueva->format('H:i');

            $fechaIngreso = Carbon::parse($request->fecha_ingreso);
            $fechaSalida = $fechaIngreso->addDays(7);
            $fechaSalida = $fechaSalida->format('Y-m-d');

            $idreserva  = Reserva::max('id');
            $idreserva = $idreserva+1;
            
            $reserva=new Reserva();
            $reserva->id = $idreserva;
            $reserva->fecha_ingreso = $request->fecha_ingreso;
            $reserva->fecha_salida = $fechaSalida;
            $reserva->hora_ingreso = $request->hora_ingreso;
            $reserva->hora_salida = $horaFormateada;
            $reserva->cantidad_de_horas = '2';
            $reserva->cantidad_de_horas = $horas;
            $reserva->dias= 7;
            $reserva->id_cliente = $idclienteNum;
            $reserva->id_sitio = $request->id_sitio;
            
            $startD = Carbon::parse($request->fecha_ingreso . ' ' . $request->hora_ingreso);


            $idmenos  = Evento::max('id');
            $idEvento = $idmenos+1;

            $pagado = 30 * $horas;
            $pagado2 = Pago::where('monto_pagado', $pagado)
                        ->whereNull('id_reserva')
                        ->get();

            if(count($pagado2)== 0){
                return redirect('/guardia/'.($idGu).'/reserva/calendario/'.($idsitio).'')->with(compact('guard'))->with('msjdelete', 'Realie el pago antes de Confirmar una reserva');
            }else{
                $hay = true;
                $fechaCli = $request->fecha_ingreso;
                $horaRRCli = Carbon::parse($request->hora_ingreso);
                $fechaCarbonCli = Carbon::createFromFormat('Y-m-d', $fechaCli);
                $fechaHoraIngresoRCli = $fechaCarbonCli->setTimeFrom($horaRRCli);

                $horasRCli = $request->horas2;
                $fechaHoraSalidaDiariaCli = $fechaHoraIngresoRCli->copy()->addHours($horasRCli);

                for ($i = 0; $i < 7; $i++) {
                    $hay = $this->hayEventos($fechaHoraIngresoRCli, $fechaHoraSalidaDiariaCli, $request->id_sitio);
                    if ($hay) {
                        break;
                    }
                    $fechaHoraIngresoRCli->addDay();
                    $fechaHoraSalidaDiariaCli->addDay();
                }  
                if($hay == false){
                    $pagado3 = Pago::where('monto_pagado', $pagado)
                            ->whereNull('id_reserva')
                            ->first();

                    $idPago = $pagado3->id;
                    $pago = Pago::findOrFail($idPago);

                    $pago->id_reserva = $idreserva;

                    $reserva->save();
                    $pago->save();

                    $fecha = $request->fecha_ingreso;
                    $horaRR = Carbon::parse($request->hora_ingreso);
                    $fechaCarbon = Carbon::createFromFormat('Y-m-d', $fecha);
                    $fechaHoraIngresoR = $fechaCarbon->setTimeFrom($horaRR);

                    $horasR = $request->horas2;
                    $fechaHoraSalidaDiaria = $fechaHoraIngresoR->copy()->addHours($horasR);

                    for ($i = 0; $i < 7; $i++) {
                        if ($fechaHoraIngresoR->isSunday()) {
                            // La fecha es domingo
                            // No se hace nada
                        } else {
                            // La fecha no es domingo
                            $evento = new Evento(); 
                            $evento->id = $idEvento;
                            $evento->title = "RESERVADO";
                            $evento->description = "Ci: " . $ciCliente;
                            $evento->start = $fechaHoraIngresoR->copy(); 
                            $evento->end = $fechaHoraSalidaDiaria->copy(); 
                            $evento->id_sitio = $request->id_sitio;
                            $evento->id_reserva = $idreserva;
                            $evento->save();
                        }
                        $fechaHoraIngresoR->addDay();
                            $fechaHoraSalidaDiaria->addDay();
                            $idEvento++;
                    } 

                    $message = 'Tu reserva se ha guardado exitosamente .Aqui tienes los detalles de tu plan de reserva<br>'
                    . 'Dia Inicio del plan : (' . $request->fecha_ingreso. '), <br>'
                    . 'Dia Fin del plan : (' . $fechaSalida . '), <br>'
                    . 'Hora Ingreso Diario: (' . $request->hora_ingreso . '), <br>'
                    . 'Hora Salida Diaria: (' . $horaFormateada . ')';
                
                    return redirect('/guardia/'.($idGu).'/reserva/calendario/'.($idsitio).'')->with(compact('guard'))->with('messageTicket', $message);
                }else{
                    return redirect('/guardia/'.($idGu).'/reserva/calendario/'.($idsitio).'')->with(compact('guard'))->with('msjdelete', 'Ya existe una reserva en la fecha y hora indicada.');
                }
            }
        }
    } 

    public function storeMesDiaGu(Request $request)
    {
        $idGu = $request->idGu;
        $guard = Cliente::findOrFail($idGu);

        $ciCliente = $request -> ciCliente;
        $cliente = Cliente::where('ci', $ciCliente)->get();

        $idsitio = $request->id_sitio;
        
        if(count($cliente) === 0){
            return redirect('/guardia/'.($idGu).'/reserva/calendario/'.($idsitio).'')->with(compact('guard'))->with('msjdelete', 'No existe un cliente con id : ('.$ciCliente.')');
        }else{
            $hay = true;
            //Verifica si es posible reservar
            $dataTimeFecha = Carbon::parse($request->fecha_ingreso . ' ' . $request->hora_ingreso);
                
            $horaIngresoR = Carbon::parse($request->hora_ingreso);
            $horaNuevaR = $horaIngresoR->addHours(5);
            $horaFormateadaR = $horaNuevaR->format('H:i:s');
            $dataTimeFechaSalida = Carbon::parse($request->fecha_ingreso . ' ' . $horaFormateadaR);

            for ($i = 0; $i < 30; $i++) {
                $hay = $this->hayEventos($dataTimeFecha, $dataTimeFechaSalida, $request->id_sitio);
                if ($hay) {
                    break;
                }
                $dataTimeFecha->addDay();
                $dataTimeFechaSalida->addDay();
            }  
            
            if($hay == false){
                $idcliente = $cliente->pluck('id');
                $idclienteNum = $idcliente->implode(" ");

                $fechaIngreso = Carbon::parse($request->fecha_ingreso);
                $fechaSalida = $fechaIngreso->addDays(30);
                $fechaSalida = $fechaSalida->format('Y-m-d');

                $idreserva  = Reserva::max('id');
                $idreserva = $idreserva+1;
                
                $reserva=new Reserva();
                $reserva->id = $idreserva;
                $reserva->fecha_ingreso = $request->fecha_ingreso;
                $reserva->fecha_salida = $fechaSalida;
                $reserva->hora_ingreso = $request->hora_ingreso;
                $reserva->hora_salida = $request->hora_salida;
                $reserva->cantidad_de_horas = 5;
                $reserva->dias= 30;
                $reserva->id_cliente = $idclienteNum;
                $reserva->id_sitio = $request->id_sitio;
            
                $startD = Carbon::parse($request->fecha_ingreso . ' ' . $request->hora_ingreso);
                $endD = Carbon::parse($fechaSalida . ' ' . $request->hora_salida);


                $idmenos  = Evento::max('id');
                $idEvento = $idmenos+1;

                $pagado = 570;
                $pagado2 = Pago::where('monto_pagado', $pagado)
                                ->whereNull('id_reserva')
                                ->get();
                if(count($pagado2)== 0){
                    return redirect('/guardia/'.($idGu).'/reserva/calendario/'.($idsitio).'')->with(compact('guard'))->with('msjdelete', 'Realie el pago antes de Confirmar una reserva');
                }else{
                    $pagado3 = Pago::where('monto_pagado', $pagado)
                            ->whereNull('id_reserva')
                            ->first();

                    $idPago = $pagado3->id;
                    $pago = Pago::findOrFail($idPago);

                    $pago->id_reserva = $idreserva;                               
                
                    $reserva->save();
                    $pago->save();

                    $fecha = $request->fecha_ingreso;
                    $horaRR = Carbon::parse($request->hora_ingreso);
                    $fechaCarbon = Carbon::createFromFormat('Y-m-d', $fecha);
                    $fechaHoraIngresoR = $fechaCarbon->setTimeFrom($horaRR);

                    $fechaHoraSalidaDiaria = $fechaHoraIngresoR->copy()->addHours(5);

                    for ($i = 0; $i < 30; $i++) {
                        if ($fechaHoraIngresoR->isSunday() || $fechaHoraIngresoR->isSaturday()) {
                            // La fecha es domingo
                            // No se hace nada
                        } else {
                            // La fecha no es domingo
                            $evento = new Evento(); 
                            $evento->id = $idEvento;
                            $evento->title = "RESERVADO";
                            $evento->description = "Ci: " . $ciCliente;
                            $evento->start = $fechaHoraIngresoR->copy(); 
                            $evento->end = $fechaHoraSalidaDiaria->copy(); 
                            $evento->id_sitio = $request->id_sitio;
                            $evento->id_reserva = $idreserva;
                            $evento->save();
                        }
                        $fechaHoraIngresoR->addDay();
                        $fechaHoraSalidaDiaria->addDay();
                        $idEvento++;
                    }

                    $message = 'Tu reserva se ha guardado exitosamente .Aqui tienes los detalles de tu plan de reserva<br>'
                    . 'Dia Inicio del plan : (' . $request->fecha_ingreso. '), <br>'
                    . 'Dia Fin del plan : (' . $fechaSalida . '), <br>'
                    . 'Hora Ingreso Diario: (' . $request->hora_ingreso . '), <br>'
                    . 'Hora Salida Diaria: (' . $request->hora_salida . ')';
                    
                    return redirect('/guardia/'.($idGu).'/reserva/calendario/'.($idsitio).'')->with(compact('guard'))->with('messageTicket', $message);
                }
            }else{
                return redirect('/guardia/'.($idGu).'/reserva/calendario/'.($idsitio).'')->with(compact('guard'))->with('msjdelete', 'Ya existe una reserva en la fecha y hora indicada.');
            }
        }
    }

    public function storeMesTardeGu(Request $request)
    {
        $idGu = $request->idGu;
        $guard = Cliente::findOrFail($idGu);

        $ciCliente = $request -> ciCliente;
        $cliente = Cliente::where('ci', $ciCliente)->get();

        $idsitio = $request->id_sitio;
        
        if(count($cliente) === 0){
            return redirect('/guardia/'.($idGu).'/reserva/calendario/'.($idsitio).'')->with(compact('guard'))->with('msjdelete', 'No existe un cliente con id : ('.$ciCliente.')');
        }else{
            $hay = true;
            //Verifica si es posible reservar
            $dataTimeFecha = Carbon::parse($request->fecha_ingreso . ' ' . $request->hora_ingreso);
                
            $horaIngresoR = Carbon::parse($request->hora_ingreso);
            $horaNuevaR = $horaIngresoR->addHours(6);
            $horaFormateadaR = $horaNuevaR->format('H:i:s');
            $dataTimeFechaSalida = Carbon::parse($request->fecha_ingreso . ' ' . $horaFormateadaR);

            for ($i = 0; $i < 30; $i++) {
                $hay = $this->hayEventos($dataTimeFecha, $dataTimeFechaSalida, $request->id_sitio);
                if ($hay) {
                    break;
                }
                $dataTimeFecha->addDay();
                $dataTimeFechaSalida->addDay();
            }  
            
            if($hay == false){
                $idcliente = $cliente->pluck('id');
                $idclienteNum = $idcliente->implode(" ");

                $fechaIngreso = Carbon::parse($request->fecha_ingreso);
                $fechaSalida = $fechaIngreso->addDays(30);
                $fechaSalida = $fechaSalida->format('Y-m-d');

                $idreserva  = Reserva::max('id');
                $idreserva = $idreserva+1;
                
                $reserva=new Reserva();
                $reserva->id = $idreserva;
                $reserva->fecha_ingreso = $request->fecha_ingreso;
                $reserva->fecha_salida = $fechaSalida;
                $reserva->hora_ingreso = $request->hora_ingreso;
                $reserva->hora_salida = $request->hora_salida;
                $reserva->cantidad_de_horas = 6;
                $reserva->dias= 30;
                $reserva->id_cliente = $idclienteNum;
                $reserva->id_sitio = $request->id_sitio;
            
                $startD = Carbon::parse($request->fecha_ingreso . ' ' . $request->hora_ingreso);
                $endD = Carbon::parse($fechaSalida . ' ' . $request->hora_salida);


                $idmenos  = Evento::max('id');
                $idEvento = $idmenos+1;
                
                $pagado = 680;
                $pagado2 = Pago::where('monto_pagado', $pagado)
                                ->whereNull('id_reserva')
                                ->get();
                if(count($pagado2)== 0){
                    return redirect('/guardia/'.($idGu).'/reserva/calendario/'.($idsitio).'')->with(compact('guard'))->with('msjdelete', 'Realie el pago antes de Confirmar una reserva');
                }else{
                    $pagado3 = Pago::where('monto_pagado', $pagado)
                            ->whereNull('id_reserva')
                            ->first();

                    $idPago = $pagado3->id;
                    $pago = Pago::findOrFail($idPago);

                    $pago->id_reserva = $idreserva;                               
                
                    $reserva->save();
                    $pago->save();

                    $fecha = $request->fecha_ingreso;
                    $horaRR = Carbon::parse($request->hora_ingreso);
                    $fechaCarbon = Carbon::createFromFormat('Y-m-d', $fecha);
                    $fechaHoraIngresoR = $fechaCarbon->setTimeFrom($horaRR);

                    $fechaHoraSalidaDiaria = $fechaHoraIngresoR->copy()->addHours(6);

                    for ($i = 0; $i < 30; $i++) {
                        if ($fechaHoraIngresoR->isSunday() || $fechaHoraIngresoR->isSaturday()) {
                            // La fecha es domingo
                            // No se hace nada
                        } else {
                            // La fecha no es domingo
                            $evento = new Evento(); 
                            $evento->id = $idEvento;
                            $evento->title = "RESERVADO";
                            $evento->description = "Ci: " . $ciCliente;
                            $evento->start = $fechaHoraIngresoR->copy(); 
                            $evento->end = $fechaHoraSalidaDiaria->copy(); 
                            $evento->id_sitio = $request->id_sitio;
                            $evento->id_reserva = $idreserva;
                            $evento->save();
                        }
                        $fechaHoraIngresoR->addDay();
                        $fechaHoraSalidaDiaria->addDay();
                        $idEvento++;
                    }

                    $message = 'Tu reserva se ha guardado exitosamente .Aqui tienes los detalles de tu plan de reserva<br>'
                    . 'Dia Inicio del plan : (' . $request->fecha_ingreso. '), <br>'
                    . 'Dia Fin del plan : (' . $fechaSalida . '), <br>'
                    . 'Hora Ingreso Diario: (' . $request->hora_ingreso . '), <br>'
                    . 'Hora Salida Diaria: (' . $request->hora_salida . ')';
                    
                    return redirect('/guardia/'.($idGu).'/reserva/calendario/'.($idsitio).'')->with(compact('guard'))->with('messageTicket', $message);
                }
            }else{
                return redirect('/guardia/'.($idGu).'/reserva/calendario/'.($idsitio).'')->with(compact('guard'))->with('msjdelete', 'Ya existe una reserva en la fecha y hora indicada.');
            }
        }
    }
    public function storeMesNocheGu(Request $request)
    {
        $idGu = $request->idGu;
        $guard = Cliente::findOrFail($idGu);

        $ciCliente = $request -> ciCliente;
        $cliente = Cliente::where('ci', $ciCliente)->get();

        $idsitio = $request->id_sitio;
        
        if(count($cliente) === 0){
            return redirect('/guardia/'.($idGu).'/reserva/calendario/'.($idsitio).'')->with(compact('guard'))->with('msjdelete', 'No existe un cliente con id : ('.$ciCliente.')');
        }else{
            $hay = true;
            //Verifica si es posible reservar
            $dataTimeFecha = Carbon::parse($request->fecha_ingreso . ' ' . $request->hora_ingreso);
                
            $horaIngresoR = Carbon::parse($request->hora_ingreso);
            $horaNuevaR = $horaIngresoR->addHours(5);
            $horaFormateadaR = $horaNuevaR->format('H:i:s');
            $dataTimeFechaSalida = Carbon::parse($request->fecha_ingreso . ' ' . $horaFormateadaR);

            for ($i = 0; $i < 30; $i++) {
                $hay = $this->hayEventos($dataTimeFecha, $dataTimeFechaSalida, $request->id_sitio);
                if ($hay) {
                    break;
                }
                $dataTimeFecha->addDay();
                $dataTimeFechaSalida->addDay();
            }  
            
            if($hay == false){
                $idcliente = $cliente->pluck('id');
                $idclienteNum = $idcliente->implode(" ");

                $fechaIngreso = Carbon::parse($request->fecha_ingreso);
                $fechaSalida = $fechaIngreso->addDays(30);
                $fechaSalida = $fechaSalida->format('Y-m-d');

                $idreserva  = Reserva::max('id');
                $idreserva = $idreserva+1;
                
                $reserva=new Reserva();
                $reserva->id = $idreserva;
                $reserva->fecha_ingreso = $request->fecha_ingreso;
                $reserva->fecha_salida = $fechaSalida;
                $reserva->hora_ingreso = $request->hora_ingreso;
                $reserva->hora_salida = $request->hora_salida;
                $reserva->cantidad_de_horas = 5;
                $reserva->dias= 30;
                $reserva->id_cliente = $idclienteNum;
                $reserva->id_sitio = $request->id_sitio;
            
                $startD = Carbon::parse($request->fecha_ingreso . ' ' . $request->hora_ingreso);
                $endD = Carbon::parse($fechaSalida . ' ' . $request->hora_salida);


                $idmenos  = Evento::max('id');
                $idEvento = $idmenos+1;
                
                $pagado = 570;
                $pagado2 = Pago::where('monto_pagado', $pagado)
                                ->whereNull('id_reserva')
                                ->get();
                if(count($pagado2)== 0){
                    return redirect('/guardia/'.($idGu).'/reserva/calendario/'.($idsitio).'')->with(compact('guard'))->with('msjdelete', 'Realie el pago antes de Confirmar una reserva');
                }else{
                    $pagado3 = Pago::where('monto_pagado', $pagado)
                            ->whereNull('id_reserva')
                            ->first();

                    $idPago = $pagado3->id;
                    $pago = Pago::findOrFail($idPago);

                    $pago->id_reserva = $idreserva;                               
                
                    $reserva->save();
                    $pago->save();

                    $fecha = $request->fecha_ingreso;
                    $horaRR = Carbon::parse($request->hora_ingreso);
                    $fechaCarbon = Carbon::createFromFormat('Y-m-d', $fecha);
                    $fechaHoraIngresoR = $fechaCarbon->setTimeFrom($horaRR);

                    $fechaHoraSalidaDiaria = $fechaHoraIngresoR->copy()->addHours(5);

                    for ($i = 0; $i < 30; $i++) {
                        if ($fechaHoraIngresoR->isSunday() || $fechaHoraIngresoR->isSaturday()) {
                            // La fecha es domingo
                            // No se hace nada
                        } else {
                            // La fecha no es domingo
                            $evento = new Evento(); 
                            $evento->id = $idEvento;
                            $evento->title = "RESERVADO";
                            $evento->description = "Ci: " . $ciCliente;
                            $evento->start = $fechaHoraIngresoR->copy(); 
                            $evento->end = $fechaHoraSalidaDiaria->copy(); 
                            $evento->id_sitio = $request->id_sitio;
                            $evento->id_reserva = $idreserva;
                            $evento->save();
                        }
                        $fechaHoraIngresoR->addDay();
                        $fechaHoraSalidaDiaria->addDay();
                        $idEvento++;
                    }

                    $message = 'Tu reserva se ha guardado exitosamente .Aqui tienes los detalles de tu plan de reserva<br>'
                    . 'Dia Inicio del plan : (' . $request->fecha_ingreso. '), <br>'
                    . 'Dia Fin del plan : (' . $fechaSalida . '), <br>'
                    . 'Hora Ingreso Diario: (' . $request->hora_ingreso . '), <br>'
                    . 'Hora Salida Diaria: (' . $request->hora_salida . ')';
                    
                    return redirect('/guardia/'.($idGu).'/reserva/calendario/'.($idsitio).'')->with(compact('guard'))->with('messageTicket', $message);
                }
            }else{
                return redirect('/guardia/'.($idGu).'/reserva/calendario/'.($idsitio).'')->with(compact('guard'))->with('msjdelete', 'Ya existe una reserva en la fecha y hora indicada.');
            }
        }
    }
    public function storeMesNocGu(Request $request)
    {
        $idGu = $request->idGu;
        $guard = Cliente::findOrFail($idGu);
        $ciCliente = $request -> ciCliente;
        $cliente = Cliente::where('ci', $ciCliente)->get();

        $idsitio = $request->id_sitio;
        
        if(count($cliente) === 0){
            return redirect('/guardia/'.($idGu).'/reserva/calendario/'.($idsitio).'')->with(compact('guard'))->with('msjdelete', 'No existe un cliente con id : ('.$ciCliente.')');
        }else{
            $hay = true;
            //Verifica si es posible reservar
            $dataTimeFecha = Carbon::parse($request->fecha_ingreso . ' ' . $request->hora_ingreso);
                
            $horaIngresoR = Carbon::parse($request->hora_ingreso);
            $horaNuevaR = $horaIngresoR->addHours(8);
            $horaFormateadaR = $horaNuevaR->format('H:i:s');
            $dataTimeFechaSalida = Carbon::parse($request->fecha_ingreso . ' ' . $horaFormateadaR);

            for ($i = 0; $i < 30; $i++) {
                $hay = $this->hayEventos($dataTimeFecha, $dataTimeFechaSalida, $request->id_sitio);
                if ($hay) {
                    break;
                }
                $dataTimeFecha->addDay();
                $dataTimeFechaSalida->addDay();
            }  
            
            if($hay == false){
                $idcliente = $cliente->pluck('id');
                $idclienteNum = $idcliente->implode(" ");

                $fechaIngreso = Carbon::parse($request->fecha_ingreso);
                $fechaSalida = $fechaIngreso->addDays(30);
                $fechaSalida = $fechaSalida->format('Y-m-d');

                $idreserva  = Reserva::max('id');
                $idreserva = $idreserva+1;
                
                $reserva=new Reserva();
                $reserva->id = $idreserva;
                $reserva->fecha_ingreso = $request->fecha_ingreso;
                $reserva->fecha_salida = $fechaSalida;
                $reserva->hora_ingreso = $request->hora_ingreso;
                $reserva->hora_salida = $request->hora_salida;
                $reserva->cantidad_de_horas = 8;
                $reserva->dias= 30;
                $reserva->id_cliente = $idclienteNum;
                $reserva->id_sitio = $request->id_sitio;
            
                $startD = Carbon::parse($request->fecha_ingreso . ' ' . $request->hora_ingreso);
                $endD = Carbon::parse($fechaSalida . ' ' . $request->hora_salida);


                $idmenos  = Evento::max('id');
                $idEvento = $idmenos+1;
                
                $pagado = 900;
                $pagado2 = Pago::where('monto_pagado', $pagado)
                                ->whereNull('id_reserva')
                                ->get();
                if(count($pagado2)== 0){
                    return redirect('/guardia/'.($idGu).'/reserva/calendario/'.($idsitio).'')->with(compact('guard'))->with('msjdelete', 'Realie el pago antes de Confirmar una reserva');
                }else{
                    $pagado3 = Pago::where('monto_pagado', $pagado)
                            ->whereNull('id_reserva')
                            ->first();

                    $idPago = $pagado3->id;
                    $pago = Pago::findOrFail($idPago);

                    $pago->id_reserva = $idreserva;                               
                
                    $reserva->save();
                    $pago->save();

                    $fecha = $request->fecha_ingreso;
                    $horaRR = Carbon::parse($request->hora_ingreso);
                    $fechaCarbon = Carbon::createFromFormat('Y-m-d', $fecha);
                    $fechaHoraIngresoR = $fechaCarbon->setTimeFrom($horaRR);

                    $fechaHoraSalidaDiaria = $fechaHoraIngresoR->copy()->addHours(8);

                    for ($i = 0; $i < 30; $i++) {
                        if ($fechaHoraIngresoR->isSunday() || $fechaHoraIngresoR->isSaturday()) {
                            // La fecha es domingo
                            // No se hace nada
                        } else {
                            // La fecha no es domingo
                            $evento = new Evento(); 
                            $evento->id = $idEvento;
                            $evento->title = "RESERVADO";
                            $evento->description = "Ci: " . $ciCliente;
                            $evento->start = $fechaHoraIngresoR->copy(); 
                            $evento->end = $fechaHoraSalidaDiaria->copy(); 
                            $evento->id_sitio = $request->id_sitio;
                            $evento->id_reserva = $idreserva;
                            $evento->save();
                        }
                        $fechaHoraIngresoR->addDay();
                        $fechaHoraSalidaDiaria->addDay();
                        $idEvento++;
                    }

                    $message = 'Tu reserva se ha guardado exitosamente .Aqui tienes los detalles de tu plan de reserva<br>'
                    . 'Dia Inicio del plan : (' . $request->fecha_ingreso. '), <br>'
                    . 'Dia Fin del plan : (' . $fechaSalida . '), <br>'
                    . 'Hora Ingreso Diario: (' . $request->hora_ingreso . '), <br>'
                    . 'Hora Salida Diaria: (' . $request->hora_salida . ')';
                    
                    return redirect('/guardia/'.($idGu).'/reserva/calendario/'.($idsitio).'')->with(compact('guard'))->with('messageTicket', $message);
                }
            }else{
                return redirect('/guardia/'.($idGu).'/reserva/calendario/'.($idsitio).'')->with(compact('guard'))->with('msjdelete', 'Ya existe una reserva en la fecha y hora indicada.');
            }
        }
    }
    public function storeMesCompletoGu(Request $request)
    {
        $idGu = $request->idGu;
        $guard = Cliente::findOrFail($idGu);
        $ciCliente = $request -> ciCliente;
        $cliente = Cliente::where('ci', $ciCliente)->get();

        $idsitio = $request->id_sitio;
        
        if(count($cliente) === 0){
            return redirect('/guardia/'.($idGu).'/reserva/calendario/'.($idsitio).'')->with(compact('guard'))->with('msjdelete', 'No existe un cliente con id : ('.$ciCliente.')');
        }else{
            $hay = true;
            //Verifica si es posible reservar
            $dataTimeFecha = Carbon::parse($request->fecha_ingreso . ' ' . $request->hora_ingreso);
                
            $horaIngresoR = Carbon::parse($request->hora_ingreso);
            $horaNuevaR = $horaIngresoR->addHours(16);
            $horaFormateadaR = $horaNuevaR->format('H:i:s');
            $dataTimeFechaSalida = Carbon::parse($request->fecha_ingreso . ' ' . $horaFormateadaR);

            for ($i = 0; $i < 30; $i++) {
                $hay = $this->hayEventos($dataTimeFecha, $dataTimeFechaSalida, $request->id_sitio);
                if ($hay) {
                    break;
                }
                $dataTimeFecha->addDay();
                $dataTimeFechaSalida->addDay();
            }  
            
            if($hay == false){
                $idcliente = $cliente->pluck('id');
                $idclienteNum = $idcliente->implode(" ");

                $fechaIngreso = Carbon::parse($request->fecha_ingreso);
                $fechaSalida = $fechaIngreso->addDays(30);
                $fechaSalida = $fechaSalida->format('Y-m-d');

                $idreserva  = Reserva::max('id');
                $idreserva = $idreserva+1;
                
                $reserva=new Reserva();
                $reserva->id = $idreserva;
                $reserva->fecha_ingreso = $request->fecha_ingreso;
                $reserva->fecha_salida = $fechaSalida;
                $reserva->hora_ingreso = $request->hora_ingreso;
                $reserva->hora_salida = $request->hora_salida;
                $reserva->cantidad_de_horas = 16;
                $reserva->dias= 30;
                $reserva->id_cliente = $idclienteNum;
                $reserva->id_sitio = $request->id_sitio;
            
                $startD = Carbon::parse($request->fecha_ingreso . ' ' . $request->hora_ingreso);
                $endD = Carbon::parse($fechaSalida . ' ' . $request->hora_salida);


                $idmenos  = Evento::max('id');
                $idEvento = $idmenos+1;
                
                $pagado = 1700;
                $pagado2 = Pago::where('monto_pagado', $pagado)
                                ->whereNull('id_reserva')
                                ->get();
                if(count($pagado2)== 0){
                    return redirect('/guardia/'.($idGu).'/reserva/calendario/'.($idsitio).'')->with(compact('guard'))->with('msjdelete', 'Realie el pago antes de Confirmar una reserva');
                }else{
                    $pagado3 = Pago::where('monto_pagado', $pagado)
                            ->whereNull('id_reserva')
                            ->first();

                    $idPago = $pagado3->id;
                    $pago = Pago::findOrFail($idPago);

                    $pago->id_reserva = $idreserva;                               
                
                    $reserva->save();
                    $pago->save();

                    $fecha = $request->fecha_ingreso;
                    $horaRR = Carbon::parse($request->hora_ingreso);
                    $fechaCarbon = Carbon::createFromFormat('Y-m-d', $fecha);
                    $fechaHoraIngresoR = $fechaCarbon->setTimeFrom($horaRR);

                    $fechaHoraSalidaDiaria = $fechaHoraIngresoR->copy()->addHours(16);

                    for ($i = 0; $i < 30; $i++) {
                        if ($fechaHoraIngresoR->isSunday() || $fechaHoraIngresoR->isSaturday()) {
                            // La fecha es domingo
                            // No se hace nada
                        } else {
                            // La fecha no es domingo
                            $evento = new Evento(); 
                            $evento->id = $idEvento;
                            $evento->title = "RESERVADO";
                            $evento->description = "Ci: " . $ciCliente;
                            $evento->start = $fechaHoraIngresoR->copy(); 
                            $evento->end = $fechaHoraSalidaDiaria->copy(); 
                            $evento->id_sitio = $request->id_sitio;
                            $evento->id_reserva = $idreserva;
                            $evento->save();
                        }
                        $fechaHoraIngresoR->addDay();
                        $fechaHoraSalidaDiaria->addDay();
                        $idEvento++;
                    }

                    $message = 'Tu reserva se ha guardado exitosamente .Aqui tienes los detalles de tu plan de reserva<br>'
                    . 'Dia Inicio del plan : (' . $request->fecha_ingreso. '), <br>'
                    . 'Dia Fin del plan : (' . $fechaSalida . '), <br>'
                    . 'Hora Ingreso Diario: (' . $request->hora_ingreso . '), <br>'
                    . 'Hora Salida Diaria: (' . $request->hora_salida . ')';
                    
                    return redirect('/guardia/'.($idGu).'/reserva/calendario/'.($idsitio).'')->with(compact('guard'))->with('messageTicket', $message);
                }
            }else{
                return redirect('/guardia/'.($idGu).'/reserva/calendario/'.($idsitio).'')->with(compact('guard'))->with('msjdelete', 'Ya existe una reserva en la fecha y hora indicada.');
            }
        }
    }
    public function storeMesNumGu(Request $request)
    {
        $idGu = $request->idGu;
        $guard = Cliente::findOrFail($idGu);

        $ciCliente = $request -> ciCliente;
        $cliente = Cliente::where('ci', $ciCliente)->get();

        $idsitio = $request->id_sitio;
        
        if(count($cliente) === 0){
            return redirect('/guardia/'.($idGu).'/reserva/calendario/'.($idsitio).'')->with(compact('guard'))->with('msjdelete', 'No existe un cliente con id : ('.$ciCliente.')');
        }else{
            $hay = true;
            //Verifica si es posible reservar
            $dataTimeFecha = Carbon::parse($request->fecha_ingreso . ' ' . $request->hora_ingreso);
                
            $horaIngresoR = Carbon::parse($request->hora_ingreso);
            $horaNuevaR = $horaIngresoR->addHours(24);
            $horaFormateadaR = $horaNuevaR->format('H:i:s');
            $dataTimeFechaSalida = Carbon::parse($request->fecha_ingreso . ' ' . $horaFormateadaR);

            for ($i = 0; $i < 30; $i++) {
                $hay = $this->hayEventos($dataTimeFecha, $dataTimeFechaSalida, $request->id_sitio);
                if ($hay) {
                    break;
                }
                $dataTimeFecha->addDay();
                $dataTimeFechaSalida->addDay();
            }  
            
            if($hay == false){
                $idcliente = $cliente->pluck('id');
                $idclienteNum = $idcliente->implode(" ");

                $fechaIngreso = Carbon::parse($request->fecha_ingreso);
                $fechaSalida = $fechaIngreso->addDays(30);
                $fechaSalida = $fechaSalida->format('Y-m-d');

                $idreserva  = Reserva::max('id');
                $idreserva = $idreserva+1;
                
                $reserva=new Reserva();
                $reserva->id = $idreserva;
                $reserva->fecha_ingreso = $request->fecha_ingreso;
                $reserva->fecha_salida = $fechaSalida;
                $reserva->hora_ingreso = $request->hora_ingreso;
                $reserva->hora_salida = $request->hora_salida;
                $reserva->cantidad_de_horas = 24;
                $reserva->dias= 30;
                $reserva->id_cliente = $idclienteNum;
                $reserva->id_sitio = $request->id_sitio;
            
                $startD = Carbon::parse($request->fecha_ingreso . ' ' . $request->hora_ingreso);
                $endD = Carbon::parse($fechaSalida . ' ' . $request->hora_salida);


                $idmenos  = Evento::max('id');
                $idEvento = $idmenos+1;
                
                $pagado = 2570;
                $pagado2 = Pago::where('monto_pagado', $pagado)
                                ->whereNull('id_reserva')
                                ->get();
                if(count($pagado2)== 0){
                    return redirect('/guardia/'.($idGu).'/reserva/calendario/'.($idsitio).'')->with(compact('guard'))->with('msjdelete', 'Realie el pago antes de Confirmar una reserva');
                }else{
                    $pagado3 = Pago::where('monto_pagado', $pagado)
                            ->whereNull('id_reserva')
                            ->first();

                    $idPago = $pagado3->id;
                    $pago = Pago::findOrFail($idPago);

                    $pago->id_reserva = $idreserva;                               
                
                    $reserva->save();
                    $pago->save();

                    $fecha = $request->fecha_ingreso;
                    $horaRR = Carbon::parse($request->hora_ingreso);
                    $fechaCarbon = Carbon::createFromFormat('Y-m-d', $fecha);
                    $fechaHoraIngresoR = $fechaCarbon->setTimeFrom($horaRR);

                    $fechaHoraSalidaDiaria = $fechaHoraIngresoR->copy()->addHours(24);

                    for ($i = 0; $i < 30; $i++) {
                        if ($fechaHoraIngresoR->isSunday() || $fechaHoraIngresoR->isSaturday()) {
                            // La fecha es domingo
                            // No se hace nada
                        } else {
                            // La fecha no es domingo
                            $evento = new Evento(); 
                            $evento->id = $idEvento;
                            $evento->title = "RESERVADO";
                            $evento->description = "Ci: " . $ciCliente;
                            $evento->start = $fechaHoraIngresoR->copy(); 
                            $evento->end = $fechaHoraSalidaDiaria->copy(); 
                            $evento->id_sitio = $request->id_sitio;
                            $evento->id_reserva = $idreserva;
                            $evento->save();
                        }
                        $fechaHoraIngresoR->addDay();
                        $fechaHoraSalidaDiaria->addDay();
                        $idEvento++;
                    }

                    $message = 'Tu reserva se ha guardado exitosamente .Aqui tienes los detalles de tu plan de reserva<br>'
                    . 'Dia Inicio del plan : (' . $request->fecha_ingreso. '), <br>'
                    . 'Dia Fin del plan : (' . $fechaSalida . '), <br>'
                    . 'Hora Ingreso Diario: (' . $request->hora_ingreso . '), <br>'
                    . 'Hora Salida Diaria: (' . $request->hora_salida . ')';
                    
                    return redirect('/guardia/'.($idGu).'/reserva/calendario/'.($idsitio).'')->with(compact('guard'))->with('messageTicket', $message);
                }
            }else{
                return redirect('/guardia/'.($idGu).'/reserva/calendario/'.($idsitio).'')->with(compact('guard'))->with('msjdelete', 'Ya existe una reserva en la fecha y hora indicada.');
            }
        }
    } 
    public function storeMesSabaticoGu(Request $request)
    {
        $idGu = $request->idGu;
        $guard = Cliente::findOrFail($idGu);
        $ciCliente = $request -> ciCliente;
        $cliente = Cliente::where('ci', $ciCliente)->get();

        $idsitio = $request->id_sitio;
        
        if(count($cliente) === 0){
            return redirect('/guardia/'.($idGu).'/reserva/calendario/'.($idsitio).'')->with(compact('guard'))->with('msjdelete', 'No existe un cliente con id : ('.$ciCliente.')');
        }else{
            $rese = true;
            if($rese){
                $idcliente = $cliente->pluck('id');
                $idclienteNum = $idcliente->implode(" ");

                $fechaIngreso = Carbon::parse($request->fecha_ingreso);
                $fechaSalida = $fechaIngreso->addDays(30);
                $fechaSalida = $fechaSalida->format('Y-m-d');

                $idreserva  = Reserva::max('id');
                $idreserva = $idreserva+1;
                
                $reserva=new Reserva();
                $reserva->id = $idreserva;
                $reserva->fecha_ingreso = $request->fecha_ingreso;
                $reserva->fecha_salida = $fechaSalida;
                $reserva->hora_ingreso = $request->hora_ingreso;
                $reserva->hora_salida = $request->hora_salida;
                $reserva->cantidad_de_horas = 10;
                $reserva->dias= 30;
                $reserva->id_cliente = $idclienteNum;
                $reserva->id_sitio = $request->id_sitio;
            
                $startD = Carbon::parse($request->fecha_ingreso . ' ' . $request->hora_ingreso);
                $endD = Carbon::parse($fechaSalida . ' ' . $request->hora_salida);

                //Comentario
                $idmenos  = Evento::max('id');
                $idEvento = $idmenos+1;
                
                $pagado = 220;
                $pagado2 = Pago::where('monto_pagado', $pagado)
                                ->whereNull('id_reserva')
                                ->get();
                if(count($pagado2)== 0){
                    return redirect('/guardia/'.($idGu).'/reserva/calendario/'.($idsitio).'')->with(compact('guard'))->with('msjdelete', 'Realie el pago antes de Confirmar una reserva');
                }else{
                    $pagado3 = Pago::where('monto_pagado', $pagado)
                            ->whereNull('id_reserva')
                            ->first();

                    $idPago = $pagado3->id;
                    $pago = Pago::findOrFail($idPago);

                    $pago->id_reserva = $idreserva;                               
                
                    $reserva->save();
                    $pago->save();

                    $fecha = $request->fecha_ingreso;
                    $horaRR = Carbon::parse($request->hora_ingreso);
                    $fechaCarbon = Carbon::createFromFormat('Y-m-d', $fecha);
                    $fechaHoraIngresoR = $fechaCarbon->setTimeFrom($horaRR);

                    $fechaHoraSalidaDiaria = $fechaHoraIngresoR->copy()->addHours(10);

                    for ($i = 0; $i < 30; $i++) {
                        if ($fechaHoraIngresoR->isSaturday()) {
                            $evento = new Evento(); 
                            $evento->id = $idEvento;
                            $evento->title = "RESERVADO";
                            $evento->description = "Ci: " . $ciCliente;
                            $evento->start = $fechaHoraIngresoR->copy(); 
                            $evento->end = $fechaHoraSalidaDiaria->copy(); 
                            $evento->id_sitio = $request->id_sitio;
                            $evento->id_reserva = $idreserva;
                            $evento->save();
                        }
                        $fechaHoraIngresoR->addDay();
                        $fechaHoraSalidaDiaria->addDay();
                        $idEvento++;
                    }

                    $message = 'Tu reserva se ha guardado exitosamente .Aqui tienes los detalles de tu plan de reserva<br>'
                    . 'Dia Inicio del plan : (' . $request->fecha_ingreso. '), <br>'
                    . 'Dia Fin del plan : (' . $fechaSalida . '), <br>'
                    . 'Hora Ingreso Sabados: (' . $request->hora_ingreso . '), <br>'
                    . 'Hora Salida Sabados: (' . $request->hora_salida . ')';
                    
                    return redirect('/guardia/'.($idGu).'/reserva/calendario/'.($idsitio).'')->with(compact('guard'))->with('messageTicket', $message);
                }
            }else{
                return redirect('/guardia/'.($idGu).'/reserva/calendario/'.($idsitio).'')->with(compact('guard'))->with('msjdelete', 'Ya existe una reserva en la fecha y hora indicada.');
            }
        }
    }
}