<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Horarioem;
use Illuminate\Support\Facades\Validator;
use \PARQUEORS;

class horario_emergenciaController extends Controller
{
    public function obtenerhorario_emergencia(){
        return Horarioem::all();
    }
    
    public function createHorario_emergencia()
    {
        return view('administrador.agregarHorarioEmergencia');
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
            'fecha_actual' => 'required',
            'hora_apertura' => 'required',
            'hora_cierre' => 'required',
            'mensaje' => 'required',
            'id_parqueo' => 'required',
                        
        ]);

        $horario_emergencia=new Horarioem();
        
        $horario_emergencia->fecha_actual = $request->fecha_actual;
        $horario_emergencia->hora_apertura = $request->hora_apertura;
        $horario_emergencia->hora_cierre = $request->hora_cierre;
        $horario_emergencia->mensaje = $request->mensaje;
        $horario_emergencia->id_parqueo = $request->id_parqueo;
        
        $horario_emergencia->save();
    
        return redirect('/administrador/agregarHorarioEmergencia');
    }

    
    public function show($id)
    {
        $horario_emergencia=Horarioem::find($id);
        return $horario_emergencia;
    }

  
    public function update(Request $request, $id)
    {
        $horario_emergencia = Horarioem::findOrFail($request->id);
        
        $horario_emergencia->fecha_actual = $request->fecha_actual;
        $horario_emergencia->hora_apertura = $request->hora_apertura;
        $horario_emergencia->hora_cierre = $request->hora_cierre;
        $horario_emergencia->mensaje = $request->mensaje;
        $horario_emergencia->id_parqueo = $request->id_parqueo;


        $horario_emergencia->save();

        return redirect('/administrador/agregarHorarioEmergencia');

    }
 

    public function destroy($id)
    {
        $Horario_emergencia = Horarioem::destroy($id);

        return redirect('/administrador/agregarHorarioEmergencia');
    }
}

