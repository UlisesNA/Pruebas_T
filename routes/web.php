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

Route::Resource('/jefe','JefeController');

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

Route::get('/ftp', ['as ' => 'ftp', 'uses' => 'FtpController@index']);
Route::post('/ftp/Up', 'FtpController@upload');



/////CONTROLADORES EXPEDIENTE

Route::Resource('/jefevista','JefeVistaController');
Route::Resource('/desarrollovista','DesarrolloVistaController');
Route::Resource('/asignacovista','AsignaCoController');
Route::Resource('/asignacorgenvista','AsignaCorGenController');
Route::Resource('/asignatuvista','AsignaTuController');

Route::Resource('/tutorvista','TutorVistaController');

Route::Resource('/jefe','JefeController');
Route::Resource('/desarrollo','DesarrolloController');
Route::post('/jefeAct','JefeController@UpdateCoo');
Route::post('/jefeActTuto','JefeController@UpdateTuto');


Route::group(['prefix'=>'graphics'],function (){
    Route::post('genero', 'GraficasController@genero');
    Route::post('academico', 'GraficasController@academico');
    Route::post('generales', 'GraficasController@generales');
    Route::post('familiares', 'GraficasController@familiares');
    Route::post('habitos', 'GraficasController@habitos');
    Route::post('salud', 'GraficasController@salud');
    Route::post('area', 'GraficasController@area');
});
Route::group(['prefix'=>'grafgeneracion'],function (){
    Route::post('genero', 'GraficasGeneracionController@genero');
    Route::post('academico', 'GraficasGeneracionController@academico');
    Route::post('generales', 'GraficasGeneracionController@generales');
    Route::post('familiares', 'GraficasGeneracionController@familiares');
    Route::post('habitos', 'GraficasGeneracionController@habitos');
    Route::post('salud', 'GraficasGeneracionController@salud');
    Route::post('area', 'GraficasGeneracionController@area');
});
Route::group(['prefix'=>'grafcarrera'],function (){
    Route::post('genero', 'GraficasCarreraController@genero');
    Route::post('academico', 'GraficasCarreraController@academico');
    Route::post('generales', 'GraficasCarreraController@generales');
    Route::post('familiares', 'GraficasCarreraController@familiares');
    Route::post('habitos', 'GraficasCarreraController@habitos');
    Route::post('salud', 'GraficasCarreraController@salud');
    Route::post('area', 'GraficasCarreraController@area');
});
Route::group(['prefix'=>'grafinstitut'],function (){
    Route::get('genero', 'GraficasInstitucionController@genero');
    Route::get('academico', 'GraficasInstitucionController@academico');
    Route::get('generales', 'GraficasInstitucionController@generales');
    Route::get('familiares', 'GraficasInstitucionController@familiares');
    Route::get('habitos', 'GraficasInstitucionController@habitos');
    Route::get('salud', 'GraficasInstitucionController@salud');
    Route::get('area', 'GraficasInstitucionController@area');
});


Route::post('/profesor','ProfesorController@alumnos');
Route::post('/semestre','ProfesorController@planeacion');
Route::post('/cambio','ProfesorController@cambio');
Route::get('grupos','ProfesorController@grupos');
Route::post('/alu','ProfesorController@alumnos');
Route::Resource('/reporte','ReporteController');
Route::Resource('/desercion','DesercionController');

Route::get('/getAll','ProfesorController@getAll');
Route::get('/setAlumnId','ProfesorController@setAlumnoId');

Route::get('/Alum','ViewAlumnosController@llenar');
Route::get('/AlumActualizar','ViewAlumnosController@actualizar');

Route::post('/ver','ViewAlumnosController@veralumno');
Route::post('/verestra','ViewAlumnosController@verestrategia');
Route::post('/versuge','ViewAlumnosController@versugerencia');
Route::post('/actualiza','ViewAlumnosController@actualiza');
Route::post('/actualizaestra','ViewAlumnosController@actualizaestrategia');
Route::post('/actualizasuge','ViewAlumnosController@actualizasugerencia');
Route::post('/guardar','ViewAlumnosController@store');
Route::post('/imagen','ViewAlumnosController@guardarImagen');


