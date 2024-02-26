<?php

use App\Http\Controllers\Michell\DirectorAssistantController;
use App\Http\Controllers\Michell\DirectorController;
use App\Http\Controllers\Eliud\Documentos\DocumentsController;
use App\Http\Controllers\Eliud\Reportes\ReportsController;
use Illuminate\Support\Facades\Route;

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

//RUTAS DIRECTOR
Route::get("/director", [DirectorController::class, "index"]);
Route::get("/assistant", [DirectorAssistantController::class, "index"]);