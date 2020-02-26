<?php

namespace App\Http\Controllers;

use App\Exp_asigna_alumnos;
use App\Exp_asigna_generacion;
use App\Exp_asigna_tutor;
use App\gnral_alumnos;
use App\Grupo;
use App\Like;
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
use App\actividades;
use App\Plan_actividades;
use App\Plan_asigna_planeacion_actividad;
use App\Plan_asigna_planeacion_tutor;
use FontLib\Table\Type\name;
use App\Plan_Planeacion;
use App\Planeacion;

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
/*CONSULTA DE ALUMNO EN REVALIDACION EN ALGUN GRUPO DE LA GENERACION
        $alu=DB::select('SELECT gnral_alumnos.id_alumno from gnral_alumnos JOIN exp_asigna_alumnos
ON gnral_alumnos.id_alumno=exp_asigna_alumnos.id_alumno JOIN exp_asigna_generacion ON exp_asigna_generacion.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion
WHERE gnral_alumnos.id_carrera='.$carrera[0]->id_carrera.' and exp_asigna_alumnos.id_asigna_generacion in (SELECT exp_asigna_generacion.id_asigna_generacion from exp_asigna_generacion
 join gnral_jefes_periodos ON gnral_jefes_periodos.id_jefe_periodo=exp_asigna_generacion.id_jefe_periodo JOIN
 exp_generacion ON exp_generacion.id_generacion=exp_asigna_generacion.id_generacion where exp_asigna_generacion.deleted_at is  null
 and exp_generacion.generacion='.$request->generacion.' AND exp_asigna_generacion.id_jefe_periodo='.Session::get('id_jefe_periodo').') and
 exp_asigna_generacion.deleted_at is null and exp_asigna_alumnos.deleted_at is null and gnral_alumnos.revalidacion=1');*/

