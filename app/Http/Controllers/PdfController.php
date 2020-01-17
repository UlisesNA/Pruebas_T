<?php

namespace App\Http\Controllers;

use App\AsignaExpediente;
use App\Pdf;
use Illuminate\Http\Request;
use Codedge\Fpdf\Facades\Fpdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Session;
use Auth;
class PdfController extends Controller
{
    public function pdf_all()
    {

        $datosGenerales=DB::select('SELECT * FROM exp_generales WHERE id_alumno='.Session::get('id_alumno').';');
        //dd($datosGenerales[0]->nombre);
        $datosAntecedentes=DB::select('SELECT * FROM exp_antecedentes_academicos WHERE id_alumno='.Session::get('id_alumno').';');
        $datosFamiliares=DB::select('SELECT * FROM exp_datos_familiares WHERE id_alumno='.Session::get('id_alumno').';');
        $datosHabitos=DB::select('SELECT * FROM exp_habitos_estudio WHERE id_alumno='.Session::get('id_alumno').';');
        $datosFormacion=DB::select('SELECT * FROM exp_formacion_integral WHERE id_alumno='.Session::get('id_alumno').';');
        $datosArea=DB::select('SELECT * FROM exp_area_psicopedagogica WHERE id_alumno='.Session::get('id_alumno').';');
        //dd($datosArea);

        $carreras=\Illuminate\Support\Facades\DB::table('gnral_carreras')->get();
        $periodos=\Illuminate\Support\Facades\DB::table('gnral_periodos')->get();
        $grupos=\Illuminate\Support\Facades\DB::table('gnral_grupos')->get();
        $semestres=\Illuminate\Support\Facades\DB::table('gnral_semestres')->get();
        $estadoC=\Illuminate\Support\Facades\DB::table('exp_civil_estados')->get();
        $escalas=\Illuminate\Support\Facades\DB::table('exp_escalas')->get();
        //dd($carreras);


        $pdf= new \Codedge\Fpdf\Fpdf\Fpdf();
        $pdf->AddPage();

        $pdf->SetFont('Arial', 'B', 8);
        $pdf->SetFillColor(130,130,130);

        $pdf->SetTextColor(255,255,255);
        $pdf->Cell(($pdf->GetPageWidth()-20),11,"EXPEDIENTE DEL TUTORADO".utf8_decode(""),1,4,"C","true");

        $pdf->SetFont('Arial', 'B', 7);
        $pdf->SetFillColor(156,156,156);
        $pdf->Cell(($pdf->GetPageWidth()-20),9,"DATOS GENERALES".utf8_decode(""),1,4,"C","true");
        $pdf->SetDrawColor(010,010,010);
        $pdf->Rect(180, 10, 20, 20, 'DF');
        $pdf->Image('img/ff.jpg',180,10,20,20);
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->SetTextColor(010,010,010);
        $pdf->SetFillColor(204,204,204);
        $pdf->Cell(($pdf->GetPageWidth()-20)/6,3,"Carrera: ". utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(($pdf->GetPageWidth()-20)/6,3,"". utf8_decode($carreras[$datosGenerales[0]->id_carrera-1]->nombre),1,0,"C");
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/6,3,"Periodo: ". utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(($pdf->GetPageWidth()-20)/6,3,"". utf8_decode($periodos[$datosGenerales[0]->id_periodo-1]->periodo),1,0,"C");
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/6,3,"Grupo: ". utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(($pdf->GetPageWidth()-20)/6,3,"". utf8_decode($grupos[$datosGenerales[0]->id_grupo-1]->grupo),1,0,"C");
        $pdf->Ln(3);
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/6,3,"Alumno: ". utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(($pdf->GetPageWidth()-20)/6,3,"". utf8_decode($datosGenerales[0]->nombre),1,0,"C");
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/6,3,"Edad: ". utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(($pdf->GetPageWidth()-20)/6,3,"". utf8_decode($datosGenerales[0]->edad),1,0,"C");
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/6,3,"Sexo: ". utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(($pdf->GetPageWidth()-20)/6,3,"". utf8_decode($datosGenerales[0]->sexo==1?'M':'F'),1,0,"C");
        $pdf->Ln(3);
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/6,3,"Fecha de nacimiento: ". utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(($pdf->GetPageWidth()-20)/6,3,"". utf8_decode($datosGenerales[0]->fecha_nacimientos),1,0,"C");
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/6,3,"Lugar de nacimiento: ". utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(($pdf->GetPageWidth()-20)/6,3,"". utf8_decode($datosGenerales[0]->lugar_naciemientos),1,0,"C");
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/6,3,"Semestre: ". utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(($pdf->GetPageWidth()-20)/6,3,"". utf8_decode($semestres[$datosGenerales[0]->id_semestre-1]->descripcion),1,0,"C");
        $pdf->Ln(3);

        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(15,3,"Estado civil: ". utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(13,3,"". utf8_decode($estadoC[$datosGenerales[0]->id_estado_civil-1]->desc_ec),1,0,"C");
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(15,3,"No. Hijos: ". utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(13,3,"". utf8_decode($datosGenerales[0]->no_hijos),1,0,"C");
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(15,3,utf8_decode("Dirección: "). utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(119,3,"". utf8_decode($datosGenerales[0]->direccion),1,0,"C");
        $pdf->Ln(3);

        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/2,3,"e-mail: ". utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(($pdf->GetPageWidth()-20)/2,3,"". utf8_decode($datosGenerales[0]->correo),1,0,"C");
        $pdf->Ln(3);
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/6,3,"Tel. Casa: ". utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(($pdf->GetPageWidth()-20)/6,3,"". utf8_decode($datosGenerales[0]->tel_casa),1,0,"C");
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/6,3,"Cel: ". utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(($pdf->GetPageWidth()-20)/6,3,"". utf8_decode($datosGenerales[0]->cel),1,0,"C");
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/6,3,utf8_decode("Nivel Socio-económico"). utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        if ($datosGenerales[0]->id_nivel_economico==1)
        {
            $datosGenerales[0]->id_nivel_economico='Alto';
        }
        if ($datosGenerales[0]->id_nivel_economico==2)
        {
            $datosGenerales[0]->id_nivel_economico='Medio';
        }
        if ($datosGenerales[0]->id_nivel_economico==3)
        {
            $datosGenerales[0]->id_nivel_economico='Bajo';
        }
        $pdf->Cell(($pdf->GetPageWidth()-20)/6,3,"". utf8_decode($datosGenerales[0]->id_nivel_economico),1,0,"C");
        $pdf->Ln(3);

        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(15,3,utf8_decode("¿Trabaja?: "). utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(13,3,"". utf8_decode($datosGenerales[0]->trabaja==1?'Si':'No'),1,0,"C");
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(15,3,utf8_decode("Ocupación: "). utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(119,3,"". utf8_decode($datosGenerales[0]->ocupacion),1,0,"C");
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(15,3,"Horario: ". utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(13,3,"". utf8_decode($datosGenerales[0]->horario),1,0,"C");
        $pdf->Ln(3);

        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(15,3,"No.Cta: ". utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(14,3,"". utf8_decode($datosGenerales[0]->no_cuenta),1,0,"C");
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(15,3,"Beca: ". utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(13,3,"". utf8_decode($datosGenerales[0]->beca==1?'Si':'No'),1,0,"C");
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(15,3,"Tipo Beca: ". utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(62,3,"". utf8_decode($datosGenerales[0]->tipo_beca),1,0,"C");
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(15,3,"Estado: ". utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(13,3,"". utf8_decode($datosGenerales[0]->estado==1?'Regular':'Irregular'),1,0,"C");
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(15,3,"Turno: ". utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        if ($datosGenerales[0]->turno==1)
        {
            $datosGenerales[0]->turno='Matutino';
        }
        if ($datosGenerales[0]->turno==2)
        {
            $datosGenerales[0]->turno='Vespertino';
        }
        if ($datosGenerales[0]->turno==3)
        {
            $datosGenerales[0]->turno='Mixto';
        }
        $pdf->Cell(13,3,"". utf8_decode($datosGenerales[0]->turno),1,0,"C");
        $pdf->Ln(3);



        $pdf->SetFont('Arial', 'B', 7);
        $pdf->SetTextColor(255,255,255);
        $pdf->SetFillColor(156,156,156);
        $pdf->Cell(($pdf->GetPageWidth()-20),9,utf8_decode("ANTECEDENTES ACÁDEMICOS").utf8_decode(""),1,4,"C","true");
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->SetTextColor(010,010,010);
        $pdf->SetFillColor(204,204,204);
        $pdf->Cell(($pdf->GetPageWidth()-20)/8,3,"Bachillerato: ". utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(($pdf->GetPageWidth()-20)/8,3,"". utf8_decode($datosAntecedentes[0]->id_bachillerato==1?'Tecnico':'General'),1,0,"C");
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/8,3,"Otros estudios: ". utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(($pdf->GetPageWidth()-20)/8,3,"". utf8_decode($datosAntecedentes[0]->otros_estudios),1,0,"C");
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/8,3,utf8_decode("Años en que curso el bachillerato: "). utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(($pdf->GetPageWidth()-20)/8,3,"". utf8_decode($datosAntecedentes[0]->años_curso_bachillerato>5?'Mas':$datosAntecedentes[0]->años_curso_bachillerato),1,0,"C");
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/8,3,utf8_decode("Año de terminación: "). utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(($pdf->GetPageWidth()-20)/8,3,"". utf8_decode($datosAntecedentes[0]->año_terminacion),1,0,"C");
        $pdf->Ln(3);

        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(24,3,utf8_decode("Escuela de procedencia: "). utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(136,3,"". utf8_decode($datosAntecedentes[0]->escuela_procedente),1,0,"C");
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(17,3,"Promedio: ". utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(13,3,"". utf8_decode($datosAntecedentes[0]->promedio),1,0,"C");
        $pdf->Ln(3);

        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(80,3,"Materias reprobadas en el bachillerato: ". utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(110,3,"". utf8_decode($datosAntecedentes[0]->materias_reprobadas),1,0,"C");
        $pdf->Ln(3);
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/6,3,"Otra carrera iniciada: ". utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(($pdf->GetPageWidth()-20)/6,3,"". utf8_decode($datosAntecedentes[0]->otra_carrera_ini==1?'Si':'No'),1,0,"C");
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/6,3,utf8_decode("Institución: "). utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(($pdf->GetPageWidth()-20)/6,3,"". utf8_decode($datosAntecedentes[0]->institucion),1,0,"C");
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/6,3,"Semestres cursados: ". utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(($pdf->GetPageWidth()-20)/6,3,"". utf8_decode($datosAntecedentes[0]->semestres_cursados),1,0,"C");
        $pdf->Ln(3);
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/4,3,utf8_decode("Interrupciones en los estudios: "). utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(($pdf->GetPageWidth()-20)/4,3,"". utf8_decode($datosAntecedentes[0]->interrupciones_estudios==1?'Si':'No'),1,0,"C");
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/4,3,"Razones: ". utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(($pdf->GetPageWidth()-20)/4,3,"". utf8_decode($datosAntecedentes[0]->razones_interrupcion),1,0,"C");
        $pdf->Ln(3);
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/2,3,utf8_decode("¿Cuál fue la razón por la que decidio estudiar en el TESVB?: "). utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(($pdf->GetPageWidth()-20)/2,3,"". utf8_decode($datosAntecedentes[0]->razon_descide_estudiar_tesvb),1,0,"C");
        $pdf->Ln(3);
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/2,3,utf8_decode("¿Tienes información sobre el perfil profecional de la carrera?: "). utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(($pdf->GetPageWidth()-20)/2,3,"". utf8_decode($datosAntecedentes[0]->sabedel_perfil_profesional),1,0,"C");
        $pdf->Ln(3);
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(60,3,utf8_decode("¿Tuviste opciones vocacionales por otras carreras?: "). utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(13,3,"". utf8_decode($datosAntecedentes[0]->otras_opciones_vocales==1?'Si':'No'),1,0,"C");
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(15,3,utf8_decode("¿Cuales?: "). utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(102,3,"". utf8_decode($datosAntecedentes[0]->cuales_otras_opciones_vocales),1,0,"C");
        $pdf->Ln(3);
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(60,3,utf8_decode("¿Te gusta la carrera elegida?: "). utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(13,3,"". utf8_decode($datosAntecedentes[0]->tegusta_carrera_elegida==1?'Si':'No'),1,0,"C");
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(15,3,utf8_decode("¿Por qué?: "). utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(102,3,"". utf8_decode($datosAntecedentes[0]->porque_carrera_elegida),1,0,"C");
        $pdf->Ln(3);
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(60,3,utf8_decode("¿Suspención después de terminar el bachillerato?: "). utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(13,3,"". utf8_decode($datosAntecedentes[0]->suspension_estudios_bachillerato==1?'Si':'No'),1,0,"C");
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(15,3,"Razones: ". utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(102,3,"". utf8_decode($datosAntecedentes[0]->razones_suspension_estudios),1,0,"C");
        $pdf->Ln(3);
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/2,3,utf8_decode("¿Te estimula tu familia en tus estudios?: "). utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(($pdf->GetPageWidth()-20)/2,3,"". utf8_decode($datosAntecedentes[0]->teestimula_familia==1?'Si':'No'),1,0,"C");
        $pdf->Ln(3);


        $pdf->SetFont('Arial', 'B', 7);
        $pdf->SetTextColor(255,255,255);
        $pdf->SetFillColor(156,156,156);
        $pdf->Cell(($pdf->GetPageWidth()-20),10,"DATOS FAMILIARES".utf8_decode(""),1,4,"C","true");
        $pdf->SetTextColor(010,010,010);
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->SetFillColor(204,204,204);
        $pdf->Cell(40,3,"Nombre del padre: ". utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(85,3,"". utf8_decode($datosFamiliares[0]->nombre_padre),1,0,"C");
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(35,3,"Edad: ". utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(30,3,"". utf8_decode($datosFamiliares[0]->edad_padre),1,0,"C");
        $pdf->Ln(3);
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(25,3,utf8_decode("Ocupación: "). utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(60,3,"". utf8_decode($datosFamiliares[0]->ocupacion_padre),1,0,"C");
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(25,3,"Lugar de residencia: ". utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(80,3,"". utf8_decode($datosFamiliares[0]->lugar_residencia_padre),1,0,"C");
        $pdf->Ln(3);
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(40,3,"Nombre de la madre: ". utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(85,3,"". utf8_decode($datosFamiliares[0]->nombre_madre),1,0,"C");
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(35,3,"Edad: ". utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(30,3,"". utf8_decode($datosFamiliares[0]->edad_madre),1,0,"C");
        $pdf->Ln(3);
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(25,3,utf8_decode("Ocupación: "). utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(60,3,"". utf8_decode($datosFamiliares[0]->ocupacion_madre),1,0,"C");
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(25,3,"Lugar de residencia: ". utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(80,3,"". utf8_decode($datosFamiliares[0]->lugar_residencia_madre),1,0,"C");
        $pdf->Ln(3);
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/8,3,"No. Hermanos: ". utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(($pdf->GetPageWidth()-20)/8,3,"". utf8_decode($datosFamiliares[0]->no_hermanos),1,0,"C");
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/8,3,"Lugar que ocupas entre ellos: ". utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(($pdf->GetPageWidth()-20)/8,3,"". utf8_decode($datosFamiliares[0]->lugar_ocupas),1,0,"C");
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/8,3,"Actualmente vives: ". utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        if ($datosFamiliares[0]->id_opc_vives==1)
        {
            $datosFamiliares[0]->id_opc_vives='Con los padres';
        }
        if ($datosFamiliares[0]->id_opc_vives==2)
        {
            $datosFamiliares[0]->id_opc_vives='Con otros estudiantes';
        }
        if ($datosFamiliares[0]->id_opc_vives==3)
        {
            $datosFamiliares[0]->id_opc_vives='Con tios u otros familiares';
        }
        if ($datosFamiliares[0]->id_opc_vives==4)
        {
            $datosFamiliares[0]->id_opc_vives='Solo';
        }
        $pdf->Cell(($pdf->GetPageWidth()-20)/8,3,"". utf8_decode($datosFamiliares[0]->id_opc_vives),1,0,"C");
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/8,3,"No. de personas: ". utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(($pdf->GetPageWidth()-20)/8,3,"". utf8_decode($datosFamiliares[0]->no_personas),1,0,"C");
        $pdf->Ln(3);
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/6,3,"Perteneces a una etnia indigena: ". utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(($pdf->GetPageWidth()-20)/6,3,"". utf8_decode($datosFamiliares[0]->etnia_indigena==1?'Si':'No'),1,0,"C");
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/6,3,utf8_decode("¿Cuál?: "). utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(($pdf->GetPageWidth()-20)/6,3,"". utf8_decode($datosFamiliares[0]->cual_etnia),1,0,"C");
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/6,3,"Hablas una lengua indigena: ". utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(($pdf->GetPageWidth()-20)/6,3,"". utf8_decode($datosFamiliares[0]->hablas_lengua_indigena==1?'Si':'No'),1,0,"C");
        $pdf->Ln(3);
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/4,3,utf8_decode("¿Quién sostiene económicamente tu hogar?: "). utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(($pdf->GetPageWidth()-20)/4,3,"". utf8_decode($datosFamiliares[0]->sostiene_economia_hogar),1,0,"C");
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/4,3,"Consideras a tu familia: ". utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        if ($datosFamiliares[0]->id_familia_union==1)
        {
            $datosFamiliares[0]->id_familia_union='Unida';
        }
        if ($datosFamiliares[0]->id_familia_union==2)
        {
            $datosFamiliares[0]->id_familia_union='Muy unida';
        }
        if ($datosFamiliares[0]->id_familia_union==3)
        {
            $datosFamiliares[0]->id_familia_union='Disfuncional';
        }
        $pdf->Cell(($pdf->GetPageWidth()-20)/4,3,"". utf8_decode($datosFamiliares[0]->id_familia_union),1,0,"C");
        $pdf->Ln(3);
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/4,3,"Nombre del tutor: ". utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(($pdf->GetPageWidth()-20)/4,3,"". utf8_decode($datosFamiliares[0]->nombre_tutor),1,0,"C");
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/4,3,"Parentesco:  ". utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(($pdf->GetPageWidth()-20)/4,3,"". utf8_decode($datosFamiliares[0]->id_parentesco),1,0,"C");
        $pdf->Ln(3);



        $pdf->SetFont('Arial', 'B', 7);
        $pdf->SetTextColor(255,255,255);
        $pdf->SetFillColor(156,156,156);
        $pdf->Cell(($pdf->GetPageWidth()-20),9,utf8_decode("HABITOS DE ESTUDIO").utf8_decode(""),1,4,"C","true");
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->SetTextColor(010,010,010);
        $pdf->SetFillColor(204,204,204);
        $pdf->Cell(($pdf->GetPageWidth()-20)/4,3,"Tiempo dedicado a estudiar diariamente fuera de clase: ". utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(($pdf->GetPageWidth()-20)/4,3,"". utf8_decode($datosHabitos[0]->tiempo_empelado_estudiar==3?'2 horas':'3 horas'),1,0,"C");
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/4,3,utf8_decode("¿Cómo es tu forma de trabajo intelectual?: "). utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        if ($datosHabitos[0]->id_opc_intelectual==1)
        {
            $datosHabitos[0]->id_opc_intelectual='Muy rápido';
        }
        if ($datosHabitos[0]->id_opc_intelectual==2)
        {
            $datosHabitos[0]->id_opc_intelectual='Rápido';
        }
        if ($datosHabitos[0]->id_opc_intelectual==3)
        {
            $datosHabitos[0]->id_opc_intelectual='Regular';
        }
        if ($datosHabitos[0]->id_opc_intelectual==4)
        {
            $datosHabitos[0]->id_opc_intelectual='Lento';
        }
        if ($datosHabitos[0]->id_opc_intelectual==5)
        {
            $datosHabitos[0]->id_opc_intelectual='Muy lento';
        }
        $pdf->Cell(($pdf->GetPageWidth()-20)/4,3,"". utf8_decode($datosHabitos[0]->id_opc_intelectual),1,0,"C");
        $pdf->Ln(3);
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/2,3,utf8_decode("Tu forma de estudio más utlizada: "). utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(($pdf->GetPageWidth()-20)/2,3,"". utf8_decode($datosHabitos[0]->forma_estudio),1,0,"C");
        $pdf->Ln(3);
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/2,3,utf8_decode("¿Cómo empleas tu tiempo libre?: "). utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(($pdf->GetPageWidth()-20)/2,3,"". utf8_decode($datosHabitos[0]->tiempo_libre),1,0,"C");
        $pdf->Ln(3);
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/2,3,"Asignaturas preferidas: ". utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(($pdf->GetPageWidth()-20)/2,3,"". utf8_decode($datosHabitos[0]->asignatura_preferida),1,0,"C");
        $pdf->Ln(3);
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/2,3,utf8_decode("¿Por qué?: "). utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(($pdf->GetPageWidth()-20)/2,3,"". utf8_decode($datosHabitos[0]->porque_asignatura),1,0,"C");
        $pdf->Ln(3);
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/2,3,utf8_decode("Asignaturas que te han sido difíciles: "). utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(($pdf->GetPageWidth()-20)/2,3,"". utf8_decode($datosHabitos[0]->asignatura_dificil),1,0,"C");
        $pdf->Ln(3);
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/2,3,utf8_decode("¿Por qué?: "). utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(($pdf->GetPageWidth()-20)/2,3,"". utf8_decode($datosHabitos[0]->porque_asignatura_dificil),1,0,"C");
        $pdf->Ln(3);
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/2,3,utf8_decode("¿Qué opinión tines de ti mismo como estudiante?: "). utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(($pdf->GetPageWidth()-20)/2,3,"". utf8_decode($datosHabitos[0]->opinion_tu_mismo_estudiante),1,0,"C");
        $pdf->Ln(3);



        $pdf->SetFont('Arial', 'B', 7);
        $pdf->SetTextColor(255,255,255);
        $pdf->SetFillColor(156,156,156);
        $pdf->Cell(($pdf->GetPageWidth()-20),9,utf8_decode("FORMACIÓN INTEGRAL/SALUD").utf8_decode(""),1,4,"C","true");
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->SetTextColor(010,010,010);
        $pdf->SetFillColor(204,204,204);
        $pdf->Cell(($pdf->GetPageWidth()-20)/4,3,utf8_decode("¿Practica regularmente algún deporte?: "). utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(($pdf->GetPageWidth()-20)/4,3,"". utf8_decode($datosFormacion[0]->practica_deporte==1?'Si':'No'),1,0,"C");
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/4,3,"Especificar: ". utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(($pdf->GetPageWidth()-20)/4,3,"". utf8_decode($datosFormacion[0]->especifica_deporte),1,0,"C");
        $pdf->Ln(3);
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/4,3,utf8_decode("¿Practicas alguna actividad artística?: "). utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(($pdf->GetPageWidth()-20)/4,3,"". utf8_decode($datosFormacion[0]->practica_artistica==1?'Si':'No'),1,0,"C");
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/4,3,"Especificar: ". utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(($pdf->GetPageWidth()-20)/4,3,"". utf8_decode($datosFormacion[0]->especifica_artistica),1,0,"C");
        $pdf->Ln(3);
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/2,3,"Tu pasatiempo favorito: ". utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(($pdf->GetPageWidth()-20)/2,3,"". utf8_decode($datosFormacion[0]->pasatiempo),1,0,"C");
        $pdf->Ln(3);
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/4,3,utf8_decode("¿Participas en actividades culturales, sociales?: "). utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(($pdf->GetPageWidth()-20)/4,3,"". utf8_decode($datosFormacion[0]->actividades_culturales==1?'Si':'No'),1,0,"C");
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/4,3,utf8_decode("¿Cuáles?: "). utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(($pdf->GetPageWidth()-20)/4,3,"". utf8_decode($datosFormacion[0]->cuales_act),1,0,"C");
        $pdf->Ln(3);
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/6,3,utf8_decode("¿Cómo consideras tu estado de salud?: "). utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        if ($datosFormacion[0]->estado_salud==1)
        {
            $datosFormacion[0]->estado_salud='Excelente';
        }
        if ($datosFormacion[0]->estado_salud==2)
        {
            $datosFormacion[0]->estado_salud='Buena';
        }
        if ($datosFormacion[0]->estado_salud==3)
        {
            $datosFormacion[0]->estado_salud='Regular';
        }
        if ($datosFormacion[0]->estado_salud==4)
        {
            $datosFormacion[0]->estado_salud='Mala';
        }
        $pdf->Cell(($pdf->GetPageWidth()-20)/6,3,"". utf8_decode($datosFormacion[0]->estado_salud),1,0,"C");
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/6,3,utf8_decode("¿Padeces alguna enfermedad crónica?: "). utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(($pdf->GetPageWidth()-20)/6,3,"". utf8_decode($datosFormacion[0]->enfermedad_cronica==1?'Si':'No'),1,0,"C");
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/6,3,"Especificar: ". utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(($pdf->GetPageWidth()-20)/6,3,"". utf8_decode($datosFormacion[0]->especifica_enf_cron),1,0,"C");
        $pdf->Ln(3);
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/4,3,utf8_decode("¿Tus padres padecen alguna enfermedad crónica?: "). utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(($pdf->GetPageWidth()-20)/4,3,"". utf8_decode($datosFormacion[0]->enf_cron_padre==1?'Si':'No'),1,0,"C");
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/4,3,"Especificar: ". utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(($pdf->GetPageWidth()-20)/4,3,"". utf8_decode($datosFormacion[0]->especifica_enf_cron_padres),1,0,"C");
        $pdf->Ln(3);
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/4,3,utf8_decode("¿Te han realizado alguna operación médico-quirúrgica: "). utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(($pdf->GetPageWidth()-20)/4,3,"". utf8_decode($datosFormacion[0]->operacion==1?'Si':'No'),1,0,"C");
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/4,3,utf8_decode("¿De qué?: "). utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(($pdf->GetPageWidth()-20)/4,3,"". utf8_decode($datosFormacion[0]->deque_operacion),1,0,"C");
        $pdf->Ln(3);
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/6,3,utf8_decode("¿Padeces alguna enfermedad visual?: "). utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(($pdf->GetPageWidth()-20)/6,3,"". utf8_decode($datosFormacion[0]->enfer_visual==1?'Si':'No'),1,0,"C");
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/6,3,"Especificar: ". utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(($pdf->GetPageWidth()-20)/6,3,"". utf8_decode($datosFormacion[0]->especifica_enf),1,0,"C");
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/6,3,utf8_decode("¿Usas lentes?: "). utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(($pdf->GetPageWidth()-20)/6,3,"". utf8_decode($datosFormacion[0]->usas_lentes==1?'Sí':'No'),1,0,"C");
        $pdf->Ln(3);

        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(20,3,utf8_decode("¿Tomas medicamento?: "). utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(10,3,"". utf8_decode($datosFormacion[0]->medicamento_controlado==1?'Sí':'No'),1,0,"C");
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(15,3,"Especificar: ". utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(95,3,"". utf8_decode($datosFormacion[0]->especifica_medicamento),1,0,"C");
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(15,3,"Estatura: ". utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(10,3,"". utf8_decode($datosFormacion[0]->estatura),1,0,"C");
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(15,3,"Peso: ". utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(10,3,"". utf8_decode($datosFormacion[0]->peso),1,0,"C");
        $pdf->Ln(3);

        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/4,3,utf8_decode("¿Has tenido algún acidente grave?: "). utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(($pdf->GetPageWidth()-20)/4,3,"". utf8_decode($datosFormacion[0]->accidente_grave==1?'Si':'No'),1,0,"C");
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/4,3,"Relata brevemente: ". utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(($pdf->GetPageWidth()-20)/4,3,"". utf8_decode($datosFormacion[0]->relata_breve),1,0,"C");
        $pdf->Ln(3);



        $pdf->SetFont('Arial', 'B', 7);
        $pdf->SetTextColor(255,255,255);
        $pdf->SetFillColor(156,156,156);
        $pdf->Cell(($pdf->GetPageWidth()-20),9,utf8_decode("ÁREA PSICOPEDAGÓGICA (CONOCIMIENTOS Y HABILIDADES)").utf8_decode(""),1,4,"C","true");
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->SetTextColor(010,010,010);
        $pdf->SetFillColor(204,204,204);
        $pdf->Cell(($pdf->GetPageWidth()-20)/8,3,"Rendimiento escolar: ". utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        if ($datosArea[0]->rendimiento_escolar==1)
        {
            $datosArea[0]->rendimiento_escolar='Excelente';
        }
        if ($datosArea[0]->rendimiento_escolar==2)
        {
            $datosArea[0]->rendimiento_escolar='Muy bien';
        }
        if ($datosArea[0]->rendimiento_escolar==3)
        {
            $datosArea[0]->rendimiento_escolar='Bien';
        }
        if ($datosArea[0]->rendimiento_escolar==4)
        {
            $datosArea[0]->rendimiento_escolar='Regular';
        }
        if ($datosArea[0]->rendimiento_escolar==5)
        {
            $datosArea[0]->rendimiento_escolar='Mala';
        }
        $pdf->Cell(($pdf->GetPageWidth()-20)/8,3,"". utf8_decode($datosArea[0]->rendimiento_escolar),1,0,"C");
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/8,3,"Dominio del propio idioma: ". utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        if ($datosArea[0]->dominio_idioma==1)
        {
            $datosArea[0]->dominio_idioma='Excelente';
        }
        if ($datosArea[0]->dominio_idioma==2)
        {
            $datosArea[0]->dominio_idioma='Muy bien';
        }
        if ($datosArea[0]->dominio_idioma==3)
        {
            $datosArea[0]->dominio_idioma='Bien';
        }
        if ($datosArea[0]->dominio_idioma==4)
        {
            $datosArea[0]->dominio_idioma='Regular';
        }
        if ($datosArea[0]->dominio_idioma==5)
        {
            $datosArea[0]->dominio_idioma='Mala';
        }
        $pdf->Cell(($pdf->GetPageWidth()-20)/8,3,"". utf8_decode($datosArea[0]->dominio_idioma),1,0,"C");
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/8,3,"Otro idioma: ". utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        if ($datosArea[0]->otro_idioma==1)
        {
            $datosArea[0]->otro_idioma='Excelente';
        }
        if ($datosArea[0]->otro_idioma==2)
        {
            $datosArea[0]->otro_idioma='Muy bien';
        }
        if ($datosArea[0]->otro_idioma==3)
        {
            $datosArea[0]->otro_idioma='Bien';
        }
        if ($datosArea[0]->otro_idioma==4)
        {
            $datosArea[0]->otro_idioma='Regular';
        }
        if ($datosArea[0]->otro_idioma==5)
        {
            $datosArea[0]->otro_idioma='Mala';
        }
        $pdf->Cell(($pdf->GetPageWidth()-20)/8,3,"". utf8_decode($datosArea[0]->otro_idioma),1,0,"C");
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/8,3,utf8_decode("Conocimientos de cómputo: "). utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        if ($datosArea[0]->conocimiento_compu==1)
        {
            $datosArea[0]->conocimiento_compu='Excelente';
        }
        if ($datosArea[0]->conocimiento_compu==2)
        {
            $datosArea[0]->conocimiento_compu='Muy bien';
        }
        if ($datosArea[0]->conocimiento_compu==3)
        {
            $datosArea[0]->conocimiento_compu='Bien';
        }
        if ($datosArea[0]->conocimiento_compu==4)
        {
            $datosArea[0]->conocimiento_compu='Regular';
        }
        if ($datosArea[0]->conocimiento_compu==5)
        {
            $datosArea[0]->conocimiento_compu='Mala';
        }
        $pdf->Cell(($pdf->GetPageWidth()-20)/8,3,"". utf8_decode($datosArea[0]->conocimiento_compu),1,0,"C");
        $pdf->Ln(3);
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/6,3,"Aptitudes especiales: ". utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        if ($datosArea[0]->aptitud_especial==1)
        {
            $datosArea[0]->aptitud_especial='Excelente';
        }
        if ($datosArea[0]->aptitud_especial==2)
        {
            $datosArea[0]->aptitud_especial='Muy bien';
        }
        if ($datosArea[0]->aptitud_especial==3)
        {
            $datosArea[0]->aptitud_especial='Bien';
        }
        if ($datosArea[0]->aptitud_especial==4)
        {
            $datosArea[0]->aptitud_especial='Regular';
        }
        if ($datosArea[0]->aptitud_especial==5)
        {
            $datosArea[0]->aptitud_especial='Mala';
        }
        $pdf->Cell(($pdf->GetPageWidth()-20)/6,3,"". utf8_decode($datosArea[0]->aptitud_especial),1,0,"C");
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/6,3,utf8_decode("Comprensión y retención en clase: "). utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        if ($datosArea[0]->comprension==1)
        {
            $datosArea[0]->comprension='Excelente';
        }
        if ($datosArea[0]->comprension==2)
        {
            $datosArea[0]->comprension='Muy bien';
        }
        if ($datosArea[0]->comprension==3)
        {
            $datosArea[0]->comprension='Bien';
        }
        if ($datosArea[0]->comprension==4)
        {
            $datosArea[0]->comprension='Regular';
        }
        if ($datosArea[0]->comprension==5)
        {
            $datosArea[0]->comprension='Mala';
        }
        $pdf->Cell(($pdf->GetPageWidth()-20)/6,3,"". utf8_decode($datosArea[0]->comprension),1,0,"C");
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/6,3,utf8_decode("Preparación y presentación de examenes: "). utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        if ($datosArea[0]->preparacion==1)
        {
            $datosArea[0]->preparacion='Excelente';
        }
        if ($datosArea[0]->preparacion==2)
        {
            $datosArea[0]->preparacion='Muy bien';
        }
        if ($datosArea[0]->preparacion==3)
        {
            $datosArea[0]->preparacion='Bien';
        }
        if ($datosArea[0]->preparacion==4)
        {
            $datosArea[0]->preparacion='Regular';
        }
        if ($datosArea[0]->preparacion==5)
        {
            $datosArea[0]->preparacion='Mala';
        }
        $pdf->Cell(($pdf->GetPageWidth()-20)/6,3,"". utf8_decode($datosArea[0]->preparacion),1,0,"C");
        $pdf->Ln(3);
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/4,3,utf8_decode("Aplicación de estrategias de aprendizaje y estudio: "). utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        if ($datosArea[0]->estrategias_aprendizaje==1)
        {
            $datosArea[0]->estrategias_aprendizaje='Excelente';
        }
        if ($datosArea[0]->estrategias_aprendizaje==2)
        {
            $datosArea[0]->estrategias_aprendizaje='Muy bien';
        }
        if ($datosArea[0]->estrategias_aprendizaje==3)
        {
            $datosArea[0]->estrategias_aprendizaje='Bien';
        }
        if ($datosArea[0]->estrategias_aprendizaje==4)
        {
            $datosArea[0]->estrategias_aprendizaje='Regular';
        }
        if ($datosArea[0]->estrategias_aprendizaje==5)
        {
            $datosArea[0]->estrategias_aprendizaje='Mala';
        }
        $pdf->Cell(($pdf->GetPageWidth()-20)/4,3,"". utf8_decode($datosArea[0]->estrategias_aprendizaje),1,0,"C");
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/4,3,utf8_decode("Organización en las actividades de estudio: "). utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        if ($datosArea[0]->organizacion_actividades==1)
        {
            $datosArea[0]->organizacion_actividades='Excelente';
        }
        if ($datosArea[0]->organizacion_actividades==2)
        {
            $datosArea[0]->organizacion_actividades='Muy bien';
        }
        if ($datosArea[0]->organizacion_actividades==3)
        {
            $datosArea[0]->organizacion_actividades='Bien';
        }
        if ($datosArea[0]->organizacion_actividades==4)
        {
            $datosArea[0]->organizacion_actividades='Regular';
        }
        if ($datosArea[0]->organizacion_actividades==5)
        {
            $datosArea[0]->organizacion_actividades='Mala';
        }
        $pdf->Cell(($pdf->GetPageWidth()-20)/4,3,"". utf8_decode($datosArea[0]->organizacion_actividades),1,0,"C");
        $pdf->Ln(3);
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/4,3,utf8_decode("Consentración durante el estudio: "). utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        if ($datosArea[0]->concentracion==1)
        {
            $datosArea[0]->concentracion='Excelente';
        }
        if ($datosArea[0]->concentracion==2)
        {
            $datosArea[0]->concentracion='Muy bien';
        }
        if ($datosArea[0]->concentracion==3)
        {
            $datosArea[0]->concentracion='Bien';
        }
        if ($datosArea[0]->concentracion==4)
        {
            $datosArea[0]->concentracion='Regular';
        }
        if ($datosArea[0]->concentracion==5)
        {
            $datosArea[0]->concentracion='Mala';
        }
        $pdf->Cell(($pdf->GetPageWidth()-20)/4,3,"". utf8_decode($datosArea[0]->concentracion),1,0,"C");
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/4,3,utf8_decode("Solución de problemas y aprendizaje de las matemáticas: "). utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        if ($datosArea[0]->condiciones_ambientales==1)
        {
            $datosArea[0]->condiciones_ambientales='Excelente';
        }
        if ($datosArea[0]->condiciones_ambientales==2)
        {
            $datosArea[0]->condiciones_ambientales='Muy bien';
        }
        if ($datosArea[0]->condiciones_ambientales==3)
        {
            $datosArea[0]->condiciones_ambientales='Bien';
        }
        if ($datosArea[0]->condiciones_ambientales==4)
        {
            $datosArea[0]->condiciones_ambientales='Regular';
        }
        if ($datosArea[0]->condiciones_ambientales==5)
        {
            $datosArea[0]->condiciones_ambientales='Mala';
        }
        $pdf->Cell(($pdf->GetPageWidth()-20)/4,3,"". utf8_decode($datosArea[0]->condiciones_ambientales),1,0,"C");
        $pdf->Ln(3);
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/6,3,"Condiciones ambientales duarnte el estudio: ". utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        if ($datosArea[0]->busqueda_bibliografica==1)
        {
            $datosArea[0]->busqueda_bibliografica='Excelente';
        }
        if ($datosArea[0]->busqueda_bibliografica==2)
        {
            $datosArea[0]->busqueda_bibliografica='Muy bien';
        }
        if ($datosArea[0]->busqueda_bibliografica==3)
        {
            $datosArea[0]->busqueda_bibliografica='Bien';
        }
        if ($datosArea[0]->busqueda_bibliografica==4)
        {
            $datosArea[0]->busqueda_bibliografica='Regular';
        }
        if ($datosArea[0]->busqueda_bibliografica==5)
        {
            $datosArea[0]->busqueda_bibliografica='Mala';
        }
        $pdf->Cell(($pdf->GetPageWidth()-20)/6,3,"". utf8_decode($datosArea[0]->busqueda_bibliografica),1,0,"C");
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/6,3,utf8_decode("Búsqueda bibliografica: "). utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        $pdf->Cell(($pdf->GetPageWidth()-20)/6,3,"". utf8_decode($datosArea[0]->busqueda_bibliografica),1,0,"C");
        $pdf->SetFont('Arial', 'B', 4);
        $pdf->Cell(($pdf->GetPageWidth()-20)/6,3,"Trabajo en equipo: ". utf8_decode(""),1,0,"L","true");
        $pdf->SetFont('Arial', '', 3);
        if ($datosArea[0]->trabajo_equipo==1)
        {
            $datosArea[0]->trabajo_equipo='Excelente';
        }
        if ($datosArea[0]->trabajo_equipo==2)
        {
            $datosArea[0]->trabajo_equipo='Muy bien';
        }
        if ($datosArea[0]->trabajo_equipo==3)
        {
            $datosArea[0]->trabajo_equipo='Bien';
        }
        if ($datosArea[0]->trabajo_equipo==4)
        {
            $datosArea[0]->trabajo_equipo='Regular';
        }
        if ($datosArea[0]->trabajo_equipo==5)
        {
            $datosArea[0]->trabajo_equipo='Mala';
        }
        $pdf->Cell(($pdf->GetPageWidth()-20)/6,3,"". utf8_decode($datosArea[0]->trabajo_equipo),1,0,"C");
        $pdf->Output();
        exit();
    }

    public function pdf_lista(Request $request)
    {

        $datos=(DB::select('SELECT gnral_alumnos.*, exp_asigna_alumnos.estado,exp_asigna_alumnos.id_asigna_alumno
                 from gnral_alumnos JOIN exp_asigna_alumnos ON exp_asigna_alumnos.id_alumno=gnral_alumnos.id_alumno 
                 where exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' and 
                 gnral_alumnos.id_carrera='.$request->id_carrera.' order by(gnral_alumnos.apaterno)'));
        //dd($datos);
        $us=Auth::user()->id;
        $profesor=DB::select('SELECT gnral_personales.* FROM gnral_personales WHERE gnral_personales.tipo_usuario='.Auth::user()->id);
        $periodo=DB::select('SELECT gnral_periodos.periodo FROM gnral_personales, gnral_periodos, exp_asigna_tutor, exp_asigna_generacion WHERE gnral_periodos.id_periodo= exp_asigna_generacion.id and exp_asigna_generacion.id_asigna_generacion=exp_asigna_tutor.id_asigna_generacion and gnral_personales.id_personal=exp_asigna_tutor.id_personal and gnral_personales.tipo_usuario='.Auth::user()->id);
        //dd($periodo);

        $pdf= new \Codedge\Fpdf\Fpdf\Fpdf();
        $pdf->AddPage();
        $pdf->Image('img/edomex.png',10,0,30,15);
        $pdf->Image('img/TESVB.png',150,3,22,10);
        $pdf->Image('img/edomex1.png',175,2,25,10);
        $pdf->Line(173,2.5,173,13.5);
        $pdf->SetFont('Times', 'B', 10);
        $pdf->SetFillColor(192,192,192);
        $pdf->Ln(8);
        $pdf->Cell(($pdf->GetPageWidth()-20),5,"LISTA DE ASISTENCIA".utf8_decode(""),0,4,"C","true");
        $pdf->Ln(1);
        $pdf->SetFont('Times', 'B', 8);
        $pdf->Cell(($pdf->GetPageWidth()-20),3,"CARRERA: ". utf8_decode(mb_strtoupper("INGENIERIA EN SISTEMAS COMPUTACIONALES")),0,0,"L");
        $pdf->Ln(3);
        $pdf->Cell(($pdf->GetPageWidth()-20)/3,3,"ASIGNATURA: ". utf8_decode("TUTORIAS"),0,0,"L");
        $pdf->Cell(($pdf->GetPageWidth()-20)/3,3,"". utf8_decode(""),0,0,"L");
        $pdf->SetFillColor(192,192,192);
        $pdf->Cell(($pdf->GetPageWidth()-148)/1,3,"GRUPO: ".utf8_decode($datos[0]->grupo),0,1,"C","true");
        $pdf->Ln(0);
        $pdf->Cell(($pdf->GetPageWidth()-20)/2,3,"PROFESOR: ". utf8_decode(mb_strtoupper($profesor[0]->nombre)),0,0,"L");
        $pdf->Cell(($pdf->GetPageWidth()-20)/2,3,"PERIODO: ". utf8_decode(mb_strtoupper($periodo[0]->periodo)),0,0,"R");


        $pdf->Ln(10);
        $pdf->SetFont('Times', 'B', 6);
        $np=0;
        $pdf->Cell(8,3.5,"NP".utf8_decode(mb_strtoupper("")),'LRT',0,"C","true");
        $pdf->Cell(12,3.5,"No.CTA". utf8_decode(mb_strtoupper("")),'LRT',0,"C","true");
        $pdf->Cell(55,3.5,"NOMBRE". utf8_decode(mb_strtoupper("")),'LRT',0,"C","true");
        $pdf->Cell(114.7,3.5,"MES DE:". utf8_decode(mb_strtoupper("________________________________________")),'LRT',1,"C","true");
        $pdf->Cell(8,3,"".utf8_decode(mb_strtoupper("")),'LR',0,"C","true");
        $pdf->Cell(12,3,"". utf8_decode(mb_strtoupper("")),'LR',0,"C","true");
        $pdf->Cell(55,3,"". utf8_decode(mb_strtoupper("")),'LR',0,"C","true");

        $pdf->Cell(3.7,3,"". utf8_decode(mb_strtoupper("1")),'LRT',0,"C","true");
        $pdf->Cell(3.7,3,"". utf8_decode(mb_strtoupper("2")),'LRT',0,"C","true");
        $pdf->Cell(3.7,3,"". utf8_decode(mb_strtoupper("3")),'LRT',0,"C","true");
        $pdf->Cell(3.7,3,"". utf8_decode(mb_strtoupper("4")),'LRT',0,"C","true");
        $pdf->Cell(3.7,3,"". utf8_decode(mb_strtoupper("5")),'LRT',0,"C","true");
        $pdf->Cell(3.7,3,"". utf8_decode(mb_strtoupper("6")),'LRT',0,"C","true");
        $pdf->Cell(3.7,3,"". utf8_decode(mb_strtoupper("7")),'LRT',0,"C","true");
        $pdf->Cell(3.7,3,"". utf8_decode(mb_strtoupper("8")),'LRT',0,"C","true");
        $pdf->Cell(3.7,3,"". utf8_decode(mb_strtoupper("9")),'LRT',0,"C","true");
        $pdf->Cell(3.7,3,"". utf8_decode(mb_strtoupper("10")),'LRT',0,"C","true");
        $pdf->Cell(3.7,3,"". utf8_decode(mb_strtoupper("11")),'LRT',0,"C","true");
        $pdf->Cell(3.7,3,"". utf8_decode(mb_strtoupper("12")),'LRT',0,"C","true");
        $pdf->Cell(3.7,3,"". utf8_decode(mb_strtoupper("13")),'LRT',0,"C","true");
        $pdf->Cell(3.7,3,"". utf8_decode(mb_strtoupper("14")),'LRT',0,"C","true");
        $pdf->Cell(3.7,3,"". utf8_decode(mb_strtoupper("15")),'LRT',0,"C","true");
        $pdf->Cell(3.7,3,"". utf8_decode(mb_strtoupper("16")),'LRT',0,"C","true");
        $pdf->Cell(3.7,3,"". utf8_decode(mb_strtoupper("17")),'LRT',0,"C","true");
        $pdf->Cell(3.7,3,"". utf8_decode(mb_strtoupper("18")),'LRT',0,"C","true");
        $pdf->Cell(3.7,3,"". utf8_decode(mb_strtoupper("19")),'LRT',0,"C","true");
        $pdf->Cell(3.7,3,"". utf8_decode(mb_strtoupper("20")),'LRT',0,"C","true");
        $pdf->Cell(3.7,3,"". utf8_decode(mb_strtoupper("21")),'LRT',0,"C","true");
        $pdf->Cell(3.7,3,"". utf8_decode(mb_strtoupper("22")),'LRT',0,"C","true");
        $pdf->Cell(3.7,3,"". utf8_decode(mb_strtoupper("23")),'LRT',0,"C","true");
        $pdf->Cell(3.7,3,"". utf8_decode(mb_strtoupper("24")),'LRT',0,"C","true");
        $pdf->Cell(3.7,3,"". utf8_decode(mb_strtoupper("25")),'LRT',0,"C","true");
        $pdf->Cell(3.7,3,"". utf8_decode(mb_strtoupper("26")),'LRT',0,"C","true");
        $pdf->Cell(3.7,3,"". utf8_decode(mb_strtoupper("27")),'LRT',0,"C","true");
        $pdf->Cell(3.7,3,"". utf8_decode(mb_strtoupper("28")),'LRT',0,"C","true");
        $pdf->Cell(3.7,3,"". utf8_decode(mb_strtoupper("29")),'LRT',0,"C","true");
        $pdf->Cell(3.7,3,"". utf8_decode(mb_strtoupper("30")),'LRT',0,"C","true");
        $pdf->Cell(3.7,3,"". utf8_decode(mb_strtoupper("31")),'LRT',1,"C","true");

        foreach ($datos as $dat)
        {
            $pdf->Cell(8,5," ".utf8_decode(mb_strtoupper($np=0?$np=0:$np=$np+1)),1,0,"C");
            $pdf->Cell(12,5,"". utf8_decode(mb_strtoupper($dat->cuenta)),1,0,"C");
            $pdf->Cell(55,5,"". utf8_decode(mb_strtoupper($dat->apaterno." ".$dat->amaterno." ".$dat->nombre)),1,0,"C");
            $pdf->Cell(3.7,5,"". utf8_decode(mb_strtoupper("")),1,0,"C");
            $pdf->Cell(3.7,5,"". utf8_decode(mb_strtoupper("")),1,0,"C");
            $pdf->Cell(3.7,5,"". utf8_decode(mb_strtoupper("")),1,0,"C");
            $pdf->Cell(3.7,5,"". utf8_decode(mb_strtoupper("")),1,0,"C");
            $pdf->Cell(3.7,5,"". utf8_decode(mb_strtoupper("")),1,0,"C");
            $pdf->Cell(3.7,5,"". utf8_decode(mb_strtoupper("")),1,0,"C");
            $pdf->Cell(3.7,5,"". utf8_decode(mb_strtoupper("")),1,0,"C");
            $pdf->Cell(3.7,5,"". utf8_decode(mb_strtoupper("")),1,0,"C");
            $pdf->Cell(3.7,5,"". utf8_decode(mb_strtoupper("")),1,0,"C");
            $pdf->Cell(3.7,5,"". utf8_decode(mb_strtoupper("")),1,0,"C");
            $pdf->Cell(3.7,5,"". utf8_decode(mb_strtoupper("")),1,0,"C");
            $pdf->Cell(3.7,5,"". utf8_decode(mb_strtoupper("")),1,0,"C");
            $pdf->Cell(3.7,5,"". utf8_decode(mb_strtoupper("")),1,0,"C");
            $pdf->Cell(3.7,5,"". utf8_decode(mb_strtoupper("")),1,0,"C");
            $pdf->Cell(3.7,5,"". utf8_decode(mb_strtoupper("")),1,0,"C");
            $pdf->Cell(3.7,5,"". utf8_decode(mb_strtoupper("")),1,0,"C");
            $pdf->Cell(3.7,5,"". utf8_decode(mb_strtoupper("")),1,0,"C");
            $pdf->Cell(3.7,5,"". utf8_decode(mb_strtoupper("")),1,0,"C");
            $pdf->Cell(3.7,5,"". utf8_decode(mb_strtoupper("")),1,0,"C");
            $pdf->Cell(3.7,5,"". utf8_decode(mb_strtoupper("")),1,0,"C");
            $pdf->Cell(3.7,5,"". utf8_decode(mb_strtoupper("")),1,0,"C");
            $pdf->Cell(3.7,5,"". utf8_decode(mb_strtoupper("")),1,0,"C");
            $pdf->Cell(3.7,5,"". utf8_decode(mb_strtoupper("")),1,0,"C");
            $pdf->Cell(3.7,5,"". utf8_decode(mb_strtoupper("")),1,0,"C");
            $pdf->Cell(3.7,5,"". utf8_decode(mb_strtoupper("")),1,0,"C");
            $pdf->Cell(3.7,5,"". utf8_decode(mb_strtoupper("")),1,0,"C");
            $pdf->Cell(3.7,5,"". utf8_decode(mb_strtoupper("")),1,0,"C");
            $pdf->Cell(3.7,5,"". utf8_decode(mb_strtoupper("")),1,0,"C");
            $pdf->Cell(3.7,5,"". utf8_decode(mb_strtoupper("")),1,0,"C");
            $pdf->Cell(3.7,5,"". utf8_decode(mb_strtoupper("")),1,0,"C");
            $pdf->Cell(3.7,5,"". utf8_decode(mb_strtoupper("")),1,1,"C");

        }
        $pdf->Ln(10);
        $pdf->Cell(($pdf->GetPageWidth()),3,"". utf8_decode(mb_strtoupper("________________________________________________")),0,1,"C");
        $pdf->Cell(($pdf->GetPageWidth()),3,"". utf8_decode(mb_strtoupper($profesor[0]->nombre)),0,0,"C");

        $pdf->Output();
        exit();



    }


}

