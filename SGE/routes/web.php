<?php

use App\Http\Controllers\Eliud\Documentos\DocumentsController;
use App\Http\Controllers\Eliud\Reportes\ReportsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pipa\UserController;

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
    return view('Welcome');
});

//RUTAS PARA REPORTES
Route::get('reportes/director', [ReportsController::class, 'directorIndex']);
Route::get('reportes/asistente', [ReportsController::class, 'assistantIndex']);

Route::resource('reportes', ReportsController::class);

//RUTAS PARA CRUD - DOCUMENTOS
Route::resource('documentos', DocumentsController::class);


//RUTAS PARA REPORTES
Route::get('reportes/director', [ReportsController::class, 'directorIndex']);
Route::get('reportes/asistente', [ReportsController::class, 'assistantIndex']);

Route::resource('reportes', ReportsController::class);

//RUTAS PARA CRUD - DOCUMENTOS
Route::resource('documentos', DocumentsController::class);


// RUTAS PARA EL INICIO DE SESIÓN

Route::get('/logout', function () {
    return view('Pipa.login');
});
Route::get('/RecuperarContraseña', function () {
    return view('Pipa.RecuperarContraseña');
});
Route::get('/ChangePassword', function () {
    return view('Pipa.CambiarContraseña');
});

// RUTAS PARA EL CRUD DE USUARIOS

Route::resource('user', UserController::class);