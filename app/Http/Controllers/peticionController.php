<?php

namespace App\Http\Controllers;
use App\Models\Cliente;
use App\Models\Reserva;
use App\Models\Sitio;
use App\Models\Pago;
use Illuminate\Http\Request;
use Carbon\Carbon;

class peticionController extends Controller
{
    public function createLista(Request $request)
{
    $clientes = Cliente::query();

    // Filtrar por fechas si se proporcionan en la solicitud
    if ($request->filled('fecha_inicio') && $request->filled('fecha_fin')) {
        $fechaInicio = $request->input('fecha_inicio');
        $fechaFin = Carbon::parse($request->input('fecha_fin'))->addDay()->format('Y-m-d');

        $clientes->whereBetween('created_at', [
            $fechaInicio . ' 00:00:00',
            $fechaFin . ' 23:59:59'
        ]);
    }

    $clientes = $clientes->get();

    return view('administrador.reportes', compact('clientes'));
}
}

