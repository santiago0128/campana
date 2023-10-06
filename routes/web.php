<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Controllerusuarios;
use App\Http\Controllers\Controllerprocesos;
use App\Http\Controllers\Controllergestion;
use App\Http\Controllers\Controllerclientes;
use App\Http\Controllers\Controlleradministraciongestion;
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



Route::get('/', function () {return view('inicio');});
Route::get('/administracion', [Controller::class, 'administracion']);
Route::get('/portafolio', [Controller::class, 'portafolio']);
Route::get('/gestion', [Controller::class, 'gestion']);
Route::get('/inicio', [Controller::class, 'inicio']);

Route::post('/save', [Controllerusuarios::class, 'insertarUsuarios']);

Route::get('/agregarprocesos', [Controllerprocesos::class, 'procesouploadfile']);
Route::post('/upload', [Controllerprocesos::class, 'proceso_table_schema']);
Route::post('/uploadfile', [Controllerprocesos::class, 'uploadfile']);

Route::post('/reporteProceso', [Controllerprocesos::class, 'buscarReporteProcesos']);
Route::post('/filtroProceso', [Controllerprocesos::class, 'buscarReporteProcesosfiltro']);
Route::post('/descargarProceso', [Controllerprocesos::class, 'descargarProceso']);
Route::post('/buscarfiltroProceso', [Controllerprocesos::class, 'buscarReporteProcesosfiltro']);
Route::get('/verProceso', [Controllerprocesos::class, 'buscarProcesoId']);
Route::POST('/getdataproceso', [Controllerprocesos::class, 'getdataproceso']);



Route::POST('/activarcontacto', [Controllerprocesos::class, 'activarcontacto']);
Route::POST('/activarperfil', [Controllerprocesos::class, 'activarperfil']);





Route::post('/saveGestion', [Controllergestion::class, 'saveGestion']);
Route::post('/savefechas_proceso', [Controllergestion::class, 'savefechas_proceso']);
Route::post('/buscarhistorico', [Controllergestion::class, 'buscarhistorico']);
Route::post('/buscaretapa', [Controllergestion::class, 'buscaretapa']);

Route::post('/buscarclientes', [Controllerclientes::class, 'consultarclientes']);
Route::post('/buscarclientesfiltro', [Controllerclientes::class, 'consultarclientesFiltro']);

Route::get('/administrargestion', [Controller::class, 'gestion']);


Route::get('/getAdminGestion', [Controlleradministraciongestion::class, 'getAdminGestion']);

Route::post('/deshabilitar', [Controlleradministraciongestion::class, 'deshabilitaretapa']);
Route::post('/habilitar', [Controlleradministraciongestion::class, 'habilitaretapa']);

Route::post('/consultaretapas', [Controlleradministraciongestion::class, 'consultaretapas']);
Route::post('/insertaretapa', [Controlleradministraciongestion::class, 'insertaretapa']);
Route::post('/actualizaretapa', [Controlleradministraciongestion::class, 'actualizaretapa']);
Route::post('/eliminar_etapa', [Controlleradministraciongestion::class, 'eliminar_etapa']);

Route::post('/deshabilitarmodulos', [Controlleradministraciongestion::class, 'deshabilitarmodulos']);
Route::post('/habilitarmodulos', [Controlleradministraciongestion::class, 'habilitarmodulos']);
Route::post('/consultarmodulos', [Controlleradministraciongestion::class, 'consultarmodulos']);
Route::post('/consultarmodulosactivos', [Controlleradministraciongestion::class, 'consultarmodulosactivos']);



Route::post('/deshabilitarcontacto', [Controlleradministraciongestion::class, 'deshabilitarcontacto']);
Route::post('/habilitarcontacto', [Controlleradministraciongestion::class, 'habilitarcontacto']);
Route::post('/consultarcontacto', [Controlleradministraciongestion::class, 'consultarcontacto']);
Route::post('/insertarcontacto', [Controlleradministraciongestion::class, 'insertarcontacto']);
Route::post('/eliminarcontacto', [Controlleradministraciongestion::class, 'eliminarcontacto']);
Route::post('/editarcontacto', [Controlleradministraciongestion::class, 'editarcontacto']);


Route::post('/deshabilitaraccion', [Controlleradministraciongestion::class, 'deshabilitaraccion']);
Route::post('/habilitaraccion', [Controlleradministraciongestion::class, 'habilitaraccion']);
Route::post('/consultaraccion', [Controlleradministraciongestion::class, 'consultaraccion']);
Route::post('/insertaraccion', [Controlleradministraciongestion::class, 'insertaraccion']);
Route::post('/eliminaraccion', [Controlleradministraciongestion::class, 'eliminaraccion']);
Route::post('/editaraccion', [Controlleradministraciongestion::class, 'editaraccion']);


Route::post('/deshabilitarperfil', [Controlleradministraciongestion::class, 'deshabilitarperfil']);
Route::post('/habilitarperfil', [Controlleradministraciongestion::class, 'habilitarperfil']);
Route::post('/consultarperfil', [Controlleradministraciongestion::class, 'consultarperfil']);
Route::post('/insertarperfil', [Controlleradministraciongestion::class, 'insertarperfil']);
Route::post('/eliminar_perfil', [Controlleradministraciongestion::class, 'eliminar_perfil']);
