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
         $pdf->Cell(20, 4, utf8_decode("Fecha"), 1, 0, "C", "true");
         $pdf->Cell(20, 4, utf8_decode("Fecha"), 1, 0, "C", "true");
         $pdf->Cell(40, 4, utf8_decode("Sesion"), 1, 0, "C", "true");
         $pdf->Cell(40, 4, utf8_decode("Actividades"), 1, 0, "C", "true");
         $pdf->Cell(40, 4, utf8_decode("Objetivo"), 1, 0, "C", "true");
         $pdf->Cell(36, 4, utf8_decode("Estrategias"), 1, 0, "C", "true");

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



