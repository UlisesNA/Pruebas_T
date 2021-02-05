<?php
Route::get('/', function () {
    return view('auth.login');
});


Auth::routes();
Route::Resource('/coordina_inst','Coordina_instController');
Route::Resource('/segundo_sem','Coordina_inst_sController');
Route::Resource('/tercer_sem','Coordina_inst_tController');
Route::Resource('/cuarto_sem','Coordina_inst_cController');
Route::Resource('/quinto_sem','Coordina_inst_qController');
Route::Resource('/sexto_sem','Coordina_inst_seController');
Route::Resource('/septimo_sem','Coordina_inst_sepController');
Route::Resource('/octavo_sem','Coordina_inst_oController');
Route::Resource('/peticiones_inst','CoordinaInst_peticionesController');

Route::Resource('/coordina_carrera','Coordina_carrController');
Route::Resource('/peticiones','Coordina_peticionesController');

Route::Resource('/dep_desarrollo','Dep_desarrolloController');
Route::Resource('/dep_segundo','Dep_desarrollo_sController');
Route::Resource('/dep_tercero','Dep_desarrollo_tController');
Route::Resource('/dep_cuarto','Dep_desarrollo_cController');
Route::Resource('/dep_quinto','Dep_desarrollo_qController');
Route::Resource('/dep_sexto','Dep_desarrollo_seController');
Route::Resource('/dep_septimo','Dep_desarrollo_sepController');
Route::Resource('/dep_octavo','Dep_desarrollo_oController');



Route::resource("canalizacion","Canaliza_tutorController");
Route::resource("canalizados","Canalizados_tutorController");
Route::Resource('/profesor','ProfesorController');
Route::Resource('/planeacion','Planea_tutorController');
Route::Resource('/actividades','Actividades_tutorController');
Route::Resource('/eventos','Eventos_tutorController');
Route::Resource('/evidencias','Evidencias_tutorController');


Route::Resource('/alumno','ViewAlumnosController');
Route::get("/pdf_expediente/{id_alumno}","GeneradorController@print_pdf");
Route::get("/listado_alumnos","ViewAlumnosController@generapdf");
Route::get('/home', 'HomeController@index')->name('home');
Route::Resource('/actividad','actividades_alumnoController');
Route::Resource('/calendario','calendario_eventosController');


