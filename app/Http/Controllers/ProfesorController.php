<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
class ProfesorController extends Controller
{

    public function index()
    {
        $cien_uno = DB::select('select desercion.nombre as alum
                            ,desercion.total as tot,desercion.trabaja as tra,
                            desercion.id_estado_civil as civ,desercion.no_hijos as hijo, 
                            desercion.tegusta_carrera_elegida as sat,
                            desercion.tot_repe-1 as rep,desercion.tot_espe-1 as espe,desercion.gen_espe-1 as t_esp
                            from desercion,gnral_carreras,gnral_semestres,gnral_grupos,exp_generales
                            where desercion.nombre=exp_generales.nombre 
                            and desercion.no_cuenta=exp_generales.no_cuenta 
                            and exp_generales.id_carrera=gnral_carreras.id_carrera 
                            and exp_generales.id_semestre=gnral_semestres.id_semestre 
                            and exp_generales.id_grupo=gnral_grupos.id_grupo
                            and exp_generales.id_grupo=1;');
        $cien_dos = DB::select('select desercion.nombre as alum
                            ,desercion.total as tot,desercion.trabaja as tra,
                            desercion.id_estado_civil as civ,desercion.no_hijos as hijo, 
                            desercion.tegusta_carrera_elegida as sat,
                            desercion.tot_repe-1 as rep,desercion.tot_espe-1 as espe,desercion.gen_espe-1 as t_esp
                            from desercion,gnral_carreras,gnral_semestres,gnral_grupos,exp_generales
                            where desercion.nombre=exp_generales.nombre 
                            and desercion.no_cuenta=exp_generales.no_cuenta 
                            and exp_generales.id_carrera=gnral_carreras.id_carrera 
                            and exp_generales.id_semestre=gnral_semestres.id_semestre 
                            and exp_generales.id_grupo=gnral_grupos.id_grupo
                            and exp_generales.id_grupo=2;');
        $dosc_uno = DB::select('select desercion.nombre as alum
                            ,desercion.total as tot,desercion.trabaja as tra,
                            desercion.id_estado_civil as civ,desercion.no_hijos as hijo, 
                            desercion.tegusta_carrera_elegida as sat,
                            desercion.tot_repe-1 as rep,desercion.tot_espe-1 as espe,desercion.gen_espe-1 as t_esp
                            from desercion,gnral_carreras,gnral_semestres,gnral_grupos,exp_generales
                            where desercion.nombre=exp_generales.nombre 
                            and desercion.no_cuenta=exp_generales.no_cuenta 
                            and exp_generales.id_carrera=gnral_carreras.id_carrera 
                            and exp_generales.id_semestre=gnral_semestres.id_semestre 
                            and exp_generales.id_grupo=gnral_grupos.id_grupo
                            and exp_generales.id_grupo=3;');
        $dosc_dos = DB::select('select desercion.nombre as alum
                            ,desercion.total as tot,desercion.trabaja as tra,
                            desercion.id_estado_civil as civ,desercion.no_hijos as hijo, 
                            desercion.tegusta_carrera_elegida as sat,
                            desercion.tot_repe-1 as rep,desercion.tot_espe-1 as espe,desercion.gen_espe-1 as t_esp
                            from desercion,gnral_carreras,gnral_semestres,gnral_grupos,exp_generales
                            where desercion.nombre=exp_generales.nombre 
                            and desercion.no_cuenta=exp_generales.no_cuenta 
                            and exp_generales.id_carrera=gnral_carreras.id_carrera 
                            and exp_generales.id_semestre=gnral_semestres.id_semestre 
                            and exp_generales.id_grupo=gnral_grupos.id_grupo
                            and exp_generales.id_grupo=4;');
        $tresc_uno = DB::select('select desercion.nombre as alum
                            ,desercion.total as tot,desercion.trabaja as tra,
                            desercion.id_estado_civil as civ,desercion.no_hijos as hijo, 
                            desercion.tegusta_carrera_elegida as sat,
                            desercion.tot_repe-1 as rep,desercion.tot_espe-1 as espe,desercion.gen_espe-1 as t_esp
                            from desercion,gnral_carreras,gnral_semestres,gnral_grupos,exp_generales
                            where desercion.nombre=exp_generales.nombre 
                            and desercion.no_cuenta=exp_generales.no_cuenta 
                            and exp_generales.id_carrera=gnral_carreras.id_carrera 
                            and exp_generales.id_semestre=gnral_semestres.id_semestre 
                            and exp_generales.id_grupo=gnral_grupos.id_grupo
                            and exp_generales.id_grupo=5;');
        $tresc_dos = DB::select('select desercion.nombre as alum
                            ,desercion.total as tot,desercion.trabaja as tra,
                            desercion.id_estado_civil as civ,desercion.no_hijos as hijo, 
                            desercion.tegusta_carrera_elegida as sat,
                            desercion.tot_repe-1 as rep,desercion.tot_espe-1 as espe,desercion.gen_espe-1 as t_esp
                            from desercion,gnral_carreras,gnral_semestres,gnral_grupos,exp_generales
                            where desercion.nombre=exp_generales.nombre 
                            and desercion.no_cuenta=exp_generales.no_cuenta 
                            and exp_generales.id_carrera=gnral_carreras.id_carrera 
                            and exp_generales.id_semestre=gnral_semestres.id_semestre 
                            and exp_generales.id_grupo=gnral_grupos.id_grupo
                            and exp_generales.id_grupo=6;');
        $cuats_uno = DB::select('select desercion.nombre as alum
                            ,desercion.total as tot,desercion.trabaja as tra,
                            desercion.id_estado_civil as civ,desercion.no_hijos as hijo, 
                            desercion.tegusta_carrera_elegida as sat,
                            desercion.tot_repe-1 as rep,desercion.tot_espe-1 as espe,desercion.gen_espe-1 as t_esp
                            from desercion,gnral_carreras,gnral_semestres,gnral_grupos,exp_generales
                            where desercion.nombre=exp_generales.nombre 
                            and desercion.no_cuenta=exp_generales.no_cuenta 
                            and exp_generales.id_carrera=gnral_carreras.id_carrera 
                            and exp_generales.id_semestre=gnral_semestres.id_semestre 
                            and exp_generales.id_grupo=gnral_grupos.id_grupo
                            and exp_generales.id_grupo=7;');
        $cuats_dos = DB::select('select desercion.nombre as alum
                            ,desercion.total as tot,desercion.trabaja as tra,
                            desercion.id_estado_civil as civ,desercion.no_hijos as hijo, 
                            desercion.tegusta_carrera_elegida as sat,
                            desercion.tot_repe-1 as rep,desercion.tot_espe-1 as espe,desercion.gen_espe-1 as t_esp
                            from desercion,gnral_carreras,gnral_semestres,gnral_grupos,exp_generales
                            where desercion.nombre=exp_generales.nombre 
                            and desercion.no_cuenta=exp_generales.no_cuenta 
                            and exp_generales.id_carrera=gnral_carreras.id_carrera 
                            and exp_generales.id_semestre=gnral_semestres.id_semestre 
                            and exp_generales.id_grupo=gnral_grupos.id_grupo
                            and exp_generales.id_grupo=8;');
        $quin_uno = DB::select('select desercion.nombre as alum
                            ,desercion.total as tot,desercion.trabaja as tra,
                            desercion.id_estado_civil as civ,desercion.no_hijos as hijo, 
                            desercion.tegusta_carrera_elegida as sat,
                            desercion.tot_repe-1 as rep,desercion.tot_espe-1 as espe,desercion.gen_espe-1 as t_esp
                            from desercion,gnral_carreras,gnral_semestres,gnral_grupos,exp_generales
                            where desercion.nombre=exp_generales.nombre 
                            and desercion.no_cuenta=exp_generales.no_cuenta 
                            and exp_generales.id_carrera=gnral_carreras.id_carrera 
                            and exp_generales.id_semestre=gnral_semestres.id_semestre 
                            and exp_generales.id_grupo=gnral_grupos.id_grupo
                            and exp_generales.id_grupo=9;');
        $quin_dos = DB::select('select desercion.nombre as alum
                            ,desercion.total as tot,desercion.trabaja as tra,
                            desercion.id_estado_civil as civ,desercion.no_hijos as hijo, 
                            desercion.tegusta_carrera_elegida as sat,
                            desercion.tot_repe-1 as rep,desercion.tot_espe-1 as espe,desercion.gen_espe-1 as t_esp
                            from desercion,gnral_carreras,gnral_semestres,gnral_grupos,exp_generales
                            where desercion.nombre=exp_generales.nombre 
                            and desercion.no_cuenta=exp_generales.no_cuenta 
                            and exp_generales.id_carrera=gnral_carreras.id_carrera 
                            and exp_generales.id_semestre=gnral_semestres.id_semestre 
                            and exp_generales.id_grupo=gnral_grupos.id_grupo
                            and exp_generales.id_grupo=10;');
        $ses_uno = DB::select('select desercion.nombre as alum
                            ,desercion.total as tot,desercion.trabaja as tra,
                            desercion.id_estado_civil as civ,desercion.no_hijos as hijo, 
                            desercion.tegusta_carrera_elegida as sat,
                            desercion.tot_repe-1 as rep,desercion.tot_espe-1 as espe,desercion.gen_espe-1 as t_esp
                            from desercion,gnral_carreras,gnral_semestres,gnral_grupos,exp_generales
                            where desercion.nombre=exp_generales.nombre 
                            and desercion.no_cuenta=exp_generales.no_cuenta 
                            and exp_generales.id_carrera=gnral_carreras.id_carrera 
                            and exp_generales.id_semestre=gnral_semestres.id_semestre 
                            and exp_generales.id_grupo=gnral_grupos.id_grupo
                            and exp_generales.id_grupo=11;');
        $ses_dos = DB::select('select desercion.nombre as alum
                            ,desercion.total as tot,desercion.trabaja as tra,
                            desercion.id_estado_civil as civ,desercion.no_hijos as hijo, 
                            desercion.tegusta_carrera_elegida as sat,
                            desercion.tot_repe-1 as rep,desercion.tot_espe-1 as espe,desercion.gen_espe-1 as t_esp
                            from desercion,gnral_carreras,gnral_semestres,gnral_grupos,exp_generales
                            where desercion.nombre=exp_generales.nombre 
                            and desercion.no_cuenta=exp_generales.no_cuenta 
                            and exp_generales.id_carrera=gnral_carreras.id_carrera 
                            and exp_generales.id_semestre=gnral_semestres.id_semestre 
                            and exp_generales.id_grupo=gnral_grupos.id_grupo
                            and exp_generales.id_grupo=12;');
        $sep_uno = DB::select('select desercion.nombre as alum
                            ,desercion.total as tot,desercion.trabaja as tra,
                            desercion.id_estado_civil as civ,desercion.no_hijos as hijo, 
                            desercion.tegusta_carrera_elegida as sat,
                            desercion.tot_repe-1 as rep,desercion.tot_espe-1 as espe,desercion.gen_espe-1 as t_esp
                            from desercion,gnral_carreras,gnral_semestres,gnral_grupos,exp_generales
                            where desercion.nombre=exp_generales.nombre 
                            and desercion.no_cuenta=exp_generales.no_cuenta 
                            and exp_generales.id_carrera=gnral_carreras.id_carrera 
                            and exp_generales.id_semestre=gnral_semestres.id_semestre 
                            and exp_generales.id_grupo=gnral_grupos.id_grupo
                            and exp_generales.id_grupo=13;');
        $sep_dos = DB::select('select desercion.nombre as alum
                            ,desercion.total as tot,desercion.trabaja as tra,
                            desercion.id_estado_civil as civ,desercion.no_hijos as hijo, 
                            desercion.tegusta_carrera_elegida as sat,
                            desercion.tot_repe-1 as rep,desercion.tot_espe-1 as espe,desercion.gen_espe-1 as t_esp
                            from desercion,gnral_carreras,gnral_semestres,gnral_grupos,exp_generales
                            where desercion.nombre=exp_generales.nombre 
                            and desercion.no_cuenta=exp_generales.no_cuenta 
                            and exp_generales.id_carrera=gnral_carreras.id_carrera 
                            and exp_generales.id_semestre=gnral_semestres.id_semestre 
                            and exp_generales.id_grupo=gnral_grupos.id_grupo
                            and exp_generales.id_grupo=14;');
        $oct_uno = DB::select('select desercion.nombre as alum
                            ,desercion.total as tot,desercion.trabaja as tra,
                            desercion.id_estado_civil as civ,desercion.no_hijos as hijo, 
                            desercion.tegusta_carrera_elegida as sat,
                            desercion.tot_repe-1 as rep,desercion.tot_espe-1 as espe,desercion.gen_espe-1 as t_esp
                            from desercion,gnral_carreras,gnral_semestres,gnral_grupos,exp_generales
                            where desercion.nombre=exp_generales.nombre 
                            and desercion.no_cuenta=exp_generales.no_cuenta 
                            and exp_generales.id_carrera=gnral_carreras.id_carrera 
                            and exp_generales.id_semestre=gnral_semestres.id_semestre 
                            and exp_generales.id_grupo=gnral_grupos.id_grupo
                            and exp_generales.id_grupo=15;');
        $oct_dos = DB::select('select desercion.nombre as alum
                            ,desercion.total as tot,desercion.trabaja as tra,
                            desercion.id_estado_civil as civ,desercion.no_hijos as hijo, 
                            desercion.tegusta_carrera_elegida as sat,
                            desercion.tot_repe-1 as rep,desercion.tot_espe-1 as espe,desercion.gen_espe-1 as t_esp
                            from desercion,gnral_carreras,gnral_semestres,gnral_grupos,exp_generales
                            where desercion.nombre=exp_generales.nombre 
                            and desercion.no_cuenta=exp_generales.no_cuenta 
                            and exp_generales.id_carrera=gnral_carreras.id_carrera 
                            and exp_generales.id_semestre=gnral_semestres.id_semestre 
                            and exp_generales.id_grupo=gnral_grupos.id_grupo
                            and exp_generales.id_grupo=16;');
        return view('profesor.index')->with(compact('cien_uno','cien_dos','dosc_uno','dosc_dos','tresc_uno','tresc_dos'
        ,'cuats_uno','cuats_dos','quin_uno','quin_dos','ses_uno','ses_dos','sep_uno','sep_dos','oct_uno','oct_dos'));
    }
    public function create()
    {

    }
    public function store(Request $request)
    {

    }
    public function show($id)
    {

    }
    public function edit($id)
    {

    }
    public function update(Request $request, $id)
    {

    }
    public function destroy($id)
    {
    }
}
