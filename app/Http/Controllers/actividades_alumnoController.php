<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\actividades;
class actividades_alumnoController extends Controller
{

    public function index()
    {
        $datos=DB::select('SELECT planeacion.desc_actividad,actividades.titulo_act,actividades.desc_act,actividades.instrucciones,actividades.evidencia,actividades.id_estado,actividades.id_actividad
                                FROM planeacion, actividades,gnral_alumnos
                                WHERE planeacion.id_planeacion=actividades.id_planeacion
                                and gnral_alumnos.id_semestre=planeacion.id_semestre');
        return view('actividades_alumno.actividades_alumno',compact("datos"));
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

        $plan = actividades::find($id);
        /*if($request->hasFile('evidencia'))
        {

            $file=$request->file('evidencia');
            $name=time().$file->getClientOriginalExtension();
            $plan->evidencia = $name;
            $file->move(public_path().'/img/',$name);
        }else
            {
                $file=$request->file('evidencia');
                $name=time()."daat";

                $file->move(public_path().'/img/',$name);
        }*/
        $plan->evidencia = $request->evidencia;;
        $plan->save();
        return redirect()->back();
    }


    public function destroy($id)
    {
        //
    }
}
