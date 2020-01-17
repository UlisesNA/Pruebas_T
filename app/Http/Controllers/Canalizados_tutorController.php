<?php

namespace App\Http\Controllers;
use App\Canalizacion;
use App\gnral_alumnos;
use App\asigna_tutor;
use App\areas_canalizacion;
use Illuminate\Http\Request;
use DB;
class Canalizados_tutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$alumnos= gnral_alumnos::getAlumnos();
        //$datos['alumnos']=Tutor::paginate(5);
       // $carreras=asigna_tutor::getCarrera();
        $carreras1=asigna_tutor::getCarrera1();
        $datos= asigna_tutor::getDatos();
        //$alumnos=gnral_alumnos::getAlumnos();
        return view('profesor.canalizados',compact("datos","carreras1"));
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

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $areas=areas_canalizacion::all();
        $datos=asigna_tutor::getDatosall();
        $alumno=gnral_alumnos::find($id);
        return view('profesor.canaliza',compact('alumno',"areas","datos"));
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
        $areas=areas_canalizacion::all();
        $carreras=DB::select('SELECT c.nombre FROM gnral_carreras as c,gnral_alumnos as a, canalizacion WHERE a.id_carrera= c.id_carrera and a.id_alumno =canalizacion.id_alumno and canalizacion.id_canalizacion='.$id);
        $semestre=DB::select('SELECT s.descripcion FROM gnral_semestres as s,gnral_alumnos as a,canalizacion WHERE a.id_semestre= s.id_semestre and a.id_alumno=canalizacion.id_alumno and canalizacion.id_canalizacion='.$id);
        $prof=DB::select('SELECT t.id_personal,t.nombre,t.correo FROM gnral_personales as t,asigna_tutor as ast,gnral_alumnos as a ,gnral_semestres as s,gnral_grupos as g, gnral_carreras as c,canalizacion WHERE a.grupo= g.id_grupo and a.id_semestre=s.id_semestre and a.id_carrera=c.id_carrera and ast.id_personal=t.id_personal and ast.id_semestre=a.id_semestre and ast.id_carrera=a.id_carrera and a.id_alumno=canalizacion.id_alumno and canalizacion.id_canalizacion='.$id);
        $grupo=DB::select('SELECT g.grupo FROM gnral_grupos as g,gnral_alumnos as a,canalizacion WHERE a.grupo= g.id_grupo and a.id_alumno =canalizacion.id_alumno and canalizacion.id_canalizacion='.$id);
        $alumno=DB::select('SELECT gnral_alumnos.id_alumno,gnral_alumnos.nombre,gnral_alumnos.apaterno,gnral_alumnos.amaterno FROM gnral_alumnos,canalizacion WHERE gnral_alumnos.id_alumno=canalizacion.id_alumno and canalizacion.id_canalizacion='.$id);
        $plan = Canalizacion::find($id);
        //return $alumno;
        return view('profesor.edit', compact('plan','areas','carreras','semestre','prof','grupo','alumno'));
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
 //       dd($request->hora);
        $plan = Canalizacion::find($id);
       // $plan=request()->except('updated_at');
        $plan->fecha_canalizacion = $request->get('fecha_canalizacion');
        $plan->fecha_canalizacion_anterior = $request->get('fecha_canalizacion_anterior');
        $plan->fecha_canalizacion_siguiente = $request->get('fecha_canalizacion_siguiente');
        $plan->hora = $request->hora;
        $plan->aspectos_sociologicos1 = $request->get('aspectos_sociologicos1');
        $plan->aspectos_sociologicos2 = $request->get('aspectos_sociologicos2');
        $plan->aspectos_sociologicos3 = $request->get('aspectos_sociologicos3');
        $plan->aspectos_academicos1 = $request->get('aspectos_academicos1');
        $plan->aspectos_academicos2 = $request->get('aspectos_academicos2');
        $plan->aspectos_academicos3 = $request->get('aspectos_academicos3');
        $plan->observaciones = $request->get('observaciones');
        $plan->otros = $request->get('otros');
        $plan->notificacion = $request->get('notificacion');
        $plan->id_area = $request->get('id_area');
        $plan->status = $request->get('status');
        $plan->save();
        //return view('profesor.canalizados');
        //return view('profesor.canalizados');
        return redirect()->back();
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
