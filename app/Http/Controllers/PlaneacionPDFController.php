<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Auth;

use Codedge\Fpdf\Fpdf\Fpdf as FPDF;
class PDF extends FPDF
{
    //CABECERA DE LA PAGINA
    function Header()
    {
        $this->Image('img/edomex.png',10,0,40,20);
        $this->Image('img/tecnm.jpg',81,3,30,12);
        $this->Image('img/TESVB.png',145,3,28,11);
        $this->Image('img/edomex1.png',176,2,30,13);
        $this->Line(175,2.5,175,14);
        $this->SetFont('Times', '', 8);
        $this->Cell(175,6,utf8_decode('2020. "Año de Laura Méndez de Cuenca; emblema de la mujer Mexiquense".'),0,4,"C");

    }

    //PIE DE PAGINA
    function Footer()
    {
        $this->SetY(-22);
        $this->SetFont('Times','',8);
        $this->Image('img/abajo solo.png',0,246,217,34);
        $this->Image('img/res.jpg',51,241,38,22);
        $this->Image('img/cir.jpg',89,241,19,19);
        $this->Image('img/des.jpg',110,243,100,20);
        $this->Ln(11);
        $this->SetTextColor(255,255,255);
        $this->Cell(43);
        $this->Cell(1,0,utf8_decode('Km. 30 de la Carretera Federal Monumento - Valle de Bravo, Ejido de San Antonio de la Laguna'),0,0,'L',"");
        $this->Ln(3);
        $this->Cell(43);
        $this->Cell(1,0,utf8_decode('C.P. 51200, Valle de Bravo, Estado de México.'),0,0,'L',"");
        $this->Ln(3);
        $this->Cell(43);
        $this->Cell(1,0,utf8_decode('Tels. : (726) 266 52 00, 266 50 77, 266 51 87.                        des.academico@tesvb.edu.mx'),0,0,'L',"");
        $this->Ln(3);
    }


}
class PlaneacionPDFController extends Controller
{
    public function index(Request $request)
    {
        return view('profesor.index');
    }

