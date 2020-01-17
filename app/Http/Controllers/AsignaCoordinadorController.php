<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AsignaCoordinador;
use App\Periodo;
use App\User;
use App\DatosPersonales;
use Auth;
use Illuminate\Support\Facades\DB;
class AsignaCoordinadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $datosProfesores=AsignaCoordinador::getAllProf();
        $checkasig=AsignaCoordinador::getExistCoordinador();
        $datosPeriodos=Periodo::getPeriodos();

        $datos['profesores']=$datosProfesores;
        $datos['check']=$checkasig;
        $datos['periodos']=$datosPeriodos;
        return $datos;

    }
    public function repo(Request $request){
        dd($request);
        $pdf = PDF::loadView('pdf');
        return $pdf->stream();
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
        AsignaCoordinador::insertCoordinador($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        AsignaCoordinador::borrar($id);

    }
}
