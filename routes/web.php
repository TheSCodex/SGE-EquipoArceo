<?php

use App\Http\Controllers\Eliud\Documentos\DocumentsController;
use App\Http\Controllers\Eliud\Reportes\ReportsController;
use App\Http\Controllers\Elizabeth\carrerasController;
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

//RUTAS PARA EL CRUD DE CARRERAS Y DIVISIONES
Route::resource('carreras', carrerasController::class);



Route::get('/crud', [AsesorController::class, 'index']);