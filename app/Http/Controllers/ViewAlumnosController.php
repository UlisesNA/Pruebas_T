<?php

namespace App\Http\Controllers;

use App\areas_canalizacion;
use App\AsignaExpediente;
use App\Exp_antecedentes_academico;
use App\Exp_area_psicopedagogica;
use App\Exp_asigna_expediente;
use App\Exp_bachillerato;
use App\Exp_bebidas;
use App\Exp_beca;
use App\Exp_civil_estado;
use App\Exp_datos_familiare;
use App\Exp_escalas;
use App\Exp_familia_union;
use App\Exp_formacion_integral;
use App\Exp_formatrabajo;
use App\Exp_generale;
use App\Exp_habitos_estudio;
use App\Exp_opc_intelectual;
use App\Exp_opc_tiempo;
use App\Exp_opc_vives;
use App\Exp_parentesco;
use App\Exp_tiempoestudia;
use App\Exp_turno;
use App\Plan_actividades;
use App\Plan_asigna_planeacion_tutor;
use App\subareas_canalizacion;
use Illuminate\Support\Carbon;
use App\gnral_alumnos;
use App\Gnral_carreras;
use App\Gnral_grupos;
use App\Gnral_periodos;
use App\Gnral_semestre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function Symfony\Component\VarDumper\Dumper\esc;

class ViewAlumnosController extends Controller
{
    public function llenar()
    {
        return view('alumnos.expediente');
    }
    public function actualizar()
    {
        return view('alumnos.expedienteUpdate');

    }
    public function create()
    {
        //
    }
    public function guardarImagen(Request $request)
    {


        if($request->hasFile('imagen')){

            $extension="";
            switch ($request->ext){
                case 'image/jpeg':
                    $extension='.jpeg';
                    break;
                case 'image/png':
                    $extension='.png';
                    break;
                case 'image/jpg':
                    $extension='.jpg';
                    break;
            }
            $file = $request->file('imagen');
            $name = $request->nombre.$extension;
            $file->move(public_path().'/Fotografias/', $name);
        }
        return $request->nombre;
    }
    public function store(Request $request)
    {
        //dd($request->hasFile('imagen'));

      Exp_generale::create($request->alu['generales']);
        Exp_antecedentes_academico::create($request->alu['academicos']);
        Exp_datos_familiare::create($request->alu['familiares']);
        Exp_habitos_estudio::create($request->alu['estudio']);
        Exp_formacion_integral::create($request->alu['integral']);
        $area=Exp_area_psicopedagogica::create($request->alu['area']);

        return $area;
    }

    public  function veralumno(Request $request)
    {
        $data['grupo']=Exp_generale::where('id_alumno',$request->id)->get();
        $data['academicos']=Exp_antecedentes_academico::where('id_alumno',$request->id)->get();
        $data['familiares']=Exp_datos_familiare::where('id_alumno',$request->id)->get();
        $data['estudio']=Exp_habitos_estudio::where('id_alumno',$request->id)->get();
        $data['integral']=Exp_formacion_integral::where('id_alumno',$request->id)->get();
        $data['area']=Exp_area_psicopedagogica::where('id_alumno',$request->id)->get();

        $data['carreras']= Gnral_carreras::all();
        $data['grupos']= Gnral_grupos::all();
        $data['periodos'] = Gnral_periodos::all();
        $data['semestres']= Gnral_semestre::all();
        $data['estadocivil'] = Exp_civil_estado::all();
        /*$data['nivel']= Exp_opc_nivel_socio::all();*/
        $data['bachillerato'] = Exp_bachillerato::all();
        $data['vive'] = Exp_opc_vives::all();
        $data['unionfam'] = Exp_familia_union::all();
        $data['turno'] = Exp_turno::all();
        $data['tiempoestudia']= Exp_opc_tiempo::all();
        $data['intelectual']= Exp_opc_intelectual::all();
        $data['parentesco']=Exp_parentesco::all();
        $data['escala']=Exp_escalas::all();
        $data['bebidas']=Exp_bebidas::all();
        $data['becas']=Exp_beca::all();
        return $data;
    }

    public  function veralumno1(Request $request)
    {
        $data['valores']=DB::select('SELECT exp_asigna_generacion.grupo,gnral_alumnos.id_alumno,gnral_alumnos.nombre,gnral_alumnos.apaterno,
            gnral_alumnos.amaterno,gnral_carreras.nombre as carrera,gnral_semestres.descripcion,gnral_personales.nombre as nombre_tut,gnral_personales.id_personal
            FROM exp_asigna_generacion,exp_asigna_alumnos,gnral_alumnos,gnral_carreras,
            gnral_semestres,gnral_personales,exp_asigna_tutor
            WHERE exp_asigna_generacion.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion
            AND gnral_alumnos.id_alumno=exp_asigna_alumnos.id_alumno
            AND gnral_alumnos.id_carrera=gnral_carreras.id_carrera
            AND gnral_alumnos.id_semestre=gnral_semestres.id_semestre
            AND gnral_personales.id_personal=exp_asigna_tutor.id_personal
            AND exp_asigna_tutor.id_asigna_generacion=exp_asigna_generacion.id_asigna_generacion
            AND exp_asigna_alumnos.id_alumno='.$request->id);

        $data['areas']= areas_canalizacion::all();
        $data['subareas']= subareas_canalizacion::all();
        return $data;
    }
    public  function verestrategia(Request $request)
    {
        $data['planeacion']=Plan_asigna_planeacion_tutor::where('id_asigna_planeacion_tutor',$request->id)->get();
        return $data;
    }
    public  function versugerencia(Request $request)
    {
        $data['sugerencia']=Plan_asigna_planeacion_tutor::where('id_asigna_planeacion_tutor',$request->id)->get();
        $data['actividad']=Plan_actividades::where('id_plan_actividad',$request->id_actividad)->get();
        return $data;
    }

    public function actualiza(Request $request)
    {
        $generales = Exp_generale::find($request->alu['generales']['id_exp_general']);
        $generales->update($request->alu['generales']);
        $academicos = Exp_antecedentes_academico::find($request->alu['academicos']['id_exp_antecedentes_academicos']);
        $academicos->update($request->alu['academicos']);
        $familiares = Exp_datos_familiare::find($request->alu['familiares']['id_exp_datos_familiares']);
        $familiares->update($request->alu['familiares']);
        $estudio = Exp_habitos_estudio::find($request->alu['estudio']['id_exp_habitos_estudio']);
        $estudio->update($request->alu['estudio']);
        $integral = Exp_formacion_integral::find($request->alu['integral']['id_exp_formacion_integral']);
        $integral->update($request->alu['integral']);
        $area = Exp_area_psicopedagogica::find($request->alu['area']['id_exp_area_psicopedagogica']);
        $area->update($request->alu['area']);

        return('ok');
    }
    public function actualizaestrategia(Request $request)
    {

        $planeacion = Plan_asigna_planeacion_tutor::find($request->estra['planeacion']['id_asigna_planeacion_tutor']);

        $planeacion->update($request->estra['planeacion']);

        return('ok');
    }
    public function actualizasugerencia(Request $request)
    {
        $sugerencia = Plan_asigna_planeacion_tutor::find($request->suge['sugerencia']['id_asigna_planeacion_tutor']);
        $sugerencia->update($request->suge['sugerencia']);
        return('ok');
    }

    public function show($id)
    {

    }
    public function edit($id)
    {

    }
    public function cerrar()
    {
        //
        Session::flush();
    }
    public function update(Request $request, $id)
    {

    }
    public function destroy($id)
    {

    }
}
