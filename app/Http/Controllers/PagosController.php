<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pago;
use App\Models\cliente;
use App\Models\plan_mensual;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use \administracionparqueo;

class PagosController extends Controller
{
   
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

        $pago = new Pago();
        $pago->id = $idpago;
        $pago->fecha_pago = $now;
        $pago->monto_pagado = $request->monto_pagado;
        //$pago->id_reserva = 1;
        $pago->id_sitio = $request->id_sitio;
        
        $pago->save();
        return redirect('/administrador/pagoslista')->with('message', 'Pago Registrado. Continue con la reserva');
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