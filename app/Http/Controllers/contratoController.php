<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contrato;
use Illuminate\Support\Facades\Validator;
use \administracioncontrato;

class contratoController extends Controller
{
    public function obtenercontrato(){
        return Contrato::all();
    }
    
    public function create()
    {
        return view('contrato.create');
    }

   
    public function store(Request $request)
    {
       $validation= $request->validate([

            'fecha_inicio' => 'required' ,
            'fecha_fin' => 'required' ,
        ]);

        $contrato=new Contrato();
        $contrato->fecha_inicio = $request->fecha_inicio;
        $contrato->fecha_fin = $request->fecha_fin;
        
        $contrato->save();
    
        return 'Store';
    }

    
    public function show($id)
    {
        $contrato=Contrato::find($id);
        return $contrato;
    }

  
    public function update(Request $request, $id)
    {
        $contrato = Contrato::findOrFail($request->id);
        $contrato->fecha_inicio = $request->fecha_inicio;
        $contrato->fecha_fin = $request->fecha_fin;


        $contrato->save();

        return "actualizado";

    }
 

    public function destroy($id)
    {
        $Contrato = Contrato::destroy($id);

        return $Contrato;
    }
}
