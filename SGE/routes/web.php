<?php

use App\Http\Controllers\Eliud\Documentos\DocumentsController;
use App\Http\Controllers\Eliud\Reportes\ReportsController;
use App\Http\Controllers\Pipa\ChangePasswordController;
use App\Http\Controllers\Pipa\LoginController;
use App\Http\Controllers\Pipa\RecoverPasswordController;
use App\Http\Controllers\Pipa\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Luis\EventController;
use App\Http\Controllers\Luis\BooksController;

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
Route::resource('login', LoginController::class);
Route::resource('changepassword', ChangePasswordController::class);
Route::resource('recover', RecoverPasswordController::class);

// RUTAS PARA EL CRUD DE USUARIOS

Route::resource('user', UserController::class);

// RUTAS PARA LOS EVENTOS - CRUD Y CALENDARIO
Route::get('/events', [EventController::class, 'index'])->name('EventList');
Route::get('/newEvent', [EventController::class, 'create'])->name('newEventForm');
Route::post('/newEvent', [EventController::class, 'store']);
Route::get('/calendar', [EventController::class, 'calendar'])->name('calendar');

// RUTAS PARA LOS LIBROS - CRUD
Route::get('/books', [BooksController::class, 'index']);
Route::get("/newBook", [BooksController::class, 'create'])->name('newBookForm');
Route::post("/newBook", [BooksController::class, 'store']);
