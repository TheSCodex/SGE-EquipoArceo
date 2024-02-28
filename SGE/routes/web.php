<?php

use App\Http\Controllers\Daniel\FormAnteproyectoController;
use App\Http\Controllers\Daniel\Proyectos\ProjectsController;
use App\Http\Controllers\Eliud\Documentos\DocumentsController;
use App\Http\Controllers\Eliud\Reportes\ReportsController;
use App\Http\Controllers\Elizabeth\carrerasController;
use App\Http\Controllers\companiesController;
use App\Http\Controllers\Daniel\AnteproyectViewAcAd;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Elizabeth\AsesorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//RUTAS PARA REPORTES
Route::get('reportes/director', [ReportsController::class, 'directorIndex']);
Route::get('reportes/asistente', [ReportsController::class, 'assistantIndex']);

Route::resource('reportes', ReportsController::class);

//RUTAS PARA CRUD - DOCUMENTOS
Route::resource('documentos', DocumentsController::class);

//RUTAS PARA ANTEPROYECTOS
Route::resource('Form-anteproyecto', FormAnteproyectoController::class);
//Vista de anteproyecto estudiante
Route::resource('Mi-anteproyecto', ProjectsController::class);
//Vista de anteproyecto cualquiera
Route::resource('anteproyectos', AnteproyectViewAcAd::class);

//RUTAS PARA EL CRUD DE CARRERAS Y DIVISIONES
Route::resource('/carreras', carrerasController::class);


Route::resource('/companies', companiesController::class);

Route::get('/crud', [AsesorController::class, 'index']);
