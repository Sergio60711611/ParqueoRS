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
    public function createListaCliente($id){
        $lista = Reserva::all();
        return view('administrador.reservaCliente', compact('lista'));
    }
    public function createListaSitio($id){
        $listaReservaSitio= Reserva::where('id_sitio', $id)->get();

        //$idClientesv = $listaReservaSitio->pluck('id_cliente');

        $listaClientes = Cliente::all();
        //$ciClientes= $listaClientes->pluck('id','ci');

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

            if($seSuperpone){
                return redirect('/administrador/reserva/calendario/'.$idSitio)->with('msjdelete', 'Ya existe una reserva en la fecha y hora indicada.');
            }else{
                $idcliente = $cliente->pluck('id');
                $idclienteNum = $idcliente->implode(" ");
                
                $horaIngreso = Carbon::parse($request->hora_ingreso);
                $horas = $request->horas;

                $horaNueva = $horaIngreso->addHours($horas);
                $horaFormateada = $horaNueva->format('H:i');

                $reserva=new Reserva();
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
            $evento->title = "RESERVADO";
            $evento->description = "Ci Cliente:". $ciCliente;
            $evento->start = $startD;
            $evento->end = $horaNueva;
            $evento->rrule= $resultado;
            //$evento->rrule = "DTSTART:20230601T103000Z\nRRULE:FREQ=WEEKLY;INTERVAL=1;UNTIL=20230801;BYDAY=MO,TU,WE,TH,FR,SA,SU";
                
            $evento->id_sitio = $request->id_sitio;

            
            $evento->save();
            $reserva->save();

            $message = 'Tu reserva se ha guardado exitosamente .Aqui tienes los detalles de tu plan de reserva<br>'
           . 'Dia Inicio del plan : (' . $fechaNueva. '), <br>'
           . 'Dia Fin del plan : (' . $fechaSalida . '), <br>'
           . 'Hora Ingreso: (' . $request->hora_ingreso . '), <br>'
           . 'Hora Salida: (' . $horaFormateada . ')';
        
            return redirect('/administrador/reserva/calendario/'.$idsitio)->with('messageTicket', $message);
        }
    } 
    public function storeMesLV(Request $request)
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
            $fechaSalida = $fechaIngreso->addDays(30);
            $fechaSalida = $fechaSalida->format('Y-m-d');

            $reserva=new Reserva();
            $reserva->fecha_ingreso = $request->fecha_ingreso;
            $reserva->fecha_salida = $fechaSalida;
            $reserva->hora_ingreso = $request->hora_ingreso;
            $reserva->hora_salida = $horaFormateada;
            $reserva->cantidad_de_horas = $horas;
            $reserva->dias= 30;
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

            $resultado = 'DTSTART:'.$dtstartf.'T'.$dtstarth.'Z\nRRULE:FREQ=WEEKLY;INTERVAL=1;UNTIL='.$until.';BYDAY=MO,TU,WE,TH,FR';
            
            $evento=new Evento();
            $evento->id = $idEvento;
            $evento->title = "RESERVADO";
            $evento->description = "Ci Cliente:". $ciCliente;
            $evento->start = $startD;
            $evento->end = $horaNueva;
            $evento->rrule= $resultado;
            //$evento->rrule = "DTSTART:20230601T103000Z\nRRULE:FREQ=WEEKLY;INTERVAL=1;UNTIL=20230801;BYDAY=MO,TU,WE,TH,FR,SA,SU";
                
            $evento->id_sitio = $request->id_sitio;

            
            $evento->save();
            $reserva->save();

            $message = 'Tu reserva se ha guardado exitosamente .Aqui tienes los detalles de tu plan de reserva<br>'
           . 'Dia Inicio del plan : (' . $fechaNueva. '), <br>'
           . 'Dia Fin del plan : (' . $fechaSalida . '), <br>'
           . 'Hora Ingreso: (' . $request->hora_ingreso . '), <br>'
           . 'Hora Salida: (' . $horaFormateada . ')';
        
            return redirect('/administrador/reserva/calendario/'.$idsitio)->with('messageTicket', $message);
        }
    } 
    public function storeMesS(Request $request)
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
            $fechaSalida = $fechaIngreso->addDays(30);
            $fechaSalida = $fechaSalida->format('Y-m-d');

            $reserva=new Reserva();
            $reserva->fecha_ingreso = $request->fecha_ingreso;
            $reserva->fecha_salida = $fechaSalida;
            $reserva->hora_ingreso = $request->hora_ingreso;
            $reserva->hora_salida = $horaFormateada;
            $reserva->cantidad_de_horas = $horas;
            $reserva->dias= 30;
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

            $resultado = 'DTSTART:'.$dtstartf.'T'.$dtstarth.'Z\nRRULE:FREQ=WEEKLY;INTERVAL=1;UNTIL='.$until.';BYDAY=SA';
            
            $evento=new Evento();
            $evento->id = $idEvento;
            $evento->title = "RESERVADO";
            $evento->description = "Ci Cliente:". $ciCliente;
            $evento->start = $startD;
            $evento->end = $horaNueva;
            $evento->rrule= $resultado;
            //$evento->rrule = "DTSTART:20230601T103000Z\nRRULE:FREQ=WEEKLY;INTERVAL=1;UNTIL=20230801;BYDAY=MO,TU,WE,TH,FR,SA,SU";
                
            $evento->id_sitio = $request->id_sitio;

            
            $evento->save();
            $reserva->save();

            $message = 'Tu reserva se ha guardado exitosamente .Aqui tienes los detalles de tu plan de reserva<br>'
           . 'Dia Inicio del plan : (' . $fechaNueva. '), <br>'
           . 'Dia Fin del plan : (' . $fechaSalida . '), <br>'
           . 'Hora Ingreso: (' . $request->hora_ingreso . '), <br>'
           . 'Hora Salida: (' . $horaFormateada . ')';
        
            return redirect('/administrador/reserva/calendario/'.$idsitio)->with('messageTicket', $message);
        }
    }
}