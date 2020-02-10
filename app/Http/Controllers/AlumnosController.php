<?php

namespace App\Http\Controllers;

use App\Exp_asigna_alumnos;
use App\Exp_asigna_generacion;
use App\Exp_asigna_tutor;
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
use Illuminate\Support\Facades\Session;

class AlumnosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('alumno.index');
    }

    public function generaciones()
    {
        $generaciones=Exp_generacion::all();
        $generaciones->map(function ($value,$key){
            $value->grupos=DB::select('SELECT *FROM exp_asigna_generacion  where exp_asigna_generacion.deleted_at is null
 and id_jefe_periodo='.Session::get('id_jefe_periodo').' and id_generacion='.$value->id_generacion);
            //  Exp_asigna_generacion::where('id_jefe_periodo',Session::get('id_jefe_periodo'))->where('id_generacion',$value->id_generacion)->get();

        });
        return $generaciones;
    }
    public function alumnosgeneracion(Request $request)
    {

        $carrera=DB::select('SELECT id_carrera from gnral_jefes_periodos where id_jefe_periodo='.Session::get('id_jefe_periodo'));

        $alumnos=DB::table('gnral_alumnos')
            ->where('gnral_alumnos.id_carrera',$carrera[0]->id_carrera)
            ->where(DB::raw('substr(gnral_alumnos.cuenta, 1, 4)'), '=' , $request->generacion)
            ->select('gnral_alumnos.nombre', 'gnral_alumnos.apaterno', 'gnral_alumnos.amaterno', 'gnral_alumnos.cuenta')
            ->orderBy('gnral_alumnos.apaterno','asc')
            ->get();
        return $alumnos;
    }
    public function alumnosgrupo(Request $request)
    {
        $carrera=DB::select('SELECT id_carrera from gnral_jefes_periodos where id_jefe_periodo='.Session::get('id_jefe_periodo'));
        $alumnos=DB::select('SELECT gnral_alumnos.nombre,gnral_alumnos.apaterno,gnral_alumnos.amaterno,gnral_alumnos.cuenta,gnral_alumnos.id_alumno,exp_asigna_alumnos.id_asigna_alumno  
                        from gnral_alumnos join exp_asigna_alumnos on exp_asigna_alumnos.id_alumno=gnral_alumnos.id_alumno 
                         where gnral_alumnos.id_carrera='.$carrera[0]->id_carrera.' and exp_asigna_alumnos.id_asigna_generacion='.$request->generacion.' 
                          and exp_asigna_alumnos.deleted_at is null  order by gnral_alumnos.apaterno');
        //return array_map('mb_strtoupper',[$alumnos[0],'UTF8']);

        return $alumnos;

    }
    public function getlist(Request $id)
    {

        $alumno=Alumno::lista_grupo($id);
        //dd($alumno);
        return $alumno;
        //return 'dsads';
    }

    public function creargrupo(Request $request)
    {
        $grupo=Exp_asigna_generacion::create([
            "id_generacion"=>$request->get('id_generacion'),
            "grupo"=>$request->get('nombre'),
            "id_jefe_periodo"=>Session::get('id_jefe_periodo')
        ]);
        return $grupo;
    }
    public function BuscarAlumnosGrupo( Request $request)
    {
        $carrera=DB::select('SELECT id_carrera from gnral_jefes_periodos where id_jefe_periodo='.Session::get('id_jefe_periodo'));

        $alumnos=DB::select('select gnral_alumnos.nombre, gnral_alumnos.apaterno, gnral_alumnos.amaterno, 
                gnral_alumnos.cuenta,gnral_alumnos.id_alumno FROM gnral_alumnos WHERE gnral_alumnos.id_carrera='.$carrera[0]->id_carrera.' and 
                substr(gnral_alumnos.cuenta, 1, 4)='.$request->generacion.' and gnral_alumnos.id_alumno NOT IN (SELECT exp_asigna_alumnos.id_alumno 
                from exp_asigna_alumnos WHERE exp_asigna_alumnos.deleted_at is null and exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.') 
                 AND gnral_alumnos.id_alumno NOT IN (SELECT exp_asigna_alumnos.id_alumno 
                from exp_asigna_alumnos WHERE exp_asigna_alumnos.deleted_at is null) ORDER BY gnral_alumnos.apaterno ');

        return $alumnos;
    }
    public function AsignarAlumnos( Request $request)
    {

        $alumnos=$request->alumnos;
        $id_asigna_generacion=$request->id_asigna_generacion;


        foreach ($alumnos as $alumno)
        {
            Exp_asigna_alumnos::create([
                "id_alumno"=>$alumno,
                "id_asigna_generacion"=>$id_asigna_generacion,
                "estado"=>1,
            ]);
        }

        return $id_asigna_generacion;
    }
    public function EliminaAlumnoGrupo(Request $request)
    {

        Exp_asigna_alumnos::find($request->id_asigna_alumno)->delete();

        return $request->id_asigna_generacion;

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

        $alumnos=Exp_asigna_alumnos::where('id_asigna_generacion',$id)->get();
        if(count($alumnos)>0)
        {
            foreach ($alumnos as $alumno) {
                Exp_asigna_alumnos::find($alumno->id_asigna_alumno)->delete();
            }
        }
        $tutor=Exp_asigna_tutor::where('id_asigna_generacion',$id)->get();
        if(count($tutor)>0)
        {
            Exp_asigna_tutor::find($tutor[0]->id_asigna_tutor)->delete();
        }

        Exp_asigna_generacion::find($id)->delete();

    }
}