    public function pdf_planeacion(Request $request)
     {


         $datos=DB::table('gnral_alumnos')
             ->join('exp_asigna_alumnos','exp_asigna_alumnos.id_alumno','=','gnral_alumnos.id_alumno')
             ->select('gnral_alumnos.*','exp_asigna_alumnos.estado','exp_asigna_alumnos.id_asigna_alumno')
             ->where('exp_asigna_alumnos.id_asigna_generacion', '=', $request->id_asigna_generacion)
             ->where('gnral_alumnos.id_carrera','=',$request->id_carrera)
             ->whereNull('exp_asigna_alumnos.deleted_at')
             ->orderBy('gnral_alumnos.apaterno')
             ->get();

         $carrera=DB::table('gnral_carreras')
             ->select('nombre')
             ->where('id_carrera', '=', $request->id_carrera)
             ->get();
         $profesor=DB::table('gnral_personales')
             ->select('gnral_personales.*')
             ->where('gnral_personales.tipo_usuario', '=', Auth::user()->id)
             ->get();
        /* $coorcarrera=DB::table('gnral_personales')
             ->select('gnral_personales.nombre')
             ->where('exp_asigna_coordinador')*/

         $coorcarrera=DB::select('SELECT gnral_personales.nombre 
                                        FROM gnral_personales, exp_asigna_coordinador, gnral_jefes_periodos, gnral_carreras
                                        WHERE gnral_jefes_periodos.id_carrera='.$request->id_carrera.'
                                         and exp_asigna_coordinador.id_personal=gnral_personales.id_personal
                                         and exp_asigna_coordinador.id_jefe_periodo=gnral_jefes_periodos.id_jefe_periodo
                                         and gnral_jefes_periodos.id_carrera=gnral_carreras.id_carrera
                                         and exp_asigna_coordinador.deleted_at is null');
        // dd($coorcarrera);

         $jefedivision=DB::select('SELECT gnral_personales.nombre FROM gnral_personales, exp_asigna_coordinador, gnral_jefes_periodos, gnral_carreras
                                        WHERE gnral_jefes_periodos.id_carrera='.$request->id_carrera.'
                                        and gnral_jefes_periodos.id_personal=gnral_personales.id_personal
                                        and gnral_jefes_periodos.id_jefe_periodo=exp_asigna_coordinador.id_jefe_periodo
                                        and gnral_jefes_periodos.id_carrera=gnral_carreras.id_carrera
                                        and exp_asigna_coordinador.deleted_at is null');
         $desarrollo=DB::select('select gnral_personales.nombre from gnral_personales, gnral_departamentos
                                        where gnral_departamentos.id_departamento=4
                                        and gnral_personales.id_departamento=gnral_departamentos.id_departamento');

         $consulta=DB::select('SELECT plan_actividades.desc_actividad,plan_actividades.objetivo_actividad,plan_actividades.fi_actividad,
                    plan_actividades.ff_actividad, plan_asigna_planeacion_tutor.estrategia,plan_asigna_planeacion_tutor.id_asigna_planeacion_tutor,
                    plan_asigna_planeacion_tutor.id_sugerencia, plan_asigna_planeacion_tutor.desc_actividad_cambio,
                    plan_asigna_planeacion_tutor.objetivo_actividad_cambio, exp_asigna_tutor.id_asigna_tutor, exp_asigna_tutor.id_asigna_generacion
                    FROM plan_actividades, plan_asigna_planeacion_tutor,plan_asigna_planeacion_actividad,plan_planeacion,exp_asigna_generacion,exp_asigna_tutor
                    WHERE plan_asigna_planeacion_actividad.id_plan_actividad=plan_actividades.id_plan_actividad
                    AND plan_planeacion.id_planeacion=plan_asigna_planeacion_actividad.id_planeacion
                    AND plan_asigna_planeacion_tutor.id_asigna_planeacion_actividad=plan_asigna_planeacion_actividad.id_asigna_planeacion_actividad
                    AND exp_asigna_generacion.id_generacion=plan_planeacion.id_generacion
                    AND exp_asigna_tutor.id_asigna_generacion=exp_asigna_generacion.id_asigna_generacion
                    AND exp_asigna_tutor.id_asigna_tutor=plan_asigna_planeacion_tutor.id_asigna_tutor
                    AND exp_asigna_tutor.deleted_at IS null
                    AND exp_asigna_tutor.id_asigna_generacion='.$request->id_asigna_generacion.'
                    AND plan_actividades.deleted_at IS null');
         $periodo=DB::select('SELECT ciclo from gnral_periodos where id_periodo=21');

         //$pdf= new \Codedge\Fpdf\Fpdf\Fpdf();
         // $pdf->AddPage();

         $pdf=new PDF($orientation='P',$unit='mm',$format='Letter');
         $pdfaux=new PDF($orientation='P',$unit='mm',$format='Letter');
         #Establecemos los márgenes izquierda, arriba y derecha:
         $pdf->SetMargins(10, 19 , 10);
         //$pdf->SetAutoPageBreak(true,25);
         $pdf->AddPage();

         //SetFont('Helvetica','I',13);

         $pdf->SetFont('Times', 'B', 10);
         $pdf->SetFillColor(192,192,192);
         $pdf->Ln(1);
         $pdf->Cell(($pdf->GetPageWidth()-20),6,"".utf8_decode("PLAN DE ACCIÓN TUTORIAL"),0,4,"C","true");
         $pdf->Ln(1);
         $pdf->SetFont('Times', 'B', 8);
         $pdf->Cell(($pdf->GetPageWidth()-20),3,"CARRERA: ". utf8_decode(mb_strtoupper($carrera[0]->nombre)),0,0,"L");
         $pdf->Ln(3);
         $pdf->Cell(($pdf->GetPageWidth()-20)/3,3,"COORDINADOR: ". utf8_decode(mb_strtoupper($coorcarrera[0]->nombre)),0,0,"L");
         $pdf->Cell(($pdf->GetPageWidth()-20)/3,3,"". utf8_decode(""),0,0,"L");
         $pdf->SetFillColor(192,192,192);
         $pdf->Cell(($pdf->GetPageWidth()-151)/1,4,"".utf8_decode($request->generacion),0,1,"C","true");
         $pdf->Ln(0);


         $pdf->Cell(($pdf->GetPageWidth()-20)/2,3,"TUTOR: ". utf8_decode(mb_strtoupper($profesor[0]->nombre)),0,0,"L");
         $pdf->Cell(($pdf->GetPageWidth()-20)/2,3,"PERIODO: ". utf8_decode(mb_strtoupper($periodo[0]->ciclo)),0,0,"C");
         $pdf->ln(7);
         $np=0;
         $pdf->SetFont('Times', 'B', 7);
         $pdf->Cell(30, 4, utf8_decode("FECHA"), 1, 0, "C", "true");
         $pdf->Cell(10, 4, utf8_decode("SESIÓN"), "LTR", 0, "C", "true");
         $pdf->Cell(40, 4, utf8_decode("ACTIVIDADES"), "LTR", 0, "C", "true");
         $pdf->Cell(60, 4, utf8_decode("OBJETIVO"), "LTR", 0, "C", "true");
         $pdf->Cell(60, 4, utf8_decode("ESTRATEGIAS"), "LTR", 0, "C", "true");
         $pdf->ln(4);

         $pdf->Cell(15, 4, utf8_decode("INICIO"), 1, 0, "C", "true");
         $pdf->Cell(15, 4, utf8_decode("FIN"), 1, 0, "C", "true");
         $pdf->Cell(10, 4, utf8_decode(""), "LRB", 0, "C", "true");
         $pdf->Cell(40, 4, utf8_decode(""), "LRB", 0, "C", "true");
         $pdf->Cell(60, 4, utf8_decode(""), "LRB", 0, "C", "true");
         $pdf->Cell(60, 4, utf8_decode(""), "LRB", 0, "C", "true");
         $star=$pdf->GetX();
         $current_x=$pdf->GetX();
         $current_y=$pdf->GetY();

        $pdf->ln();
         foreach ($consulta as $dat)
         {
             if((int)($dat->id_sugerencia==1))
             {
                 $x = (int)($pdf->GetStringWidth(utf8_decode(mb_strtoupper($dat->desc_actividad_cambio))) / 40) + 2;
                 $y = (int)($pdf->GetStringWidth(utf8_decode(mb_strtoupper($dat->objetivo_actividad_cambio))) / 60) + 2;
                 $z = (int)($pdf->GetStringWidth(utf8_decode(mb_strtoupper($dat->estrategia))) / 60) + 2;

                 $height = max($x, $y, $z) * 4;


                 $pdf->SetFont('Times', 'B', 7);

                 $pdf->Cell(15, $height, "" . utf8_decode(mb_strtoupper($dat->fi_actividad)), 1, 0, "C");
                 $pdf->Cell(15, $height, "" . utf8_decode(mb_strtoupper($dat->ff_actividad)), 1, 0, "C");

                 //valor de celda
                 // $long=$pdf->GetStringWidth(utf8_decode(mb_strtoupper($dat->objetivo_actividad)));

                 $pdf->Cell(10, $height, " " . utf8_decode(mb_strtoupper($np = 0 ? $np = 0 : $np = $np + 1)), 1, 0, "C");
                 $x = $pdf->GetX();
                 $y = $pdf->GetY();

                 $pdf->Cell(40, $height, " ", 1, 0, "C");
                 $pdf->SetXY($x, $y);
                 $pdf->MultiCell(40, 4, "" . utf8_decode(mb_strtoupper($dat->desc_actividad_cambio)), 0, "L");
                 $pdf->SetXY($x + 40, $y);
                 $pdf->Cell(60, $height, " ", 1, 0, "C");
                 $pdf->SetXY($x + 40, $y);
                 $pdf->MultiCell(60, 4, "" . utf8_decode(mb_strtoupper($dat->objetivo_actividad_cambio)), 0, "L");
                 $pdf->SetXY($x + 100, $y);
                 $pdf->Cell(60, $height, " ", 1, 0, "C");
                 $pdf->SetXY($x + 100, $y);

                 $pdf->MultiCell(60, 4, "" . utf8_decode(mb_strtoupper($dat->estrategia)), 0, "L");
                 // $pdf->ln();
                 $pdf->SetXY(10, $y + $height);

             }
             else {
                 $x = (int)($pdf->GetStringWidth(utf8_decode(mb_strtoupper($dat->desc_actividad))) / 40) + 2;
                 $y = (int)($pdf->GetStringWidth(utf8_decode(mb_strtoupper($dat->objetivo_actividad))) / 60) + 2;
                 $z = (int)($pdf->GetStringWidth(utf8_decode(mb_strtoupper($dat->estrategia))) / 60) + 2;

                 $height = max($x, $y, $z) * 4;


                 $pdf->SetFont('Times', 'B', 7);

                 $pdf->Cell(15, $height, "" . utf8_decode(mb_strtoupper($dat->fi_actividad)), 1, 0, "C");
                 $pdf->Cell(15, $height, "" . utf8_decode(mb_strtoupper($dat->ff_actividad)), 1, 0, "C");

                 //valor de celda
                 // $long=$pdf->GetStringWidth(utf8_decode(mb_strtoupper($dat->objetivo_actividad)));

                 $pdf->Cell(10, $height, " " . utf8_decode(mb_strtoupper($np = 0 ? $np = 0 : $np = $np + 1)), 1, 0, "C");
                 $x = $pdf->GetX();
                 $y = $pdf->GetY();

                 $pdf->Cell(40, $height, " ", 1, 0, "C");
                 $pdf->SetXY($x, $y);
                 $pdf->MultiCell(40, 4, "" . utf8_decode(mb_strtoupper($dat->desc_actividad)), 0, "L");
                 $pdf->SetXY($x + 40, $y);
                 $pdf->Cell(60, $height, " ", 1, 0, "C");
                 $pdf->SetXY($x + 40, $y);
                 $pdf->MultiCell(60, 4, "" . utf8_decode(mb_strtoupper($dat->objetivo_actividad)), 0, "L");
                 $pdf->SetXY($x + 100, $y);
                 $pdf->Cell(60, $height, " ", 1, 0, "C");
                 $pdf->SetXY($x + 100, $y);

                 $pdf->MultiCell(60, 4, "" . utf8_decode(mb_strtoupper($dat->estrategia)), 0, "L");
                 // $pdf->ln();
                 $pdf->SetXY(10, $y + $height);


                 // $pdf->MultiCell(60,4,"". utf8_decode(mb_strtoupper($dat->objetivo_actividad)),0,"L");

                 //dd($pdf->GetStringWidth(utf8_decode(mb_strtoupper($dat->objetivo_actividad))));
                 // $pdf->MultiCell(60,4,"". utf8_decode(mb_strtoupper($dat->estrategia)),1,"L");
             }
         }


         //$pdf->Cell(0,100,utf8_decode('Página '.$pdf->PageNo()),0,0,'R');
         $pdf->SetFont('Times', 'B', 8);
         $pdf->Ln(30);
        $y=$pdf->GetY();

         $pdf->SetXY(10,$y);

         $pdf->Cell(($pdf->GetPageWidth()/2-20),7,"". utf8_decode(mb_strtoupper($jefedivision[0]->nombre)),0,1,"C");
         $pdf->Cell(($pdf->GetPageWidth()/2-20),3,"". utf8_decode(mb_strtoupper("___________________________________")),0,1,"C");
         $pdf->Cell(($pdf->GetPageWidth()/2-20),3,"".utf8_decode("JEFATURA DE DIVISIÓN"),0,1,"C");

         //Desarrollo academico
         //$pdf->Ln(30);
         $pdf->SetXY($pdf->GetPageWidth()/2+20,$y);
         $pdf->Cell(($pdf->GetPageWidth()/2-20),6,"". utf8_decode(mb_strtoupper($desarrollo[0]->nombre)),0,1,"C");
         $pdf->SetXY($pdf->GetPageWidth()/2+20,$y+8);
         $pdf->Cell(($pdf->GetPageWidth()/2-20),3,"". utf8_decode(mb_strtoupper("___________________________________")),0,1,"C");
         $pdf->SetXY($pdf->GetPageWidth()/2+20,$y+11);
         $pdf->Cell(($pdf->GetPageWidth())/2-20,3,"".utf8_decode("COORDINACIÓN DE TUTORÍAS"),0,1,"C");
         $pdf->SetXY($pdf->GetPageWidth()/2+20,$y+14);
         $pdf->Cell(($pdf->GetPageWidth())/2-20,3,"".utf8_decode("DEPARTAMENTO DE DESARROLLO ACADÉMICO"),0,1,"C");

         // $pdf->Output();
         $pdf->AliasNbPages();
         $pdf->Output();
         exit();

     }

}



