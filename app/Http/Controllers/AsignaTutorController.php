<?php

namespace App\Http\Controllers;

use App\Exp_asigna_tutor;
use App\Gnral_periodos;
use Illuminate\Http\Request;
use App\AsignaCoordinador;
use App\AsignaTutor;
use App\Grupo;
use App\Periodo;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class AsignaTutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $datosProf=AsignaCoordinador::getAllProf();
        $datosPeriodos=Gnral_periodos::all();
        $noGrupo=Grupo::generacion();

        $datos['profesores']=$datosProf;
        $datos['periodos']=$datosPeriodos;
        if($noGrupo==null)
        {
            $datos['grupos']=null;
        }
        else{
            $datos['grupos']=$noGrupo;
        }
        return $datos;
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
        //$datos =explode(',',$request->da);


        //AsignaTutor::insertAsignaTuto($datos);
        $jefe=DB::table('gnral_jefes_periodos')
            ->join('gnral_personales','gnral_personales.id_personal','=','gnral_jefes_periodos.id_personal')
            ->select('gnral_jefes_periodos.id_jefe_periodo')
            ->where('gnral_jefes_periodos.id_periodo', '=', '2')
            ->where('gnral_personales.tipo_usuario','=',1)
            ->get();

        Exp_asigna_tutor::create([
            "id_jefe_periodo"=>$jefe[0]->id_jefe_periodo,
            "id_personal"=>$request->get("id_personal"),
            "id_asigna_generacion"=>$request->get("id_asigna_generacion"),
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
        Exp_asigna_tutor::find($id)->delete();

    }
}
