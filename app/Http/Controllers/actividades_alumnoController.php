<?php
namespace App\Http\Controllers;
use App\gnral_alumnos;
use App\Plan_actividades;
use App\Plan_asigna_evidencias;
use App\Plan_asigna_planeacion_tutor;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\planasignaevidencias;
class actividades_alumnoController extends Controller
{
    public function index()
    {
        $id=Auth::user()->email;

/*
        SELECT DISTINCT desc_actividad, objetivo_actividad, fi_actividad, ff_actividad, estrategia, requiere_evidencia
                            from plan_actividades, plan_planeacion, plan_asigna_planeacion_actividad, plan_asigna_planeacion_tutor, exp_asigna_generacion,
                            exp_asigna_tutor, exp_asigna_alumnos
                            where id_alumno=10
    and plan_asigna_planeacion_actividad.id_planeacion=plan_planeacion.id_planeacion
   // and plan_asigna_planeacion_actividad.id_plan_actividad=plan_actividades.id_plan_actividad
    //and plan_asigna_planeacion_tutor.id_asigna_planaeacion_actividad=plan_asigna_planeacion_actividad.id_asigna_planeacion_actividad
    and plan_asigna_planeacion_tutor.id_asigna_tutor=exp_asigna_tutor.id_asigna_tutor

*/
        $datos=Plan_actividades::join('plan_asigna_planeacion_actividad','plan_asigna_planeacion_actividad.id_plan_actividad','=','plan_actividades.id_plan_actividad')
            ->join('plan_planeacion','plan_planeacion.id_planeacion','=','plan_asigna_planeacion_actividad.id_planeacion')
            ->join('plan_asigna_planeacion_tutor','plan_asigna_planeacion_tutor.id_asigna_planeacion_actividad','=',
                'plan_asigna_planeacion_actividad.id_asigna_planeacion_actividad')
            ->join('exp_asigna_generacion','exp_asigna_generacion.id_generacion','=','plan_planeacion.id_generacion')
            ->join('exp_asigna_alumnos','exp_asigna_alumnos.id_asigna_generacion','=','exp_asigna_generacion.id_asigna_generacion')
            ->join('gnral_alumnos','exp_asigna_alumnos.id_alumno' , '=',  'gnral_alumnos.id_alumno')
            ->join('users','gnral_alumnos.id_usuario', '=', 'users.id')
            ->where('users.email','=',$id)
            ->where('plan_asigna_planeacion_actividad.id_estado','=', 1)
            -> select('plan_actividades.desc_actividad', 'plan_actividades.objetivo_actividad',
                'plan_actividades.fi_actividad', 'plan_actividades.ff_actividad','plan_asigna_planeacion_tutor.estrategia',
                'plan_asigna_planeacion_tutor.requiere_evidencia','plan_asigna_planeacion_tutor.id_asigna_planeacion_tutor')
            ->get();

        //dd($datos);



        $datos->map(function($value)use ($id){
            //dd($value);
            return $value["evidencia"]=Plan_asigna_evidencias::join('gnral_alumnos','plan_asigna_evidencias.id_alumno' , '=',  'gnral_alumnos.id_alumno')
                ->join('users','gnral_alumnos.id_usuario', '=', 'users.id')
                ->where('users.email','=',$id)
                ->where('plan_asigna_evidencias.id_asigna_planeacion_tutor',$value->id_asigna_planeacion_tutor)
                ->select('plan_asigna_evidencias.id_evidencia', 'plan_asigna_evidencias.evidencia')
                ->get();
        });



        return view('actividades_alumno.actividades_alumno',compact("datos"));
    }

    public function store(Request $request)
    {
       // dd($request->all());

        $id=DB::select('SELECT id_alumno FROM gnral_alumnos WHERE id_usuario='.Auth::user()->id);
        //dd($id);
        //$plan = Plan_asigna_evidencias::find($id);
        $file=$request->file('evidencia');

        //dd($request->id_asigna_planeacion_tutor);
        $name=time().".".$file->getClientOriginalExtension();
        $file->move(public_path().'/pdf/',$name);

        if($request->id_evidencia==null){
        Plan_asigna_evidencias::create([
            "evidencia" => $name,
            "id_alumno" => $id[0]->id_alumno,
            "id_asigna_planeacion_tutor"=>$request->id_asigna_planeacion_tutor,
        ]);
        }
        else{
            Plan_asigna_evidencias::find($request->id_evidencia)->update(["evidencia"=>$name]);
        }

        return redirect()->back();
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
        //
        Session::flush();
    }

    public function update(Request $request, $id)
    {
        $plan = Plan_asigna_evidencias::find($id);
        if($request->hasFile('evidencia'))
        {
            $file=$request->file('evidencia');
            $name=time().".".$file->getClientOriginalExtension();
            $plan->evidencia = $name;
            $file->move(public_path().'/pdf/',$name);
        }else {
                $file=$request->file('evidencia');
          //  dd($file);
                $name=time()."daat";
                $file->move(public_path().'/pdf/',$name);
        }
        //$plan->evidencia = $request->evidencia;;
        $plan->save();
        return redirect()->back();
    }
    public function destroy($id)
    {
        //
    }
}
