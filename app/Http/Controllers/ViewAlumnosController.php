<?php

namespace App\Http\Controllers;

use App\AsignaExpediente;
use App\Exp_antecedentes_academico;
use App\Exp_area_psicopedagogica;
use App\Exp_asigna_expediente;
use App\Exp_bachillerato;
use App\Exp_bebidas;
use App\Exp_civil_estado;
use App\Exp_datos_familiare;
use App\Exp_escalas;
use App\Exp_familia_union;
use App\Exp_formacion_integral;
use App\Exp_formatrabajo;
use App\Exp_generale;
use App\Exp_habitos_estudio;
use App\Exp_opc_intelectual;
use App\Exp_opc_nivel_socio;
use App\Exp_opc_vives;
use App\Exp_parentesco;
use App\Exp_tiempoestudia;
use App\Exp_turno;
use App\gnral_alumnos;
use App\Gnral_carreras;
use App\Gnral_grupos;
use App\Gnral_periodos;
use App\Gnral_semestre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class ViewAlumnosController extends Controller
{
    public  function generapdf(){
        $alumnos=Exp_asigna_expediente::all();
        return view('profesor.generapdf',compact('alumnos'));
    }
    public function index()
    {
        $datos = AsignaExpediente::getDatos();
        $carreras = Gnral_carreras::all();
        $grupos = Gnral_grupos::all();
        $periodos = Gnral_periodos::all();
        $semestres = Gnral_semestre::all();
        $estadocivil = Exp_civil_estado::all();
        $niveleconomico = Exp_opc_nivel_socio::all();
        $bachillerato = Exp_bachillerato::all();
        $vive = Exp_opc_vives::all();
        $familiaunion = Exp_familia_union::all();
        $turno = Exp_turno::all();
        $tiempoestudia = Exp_tiempoestudia::all();
        $intelectual = Exp_opc_intelectual::all();
        $parentesco=Exp_parentesco::all();
        $escala=Exp_escalas::all();
        $bebidas=Exp_bebidas::all();


        return view('alumnos.expediente')->with(compact('carreras', 'grupos', 'periodos', 'datos',
            'semestres', 'estadocivil', 'niveleconomico', 'bachillerato', 'vive', 'familiaunion', 'turno', 'tiempoestudia', 'intelectual','parentesco','escala','bebidas'));
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $alumno=DB::table('gnral_alumnos')
            ->select('id_alumno')
            ->where('id_usuario', '=', Auth::user()->id)
            ->get();


      //dd($request->carrera);
        $exp_generale = array(
            "id_carrera"=>$request->carrera,
            "id_periodo" => $request->periodo,
            "id_grupo"=>$request->grupo,
            "nombre" => $request->nombre,
            "edad" => $request->edad,
            "sexo" => $request->sexo,
            "fecha_nacimientos" => $request->fecha_nacimientos,
            "lugar_nacimientos" => $request->lugar_nacimientos,
            "id_semestre" => $request->semestre,
            "id_estado_civil" => $request->estado_civil,
            "no_hijos" => $request->no_hijos,
            "direccion" => $request->direccion,
            "correo" => $request->correo,
            "tel_casa" => $request->tel_casa,
            "cel" => $request->cel,
            "id_nivel_economico" => $request->nivel_socioeconomico,
            "trabaja" => $request->trabaja,
            "ocupacion" => $request->ocupacion,
            "horario" => $request->horario,
            "no_cuenta" => $request->no_cuenta,
            "beca" => $request->beca,
            "tipo_beca" => $request->tbeca,
            "estado" => $request->estado,
            "turno" => $request->turno,
            "poblacion"=> $request->poblacion,
            "ant_inst"=> $request->ant_inst,
            "satisfaccion_c"=> $request->satisfaccion_c,
            "materias_repeticion"=> $request->materias_repeticion,
            "tot_repe"=> $request->tot_repe,
            "materias_especial"=> $request->materias_especial,
            "tot_espe"=> $request->tot_espe,
            "gen_espe"=> $request->gen_espe,
            "id_alumno"=>$alumno[0]->id_alumno


        );
        $exp_antecedentes_academico = array(
            "id_bachillerato" => $request->bachillerato,
            "otros_estudios" => $request->otro_estudio,
            "anos_curso_bachillerato" => $request->ano_curso_bachillerato,
            "ano_terminacion" => $request->ano_terminacion,
            "escuela_procedente" => $request->escuela_procedencia,
            "promedio" => $request->promedio,
            "materias_reprobadas" => $request->materias_reprobadas,
            "otra_carrera_ini" => $request->otra_carrera_ini,
            "institucion" => $request->institucion,
            "semestres_cursados" => $request->semestre_cursado,
            "interrupciones_estudios" => $request->interrucpion_estudio,
            "razones_interrupcion" => $request->razones_interrupcion,
            "razon_descide_estudiar_tesvb" => $request->razon_decide_estudiar_tesvb,
            "sabedel_perfil_profesional" => $request->perfil,
            "otras_opciones_vocales" => $request->otras_opciones_vocacionales,
            "cuales_otras_opciones_vocales" => $request->cuales,
            "tegusta_carrera_elegida" => $request->tegusta_carrera_elegida,
            "porque_carrera_elegida" => $request->pq,
            "suspension_estudios_bachillerato" => $request->suspension_estudios_bachillerato,
            "razones_suspension_estudios" => $request->razonesSus,
            "teestimula_familia" => $request->te_estimula_familia,
             "id_alumno"=>$alumno[0]->id_alumno

        );
        $exp_datos_familiare = array(
            "nombre_padre" => $request->nombre_padre,
            "edad_padre" => $request->edad_padre,
            "ocupacion_padre" => $request->ocupacion_padre,
            "lugar_residencia_padre" => $request->lugar_residencia_padre,
            "nombre_madre" => $request->nombre_madre,
            "edad_madre" => $request->edad_madre,
            "ocupacion_madre" => $request->ocupacion_madre,
            "lugar_residencia_madre" => $request->lugar_residencia_madre,
            "no_hermanos" => $request->no_hermanos,
            "lugar_ocupas" => $request->lugar_que_ocupas,
            "id_opc_vives" => $request->actualmente_vives,
            "no_personas" => $request->no_persona,
            "etnia_indigena" => $request->etnia,
            "cual_etnia" => $request->cual_etnia,
            "hablas_lengua_indigena" => $request->hablas,
            "sostiene_economia_hogar" => $request->sosten_hogar,
            "id_familia_union" => $request->consideras_a_familia,
            "nombre_tutor" => $request->nombre_tutor,
            "id_parentesco" => $request->parentesco,
             "id_alumno"=>$alumno[0]->id_alumno

        );
        $exp_habitos_estudio = array(
            "tiempo_empelado_estudiar" => $request->tiempo_empleado_estudiar,
            "id_opc_intelectual" => $request->forma_trabajo,
            "forma_estudio" => $request->forma_estudio,
            "tiempo_libre" => $request->tiempo_libre,
            "asignatura_preferida" => $request->asigna_preferida,
            "porque_asignatura" => $request->porque_asignatura,
            "asignatura_dificil" => $request->asignatura_dificil,
            "porque_asignatura_dificil" => $request->porque_asignatura_dificil,
            "opinion_tu_mismo_estudiante" => $request->opinion_tu_mismo_estudiante,
            "id_alumno"=>$alumno[0]->id_alumno
        );
        $exp_formacion_integral = array(
            "practica_deporte" => $request->depo,
            "especifica_deporte" => $request->especifica1,
            "practica_artistica" => $request->artistica,
            "especifica_artistica" => $request->especifica2,
            "id_expbebidas" => $request->id_expbebidas,
            "actividades_culturales" => $request->actC,
            "cuales_act" => $request->cualesAc,
            "pasatiempo" => $request->pasatiempo,
            "estado_salud" => $request->estSalud,
            "enfermedad_cronica" => $request->enferCron,
            "especifica_enf_cron" => $request->especificarEnf,
            "enf_cron_padre" => $request->EnfPa,
            "especifica_enf_cron_padres" => $request->especificarEnfPa,
            "operacion" => $request->operacion,
            "deque_operacion" => $request->especificarOpe,
            "enfer_visual" => $request->EnVisual,
            "especifica_enf" => $request->especificarEnVisual,
            "usas_lentes" => $request->lentes,
            "medicamento_controlado" => $request->mediContro,
            "especifica_medicamento" => $request->especificarMed,
            "estatura" => $request->estatura,
            "peso" => $request->peso,
            "accidente_grave" => $request->accidente,
            "relata_breve" => $request->relata,
            "id_escala"=>$request->id_escala,
            "id_alumno"=>$alumno[0]->id_alumno

        );
        $exp_area_psicopedagogica = array(
            "rendimiento_escolar" => $request->rendimiento_escolar,
            "dominio_idioma" => $request->dominio,
            "otro_idioma" => $request->otro_idioma,
            "conocimiento_compu" => $request->conocimiento_computo,
            "aptitud_especial" => $request->aptitudes,
            "comprension" => $request->comprension,
            "preparacion" => $request->preparacion,
            "estrategias_aprendizaje" => $request->estrategias,
            "organizacion_actividades" => $request->organizacion_actividades,
            "concentracion" => $request->concentracion,
            "solucion_problemas" => $request->solucion,
            "condiciones_ambientales" => $request->condiciones,
            "busqueda_bibliografica" => $request->bibliografica,
            "trabajo_equipo" => $request->equipo,
            "id_alumno"=>$alumno[0]->id_alumno

        );

        $exp_generale=Exp_generale::create($exp_generale);
        $exp_antecedentes_academico=Exp_antecedentes_academico::create($exp_antecedentes_academico);
        $exp_datos_familiare=Exp_datos_familiare::create($exp_datos_familiare);
        $exp_habitos_estudio=Exp_habitos_estudio::create($exp_habitos_estudio);
        $exp_formacion_integral=Exp_formacion_integral::create($exp_formacion_integral);
        $exp_area_psicopedagogica=Exp_area_psicopedagogica::create($exp_area_psicopedagogica);


        //return( '/panel');
        $nombre =array("nombre" => $request->nombre);
        $no_cuenta=array("no_cuenta" => $request->no_cuenta);
        $sexo=array("sexo" => $request->sexo);
        $id_estado_civil=array("id_estado_civil" => $request->id_estado_civil);
        $no_hijos=array( "no_hijos" => $request->no_hijos,);
        $no_hermanos=array("no_hermanos" => $request->no_hermanos);
        $enfermedad_cronica=array( "enfermedad_cronica" => $request->enfermedad_cronica);
        $trabaja=array("trabaja" => $request->trabaja);
        $practica_deporte=array( "practica_deporte" => $request->practica_deporte);
        $actividades_culturales=array( "actividades_culturales" => $request->actividades_culturales);
        $etnia_indigena=array("etnia_indigena" => $request->etnia_indigena);
        $lugar_nacimientos=array("lugar_nacimientos" => $request->lugar_nacimientos);
        $id_nivel_economico=array( "id_nivel_economico" => $request->id_nivel_economico);
        $sostiene_economia_hogar=array( "sostiene_economia_hogar" => $request->sostiene_economia_hogar);
        $id_carrera=array( "id_carrera"=>$request->id_carrera);
        $tegusta_carrera_elegida=array( "tegusta_carrera_elegida" => $request->tegusta_carrera_elegida);
        $beca=array( "beca" => $request->beca);
        $estado=array("estado" => $request->estado);
        $scala=array( "id_escala"=>$request->id_escala);
        $pobla=array("poblacion"=> $request->poblacion);
        $ante_i=array("ant_inst"=> $request->ant_inst);
        $satis=array("satisfaccion_c"=> $request->satisfaccion_c);
        $mat_repe=array("materias_repeticion"=> $request->materias_repeticion);
        $tot_re=array("tot_repe"=> $request->tot_repe);
        $mat_espe=array("materias_especial"=> $request->materias_especial);
        $tot_esp=array("tot_espe"=> $request->tot_espe);
        $gen_es=array("gen_espe"=> $request->gen_espe);

        $nom=implode($nombre);
        $no_cue=implode($no_cuenta);
        $sex=implode($sexo);
        $id_estado=implode($id_estado_civil);
        $no_hijo=implode($no_hijos);
        $no_hermano=implode($no_hermanos);
        $enfermedad=implode($enfermedad_cronica);
        $trabajo=implode($trabaja);
        $practica_dep=implode($practica_deporte);
        $actividad_cult=implode($actividades_culturales);
        $etnia_ind=implode($etnia_indigena);
        $lugar_nac=implode($lugar_nacimientos);
        $id_nivel_eco=implode($id_nivel_economico);
        $sotiene=implode($sostiene_economia_hogar);
        $id_carr=implode($id_carrera);
        $tegusta=implode($tegusta_carrera_elegida);
        $bec=implode($beca);
        $estad=implode($estado);
        $scal=implode($scala);
        $pob=implode($pobla);
        $ante=implode($ante_i);
        $sat=implode($satis);
        $ma_re=implode($mat_repe);
        $to_r=implode($tot_re);
        $mat_e=implode($mat_espe);
        $t_e=implode($tot_esp);
        $g_e=implode($gen_es);

       /* DB::select('call algoritmo(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',array($nom,$no_cue,$sex,$id_estado,$no_hijo,$no_hermano,$enfermedad,
            $trabajo,$practica_dep,$actividad_cult,$etnia_ind,$lugar_nac,$id_nivel_eco,$sotiene,$id_carr,$tegusta,$bec,$estad,$scal,
            $pob,$ante,$sat,$ma_re,$to_r,$mat_e,$t_e,$g_e));*/

        //return view('alumno.hola');



    }

    public function updateExp(Request $request)
    {
        $exp_antecedentes_academico = array([
            "id_bachillerato" => $request->bachillerato,

        ]);
        Exp_antecedentes_academico::create($exp_antecedentes_academico);
        return 'panel';

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
