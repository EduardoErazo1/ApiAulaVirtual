<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\estadosController;
use App\Http\Controllers\credencialesController;
use App\Http\Controllers\alumnosController;
use App\Http\Controllers\maestrosController;

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
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
