<?php

use Illuminate\Support\Facades\Route;

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


//TIPO DE DOCUMENTO DE IDENTIDAD
Route::get('/typeDocumentIdentify', 'TypeDocumentIdentifyController@index');
Route::post('/typeDocumentIdentify/guardar', 'TypeDocumentIdentifyController@store');
Route::delete('/typeDocumentIdentify/borrar/{id}', 'TypeDocumentIdentifyController@destroy');
//UBIGEO - DEPARTAMENTO
Route::get('/getUbigeo', 'UbigeoController@index');
Route::post('/ubigeo/guardar', 'UbigeoController@store');
Route::delete('/ubigeo/borrar/{id}', 'UbigeoController@destroy');
//UBIGEO - PROVINCIA
Route::get('/getProvincia/{id}', 'ProvinciaController@index');
Route::post('/provincia/guardar', 'ProvinciaController@store');
Route::delete('/provincia/borrar/{id}', 'ProvinciaController@destroy');
//UBIGEO - DISTRITO
Route::get('/getDistrito/{id}', 'DistritoController@index');
Route::post('/distrito/guardar', 'DistritoController@store');
Route::delete('/distrito/borrar/{id}', 'DistritoController@destroy');
//TIPO DE VIVIENDA
Route::get('/getTipoVivienda', 'TipoViviendaController@index');
Route::post('/tipoVivienda/guardar', 'TipoViviendaController@store');
Route::delete('/tipoVivienda/borrar/{id}', 'TipoViviendaController@destroy');
//TIPO DE GRADO DE ESTUDIOS
Route::get('/getGradoEstudios', 'GradoEstudiosController@index');
Route::post('/gradoEstudios/guardar', 'GradoEstudiosController@store');
Route::delete('/gradoEstudios/borrar/{id}', 'GradoEstudiosController@destroy');
//TIPO DE PROFESION
Route::get('/getProfesion', 'ProfesionController@index');
Route::post('/profesion/guardar', 'ProfesionController@store');
Route::delete('/profesion/borrar/{id}', 'ProfesionController@destroy');
//TIPO DE UGEL
Route::get('/getUgel', 'UgelController@index');
Route::post('/ugel/guardar', 'UgelController@store');
Route::delete('/ugel/borrar/{id}', 'UgelController@destroy');

Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*');
