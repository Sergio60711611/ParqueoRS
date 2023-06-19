<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingreso;
use App\Models\Vehiculo;
use App\Models\Sitio;
use App\Models\Salida;
use App\Models\Cliente;
use App\Models\Pago;
use App\Models\ingreso_no_logueados;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use \administracionparqueo;

class reportesController extends Controller
{
    public function see(){
        return view('administrador.reportegeneral');
    }
    public function reporte(){
        $result = ingreso::join('vehiculo', 'ingreso.id_vehiculo', '=', 'vehiculo.id')
        ->join('salida', 'ingreso.id', '=', 'salida.id_ingreso')
        ->select('ingreso.id', 'ingreso.fecha_hora_ingreso', 'vehiculo.placa', 'salida.fecha_hora_salida')
        ->get();
  
        return view('administrador.reporte',  compact('result'));
    }
    public function buscar(Request $request){
        $placa = $request->input('placa');
        $fechaInicio = $request->input('fecha_inicio');
        $fechaFin = $request->input('fecha_fin');
    
        $query = ingreso::join('vehiculo', 'ingreso.id_vehiculo', '=', 'vehiculo.id')
            ->join('salida', 'ingreso.id', '=', 'salida.id_ingreso')
            ->select('ingreso.id', 'ingreso.fecha_hora_ingreso', 'vehiculo.placa', 'salida.fecha_hora_salida');
    
        if (!empty($placa)) {
            $query->where('vehiculo.placa', 'like', '%' . $placa . '%');
        }
    
        if (!empty($fechaInicio) && !empty($fechaFin)) {
            $query->whereBetween('ingreso.fecha_hora_ingreso', [$fechaInicio, $fechaFin])
                  ->whereBetween('salida.fecha_hora_salida', [$fechaInicio, $fechaFin]);
        }
    
        $result = $query->get();
    
        return view('administrador.reporte', compact('result'));
    }

    public function reporte2(){
        $result = ingreso_no_logueados::join('salida_no_logueados', 'ingreso_no_logueados.id', '=', 'salida_no_logueados.id_ingreso_no_logueados')
        ->select('ingreso_no_logueados.id', 'ingreso_no_logueados.fecha_hora_ingreso', 'ingreso_no_logueados.placa', 'salida_no_logueados.fecha_hora_salida')
        ->get();
  
        return view('administrador.reportenologueado',  compact('result'));
    }
    public function buscar2(Request $request){
        $placa = $request->input('placa');
        $fechaInicio = $request->input('fecha_inicio');
        $fechaFin = $request->input('fecha_fin');
    
        $query = ingreso_no_logueados::join('salida_no_logueados', 'ingreso_no_logueados.id', '=', 'salida_no_logueados.id_ingreso_no_logueados')
        ->select('ingreso_no_logueados.id', 'ingreso_no_logueados.fecha_hora_ingreso', 'ingreso_no_logueados.placa', 'salida_no_logueados.fecha_hora_salida');
    
        if (!empty($placa)) {
            $query->where('ingreso_no_logueados.placa', 'like', '%' . $placa . '%');
        }
    
        if (!empty($fechaInicio) && !empty($fechaFin)) {
            $query->whereBetween('ingreso_no_logueados.fecha_hora_ingreso', [$fechaInicio, $fechaFin])
                  ->whereBetween('salida_no_logueados.fecha_hora_salida', [$fechaInicio, $fechaFin]);
        }
    
        $result = $query->get();
    
        return view('administrador.reportenologueado', compact('result'));
    }

    public function reporte3(){
        $lista = Cliente::all();
        return view('administrador.reportes', compact('lista'));
    }
    public function buscar3(Request $request)
{
    $cliente = $request->input('cliente');
    $fechaInicio = $request->input('fecha_inicio');
    $fechaFin = $request->input('fecha_fin');

    $query = DB::table('cliente')
        ->select('cliente.id', 'cliente.created_at', 'cliente.updated_at', 'cliente.nombre', 'cliente.apellido', 'cliente.ci','cliente.correo_electronico');

    if (!empty($cliente)) {
        $query->where('cliente.nombre', 'like', '%' . $cliente . '%')
              ->orWhere('apellido','LIKE','%'.$cliente.'%')
              ->orWhere('ci','LIKE','%'.$cliente.'%');
    }

    if (!empty($fechaInicio) && !empty($fechaFin)) {
        $query->whereBetween('cliente.created_at', [$fechaInicio, $fechaFin])
              ->whereBetween('cliente.updated_at', [$fechaInicio, $fechaFin]);
    }

    $lista = $query->get();

    return view('administrador.reportes', compact('lista'));
}

public function reporte4(){
    $result = pago::join('sitio', 'pago.id_sitio', '=', 'sitio.id')
    ->select('pago.id', 'pago.fecha_pago', 'pago.monto_pagado', 'sitio.nro_sitio')
    ->get();
    $results = ingreso_no_logueados::join('sitio', 'ingreso_no_logueados.id_sitio', '=', 'sitio.id')
    ->select('ingreso_no_logueados.id',DB::raw('DATE(ingreso_no_logueados.fecha_hora_ingreso) as fecha_ingreso'), 'ingreso_no_logueados.monto', 'sitio.nro_sitio')
    ->get(); 

    return view('administrador.reportess',  compact('result', 'results'));
}

public function buscar4(Request $request)
{
$sitio = $request->input('sitio');
$fechaInicio = $request->input('fecha_inicio');
$fechaFin = $request->input('fecha_fin');

// Buscar en la primera tabla
$query = pago::join('sitio', 'pago.id_sitio', '=', 'sitio.id')
    ->select('pago.id', 'pago.fecha_pago', 'pago.monto_pagado', 'sitio.nro_sitio');

if (!empty($sitio)) {
    $query->where('pago.id_sitio', 'like', '%' . $sitio . '%');
}

if (!empty($fechaInicio) && !empty($fechaFin)) {
    $query->whereBetween('pago.fecha_pago', [$fechaInicio, $fechaFin]);
}

$result = $query->get();

// Calcular total monto
$totalMonto = $result->sum('monto_pagado');

// Obtener resultados de la segunda tabla
$query2 = ingreso_no_logueados::join('sitio', 'ingreso_no_logueados.id_sitio', '=', 'sitio.id')
    ->select('ingreso_no_logueados.id', DB::raw('DATE(ingreso_no_logueados.fecha_hora_ingreso) as fecha_ingreso'), 'ingreso_no_logueados.monto', 'sitio.nro_sitio');

if (!empty($sitio)) {
    $query2->where('ingreso_no_logueados.id_sitio', 'like', '%' . $sitio . '%');
}

if (!empty($fechaInicio) && !empty($fechaFin)) {
    $query2->whereRaw("DATE(ingreso_no_logueados.fecha_hora_ingreso) BETWEEN ? AND ?", [$fechaInicio, $fechaFin]);

}

$results = $query2->get();

// Calcular total monto
$totalMonto2 = $results->sum('monto');

return view('administrador.reportess', compact('result', 'totalMonto', 'results', 'totalMonto2'));
}


}
