<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
class calendario_eventosController extends Controller
{

    public function index()
    {
        $evento = DB::select('select desc_actividad as des ,fecha_inicio as fi,DATE_ADD(fecha_fin, interval 1 day) as ff,objetivo as ob,
                              instrucciones as ins
                              FROM planeacion;');
        return view('calendario_eventos.calendario_eventos')->with(compact( 'evento'));
    }


}
