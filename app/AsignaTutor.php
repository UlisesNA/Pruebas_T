<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class AsignaTutor extends Model
{
    protected $table ="asigna_tutor";
    protected $primaryKey="id_asigna_tutor";
    public $timestamps = false;
    protected $fillable=["id_personal","id_grupo","id_carrera","id_semestre"];

    public static function getExistTuto(){
        $carrera=DB::select('SELECT datos_personales.id_carrera FROM datos_personales,users,carreras where
        datos_personales.id_user=users.id and
        datos_personales.id_carrera=carreras.id_carrera and
        datos_personales.id_user='.Auth::user()->id);
        //dd($carrera[0]);
        $datos=DB::select('SELECT * FROM asigna_tutor,users,datos_personales where
        asigna_tutor.id_docente=users.id and
        datos_personales.id_user= users.id and
        asigna_tutor.estado=1 and
        datos_personales.id_carrera='.$carrera[0]->id_carrera.';');
        return $datos;
    }
    public static function getTutores(){

        $jefe=DB::select('SELECT gnral_jefes_periodos.id_jefe_periodo from gnral_jefes_periodos, gnral_personales where gnral_personales.id_personal=gnral_jefes_periodos.id_personal 
                                AND gnral_jefes_periodos.id_periodo=2 and gnral_personales.tipo_usuario=1');

        $dat=DB::select('SELECT gnral_personales.id_personal,exp_asigna_generacion.id_asigna_generacion, exp_asigna_tutor.id_asigna_tutor, gnral_personales.nombre, exp_asigna_generacion.grupo, exp_generacion.generacion 
                              from gnral_personales, exp_asigna_tutor,exp_asigna_generacion,exp_generacion where
                               exp_asigna_tutor.id_personal=gnral_personales.id_personal AND exp_asigna_tutor.id_asigna_generacion=exp_asigna_generacion.id_asigna_generacion AND 
                               exp_asigna_generacion.id_generacion=exp_generacion.id_generacion AND exp_asigna_tutor.id_jefe_periodo='.$jefe[0]->id_jefe_periodo);


        return $dat;
    }
    public static function insertAsignaTuto($arr){
        $tam=count($arr);

        $num=($tam-1)/2;
        $con=0;
        //dd($arr[$con=$con+1]);
        //INSERT INTO asigna_generacion (id_grupo, id_tutor, generacion) VALUES ('.$arr[$i+1].', '.$arr[$i].', '.$generacion.');

        $jefe=DB::select('SELECT gnral_jefes_periodos.id_jefe_periodo from gnral_jefes_periodos, gnral_personales where gnral_personales.id_personal=gnral_jefes_periodos.id_personal 
                                AND gnral_jefes_periodos.id_periodo=2 and gnral_personales.tipo_usuario='.Auth::user()->id);

        for($a=0;$a<$num;$a++)
        {
            DB::insert('insert into exp_asigna_tutor (id_jefe_periodo,id_personal,id_asigna_generacion, estado)
            values ('.$jefe[0]->id_jefe_periodo.','.$arr[$con].','.$arr[$con=$con+1].',1);');
            $con=$con+1;
        }

    }
    public static function UpdateTutor($datos){
        //dd($datos);
        $oldTuto=DB::select('SELECT id_docente FROM asigna_tutor where id_asigna_tutor='.$datos->id_tuto.';');
        //dd('UPDATE asigna_generacion SET id_tutor = '.$datos->coo.' WHERE (id_tutor = '.$oldTuto[0]->id_docente.');');
        DB::update('UPDATE asigna_tutor SET id_docente = '.$datos->tuto.', id_grupo='.$datos->grupo.' WHERE (id_asigna_tutor = '.$datos->id_tuto.');');
        DB::update('UPDATE asigna_generacion SET id_tutor = '.$datos->tuto.' WHERE (id_tutor = '.$oldTuto[0]->id_docente.');');
    }
    public static function getAllGruposAsigTutores(){
        $datos=DB::select('SELECT asigna_tutor.id_asigna_tutor,asigna_tutor.id_grupo,grupos.desc_grupo  FROM asigna_tutor,grupos,users,periodos where
        asigna_tutor.id_jefe=users.id and
        asigna_tutor.id_grupo=grupos.id_grupo and
        asigna_tutor.id_periodo= periodos.id_periodo and
        asigna_tutor.id_jefe='.Auth::user()->id);
        return $datos;
    }

    public static function borrar($id)
    {
        DB::delete('DELETE FROM exp_asigna_tutor WHERE exp_asigna_tutor.id_asigna_tutor='.$id.';');
    }

}
