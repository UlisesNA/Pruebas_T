<?php

namespace App\Http\Controllers;

use App\gnral_alumnos;
use App\Plan_asigna_evidencias;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\planasignaevidencias;
class actividades_alumnoController extends Controller
{

    public function index()
    {
        $id=Auth::user()->email;
        //echo $id;

        $consulta=DB::table('gnral_alumnos')
            ->join('users', 'users.email', '=', 'gnral_alumnos.correo_al')
            ->where('users.email','=',$id)
            -> select('gnral_alumnos.id_alumno')
            ->get();
       // echo $consulta;


        $datos=DB::select('SELECT DISTINCT desc_actividad, objetivo_actividad, fi_actividad, ff_actividad, estrategia, requiere_evidencia 
                            from plan_actividades, plan_planeacion, plan_asigna_planeacion_actividad, plan_asigna_planeacion_tutor, exp_asigna_generacion, 
                            exp_asigna_tutor, exp_asigna_alumnos 
                            where id_alumno=10
                            and plan_asigna_planeacion_actividad.id_planeacion=plan_planeacion.id_planeacion
                            and plan_asigna_planeacion_actividad.id_plan_actividad=plan_actividades.id_plan_actividad
                            and plan_asigna_planeacion_tutor.id_asigna_planaeacion_actividad=plan_asigna_planeacion_actividad.id_asigna_planeacion_actividad
                            and plan_asigna_planeacion_tutor.id_asigna_tutor=exp_asigna_tutor.id_asigna_tutor');

        $datos1=DB::select('SELECT DISTINCT  plan_asigna_planeacion_tutor.id_asigna_planeacion_tutor, id_evidencia, evidencia 
           from plan_asigna_planeacion_tutor, plan_asigna_evidencias
           where id_alumno=10
           and plan_asigna_planeacion_tutor.id_asigna_planeacion_tutor=plan_asigna_evidencias.id_asigna_planeacion_tutor');

        return view('actividades_alumno.actividades_alumno',compact("datos","datos1"));

    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {

    }

    public function updateExp(Request $request)
    {
        //            ""=>




    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function cerrar()
    {
        //
        Session::flush();
    }

    public function update(Request $request, $id)
    {

        $plan1 = Plan_asigna_evidencias::find($id);
        if($request->hasFile('evidencia'))
        {

            $file=$request->file('evidencia');

            $name=time().".".$file->getClientOriginalExtension();
            $plan1->evidencia = $name;
            $file->move(public_path().'/img/',$name);
        }else {
                $file=$request->file('evidencia');
          //  dd($file);
                $name=time()."daat";

                $file->move(public_path().'/img/',$name);
        }
        //$plan->evidencia = $request->evidencia;;
        $plan1->save();
        return redirect()->back();
    }


    public function destroy($id)
    {
        //
    }
}
