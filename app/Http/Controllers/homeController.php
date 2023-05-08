<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\home;
use Illuminate\Support\Facades\Validator;
use \administracionparqueo;

class homeController extends Controller
{
   
    public function create()
    {
        return view('administrador.home');
    }
}