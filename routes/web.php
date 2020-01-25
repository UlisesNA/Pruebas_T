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
Route::Resource('/asignacovista','AsignaCoController');
Route::Resource('/asignatuvista','AsignaTuController');

Route::Resource('/tutorvista','TutorVistaController');

Route::Resource('/jefe','JefeController');
Route::post('/jefeAct','JefeController@UpdateCoo');
Route::post('/jefeActTuto','JefeController@UpdateTuto');


Route::group(['prefix'=>'graphics'],function (){
    Route::get('/', 'GraficasController@index');
    Route::post('genero', 'GraficasController@genero');
    Route::post('academico', 'GraficasController@academico');
    Route::post('generales', 'GraficasController@generales');
    Route::post('familiares', 'GraficasController@familiares');
    Route::post('habitos', 'GraficasController@habitos');
    Route::post('salud', 'GraficasController@salud');
    Route::post('area', 'GraficasController@area');


});

Route::Resource('/graficas','GraficasController');

Route::get('/getAllDatos','GraficasController@getAll');

Route::post('/profesor','ProfesorController@alumnos');
Route::post('/semestre','ProfesorController@alumnos1');
Route::post('/cambio','ProfesorController@cambio');
Route::get('grupos','ProfesorController@grupos');
Route::post('/alu','ProfesorController@alumnos');
Route::post('/uE','ProfesorController@updateEstado');
Route::get('/getAll','ProfesorController@getAll');
Route::get('/setAlumnId','ProfesorController@setAlumnoId');

Route::Resource('/Alum','ViewAlumnosController');
//Route::get('/Alum/{{alumno}}','ViewAlumnosController@store');


Route::post('/UpdateAlum','ViewAlumnosController@updateExp');
Route::post('/cerrar','ViewAlumnosController@cerrar');
Route::post('/UpdateA','TutorExpedienteController@mostrar');

Route::Resource('/alumnos','AlumnosController');
Route::Resource('/AlumUpdate','UpdateAlumnosController');
Route::Resource('/Alumno','LoginAlumnosController');
Route::Resource('/panel','PanelAlumnoController');
Route::get('/getAl', 'AlumnosController@getAl');
Route::get('/gen', 'AlumnosController@getGen');
Route::get('/list', 'AlumnosController@getlist');

Route::Resource('/graficasCoordinador','GraficasCoordinadorController');
Route::get('/getCarrCoo','GraficasCoordinadorController@getCarrCoo');
Route::get('/getAG','GraficasCoordinadorController@getAlCoo');

Route::get('/getG', 'AsignaTutorController@getAllGrupoAct');
Route::Resource('/asignacoordinador','AsignaCoordinadorController');
Route::get('/repo','AsignaCoordinadorController@repo');

Route::Resource('asignatutores','AsignaTutorController');
Route::get('asignatutores/{id}/destroy',[
    'uses' => 'AsignaTutorController@destroy',
    'as' => 'asignatutores.destroy'
]);
Route::get("pdf/all","PdfController@pdf_all")->name("pdf_all");
Route::post("pdf/lista","PdfController@pdf_lista")->name("pdf_lista");


?>



