<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Reporte_tutor;
use DB;
class ReporteController extends Controller
{
    public function index()
    {
        $pr=Auth::user()->email;
        $consulta=DB::table('reporte_tutor')
            ->join('exp_asigna_tutor', 'exp_asigna_tutor.id_asigna_tutor', '=', 'reporte_tutor.id_asigna_tutor')
            ->join('gnral_personales','gnral_personales.id_personal', '=', 'exp_asigna_tutor.id_personal')
            ->join('users','users.email','=','gnral_personales.correo')
            ->where('users.email','=',$pr)
            ->select('reporte_tutor.id_reporte_tutor as id','reporte_tutor.n_cuenta as cuenta','reporte_tutor.alumno as alum','reporte_tutor.appaterno as ap',
                'reporte_tutor.apmaterno as am','reporte_tutor.tutoria_grupal as ti',
                'reporte_tutor.tutoria_individual as tg','reporte_tutor.beca  as beca','reporte_tutor.repeticion as repe',
                'reporte_tutor.especial as espe','reporte_tutor.academico as aca','reporte_tutor.medico  as med',
                'reporte_tutor.psicologico as ps','reporte_tutor.baja as baja','reporte_tutor.ingles as ing',
                'reporte_tutor.complementarias as comp','reporte_tutor.s_social as social')
            ->get();
        return view('profesor.reporte',compact("consulta"));
    }
    public function store(Request $request)
    {
        $activa = array("activador"=>$request->activador,);
        $acti=implode($activa);
        $email=Auth::user()->email;
        $users = DB::table('users')
            ->join('gnral_personales', 'users.email', '=', 'gnral_personales.correo')
            ->where('users.email','=',$email)
            ->select('gnral_personales.id_personal')
            ->get();
        DB::select('call reportes(?,?)',array($acti,$users));
        return redirect()->to('reporte');
    }
    public function edit($id)
    {
        $c = Reporte_tutor::find($id);
        return view('profesor.edit_reporte', compact('c'));
    }
    public function update(Request $request, $id)
    {
        $c = Reporte_tutor::find($id);
        $c->tutoria_grupal = $request->get('tutoria_grupal');
        $c->tutoria_individual=$request->get('tutoria_individual');
        $c->beca=$request->get('beca');
        $c->repeticion=$request->get('repeticion');
        $c->especial=$request->get('especial');
        $c->academico=$request->get('academico');
        $c->medico=$request->get('medico');
        $c->psicologico=$request->get('psicologico');
        $c->baja=$request->get('baja');
        $c->observaciones=$request->get('observaciones');
        $c->ingles=$request->get('ingles');
        $c->complementarias=$request->get('complementarias');
        $c->s_social=$request->get('s_social');
        $c->save();
        return redirect()->to('reporte');
    }
    public function destroy($id)
    {
    }
}
