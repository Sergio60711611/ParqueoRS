<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;
use Illuminate\Support\Facades\Validator;
use \administracionparqueo;

class loginController extends Controller
{
   
    public function create()
    {
        return view('inicio.login');
    }
}