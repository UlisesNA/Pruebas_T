<?php

namespace App\Http\Controllers;

use App\AsignaExpediente;
use App\Exp_antecedentes_academico;
use App\Exp_area_psicopedagogica;
use App\Exp_asigna_expediente;
use App\Exp_bachillerato;
use App\Exp_civil_estado;
use App\Exp_datos_familiare;
use App\Exp_escalas;
use App\Exp_familia_union;
use App\Exp_formacion_integral;
use App\Exp_opc_intelectual;
use App\Exp_opcintelectual;
use App\Exp_generale;
use App\Exp_habitos_estudio;
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
use DB;
class ViewAlumnosController extends Controller
{
    public function generapdf()
    {
        $alumnos=Exp_asigna_expediente::all();

        return view('profesor.generapdf',compact('alumnos'));
    }
    public function index()
    {

       // dd(Auth::user());
        /*
        $alumno = gnral_alumnos:: where ('id_usuario', Auth::user()->id)->count();
        if ($alumno==0)
        {
            $exp_generale=Exp_generale::create(array());
            $exp_antecedentes_academico=Exp_antecedentes_academico::create(array());
            $exp_datos_familiare=Exp_datos_familiare::create(array());
            $exp_habitos_estudio=Exp_habitos_estudio::create(array());
            $exp_formacion_integral=Exp_formacion_integral::create(array());
            $exp_area_psicopedagogica=Exp_area_psicopedagogica::create(array());

            $id_alumno=Auth::user()->id;
            $obtenerid=gnral_alumnos::create(array('id_usuario'=>$id_alumno));


            $exp_asigna_expediente = array(
                "id_exp_general" => $exp_generale->id_exp_general,
                "id_exp_antecedentes_academicos" => $exp_antecedentes_academico->id_exp_antecedentes_academicos,
                "id_exp_datos_familiares" => $exp_datos_familiare->id_exp_datos_familiares,
                "id_exp_habitos_estudio" => $exp_habitos_estudio->id_exp_habitos_estudio,
                "id_exp_formacion_integral" => $exp_formacion_integral->id_exp_formacion_integral,
                "id_exp_area_psicopedagogica" => $exp_area_psicopedagogica->id_exp_area_psicopedagogica,
                "id_alumno" => $obtenerid -> $id_alumno
            );
            Exp_asigna_expediente::create($exp_asigna_expediente);

           // dd("ok");
        }*/

       // dd($alumno);


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
        $parentesco = Exp_parentesco::all();
        $escala = Exp_escalas::all();


        return view('alumno.expediente')->with(compact('carreras', 'grupos', 'periodos', 'datos',
            'semestres', 'estadocivil', 'niveleconomico', 'bachillerato', 'vive', 'familiaunion', 'turno', 'tiempoestudia', 'intelectual', 'parentesco', 'escala'));
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
      /* request()->validate([
            "id_carrera"=>"required",
            "id_periodo" => "required",
            "id_grupo" => "required",
            "nombre" => "required",
            "edad" => "required",
            "sexo" => "required",
            "fecha_nacimientos" => "required",
            "lugar_nacimientos" => "required",
            "id_semestre" => "required",
            "id_estado_civil" => "required",
            "no_hijos" => "required",
            "direccion" =>"required",
            "correo" => "required",
            "cel" => "required",
            "id_nivel_economico" => "required",
            "trabaja" => "required",
            "no_cuenta" => "required",
            "beca" => "required",
            "estado" => "required",
            "turno" => "required",
            "poblacion"=> "required",
            "ant_inst"=> "required",
            "satisfaccion_c"=> "required",
            "materias_repeticion"=>"required",
            "tot_repe"=>"required",
            "materias_especial"=>"required",
            "tot_espe"=>"required",
            "gen_espe"=>"required",
            "id_bachillerato" => "required",
            "otros_estudios" => "required",
            "anos_curso_bachillerato" => "required",
            "ano_terminacion" =>"required",
            "escuela_procedente" => "required",
            "materias_reprobadas" =>"required",
            "otra_carrera_ini" => "required",
            "interrupciones_estudios" => "required",
            "razon_descide_estudiar_tesvb" =>"required",
            "sabedel_perfil_profesional" => "required",
            "otras_opciones_vocales" => "required",
            "tegusta_carrera_elegida" => "required",
            "porque_carrera_elegida" => "required",
            "suspension_estudios_bachillerato" =>"required",
            "teestimula_familia" =>"required",
            "nombre_padre" => "required",
            "edad_padre" => "required",
            "ocupacion_padre" => "required",
            "lugar_residencia_padre" => "required",
            "nombre_madre" => "required",
            "edad_madre" => "required",
            "ocupacion_madre" => "required",
            "lugar_residencia_madre" => "required",
            "no_hermanos" => "required",
            "id_opc_vives" =>"required",
            "no_personas" => "required",
            "etnia_indigena" => "required",
            "sostiene_economia_hogar" => "required",
            "id_familia_union" => "required",
            "nombre_tutor" => "required",
            "id_parentesco" =>"required",
            "tiempo_empelado_estudiar" => "required",
            "id_opc_intelectual" => "required",
            "forma_estudio" => "required",
            "tiempo_libre" => "required",
            "asignatura_preferida" =>"required",
            "porque_asignatura" => "required",
            "asignatura_dificil" => "required",
            "porque_asignatura_dificil" => "required",
            "opinion_tu_mismo_estudiante" => "required",
            "practica_deporte" =>"required",
            "practica_artistica" => "required",
            "id_escala"=>"required",
            "pasatiempo" => "required",
            "actividades_culturales" => "required",
            "estado_salud" => "required",
            "enfermedad_cronica" => "required",
            "enf_cron_padre" => "required",
            "operacion" => "required",
            "enfer_visual" => "required",
            "usas_lentes" => "required",
            "medicamento_controlado" => "required",
            "estatura" => "required",
            "peso" => "required",
            "accidente_grave" =>"required",
            "rendimiento_escolar" => "required",
            "dominio_idioma" => "required",
            "otro_idioma" => "required",
            "conocimiento_compu" =>"required",
            "aptitud_especial" =>"required",
            "comprension" => "required",
            "preparacion" =>"required",
            "estrategias_aprendizaje" => "required",
            "organizacion_actividades" =>"required",
            "concentracion" =>"required",
            "solucion_problemas" =>"required",
            "condiciones_ambientales" => "required",
            "busqueda_bibliografica" => "required",
            "trabajo_equipo" =>"required"
        ],
            [
                'id_carrera.required' => 'El campo no puede quedar vacio',
                'id_periodo.required' => 'El campo no puede quedar vacio',
                'id_grupo.required' => 'El campo no puede quedar vacio',
                'nombre.required' => 'El campo no puede quedar vacio',
                'edad.required' => 'El campo  no puede quedar vacio',
                'sexo.required' => 'El campo no puede quedar vacio',
                'fecha_nacimientos.required' => 'El campo no puede quedar vacio',
                'lugar_nacimientos.required' => 'El campo no puede quedar vacio',
                'id_semestre.required' => 'El campo no puede quedar vacio',
                'id_estado_civil.required' => 'El campo no puede quedar vacio',
                'no_hijos.required' => 'El campo no puede quedar vacio',
                'direccion.required' => 'El campo no puede quedar vacio',
                'correo.required' => 'El campo no puede quedar vacio',
                'cel.required' => 'El campo no puede quedar vacio',
                'id_nivel_economico.required' => 'El campo no puede quedar vacio',
                'trabaja.required' => 'El campo no puede quedar vacio',
                'no_cuenta.required' => 'El campo no puede quedar vacio',
                'beca.required' => 'El campo no puede quedar vacio',
                'estado.required' => 'El campo no puede quedar vacio',
                'turno.required' => 'El campo no puede quedar vacio',
                'poblacion.required' => 'El campo no puede quedar vacio',
                'ant_inst.required' => 'El campo no puede quedar vacio',
                'satisfaccion_c.required'=>'El campo no puede quedar vacio',
                'materias_repeticion.required'=>'El campo no puede quedar vacio',
                'tot_repe.required'=>'El campo no puede quedar vacio',
                'materias_especial.required'=>'El campo no puede quedar vacio',
                'tot_espe.required'=>'El campo no puede quedar vacio',
                'gen_espe.required'=>'El campo no puede quedar vacio',
                'id_bachillerato.required'=>'El campo no puede quedar vacio',
                'otros_estudios.required'=>'El campo no puede quedar vacio',
                'anos_curso_bachillerato.required'=>'El campo no puede quedar vacio',
                'ano_terminacion.required'=>'El campo no puede quedar vacio',
                'escuela_procedente.required'=>'El campo no puede quedar vacio',
                'materias_reprobadas.required'=>'El campo no puede quedar vacio',
                'otra_carrera_ini.required'=>'El campo no puede quedar vacio',
                'interrupciones_estudios.required' => 'El campo no puede quedar vacio',
                'razon_descide_estudiar_tesvb.required' => 'El campo no puede quedar vacio',
                'sabedel_perfil_profesional.required' => 'El campo no puede quedar vacio',
                'otras_opciones_vocales.required' => 'El campo no puede quedar vacio',
                'tegusta_carrera_elegida.required' => 'El campo no puede quedar vacio',
                'porque_carrera_elegida.required' => 'El campo no puede quedar vacio',
                'suspension_estudios_bachillerato.required' => 'El campo no puede quedar vacio',
                'teestimula_familia.required' => 'El campo no puede quedar vacio',
                'nombre_padre.required' =>'El campo no puede quedar vacio',
                'edad_padre.required' =>'El campo no puede quedar vacio',
                'ocupacion_padre.required' => 'El campo no puede quedar vacio',
                'lugar_residencia_padre.required' => 'El campo no puede quedar vacio',
                'nombre_madre.required' => 'El campo no puede quedar vacio',
                'edad_madre.required' =>'El campo no puede quedar vacio',
                'ocupacion_madre.required' => 'El campo no puede quedar vacio',
                'lugar_residencia_madre.required' => 'El campo no puede quedar vacio',
                'no_hermanos.required' => 'El campo no puede quedar vacio',
                'id_opc_vives.required' =>'El campo no puede quedar vacio',
                'no_personas.required' => 'El campo no puede quedar vacio',
                'etnia_indigena.required' => 'El campo no puede quedar vacio',
                'sostiene_economia_hogar.required' => 'El campo no puede quedar vacio',
                'id_familia_union.required' => 'El campo no puede quedar vacio',
                'nombre_tutor.required' => 'El campo no puede quedar vacio',
                'id_parentesco.required' => 'El campo no puede quedar vacio',
                'tiempo_empelado_estudiar.required' => 'El campo no puede quedar vacio',
                'id_opc_intelectual.required' => 'El campo no puede quedar vacio',
                'forma_estudio.required' =>'El campo no puede quedar vacio',
                'tiempo_libre.required' => 'El campo no puede quedar vacio',
                'asignatura_preferida.required' => 'El campo no puede quedar vacio',
                'porque_asignatura.required' =>'El campo no puede quedar vacio',
                'asignatura_dificil.required' => 'El campo no puede quedar vacio',
                'porque_asignatura_dificil.required' => 'El campo no puede quedar vacio',
                'opinion_tu_mismo_estudiante.required' => 'El campo no puede quedar vacio',
                'practica_deporte.required' =>'El campo no puede quedar vacio',
                'practica_artistica.required' => 'El campo no puede quedar vacio',
                'id_escala.required'=>'El campo no puede quedar vacio',
                'pasatiempo.required' => 'El campo no puede quedar vacio',
                'actividades_culturales.required' => 'El campo no puede quedar vacio',
                'estado_salud.required' => 'El campo no puede quedar vacio',
                'enfermedad_cronica.required' => 'El campo no puede quedar vacio',
                'enf_cron_padre.required' =>'El campo no puede quedar vacio',
                'operacion.required' =>'El campo no puede quedar vacio',
                'enfer_visual.required' => 'El campo no puede quedar vacio',
                'usas_lentes.required' =>'El campo no puede quedar vacio',
                'medicamento_controlado.required' => 'El campo no puede quedar vacio',
                'estatura.required' => 'El campo no puede quedar vacio',
                'peso.required' => 'El campo no puede quedar vacio',
                'accidente_grave.required' =>'El campo no puede quedar vacio',
                'rendimiento_escolar.required' =>'El campo no puede quedar vacio',
                'dominio_idioma.required' => 'El campo no puede quedar vacio',
                'otro_idioma.required' =>'El campo no puede quedar vacio',
                'conocimiento_compu.required' => 'El campo no puede quedar vacio',
                'aptitud_especial.required' => 'El campo no puede quedar vacio',
                'comprension.required' => 'El campo no puede quedar vacio',
                'preparacion.required' =>'El campo no puede quedar vacio',
                'estrategias_aprendizaje.required' => 'El campo no puede quedar vacio',
                'organizacion_actividades.required' => 'El campo no puede quedar vacio',
                'concentracion.required' => 'El campo no puede quedar vacio',
                'solucion_problemas.required' => 'El campo no puede quedar vacio',
                'condiciones_ambientales.required' => 'El campo no puede quedar vacio',
                'busqueda_bibliografica.required' => 'El campo no puede quedar vacio',
                'trabajo_equipo.required' => 'El campo no puede quedar vacio',
            ]);*/
        $exp_generale = array(
            "id_carrera"=>$request->id_carrera,
            "id_periodo" => $request->id_periodo,
            "id_grupo"=>$request->id_grupo,
            "nombre" => $request->nombre,
            "edad" => $request->edad,
            "sexo" => $request->sexo,
            "fecha_nacimientos" => $request->fecha_nacimientos,
            "lugar_nacimientos" => $request->lugar_nacimientos,
            "id_semestre" => $request->id_semestre,
            "id_estado_civil" => $request->id_estado_civil,
            "no_hijos" => $request->no_hijos,
            "direccion" => $request->direccion,
            "correo" => $request->correo,
            "tel_casa" => $request->tel_casa,
            "cel" => $request->cel,
            "id_nivel_economico" => $request->id_nivel_economico,
            "trabaja" => $request->trabaja,
            "ocupacion" => $request->ocupacion,
            "horario" => $request->horario,
            "no_cuenta" => $request->no_cuenta,
            "beca" => $request->beca,
            "tipo_beca" => $request->tipo_beca,
            "estado" => $request->estado,
            "turno" => $request->turno,
            "poblacion"=> $request->poblacion,
            "ant_inst"=> $request->ant_inst,
            "satisfaccion_c"=> $request->satisfaccion_c,
            "materias_repeticion"=> $request->materias_repeticion,
            "tot_repe"=> $request->tot_repe,
            "materias_especial"=> $request->materias_especial,
            "tot_espe"=> $request->tot_espe,
            "gen_espe"=> $request->gen_espe
        );
        $exp_antecedentes_academico = array(
            "id_bachillerato" => $request->id_bachillerato,
            "otros_estudios" => $request->otros_estudios,
            "anos_curso_bachillerato" => $request->anos_curso_bachillerato,
            "ano_terminacion" => $request->ano_terminacion,
            "escuela_procedente" => $request->escuela_procedente,
            "promedio" => $request->promedio,
            "materias_reprobadas" => $request->materias_reprobadas,
            "otra_carrera_ini" => $request->otra_carrera_ini,
            "institucion" => $request->institucion,
            "semestres_cursados" => $request->semestres_cursados,
            "interrupciones_estudios" => $request->interrupciones_estudios,
            "razones_interrupcion" => $request->razones_interrupcion,
            "razon_descide_estudiar_tesvb" => $request->razon_descide_estudiar_tesvb,
            "sabedel_perfil_profesional" => $request->sabedel_perfil_profesional,
            "otras_opciones_vocales" => $request->otras_opciones_vocales,
            "cuales_otras_opciones_vocales" => $request->cuales_otras_opciones_vocales,
            "tegusta_carrera_elegida" => $request->tegusta_carrera_elegida,
            "porque_carrera_elegida" => $request->porque_carrera_elegida,
            "suspension_estudios_bachillerato" => $request->suspension_estudios_bachillerato,
            "razones_suspension_estudios" => $request->razones_suspension_estudios,
            "teestimula_familia" => $request->teestimula_familia

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
            "lugar_ocupas" => $request->lugar_ocupas,
            "id_opc_vives" => $request->id_opc_vives,
            "no_personas" => $request->no_personas,
            "etnia_indigena" => $request->etnia_indigena,
            "cual_etnia" => $request->cual_etnia,
            "hablas_lengua_indigena" => $request->hablas_lengua_indigena,
            "sostiene_economia_hogar" => $request->sostiene_economia_hogar,
            "id_familia_union" => $request->id_familia_union,
            "nombre_tutor" => $request->nombre_tutor,
            "id_parentesco" => $request->id_parentesco

        );
        $exp_habitos_estudio = array(
            "tiempo_empelado_estudiar" => $request->tiempo_empelado_estudiar,
            "id_opc_intelectual" => $request->id_opc_intelectual,
            "forma_estudio" => $request->forma_estudio,
            "tiempo_libre" => $request->tiempo_libre,
            "asignatura_preferida" => $request->asignatura_preferida,
            "porque_asignatura" => $request->porque_asignatura,
            "asignatura_dificil" => $request->asignatura_dificil,
            "porque_asignatura_dificil" => $request->porque_asignatura_dificil,
            "opinion_tu_mismo_estudiante" => $request->opinion_tu_mismo_estudiante
        );
        $exp_formacion_integral = array(
            "practica_deporte" => $request->practica_deporte,
            "especifica_deporte" => $request->especifica_deporte,
            "practica_artistica" => $request->practica_artistica,
            "especifica_artistica" => $request->especifica_artistica,
            "pasatiempo" => $request->pasatiempo,
            "actividades_culturales" => $request->actividades_culturales,
            "cuales_act" => $request->cuales_act,
            "estado_salud" => $request->estado_salud,
            "enfermedad_cronica" => $request->enfermedad_cronica,
            "especifica_enf_cron" => $request->especifica_enf_cron,
            "enf_cron_padre" => $request->enf_cron_padre,
            "especifica_enf_cron_padres" => $request->especifica_enf_cron_padres,
            "operacion" => $request->operacion,
            "deque_operacion" => $request->deque_operacion,
            "enfer_visual" => $request->enfer_visual,
            "especifica_enf" => $request->especifica_enf,
            "usas_lentes" => $request->usas_lentes,
            "medicamento_controlado" => $request->medicamento_controlado,
            "especifica_medicamento" => $request->especifica_medicamento,
            "estatura" => $request->estatura,
            "peso" => $request->peso,
            "accidente_grave" => $request->accidente_grave,
            "relata_breve" => $request->relata_breve,
            "id_escala"=>$request->id_escala

        );
        $exp_area_psicopedagogica = array(
            "rendimiento_escolar" => $request->rendimiento_escolar,
            "dominio_idioma" => $request->dominio_idioma,
            "otro_idioma" => $request->otro_idioma,
            "conocimiento_compu" => $request->conocimiento_compu,
            "aptitud_especial" => $request->aptitud_especial,
            "comprension" => $request->comprension,
            "preparacion" => $request->preparacion,
            "estrategias_aprendizaje" => $request->estrategias_aprendizaje,
            "organizacion_actividades" => $request->organizacion_actividades,
            "concentracion" => $request->concentracion,
            "solucion_problemas" => $request->solucion_problemas,
            "condiciones_ambientales" => $request->condiciones_ambientales,
            "busqueda_bibliografica" => $request->busqueda_bibliografica,
            "trabajo_equipo" => $request->trabajo_equipo

        );

        $exp_generale=Exp_generale::create($exp_generale);
        $exp_antecedentes_academico=Exp_antecedentes_academico::create($exp_antecedentes_academico);
        $exp_datos_familiare=Exp_datos_familiare::create($exp_datos_familiare);
        $exp_habitos_estudio=Exp_habitos_estudio::create($exp_habitos_estudio);
        $exp_formacion_integral=Exp_formacion_integral::create($exp_formacion_integral);
        $exp_area_psicopedagogica=Exp_area_psicopedagogica::create($exp_area_psicopedagogica);


        $id_alumno=Auth::user()->id;
        $obtenerid=gnral_alumnos::create(array('id_usuario'=>$id_alumno));


        $exp_asigna_expediente = array(
            "id_exp_general" => $exp_generale->id_exp_general,
            "id_exp_antecedentes_academicos" => $exp_antecedentes_academico->id_exp_antecedentes_academicos,
            "id_exp_datos_familiares" => $exp_datos_familiare->id_exp_datos_familiares,
            "id_exp_habitos_estudio" => $exp_habitos_estudio->id_exp_habitos_estudio,
            "id_exp_formacion_integral" => $exp_formacion_integral->id_exp_formacion_integral,
            "id_exp_area_psicopedagogica" => $exp_area_psicopedagogica->id_exp_area_psicopedagogica,
            "id_alumno" => $obtenerid -> id_alumno
        );
        Exp_asigna_expediente::create($exp_asigna_expediente);



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

        DB::select('call algoritmo(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',array($nom,$no_cue,$sex,$id_estado,$no_hijo,$no_hermano,$enfermedad,
            $trabajo,$practica_dep,$actividad_cult,$etnia_ind,$lugar_nac,$id_nivel_eco,$sotiene,$id_carr,$tegusta,$bec,$estad,$scal,
            $pob,$ante,$sat,$ma_re,$to_r,$mat_e,$t_e,$g_e));

        return 'panel';
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
