<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingreso;
use App\Models\vehiculo;
use App\Models\sitio;
use App\Models\salida;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use \administracionparqueo;
use Carbon\Carbon;

class ingresoController extends Controller
{
    public function lista(){
        $lista = ingreso::all();
        return $lista;
    }
    public function createLista(){
        $lista = ingreso::all();
        return view('administrador.sitio', compact('lista'));
    }
    public function createAgregar(){
        return view('administrador.sitio');
    }
    public function createEditar($id){
        $cliente = ingreso::find($id);
        return view('administrador.sitio', compact('ingreso'));
    }
    public function tabla(){
        $ingreso =ingreso::all();//table('fecha_hora_ingreso');//->get('fecha_hora_ingreso');
        $vehiculo =vehiculo::all();//table('modelo', 'placa');//>select('modelo', 'placa');
        //$data = array ("lista_vehiculos" => $vehiculo);
        $sitio =sitio::all();//table('estado', 'nro_sitio');//->select('estado', 'nro_sitio');  
        /*$ingreso = DB::table('ingreso');
        $vehiculo = DB::table('vehiculo')
        ->SELECT ('ingreso.*', 'vehiculo.modelo')
        ->FROM ($ingreso)
        ->JOIN ($vehiculo) 
        ->ON ('ingreso.id_vehiculo', "LIKE", 'vehiculo.id');*/
        /*->WHERE ('ingreso.id')
        SELECT tabla_principal.*, tabla_foranea.dato
        FROM tabla_principal
        JOIN tabla_foranea ON tabla_principal.id_foranea = tabla_foranea.id
        WHERE tabla_principal.id = tu_id;*/
 
        //$sql = ingreso->query("SELECT * FROM ingreso i INNER JOIN vehiculo v ON i.vehiculo = v.id");
        /*$result = DB::table('vehiculo')
        ->join( 'ingreso', 'vehiculo.id', '=', 'ingreso.id_vehiculo')
        ->select('ingreso.id', 'ingreso.fecha_hora_ingreso', 'vehiculo.modelo', 'vehiculo.placa')
        ->get();*/
        $result = ingreso::join('vehiculo', 'ingreso.id', '=', 'vehiculo.id')
        ->join('sitio', 'ingreso.id', '=', 'sitio.id')
        ->select('ingreso.id', 'ingreso.fecha_hora_ingreso','vehiculo.modelo', 'vehiculo.placa', 'sitio.estado', 'sitio.nro_sitio')
        ->get();

        return view('administrador.sitio',  compact('result',  'ingreso', 'sitio'));
    }
    public function reporte(){
        //$ingreso =ingreso::all();
        /*
        $result = DB::table('vehiculo')
        ->join( 'ingreso', 'vehiculo.id', '=', 'ingreso.id_vehiculo')
        
        ->select('ingreso.id', 'ingreso.fecha_hora_ingreso', 'vehiculo.modelo', 'vehiculo.placa')
        ->join('salida', 'ingreso.id', '=', 'salida.id_ingreso')
        ->get();*/
        $result = ingreso::join('vehiculo', 'ingreso.id_vehiculo', '=', 'vehiculo.id')
        ->join('salida', 'ingreso.id', '=', 'salida.id_ingreso')
        ->select('ingreso.id', 'ingreso.fecha_hora_ingreso', 'vehiculo.placa', 'salida.fecha_hora_salida')
        ->get();
  
        return view('administrador.reporte',  compact('result'));
    }   
    
    public function store(Request $request)
    {
       $validation= $request->validate([
        $table->dateTime('fecha_hora_ingreso'),
            'fecha_hora_ingreso' => 'required' ,
            
        ]);

        $ingreso=new ingreso();
        $ingreso->fecha_hora_ingreso = $request->fecha_hora_ingreso;
        
        
        $ingreso->save();
    
        return 'Store';
    }

    
    public function show($id)
    {
        $ingreso=ingreso::find($id);
        return $ingreso;
    }

  
    public function update(Request $request, $id)
    {
        $ingreso = ingreso::findOrFail($request->id);
        $ingreso->fecha_hora_ingreso = $request->fecha_hora_ingreso;
        


        $ingreso->save();

        return "actualizado";

    }
 

    public function destroy($id)
    {
        $ingreso = ingreso::destroy($id);

        return $ingreso;
    }
}