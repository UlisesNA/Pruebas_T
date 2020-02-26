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
        $this->Image('img/TESVB.png',145,3,28,11);
        $this->Image('img/edomex1.png',176,2,30,13);
        $this->Line(175,2.5,175,14);
    }
    //PIE DE PAGINA
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Times','B',8);
        // Page number
        $this->Cell(0,10,utf8_decode('Página '.$this->PageNo().'/{nb}'),0,0,'C');
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
         $datos=DB::select('SELECT plan_actividades.desc_actividad,plan_actividades.objetivo_actividad,plan_actividades.fi_actividad, plan_actividades.ff_actividad
,
plan_asigna_planeacion_tutor.estrategia,plan_asigna_planeacion_tutor.id_asigna_planeacion_tutor,plan_asigna_planeacion_tutor.id_sugerencia,
plan_asigna_planeacion_tutor.desc_actividad_cambio,plan_asigna_planeacion_tutor.objetivo_actividad_cambio, exp_asigna_tutor.id_asigna_tutor,
exp_asigna_tutor.id_asigna_generacion
FROM plan_actividades, plan_asigna_planeacion_tutor,plan_asigna_planeacion_actividad,plan_planeacion,exp_asigna_generacion,exp_asigna_tutor
WHERE 
plan_asigna_planeacion_actividad.id_plan_actividad=plan_actividades.id_plan_actividad
AND plan_planeacion.id_planeacion=plan_asigna_planeacion_actividad.id_planeacion
AND plan_asigna_planeacion_tutor.id_asigna_planeacion_actividad=plan_asigna_planeacion_actividad.id_asigna_planeacion_actividad
AND exp_asigna_generacion.id_generacion=plan_planeacion.id_generacion
AND exp_asigna_tutor.id_asigna_generacion=exp_asigna_generacion.id_asigna_generacion
AND exp_asigna_tutor.id_asigna_tutor=plan_asigna_planeacion_tutor.id_asigna_tutor
AND exp_asigna_tutor.deleted_at IS null
AND exp_asigna_tutor.id_asigna_generacion='.$request->id_asigna_generacion.' 
AND plan_actividades.deleted_at IS null');

         $carrera=DB::table('gnral_carreras')
             ->select('nombre')
             ->where('id_carrera', '=', $request->id_carrera)
             ->get();
         $profesor=DB::table('gnral_personales')
             ->select('gnral_personales.*')
             ->where('gnral_personales.tipo_usuario', '=', Auth::user()->id)
             ->get();

         //$pdf= new \Codedge\Fpdf\Fpdf\Fpdf();
         // $pdf->AddPage();
         $pdf=new PDF($orientation='P',$unit='mm',$format='Letter');
         #Establecemos los márgenes izquierda, arriba y derecha:
         $pdf->SetMargins(10, 19 , 10);
         //$pdf->SetAutoPageBreak(true,25);
         $pdf->AddPage();



         $pdf->SetFont('Times', 'B', 10);
         $pdf->SetFillColor(192,192,192);
         $pdf->Ln(1);
         $pdf->Cell(($pdf->GetPageWidth()-20),6,"".utf8_decode("PLAN DE ACCIÓN TUTORIAL"),0,4,"C","true");
         $pdf->Ln(1);
         $pdf->SetFont('Times', 'B', 8);
         $pdf->Cell(($pdf->GetPageWidth()-20),3,"CARRERA: ". utf8_decode(mb_strtoupper($carrera[0]->nombre)),0,0,"L");
         $pdf->Ln(3);
         $pdf->Cell(($pdf->GetPageWidth()-20)/3,3,"ASIGNATURA: ". utf8_decode("TUTORIAS"),0,0,"L");
         $pdf->Cell(($pdf->GetPageWidth()-20)/3,3,"". utf8_decode(""),0,0,"L");
         $pdf->SetFillColor(192,192,192);
         $pdf->Cell(($pdf->GetPageWidth()-151)/1,4,"".utf8_decode($request->generacion),0,1,"C","true");
         $pdf->Ln(0);
         $pdf->Cell(($pdf->GetPageWidth()-20)/2,3,"PROFESOR: ". utf8_decode(mb_strtoupper($profesor[0]->nombre)),0,0,"L");
         $pdf->Cell(($pdf->GetPageWidth()-20)/2,3,"PERIODO: ". utf8_decode(mb_strtoupper(Session::get('nombre_periodo'))),0,0,"R");
         $pdf->ln(7);
         $pdf->Cell(40, 4, utf8_decode("Fecha"), 1, 0, "C", "true");
         $pdf->Cell(40, 4, utf8_decode("Sesion"), 1, 0, "C", "true");
         $pdf->Cell(40, 4, utf8_decode("Actividades"), 1, 0, "C", "true");
         $pdf->Cell(40, 4, utf8_decode("Objetivo"), 1, 0, "C", "true");
         $pdf->Cell(36, 4, utf8_decode("Estrategias"), 1, 0, "C", "true");
         $pdf->ln(4);
         foreach ($datos as $dat)
         {
         $pdf->Cell(20, 4, utf8_decode(mb_strtoupper($dat->fi_actividad)), 1, 0, "C");

         }
         //$pdf->Cell(0,100,utf8_decode('Página '.$pdf->PageNo()),0,0,'R');
         $pdf->Ln(10);
         $pdf->Cell(($pdf->GetPageWidth()),3,"". utf8_decode(mb_strtoupper("________________________________________________")),0,1,"C");
         $pdf->Cell(($pdf->GetPageWidth()),3,"". utf8_decode(mb_strtoupper($profesor[0]->nombre)),0,0,"C");

         // $pdf->Output();
         $pdf->AliasNbPages();
         $pdf->Output();
         exit();

     }

}



