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

Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*');
