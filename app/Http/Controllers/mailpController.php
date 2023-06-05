<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\emailp;
use Illuminate\Support\Facades\Validator;
use \administracionparqueo;

class mailpController extends Controller
{
   
    public function create()
    {
        return view('administrador.emailp');
 
    }
    
    
}