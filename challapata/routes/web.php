<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['web']], function () {
	Route::resource('estudiantes', 'EstudiantesController');
});
Route::group(['middleware' => ['web']], function () {
	Route::resource('materiales', 'MaterialesController');
});

Route::get('listamateriales', 'ConsultasController@lista_materiales')->middleware('auth');;
Route::get('listaprestados', 'ConsultasController@lista_prestados')->middleware('auth');;
Route::get('listanoprestados', 'ConsultasController@lista_no_prestados')->middleware('auth');;

Route::get('/', 'ConsultasController@lista_materiales');

Route::group(['middleware' => ['web']], function () {
	Route::resource('prestamos', 'PrestamosController');
});

Route::get('prestamos/create/{id}', 'PrestamosController@create');

Route::get('buscarestudiante/{id}/{ci}', 'EstudiantesController@buscarEstudiante');//->where('id', '[0-9]+')->where('ci', '[0-9]+');

Route::get('rephistorialestudiante/{id}', 'ReportesController@historial_estudiante');

Route::get('rephistorialmaterial/{id}', 'ReportesController@historial_material');

Route::get('replistamateriales', 'ReportesController@lista_material');
Route::get('repestadistico', 'ReportesController@reporte_estadistico');