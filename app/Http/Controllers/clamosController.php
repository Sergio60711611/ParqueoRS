<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cliente;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReclamoSugerenciaMail;

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

        return redirect()->back()->with('message', 'El reclamo o sugerencia ha sido enviado correctamente.');
    }
}
