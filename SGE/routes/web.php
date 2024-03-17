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
        
// Redireccion a login pues no tenemos Inicio de Invitado
Route::redirect('/', 'login');

// Rutas para Usuarios Invitados
Route::middleware('guest')->group(function () {
    // Ruta para el inicio de sesión:
    Route::resource('login', LoginController::class);
    
    // Ruta para cambiar la contraseña
    Route::resource('cambiar-contra', RecoverPasswordController::class);
    
    // Ruta para recuperar contraseña (la que envía el correo)
    Route::resource('recuperar-contra', ChangePasswordController::class);

    // Ruta que se muestra al iniciar sesión por primera vez / cambiar contraseña por primera vez
    Route::resource('primer-cambio-contra', ChangePasswordFirstTime::class);
});

// Rutas para Usuarios Autenticados
Route::middleware('auth')->group(function () {

    //TODO - ESTUDIANTE
    Route::prefix('estudiante')->middleware('role:estudiante')->group(function () {

        // ! No muevan esta ruta, ESA ES LA PANTALLA DE INICIO DEL ESTUDIANTE {{studentHome}}
        Route::get('/', [StudentController::class, "studentHome"])->name('inicio-estudiante');   
        
        //Ruta de la vista del anteproyecto del estudiante
        Route::get('anteproyecto', [ProjectsController::class, 'index'])->name('anteproyecto');
        
        // Rutas para el formulario de anteproyectos
        Route::get("anteproyecto/nuevo", [ProjectsController::class, 'create'])->name('formanteproyecto');
        Route::post("anteproyecto/nuevo", [ProjectsController::class, 'store'])->name('formanteproyecto');
        Route::get("anteproyecto/edit/{id}", [ProjectsController::class, 'edit'])->name('editAnteproyecto');
        Route::put("anteproyecto/edit/{id}", [ProjectsController::class, 'update'])->name('editAnteproyecto');
        
        //Ruta para las observaciones del estudiante
        Route::get("anteproyecto/observaciones", [ObservationsController::class, "index"])->name('observationsAnteproyecto');

        // Vista del calendario del estudiante
        Route::get('calendario', [EventController::class, 'calendar'])->name('events.calendar');
        // Actualmente no lo tengo pero lo ocupare en proximas actualizaciones

    });

    //TODO - ASESOR ACADEMICO
    Route::prefix('asesor')->middleware('role:asesorAcademico')->group(function () {

        //Ruta de la lista de los anteproyectos
        Route::get('anteproyectos', [ProyectsAdvisorController::class, "index"])->name('anteproyectos-asesor');
        
        // ! Ruta de las observaciones del asesor
        //Route::get("anteproyecto/observaciones", [ObservationsAcademicAdvisor::class, "index"])->name('observationsAnteproyectoA');

        // Ruta para el crud de actividades
        Route::resource('actividades', EventController::class)->names('actividades');

        // Ruta para la vista del calendario del asesor
        Route::get('calendario', [EventController::class, 'calendar'])->name('events.calendar');

        // Ruta para el filtrado (Esta podria quitarse aun no estoy seguro)
        Route::post('actividades/search', [EventController::class, 'search'])->name('actividades.search');


    });

    //TODO - PRESIDENTE DE ACADEMIA
    Route::prefix('presidente')->middleware('role:presidenteAcademia')->group(function () {

        //inicio de presidente 
        Route::get('/', [PresidentOfTheAcademy::class, "index"])->name('inicio-presidente');

        //Ruta de la lista de los anteproyectos
        Route::get('anteproyectos', [AcademicAdvisorController::class, 'index'])->name('anteproyectos-presidente');
    });

    //TODO - DIRECTORA
    Route::group(['middleware' => 'role:director'], function () {

        //inicio director
        Route::get("/", [DirectorController::class, "index"])->name('inicio-director');

        // El apartado de reportes para la directora
        Route::get('/reportes', [ReportsController::class, "index"])->name('reportes-director');
        
        // El acceso al CRUD/Listado de documentos para la directora
        Route::resource('/director/documentos', DocumentsController::class)->names('documentos-director');

        // Las rutas para la generación de archivos de la directora
        Route::get('/exportar/{academic_advisor_id}', [ExcelExportController::class, 'downloadExcelFile']);
        Route::get('/Download/Sancion', [ReportsController::class, 'printSansion'])-> name('cata.aprobacion');
        Route::get('/Download/CartaMemoria', [ReportsController::class, 'printCartaMemoria'])-> name('cata.aprobacion');
        Route::get('/Download/CartaAprobacion', [ReportsController::class, 'printCartaAprobacion'])-> name('cata.aprobacion'); 

        //Ruta de la lista de los anteproyectos
        Route::get('director/anteproyectos', [ProjectsDirectorController::class, 'index']);

    });

    //TODO - Asistente directora
    Route::prefix('asistente')->middleware('role:asistenteDireccion')->group(function () {

        //inicio asistente
        Route::get("/", [DirectorAssistantController::class, "index"])->name('inicio-asistente');
        //crud asistente
        Route::get('estudiantes',[StudentListController::class, "index"])->name('estudiantes-asistente');

        //bajas 
        Route::get('bajas', [BajasController::class, "index"])->name('bajas-asistente');
        
        // Con esta se accede a la pantalla assistantsReports
        Route::resource('reportes', ReportsController::class)->names('reportes-asistente');
        
        // Con esta se accede al CRUD/Listado de los documentos generados
        Route::resource('documentos', DocumentsController::class)->names('documentos-asistente');

        // Esas tres generan los formatos de las cartas hasta ahora
        Route::get('Download/Sancion', [ReportsController::class, 'printSansion'])-> name('cata.sancion');
        Route::get('Download/CartaMemoria', [ReportsController::class, 'printCartaMemoria'])-> name('cata.digitalizacion');
        Route::get('Download/CartaAprobacion', [ReportsController::class, 'printCartaAprobacion'])-> name('cata.aprobacion'); 
        Route::get('exportar/{academic_advisor_id}', [ExcelExportController::class, 'downloadExcelFile']);

        // Ruta para el crud de libros
        Route::resource('libros', BooksController::class)->names('libros-asistente');

        // Ruta para el filtrado de libros (Igual podria quitarse aun no estoy seguro)
        Route::post('libros/busqueda', [BooksController::class, 'search'])->name('libros.search');


    });

    //TODO - Administrador
    Route::group(['middleware' => 'role:admin'], function () {

        // inicio admin
        Route::resource('admin', AdministratorController::class)->names('admin');

        // CRUD de Usuarios
        Route::resource('panel-users', UserController::class)->names('panel-users');

        // CRUD de Roles
        Route::resource('panel-roles', RoleController::class)->names('panel-roles');

        // Rutas para CRUD de Empresas
        Route::resource('/panel-companies', companiesController::class)->names(['index'=>'companies.index']);
        Route::get('/panel-companies-create', [companiesController::class, 'create'])->name('companies_form');
        Route::get('/panel-companies/{id}/edit', [companiesController::class, 'edit'])->name('panel-companies.edit');


        // RUTAS PARA EL CRUD SE ASESORES ACADEMICOS
        Route::resource('/panel-advisors', AdvisorController::class)->names('panel-advisors');
        Route::get('/panel-advisors-create', [AdvisorController::class, 'create'])->name('formAsesores');
        Route::get('/panel-advisors-edit/{id}', [AdvisorController::class, 'edit'])->name('panel-advisors.edit');
        Route::delete('/panel-advisors/{id}', [AdvisorController::class, 'destroy'])->name('panel-advisors.destroy');


        // Rutas para CRUD de Carreras y Academias
        Route::resource('/panel-careers', carrerasController::class)->names('panel-careers');
        Route::get('/panel-careers-create', [carrerasController::class,'create'])->name('newCareer');
        Route::get("/editCareer", [carrerasController::class, 'edit'])->name('editCareer');
    });
});


require __DIR__.'/auth.php';

    // Route::get('/perfil', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/perfil', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/perfil', [ProfileController::class, 'destroy'])->name('profile.destroy');