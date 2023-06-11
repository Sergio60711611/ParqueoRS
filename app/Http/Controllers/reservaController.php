<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Reserva;
use App\Models\Evento;
use Illuminate\Support\Facades\Validator;
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
    public function storeDiario(Request $request)
    {
        $ciCliente = $request -> ciCliente;
        $cliente = Cliente::where('ci', $ciCliente)->get();

        $idSitio = $request->id_sitio;
        
        if(count($cliente) === 0){
            return redirect('/administrador/reserva/calendario/'.$idSitio)->with('msjdelete', 'No existe un cliente con id : ('.$ciCliente.')');
        }else{
            //Verifica si es posible reservar
            $seSuperpone = false;

            $horaIngreso1 = Carbon::parse($request->hora_ingreso);
            $horas1 = $request->horas;
            $horaNueva1 = $horaIngreso1->addHours($horas1);
            $horaNueva1 = Carbon::parse($horaNueva1);
            $horaNueva1 = $horaNueva1->format('H:i:s');

            $fi= $request->fecha_ingreso;
            $hi=$request->hora_ingreso;

            $fechaHoraIngreso = Carbon::parse($fi)->setTimeFromTimeString($hi);
            $fechaHoraSalida = Carbon::parse($fi)->setTimeFromTimeString($horaNueva1);

            $fechaInicioInicial = Carbon::parse($fechaHoraIngreso);
            $fechaFinInicial = Carbon::parse($fechaHoraSalida);

            $lista = evento::where('id_sitio', $request->id_sitio)->get();

            foreach ($lista as $reserva) {
                $fechaInicioExistente = Carbon::parse($reserva->start);
                $fechaFinExistente = Carbon::parse($reserva->end);

                if (($fechaInicioExistente->lte($fechaFinInicial) && $fechaFinExistente->gte($fechaInicioInicial)) || ($fechaInicioInicial->lte($fechaFinExistente) && $fechaFinInicial->gte($fechaInicioExistente))){
                    $seSuperpone = true;

                    break;
                }
            }
            //Fin Verifica si es posible reservar

            if($seSuperpone == False){
                return redirect('/administrador/reserva/calendario/'.$idSitio)->with('msjdelete', 'Ya existe una reserva en la fecha y hora indicada.');
            }else{
                $idcliente = $cliente->pluck('id');
                $idclienteNum = $idcliente->implode(" ");
                
                $horaIngreso = Carbon::parse($request->hora_ingreso);
                $horas = $request->horas;

                $horaNueva = $horaIngreso->addHours($horas);
                $horaFormateada = $horaNueva->format('H:i');

                $idreserva  = Reserva::max('id');
                $idreserva = $idreserva+1;
                
                $reserva=new Reserva();
                $reserva->id = $request->$idreserva;
                $reserva->fecha_ingreso = $request->fecha_ingreso;
                $reserva->fecha_salida = $request->fecha_ingreso;
                $reserva->hora_ingreso = $request->hora_ingreso;
                $reserva->hora_salida = $horaFormateada;
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

                
                $evento->save();
                $reserva->save();

                $message = 'Tu reserva se ha guardado exitosamente <br>'
                . 'Dia: (' . $request->fecha_ingreso . '), <br>'
                . 'Hora Ingreso: (' . $request->hora_ingreso . '), <br>'
                . 'Hora Salida: (' . $horaFormateada . ')';
            
                return redirect('/administrador/reserva/calendario/'.$idSitio)->with('messageTicket', $message);
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
            $horas = $request->horas;

            $horaNueva = $horaIngreso->addHours($horas);
            $horaFormateada = $horaNueva->format('H:i');

            $fechaIngreso = Carbon::parse($request->fecha_ingreso);
            $fechaSalida = $fechaIngreso->addDays(7);
            $fechaSalida = $fechaSalida->format('Y-m-d');

            $reserva=new Reserva();
            $reserva->fecha_ingreso = $request->fecha_ingreso;
            $reserva->fecha_salida = $fechaSalida;
            $reserva->hora_ingreso = $request->hora_ingreso;
            $reserva->hora_salida = $horaFormateada;
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
            //$startDe = $horaI->format('H:i:s');
            //$fechaNuevaS = $fechaSalida->format('Y-m-d');
            
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
            $rese = Reserva::where('hora_ingreso', $request->hora_ingreso)
                ->where('cantidad_de_horas', '5')
                ->where('dias', '30')
                ->where('id_sitio', $request->id_sitio)
                ->get();
            if(count($rese) == 0){
                $idcliente = $cliente->pluck('id');
                $idclienteNum = $idcliente->implode(" ");

                $fechaIngreso = Carbon::parse($request->fecha_ingreso);
                $fechaSalida = $fechaIngreso->addDays(30);
                $fechaSalida = $fechaSalida->format('Y-m-d');

                $reserva=new Reserva();
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
            $rese = Reserva::where('hora_ingreso', $request->hora_ingreso)
                ->where('cantidad_de_horas', '6')
                ->where('dias', '30')
                ->where('id_sitio', $request->id_sitio)
                ->get();
            if(count($rese) == 0){
                $idcliente = $cliente->pluck('id');
                $idclienteNum = $idcliente->implode(" ");

                $fechaIngreso = Carbon::parse($request->fecha_ingreso);
                $fechaSalida = $fechaIngreso->addDays(30);
                $fechaSalida = $fechaSalida->format('Y-m-d');

                $reserva=new Reserva();
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
            $rese = Reserva::where('hora_ingreso', $request->hora_ingreso)
                ->where('cantidad_de_horas', '5')
                ->where('dias', '30')
                ->where('id_sitio', $request->id_sitio)
                ->get();
            if(count($rese) == 0){
                $idcliente = $cliente->pluck('id');
                $idclienteNum = $idcliente->implode(" ");

                $fechaIngreso = Carbon::parse($request->fecha_ingreso);
                $fechaSalida = $fechaIngreso->addDays(30);
                $fechaSalida = $fechaSalida->format('Y-m-d');

                $reserva=new Reserva();
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
            $rese = Reserva::where('hora_ingreso', $request->hora_ingreso)
                ->where('cantidad_de_horas', '8')
                ->where('dias', '30')
                ->where('id_sitio', $request->id_sitio)
                ->get();
            if(count($rese) == 0){
                $idcliente = $cliente->pluck('id');
                $idclienteNum = $idcliente->implode(" ");

                $fechaIngreso = Carbon::parse($request->fecha_ingreso);
                $fechaSalida = $fechaIngreso->addDays(30);
                $fechaSalida = $fechaSalida->format('Y-m-d');

                $reserva=new Reserva();
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
            $rese = Reserva::where('hora_ingreso', $request->hora_ingreso)
                ->where('cantidad_de_horas', '16')
                ->where('dias', '30')
                ->where('id_sitio', $request->id_sitio)
                ->get();
            if(count($rese) == 1){
                $idcliente = $cliente->pluck('id');
                $idclienteNum = $idcliente->implode(" ");

                $fechaIngreso = Carbon::parse($request->fecha_ingreso);
                $fechaSalida = $fechaIngreso->addDays(30);
                $fechaSalida = $fechaSalida->format('Y-m-d');

                $reserva=new Reserva();
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
            $rese = Reserva::where('hora_ingreso', $request->hora_ingreso)
                ->where('cantidad_de_horas', '24')
                ->where('dias', '30')
                ->where('id_sitio', $request->id_sitio)
                ->get();
            if(count($rese) == 0){
                $idcliente = $cliente->pluck('id');
                $idclienteNum = $idcliente->implode(" ");

                $fechaIngreso = Carbon::parse($request->fecha_ingreso);
                $fechaSalida = $fechaIngreso->addDays(30);
                $fechaSalida = $fechaSalida->format('Y-m-d');

                $reserva=new Reserva();
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
            $rese = Reserva::where('hora_ingreso', $request->hora_ingreso)
                ->where('cantidad_de_horas', '10')
                ->where('dias', '30')
                ->where('id_sitio', $request->id_sitio)
                ->get();
            if(count($rese) == 0){
                $idcliente = $cliente->pluck('id');
                $idclienteNum = $idcliente->implode(" ");

                $fechaIngreso = Carbon::parse($request->fecha_ingreso);
                $fechaSalida = $fechaIngreso->addDays(30);
                $fechaSalida = $fechaSalida->format('Y-m-d');

                $reserva=new Reserva();
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
}