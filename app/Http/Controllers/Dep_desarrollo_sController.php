<?php
namespace App\Http\Controllers;
use App\Planeacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
class Dep_desarrollo_sController extends Controller
{
    public function index()
    {
        $planeacion = Planeacion::all();
        $fecha=DB::select('SELECT date(sysdate()) as dia,date(DATE_ADD(sysdate(), interval 365 day)) as max;');
        return view('dep_desarrollo.dep_segundo', compact('planeacion','fecha'));
    }
}
