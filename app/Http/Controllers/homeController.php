<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\home;
use App\Models\Cliente;
use Illuminate\Support\Facades\Validator;
use \administracionparqueo;

class homeController extends Controller
{
   
    public function create()
    {
        return view('administrador.home');
    }
    public function createCliente($id)
    {
        $cliente = Cliente::find($id);   
        return view('cliente.home', compact('cliente'));
    }
}