<?php

namespace App\Http\Controllers;

use App\Desarrollo_asigna_coordinador_general;
use Illuminate\Http\Request;
use App\AsignaCoordinador;
use App\AsignaTutor;
use phpDocumentor\Reflection\Location;
use Illuminate\Support\Facades\Auth;

class DesarrolloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $datosAC=Desarrollo_asigna_coordinador_general::getCoordinador();
        //$datosAT=AsignaTutor::getTutores();

        if($datosAC==null)
        {
            $datos['coordinador']=null;
        }
        else{
            $datos['coordinador']=$datosAC;
        }
        /*if($datosAT==null)
        {
            $datos['tutores']=null;
        }
        else{
            $datos['tutores']=$datosAT;
        }*/
        return $datos;


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
        //
    }
}
