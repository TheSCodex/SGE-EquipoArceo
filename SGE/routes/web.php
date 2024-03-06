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
use App\Http\Controllers\Elizabeth\AdvisorController;
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
use App\Http\Controllers\Daniel\ObservationsController;
use App\Http\Controllers\Daniel\Asesor\ProjectDraftController;
use App\Http\Controllers\Daniel\asesor\ProyectsAdvisorController;
use App\Http\Controllers\Daniel\DashboardAdvisorController;
use App\Http\Controllers\Pipa\RoleController;
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
Route::resource('panel-roles', RoleController::class);

// Rutas para Eventos
Route::resource('eventos', EventController::class);
Route::get('calendario', [EventController::class, 'calendar'])->name('events.calendar');

// Rutas para CRUD de Libros
Route::resource('libros', BooksController::class);
// Route::get('/books', [BooksController::class, 'index']);
// Route::get("/newBook", [BooksController::class, 'create'])->name('newBookForm');
// Route::post("/newBook", [BooksController::class, 'store']);


// Rutas para CRUD de Carreras y Divisiones
Route::resource('/panel-careers', carrerasController::class);
Route::get('/newCareer', [carrerasController::class, 'create'])->name('newCareer');
Route::get("/editCareer", [carrerasController::class, 'edit'])->name('editCareer');


//RUTAS PARA EL CRUD SE ASESORES ACADEMICOS
Route::resource('/panel-advisors', AdvisorController::class);
Route::get('/panel-advisors-create', [AdvisorController::class, 'create'])->name('formAsesores');
Route::get('/panel-advisors-edit/{id}', [AdvisorController::class, 'edit'])->name('panel-advisors.edit');
Route::delete('/panel-advisors/{id}', [AdvisorController::class, 'destroy'])->name('panel-advisors.destroy');


// Rutas para CRUD de Empresas
Route::resource('/panel-companies', companiesController::class)->names('panel-companies');
Route::get('/panel-companies-create', [companiesController::class, 'create'])->name('companies_form');
Route::get('/panel-companies/{id}/edit', [companiesController::class, 'edit'])->name('panel-companies.edit');

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
// Route::get('eventos',[StudentController::class, 'studentEvents']);

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
Route::resource('Dashboard-Asesor', DashboardAdvisorController::class);
Route::resource('observaciones', ObservationsController::class);
Route::resource('anteproyecto-Asesor', ProjectDraftController::class);
Route::get('proyectos',[ ProjectsController::class, 'project']);
Route::resource('anteproyectos', ProyectsAdvisorController::class);
