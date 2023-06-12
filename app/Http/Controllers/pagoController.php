<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pago;
class pagoController extends Controller
{
    //
    public function tabla(){
        $pago=pago::all();
        
        return view('administrador.reportess',  compact('pago'));
    }

}
