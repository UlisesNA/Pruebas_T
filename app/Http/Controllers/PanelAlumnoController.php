<?php

namespace App\Http\Controllers;

use App\Exp_antecedentes_academico;
use App\Exp_area_psicopedagogica;
use App\Exp_bachillerato;
use App\Exp_bebidas;
use App\Exp_civil_estado;
use App\Exp_datos_familiare;
use App\Exp_escalas;
use App\Exp_familia_union;
use App\Exp_formacion_integral;
use App\Exp_generale;
use App\Exp_habitos_estudio;
use App\Exp_opc_intelectual;
use App\Exp_opc_nivel_socio;
use App\Exp_opc_tiempo;
use App\Exp_opc_vives;
use App\Exp_parentesco;
use App\Exp_turno;
use App\gnral_alumnos;
use App\Gnral_carreras;
use App\Gnral_grupos;
use App\Gnral_periodos;
use App\Gnral_semestre;
use Illuminate\Http\Request;
use App\AsignaExpediente;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PanelAlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gen=Exp_generale::where('id_alumno','=',Session::get('id_alumno'))->get();
        /*$aca=Exp_antecedentes_academico::where('id_alumno','=',Session::get('id_alumno'))->get();
        $familiares=Exp_datos_familiare::where('id_alumno','=',Session::get('id_alumno'))->get();
        $habitos=Exp_habitos_estudio::where('id_alumno','=',Session::get('id_alumno'))->get();
        $integral=Exp_formacion_integral::where('id_alumno','=',Session::get('id_alumno'))->get();
        $area=Exp_area_psicopedagogica::where('id_alumno','=',Session::get('id_alumno'))->get();*/
        if(count($gen)>0)
        {
            return ('1');
        }
        else{
            return ('2');
        }
    }
    public function principal()
    {
        return view('alumnos.index');
    }

    public function datosAlu()
    {
        $data['generales']=Exp_generale::where('id_alumno',Session::get('id_alumno'))->get();
        //dd($data['generales']);
        $data['academicos']=Exp_antecedentes_academico::where('id_alumno',Session::get('id_alumno'))->get();
        $data['familiares']=Exp_datos_familiare::where('id_alumno',Session::get('id_alumno'))->get();
        $data['estudio']=Exp_habitos_estudio::where('id_alumno',Session::get('id_alumno'))->get();
        $data['integral']=Exp_formacion_integral::where('id_alumno',Session::get('id_alumno'))->get();
        $data['area']=Exp_area_psicopedagogica::where('id_alumno',Session::get('id_alumno'))->get();

        $data['carreras']= Gnral_carreras::all();
        $data['grupos']= Gnral_grupos::all();
        $data['periodos'] = Gnral_periodos::all();
        $data['semestres']= Gnral_semestre::all();
        $data['estadocivil'] = Exp_civil_estado::all();
        $data['nivel']= Exp_opc_nivel_socio::all();
        $data['bachillerato'] = Exp_bachillerato::all();
        $data['vive'] = Exp_opc_vives::all();
        $data['unionfam'] = Exp_familia_union::all();
        $data['turno'] = Exp_turno::all();
        $data['tiempoestudia']= Exp_opc_tiempo::all();
        $data['intelectual']= Exp_opc_intelectual::all();
        $data['parentesco']=Exp_parentesco::all();
        $data['escala']=Exp_escalas::all();
        $data['bebidas']=Exp_bebidas::all();
        return $data;
    }

    public function datosPrincipales()
    {
        $data['datos']=gnral_alumnos::where('id_alumno',Session::get('id_alumno'))->get();
        $data['email']=Auth::user()->email;
        $data['carreras']= Gnral_carreras::all();
        $data['grupos']= Gnral_grupos::all();
        $data['periodos'] = Gnral_periodos::all();
        $data['semestres']= Gnral_semestre::all();
        $data['estadocivil'] = Exp_civil_estado::all();
        $data['nivel']= Exp_opc_nivel_socio::all();
        $data['bachillerato'] = Exp_bachillerato::all();
        $data['vive'] = Exp_opc_vives::all();
        $data['unionfam'] = Exp_familia_union::all();
        $data['turno'] = Exp_turno::all();
        $data['tiempoestudia']= Exp_opc_tiempo::all();
        $data['intelectual']= Exp_opc_intelectual::all();
        $data['parentesco']=Exp_parentesco::all();
        $data['escala']=Exp_escalas::all();
        $data['bebidas']=Exp_bebidas::all();
        return $data;
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
