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

?>



