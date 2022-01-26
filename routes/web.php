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

//API RENIEC 
Route::get('/getDataTipoDocIden/{numDoc}', 'ApiController@index');

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
//TIPO DE PLANILLA
Route::get('/getTipoPlanilla', 'TipoPlanillaController@index');
Route::post('/tipoPlanilla/guardar', 'TipoPlanillaController@store');
Route::delete('/tipoPlanilla/borrar/{id}', 'TipoPlanillaController@destroy');
//TIPO DE CONVENIO
Route::get('/getTipoConvenio', 'TipoConvenioController@index');
Route::post('/tipoConvenio/guardar', 'TipoConvenioController@store');
Route::delete('/tipoConvenio/borrar/{id}', 'TipoConvenioController@destroy');
//TIPO INSTITUCION EDUCATIVA
Route::get('/getTipoInstitucionEducativa', 'TipoInstitucionEducativaController@index');
Route::post('/tipoInstitucionEducativa/guardar', 'TipoInstitucionEducativaController@store');
Route::delete('/tipoInstitucionEducativa/borrar/{id}', 'TipoInstitucionEducativaController@destroy');
//TIPO ZONA
Route::get('/getTipoZona', 'TipoZonaController@index');
Route::post('/tipoZona/guardar', 'TipoZonaController@store');
Route::delete('/tipoZona/borrar/{id}', 'TipoZonaController@destroy');
//TIPO VIA
Route::get('/getTipoVia', 'TipoViaController@index');
Route::post('/tipoVia/guardar', 'TipoViaController@store');
Route::delete('/tipoVia/borrar/{id}', 'TipoViaController@destroy');
//INSTITUCION EDUCATIVA
Route::get('/getInstitucionEducativa/{id}', 'InstitucionEducativaController@index');
Route::post('/institucionEducativa/guardar', 'InstitucionEducativaController@store');
Route::delete('/institucionEducativa/borrar/{id}', 'InstitucionEducativaController@destroy');
//TIPO CARGO
Route::get('/getTipoCargo', 'TipoCargoController@index');
Route::post('/tipoCargo/guardar', 'TipoCargoController@store');
Route::delete('/tipoCargo/borrar/{id}', 'TipoCargoController@destroy');
//TIPO CONTRATO LABORAL
Route::get('/getTipoContratoLaboral', 'TipoContratoLaboralController@index');
Route::post('/tipoContratoLaboral/guardar', 'TipoContratoLaboralController@store');
Route::delete('/tipoContratoLaboral/borrar/{id}', 'TipoContratoLaboralController@destroy');
//REGIMEN LABORAL
Route::get('/getRegimenLaboral', 'RegimenLaboralController@index');
Route::post('/regimenLaboral/guardar', 'RegimenLaboralController@store');
Route::delete('/regimenLaboral/borrar/{id}', 'RegimenLaboralController@destroy');
//TIPO DE REGIMEN PENSIONARIO
Route::get('/getTipoRegimenPensionario', 'TipoRegimenPensionarioController@index');
Route::post('/tipoRegimenPensionario/guardar', 'TipoRegimenPensionarioController@store');
Route::delete('/tipoRegimenPensionario/borrar/{id}', 'TipoRegimenPensionarioController@destroy');
//TIPO DE DISCAPACIDAD
Route::get('/getTipoDiscapacidad', 'TipoDiscapacidadController@index');
Route::post('/tipoDiscapacidad/guardar', 'TipoDiscapacidadController@store');
Route::delete('/tipoDiscapacidad/borrar/{id}', 'TipoDiscapacidadController@destroy');
//TIPO DE SOCIO
Route::get('/getTipoSocio', 'TipoSocioController@index');
Route::post('/tipoSocio/guardar', 'TipoSocioController@store');
Route::delete('/tipoSocio/borrar/{id}', 'TipoSocioController@destroy');

Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*');
