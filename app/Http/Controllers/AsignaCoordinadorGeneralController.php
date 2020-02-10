<?php

namespace App\Http\Controllers;

use App\Desarrollo_asigna_coordinador_general;
use App\Gnral_periodos;
use App\Gnral_semestre;
use App\GnralPersonales;
use Illuminate\Http\Request;
use App\AsignaCoordinador;
use App\Periodo;
use App\User;
use App\DatosPersonales;
use App\Exp_asigna_coordinador;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AsignaCoordinadorGeneralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $datosProfesores=GnralPersonales::getAllProf();

        $checkasig=DB::select('SELECT * FROM desarrollo_asigna_coordinador_general,gnral_personales
                                        WHERE desarrollo_asigna_coordinador_general.id_personal=gnral_personales.id_personal
                                        AND desarrollo_asigna_coordinador_general.deleted_at is null
                                        AND desarrollo_asigna_coordinador_general.id_personal_asigna='.Session::get('desarrollo'));
        if(count($checkasig)>0)
        {
            $datos['check']=true;
        }
        else{
            $datos['check']=false;
        }
        $datos['profesores']=$datosProfesores;
        return $datos;

    }
    public function repo(Request $request){
        dd($request);
        $pdf = PDF::loadView('pdf');
        return $pdf->stream();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        Desarrollo_asigna_coordinador_general::create([
            "id_personal_asigna"=>Session::get('id_jefe_periodo'),
            "id_personal"=>$request->get("id_personal")
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Exp_asigna_coordinador::find($id)->delete();

    }
}
