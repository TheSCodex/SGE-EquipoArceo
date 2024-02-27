<?php

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