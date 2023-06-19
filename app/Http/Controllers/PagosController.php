<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pago;
use App\Models\Cliente;
use App\Models\evento;
use App\Models\PlanMensual;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use \administracionparqueo;

class PagosController extends Controller
{
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
    public function verificarSePuedeReservaDiaria($fecha_ingreso, $hora_ingreso, $id_sitio, $horas1)
    {
        //Verifica si es posible reservar
        $hay = true;

        $dataTimeFecha = Carbon::parse($fecha_ingreso . ' ' . $hora_ingreso);
                
        $horaIngresoR = Carbon::parse($hora_ingreso);
        $horasR = $horas1;
        $horaNuevaR = $horaIngresoR->addHours($horasR);
        $horaFormateadaR = $horaNuevaR->format('H:i:s');
        $dataTimeFechaSalida = Carbon::parse($fecha_ingreso . ' ' . $horaFormateadaR);

        $hay = $this->hayEventos($dataTimeFecha, $dataTimeFechaSalida, $id_sitio);
    
        if($hay){
            return false;
        }else{
            return true;
        }
    }
    public function PController()
    {
        return view('pagosqr.pagos');
    }

    public function store(Request $request)
    {
        $idpago  = Pago::max('id');
        $idpago = $idpago+1;

        $now = Carbon::now(); 
        $now->format('d/m/Y');

        $hay = true;
        //if($hay == false){
        if($request->plan == 'Diario'){
            $sepuede = $this->verificarSePuedeReservaDiaria($request->fecha_ingreso, $request->hora_ingreso, $request->id_sitio, $request->horas);

            if($sepuede == true){
                $pago = new Pago();
                $pago->id = $idpago;
                $pago->fecha_pago = $now;
                $pago->monto_pagado = $request->monto_pagado;
                $pago->id_sitio = $request->id_sitio;
                
                $pago->save();
                return redirect('/administrador/pagoslista')->with('message', 'Pago Registrado. Continue con la reserva');
            }else{
                return redirect('/administrador/pagoslista')->with('msjdelete', 'No se puede realizar el pago. Ya existe una reserva en la fecha y hora indicada.');
            }
        }else{
            $pago = new Pago();
            $pago->id = $idpago;
            $pago->fecha_pago = $now;
            $pago->monto_pagado = $request->monto_pagado;
            $pago->id_sitio = $request->id_sitio;
            
            $pago->save();
            return redirect('/administrador/pagoslista')->with('message', 'Pago Registrado. Continue con la reserva');
        }
    }
    public function ListaPagos()
    {
        $lista = Pago::all();
        return view('administrador.listapagos', compact('lista'));
    }
    public function ListaPagosCli($id)
    {
        $lista = Pago::all();
        $cliente = Cliente::find($id);
        return view('cliente.pagos', compact('lista','cliente'));
    }

}