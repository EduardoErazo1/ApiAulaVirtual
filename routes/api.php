<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
header('Access-Control-Allow-Origin: *');
//Access-Control-Allow-Origin: *
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization');


//Rutas de estado

Route::post('/estado','estadosController@InsertEstado');
Route::put('estado/{id}', 'estadosController@UpdateEstado');
Route::delete('estado/{id}', 'estadosController@DeleteEstado');
Route::get('estado', 'estadosController@ReadEstado');
Route::get('estado/{id}', 'estadosController@ObtainEstado');
//Rutas de credencial
Route::post('/credencial','credencialesController@InsertCredencial');
Route::put('credencial/{id}', 'credencialesController@UpdateCredencial');
Route::delete('credencial/{id}', 'credencialesController@DeleteCredencial');
Route::get('credencial', 'credencialesController@ReadCredencial');
Route::get('credencial/{id}', 'credencialesController@ObtainCredencial');
//Rutas de Alumnos
Route::post('/alumno','alumnosController@InsertAlumno');
Route::put('/alumno/{id}','alumnosController@UpdateAlumno');
Route::Delete('/alumno/{id}','alumnosController@DeleteAlumno');
Route::get('/alumno','alumnosController@ReadAlumno');
Route::get('/alumno/{id}','alumnosController@ObtainAlumno');
//Rutas de Maestros
Route::post('/maestro','maestrosController@InsertMaestro');
Route::put('/maestro/{id}','maestrosController@UpdateMaestro');
Route::Delete('/maestro/{id}','maestrosController@DeleteAlumno');
Route::get('/maestro','maestrosController@ReadMaestro');
Route::get('/maestro/{id}','maestrosController@ObtainMaestro');
//Rutas de Coordinadores
Route::post('/coordinador','coordinadoresController@InsertCoordinador');
Route::put('/coordinador/{id}','coordinadoresController@UpdateCoordinador');
Route::Delete('/coordinador/{id}','coordinadoresController@DeleteCoordinador');
Route::get('/coordinador','coordinadoresController@ReadCoordinador');
Route::get('/coordinador/{id}','coordinadoresController@ObtainCoordinador');
//Rutas de Grupos
Route::post('/grupo','gruposController@InsertGrupo');
Route::put('/grupo/{id}','gruposController@UpdateGrupo');
Route::Delete('/grupo/{id}','gruposController@DeleteGrupo');
Route::get('/grupo','gruposController@ReadGrupo');
Route::get('/grupo/{id}','gruposController@ObtainGrupo');
//Rutas de Cursos
Route::post('/curso','cursosController@InsertCurso');
Route::put('/curso/{id}','cursosController@UpdateCurso');
Route::Delete('/curso/{id}','cursosController@DeleteCurso');
Route::get('/curso','cursosController@ReadCurso');
Route::get('/curso/{id}','cursosController@ObtainCurso');
//Rutas de Documentos
Route::post('/doc','documentosController@InsertDocumento');
Route::put('/doc/{id}','documentosController@UpdateDocumento');
Route::Delete('/doc/{id}','documentosController@DeleteDocumento');
Route::get('/doc','documentosController@ReadDocumento');
Route::get('/doc/{id}','documentosController@ObtainDocumento');
//Rutas de Agendas
Route::post('/agenda','agendasController@InsertAgenda');
Route::put('/agenda/{id}','agendasController@UpdateAgenda');
Route::Delete('/agenda/{id}','agendasController@DeleteAgenda');
Route::get('/agenda','agendasController@ReadAgenda');
Route::get('/agenda/{id}','agendasController@ObtainAgenda');
//Rutas de Asignacion Maestro
Route::post('/asigm','maestro_gruposController@AsignarMaestro');
Route::put('/asigm/{id}','maestro_gruposController@ReasignarMaestro');
Route::get('/asigm','maestro_gruposController@ReadAsignacion');
Route::get('/asigm/{id}','maestro_gruposController@ObtainAsignacion');
//Rutas de Asignacion Alumno
Route::post('/asiga','alumno_gruposController@AsignarAlumno');
Route::put('/asiga/{id}','alumno_gruposController@ReasignarAlumno');
Route::get('/asiga','alumno_gruposController@ReadAsignacion');
Route::get('/asiga/{id}','alumno_gruposController@ObtainAsignacion');
//Login
Route::post('/login','LoginController@ValidateLogin');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
