<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use Illuminate\Support\Facades\Validator;
use \administracionparqueo;

class ocupaController extends Controller
{
    public function obtenerreserva(){
        return Reserva::all();
    }
    
    public function create()
    {
        return view('reserva.create');
    }


    public function store(Request $request)
    {
       $validation= $request->validate([

            'fecha_ingreso'=> 'date',
            'estado' => 'string',
           
            
        ]);

        $reserva=new Reserva();
        $reserva->fecha_ingreso = $request->fecha_ingreso;
        $reserva->estado = $request->estado;
        $reserva->id_cliente = $request->id_cliente;
        $reserva->id_vehiculo = $request->id_vehiculo;
        $reserva->id_sitio = $request->id_sitio;
        
        $reserva->save();
    
        return 'Store';
    }
    public function show($id)
    {
        $reserva=Reserva::find($id);
        return $reserva;
    }
    public function update(Request $request, $id)
    {
        $reserva = Reserva::findOrFail($request->id);
        $reserva->fecha_ingreso = $request->fecha_ingreso;
        $reserva->estado = $request->estado;
        $reserva->id_cliente = $request->id_cliente;
        $reserva->id_vehiculo = $request->id_vehiculo;
        $reserva->id_sitio = $request->id_sitio;

        $reserva->save();

        return "actualizado";

    }
    public function destroy($id)
    {
        $Reserva = Reserva::destroy($id);

        return $Reserva;
    }
 
}
