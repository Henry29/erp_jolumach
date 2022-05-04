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
//PARENTESCO
Route::get('/getParentesco', 'ParentescoController@index');
Route::post('/parentesco/guardar', 'ParentescoController@store');
Route::delete('/parentesco/borrar/{id}', 'ParentescoController@destroy');
//RIESGO CREDITICIO
Route::get('/getRiesgoCrediticio', 'RiesgoCrediticioController@index');
Route::post('/riesgoCrediticio/guardar', 'RiesgoCrediticioController@store');
Route::delete('/riesgoCrediticio/borrar/{id}', 'RiesgoCrediticioController@destroy');


/* -------------------------------------------------------------------------- */
/* ----------------------- Route Tramite Documentario ----------------------- */

Route::get('/getSolicitudTramiteDocumentario', 'TramiteDocumentario\SolicitudTramiteDocController@index');
Route::post('/SolicitudTramiteDocumentario/guardar', 'TramiteDocumentario\SolicitudTramiteDocController@store');
Route::delete('/SolicitudTramiteDocumentario/borrar/{id}', 'TramiteDocumentario\SolicitudTramiteDocController@destroy');

// Mantenimiento AreaCooperativa
Route::get('/getTramite_AreaCooperativa', 'TramiteDocumentario\TramiteD_AreaCooperativaController@index');
Route::post('/Tramite_areacooperativa/guardar', 'TramiteDocumentario\TramiteD_AreaCooperativaController@store');
Route::delete('/Tramite_areacooperativa/borrar/{id}', 'TramiteDocumentario\TramiteD_AreaCooperativaController@destroy');
// Mantenimiento Calificacion
Route::get('/getTramite_Calificacion', 'TramiteDocumentario\TramiteD_CalificacionController@index');
Route::post('/Tramite_Calificacion/guardar', 'TramiteDocumentario\TramiteD_CalificacionController@store');
Route::delete('/Tramite_Calificacion/borrar/{id}', 'TramiteDocumentario\TramiteD_CalificacionController@destroy');
// Mantenimiento Prioridad de Tramite
Route::get('/getTramite_Prioridad', 'TramiteDocumentario\TramiteD_PrioridadController@index');
Route::post('/Tramite_Prioridad/guardar', 'TramiteDocumentario\TramiteD_PrioridadController@store');
Route::delete('/Tramite_Prioridad/borrar/{id}', 'TramiteDocumentario\TramiteD_PrioridadController@destroy');
// Mantenimiento Tipo de Documento
Route::get('/getTramite_TipoDocumento', 'TramiteDocumentario\TramiteD_TipoDocumentoController@index');
Route::post('/Tramite_TipoDocumento/guardar', 'TramiteDocumentario\TramiteD_TipoDocumentoController@store');
Route::delete('/Tramite_TipoDocumento/borrar/{id}', 'TramiteDocumentario\TramiteD_TipoDocumentoController@destroy');
// Mantenimiento Tipo de Tramite
Route::get('/getTramite_TipoTramite', 'TramiteDocumentario\TramiteD_TipoTramiteController@index');
Route::post('/Tramite_TipoTramite/guardar', 'TramiteDocumentario\TramiteD_TipoTramiteController@store');
Route::delete('/Tramite_TipoTramite/borrar/{id}', 'TramiteDocumentario\TramiteD_TipoTramiteController@destroy');
// Mantenimiento Motivo de Tramite
Route::get('/getTramite_MotivoTramite', 'TramiteDocumentario\TramiteD_MotivoTramiteController@index');
Route::post('/Tramite_MotivoTramite/guardar', 'TramiteDocumentario\TramiteD_MotivoTramiteController@store');
Route::delete('/Tramite_MotivoTramite/borrar/{id}', 'TramiteDocumentario\TramiteD_MotivoTramiteController@destroy');
// Mantenimiento Requisito de Tramite
Route::get('/getTramite_RequisitoTramite', 'TramiteDocumentario\TramiteD_RequisitoTramiteController@index');
Route::post('/Tramite_RequisitoTramite/guardar', 'TramiteDocumentario\TramiteD_RequisitoTramiteController@store');
Route::delete('/Tramite_RequisitoTramite/borrar/{id}', 'TramiteDocumentario\TramiteD_RequisitoTramiteController@destroy');
// Moneda
Route::get('/getTipoMoneda', 'MonedaController@Getter');
// Prueba del pdf
Route::get('/Reporte/CajaPDF','Caja\ReporteCaja@ReporteBasico');
// Permisos
Route::prefix('permit')->group(function(){
    Route::post('/menu','PermisoController@ObtenerPermisos');
});

/* -------------------------------------------------------------------------- */
/* ----------------------- Routes Modulo Web/Electoral ---------------------- */
// Modulo Web
Route::get('/getConvenio', 'Web\ConvenioController@index');
Route::post('/Convenio/guardar', 'Web\ConvenioController@store');
Route::post('/Convenio/borrar/{id}', 'Web\ConvenioController@destroy');
// Route::get('/getConvenio', 'Web\ConvenioController@index');

// Modulo Electoral
Route::get('/getCandidato', 'Electoral\CandidatoController@index');
Route::get('/getCargo', 'Electoral\CargoController@index');



/* -------------------------------------------------------------------------- */
/* ------------------------- Routes Modulo Admision ------------------------- */
//SOLICITUD DE INGRESO
Route::post('/solicitudAdmision/guardar', 'SolicitudAdmisionController@store');
Route::post('/solicitudAdmision/actualizar', 'SolicitudAdmisionController@update');
Route::post('/solicitudAdmision/imprimir', 'SolicitudAdmisionController@print');
Route::post('/solicitudAdmision/cargarImagen','SolicitudAdmisionController@upload');
Route::get('/getEstadoSolicitud', 'SolicitudAdmisionController@state');
Route::get('/getLibro', 'SolicitudAdmisionController@book');
Route::post('/solicitudAdmision/buscar', 'SolicitudAdmisionController@find');


/* -------------------------------------------------------------------------- */
/* ------------------------ Routes Gestion Uusuarios ------------------------ */
//ROLES
Route::get('/getRol', 'RolController@index');
//USUARIOS
Route::get('/getUsers', 'UserController@index');
Route::delete('/usuario/borrar/{id}', 'UserController@destroy');


Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*');
