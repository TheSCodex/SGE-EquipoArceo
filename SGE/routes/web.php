<?php

use App\Http\Controllers\Michell\DirectorAssistantController;
use App\Http\Controllers\Michell\DirectorController;
use App\Http\Controllers\Eliud\Documentos\DocumentsController;
use App\Http\Controllers\Eliud\Reportes\ReportsController;
use App\Http\Controllers\Michell\Administrator\AdministratorController;
use App\Http\Controllers\Michell\PresidentOfTheAcademy\PresidentOfTheAcademy;
use App\Http\Controllers\Michell\StudentController;
use App\Http\Controllers\Michell\BajasController;
use App\Http\Controllers\Michell\AcademicHomeController;
use App\Http\Controllers\Michell\AcademicAdvisorController;
use App\Http\Controllers\Michell\StudentListController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Daniel\FormAnteproyectoController;
use App\Http\Controllers\Daniel\Proyectos\ProjectsController;
use App\Http\Controllers\Elizabeth\carrerasController;
use App\Http\Controllers\companiesController;
use App\Http\Controllers\Daniel\AnteproyectViewAcAd;
use App\Http\Controllers\Daniel\DashboardAd;

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

//RUTAS DIRECTOR
Route::get("/director", [DirectorController::class, "index"]);
Route::get("/assistant", [DirectorAssistantController::class, "index"]);
//RUTA DEL PRESIDENTE DE LA ACADEMIA
Route::resource('presidenteDeLaAcademia', PresidentOfTheAcademy::class);

//RUTA DEL ADMINISTRADOR
Route::resource('admin', AdministratorController::class);

//RUTA  ESTUDIANTES
Route::get('student', [StudentController::class, "index"]);

// RUTA INICIO DE ESTUDIANTES
Route::get('inicioEstudiante',[StudentController::class, 'index']);
Route::get('eventos',[StudentController::class, 'studentEvents']);

// Route::get('inicioEstudiante', function () {
//     return view('Michell.studentHome.studentHome');
// });
//BAJAS
Route::get('bajas', [BajasController::class, "index"]);

//ASESOR ACADEMICO
Route::get('academic', [AcademicAdvisorController::class, "index"]);

//ASESOR ACADEMICO HOME
Route::get('academichome', [AcademicHomeController::class, "index"]);

//STUDENT LIST
Route::get('studentL', [StudentListController::class, "index"]);
//RUTAS PARA ANTEPROYECTOS
//Formulario de anteproyecto
Route::resource('Form-anteproyecto', FormAnteproyectoController::class);
//Vista de anteproyecto estudiante
Route::resource('Mi-anteproyecto', ProjectsController::class);
//Vista de anteproyecto cualquiera
Route::resource('anteproyectos', AnteproyectViewAcAd::class);

Route::resource('Dashboard', DashboardAd::class);

//RUTAS DE DASHBOARDS
//Dashboard Asesor 


//RUTAS PARA EL CRUD DE CARRERAS Y DIVISIONES
Route::resource('/carreras', carrerasController::class);


Route::resource('/companies', companiesController::class);

Route::get('/crud', [AsesorController::class, 'index']);
