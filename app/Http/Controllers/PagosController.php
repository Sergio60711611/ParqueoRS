<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pagos;
use App\Models\plan_mensual;
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
        //$pago=new vehiculo();
        //$pago->marca = $request->marca;
        
        //$pago->save();
        //return redirect('/administrador/vehiculos')->with('message', 'Felicitaciones .! Vehiculo Registrado Correctamente ...');
    }
    public function ListaPagos()
    {
        return view('administrador.listapagos');
    }

}