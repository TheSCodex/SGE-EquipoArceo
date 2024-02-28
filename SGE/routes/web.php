<?php

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
    return view('welcome');
});

Route::get('/events', [EventController::class, 'index'])->name('EventList');
Route::get('/newEvent', [EventController::class, 'create'])->name('newEventForm');
Route::post('/newEvent', [EventController::class, 'store']);
Route::get('/calendar', [EventController::class, 'calendar'])->name('calendar');
Route::get('/books', [BooksController::class, 'index']);
Route::get("/newBook", [BooksController::class, 'create'])->name('newBookForm');
Route::post("/newBook", [BooksController::class, 'store']);
