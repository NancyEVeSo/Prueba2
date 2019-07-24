<?php

namespace App\Http\Controllers;

use App\Equipo;
use App\Jugador;
use App\Http\Requests;
use Illuminate\Http\Request;
use Response;

class JugadorController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Equipo = Equipo::all();
        return view('Jugador.Jugador', compact('Equipo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        $Jugador= new Jugador();
        $Jugador->idequipo = $request->idequipo;
        $Jugador->nombre = $request->nombre;
        $Jugador->apellido = $request->apellido;
        $Jugador->edad = $request->edad;
        $Jugador->pais = $request->pais;
        $Jugador->save();
        return response::json($Jugador);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jugador  $Jugador
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $Jugador = Jugador::find($id);
        return response::json($Jugador);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AJugador  $Jugador
     * @return \Illuminate\Http\Response
     */
    public function edit(Jugador $Jugador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jugador  $Jugador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $Jugador = Jugador::find($id);
        $Jugador->idequipo = $request->idequipo;
        $Jugador->nombre = $request->nombre;
        $Jugador->apellido = $request->apellido;
        $Jugador->edad = $request->edad;
        $Jugador->pais = $request->pais;
        $Jugador->save();
        return response::json($Jugador);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jugador  $JUgador
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $Jugador = Jugador::find($id);
        $Jugador->delete();
        return response::json($Jugador);
    }

    public function listarJugador(){
        $Jugador = Jugador::all();
        return response::json($Jugador);
    }
}
