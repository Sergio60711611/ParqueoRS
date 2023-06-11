<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ayuda;
use Illuminate\Support\Facades\Validator;
use \administracionparqueo;

class ayudaController extends Controller
{
   
    public function AController()
    {
        return view('ayuda');
    }

}