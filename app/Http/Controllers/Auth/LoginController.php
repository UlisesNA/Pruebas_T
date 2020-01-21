<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use App\Auth;
use App\Alumno;
use App\AsignaCoordinador;
use App\GnralJefePeriodos;
use Session;

class LoginController extends Controller
{
    use AuthenticatesUsers;
     protected function authenticated($request,$user){

         if ($user->tipo_usuario==1) {
             //dd('ALumno');
             $alumno=Alumno::getCuenta();
             //d($alumno);
             Session::put('cuenta',$alumno[0]->cuenta);
             Session::put('nombre',$alumno[0]->apaterno." ".$alumno[0]->amaterno." ".$alumno[0]->nombre);
             # code...
             return redirect('/panel');
         }else
             if ($user->tipo_usuario==2) {
                 //dd($user);
                 $jefe=GnralJefePeriodos::isJefe($user);

                 if($jefe && $jefe[0]->id_departamento==2){
                     //dd();
                     Session::put('jefe',$jefe[0]->id_carrera);
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
