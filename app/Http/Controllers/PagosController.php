<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pagos;
use Illuminate\Support\Facades\Validator;
use \administracionparqueo;

class PagosController extends Controller
{
   
    public function PController()
    {
        return view('pagosqr.pagos');
    }

    public function ListaPagos()
    {
        return view('pagosqr.listapagos');
    }

}