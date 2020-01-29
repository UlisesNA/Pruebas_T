<?php

namespace App\Http\Controllers\Auth;

use App\gnral_alumnos;
use App\Gnral_periodos;
use App\GnralPersonales;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use App\Alumno;
use App\AsignaCoordinador;
use App\GnralJefePeriodos;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    use AuthenticatesUsers;
     protected function authenticated($request,$user){

         //dd($user);
         $fecha_hoy=date("Y-m-d");
         //dd($fecha);
         $periodo=DB::selectOne('SELECT *FROM  gnral_periodos where "'.$fecha_hoy.'" BETWEEN fecha_inicio AND fecha_termino');
         //dd($periodo);
         Session::put('id_periodo',$periodo->id_periodo);
         Session::put('nombre_periodo',$periodo->periodo);

         if ($user->tipo_usuario==1) {

             $alumno=gnral_alumnos::where('id_usuario',Auth::user()->id)->get();
             Session::put('cuenta',$alumno[0]->cuenta);
             Session::put('nombre',$alumno[0]->apaterno." ".$alumno[0]->amaterno." ".$alumno[0]->nombre);
             Session::put('id_alumno',$alumno[0]->id_alumno);
             return redirect('inicioalu');
            // return redirect('/panel');
         }else
             if ($user->tipo_usuario==2) {
                 //dd($user);

                 $jefe=DB::table('gnral_personales')
                     ->join('gnral_jefes_periodos','gnral_jefes_periodos.id_personal','=','gnral_personales.id_personal')
                     ->join('gnral_carreras','gnral_jefes_periodos.id_carrera','=','gnral_carreras.id_carrera')
                     ->where('gnral_jefes_periodos.id_periodo','=',Session::get('id_periodo'))
                     ->where('gnral_personales.tipo_usuario','=',$user->id)
                     ->select('gnral_personales.nombre','gnral_personales.id_departamento','gnral_jefes_periodos.id_carrera','gnral_jefes_periodos.id_personal',
                         'gnral_carreras.nombre as carrera','gnral_jefes_periodos.id_periodo','gnral_jefes_periodos.id_jefe_periodo')
                     ->get();

                 if($jefe->count()>0 && $jefe[0]->id_departamento==2){
                     $periodo_carrera=DB::select('SELECT id_periodo_carrera from gnral_periodo_carreras where id_carrera='.$jefe[0]->id_carrera.' and id_periodo='.$jefe[0]->id_periodo);
                     //dd($periodo_carrera);
                     Session::put('id_periodo_carrera',$periodo_carrera[0]->id_periodo_carrera);
                     Session::put('jefe',$jefe[0]->id_carrera);
                     Session::put('nombre',$jefe[0]->nombre);
                     Session::put('id_jefe_periodo',$jefe[0]->id_jefe_periodo);
                     return redirect('/jefevista');
                 }else{
                     //Session::put('coordinador',AsignaCoordinador::isCoordinador());

                     return redirect('/tutorvista');
                 }
             }

       /* if ($user->id_rol==1) {
            return redirect('/coordina_inst');
        }
        if ($user->id_rol==2) {
            return redirect('/planeacion');
        }
         if ($user->id_rol==4) {
             return redirect('/coordina_carrera');
         }
         if ($user->id_rol==5) {
             return redirect('/dep_desarrollo');
         }
         if ($user->id_rol==6) {
             return redirect('/jefe');
         }*/
     }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');

    }
}
