<?php

namespace App\Http\Controllers;

use App\Gnral_periodos;
use Illuminate\Http\Request;
use App\AsignaCoordinador;
use App\Periodo;
use App\User;
use App\DatosPersonales;
use App\Exp_asigna_coordinador;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class AsignaCoordinadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $datosProfesores=AsignaCoordinador::getAllProf();
        $checkasig=AsignaCoordinador::getExistCoordinador();
        $datosPeriodos=Gnral_periodos::all();

        $datos['profesores']=$datosProfesores;
        $datos['check']=$checkasig;
        $datos['periodos']=$datosPeriodos;
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

        $jefe=DB::table('gnral_jefes_periodos')
            ->join('gnral_personales','gnral_personales.id_personal','=','gnral_jefes_periodos.id_personal')
            ->select('gnral_jefes_periodos.id_jefe_periodo')
            ->where('gnral_jefes_periodos.id_periodo', '=', '2')
            ->where('gnral_personales.tipo_usuario','=',Auth::user()->id)
            ->get();

        Exp_asigna_coordinador::create([
            "id_jefe_periodo"=>$jefe[0]->id_jefe_periodo,
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
