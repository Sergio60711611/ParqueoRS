<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\BD;
use \administracionparqueo;

class clientesController extends Controller
{
    public function lista(){
        $lista = Cliente::all();
        return $lista;
    }
    public function createLista(){
        $lista = Cliente::all();
        return view('administrador.clientes', compact('lista'));
    }
    public function createAgregar(){
        return view('administrador.agregarCliente');
    }
    public function perfil($id){
        $cliente = Cliente::find($id);
        return view('cliente.perfil', compact('cliente'));
    }
    public function createEditar($id){
        $cliente = Cliente::find($id);
        return view('administrador.editarCliente', compact('cliente'));
    }
    public function createEditarCli($id){
        $cliente = Cliente::find($id);
        
        return view('cliente.editarPerfil', compact('cliente'));
    }
    public function createBorrar($id){
        $cliente = Cliente::find($id);
        return view('administrador.borrarCliente', compact('cliente'));
    }
    public function store(Request $request)
    {
        $ciCliente = $request->ci;
        $clientes = Cliente::where('ci', $ciCliente)->get();
        
        if(count($clientes) === 0){            
            $validation= $request->validate([

                'nombre' => 'required | min:3 | max: 30',
                'apellido' => 'required | min:3 | max: 30',
                'ci' => 'required|numeric| digits_between:6,10 ',
                'correo_electronico' => 'required |email',
                'celular' => 'required |numeric| digits:8',
                'password' => 'required|confirmed|min:6',
            ]);

            $cliente=new Cliente();
            $cliente->nombre = $request->nombre;
            $cliente->apellido = $request->apellido;
            $cliente->correo_electronico = $request->correo_electronico;
            $cliente->celular = $request->celular;
            $cliente->ci = $request->ci;
            $cliente->password = $request->password;
            
            $cliente->save();
            return redirect('/administrador/clientes')->with('message', 'Felicitaciones .! Cliente Registrado Correctamente ...');
        }else{
            return redirect('/administrador/clientes')->with('msjdelete', 'Ya existe un cliente con id : ('.$ciCliente.')');
        }
    }
    public function update(Request $request,$id)
    {
        $validation= $request->validate([

            'nombres' => 'required | min:3 | max: 30',
            'apellidos' => 'required | min:3 | max: 30',
            'ci' => 'required|numeric| digits_between:6,10 ',
            'correo' => 'required |email',
            'celular' => 'required |numeric| digits:8',
        ]);

        $cliente = Cliente::findOrFail($request->id);
        $cliente->nombre = $request->nombres;
        $cliente->apellido = $request->apellidos;
        $cliente->correo_electronico = $request->correo;
        $cliente->celular = $request->celular;
        $cliente->ci = $request->ci;
        $cliente->password = $request->password;

        $cliente->save();
        return redirect('/administrador/clientes')->with('msjupdate', 'El cliente con ci ('.$request->ci.') Fue actualizado Correctamente.');
    }
    public function updateCli(Request $request,$id)
    {
        //$clienteS = Cliente::find($id);

        $validation= $request->validate([

            'nombre' => 'required | min:3 | max: 30',
            'apellido' => 'required | min:3 | max: 30',
            'ci' => 'required|numeric| digits_between:6,10 ',
            'correo' => 'required |email',
            'celular' => 'required |numeric| digits:8',
        ]);

        $cliente = Cliente::findOrFail($id);

        $cliente->nombre = $request->nombre;
        $cliente->apellido = $request->apellido;
        $cliente->correo_electronico = $request->correo;
        $cliente->celular = $request->celular;
        $cliente->ci = $request->ci;
        $cliente->password = $request->password;


        $cliente->save();
        
        return redirect('/cliente/'.($id).'/perfil')->with(compact('cliente'))->with('msjupdate', 'Tu Perfil fue actualizado Correctamente.');
    }
    public function delete($id)
    {
        $Cliente = Cliente::destroy($id);
        return redirect('/administrador/clientes')->with('msjdelete', 'El cliente fue eliminado Correctamente.');
        //return $Cliente;
    }
}