<?php

namespace App\Http\Controllers;
use App\Models\PreguntasFrecuentes;
use App\Models\guardia;

use Illuminate\Http\Request;

class PreguntasFrecuentesController extends Controller
{
    public function lista(){
        $lista = PreguntasFrecuentes::all();
        return $lista;
    }
    public function createListaG($id){
        $guardia = guardia::find($id);
        $id2 = $id;
        $lista = PreguntasFrecuentes::all();
        return view('guardia.preguntasAdmin', compact('lista','guardia', 'id2'));
    }
    public function createAgregarG($id){
        $guardia = guardia::find($id);
        $id2 = $id;
        return view('guardia.agregarPreguntas', compact('guardia', 'id2'));
    }
    public function createLista(){
        $lista = PreguntasFrecuentes::all();
        return view('administrador.preguntasAdmin', compact('lista'));
    }
    public function createAgregar(){
        return view('administrador.agregarPreguntas');
    }
    public function createEditar($id){
        $preguntasFrecuentes = PreguntasFrecuentes::find($id);
        return view('administrador.editarPreguntas', compact('preguntasFrecuentes'));
    }
    public function createBorrar($id){
        $preguntasFrecuentes = PreguntasFrecuentes::find($id);
        return view('administrador.borrarPreguntas', compact('preguntasFrecuentes'));
    }
    public function storeG(Request $request)
    {
        $validation= $request->validate([

            'pregunta' => 'required | min:3 | max:100',
            'respuesta' => 'required | min:3 | max:1000',
            'emitido' => 'required',
            'id_parqueo'=>'required',
        ]);

        $preguntasFrecuentes=new PreguntasFrecuentes();
        $preguntasFrecuentes->pregunta= $request->pregunta;
        $preguntasFrecuentes->respuesta = $request->respuesta;
        $preguntasFrecuentes->emitido = $request->emitido;
        $preguntasFrecuentes->id_parqueo = $request->id_parqueo;
        $preguntasFrecuentes->save();
        return redirect('/guardia/' . $id . '/preguntas');
    }
    public function store(Request $request)
    {
        $validation= $request->validate([

            'pregunta' => 'required | min:3 | max:100',
            'respuesta' => 'required | min:3 | max:1000',
            'emitido' => 'required',
            'id_parqueo'=>'required',
        ]);

        $preguntasFrecuentes=new PreguntasFrecuentes();
        $preguntasFrecuentes->pregunta= $request->pregunta;
        $preguntasFrecuentes->respuesta = $request->respuesta;
        $preguntasFrecuentes->emitido = $request->emitido;
        $preguntasFrecuentes->id_parqueo = $request->id_parqueo;
        $preguntasFrecuentes->save();
        return redirect('/administrador/preguntas')->with('message', 'Felicitaciones .! La Pregunta fue publicado con exito ...');
    }
    public function update(Request $request,$id)
    {
        $validation= $request->validate([

            'pregunta' => 'required | min:3 | max:100',
            'respuesta' => 'required | min:3 | max:1000',
            'emitido' => 'required',
            'id_parqueo'=>'required',
        ]);

        $preguntasFrecuentes = PreguntasFrecuentes::findOrFail($request->id);
        $preguntasFrecuentes->pregunta= $request->pregunta;
        $preguntasFrecuentes->respuesta = $request->respuesta;
        $preguntasFrecuentes->emitido = $request->emitido;
        $preguntasFrecuentes->id_parqueo = $request->id_parqueo;
        $preguntasFrecuentes->save();
        return redirect('/administrador/preguntas')->with('msjupdate', 'La pregunta fue actualizado Correctamente.');
    }
    public function delete($id)
    {
        $preguntasFrecuentes =PreguntasFrecuentes::destroy($id);
        return redirect('/administrador/preguntas')->with('msjdelete', 'La pregunta fue eliminado Correctamente.');
        //return $Cliente;
    }
}
