<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\guardia;
use Illuminate\Support\Facades\Validator;
use \PARQUEORS;

class guardiaController extends Controller
{
    public function obtenerguardia(){
        return Guardia::all();
    }
    
    public function createGuardia()
    {
        return view('administrador.agregarGuardia');
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
            'nombre' => 'required',
            'apellido' => 'required',
            'ci' => 'required',
            'correo_electronico' => 'required',
            'password' => 'required',
            'celular' => 'required',
            'turno' => 'required',
            'id_parqueo' => 'required',   
            //'direccion' => 'required',
            
        ]);

        $guardia=new Guardia();
        
        $guardia->nombre = $request->nombre;
        $guardia->apellido = $request->apellido;
        $guardia->ci = $request->ci;
        $guardia->correo_electronico = $request->correo_electronico;
        $guardia->password = $request->password;
        //$guardia->direccion = $request->direccion;
        $guardia->celular = $request->celular;
        $guardia->turno = $request->turno;
        $guardia->id_parqueo = $request->id_parqueo;
        
        $guardia->save();
    
        return redirect('/administrador/guardias');
    }

    
    public function show($id)
    {
        $guardia=Guardia::find($id);
        return $guardia;
    }

  
    public function update(Request $request, $id)
    {
        $guardia = Guardia::findOrFail($request->id);
        
        $guardia->nombre = $request->nombre;
        $guardia->apellido = $request->apellido;
        $guardia->ci = $request->ci;
        $guardia->correo_electronico = $request->correo_electronico;
        $guardia->password = $request->password;
        //$guardia->direccion = $request->direccion;
        $guardia->celular = $request->celular;
        $guardia->turno = $request->turno;
        $guardia->id_parqueo = $request->id_parqueo;


        $guardia->save();

        return redirect('/administrador/guardias');

    }
 

    public function destroy($id)
    {
        //$guardia=Guardia::findOrFail($id);
        //$guardia->delete();
        $guardia = Guardia::destroy($id);
        //return redirect()->route('administrador.guardias');
        return redirect('/administrador/guardias');
    }
    public function lista(){
        $lista = Guardia::all();
        return $lista;
    }

    public function createLista(){
        $lista = Guardia::all();
    return view('administrador.guardias', compact('lista'));
    }

    public function editarGuardia($id){
        $guardia = Guardia::find($id);
        return view('administrador.editarGuardia', compact('guardia'));
    }

    public function borrarGuardia($id){
        $guardia = Guardia::find($id);
        return view('administrador.borrarGuardia', compact('guardia'));
    }
}



