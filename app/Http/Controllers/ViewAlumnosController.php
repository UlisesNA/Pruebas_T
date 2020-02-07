<?php

namespace App\Http\Controllers;

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

        $nombre=array("nombre" => $request->nombre);
        $no_cuenta=array("noC" => $request->no_cuenta);
        $id_carrera=array( "carrera"=>$request->carrera);
        $sexo=array("sexo" => $request->sexo);
        $id_estado_civil=array("EC" => $request->estado_civil);
        $no_hijos=array( "nh" => $request->no_hijos);
        $no_hermanos=array("nh" => $request->no_hermanos);
        $enfermedad_cronica=array( "enferCron" => $request->enferCron);
        $trabaja=array("trabaja" => $request->trabaja);
        $practica_deporte=array( "depo" => $request->depo);
        $actividades_culturales=array( "actC" => $request->actC);
        $etnia_indigena=array("etnia" => $request->etnia);
        $lugar_nacimientos=array("ln" => $request->lugar_nacimiento);
        $id_nivel_economico=array( "NSE" => $request->nivel_socioeconomico);
        $sostiene_economia_hogar=array( "sostiene" => $request->sosten_hogar);
        $tegusta_carrera_elegida=array( "cae" => $request->cae);
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
        $id_carr=implode($id_carrera);
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

       /* DB::select('call algoritmo_insert(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',array($nom,$no_cue,$id_carr,$sex,$id_estado,
            $no_hijo,$no_hermano, $enfermedad,$trabajo,$practica_dep,$actividad_cult,$etnia_ind,$lugar_nac,$id_nivel_eco,$sotiene,
            $tegusta,$bec,$estad,$scal,$pob,$ante,$sat,$ma_re,$to_r,$mat_e,$t_e,$g_e));
        return $area;*/
    }

    public  function veralumno(Request $request)
    {
        $data['generales']=Exp_generale::where('id_alumno',$request->id)->get();
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

        $nombre=array("nombre" => $request->nombre);
        $no_cuenta=array("noC" => $request->no_cuenta);
        $id_carrera=array( "carrera"=>$request->carrera);
        $sexo=array("sexo" => $request->sexo);
        $id_estado_civil=array("EC" => $request->estado_civil);
        $no_hijos=array( "nh" => $request->no_hijos);
        $no_hermanos=array("nh" => $request->no_hermanos);
        $enfermedad_cronica=array( "enferCron" => $request->enferCron);
        $trabaja=array("trabaja" => $request->trabaja);
        $practica_deporte=array( "depo" => $request->depo);
        $actividades_culturales=array( "actC" => $request->actC);
        $etnia_indigena=array("etnia" => $request->etnia);
        $lugar_nacimientos=array("ln" => $request->lugar_nacimiento);
        $id_nivel_economico=array( "NSE" => $request->nivel_socioeconomico);
        $sostiene_economia_hogar=array( "sostiene" => $request->sosten_hogar);
        $tegusta_carrera_elegida=array( "cae" => $request->cae);
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
        $id_carr=implode($id_carrera);
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

        DB::select('call algoritmo_update(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',array($nom,$no_cue,$id_carr,$sex,$id_estado,
            $no_hijo,$no_hermano, $enfermedad,$trabajo,$practica_dep,$actividad_cult,$etnia_ind,$lugar_nac,$id_nivel_eco,$sotiene,
            $tegusta,$bec,$estad,$scal,$pob,$ante,$sat,$ma_re,$to_r,$mat_e,$t_e,$g_e));
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
