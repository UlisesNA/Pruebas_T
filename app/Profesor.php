<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;
class Profesor extends Model
{

    public static function getAlumnos(){
        $grupo=DB::select('SELECT * FROM asigna_tutor where id_docente='.Auth::user()->id);
       // dd($grupo);
       if ($grupo) {
           $carrera=DB::select('SELECT * FROM datos_personales where id_user='.Auth::user()->id);

           $datos=DB::select('SELECT grupos.desc_grupo grupo,carreras.desc_carrera,alumnos.cuenta,alumnos.id_alumno, alumnos.nombre, alumnos.estado FROM asigna_semestre,alumnos,grupos,periodos,carreras where
           asigna_semestre.id_alumno=alumnos.id_alumno and
           asigna_semestre.id_grupo=grupos.id_grupo and
           alumnos.id_carrera=carreras.id_carrera and
           asigna_semestre.id_periodo=periodos.id_periodo and
           alumnos.id_carrera='.$carrera[0]->id_carrera.' and
           asigna_semestre.id_grupo='.$grupo[0]->id_grupo.';');

           return $datos;
           # code...
       }
    }
    public static function getAllGen(){
        $carrera=DB::select('SELECT * FROM datos_personales where id_user='.Auth::user()->id);
        $datos=DB::select('SELECT count(alumnos.id_alumno) cantidad, CASE alumnos.id_genero WHEN 1 THEN "Hombres" WHEN 2 THEN "Mujeres" END gen
        FROM asigna_semestre,alumnos,grupos,periodos,carreras
        where asigna_semestre.id_alumno=alumnos.id_alumno and
                asigna_semestre.id_grupo=grupos.id_grupo and
                alumnos.id_carrera=carreras.id_carrera and
                asigna_semestre.id_periodo=periodos.id_periodo and
                alumnos.id_carrera='.$carrera[0]->id_carrera.' group by alumnos.id_genero;');
        return $datos;
    }
    public static function getAlGen($id){

        $datos=DB::select('SELECT CASE alumnos.id_genero WHEN 1 THEN "Hombres" WHEN 2 THEN "Mujeres" END name, count(alumnos.id_alumno) y
        FROM asigna_semestre,alumnos,grupos,periodos,carreras
        where asigna_semestre.id_alumno=alumnos.id_alumno and
                asigna_semestre.id_grupo=grupos.id_grupo and
                alumnos.id_carrera=carreras.id_carrera and
                asigna_semestre.id_periodo=periodos.id_periodo and
                alumnos.id_carrera='.$id.' group by alumnos.id_genero;');
        return $datos;
    }
    public static function getGeneroChar(){

        $grupo=DB::select('SELECT * FROM asigna_tutor where id_docente='.Auth::user()->id);
        $carrera=DB::select('SELECT * FROM datos_personales where id_user='.Auth::user()->id);

        $hombres=DB::select('SELECT count(alumnos.id_alumno) hombres FROM asigna_semestre,alumnos,grupos,periodos,carreras where
        asigna_semestre.id_alumno=alumnos.id_alumno and
        asigna_semestre.id_grupo=grupos.id_grupo and
        alumnos.id_carrera=carreras.id_carrera and
        asigna_semestre.id_periodo=periodos.id_periodo and
        alumnos.id_carrera='.$carrera[0]->id_carrera.' and
        asigna_semestre.id_grupo='.$grupo[0]->id_grupo.' and
        alumnos.id_genero=1;');

        $mujeres=DB::select('SELECT count(alumnos.id_alumno) mujeres FROM asigna_semestre,alumnos,grupos,periodos,carreras where
           asigna_semestre.id_alumno=alumnos.id_alumno and
           asigna_semestre.id_grupo=grupos.id_grupo and
           alumnos.id_carrera=carreras.id_carrera and
           asigna_semestre.id_periodo=periodos.id_periodo and
           alumnos.id_carrera='.$carrera[0]->id_carrera.' and
           asigna_semestre.id_grupo='.$grupo[0]->id_grupo.' and
           alumnos.id_genero=2;');
        $array=array_merge($hombres,$mujeres);
        //dd($array);
        return $array;
    }
    //
}
