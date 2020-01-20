<?php

namespace App\Http\Controllers;

use App\Exp_asigna_generacion;
use App\Grupo;
use Illuminate\Http\Request;
use App\AsignaCoordinador;
use App\AsignaTutor;
use App\AsignaSemestre;
use App\AsignaGeneracion;
use App\Exp_generacion;
use App\Periodo;
use App\User;
use App\DatosPersonales;
use App\Alumno;
use Auth;
class AlumnosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        //$request->user()->authorizeRoles('1');
        $alumnosAll=Alumno::lista_general();
        $alumnosGrup=[];//AsignaTutor::getAllGruposAsigTutores();
        $generaciones=Exp_generacion::all();
        $generaciones->load('getGrupo');
        //dd($generaciones);
        //$listaGen=AsignaGeneracion::getAll();
        //$alumnosSem=AsignaSemestre::getAl();
        //dd($alumnosSem);
        //dd($arr);
        return view('alumno.index')->with(compact('alumnosAll','alumnosGrup','generaciones'));
    }
    public function getAl(Request $id)
    {
        //dd($id->id);
        $alumnosSem=AsignaSemestre::getAl($id->id);
        return $alumnosSem;
        //return 'dsads';
    }
    public function getGen(Request $id)
    {
        //dd($id->id);
        $prof=AsignaGeneracion::getAll($id);
        return $prof;
        //return 'dsads';
    }
    public function getlist(Request $id)
    {

        $alumno=Alumno::lista_grupo($id);
        //dd($alumno);
        return $alumno;
        //return 'dsads';
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
