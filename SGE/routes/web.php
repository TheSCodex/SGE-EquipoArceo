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
use App\Http\Controllers\Daniel\Asesor\ObservationsAcademicAdvisor;
use App\Http\Controllers\Daniel\Asesor\ProjectDraftController;
use App\Http\Controllers\Daniel\asesor\ProyectsAdvisorController;
use App\Http\Controllers\Daniel\DashboardAdvisorController;
use App\Http\Controllers\Daniel\Director\ProjectsDirectorController;
use App\Http\Controllers\Daniel\Presidenta\ProjectsPresidentController;
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

    Route::get('/perfil', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/perfil', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/perfil', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rutas para Inicio de Sesión
    Route::resource('login', LoginController::class)->middleware('guest');
    Route::resource('cambiar-contra', ChangePasswordController::class)->middleware('guest');
    Route::resource('recuperar-contra', RecoverPasswordController::class)->middleware('guest');
    Route::resource('primer-cambio-contra', ChangePasswordFirstTime::class);

    // ! LAS SIGUIENTES RUTAS SE DEBEN CONFIGURAR AUN PARA SEPARAR SEGUN ROL Y SEGUN PERMISOS

    // Rutas para Reportes
    //! REVISAR ESTAR RUTAS QUE TIENEN UN BUG
    // Route::get('reportes/director', [ReportsController::class, 'directorIndex']);
    // Route::get('reportes/asistente', [ReportsController::class, 'assistantIndex']);
    // Route::resource('reportes', ReportsController::class);

    //TODO - ESTUDIANTE
    Route::group(['middleware' => 'role:estudiante'], function () {

        // Ruta Estudiantes
        Route::get('estudiante', [StudentController::class, "index"]);
        Route::get("estudiante/principal", [StudentController::class, "studentHome"]);
        Route::get("estudiante/eventos", [StudentController::class, "studentEvents"]);

        // Anteproyecto
        Route::get('estudiante/anteproyecto', [ProjectsController::class, 'index']);
        Route::get("estudiante/anteproyecto/nuevo", [ProjectsController::class, 'create'])->name('formanteproyecto');
        Route::post("estudiante/anteproyecto/nuevo", [ProjectsController::class, 'store'])->name('formanteproyecto');
        Route::get("estudiante/anteproyecto/edit/{id}", [ProjectsController::class, 'edit'])->name('editAnteproyecto');
        Route::put("estudiante/anteproyecto/edit/{id}", [ProjectsController::class, 'update'])->name('editAnteproyecto');
        Route::get("estudiante/anteproyecto/observaciones", [ObservationsController::class, "index"])->name('observationsAnteproyecto');
        
        // Rutas para Eventos
        Route::get('estudiante/eventos', [EventController::class, "index"]);
        Route::get("estudiante/eventos/filtro", [EventController::class, "filter"]);
        Route::get('estudiante/eventos/calendarios', [EventController::class, 'calendar']);
        Route::get("estudiante/eventos/nuevo", [EventController::class, "create"])->name("eventos.create");
        Route::post("estudiante/eventos/nuevo", [EventController::class, "store"]);
        Route::get("estudiante/eventos/{id}", [EventController::class, "show"]);
        Route::get("estudiante/eventos/editar/{id}", [EventController::class, "edit"]);
        Route::put("estudiante/eventos/editar/{id}", [EventController::class, "update"]);

    });

    //TODO - ASESOR ACADEMICO
    Route::group(['middleware' => 'role:asesorAcademico'], function () {

        Route::get('asesor', [DashboardAdvisorController::class, "index"]);
        Route::get('asesor/anteproyecto/asesorados', [ProyectsAdvisorController::class, "index"]);
        Route::get('asesor/eventos', [EventController::class, "index"]);
        Route::get('asesor/eventos/calendario', [EventController::class, 'calendar'])->name('events.calendar');
        Route::get('asesor/eventos/filtro', [EventController::class, 'filter'])->name('eventos.filter');
        Route::get("asesor/anteproyecto/observaciones", [ObservationsAcademicAdvisor::class, "index"])->name('observationsAnteproyectoA');

    });

    //TODO - PRESIDENTE DE ACADEMIA
    Route::group(['middleware' => 'role:presidenteAcademia'], function () {

        Route::get('presidente', [PresidentOfTheAcademy::class, "index"]);
        Route::resource('presidente/proyectos', AcademicAdvisorController::class);
        Route::get('presidente/estudiantes', [ProjectsPresidentController::class, 'index']);
        Route::get('presidente/documentos', [DocumentsController::class, "index"]);

    });


    //TODO - DIRECTORA
    Route::group(['middleware' => 'role:director'], function () {

        Route::get("director", [DirectorController::class, "index"]);
        Route::resource('director/anteproyectos', ProjectsDirectorController::class);
        Route::resource('director/libros', BooksController::class);
        Route::get('/reportes', [ReportsController::class, "index"]);
        Route::resource('/director/documentos', DocumentsController::class);
        Route::get('/exportar/{academic_advisor_id}', [ExcelExportController::class, 'downloadExcelFile']);
        Route::get('/Download/Sancion', [ReportsController::class, 'printSansion'])-> name('cata.aprobacion');
        Route::get('/Download/CartaMemoria', [ReportsController::class, 'printCartaMemoria'])-> name('cata.aprobacion');
        Route::get('/Download/CartaAprobacion', [ReportsController::class, 'printCartaAprobacion'])-> name('cata.aprobacion');    

    });


    //TODO - Asistente directora
    Route::group(['middleware' => 'role:asistenteDireccion'], function () {


        Route::get("asistente", [DirectorAssistantController::class, "index"]);
        Route::get('asistente/reportes', [ReportsController::class, "index"]);
        Route::get('asistente/documentos', [DocumentsController::class, "index"]);
        Route::resource('asistente/libros', BooksController::class);
        Route::get('asistente/bajas', [BajasController::class, "index"]);
        Route::get('asistente/anteproyectos',[ ProjectsController::class, 'project']);
        Route::resource('asistente/anteproyecto', ProjectDraftController::class);

        //RUTAS PARA LA GENERACIÓN DE DOCUMENTOS

        Route::get("/asistente", [DirectorAssistantController::class, "index"]);
        Route::resource('asistente/reportes', ReportsController::class);
        Route::resource('asistente/documentos', DocumentsController::class);
        Route::resource('asistente/libros', BooksController::class);
        Route::post('asistente/libros/busqueda', [BooksController::class, 'search'])->name('libros.search');
        Route::get('asistente/bajas', [BajasController::class, "index"]);
        Route::get('asistente/proyectos',[ ProjectsController::class, 'project']);
        Route::resource('asistente/anteproyecto-Asesor', ProjectDraftController::class);
        Route::get('reportes/asistente', [ReportsController::class, 'assistantIndex']);
        Route::get('asistente/exportar/{academic_advisor_id}', [ExcelExportController::class, 'downloadExcelFile']);
        Route::get('asistente/Download/Sancion', [ReportsController::class, 'printSansion'])-> name('cata.aprobacion');
        Route::get('asistente/Download/CartaMemoria', [ReportsController::class, 'printCartaMemoria'])-> name('cata.aprobacion');
        Route::get('asistente/Download/CartaAprobacion', [ReportsController::class, 'printCartaAprobacion'])-> name('cata.aprobacion');    


    });

    //RUTAS PARA LA GENERACIÓN DE DOCUMENTOS

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
    Route::get('/panel-careers-create', [carrerasController::class,'create'])->name('newCareer');
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