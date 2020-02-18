<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf as FPDF;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Support\Facades\Session;

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
class ReporteGController extends Controller
{
    public function pdf_reporte(Request $request)
    {

        $carrera=DB::table('gnral_carreras')
            ->select('nombre')
            ->where('id_carrera', '=', $request->id_carrera)
            ->get();
        $profesor=DB::table('gnral_personales')
            ->select('gnral_personales.*')
            ->where('gnral_personales.tipo_usuario', '=', Auth::user()->id)
            ->get();

        //dd($request->imagen[0]);
        /*FECHA
        $date= Carbon::now();
        $date = $date->format('d-m-Y');*/

        /*AÑO*/
        $aa= Carbon::now();
        $aa = $aa->format('Y');
        /*MES*/
        $mm= Carbon::now();
        $mm = $mm->format('m');
        /*DIA*/
        $dd= Carbon::now();
        $dd = $dd->format('d');


        $pdf=new PDF($orientation='P',$unit='mm',$format='Letter');
        #Establecemos los márgenes izquierda, arriba y derecha:
        $pdf->SetMargins(10, 19 , 1);
        //$pdf->SetAutoPageBreak(true,25);
        $pdf->AddPage();
        $pdf->SetFont('Times', '', 9);
        $pdf->Ln(4);
        $pdf->MultiCell(180,6,utf8_decode("Valle de Bravo, México; a " .$dd." de ".$mm. " de ".$aa."."),0,"R","","");
        $pdf->Ln(1);
        //$pdf->MultiCell(167,6,utf8_decode(""),0,"R","","");
        $pdf->Ln(2);

        $pdf->SetFont('Times', 'B', 9);
        $pdf->Cell(167,6,utf8_decode($profesor[0]->nombre),0,1,"","");
        $pdf->Cell(167,6,utf8_decode("COORDINADOR DEL PROGRAMA EDUCATIVO"),0,1,"","");
        $pdf->Cell(167,6,"DE ".utf8_decode($carrera[0]->nombre),0,1,"","");
        $pdf->Cell(167,6,utf8_decode("P  R  E  S  E  N  T  E"),0,1,"","");
        $pdf->Ln(6);

        $pdf->SetFont('Times', '', 9);
        $pdf->Cell(170,6,utf8_decode("Por medio del presente, me permito informarle las estadísticas correspondientes al Programa Institucional de Tutorías, correspondiente a la"),0,1,"");
        $pdf->Cell(170,6,utf8_decode($request->generacion.", del Programa de Estudios ".$carrera[0]->nombre.", del periodo "),0,1,"");
        $pdf->Cell(170,6,utf8_decode((Session::get('nombre_periodo').".")),0,1,"");

        /*GRAFICAS*/
        $pdf->Ln(3);
        $pdf->SetFont('Times', 'B', 9);
        $pdf->Cell(160,6,utf8_decode("Total de alumnos"),0,1,"","");
        $pdf->Image($request->imagen[0],70,100,80,55,'PNG');

        $pdf->Ln(70);
        $pdf->Cell(160,6,utf8_decode("Número de hijos"),0,1,"","");
        $pdf->Image($request->imagen[1],20,175,80,55,'PNG');
        $pdf->Image($request->imagen[2],120,175,80,55,'PNG');



        $pdf-> AddPage('P','Letter',360);
        $pdf->Ln(15);
        $pdf->Cell(160,6,utf8_decode("Pertenecen a etnia indígena"),0,0,"","");
        $pdf->Image($request->imagen[3],5,60,65,40,'PNG');
        $pdf->Image($request->imagen[4],75,60,65,40,'PNG');
        $pdf->Image($request->imagen[5],145,60,65,40,'PNG');



        $pdf->Ln(95);
        $pdf->Cell(160,6,utf8_decode("Padecen enfermedad crónica"),0,1,"","");
        $pdf->Image($request->imagen[6],5,150,65,40,'PNG');
        $pdf->Image($request->imagen[7],75,150,65,40,'PNG');
        $pdf->Image($request->imagen[8],145,150,65,40,'PNG');


        $pdf-> AddPage('P','Letter',360);
        $pdf->Ln(8);
        $pdf->Cell(160,6,utf8_decode("Estado académico"),0,0,"","");
        $pdf->Image($request->imagen[9],5,50,68,45,'PNG');
        $pdf->Image($request->imagen[10],75,50,68,45,'PNG');
        $pdf->Image($request->imagen[11],145,50,68,45,'PNG');



        $pdf->Ln(80);
        $pdf->Cell(160,6,utf8_decode("Cuentan con beca"),0,1,"","");
        $pdf->Image($request->imagen[12],20,130,80,55,'PNG');
        $pdf->Image($request->imagen[13],105,130,80,55,'PNG');


        /*FIRMA*/
        $pdf->Ln(100);
        $pdf->SetFont('Times', 'B', 9);
        $pdf->Cell(($pdf->GetPageWidth()),3,"". utf8_decode(mb_strtoupper("________________________________________________")),0,1,"C");
        $pdf->Ln(3);
        $pdf->Cell(($pdf->GetPageWidth()),3,"". utf8_decode(mb_strtoupper($profesor[0]->nombre)),0,1,"C");
        $pdf->Ln(3);
        $pdf->Cell(($pdf->GetPageWidth()),3,"TUTOR DE LA ". utf8_decode(mb_strtoupper($request->generacion)),0,1,"C");

        $pdf->Output();
        exit();
    }
    public function pdf_carreraco(Request $request)
    {
        $carrera=DB::table('gnral_carreras')
            ->select('nombre')
            ->where('id_carrera', '=', $request->id_carrera)
            ->get();
        $usuario=DB::table('gnral_personales')
            ->select('gnral_personales.*')
            ->where('gnral_personales.tipo_usuario', '=', Auth::user()->id)
            ->get();

        //dd($request->imagen[0]);
        /*FECHA
        $date= Carbon::now();
        $date = $date->format('d-m-Y');*/

        /*AÑO*/
        $aa= Carbon::now();
        $aa = $aa->format('Y');
        /*MES*/
        $mm= Carbon::now();
        $mm = $mm->format('m');
        /*DIA*/
        $dd= Carbon::now();
        $dd = $dd->format('d');


        $pdf=new PDF($orientation='P',$unit='mm',$format='Letter');
        #Establecemos los márgenes izquierda, arriba y derecha:
        $pdf->SetMargins(10, 19 , 1);
        //$pdf->SetAutoPageBreak(true,25);
        $pdf->AddPage();
        $pdf->SetFont('Times', '', 9);
        $pdf->Ln(4);
        $pdf->MultiCell(180,6,utf8_decode("Valle de Bravo, México; a " .$dd." de ".$mm. " de ".$aa."."),0,"R","","");
        $pdf->Ln(1);
        //$pdf->MultiCell(167,6,utf8_decode(""),0,"R","","");
        $pdf->Ln(2);

        $pdf->SetFont('Times', 'B', 9);
        $pdf->Cell(167,6,utf8_decode($usuario[0]->nombre),0,1,"","");
        $pdf->Cell(167,6,utf8_decode("COORDINADOR DEL PROGRAMA EDUCATIVO"),0,1,"","");
        $pdf->Cell(167,6,"DE ".utf8_decode($carrera[0]->nombre),0,1,"","");
        $pdf->Cell(167,6,utf8_decode("P  R  E  S  E  N  T  E"),0,1,"","");
        $pdf->Ln(6);

        $pdf->SetFont('Times', '', 9);
        $pdf->Cell(170,6,utf8_decode("Por medio del presente, me permito informarle las estadísticas correspondientes al Programa Institucional de Tutorías, correspondiente al Programa"),0,1,"");
        $pdf->Cell(170,6,utf8_decode("de Estudios ".$carrera[0]->nombre.", del periodo ".(Session::get('nombre_periodo').".")),0,1,"");

        /*GRAFICAS*/
        $pdf->Ln(3);
        $pdf->SetFont('Times', 'B', 9);
        $pdf->Cell(160,6,utf8_decode("Total de alumnos"),0,1,"","");
        $pdf->Image($request->imagen[0],70,100,80,55,'PNG');

        $pdf->Ln(70);
        $pdf->Cell(160,6,utf8_decode("Número de hijos"),0,1,"","");
        $pdf->Image($request->imagen[1],20,175,80,55,'PNG');
        $pdf->Image($request->imagen[2],120,175,80,55,'PNG');



        $pdf-> AddPage('P','Letter',360);
        $pdf->Ln(15);
        $pdf->Cell(160,6,utf8_decode("Pertenecen a etnia indígena"),0,0,"","");
        $pdf->Image($request->imagen[3],5,60,65,40,'PNG');
        $pdf->Image($request->imagen[4],75,60,65,40,'PNG');
        $pdf->Image($request->imagen[5],145,60,65,40,'PNG');



        $pdf->Ln(95);
        $pdf->Cell(160,6,utf8_decode("Padecen enfermedad crónica"),0,1,"","");
        $pdf->Image($request->imagen[6],5,150,65,40,'PNG');
        $pdf->Image($request->imagen[7],75,150,65,40,'PNG');
        $pdf->Image($request->imagen[8],145,150,65,40,'PNG');


        $pdf-> AddPage('P','Letter',360);
        $pdf->Ln(8);
        $pdf->Cell(160,6,utf8_decode("Estado académico"),0,0,"","");
        $pdf->Image($request->imagen[9],5,50,68,45,'PNG');
        $pdf->Image($request->imagen[10],75,50,68,45,'PNG');
        $pdf->Image($request->imagen[11],145,50,68,45,'PNG');



        $pdf->Ln(80);
        $pdf->Cell(160,6,utf8_decode("Cuentan con beca"),0,1,"","");
        $pdf->Image($request->imagen[12],20,130,80,55,'PNG');
        $pdf->Image($request->imagen[13],105,130,80,55,'PNG');


        /*FIRMA*/
        $pdf->Ln(100);
        $pdf->SetFont('Times', 'B', 9);
        $pdf->Cell(($pdf->GetPageWidth()),3,"". utf8_decode(mb_strtoupper("________________________________________________")),0,1,"C");
        $pdf->Ln(3);
        $pdf->Cell(($pdf->GetPageWidth()),3,"". utf8_decode(mb_strtoupper($usuario[0]->nombre)),0,1,"C");
        $pdf->Ln(3);
        $pdf->Cell(($pdf->GetPageWidth()),3,"COORDINADOR GENERAL",0,1,"C");

        $pdf->Output();
        exit();
    }

}