/*CONSULTA QUE MUESTRA LISTA GENERAL DE GENERACION CON ALUMNOS EN REVALIDACION
        $alus=DB::select('SELECT UPPER(gnral_alumnos.nombre) as nombre, UPPER(gnral_alumnos.apaterno) as apaterno, UPPER(gnral_alumnos.amaterno) as amaterno, gnral_alumnos.cuenta,gnral_alumnos.revalidacion,gnral_alumnos.id_alumno FROM gnral_alumnos
 where gnral_alumnos.id_carrera='.$carrera[0]->id_carrera.' and (substring(gnral_alumnos.cuenta, 1, 4)='.$request->generacion.' or gnral_alumnos.id_alumno in (
 SELECT gnral_alumnos.id_alumno from gnral_alumnos JOIN exp_asigna_alumnos
ON gnral_alumnos.id_alumno=exp_asigna_alumnos.id_alumno JOIN exp_asigna_generacion ON exp_asigna_generacion.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion
WHERE gnral_alumnos.id_carrera='.$carrera[0]->id_carrera.' and exp_asigna_alumnos.id_asigna_generacion in (SELECT exp_asigna_generacion.id_asigna_generacion from exp_asigna_generacion
 join gnral_jefes_periodos ON gnral_jefes_periodos.id_jefe_periodo=exp_asigna_generacion.id_jefe_periodo JOIN
 exp_generacion ON exp_generacion.id_generacion=exp_asigna_generacion.id_generacion where exp_asigna_generacion.deleted_at is  null
 and exp_generacion.generacion='.$request->generacion.' AND exp_asigna_generacion.id_jefe_periodo='.Session::get('id_jefe_periodo').') and
 exp_asigna_generacion.deleted_at is null and exp_asigna_alumnos.deleted_at is null and gnral_alumnos.revalidacion=1
 ) ) order by gnral_alumnos.apaterno ');*/
        $alumnos=DB::table('gnral_alumnos')
            ->join('eva_carga_academica','eva_carga_academica.id_alumno','gnral_alumnos.id_alumno')
            ->where('gnral_alumnos.id_carrera',$carrera[0]->id_carrera)
            ->where('eva_carga_academica.id_periodo',Session::get('id_periodo'))
            ->where(DB::raw('substr(gnral_alumnos.cuenta, 1, 4)'), '=' , $request->generacion)
            ->select(DB::raw('DISTINCT UPPER(gnral_alumnos.nombre) as nombre, UPPER(gnral_alumnos.apaterno) as apaterno, UPPER(gnral_alumnos.amaterno) as amaterno, gnral_alumnos.cuenta,gnral_alumnos.revalidacion,gnral_alumnos.id_alumno'))
            ->orderBy('gnral_alumnos.cuenta','asc')
            ->get();

        //dd($alumnos);

        return $alumnos;
    }
    public function alumnosgrupo(Request $request)
    {
        $carrera=DB::select('SELECT id_carrera from gnral_jefes_periodos where id_jefe_periodo='.Session::get('id_jefe_periodo'));
        $alumnos=DB::select('SELECT UPPER(gnral_alumnos.nombre) as nombre,UPPER(gnral_alumnos.apaterno) as apaterno, UPPER(gnral_alumnos.amaterno) as amaterno,gnral_alumnos.cuenta,gnral_alumnos.id_alumno,exp_asigna_alumnos.id_asigna_alumno, gnral_alumnos.revalidacion
                        from gnral_alumnos join exp_asigna_alumnos on exp_asigna_alumnos.id_alumno=gnral_alumnos.id_alumno
                         where gnral_alumnos.id_carrera='.$carrera[0]->id_carrera.' and exp_asigna_alumnos.id_asigna_generacion='.$request->generacion.'
                          and exp_asigna_alumnos.deleted_at is null  order by gnral_alumnos.cuenta');
        //return array_map('mb_strtoupper',[$alumnos[0],'UTF8']);

        return $alumnos;

    }
    public function planeacion(Request $request)
    {
        $carrera=DB::select('SELECT id_carrera from gnral_jefes_periodos where id_jefe_periodo='.Session::get('id_jefe_periodo'));

        $alumnos=DB::select('SELECT plan_actividades.*,plan_asigna_planeacion_tutor.*
FROM  plan_actividades,plan_asigna_planeacion_actividad,exp_asigna_generacion
,plan_asigna_planeacion_tutor,gnral_personales,exp_asigna_tutor
WHERE plan_actividades.id_plan_actividad=plan_asigna_planeacion_actividad.id_plan_actividad
AND plan_asigna_planeacion_actividad.id_asigna_generacion=exp_asigna_generacion.id_asigna_generacion
AND gnral_personales.id_personal=exp_asigna_tutor.id_personal
and plan_asigna_planeacion_actividad.id_asigna_generacion=exp_asigna_tutor.id_asigna_generacion
and plan_asigna_planeacion_tutor.id_asigna_planeacion_actividad=plan_asigna_planeacion_actividad.id_asigna_planeacion_actividad
and plan_asigna_planeacion_tutor.id_asigna_generacion=plan_asigna_planeacion_actividad.id_asigna_generacion
AND exp_asigna_tutor.deleted_at is null
AND exp_asigna_generacion.deleted_at is null
AND plan_actividades.deleted_at is null
AND plan_asigna_planeacion_actividad.id_estado=1
AND plan_asigna_planeacion_tutor.id_sugerencia=2
AND exp_asigna_generacion.id_asigna_generacion='.$request->generacion);

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
        $id_generacion=DB::select('SELECT @@identity as id_gen');
        //dd($id_generacion);

        $num=DB::select('SELECT plan_actividades.id_plan_actividad
        FROM plan_actividades
        WHERE plan_actividades.deleted_at is null
        AND plan_actividades.id_generacion='.$request->id_generacion);

        $est=DB::select('SELECT plan_asigna_planeacion_actividad.id_estado,plan_asigna_planeacion_actividad.comentario
        FROM plan_asigna_planeacion_actividad
        WHERE plan_asigna_planeacion_actividad.deleted_at is null
        AND plan_asigna_planeacion_actividad.id_plan_actividad='.$num[0]->id_plan_actividad);
        //dd($num);

        $ic=count($num);
        for ($i = 0; $i <$ic; $i++) {
            Plan_asigna_planeacion_actividad::create([
                "id_asigna_generacion"=>$id_generacion[0]->id_gen,
                //"id_actividad "=>$id_actividad[0]->id_ac,
            ]);
            $id=DB::select('SELECT @@identity as id');

            $plan = Plan_asigna_planeacion_actividad::find($id[0]->id);
            $plan->id_plan_actividad =$num[$i]->id_plan_actividad;
            $plan->id_estado = $est[0]->id_estado;
            $plan->comentario = $est[0]->comentario;
            $plan->save();

            Plan_asigna_planeacion_tutor::create([
                "id_asigna_planeacion_actividad"=>$id[0]->id,
                "id_asigna_generacion"=>$id_generacion[0]->id_gen,
            ]);
            $idt=DB::select('SELECT @@identity as idt');
            $plan = Plan_asigna_planeacion_tutor::find($idt[0]->idt);
            $plan->id_asigna_planeacion_actividad = $id[0]->id;
            $plan->id_asigna_generacion = $id_generacion[0]->id_gen;
            $plan->save();
        }
        //
        return $grupo;
    }
    public function BuscarAlumnosGrupo( Request $request)
    {
        $carrera=DB::select('SELECT id_carrera from gnral_jefes_periodos where id_jefe_periodo='.Session::get('id_jefe_periodo'));

        $alumnos=DB::select('select distinct UPPER(gnral_alumnos.nombre) as nombre, UPPER(gnral_alumnos.apaterno)as apaterno, UPPER(gnral_alumnos.amaterno) as amaterno,
                  gnral_alumnos.cuenta,gnral_alumnos.id_alumno FROM gnral_alumnos JOIN eva_carga_academica ON eva_carga_academica.id_alumno=gnral_alumnos.id_alumno WHERE eva_carga_academica.id_periodo='.Session::get('id_periodo').' and gnral_alumnos.id_carrera='.$carrera[0]->id_carrera.' and
                  (substr(gnral_alumnos.cuenta, 1, 4)='.$request->generacion.' OR gnral_alumnos.revalidacion=1) and gnral_alumnos.id_alumno NOT IN (SELECT exp_asigna_alumnos.id_alumno
                  from exp_asigna_alumnos WHERE exp_asigna_alumnos.deleted_at is null and exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.')
                   AND gnral_alumnos.id_alumno NOT IN (SELECT exp_asigna_alumnos.id_alumno
                  from exp_asigna_alumnos WHERE exp_asigna_alumnos.deleted_at is null) ORDER BY gnral_alumnos.cuenta ');

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
        $idalumno=$request->id_alumno;
        /*$idasignageneracion=$request->id_asigna_generacion;*/

        foreach ($idalumno as $ida)
        {
            Exp_asigna_alumnos::whereIdAlumno($ida)->delete();
        }

        return $request->id_asigna_generacion;


    }
    public function EliminaAlumnoGrupoUno(Request $request)
    {
        Exp_asigna_alumnos::find($request->id_asigna_alumno)->delete();

        return $request->id_asigna_generacion;

    }
    public function revalidacionSI(Request $request)
    {
        $rev=DB::update('UPDATE gnral_alumnos set revalidacion=1 where gnral_alumnos.id_alumno='.$request->id_alumno);
        $gen=DB::select('SELECT SUBSTRING(gnral_alumnos.cuenta,1,4) FROM gnral_alumnos where id_alumno='.$request->id_alumno);
        return $gen;
    }
    public function revalidacionNO(Request $request)
    {


        $idgen=DB::select('SELECT exp_asigna_alumnos.id_asigna_alumno FROM exp_asigna_generacion
JOIN exp_asigna_alumnos ON  exp_asigna_alumnos.id_asigna_generacion=exp_asigna_generacion.id_asigna_generacion
where exp_asigna_generacion.id_jefe_periodo='.Session::get('id_jefe_periodo').' and exp_asigna_alumnos.id_alumno='.$request->id_alumno.'
and exp_asigna_alumnos.deleted_at is null and exp_asigna_generacion.deleted_at is null');

        if(count($idgen)==1)
        {
            Exp_asigna_alumnos::find($idgen[0]->id_asigna_alumno)->delete();
        }
        $rev=DB::update('UPDATE gnral_alumnos set revalidacion=0 where gnral_alumnos.id_alumno='.$request->id_alumno);
        $gen=DB::select('SELECT SUBSTRING(gnral_alumnos.cuenta,1,4) FROM gnral_alumnos where id_alumno='.$request->id_alumno);
        return $gen;
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
