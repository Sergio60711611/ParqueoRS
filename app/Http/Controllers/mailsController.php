<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\emails;
use Illuminate\Support\Facades\Validator;
use \administracionparqueo;

class mailsController extends Controller
{
   
    public function create()
    {
        return view('administrador.emails');
 
    }
    
    
}