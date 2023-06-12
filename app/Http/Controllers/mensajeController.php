<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use \PARQUEORS;

class mensajeController extends Controller
{
    public function index(Request $request){
        $texto = trim($request -> get('texto'));
        $clientes = DB::table('cliente') 
        -> select('id','nombre','apellido','celular','ci')
        ->where('ci','LIKE','%'.$texto.'%')
        ->orWhere('apellido','LIKE','%'.$texto.'%')
        ->orderBy('apellido','asc')
        ->paginate(3);
        return view('administrador.mensaje',compact('clientes','texto'));
    }
    public function clientes2(){
            $lista = Cliente::all();
            return view('administrador.mensaje', compact('lista'));
    }
    public function createMensaje()
    {
        return view('administrador.mensaje');
    }
}