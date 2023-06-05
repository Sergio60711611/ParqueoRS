<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anuncios;

class AnuncioController extends Controller
{
    public function lista(){
        $lista = Anuncios::all();
        return $lista;
    }
    public function createLista(){
        $lista = Anuncios::all();
        return view('administrador.anunciosAdmin', compact('lista'));
    }
    public function createAgregar(){
        return view('administrador.agregarAnuncios');
    }
    public function createEditar($id){
        $anuncio = Anuncios::find($id);
        return view('administrador.editarAnuncios', compact('anuncio'));
    }
    public function createBorrar($id){
        $anuncio = Anuncios::find($id);
        return view('administrador.borrarAnuncios', compact('anuncio'));
    }
    public function store(Request $request)
    {
        $validation= $request->validate([

            'titulo' => 'required | min:3 | max:100',
            'comunicado' => 'required | min:3 | max:1000',
            'emitido' => 'required',
            'vencimiento' => 'required ',
            'id_parqueo'=>'required',
        ]);

        $anuncio=new Anuncios();
        $anuncio->titulo = $request->titulo;
        $anuncio->comunicado = $request->comunicado;
        $anuncio->emitido = $request->emitido;
        $anuncio->vencimiento= $request->vencimiento;
        $anuncio->id_parqueo = $request->id_parqueo;
        $anuncio->save();
        return redirect('/administrador/anuncios')->with('message', 'Felicitaciones .! El anuncio fue publicado con exito ...');
    }
    public function update(Request $request,$id)
    {
        $validation= $request->validate([

            'titulo' => 'required | min:3 | max:100',
            'comunicado' => 'required | min:3 | max:1000',
            'emitido' => 'required',
            'vencimiento' => 'required ',
            'id_parqueo'=>'required',
        ]);

        $anuncio = Anuncios::findOrFail($request->id);
        $anuncio->titulo = $request->titulo;
        $anuncio->comunicado = $request->comunicado;
        $anuncio->emitido = $request->emitido;
        $anuncio->vencimiento= $request->vencimiento;
        $anuncio->id_parqueo = $request->id_parqueo;

        $anuncio->save();
        return redirect('/administrador/anuncios')->with('msjupdate', 'El anuncio fue actualizado Correctamente.');
    }
    public function delete($id)
    {
        $anuncio =Anuncios::destroy($id);
        return redirect('/administrador/anuncios')->with('msjdelete', 'El anuncio fue eliminado Correctamente.');
        //return $Cliente;
    }
}
