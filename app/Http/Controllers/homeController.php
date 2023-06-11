<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\home;
use App\Models\Horario;
use App\Models\guardia;
use App\Models\Cliente;
use Illuminate\Support\Facades\Validator;
use \administracionparqueo;

class homeController extends Controller
{
   
    public function create()
    {
        $lista = Horario::all();
        return view('administrador.home',compact('lista'));
    }
    public function createCliente($id)
    {
         $lista = Horario::all();
        $cliente = Cliente::find($id);   
        return view('cliente.home', compact('lista','cliente'));
    }
    public function createGuardia($id)
    {
        $lista = Horario::all();
        $guardia = guardia::find($id);   
        return view('guardia.home', compact('lista','guardia'));
    }
}