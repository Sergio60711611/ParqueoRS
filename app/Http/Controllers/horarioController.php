<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Horario;
use Illuminate\Support\Facades\Validator;
use \PARQUEORS;

class horarioController extends Controller
{
    public function lista(){
        $lista = Horario::all();
        return $lista;
    }
    public function createLista(){
        $lista = Horario::all();
        return view('administrador.horarios', compact('lista'));
    }
    public function obtenerhorario(){
        return Horario::all();
    }
    
    public function createHorario()
    {
        return view('administrador.agregarHorario');
    }
    public function createEditar($id){
        $horario = Horario::find($id);
        return view('administrador.editarHorario', compact('horario'));
    }
    public function createBorrar($id){
        $horario = Horario::find($id);
        return view('administrador.borrarHorario', compact('horario'));
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
            'dia_horario' => 'required',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
            'id_parqueo' => 'required',

        ]);

        $horario=new Horario();
        //$parqueo->cantidad_sitios = $request->cantidad_sitios;
        $horario->dia_horario = $request->dia_horario;
        $horario->hora_inicio = $request->hora_inicio;
        $horario->hora_fin = $request->hora_fin;
        $horario->id_parqueo = $request->id_parqueo;
        
        $horario->save();
    
        return redirect('/administrador/horarios');
    }

    
    public function show($id)
    {
        $horario=Horario::find($id);
        return $horario;
    }

  
    public function update(Request $request, $id)
    {
        $horario = Horario::findOrFail($request->id);
        //$parqueo->cantidad_sitios = $request->cantidad_sitios;
        $horario->dia_horario = $request->dia_horario;
        $horario->hora_inicio = $request->hora_inicio;
        $horario->hora_fin = $request->hora_fin;
        $horario->id_parqueo = $request->id_parqueo;


        $horario->save();

        return redirect('/administrador/horarios');

    }
 

    public function destroy($id)
    {
        $Horario = Horario::destroy($id);

        return redirect('/administrador/horarios');
    }
}
