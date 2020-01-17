<?php

namespace App\Http\Controllers;

use App\Exp_asigna_expediente;
use App\Exp_generale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class GeneradorController extends Controller
{
    public function index()
    {
        return \View::make('pdf.pdf');
    }
    public function save(Request $request)
    {

        //obtenemos el campo file definido en el formulario
        $file = $request->file('file');

        //obtenemos el nombre del archivo
        $nombre = $file->getClientOriginalName();

        //indicamos que queremos guardar un nuevo archivo en el disco local
        \Storage::disk('local')->put($nombre,  \File::get($file));

        return "archivo guardado";
    }

    public function imprimir(){
        $pdf = \PDF::loadView('alumno.expedientepdf');
        return $pdf->stream('expediente.pdf');
    }

    public function print_pdf($id)
    {

        $datos=Exp_asigna_expediente::find($id);
       // dd($datos);
        //$datos=Exp_generale::find(1);
        $pdf = \PDF::loadView('alumno.expedientepdf',compact("datos"));
        return $pdf->stream('expediente.pdf');
    }
    public function subirArchivo(Request $request)
    {
        //Recibimos el archivo y lo guardamos en la carpeta storage/app/public
        $request->file('archivo')->store('public');
        dd("subido y guardado");
    }

    public function store(Request $request)
    {

    }

    public function updateExp(Request $request)
    {
        //            ""=>




    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function cerrar()
    {

    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