/////CONTROLADORES EXPEDIENTE TUTORIAS OK!
///
Route::group(['prefix'=>'tutorias'],function () {
    ///RUTAS JEFE DE DIV
    Route::Resource('jefe','JefeController');
    Route::Resource('jefevista','JefeVistaController');
            ///TUTORES
    Route::Resource('asignatutores', 'AsignaTutorController');
    Route::get('asignatutores/{id}/destroy', [
        'uses' => 'AsignaTutorController@destroy',
        'as' => 'asignatutores.destroy'
    ]);
    Route::Resource('asignatuvista','AsignaTuController');
            ///COORDINADOR
    Route::Resource('asignacoordinador','AsignaCoordinadorController');
    Route::Resource('asignacovista','AsignaCoController');
            ///ALUMNOS
    Route::Resource('alumnos','AlumnosController');
    Route::get('generaciones','AlumnosController@generaciones');
    Route::post('alumnosgeneracion','AlumnosController@alumnosgeneracion');
    Route::post('alumnosgrupo','AlumnosController@alumnosgrupo');
    Route::post('creargrupo','AlumnosController@creargrupo');
    Route::post('buscaalumnos','AlumnosController@BuscarAlumnosGrupo');
    Route::post('asignaralumnos','AlumnosController@AsignarAlumnos');
    Route::post('eliminaralumno','AlumnosController@EliminaAlumnoGrupo');
    Route::post('eliminaralumnouno','AlumnosController@EliminaAlumnoGrupoUno');
    Route::post('revalida','AlumnosController@revalidacionSI');
    Route::post('revalidano','AlumnosController@revalidacionNO');

    ///TUTOR
    Route::Resource('tutorvista','TutorVistaController');
    Route::post('profesor','ProfesorController@alumnos');
    Route::post('cambio','ProfesorController@cambio');
    Route::post('ver','ViewAlumnosController@veralumno');
    Route::post("pdf/alumno","PdfController@pdf_alumno")->name("pdf_alumno");
    Route::post("pdf/lista","PdfController@pdf_lista")->name("pdf_lista");
    Route::get('grupos','ProfesorController@grupos');
    Route::Resource('/desercion','DesercionController');
    Route::post('/probabilidad','ProbabilidadController@alumnos');
    Route::Resource('/seguimiento','SeguimientoController');
    Route::post('/seguimientoplan','SeguimientoPlanController@alumnos');

    ///COORDINADOR DE CARRERA
    Route::get('carreras', function () {
        return view('coordinadorc.index');
    });
    Route::get('carrera','CoordinadorCarreraController@carreras');
    Route::post('generacionca','CoordinadorCarreraController@generaciones');

    ///COORDINADOR INSTITUCIONAL
    Route::get('tes/carreras','Coordina_instController@carreras');
    Route::get('estadisticas/carreras', function () {
        return view('coordina_inst.carreras');
    });

    ///ALUMNO
    Route::get('inicioalu','PanelAlumnoController@principal');
    Route::Resource('panel','PanelAlumnoController');
    Route::get('AlumActualizar','ViewAlumnosController@actualizar');
    Route::get('getDatos','PanelAlumnoController@datosAlu');
    Route::post('actualiza','ViewAlumnosController@actualiza');
    Route::get("pdf/all","PdfController@pdf_all")->name("pdf_all");
    Route::get('Alum','ViewAlumnosController@llenar');
    Route::get('getAlumno','PanelAlumnoController@datosPrincipales');
    Route::post('guardar','ViewAlumnosController@store');
    Route::post('imagen','ViewAlumnosController@guardarImagen');
    Route::post('/verevidencia','SeguimientoPlanController@archivos');

    ///GRAFICAS
    ///GRAFICAS TUTOR
    Route::group(['prefix'=>'graphics'],function (){
        Route::post('genero', 'GraficasController@genero');
        Route::post('academico', 'GraficasController@academico');
        Route::post('generales', 'GraficasController@generales');
        Route::post('familiares', 'GraficasController@familiares');
        Route::post('habitos', 'GraficasController@habitos');
        Route::post('salud', 'GraficasController@salud');
        Route::post('area', 'GraficasController@area');
    });
    ///GRAFICAS CARRERA
    Route::group(['prefix'=>'grafcarrera'],function (){
        Route::post('genero', 'GraficasCarreraController@genero');
        Route::post('academico', 'GraficasCarreraController@academico');
        Route::post('generales', 'GraficasCarreraController@generales');
        Route::post('familiares', 'GraficasCarreraController@familiares');
        Route::post('habitos', 'GraficasCarreraController@habitos');
        Route::post('salud', 'GraficasCarreraController@salud');
        Route::post('area', 'GraficasCarreraController@area');
    });

    ///GRAFICAS GENERACION
    Route::group(['prefix'=>'grafgeneracion'],function (){
        Route::post('genero', 'GraficasGeneracionController@genero');
        Route::post('academico', 'GraficasGeneracionController@academico');
        Route::post('generales', 'GraficasGeneracionController@generales');
        Route::post('familiares', 'GraficasGeneracionController@familiares');
        Route::post('habitos', 'GraficasGeneracionController@habitos');
        Route::post('salud', 'GraficasGeneracionController@salud');
        Route::post('area', 'GraficasGeneracionController@area');
    });
    ///GRAFICAS INSTITUCIONALES
    Route::group(['prefix'=>'grafinstitut'],function (){
        Route::get('genero', 'GraficasInstitucionController@genero');
        Route::get('academico', 'GraficasInstitucionController@academico');
        Route::get('generales', 'GraficasInstitucionController@generales');
        Route::get('familiares', 'GraficasInstitucionController@familiares');
        Route::get('habitos', 'GraficasInstitucionController@habitos');
        Route::get('salud', 'GraficasInstitucionController@salud');
        Route::get('area', 'GraficasInstitucionController@area');
    });

    ///REPORTE GRAFICAS
    Route::post("pdf/reporte","ReporteGController@pdf_reporte")->name("pdf_reporte");

    ///PLANEACION DESARROLLO ACADEMICO
    Route::Resource('/planeaciondesarrollo','Dep_desarrolloController');

    ///CONSULTA DE GENERACIONES PARA PLANEACION
    Route::get('generacion','Dep_desarrolloController@generacion');

    ///CONSULTA DE ACTIVIDADES DE PLANEACION
    Route::post('actividades','Dep_desarrolloController@actividades');

    ///MODAL REVISAR ACTIVIDAD DESARROLLO ACADEMICO
    Route::post('/modalactactidesa','Dep_desarrolloController@actuactivi');

    ///MODAL SUGERENCIA EN ACTIVIDAD DESARROLLO ACADEMICO
    Route::post('/modalcorrecion','Dep_desarrolloController@correcion');

    //RUTA APROBAR ACTIVIDAD
    Route::post('/apruebaactividad','Dep_desarrolloController@apruactivi');

    //RUTA AGREGAR CORRECION
    Route::post('/apruebacorreccion','Dep_desarrolloController@agrecorreccion');

    ///REVISION DE PLANEACION DESARROLLO ACADEMICO
    Route::get('/revisiondesarrollo', function () {
        return view('dep_desarrollo.revisiondesarrollo');
    });

    ///CONSULTA MUESTRA COORDINADOR INSTITUCIONAL EN DESARROLLO ACADEMICO
    Route::Resource('/desarrollo','DesarrolloController');

    ///LISTA DE PROFESORES EN ASIGNA COORDINADOR INSTITUCIONAL
    Route::Resource('/asignacoordinadorgeneral','AsignaCoordinadorGeneralController');

    ////Checar si ya existe coordinador institucional
    Route::get('check','AsignaCoordinadorGeneralController@check');

    ///LISTA DE CARRERAS EN REVISION DE DE PLANEACION EN DESARROLLO ACADEMICO
    Route::get('/carrerasinst','Coordina_instController@carreras1');

    ///LISTA DE PLANEACION EN REVISION DE DESARROLLO ACADEMICO
    Route::post('/planeacioninst','AlumnosController@planeacion');

    ///VISTA DE QUIEN ES EL COORDINADOR INSTITUCIONAL
    Route::Resource('/desarrollovista','DesarrolloVistaController');

    ///ASIGNAR COORDINDOR INSTITUCIONAL
    Route::Resource('/asignacorgenvista','AsignaCorGenController');

    ///PLANEACION DE COORDINADOR INSTITUCIONAL
    Route::Resource('/planeacioncoorgen','Coordina_instController');

    ///REVISION DE PLANEACION COORDINADOR INSTITUCIOANL
    Route::get('/revision', function () {
        return view('coordina_inst.revision');
    });

    ///VISTA PLANEACION TUTOR
    Route::post('/semestre','ProfesorController@planeacion');
    Route::post('/profe','ProfesorController@ev');

    ///INSERTE Y ACTUALIZA ESTRATEGIA TUTOR
    Route::post('/actualizaestra','ViewAlumnosController@actualizaestrategia');

    ///INSERTE Y ACTUALIZA SUGERENCIA TUTOR
    Route::post('/actualizasuge','ViewAlumnosController@actualizasugerencia');

    ///VER ESTRATEGIA TUTOR
    Route::post('/verestra','ViewAlumnosController@verestrategia');

    ///VER SUGERENCIA TUTOR
    Route::post('/versuge','ViewAlumnosController@versugerencia');

    ///VER CANALIZACION TUTOR
    Route::post('/vercanaliza','ViewAlumnosController@veralumno1');//////////////////////si se utiliza
    Route::post('/pcan','Canalizados_tutorController@store');
    Route::post('/modalact','Canalizados_tutorController@canactualiza');
    Route::post('/actualizadatos','Canalizados_tutorController@datosact');
    Route::post("pdf/citacan","PdfCitController@pdf_cita")->name("pdf_cita");

    ///Ruta planeacion pdf tutor
    Route::post("pdf/planeacion","PlaneacionPDFController@pdf_planeacion")->name("pdf_planeacion");
});








////SIN CLASIFICAR


Route::post('/cerrar','ViewAlumnosController@cerrar');

Route::post('/generacion','CoordinadorCarrController@generaciones');////////////////si se usa

Route::get('/repo','AsignaCoordinadorController@repo');







Route::post("pdf/carreraco","ReporteGController@pdf_carreraco")->name("pdf/carreraco");
//Route::get("reporte_grafica","ReporteGController@reporte_grafica")->name("reporte_grafica");


?>



