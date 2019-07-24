<?php

namespace App\Http\Controllers;

use App\Equipo;
use App\Http\Requests;
use Illuminate\Http\Request;
use Response;

class EquipoController extends Controller
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
        return response::json($Equipo);
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
        $Equipo = new Equipo();
        $Equipo->descripcion = $request->descripcion;
        $Equipo->save();
        return response::json($Equipo);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Marca  $Equipo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $Equipo = Equipo::find($id);
        return response::json($Equipo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Equipo  $Equipo
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipo $Equipo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Equipo  $Equipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $Equipo = Equipo::find($id);
        $Equipo->descripcion = $request->descripcion;
        $Equipo->save();
        return response::json($Equipo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Equipo  $Equipo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $Equipo = Equipo::find($id);
        $Equipo->delete();
        return response::json($Equipo);
    }
}
