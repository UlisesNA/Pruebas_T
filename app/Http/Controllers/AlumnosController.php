<?php

namespace App\Http\Controllers;

use App\Exp_asigna_generacion;
use App\gnral_alumnos;
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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        //$alumnosAll=Alumno::lista_general();
        /*$generaciones=Exp_asigna_generacion::where('id',\Illuminate\Support\Facades\Auth::user()->id)->get();
        $generaciones->load('getGeneracion');
        dd($generaciones);*/
        //$listaGen=AsignaGeneracion::getAll();
        //$alumnosSem=AsignaSemestre::getAl();
        //dd($alumnosSem);
        //dd($arr);
        return view('alumno.index');
    }

    public function listaGeneral()
    {
        $carrera=DB::table('gnral_jefes_periodos')
            ->join('gnral_personales','gnral_personales.id_personal','=','gnral_jefes_periodos.id_personal')
            ->where('gnral_jefes_periodos.id_periodo','=','2')
            ->where('gnral_personales.tipo_usuario','=',Auth::user()->id)
            ->select('gnral_jefes_periodos.id_carrera')
            ->get();
        $alumnos= gnral_alumnos::where('id_carrera',$carrera[0]->id_carrera)->orderby('apaterno','asc')->get();

        return $alumnos;

    }
    public function generaciones()
    {
        $generaciones=Exp_generacion::all();
        $generaciones->map(function ($value,$key){
            $value->grupos=Exp_asigna_generacion::where('id',Auth::user()->id)->where('id_generacion',$value->id_generacion)->get();

        });
        return $generaciones;
    }
    public function alumnosgeneracion(Request $request)
    {

        //dd($request->generacion);
        $carrera=DB::table('gnral_jefes_periodos')
            ->join('gnral_personales','gnral_personales.id_personal','=','gnral_jefes_periodos.id_personal')
            ->where('gnral_jefes_periodos.id_periodo','=','2')
            ->where('gnral_personales.tipo_usuario','=',Auth::user()->id)
            ->select('gnral_jefes_periodos.id_carrera')
            ->get();

        if($request->generacion>2000)
        {
            $alumnos=DB::table('gnral_alumnos')
                ->where('gnral_alumnos.id_carrera',$carrera[0]->id_carrera)
                ->where(DB::raw('substr(gnral_alumnos.cuenta, 1, 4)'), '=' , $request->generacion)
                ->select('gnral_alumnos.nombre', 'gnral_alumnos.apaterno', 'gnral_alumnos.amaterno', 'gnral_alumnos.cuenta')
                ->orderBy('gnral_alumnos.apaterno','asc')
                ->get();
        }
        else{
            $alumnos=DB::table('gnral_alumnos')
                ->join('exp_asigna_alumnos','exp_asigna_alumnos.id_alumno','=','gnral_alumnos.id_alumno')
                ->where('gnral_alumnos.id_carrera',$carrera[0]->id_carrera)
                ->where('exp_asigna_alumnos.id_asigna_generacion','=',$request->generacion)
                ->select('gnral_alumnos.nombre', 'gnral_alumnos.apaterno', 'gnral_alumnos.amaterno', 'gnral_alumnos.cuenta')
                ->orderBy('gnral_alumnos.apaterno','asc')
                ->get();
        }


        return $alumnos;
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
