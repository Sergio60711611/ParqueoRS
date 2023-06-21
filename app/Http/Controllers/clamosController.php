<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReclamoSugerenciaMail;
use Illuminate\Support\Facades\Session;

class clamosController extends Controller
{
    public function createReclamo($id)
    {
        $cliente = Cliente::find($id);
        return view('cliente.reclamos', compact('cliente'));
    }
    

    public function store(Request $request)
{
    $data = $request->validate([
        'mensaje' => 'required',
    ]);

    // Envía el correo electrónico
    Mail::to('radiador7springs@gmail.com')->send(new ReclamoSugerenciaMail($data));

    // Almacena el mensaje en la sesión
    Session::flash('message', 'El reclamo o sugerencia ha sido enviado correctamente.');

    return redirect()->back();
}
    
}
