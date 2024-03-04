<?php

use App\Http\Controllers\Eliud\Documentos\DocumentsController;
use App\Http\Controllers\Eliud\Reportes\ReportsController;
use App\Http\Controllers\Pipa\ChangePasswordController;
use App\Http\Controllers\Pipa\LoginController;
use App\Http\Controllers\Pipa\RecoverPasswordController;
use App\Http\Controllers\Pipa\UserController;
use App\Http\Controllers\Luis\EventController;
use App\Http\Controllers\Luis\BooksController;
use App\Http\Controllers\Elizabeth\carrerasController;
use App\Http\Controllers\companiesController;
use App\Http\Controllers\Elizabeth\AsesorController;
use App\Http\Controllers\Michell\DirectorAssistantController;
use App\Http\Controllers\Michell\DirectorController;
use App\Http\Controllers\Michell\Administrator\AdministratorController;
use App\Http\Controllers\Michell\PresidentOfTheAcademy\PresidentOfTheAcademy;
use App\Http\Controllers\Michell\StudentController;
use App\Http\Controllers\Michell\BajasController;
use App\Http\Controllers\Michell\AcademicHomeController;
use App\Http\Controllers\Michell\AcademicAdvisorController;
use App\Http\Controllers\Michell\StudentListController;
use App\Http\Controllers\Daniel\FormAnteproyectoController;
use App\Http\Controllers\Daniel\Proyectos\ProjectsController;
use App\Http\Controllers\Daniel\AnteproyectViewAcAd;
use App\Http\Controllers\Daniel\DashboardAd;

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

// Rutas para Reportes
Route::get('reportes/director', [ReportsController::class, 'directorIndex']);
Route::get('reportes/asistente', [ReportsController::class, 'assistantIndex']);
Route::resource('reportes', ReportsController::class);

// Rutas para CRUD de Documentos
Route::resource('documentos', DocumentsController::class);

// Rutas para Inicio de Sesión
Route::resource('login', LoginController::class);
Route::resource('cambiar-contraseña', ChangePasswordController::class);
Route::resource('recuperar-contraseña', RecoverPasswordController::class);

// Rutas para CRUD de Usuarios
Route::resource('panel-users', UserController::class);

// Rutas para Eventos
Route::get('/events', [EventController::class, 'index'])->name('EventList');
Route::get('/newEvent', [EventController::class, 'create'])->name('newEventForm');
Route::post('/newEvent', [EventController::class, 'store']);
Route::get('/calendar', [EventController::class, 'calendar'])->name('calendar');

// Rutas para CRUD de Libros
Route::get('/books', [BooksController::class, 'index']);
Route::get("/newBook", [BooksController::class, 'create'])->name('newBookForm');
Route::post("/newBook", [BooksController::class, 'store']);

// Rutas para CRUD de Carreras y Divisiones
Route::resource('/panel-carreras', carrerasController::class);


//RUTAS PARA EL CRUD SE ASESORES ACADEMICOS
Route::get('/panel-asesores', [AsesorController::class, 'index']);

// Rutas para CRUD de Empresas
Route::resource('/panel-empresas', companiesController::class);

// Rutas Director
Route::get("/director", [DirectorController::class, "index"]);
Route::get("/assistant", [DirectorAssistantController::class, "index"]);

// Ruta Presidente de la Academia   
Route::resource('presidenteDeLaAcademia', PresidentOfTheAcademy::class);

// Ruta Administrador
Route::resource('admin', AdministratorController::class);

// Ruta Estudiantes
Route::get('student', [StudentController::class, "index"]);
Route::get('inicioEstudiante',[StudentController::class, 'index']);
Route::get('eventos',[StudentController::class, 'studentEvents']);

// Rutas para Bajas
Route::get('bajas', [BajasController::class, "index"]);

// Ruta Asesor Académico
Route::get('academic', [AcademicAdvisorController::class, "index"]);
Route::get('academichome', [AcademicHomeController::class, "index"]);

// Ruta Lista de Estudiantes
Route::get('studentL', [StudentListController::class, "index"]);

// Rutas para Anteproyectos
Route::resource('Form-anteproyecto', FormAnteproyectoController::class);
Route::resource('Mi-anteproyecto', ProjectsController::class);
Route::resource('anteproyectos', AnteproyectViewAcAd::class);
Route::resource('dashboard', DashboardAd::class);

