<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Luis\EventController;

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

Route::get("/newBook", function(){
    return view("Luis.newBookForm");
});

Route::get("/newEvent", function(){
    return view("Luis.newEventForm");
});

Route::get('/events', [EventController::class, 'index'])->name('EventList');
