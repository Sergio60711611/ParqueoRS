<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\evento;
use App\Models\Reserva;
use App\Models\Cliente;
use Carbon\Carbon;
class eventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
        //$datosEvento = $request->all();
        
        //print_r($datosEvento);
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$data['eventos'] = evento::all();
        ///$evento = evento::where('id_sitio', $id)->get();

        ///$data = evento::select('title','descripcion','start','end','rrule')->get();
        $data = evento::where('id_sitio', $id)->select('title', 'description', 'start', 'end', 'rrule')->get();


        //return response()->json($data['eventos']);
        $jsonResponse = response()->json($data);
        $jsonString = $jsonResponse->getContent();
        $decodedString = stripslashes($jsonString);

        return $decodedString;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function createCalendar($id){
        
        $now = Carbon::now(); 
        $now->format('d/m/Y');

        $idreserva  = Reserva::max('id');
        $idreserva = $idreserva+1;

        return view('administrador.calendario', compact('id','now','idreserva'));
    }
    public function createCalendarCli($idCli,$id){
        
        $now = Carbon::now(); 
        $now->format('d/m/Y');

        $idreserva  = Reserva::max('id');
        $idreserva = $idreserva+1;
        $cliente = Cliente::find($idCli);

        return view('cliente.calendario', compact('id','now','idreserva','cliente'));
    }
    public function createCalendarGu($idGu,$id){
        
        $now = Carbon::now(); 
        $now->format('d/m/Y');

        $idreserva  = Reserva::max('id');
        $idreserva = $idreserva+1;

        $guardia = Cliente::find($idGu);

        return view('guardia.calendario', compact('id','now','idreserva','guardia'));
    }
}