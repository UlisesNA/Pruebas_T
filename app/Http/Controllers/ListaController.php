<?php

namespace App\Http\Controllers;
use App\Lista;
use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf as FPDF;
class PDF extends FPDF
{

    //CABECERA DE LA PAGINA
    function Header()
    {
       $this->Image('img/ff.jpg',120,5,10);
       // $this->Image('img/edom.png',20,5,50);
        $this->Ln();
    }
    //PIE DE PAGINA
    function Footer()
    {
        $this->SetY(-25);
        $this->SetFont('Arial','',6);
        $this->Cell(100);
        //$this->Image('img/personal.PNG', 15, 240, 190);
    }

}

class ListaController extends Controller
{
    public function index()
    {
        $pdf=new PDF($orientation='P',$unit='mm',$format='Letter');
        #Establecemos los márgenes izquierda, arriba y derecha:
        $pdf->SetMargins(20, 25 , 20);
        $pdf->SetAutoPageBreak(true,25);
        $pdf->AddPage();




        $pdf->Output();
        exit();
    }

}
