<?php

namespace App\Http\Controllers;
use App\Models\Anuncios;
use App\Models\Tarifa;
use App\Models\Horario;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\PlanMensual;
use App\Models\PreguntasFrecuentes;

class InfoClienteController extends Controller
{
    public function see($id)
    {
        $cliente = Cliente::find($id);   
        return view('cliente.infoCliente', compact('cliente'));
    }
    public function seeConsultas()
    {
        return view('cliente.consultas');
    }
    public function seeAnuncios()
    {
        return view('cliente.anuncios');
    }
    public function seePreguntas()
    {
        return view('cliente.preguntasFrecuentes');
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

    public function seeHorarios()
{
    $lista1 = PlanMensual::all();
    $lista2 = Tarifa::all();
    $lista3 = Horario::all();
    return view('cliente.horarioInfo', compact('lista1', 'lista2','lista3'));
}


    
}