<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;
use App\Models\Cliente;
use App\Models\Guardia;
use App\Models\Administrador;
use App\Models\Vehiculo;
use Illuminate\Support\Facades\Validator;
use \administracionparqueo;

class loginController extends Controller
{
    public function createLoginUser()
    {
        return view('inicio.login');
    }
    public function createLoginGuardia()
    {
        return view('inicio.loginGuardia');
    }
    public function createLoginAdmin()
    {
        return view('inicio.loginAdmin');
    }
    public function storeClienteVehiculo(Request $request){

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

                'marca' => 'required | min:3 | max: 30',
                'modelo' => 'required | min:3 | max: 30',
                'placa' => 'required | min:3 | max: 7',
                'color' => 'required | min:3 | max: 30',
            ]);

            $cantUser  = Cliente::max('id');
            $cantUser = $cantUser+1;

            $cliente=new Cliente();
            $cliente->id = $cantUser;
            $cliente->nombre = $request->nombre;
            $cliente->apellido = $request->apellido;
            $cliente->correo_electronico = $request->correo_electronico;
            $cliente->celular = $request->celular;
            $cliente->ci = $request->ci;
            $cliente->password = $request->password;

            $placaV =$request->placa;
            $placaVe = Vehiculo::where('placa', $placaV)->get();

            if(count($placaVe) === 0){

                $vehiculo=new vehiculo();
                $vehiculo->marca = $request->marca;
                $vehiculo->modelo = $request->modelo;
                $vehiculo->placa = $request->placa;
                $vehiculo->color = $request->color;
                $vehiculo->id_cliente = $cantUser;
                
                $cliente->save();
                $vehiculo->save();

                session()->flash('alert2', 'Felicitaciones cliente creado correctamente:)');
                return redirect('/inicio/loginUser');
            }else{
                // Envía un mensaje flash
                session()->flash('alert', 'Ya existe un vehiculo registrado con la placa : ('.$request->placa.')');
                return redirect('/inicio/loginUser');
            }
        }else{
            // Envía un mensaje flash
            session()->flash('alert', 'Ya existe un cliente con id : ('.$ciCliente.')');
            return redirect('/inicio/loginUser');
        }

    }
    public function inicioSesion(Request $request)
    {
        $validation= $request->validate([
            'ciSesion' => 'required',
            'passwordSesion' => 'required',
        ]);

        if($request->rol ==  "Cliente"){
            $ciSesions = $request->ciSesion;
            $clientesCi = Cliente::where('ci', $ciSesions)->get();
            
            if(count($clientesCi) === 0){
                session()->flash('alert', 'No existe un cliente con el ci : ('.$ciSesions.')');
                return redirect('/inicio/loginUser');

            }else{
                $passwordcliente = $clientesCi->pluck('password');
                $passSesions = $request->passwordSesion;

                $difference = $passwordcliente->diff($passSesions);

                if($difference->isEmpty()){
                    return redirect('/administrador/home');
                }else{
                    session()->flash('alert', 'Contraseña incorrecta. Vuelve a intentarlo');
                    return redirect('/inicio/loginUser');
                }
            }
        }else if($request->rol ==  "Guardia"){
            $ciSesions = $request->ciSesion;
            $clientesCi = Guardia::where('ci', $ciSesions)->get();
            
            if(count($clientesCi) === 0){
                session()->flash('alert', 'No existe un guardia con el ci : ('.$ciSesions.')');
                return redirect('/inicio/loginGuardia');

            }else{
                $passwordcliente = $clientesCi->pluck('password');
                $passSesions = $request->passwordSesion;

                $difference = $passwordcliente->diff($passSesions);

                if($difference->isEmpty()){
                    return redirect('/administrador/home');
                }else{
                    session()->flash('alert', 'Contraseña incorrecta. Vuelve a intentarlo');
                    return redirect('/inicio/loginGuardia');
                }
            }
        }else if($request->rol ==  "Administrador"){
            $ciSesions = $request->ciSesion;
            $clientesCi = Administrador::where('ci', $ciSesions)->get();
            
            if(count($clientesCi) === 0){
                session()->flash('alert', 'No existe un administrador con el ci : ('.$ciSesions.')');
                return redirect('/inicio/loginAdmin');

            }else{
                $passwordcliente = $clientesCi->pluck('password');
                $passSesions = $request->passwordSesion;

                $difference = $passwordcliente->diff($passSesions);

                if($difference->isEmpty()){
                    return redirect('/administrador/home');
                }else{
                    session()->flash('alert', 'Contraseña incorrecta. Vuelve a intentarlo');
                    return redirect('/inicio/loginAdmin');
                }
            }
        }
        //return view('inicio.loginAdmin');
    }
}