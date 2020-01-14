<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use App\Auth;
use App\Alumno;
use App\AsignaCoordinador;
use Session;

class LoginController extends Controller
{
    use AuthenticatesUsers;
     protected function authenticated($request,$user){
        if ($user->id_rol==1) {
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
         }
     }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');

    }
}