Route::post('/UpdateAlum','ViewAlumnosController@updateExp');
Route::post('/cerrar','ViewAlumnosController@cerrar');
Route::post('/UpdateA','TutorExpedienteController@mostrar');

Route::Resource('/alumnos','AlumnosController');
Route::get('/generaciones','AlumnosController@generaciones');
Route::post('/alumnosgeneracion','AlumnosController@alumnosgeneracion');
Route::post('/alumnosgrupo','AlumnosController@alumnosgrupo');

Route::post('/creargrupo','AlumnosController@creargrupo');
Route::post('/buscaalumnos','AlumnosController@BuscarAlumnosGrupo');
Route::post('/asignaralumnos','AlumnosController@AsignarAlumnos');
Route::post('/eliminaralumno','AlumnosController@EliminaAlumnoGrupo');
Route::get('/list', 'AlumnosController@getlist');
Route::post('/revalida','AlumnosController@revalidacionSI');
Route::post('/revalidano','AlumnosController@revalidacionNO');

Route::Resource('/panel','PanelAlumnoController');
Route::get('/getDatos','PanelAlumnoController@datosAlu');
Route::get('/getAlumno','PanelAlumnoController@datosPrincipales');
Route::get('/inicioalu','PanelAlumnoController@principal');

Route::get('/carrera','CoordinadorCarreraController@carreras');
Route::get('/carrerasinst','CoordinadorCarreraController@carreras1');
Route::get('/carreras', function () {
    return view('coordinadorc.index');
});
Route::get('/revision', function () {
    return view('coordina_inst.revision');
});
Route::get('/estadisticas/carreras', function () {
    return view('coordina_inst.carreras');
});
Route::get('/e', function () {
    return view('profesor.p');
});
Route::post('/generacionca','CoordinadorCarreraController@generaciones');
Route::post('/generacion','CoordinadorCarrController@generaciones');


Route::Resource('/graficasCoordinador','GraficasCoordinadorController');
Route::get('/getCarrCoo','GraficasCoordinadorController@getCarrCoo');
Route::get('/getAG','GraficasCoordinadorController@getAlCoo');

Route::get('/getG', 'AsignaTutorController@getAllGrupoAct');
Route::Resource('/asignacoordinador','AsignaCoordinadorController');
Route::Resource('/asignacoordinadorgeneral','AsignaCoordinadorGeneralController');
Route::Resource('/planeacioncoorgen','Coordina_instController');
Route::get('/tes/carreras','Coordina_instController@carreras');
Route::Resource('/planeaciondesarrollo','Dep_desarrolloController');
Route::Resource('/planeaciontutor','Planea_tutorController');
Route::get('/repo','AsignaCoordinadorController@repo');

Route::Resource('asignatutores','AsignaTutorController');
Route::get('asignatutores/{id}/destroy',[
    'uses' => 'AsignaTutorController@destroy',
    'as' => 'asignatutores.destroy'
]);
Route::get("pdf/all","PdfController@pdf_all")->name("pdf_all");
Route::post("pdf/lista","PdfController@pdf_lista")->name("pdf_lista");
Route::post("pdf/alumno","PdfController@pdf_alumno")->name("pdf_alumno");
Route::post("pdf/reporte","ReporteGController@pdf_reporte")->name("pdf_reporte");
Route::get("reporte_pdf","ReportePDFController@reporte_pdf")->name("reporte_pdf");
Route::get("reporte_pdf2","ReportePDFController@reporte_pdf2")->name("reporte_pdf2");
Route::get("reporte_pdf3","ReportePDFController@reporte_pdf3")->name("reporte_pdf3");
Route::get("reporte_pdf4","ReportePDFController@reporte_pdf4")->name("reporte_pdf4");
Route::get("reporte_pdf5","ReportePDFController@reporte_pdf5")->name("reporte_pdf5");
Route::get("reporte_pdf6","ReportePDFController@reporte_pdf6")->name("reporte_pdf6");
Route::get("reporte_pdf7","ReportePDFController@reporte_pdf7")->name("reporte_pdf7");
Route::get("reporte_pdf8","ReportePDFController@reporte_pdf8")->name("reporte_pdf8");
//Route::get("reporte_grafica","ReporteGController@reporte_grafica")->name("reporte_grafica");
?>



