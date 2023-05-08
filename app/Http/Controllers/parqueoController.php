<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parqueo;
use Illuminate\Support\Facades\Validator;
use \administracionparqueo;

class parqueoController extends Controller
{
    public function obtenerparqueo(){
        return Parqueo::all();
    }
    
    public function create()
    {
        return view('horario.register');
    }

   
    public function store(Request $request)
    {
       $validation= $request->validate([

            //'cantidad_sitios' => 'required | numeric',
            //'fecha_inicio' => 'required | date_format:Y/m/d',
            //'fecha_fin' => 'required |  date_format:Y/m/d',
            //'hora_inicio' => 'required |  date_format: H:i:s',
            //'hora_fin' => 'required  | date_format: H:i:s',

            'cantidad_sitios' => 'required | numeric',
            'fecha_inicio' => 'required' ,
            'fecha_fin' => 'required' ,
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
        ]);

        $parqueo=new Parqueo();
        $parqueo->cantidad_sitios = $request->cantidad_sitios;
        $parqueo->fecha_inicio = $request->fecha_inicio;
        $parqueo->fecha_fin = $request->fecha_fin;
        $parqueo->hora_inicio = $request->hora_inicio;
        $parqueo->hora_fin = $request->hora_fin;
        
        $parqueo->save();
    
        return 'Store';
    }

    
    public function show($id)
    {
        $parqueo=Parqueo::find($id);
        return $parqueo;
    }

  
    public function update(Request $request, $id)
    {
        $parqueo = Parqueo::findOrFail($request->id);
        $parqueo->cantidad_sitios = $request->cantidad_sitios;
        $parqueo->fecha_inicio = $request->fecha_inicio;
        $parqueo->fecha_fin = $request->fecha_fin;
        $parqueo->hora_inicio = $request->hora_inicio;
        $parqueo->hora_fin = $request->hora_fin;


        $parqueo->save();

        return "actualizado";

    }
 

    public function destroy($id)
    {
        $Parqueo = Parqueo::destroy($id);

        return $Parqueo;
    }
}

