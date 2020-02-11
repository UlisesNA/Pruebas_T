<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf as FPDF;
use App\Reporte_tutor;
use DB;
/*class PDF extends FPDF
{
    function Header()
    {
        $this->Image('img/edomex.png',10,0,40,20);
        $this->Image('img/TESVB.png',145,3,28,11);
        $this->Image('img/edomex1.png',176,2,30,13);
        $this->Line(175,2.5,175,14);
    }
    function Footer()
    {
        $this->Image('img/pie.png', 0, $this->GetY(), 210,30);
    }
}*/
class ReporteController extends Controller
{
    public function index()
    {
        $pr=Auth::user()->email;
        $tabla=DB::table('exp_generacion')
            ->join('exp_asigna_generacion','exp_asigna_generacion.id_generacion','=','exp_generacion.id_generacion')
            ->join('exp_asigna_alumnos','exp_asigna_alumnos.id_asigna_generacion','=','exp_asigna_generacion.id_asigna_generacion')
            ->join('gnral_alumnos','gnral_alumnos.id_alumno','=','exp_asigna_alumnos.id_alumno')
            ->join('exp_asigna_tutor','exp_asigna_tutor.id_asigna_generacion','=','exp_asigna_generacion.id_asigna_generacion')
            ->join('gnral_personales','gnral_personales.id_personal','=','exp_asigna_tutor.id_personal')
            ->join('users','users.email','=','gnral_personales.correo')
            ->where('users.email','=',$pr)
            ->where('gnral_personales.id_perfil','=',7)
            ->groupBy('exp_generacion.generacion')
            ->select('exp_generacion.id_generacion','exp_generacion.generacion')
            ->get();
        //////////////////////
        $consulta=DB::table('reporte_tutor')
            ->join('exp_asigna_tutor', 'exp_asigna_tutor.id_asigna_tutor', '=', 'reporte_tutor.id_asigna_tutor')
            ->join('gnral_personales','gnral_personales.id_personal', '=', 'exp_asigna_tutor.id_personal')
            ->join('users','users.email','=','gnral_personales.correo')
            ->where('users.email','=',$pr)
            ->select('reporte_tutor.generacion','reporte_tutor.id_reporte_tutor as id','reporte_tutor.n_cuenta as cuenta','reporte_tutor.alumno as alum','reporte_tutor.appaterno as ap',
                'reporte_tutor.apmaterno as am','reporte_tutor.tutoria_grupal as tg',
                'reporte_tutor.tutoria_individual as ti','reporte_tutor.beca  as beca','reporte_tutor.repeticion as repe',
                'reporte_tutor.especial as espe','reporte_tutor.academico as aca','reporte_tutor.medico  as med',
                'reporte_tutor.psicologico as ps','reporte_tutor.baja as baja')
            ->get();
        return view('profesor.reporte',compact("consulta","tabla"));
    }
    public function store(Request $request)
    {
        $activa = array("activador"=>$request->activador,);
        $acti=implode($activa);
        $email=Auth::user()->email;
        $users = DB::table('users')
            ->join('gnral_personales', 'users.email', '=', 'gnral_personales.correo')
            ->where('users.email','=',$email)
            ->select('gnral_personales.id_personal')
            ->get();
        DB::select('call reportes(?,?)',array($acti,$users));
    }
    public function edit($id)
    {
        $c = Reporte_tutor::find($id);
        return view('profesor.edit_reporte', compact('c'));
    }
    public function update(Request $request, $id)
    {
        $c = Reporte_tutor::find($id);
        $c->tutoria_grupal = $request->get('tutoria_grupal');
        $c->tutoria_individual=$request->get('tutoria_individual');
        $c->beca=$request->get('beca');
        $c->repeticion=$request->get('repeticion');
        $c->especial=$request->get('especial');
        $c->academico=$request->get('academico');
        $c->medico=$request->get('medico');
        $c->psicologico=$request->get('psicologico');
        $c->baja=$request->get('baja');
        $c->observaciones=$request->get('observaciones');
        $c->save();
        return redirect()->to('reporte');
    }
   /*public function destroy($id)
    {
    }
    public function reporte_pdf()
    {
        $pr=Auth::user()->email;
        $fecha=DB::select('select Date_format(now(),"%d/%m/%Y") as fecha');
        ////encabezado
        $encabezado=DB::table('reporte_tutor')
            ->join('exp_asigna_tutor', 'exp_asigna_tutor.id_asigna_tutor', '=', 'reporte_tutor.id_asigna_tutor')
            ->join('gnral_personales','gnral_personales.id_personal', '=', 'exp_asigna_tutor.id_personal')
            ->join('exp_asigna_generacion','exp_asigna_generacion.id_asigna_generacion','=','exp_asigna_tutor.id_asigna_generacion')
            ->join('exp_asigna_alumnos','exp_asigna_alumnos.id_asigna_generacion','=','exp_asigna_generacion.id_asigna_generacion')
            ->join('gnral_alumnos','gnral_alumnos.id_alumno','=','exp_asigna_alumnos.id_alumno')
            ->join('gnral_carreras','gnral_carreras.id_carrera','=','gnral_alumnos.id_carrera')
            ->join('gnral_grupos','gnral_grupos.id_grupo','=','gnral_alumnos.grupo')
            ->join('gnral_jefes_periodos','gnral_jefes_periodos.id_jefe_periodo','=','exp_asigna_tutor.id_jefe_periodo')
            ->join('gnral_periodos','gnral_periodos.id_periodo','=','gnral_jefes_periodos.id_periodo')
            ->join('users','users.email','=','gnral_personales.correo')
            ->where('users.email','=',$pr)
            ->select('gnral_carreras.nombre','gnral_grupos.grupo','gnral_periodos.periodo')
            ->get();
        /// contenido de la tabla
        $consulta=DB::table('reporte_tutor')
            ->join('exp_asigna_tutor', 'exp_asigna_tutor.id_asigna_tutor', '=', 'reporte_tutor.id_asigna_tutor')
            ->join('gnral_personales','gnral_personales.id_personal', '=', 'exp_asigna_tutor.id_personal')
            ->join('users','users.email','=','gnral_personales.correo')
            ->where('users.email','=',$pr)
            ->select('gnral_personales.nombre','reporte_tutor.n_cuenta','reporte_tutor.alumno','reporte_tutor.appaterno',
                'reporte_tutor.apmaterno','reporte_tutor.tutoria_grupal',
                'reporte_tutor.tutoria_individual','reporte_tutor.beca','reporte_tutor.repeticion',
                'reporte_tutor.especial','reporte_tutor.academico','reporte_tutor.medico',
                'reporte_tutor.psicologico','reporte_tutor.baja','reporte_tutor.observaciones')
            ->get();
        /// Resultados de la tabla
        $totales1 = DB::table('reporte_tutor')
            ->join('exp_asigna_tutor', 'exp_asigna_tutor.id_asigna_tutor', '=', 'reporte_tutor.id_asigna_tutor')
            ->join('gnral_personales','gnral_personales.id_personal', '=', 'exp_asigna_tutor.id_personal')
            ->join('users','users.email','=','gnral_personales.correo')
            ->where('users.email','=',$pr)
            ->select(DB::raw("count(reporte_tutor.tutoria_grupal) AS grupal"))
            ->get();
        $totales2 = DB::table('reporte_tutor')
            ->join('exp_asigna_tutor', 'exp_asigna_tutor.id_asigna_tutor', '=', 'reporte_tutor.id_asigna_tutor')
            ->join('gnral_personales','gnral_personales.id_personal', '=', 'exp_asigna_tutor.id_personal')
            ->join('users','users.email','=','gnral_personales.correo')
            ->where('users.email','=',$pr)
            ->select(DB::raw("count(reporte_tutor.tutoria_individual) AS individual"))
            ->get();
        $totales3 = DB::table('reporte_tutor')
            ->join('exp_asigna_tutor', 'exp_asigna_tutor.id_asigna_tutor', '=', 'reporte_tutor.id_asigna_tutor')
            ->join('gnral_personales','gnral_personales.id_personal', '=', 'exp_asigna_tutor.id_personal')
            ->join('users','users.email','=','gnral_personales.correo')
            ->where('users.email','=',$pr)
            ->select(DB::raw("count(reporte_tutor.beca) AS beca"))
            ->get();
        $totales4 = DB::table('reporte_tutor')
            ->join('exp_asigna_tutor', 'exp_asigna_tutor.id_asigna_tutor', '=', 'reporte_tutor.id_asigna_tutor')
            ->join('gnral_personales','gnral_personales.id_personal', '=', 'exp_asigna_tutor.id_personal')
            ->join('users','users.email','=','gnral_personales.correo')
            ->where('users.email','=',$pr)
            ->select(DB::raw("count(reporte_tutor.repeticion) AS repe"))
            ->get();
        $totales5 = DB::table('reporte_tutor')
            ->join('exp_asigna_tutor', 'exp_asigna_tutor.id_asigna_tutor', '=', 'reporte_tutor.id_asigna_tutor')
            ->join('gnral_personales','gnral_personales.id_personal', '=', 'exp_asigna_tutor.id_personal')
            ->join('users','users.email','=','gnral_personales.correo')
            ->where('users.email','=',$pr)
            ->select(DB::raw("count(reporte_tutor.especial) AS espe"))
            ->get();
        $totales6 = DB::table('reporte_tutor')
            ->join('exp_asigna_tutor', 'exp_asigna_tutor.id_asigna_tutor', '=', 'reporte_tutor.id_asigna_tutor')
            ->join('gnral_personales','gnral_personales.id_personal', '=', 'exp_asigna_tutor.id_personal')
            ->join('users','users.email','=','gnral_personales.correo')
            ->where('users.email','=',$pr)
            ->select(DB::raw("count(reporte_tutor.academico) AS aca"))
            ->get();
        $totales7 = DB::table('reporte_tutor')
            ->join('exp_asigna_tutor', 'exp_asigna_tutor.id_asigna_tutor', '=', 'reporte_tutor.id_asigna_tutor')
            ->join('gnral_personales','gnral_personales.id_personal', '=', 'exp_asigna_tutor.id_personal')
            ->join('users','users.email','=','gnral_personales.correo')
            ->where('users.email','=',$pr)
            ->select(DB::raw("count(reporte_tutor.medico) AS med"))
            ->get();
        $totales8 = DB::table('reporte_tutor')
            ->join('exp_asigna_tutor', 'exp_asigna_tutor.id_asigna_tutor', '=', 'reporte_tutor.id_asigna_tutor')
            ->join('gnral_personales','gnral_personales.id_personal', '=', 'exp_asigna_tutor.id_personal')
            ->join('users','users.email','=','gnral_personales.correo')
            ->where('users.email','=',$pr)
            ->select(DB::raw("count(reporte_tutor.psicologico) AS ps"))
            ->get();
        $totales9 = DB::table('reporte_tutor')
            ->join('exp_asigna_tutor', 'exp_asigna_tutor.id_asigna_tutor', '=', 'reporte_tutor.id_asigna_tutor')
            ->join('gnral_personales','gnral_personales.id_personal', '=', 'exp_asigna_tutor.id_personal')
            ->join('users','users.email','=','gnral_personales.correo')
            ->where('users.email','=',$pr)
            ->select(DB::raw("count(reporte_tutor.baja) AS baja"))
            ->get();
        /////////
        $pdf = new PDF();
        $pdf->AddPage();
        $pdf->ln(10);
        $pdf->SetFont('Arial', 'B', 7);
        $pdf->SetFillColor(255,255,255);
        $pdf->Cell(($pdf->GetPageWidth()-20),5,"".utf8_decode("2020.''Año de Laura Méndez de Cuenca; emblema de la mujer Mexiquense''"),0,1,"C","true");
        $pdf->Cell(($pdf->GetPageWidth()-20),5,"".utf8_decode("TECNOLÓGICO DE ESTUDIOS SUPERIORES DE VALLE DE BRAVO"),0,1,"C","true");
        $pdf->SetFillColor(97,182,35);
        $pdf->Cell(($pdf->GetPageWidth()-20),5,"".utf8_decode("REPORTE SEMESTRAL DE TUTOR"),0,1,"C","true");
        $pdf->SetFillColor(255,255,255);
        $pdf->Cell(($pdf->GetPageWidth()-20),5,"Tutor:  ".utf8_decode($consulta[0]->nombre),1,1,"L","true");

        $pdf->Cell(88,4,utf8_decode("Programa educativo:  "). utf8_decode($encabezado[0]->nombre),1,0,"L","true");
        $pdf->Cell(17,4,utf8_decode("Grupo:  "). utf8_decode($encabezado[0]->grupo),1,0,"L","true");
        $pdf->Cell(56,4,utf8_decode("Periodo:  "). utf8_decode($encabezado[0]->periodo),1,0,"L","true");
        $pdf->Cell(29,4,utf8_decode("Fecha:  "). utf8_decode($fecha[0]->fecha),1,0,"L","true");
        $pdf->ln();
        $pdf->ln();
        $pdf->Cell(15,12,utf8_decode("No.Cuenta"),1,0,"L","true");
        $pdf->Cell(45,12,utf8_decode("Nombre"),1,0,"C","true");
        $pdf->Cell(130,4,utf8_decode("ESTUDIANTES ATENDIDOS"),1,0,"C","true");
        $pdf->ln();
        $pdf->Cell(60,4);
        $pdf->Cell(20,4,utf8_decode("Tutoria"),1,0,"C","true");
        $pdf->Cell(10,4,utf8_decode("Beca"),1,0,"C","true");
        $pdf->Cell(20,4,utf8_decode("En curso"),1,0,"C","true");
        $pdf->Cell(35,4,utf8_decode("Canalizados en el semestre"),1,0,"C","true");
        $pdf->Cell(10,4,utf8_decode("Baja"),1,0,"C","true");
        $pdf->Cell(35,4,("Observaciones"),1,0,"C");
        $pdf->ln();
        $pdf->Cell(60,4);
        $pdf->Cell(10,4,utf8_decode("Grupal"),1,0,"L","true");
        $pdf->Cell(10,4,utf8_decode("Indiv"),1,0,"L","true");
        $pdf->Cell(10,4,"",0,0);
        $pdf->Cell(10,4,utf8_decode("Repet"),1,0,"L","true");
        $pdf->Cell(10,4,utf8_decode("Espec"),1,0,"L","true");
        $pdf->Cell(11,4,utf8_decode("Acad"),1,0,"L","true");
        $pdf->Cell(11,4,utf8_decode("Médico"),1,0,"L","true");
        $pdf->Cell(13,4,utf8_decode("Psicol"),1,0,"L","true");
        $pdf->Cell(10,4);
        $pdf->Cell(35,4,"",1,0);
        $pdf->ln();
        $pdf->SetDrawColor(010,010,010);
        //tabla
        $pdf->SetFont('Arial', 'B', 5);
        for($i=0;$i<count($consulta);$i++){
            $pdf->Cell(15,4,"". utf8_decode($consulta[$i]->n_cuenta),1,0,"C");
            $pdf->SetFont('Arial', 'B', 5);
            $pdf->Cell(45,4,utf8_decode($consulta[$i]->alumno)." ". utf8_decode($consulta[$i]->appaterno)." ". utf8_decode($consulta[$i]->apmaterno),1,0,"L","true");
            $pdf->Cell(10,4,"". utf8_decode($consulta[$i]->tutoria_grupal),1,0,"C");
            $pdf->Cell(10,4,"". utf8_decode($consulta[$i]->tutoria_individual),1,0,"C");
            $pdf->Cell(10,4,"". utf8_decode($consulta[$i]->beca),1,0,"C");
            $pdf->Cell(10,4,"". utf8_decode($consulta[$i]->repeticion),1,0,"C");
            $pdf->Cell(10,4,"". utf8_decode($consulta[$i]->especial),1,0,"C");
            $pdf->Cell(11,4,"". utf8_decode($consulta[$i]->academico),1,0,"C");
            $pdf->Cell(11,4,"". utf8_decode($consulta[$i]->medico),1,0,"C");
            $pdf->Cell(13,4,"". utf8_decode($consulta[$i]->psicologico),1,0,"C");
            $pdf->Cell(10,4,"". utf8_decode($consulta[$i]->baja),1,0,"C");
            $pdf->Cell(35,4,"". utf8_decode($consulta[$i]->observaciones),1,0,"C");
            $pdf->ln();
        }
        $pdf->Cell(15,4);
        $pdf->Cell(45,4,"Total",1,0,"R");
        $pdf->Cell(10,4,utf8_decode($totales1[0]->grupal),1,0,"C");
        $pdf->Cell(10,4,utf8_decode($totales2[0]->individual),1,0,"C");
        $pdf->Cell(10,4,utf8_decode($totales3[0]->beca),1,0,"C");
        $pdf->Cell(10,4,utf8_decode($totales4[0]->repe),1,0,"C");
        $pdf->Cell(10,4,utf8_decode($totales5[0]->espe),1,0,"C");
        $pdf->Cell(11,4,utf8_decode($totales6[0]->aca),1,0,"C");
        $pdf->Cell(11,4,utf8_decode($totales7[0]->med),1,0,"C");
        $pdf->Cell(13,4,utf8_decode($totales8[0]->ps),1,0,"C");
        $pdf->Cell(10,4,utf8_decode($totales9[0]->baja),1,0,"C");
        $pdf->ln(20);
        $pdf->Cell(45,4,utf8_decode($consulta[0]->nombre),0,0,"C");
        $pdf->Cell(5,4);
        $pdf->Cell(45,4,"Nombre",0,0,"C");
        $pdf->Cell(5,4);
        $pdf->Cell(45,4,"Nombre",0,0,"C");
        $pdf->Cell(5,4);
        $pdf->Cell(45,4,"Nombre",0,0,"C");
        $pdf->ln();
        $pdf->Cell(45,4,"TUTOR",0,0,"C");
        $pdf->Cell(5,4);
        $pdf->Cell(45,4,utf8_decode("COORDINADOR(A) DE TUTORÍAS CARRERA"),0,0,"C");
        $pdf->Cell(5,4);
        $pdf->Cell(45,4,utf8_decode("JEFE DE DIVISIÓN DE CARRERA"),0,0,"C");
        $pdf->Cell(5,4);
        $pdf->Cell(45,4,"COORDINADOR INSTITUCIONAL",0,0,"C");
        $pdf->ln(19);
        $pdf->Output();
        exit();
    }*/
}
