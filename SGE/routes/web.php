<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\Eliud\Reportes\ExcelExportController;
use App\Http\Controllers\Pipa\ChangePasswordFirstTime;
use App\Http\Controllers\Pipa\RoleController;

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
    return redirect()->route('login');
})->middleware('guest'); 

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rutas para Inicio de Sesión
    Route::resource('login', LoginController::class)->middleware('guest');
    Route::resource('cambiar-contraseña', ChangePasswordController::class)->middleware('guest');
    Route::resource('recuperar-contraseña', RecoverPasswordController::class)->middleware('guest');
    Route::resource('cambiar-contraseña-primera-vez', ChangePasswordFirstTime::class);

    // ! LAS SIGUIENTES RUTAS SE DEBEN CONFIGURAR AUN PARA SEPARAR SEGUN ROL Y SEGUN PERMISOS

    // Rutas para Reportes
    //! REVISAR ESTAR RUTAS QUE TIENEN UN BUG
    // Route::get('reportes/director', [ReportsController::class, 'directorIndex']);
    Route::get('reportes/asistente', [ReportsController::class, 'assistantIndex']);
    Route::resource('reportes', ReportsController::class);

    //TODO - ESTUDIANTE
    Route::group(['middleware' => 'role:estudiante'], function () {

    // Ruta Estudiantes
    Route::get('student', [StudentController::class, "index"]);
    Route::get('inicioEstudiante',[StudentController::class, 'index']);
    Route::resource('Mi-anteproyecto', ProjectsController::class);
    Route::get('Mi-anteproyecto-create', [ProjectsController::class, 'create'])->name('formanteproyecto');
    Route::get('Mi-anteproyecto/{id}/edit', [ProjectsController::class, 'edit'])->name('editAnteproyecto');


    Route::get('/observaciones/{projectId}', [ObservationsController::class, 'index']);
    
    // Rutas para Eventos
    Route::resource('eventos', EventController::class);
    Route::get('calendario', [EventController::class, 'calendar'])->name('events.calendar');
    });

    //TODO - ASESOR ACADEMICO
    Route::group(['middleware' => 'role:asesorAcademico'], function () {

    Route::resource('Dashboard-Asesor', DashboardAdvisorController::class);
    Route::resource('anteproyectos', ProyectsAdvisorController::class);
    Route::resource('anteproyecto-Asesor', ProjectDraftController::class);
    Route::get('academichome', [AcademicHomeController::class, "index"]);
    // Rutas para Eventos
    Route::resource('eventos', EventController::class);
    Route::get('calendario', [EventController::class, 'calendar'])->name('events.calendar');
    Route::post('/eventos/filter', [EventController::class, 'filter'])->name('eventos.filter');
    });

    //TODO - PRESIDENTE DE ACADEMIA
    Route::group(['middleware' => 'role:presidenteAcademia'], function () {

    Route::resource('presidenteDeLaAcademia', PresidentOfTheAcademy::class);
    Route::get('academic', [AcademicAdvisorController::class, "index"]);
    Route::get('studentL', [StudentListController::class, "index"]);
    Route::resource('documentos', DocumentsController::class);
    });


    //TODO - DIRECTORA
    Route::group(['middleware' => 'role:director'], function () {
    

    Route::get("/director", [DirectorController::class, "index"]);
    Route::get('proyectos',[ ProjectsController::class, 'project']);
    Route::resource('libros', BooksController::class);
    Route::resource('reportes', ReportsController::class);
    Route::get('reportes/director', [ReportsController::class, 'directorIndex']);
    });


    //TODO - Asistente directora
    Route::group(['middleware' => 'role:asistenteDireccion'], function () {

    Route::get("/asistente", [DirectorAssistantController::class, "index"]);
    Route::resource('asistente/reportes', ReportsController::class);
    Route::resource('asistente/documentos', DocumentsController::class);
    Route::resource('asistente/libros', BooksController::class);
    Route::post('asistente/libros/filter', [BooksController::class, 'filter'])->name('libros.filter');
    Route::get('asistente/bajas', [BajasController::class, "index"]);
    Route::get('asistente/proyectos',[ ProjectsController::class, 'project']);
    Route::resource('asistente/anteproyecto-Asesor', ProjectDraftController::class);
    Route::get('reportes/asistente', [ReportsController::class, 'assistantIndex']);
    });

    //RUTAS PARA LA GENERACIÓN DE DOCUMENTOS
    Route::get('/export', [ExcelExportController::class, 'downloadExcelFile']);

    //TODO - Administrador

    Route::group(['middleware' => 'role:admin'], function () {

    Route::resource('admin', AdministratorController::class);
    // Rutas para CRUD de Usuarios
    Route::resource('panel-users', UserController::class);
    Route::resource('panel-roles', RoleController::class);
    // Rutas para CRUD de Empresas
    Route::resource('/panel-companies', companiesController::class)->names('panel-companies');
    Route::get('/panel-companies-create', [companiesController::class, 'create'])->name('companies_form');
    Route::get('/panel-companies/{id}/edit', [companiesController::class, 'edit'])->name('panel-companies.edit');
    //RUTAS PARA EL CRUD SE ASESORES ACADEMICOS
    Route::resource('/panel-advisors', AdvisorController::class);
    Route::get('/panel-advisors-create', [AdvisorController::class, 'create'])->name('formAsesores');
    Route::get('/panel-advisors-edit/{id}', [AdvisorController::class, 'edit'])->name('panel-advisors.edit');
    Route::delete('/panel-advisors/{id}', [AdvisorController::class, 'destroy'])->name('panel-advisors.destroy');
    // Rutas para CRUD de Carreras y Divisiones
    Route::resource('/panel-careers', carrerasController::class);
    Route::get('/newCareer', [carrerasController::class, 'create'])->name('newCareer');
    Route::get("/editCareer", [carrerasController::class, 'edit'])->name('editCareer');
    // Rutas para CRUD de Documentos
    Route::resource('documentos', DocumentsController::class);
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

require __DIR__.'/auth.php';


// // Rutas para CRUD de Documentos
    // Route::resource('documentos', DocumentsController::class);

    // // Rutas para CRUD de Usuarios
    // Route::resource('panel-users', UserController::class);
    // Route::resource('panel-roles', RoleController::class);

    // // Rutas para Eventos
    // Route::resource('eventos', EventController::class);
    // Route::get('calendario', [EventController::class, 'calendar'])->name('events.calendar');

    // Rutas para CRUD de Libros
    // Route::resource('libros', BooksController::class);
    // Route::get('/books', [BooksController::class, 'index']);
    // Route::get("/newBook", [BooksController::class, 'create'])->name('newBookForm');
    // Route::post("/newBook", [BooksController::class, 'store']);

    // // Rutas para CRUD de Carreras y Divisiones
    // Route::resource('/panel-careers', carrerasController::class);
    // Route::get('/newCareer', [carrerasController::class, 'create'])->name('newCareer');
    // Route::get("/editCareer", [carrerasController::class, 'edit'])->name('editCareer');

    // //RUTAS PARA EL CRUD SE ASESORES ACADEMICOS
    // Route::resource('/panel-advisors', AdvisorController::class);
    // Route::get('/panel-advisors-create', [AdvisorController::class, 'create'])->name('formAsesores');
    // Route::get('/panel-advisors-edit/{id}', [AdvisorController::class, 'edit'])->name('panel-advisors.edit');
    // Route::delete('/panel-advisors/{id}', [AdvisorController::class, 'destroy'])->name('panel-advisors.destroy');

    // // Rutas para CRUD de Empresas
    // Route::resource('/panel-companies', companiesController::class)->names('panel-companies');
    // Route::get('/panel-companies-create', [companiesController::class, 'create'])->name('companies_form');
    // Route::get('/panel-companies/{id}/edit', [companiesController::class, 'edit'])->name('panel-companies.edit');

    // Rutas Director
    // Route::get("/director", [DirectorController::class, "index"]);
    // Route::get("/assistant", [DirectorAssistantController::class, "index"]);

    // Ruta Presidente de la Academia   
    // Route::resource('presidenteDeLaAcademia', PresidentOfTheAcademy::class);

    // Ruta Administrador
    // Route::resource('admin', AdministratorController::class);

    // Ruta Estudiantes
    // Route::get('student', [StudentController::class, "index"]);
    // Route::get('inicioEstudiante',[StudentController::class, 'index']);
    // Route::get('eventos',[StudentController::class, 'studentEvents']);

    // Rutas para Bajas
    // Route::get('bajas', [BajasController::class, "index"]);

    // Ruta Asesor Académico
    // Route::get('academic', [AcademicAdvisorController::class, "index"]);
    // Route::get('academichome', [AcademicHomeController::class, "index"]);

    // Ruta Lista de Estudiantes
    // Route::get('studentL', [StudentListController::class, "index"]);


    // Rutas para Anteproyectos
    // Route::resource('Form-anteproyecto', FormAnteproyectoController::class);
    // Route::resource('Mi-anteproyecto', ProjectsController::class);
    // Route::resource('Dashboard-Asesor', DashboardAdvisorController::class);
    // Route::resource('observaciones', ObservationsController::class);
    // Route::resource('anteproyecto-Asesor', ProjectDraftController::class);
    // Route::get('proyectos',[ ProjectsController::class, 'project']);
    // Route::resource('anteproyectos', ProyectsAdvisorController::class);
