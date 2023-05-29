<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parqueo;
use App\Models\Vehiculo;
use App\Models\Cliente;
use App\Models\Sitio;
use App\Models\Ingreso;
use App\Models\Salida;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\BD;
use \administracionparqueo;
use DateTime;
use Carbon\Carbon;
class parqueoController extends Controller
{
    public function createLista(){
        $sitios = Sitio::all();
        return view('administrador.mapeoParqueo', compact('sitios'));
    }
    public function createAgregarIngreso(){
        
        $now = Carbon::now(); 
        $now->format('d/m/Y H:i');
        $idSitio = 0;
        $sitios = Sitio::all();
        return view('administrador.agregarIngreso', compact('now', 'idSitio', 'sitios'));
    }
    public function aumentarSitio(){
        $cantSitios  = Sitio::max('nro_sitio');
        $cantSitios = $cantSitios+1;

        $sitio=new sitio();

        $sitio->id = $cantSitios;
        $sitio->nro_sitio = $cantSitios;
        $sitio->estado = "Libre";
        $sitio->id_parqueo = 1;
        $sitio->id_cliente = 1;
        $sitio->save();

        return redirect('/administrador/mapeoParqueo');
    }
    public function quitarSitio(){
        $cantSitios  = Sitio::max('nro_sitio');

        $sitioaElim = Sitio::where('nro_sitio', $cantSitios)->get();
        $estadoSitio = $sitioaElim->pluck('estado');
        $estadoSitio = $estadoSitio->implode(" ");

        if($estadoSitio == "Libre"){
            $Sitio = Sitio::destroy($cantSitios);
            return redirect('/administrador/mapeoParqueo')->with('message', 'Sitio eliminado correctamente');
        }else if($estadoSitio == "Ocupado"){
            return redirect('/administrador/mapeoParqueo')->with('msjdelete', 'El sitio: '.$cantSitios.' se encuentra ocupado.');
        }else if($estadoSitio == "Reservado"){
            return redirect('/administrador/mapeoParqueo')->with('msjdelete', 'El sitio: '.$cantSitios.' se encuentra Reservado.');
        } 
    }

    public function storeIngreso(Request $request)
    {   
        $sitio2 = Sitio::findOrFail($request->id_sitio);
        $now = Carbon::now(); 
            $now->format('Y/m/dTH:i');
        
        if($sitio2->estado == "Libre"){
            $ingreso = new Ingreso();
            $ingreso->fecha_hora_ingreso = $now;
            $ingreso->fecha_hora_salida_estimada = $request->fecha_hora_salida_estimada;
            $ingreso->id_sitio = $request->id_sitio;
            $ingreso->save();
        }else{
            
        }
        $sitio = new Sitio();
        $sitio = Sitio::findOrFail($request->id_sitio);
        //$cantSitios = $parqueo->get('cantidad_sitios');
        $sitio ->estado = "Ocupado";
        $sitio ->save();
        return redirect('/administrador/mapeoParqueo');
    }
    public function storeSalida(Request $request)
    {   $idSitio = $request->id_sitio;
        $ingreso = Ingreso::where('id_sitio', $idSitio)->get();
        $idIngreso = $ingreso->pluck('id');
        $idIngresoNum = intval($idIngreso->first());

        $now = Carbon::now(); 
            $now->format('Y/m/dTH:i');

        $salida = new Salida();
        $salida -> fecha_hora_salida = $now;
        $salida -> id_ingreso = $idIngresoNum;
        $salida ->save();

        $sitio = new Sitio();
        $sitio = Sitio::findOrFail($request->id_sitio);
        $sitio ->estado = "Libre";
        $sitio ->save();

        $ingresodelete= Ingreso::destroy($idIngresoNum);
        return redirect('/administrador/mapeoParqueo');
    }
}


