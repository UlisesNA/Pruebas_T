<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Exp_generacion;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
class Exp_asigna_generacion extends Model
{
    //
    use SoftDeletes;
    protected $table='exp_asigna_generacion';
    protected $primaryKey='id_asigna_generacion';
    protected $fillable=['id_generacion','grupo','id_jefe_periodo'];

    function getGeneracion()
    {
        return $this->hasMany('App\Exp_generacion','id_generacion','id_generacion');
    }
    public static function getGeneraciont(){

        $datos=DB::select('SELECT exp_asigna_generacion.*,exp_generacion.generacion
            FROM exp_asigna_generacion,exp_generacion,exp_asigna_tutor
            WHERE exp_asigna_generacion.id_generacion=exp_generacion.id_generacion
            AND exp_asigna_generacion.deleted_at is null
            and exp_asigna_generacion.id_jefe_periodo=exp_asigna_tutor.id_jefe_periodo
            and exp_asigna_tutor.id_personal='.Auth::user()->id.'
            GROUP BY exp_generacion.generacion ASC');
        return $datos;
    }
    public static function getGeneraciont1(){

        $datos=DB::select('SELECT exp_asigna_generacion.*,exp_generacion.generacion
            FROM exp_asigna_generacion,exp_generacion,exp_asigna_tutor
            WHERE exp_asigna_generacion.id_generacion=exp_generacion.id_generacion
            AND exp_asigna_generacion.deleted_at is null
            and exp_asigna_generacion.id_jefe_periodo=exp_asigna_tutor.id_jefe_periodo
            GROUP BY exp_generacion.generacion ASC');
        return $datos;
    }
    public static function getDatos(){

        $datos=DB::select('SELECT plan_actividades.id_plan_actividad,plan_actividades.desc_actividad,plan_actividades.objetivo_actividad,DATE_FORMAT(plan_actividades.fi_actividad, \'%d/%m/%Y\') as fi_actividad,
                                  DATE_FORMAT(plan_actividades.ff_actividad, \'%d/%m/%Y\') as ff_actividad,plan_planeacion.id_generacion,plan_asigna_planeacion_actividad.comentario,plan_asigna_planeacion_actividad.id_estado,plan_asigna_planeacion_actividad.id_asigna_planeacion_actividad
                                    FROM plan_actividades,plan_planeacion,plan_asigna_planeacion_actividad
                                    WHERE plan_asigna_planeacion_actividad.id_planeacion=plan_planeacion.id_planeacion
                                    AND plan_asigna_planeacion_actividad.id_plan_actividad=plan_actividades.id_plan_actividad
                                    AND plan_actividades.deleted_at is null
                                    AND plan_asigna_planeacion_actividad.deleted_at is null');
        return $datos;
    }

    public static function getDatosTut(){

        $datos=DB::select('SELECT exp_generacion.generacion,exp_generacion.id_generacion
                                FROM exp_generacion,exp_asigna_generacion,plan_planeacion,plan_actividades,plan_asigna_planeacion_actividad,plan_asigna_planeacion_tutor,exp_asigna_tutor,gnral_personales
                                WHERE exp_generacion.id_generacion=exp_asigna_generacion.id_generacion
                                AND plan_actividades.id_plan_actividad=plan_asigna_planeacion_actividad.id_plan_actividad
                                AND plan_planeacion.id_planeacion=plan_asigna_planeacion_actividad.id_planeacion
                                AND plan_asigna_planeacion_actividad.id_asigna_planeacion_actividad=plan_asigna_planeacion_tutor.id_asigna_planeacion_actividad
                                AND plan_asigna_planeacion_tutor.id_tutor=exp_asigna_tutor.id_personal
                                AND exp_asigna_tutor.id_asigna_generacion=exp_asigna_generacion.id_asigna_generacion
                                AND plan_asigna_planeacion_tutor.id_tutor=gnral_personales.id_personal
                                and gnral_personales.tipo_usuario='.Auth::user()->id.'
                                GROUP BY exp_generacion.generacion');
        return $datos;
    }

    public static function getDatosAct(){

        $datos=DB::select('SELECT plan_actividades.id_plan_actividad,plan_actividades.desc_actividad,plan_actividades.objetivo_actividad,DATE_FORMAT(plan_actividades.fi_actividad,\'%d/%m/%Y\') as fi_actividad,
                                  DATE_FORMAT(plan_actividades.ff_actividad, \'%d/%m/%Y\') as ff_actividad,plan_planeacion.id_generacion,exp_generacion.generacion,plan_asigna_planeacion_actividad.comentario,plan_asigna_planeacion_actividad.id_estado,plan_asigna_planeacion_actividad.id_asigna_planeacion_actividad,plan_asigna_planeacion_tutor.*
                                    FROM plan_actividades,plan_planeacion,plan_asigna_planeacion_actividad,plan_asigna_planeacion_tutor,gnral_personales,users,exp_generacion
                                    WHERE plan_asigna_planeacion_actividad.id_planeacion=plan_planeacion.id_planeacion
                                    AND plan_asigna_planeacion_actividad.id_plan_actividad=plan_actividades.id_plan_actividad
                                    AND plan_actividades.deleted_at is null
                                    AND plan_asigna_planeacion_actividad.deleted_at is null
                                    AND plan_asigna_planeacion_actividad.id_estado=1
                                    AND plan_asigna_planeacion_tutor.id_asigna_planeacion_actividad=plan_asigna_planeacion_actividad.id_asigna_planeacion_actividad
                                    AND plan_asigna_planeacion_tutor.id_tutor=gnral_personales.id_personal
                                    and exp_generacion.id_generacion=plan_planeacion.id_generacion
                                    and plan_asigna_planeacion_tutor.id_asigna_planeacion_actividad=plan_asigna_planeacion_actividad.id_asigna_planeacion_actividad
                                    and gnral_personales.tipo_usuario=users.id
                                    and users.id='.Auth::user()->id);
        return $datos;
    }
}
