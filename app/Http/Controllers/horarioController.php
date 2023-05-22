<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Horario;
use Illuminate\Support\Facades\Validator;
use \PARQUEORS;

class horarioController extends Controller
{
    public function obtenerhorario(){
        return Horario::all();
    }
    
    public function createHorario()
    {
        return view('administrador.agregarHorario');
    }

   
    public function store(Request $request)
    {
       $validation= $request->validate([

            //'cantidad_sitios' => 'required | numeric',
            //'fecha_inicio' => 'required | date_format:Y/m/d',
            //'fecha_fin' => 'required |  date_format:Y/m/d',
            //'hora_inicio' => 'required |  date_format: H:i:s',
            //'hora_fin' => 'required  | date_format: H:i:s',

            //'cantidad_sitios' => 'required | numeric',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
            'dia' => 'required',
        ]);

        $horario=new Horario();
        //$parqueo->cantidad_sitios = $request->cantidad_sitios;
        $horario->hora_inicio = $request->hora_inicio;
        $horario->hora_fin = $request->hora_fin;
        $horario->dia = $request->dia;
        
        $horario->save();
    
        return 'Store';
    }

    
    public function show($id)
    {
        $horario=Horario::find($id);
        return $parqueo;
    }

  
    public function update(Request $request, $id)
    {
        $parqueo = Parqueo::findOrFail($request->id);
        //$parqueo->cantidad_sitios = $request->cantidad_sitios;
        $parqueo->hora_inicio = $request->hora_inicio;
        $parqueo->hora_fin = $request->hora_fin;
        $horario->dia = $request->dia;


        $parqueo->save();

        return "actualizado";

    }
 

    public function destroy($id)
    {
        $Parqueo = Parqueo::destroy($id);

        return $Parqueo;
    }
}
