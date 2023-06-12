<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculo;
use App\Models\Cliente;
use App\Models\guardia;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\BD;
use \administracionparqueo;

class vehiculoController extends Controller
{       
    public function createListaGu($id){
        $listav = Vehiculo::all();
        $guardia = Guardia::find($id);
        return view('guardia.vehiculos', compact('listav', 'guardia'));

    }
    public function createLista(){
        $listav = Vehiculo::all();
        $idClientesv = $listav->pluck('id_cliente');

        $listaClientes = Cliente::all();
        $ciClientes= $listaClientes->pluck('id','ci');

        $collection = collect([]);
        foreach($listav as $listavehiculo){
            foreach($listaClientes as $listaCli){
                if($listavehiculo->id_cliente == $listaCli->id){
                    $collection = $collection->push($listaCli->ci);
                    $collectionFinal = collect($collection);
                }
            }
        }
        return view('administrador.vehiculos', compact('listav', 'collection'));
    }
    public function createListaCliente($id){
        $cliente = Cliente::where('id', $id)->get();
        $idcliente = $cliente->pluck('id');
        $cicliente = $cliente->pluck('ci');

        $listavCliente = Vehiculo::where('id_cliente', $id)->get();

        return view('administrador.vehiculosCliente', compact('listavCliente','cicliente','idcliente'));
    }
    public function createListaClienteCli($id){
        $cliente = Cliente::find($id);
        $clienteS = Cliente::where('id', $id)->get();
        
        $idcliente = $clienteS->pluck('id');
        $cicliente = $clienteS->pluck('ci');

        $listavCliente = Vehiculo::where('id_cliente', $id)->get();

        return view('cliente.vehiculos', compact('listavCliente','cicliente','idcliente','cliente'));
    }
    public function createAgregar(){
        return view('administrador.agregarVehiculo');
    }
    public function createAgregarCliente($id){
        $cliente = Cliente::where('id', $id)->get();
        $cicliente = $cliente->pluck('ci');

        return view('administrador.agregarVehiculoCliente',compact('id','cicliente'));
    }
    public function createAgregarClienteCli($id){
        $cliente = Cliente::find($id);

        $clienteS = Cliente::where('id', $id)->get();
        $cicliente = $clienteS->pluck('ci');

        return view('cliente.agregarVehiculo',compact('id','cicliente','cliente'));
    }
    public function createBorrar($id){
        $vehiculo = Vehiculo::find($id);

        $clienteBorrar = Cliente::where('id', $vehiculo->id_cliente)->get();
        $cicliente = $clienteBorrar->pluck('ci');
        $ciclienteNum = $cicliente->implode(" ");

        return view('administrador.borrarVehiculo', compact('vehiculo', 'cicliente'));
    }
    public function createBorrarCli($idCli,$id){
        $vehiculo = Vehiculo::find($id);

        $cliente = Cliente::find($idCli);
        $clienteBorrar = Cliente::where('id', $vehiculo->id_cliente)->get();
        $cicliente = $clienteBorrar->pluck('ci');
        $ciclienteNum = $cicliente->implode(" ");

        return view('cliente.borrarVehiculo', compact('vehiculo', 'cicliente','cliente'));
    }
    public function store(Request $request)
    {
        $ciCliente = $request->ci;
        $clientes = Cliente::where('ci', $ciCliente)->get();
        
        if(count($clientes) === 0){
            return redirect('/administrador/vehiculos')->with('msjdelete', 'No existe un cliente con id : ('.$ciCliente.')');
        }else{
            $idcliente = $clientes->pluck('id');
            $idclienteNum = $idcliente->implode(" ");

            $validation= $request->validate([

                'marca' => 'required | min:3 | max: 30',
                'modelo' => 'required | min:3 | max: 30',
                'placa' => 'required | min:3 | max: 7',
                'color' => 'required | min:3 | max: 30',
            ]);
            $vehiculo=new vehiculo();
            $vehiculo->marca = $request->marca;
            $vehiculo->modelo = $request->modelo;
            $vehiculo->placa = $request->placa;
            $vehiculo->color = $request->color;
            $vehiculo->id_cliente = $idclienteNum;
            
            $vehiculo->save();
            return redirect('/administrador/vehiculos')->with('message', 'Felicitaciones .! Vehiculo Registrado Correctamente ...');
        }
    }
    public function storeCli(Request $request)
    {
        $id = $request->id;
        $cliente = Cliente::find($id);

        $ciCliente = $request->ci;
        $clientes = Cliente::where('ci', $ciCliente)->get();
        
        if(count($clientes) === 0){
            return redirect('/administrador/vehiculos')->with('msjdelete', 'No existe un cliente con id : ('.$ciCliente.')');
        }else{
            $idcliente = $clientes->pluck('id');
            $idclienteNum = $idcliente->implode(" ");

            $validation= $request->validate([

                'marca' => 'required | min:3 | max: 30',
                'modelo' => 'required | min:3 | max: 30',
                'placa' => 'required | min:3 | max: 7',
                'color' => 'required | min:3 | max: 30',
            ]);
            $vehiculo=new vehiculo();
            $vehiculo->marca = $request->marca;
            $vehiculo->modelo = $request->modelo;
            $vehiculo->placa = $request->placa;
            $vehiculo->color = $request->color;
            $vehiculo->id_cliente = $idclienteNum;
            
            $vehiculo->save();
            return redirect('/cliente/'.($id).'/vehiculos')->with(compact('cliente'))->with('message', 'Felicitaciones .! Vehiculo Registrado Correctamente ...');
        }
    }
    public function delete($id){
        $vehiculo = Vehiculo::destroy($id);
        return redirect('/administrador/vehiculos')->with('msjdelete', 'El Vehiculo fue eliminado correctamente');
    }
    public function deleteVCli($id,$idCli){
        
        $vehiculo = Vehiculo::destroy($id);
        $cliente = Cliente::find($idCli);
        return redirect('/cliente/'.($idCli).'/vehiculos')->with(compact('cliente'))->with('msjdelete', 'El Vehiculo fue eliminado correctamente');
    }
}