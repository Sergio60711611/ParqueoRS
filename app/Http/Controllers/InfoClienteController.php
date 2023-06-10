<?php

namespace App\Http\Controllers;
use App\Models\Anuncios;
use App\Models\Tarifa;
use App\Models\Horario;
use App\Models\Reserva;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\PlanMensual;
use App\Models\PreguntasFrecuentes;

class InfoClienteController extends Controller
{
    public function seeReservas($id)
    {
       $cliente = Cliente::find($id);
       $id2 = $id;
       return view('cliente.reservaInfo', compact('cliente', 'id2'));
    }
    
    public function getReservas(Request $request)
    {
        // Recuperar los anuncios según tus criterios
        $reserva = Reserva::all();

        // Devolver los datos en formato JSON
        return response()->json($reserva);
}

    public function see($id)
    {
       $cliente = Cliente::find($id);
       $id2 = $id;
       return view('cliente.infoCliente', compact('cliente', 'id2'));
    }
    public function seeConsultas($id)
    {
        $cliente = Cliente::find($id);
       $id2 = $id;
        return view('cliente.consultas', compact('cliente', 'id2'));
    }
    public function seeAnuncios($id)
    {
        $cliente = Cliente::find($id);
       $id2 = $id;
        return view('cliente.anuncios', compact('cliente', 'id2'));
    }
    public function seePreguntas($id)
    {
        $cliente = Cliente::find($id);
       $id2 = $id;
        return view('cliente.preguntasFrecuentes', compact('cliente', 'id2'));
    }
    
    public function getPreguntas(Request $request)
    {
        // Recuperar los anuncios según tus criterios
        $preguntas = PreguntasFrecuentes::all();

        // Devolver los datos en formato JSON
        return response()->json($preguntas);
}
    public function getAnuncios(Request $request)
    {
        // Recuperar los anuncios según tus criterios
        $anuncios = Anuncios::all();

        // Devolver los datos en formato JSON
        return response()->json($anuncios);
}

    public function seeHorarios($id)
{
    $cliente = Cliente::find($id);
    $id2 = $id;
    $lista1 = PlanMensual::all();
    $lista2 = Tarifa::all();
    $lista3 = Horario::all();
    return view('cliente.horarioInfo', compact('lista1', 'lista2','lista3','cliente', 'id2'));
}


    
}