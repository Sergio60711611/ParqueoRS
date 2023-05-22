<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingreso_no_logueados;
use Illuminate\Support\Facades\Validator;
use \administracioningreso_no_logueados;

class ingreso_no_logueadosController extends Controller
{
    public function obteneringreso_no_logueados(){
        return Ingreso_no_logueados::all();
    }
    
    public function create()
    {
        return view('ingreso_no_logueado.create');
    }

   
    public function store(Request $request)
    {
       $validation= $request->validate([

            'fecha_hora_ingreso' => 'required' ,
            'nombre' => 'required' ,
            'apellido' => 'required' ,
            'ci' => 'required' ,
            'placa' => 'required' ,
            'monto' => 'required' ,
            'cantidad_horas' => 'required' ,
            'hora_salida' => 'required' ,
        ]);

        $ingreso_no_logueados=new Ingreso_no_logueados();
        $ingreso_no_logueados->fecha_hora_ingreso = $request->fecha_hora_ingreso;
        $ingreso_no_logueados->nombre = $request->nombre;
        $ingreso_no_logueados->apellido = $request->apellido;
        $ingreso_no_logueados->ci = $request->ci;
        $ingreso_no_logueados->placa = $request->placa;
        $ingreso_no_logueados->monto = $request->monto;
        $ingreso_no_logueados->cantidad_horas = $request->cantidad_horas;
        $ingreso_no_logueados->hora_salida = $request->hora_salida;
        
        $ingreso_no_logueados->save();
    
        return 'Store';
    }

    
    public function show($id)
    {
        $ingreso_no_logueados=Ingreso_no_logueados::find($id);
        return $ingreso_no_logueados;
    }

  
    public function update(Request $request, $id)
    {
        $ingreso_no_logueados = Ingreso_no_logueados::findOrFail($request->id);
        $ingreso_no_logueados->fecha_hora_ingreso = $request->fecha_hora_ingreso;
        $ingreso_no_logueados->nombre = $request->nombre;
        $ingreso_no_logueados->apellido = $request->apellido;
        $ingreso_no_logueados->ci = $request->ci;
        $ingreso_no_logueados->placa = $request->placa;
        $ingreso_no_logueados->monto = $request->monto;
        $ingreso_no_logueados->cantidad_horas = $request->cantidad_horas;
        $ingreso_no_logueados->hora_salida = $request->hora_salida;


        $ingreso_no_logueados->save();

        return "actualizado";

    }
 

    public function destroy($id)
    {
        $Ingreso_no_logueados = Ingreso_no_logueados::destroy($id);

        return $Ingreso_no_logueados;
    }
}
