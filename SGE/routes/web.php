<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Pipa\RoleController;
use App\Http\Controllers\Pipa\UserController;
use App\Http\Controllers\Pipa\GroupController;
use App\Http\Controllers\Luis\BooksController;
use App\Http\Controllers\Luis\EventController;
use App\Http\Controllers\Pipa\LoginController;
use App\Http\Controllers\Michell\BajasController;
use App\Http\Controllers\Michell\StudentController;
use App\Http\Controllers\Michell\DirectorController;
use App\Http\Controllers\Elizabeth\AdvisorController;
use App\Http\Controllers\Elizabeth\carrerasController;
use App\Http\Controllers\Elizabeth\companiesController;
use App\Http\Controllers\Elizabeth\AcademiesController;
use App\Http\Controllers\Elizabeth\DivisionsController;
use App\Http\Controllers\Pipa\ChangePasswordFirstTime;
use App\Http\Controllers\Michell\StudentListController;
use App\Http\Controllers\Pipa\ChangePasswordController;
use App\Http\Controllers\Michell\AcademicHomeController;
use App\Http\Controllers\Pipa\RecoverPasswordController;
use App\Http\Controllers\Eliud\Reportes\ReportsController;
use App\Http\Controllers\Daniel\DashboardAdvisorController;
use App\Http\Controllers\Michell\AcademicAdvisorController;
use App\Http\Controllers\Daniel\Proyectos\ProjectsController;
use App\Http\Controllers\Daniel\ObservationsController;
use App\Http\Controllers\Daniel\Asesor\ObservationsAcademicAdvisor;
use App\Http\Controllers\Daniel\Asesor\ProjectDraftController;
use App\Http\Controllers\Eliud\Documentos\DocumentsController;
use App\Http\Controllers\Eliud\Reportes\ExcelExportController;
use App\Http\Controllers\Daniel\asesor\ProyectsAdvisorController;
use App\Http\Controllers\Daniel\Director\ProjectsDirectorController;
use App\Http\Controllers\Daniel\Presidenta\ProjectsPresidentController;
use App\Http\Controllers\Michell\Administrator\AdministratorController;
use App\Http\Controllers\Michell\DirectorAssistantController;
use App\Http\Controllers\Michell\PresidentOfTheAcademy\PresidentOfTheAcademy;
use App\Http\Controllers\Michell\PresidentOfTheAcademy\StudentAndAdvisorController;


use Illuminate\Support\Facades\Auth; // Para el sistema de autenticación
use App\Models\User; // Si necesitas acceder a la información del usuario

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
    Route::resource('cambiar-contra', ChangePasswordController::class);

    // Ruta para recuperar contraseña (la que envía el correo)
    Route::resource('recuperar-contra', RecoverPasswordController::class);

    // Ruta que se muestra al iniciar sesión por primera vez / cambiar contraseña por primera vez
    Route::resource('primer-cambio-contra', ChangePasswordFirstTime::class);
});

// Rutas para Usuarios Autenticados
Route::middleware('auth')->group(function () {

    //TODO - ESTUDIANTE
    // Route::prefix('estudiante')->group(function () {

    // ! No muevan esta ruta, ESA ES LA PANTALLA DE INICIO DEL ESTUDIANTE {{studentHome}}
    Route::get('/estudiante', [StudentController::class, "studentHome"])->name('inicio-estudiante')->middleware('role:estudiante');

    //Ruta de la vista del anteproyecto del estudiante
    Route::get('anteproyecto', [ProjectsController::class, 'index'])->name('anteproyecto')->middleware('role:estudiante, ver-anteproyecto');
    // Rutas para el formulario de anteproyectos
    Route::get("anteproyecto/nuevo", [ProjectsController::class, 'create'])->name('formanteproyecto.create')->middleware('roleorcan:estudiante,crear-anteproyecto');
    Route::post("anteproyecto/nuevo", [ProjectsController::class, 'store'])->name('formanteproyecto.store')->middleware('roleorcan:estudiante,crear-anteproyecto');
    Route::get("anteproyecto/edit/{id}", [ProjectsController::class, 'edit'])->name('editAnteproyecto.edit')->middleware('roleorcan:estudiante,editar-anteproyecto');
    Route::put("anteproyecto/edit/{id}", [ProjectsController::class, 'update'])->name('UpdateAnteproyecto.update')->middleware('roleorcan:estudiante,editar-anteproyecto');
    Route::post("/invitar-colaboradores", [ProjectsController::class, 'Colaborar'])->name('invitar.colaboradores')->middleware('roleorcan:estudiante, colaborar-anteproyecto');
    Route::match(['get', 'post'], 'EstatusCambiado', [ProjectsController::class, 'ForRev'])->name('ForRev');
    Route::match(['get', 'post'], 'EstatusAsesoramiento', [ProjectsController::class, 'onAse'])->name('ForAse')->middleware('roleorcan: estudiante, asesorar-anteproyecto');



    //Ruta para las observaciones del estudiante
    Route::get("anteproyecto/observaciones", [ObservationsController::class, "index"])->name('observationsAnteproyecto')->middleware('roleorcan:estudiante,leer-observaciones');
    Route::post("observaciones", [ObservationsController::class, "store"])->name('observationsAnteproyecto.store')->middleware('roleorcan:estudiante, hacer-observaciones');
    Route::post("anteproyecto/observaciones", [ObservationsController::class, "store"])->name('comentarios.guardar')->middleware('roleorcan:estudiantes, responder-observaciones') ;


    // Vista del calendario del estudiante
    Route::get('calendario', [EventController::class, 'calendar'])->name('events.calendar')->middleware('roleorcan:estudiante,leer-calendario');
    //Ruta para ver información de la actividad
    Route::get('actividad/{id}', [EventController::class, 'show'])->name('estudiante-actividades.show')->middleware('roleorcan:estudiante,leer-calendario');

    // Ruta para reprogramar la actividad
    Route::post('actividades/reprogramar/{id}', [EventController::class, 'ReprogramActivity'])->name('actividades.reprogramar')->middleware('roleorcan:asesorAcademico,leer-calendario');

    // Actualmente no lo tengo pero lo ocupare en proximas actualizaciones
    //Ruta para ver información de la actividad
    // Route::get('actividades/{id}', [EventController::class, 'show'])->name('estudiante-actividades.show')->middleware('roleorcan:estudiante,leer-calendario');

    // });

    //TODO - ASESOR ACADEMICO
    // Route::prefix('asesor')->group(function () {

    Route::get('/asesor', [DashboardAdvisorController::class, "index"])->name('inicio-asesor')->middleware('role:asesorAcademico');

    Route::get('anteproyectos', [ProyectsAdvisorController::class, "index"])->name('anteproyectos-asesor')->middleware('roleorcan:asesorAcademico,leer-anteproyectos-asignados');
    Route::get('anteproyecto/{id} ', [ProjectDraftController::class, 'index'])->name('anteproyecto-Asesor.index')->middleware('roleorcan:asesorAcademico,leer-anteproyecto-detalle');

    //Ruta de los alumnos del asesor
    Route::post('estudiantess/busqueda', [AcademicAdvisorController::class, 'search'])->name('student.search')->middleware('roleorcan:asesorAcademico,leer-estudiantes-asignados');

    Route::get('/alumnos', [AcademicAdvisorController::class, 'asesoradosIndex'])->name('asesorados')->middleware('roleorcan:asesorAcademico,leer-estudiantes-asignados');
    Route::put("alumno/edit/{id}", [AcademicAdvisorController::class, 'student_withdrawal'])->name('alumno.edit')->middleware('roleorcan:asesorAcademico,leer-estudiantes-asignados');
    Route::put('/Generate/SancionView/{id}', [ReportsController::class, 'printReportSancion'])->name('download.sancion')->middleware('roleorcan:asesorAcademico,generar-reportes-documentos');
    Route::get('/Generate/MemoriaView/{id}', [ReportsController::class, 'printReportCartaAprobacion'])->name('download.aprobacion')->middleware('roleorcan:asesorAcademico,generar-reportes-documentos');
    Route::post('/Generate/AprobacionView/{id}', [ReportsController::class, 'printReportCartaDigitalizacion'])->name('download.digitalizacion')->middleware('roleorcan:asesorAcademico,generar-reportes-documentos');

    // ! Ruta de las observaciones del asesor
    Route::get("observaciones/asesor/{id}", [ObservationsAcademicAdvisor::class, "index"])->name('observationsAnteproyectoA')->middleware('roleorcan:asesorAcademico, leer-observaciones-asesor');
    Route::put('observaciones/asesor/{id}/update', [ObservationsAcademicAdvisor::class, 'update'])->name('observations.update')->middleware('roleorcan:asesorAcademico, actualizar-observaciones');
    Route::post('anteproyecto/{id}/store', [ProjectDraftController::class, 'store'])->name('anteproyecto-Asesor.store')->middleware('roleorcan:asesorAcademico,');
    Route::post('anteproyecto/{id}/storeLike', [ProjectDraftController::class, 'storeLike'])->name('anteproyecto-Asesor.storeLike')->middleware('roleorcan:asesorAcademico,votar-anteproyecto');
    //Route::post('anteproyecto/{id}', [ProjectDraftController::class, 'store'])->name('anteproyecto-Asesor.store')->middleware('roleorcan:asesorAcademico,votar-anteproyecto');
    Route::match(['get', 'post'], 'CambiarEstatus', [ProjectDraftController::class, 'OnRev'])->name('OnRev')->middleware('roleorcan:asesorAcademico, publicar-anteproyecto');
    Route::post('anteproyecto/{id}/deleteLike', [ProjectDraftController::class, 'deleteLike'])->name('anteproyecto-Asesor.deleteLike')->middleware('roleorcan:asesorAcademico,votar-anteproyecto');
    // Ruta para el crud de actividades
    Route::resource('actividades', EventController::class)->names('actividades')->middleware('roleorcan:asesorAcademico,leer-calendario');

    // Ruta para la vista del calendario del asesor
    Route::get('calendario', [EventController::class, 'calendar'])->name('events.calendar')->middleware('roleorcan:asesorAcademico,leer-calendario');

    // Ruta para cancelar la actividad
    Route::post('actividades/cancelar/{id}', [EventController::class, 'cancelActivity'])->name('actividades.cancel')->middleware('roleorcan:asesorAcademico,leer-calendario');

    // Ruta para reprogramar la actividad
    Route::post('actividades/reprogramar/{id}', [EventController::class, 'ReprogramActivity'])->name('actividades.reprogramar')->middleware('roleorcan:asesorAcademico,leer-calendario');

    // Ruta para generar el control de estadías propio
    Route::get('control/{id}', [ExcelExportController::class, 'downloadExcelFile'])->name('download.control')->middleware('role:asesorAcademico');


    //TODO - PRESIDENTE DE ACADEMIA
    // Route::prefix('presidente')->group(function () {

    //inicio de presidente 
    Route::get('/presidente', [PresidentOfTheAcademy::class, "index"])->name('inicio-presidente')->middleware('role:presidenteAcademia');

    //Ruta de la lista de los anteproyectos
    Route::get('anteproyectos-division', [ProjectsPresidentController::class, 'index'])->name('anteproyectos-presidente')->middleware('role:presidenteAcademia, lista-anteproyectos');
    Route::get("observaciones", [ProjectsPresidentController::class, "index"])->name('observationsAnteproyectoP')->middleware('role:presidenteAcademia, observaciones-rpresidente');
    Route::get('anteproyecto/president/{id}', [ProjectsPresidentController::class, 'store'])->name('anteproyecto-President.store')->middleware('role:presidenteAcademia');
    Route::post('anteproyecto/president/{id}', [ProjectsPresidentController::class, 'store'])->name('anteproyecto-President.store');
    Route::post('anteproyecto/{id}/presidentLike', [ProjectsPresidentController::class, 'storeLike'])->name('anteproyecto-President.storeLike');
    Route::post('anteproyecto/{id}/presidentDeleteLike', [ProjectsPresidentController::class, 'deleteLike'])->name('anteproyecto-President.deleteLike');
    Route::get('anteproyecto/president/{id}', [ProjectsPresidentController::class, 'view'])->name('anteproyecto-President.view');
    Route::post('/cambiar-estado-proyectos', [ProjectsPresidentController::class, 'cambiarEstadoProyectos'])->name('cambiar.estado.proyectos');


    Route::get("observaciones/presidente/{id}", [ObservationsAcademicAdvisor::class, "index"])->name('observationsAnteproyectoPresi');
    Route::put('observaciones/presidente/{id}/update', [ObservationsAcademicAdvisor::class, 'update'])->name('observations.updatePresidente');
    Route::resource('/estudiantes-division', StudentAndAdvisorController::class)->names('presidente')->middleware('roleorcan:presidenteAcademia,leer-estudiantes');

    //CRUD ASESOR ACADÉMICO 
    // Todos los asesores
    Route::get('/lista-asesores', [PresidentOfTheAcademy::class, 'AdvisorList'])->name('lista-asesores')->middleware('roleorcan:presidenteAcademia,leer-asesores-academicos');
    // Crear asesor
    Route::get('/crear-asesores', [PresidentOfTheAcademy::class, 'create'])->name('asesores.create')->middleware('roleorcan:presidenteAcademia,crear-asesores-academicos');
    // guardar asesor
    Route::post('/crear-asesores', [PresidentOfTheAcademy::class, 'store'])->name('asesores.create')->middleware('roleorcan:presidenteAcademia,crear-asesores-academicos');
    // editar asesor
    Route::get('/editar-asesor/{id}', [PresidentOfTheAcademy::class, 'edit'])->name('asesores.update')->middleware('roleorcan:presidenteAcademia,editar-asesores-academicos');
    // Actualizar asesor
    Route::put('/editar-asesor/{id}', [PresidentOfTheAcademy::class, 'update'])->name('asesores.update')->middleware('roleorcan:presidenteAcademia,editar-asesores-academicos');
    // Eliminar asesor
    Route::delete('/lista-asesores/{id}', [PresidentOfTheAcademy::class, 'destroy'])->name('asesores.destroy')->middleware('roleorcan:presidenteAcademia,eliminar-asesores-academicos');

    // });

    //TODO - DIRECTORA

    //inicio director
    Route::get("/director", [DirectorController::class, "index"])->name('inicio-director')->middleware('role:director');

    // El apartado de reportes para la directora 
    // comentado pq comparte ruta con el de asistente

    // El acceso al CRUD/Listado de documentos para la directora
    Route::resource('/director/documentos', DocumentsController::class)->names('documentos-director')->middleware('roleorcan:director,gestionar-documentos');

    // Las rutas para la generación de archivos de la directora
    Route::get('exportar', [ExcelExportController::class, 'generateExcelFormatFile'])->middleware('roleorcan:director,generar-reportes-documentos');
    Route::get('/Download/Sancion', [ReportsController::class, 'printSansion'])->name('cata.aprobacion')->middleware('roleorcan:director,generar-reportes-documentos');
    Route::get('/Download/CartaMemoria', [ReportsController::class, 'printCartaMemoria'])->name('cata.aprobacion')->middleware('roleorcan:director,generar-reportes-documentos');
    Route::get('/Download/CartaAprobacion', [ReportsController::class, 'printCartaAprobacion'])->name('cata.aprobacion')->middleware('roleorcan:director,generar-reportes-documentos');
    Route::get('/d-generar/{id}', [ExcelExportController::class, 'downloadExcelFile'])->name('re-download.control.director');
    Route::post('/d-Generate/SancionView/{id}/{type?}/{reason?}', [ReportsController::class, 'printReportSancion'])->name('re-download.sancion.director');
    Route::get('/d-Generate/MemoriaView/{id}', [ReportsController::class, 'printReportCartaAprobacion'])->name('re-download.aprobacion.director');
    Route::get('/d-Generate/AprobacionView/{id}', [ReportsController::class, 'printReportCartaDigitalizacion'])->name('re-download.digitalizacion.director');
    Route::put('/docRevision/{id}', [DocumentsController::class, 'UpdateDocRevision'])->name('docRevision.update');

    Route::get("observaciones/directora/{id}", [ObservationsAcademicAdvisor::class, "index"])->name('observationsAnteproyectoDire');
    Route::put('observaciones/directora/{id}/update', [ObservationsAcademicAdvisor::class, 'update'])->name('observations.updateDirectora');
    //Ruta de la lista de los anteproyectos
    Route::get('director/anteproyectos', [ProjectsDirectorController::class, 'index'])->name('director-anteproyectos')->middleware('roleorcan:director,');
    Route::get('director/anteproyectos/{id}', [ProjectsDirectorController::class, 'view'])->name('director-anteproyectos.view')->middleware('roleorcan:director,');
    Route::post('director/anteproyecto/{id}/storeLike', [ProjectsDirectorController::class, 'storeLike'])->name('anteproyecto-Director.storeLike')->middleware('roleorcan:director,');
    Route::post('director/anteproyecto/{id}/deleteLike', [ProjectsDirectorController::class, 'deleteLike'])->name('anteproyecto-Director.deleteLike')->middleware('roleorcan:director,');
    Route::post('director/anteproyecto/{id}/store', [ProjectsDirectorController::class, 'store'])->name('anteproyecto-Director.store');
    //Route::get('/Download/SancionView/{id}', [ReportsController::class, 'printReportSancion'])->name('download.sancion-f')->middleware('roleorcan:director,generar-reportes-documentos');
    //Route::get('/Download/MemoriaView/{id}', [ReportsController::class, 'printReportCartaAprobacionMemoria'])->name('download.aprobacion-f')->middleware('roleorcan:director,generar-reportes-documentos');
    //Route::get('/Download/AprobacionView/{id}', [ReportsController::class, 'printReportCartaDigitalizacionMemoria'])->name('download.digitalizacion-f')->middleware('roleorcan:director,generar-reportes-documentos');

    Route::get('estudiantes', [StudentListController::class, 'index'])->name('estudiantes')->middleware('roleorcan:director,leer-estudiantes');

    Route::post('documentos/busqueda', [DocumentsController::class, 'search'])->name('docs.search')->middleware('roleorcan:director,gestionar-documentos');
    Route::delete('d-documentos/delete/{id}', [DocumentsController::class, 'destroy'])->name('docs.destroy-director');

    //bajas
    Route::get('bajas', [BajasController::class, "index"])->name('bajas-director')->middleware('roleorcan:director,leer-bajas');


    //TODO - Asistente directora
    // Route::prefix('asistente')->group(function () {

    //inicio asistente
    Route::get("/asistente", [DirectorAssistantController::class, "index"])->name('inicio-asistente')->middleware('role:asistenteDireccion');

    //crud asistente // comparte con estudiante
    // Route::get('estudiantes',[StudentListController::class, "index"])->name('estudiantes-asistente')->middleware('role:asistenteDireccion');

    //bajas 
    Route::get('bajas', [BajasController::class, "index"])->name('bajas-asistente')->middleware('roleorcan:asistenteDireccion,leer-bajas');

    // Con esta se accede a la pantalla assistantsReports
    Route::get('/reportes', [ReportsController::class, "directorIndex"])->name('reportes-director')->middleware('roleorcan:asistenteDireccion,generar-reportes-documentos');
    // Con esta se accede al CRUD/Listado de los documentos generados
    Route::resource('documentos', DocumentsController::class)->names('documentos-asistente')->middleware('roleorcan:asistenteDireccion,gestionar-documentos');

    // Esas tres generan los formatos de las cartas hasta ahora
    Route::get('Download/Sancion', [ReportsController::class, 'printSansion'])->name('cata.sancion')->middleware('roleorcan:asistenteDireccion,generar-reportes-documentos');
    Route::get('Download/CartaMemoria', [ReportsController::class, 'printCartaMemoria'])->name('cata.digitalizacion')->middleware('roleorcan:asistenteDireccion,generar-reportes-documentos');
    Route::get('Download/CartaAprobacion', [ReportsController::class, 'printCartaAprobacion'])->name('cata.aprobacion')->middleware('roleorcan:asistenteDireccion,generar-reportes-documentos');
    Route::get('exportar', [ExcelExportController::class, 'generateExcelFormatFile'])->middleware('roleorcan:asistenteDireccion,generar-reportes-documentos');
    Route::get('donaciones', [ExcelExportController::class, 'downloadLibrosFile'])->middleware('roleorcan:asistenteDireccion, generar-reportes-documentos')->name('control-libros');
    Route::post('egresados', [ExcelExportController::class, 'downloadEgresadosFile'])->middleware('roleorcan:asistenteDireccion, generar-reportes-documentos')->name('control-egresados');
    Route::get('/a-generar/{id}', [ExcelExportController::class, 'downloadExcelFile'])->name('re-download.control.asistente');
    Route::post('/a-Generate/SancionView/{id}/{type?}/{reason?}', [ReportsController::class, 'printReportSancion'])->name('re-download.sancion.asistente');
    Route::get('/a-Generate/MemoriaView/{id}', [ReportsController::class, 'printReportCartaAprobacion'])->name('re-download.aprobacion.asistente');
    Route::get('/a-Generate/AprobacionView/{id}', [ReportsController::class, 'printReportCartaDigitalizacion'])->name('re-download.digitalizacion.asistente');

    // Ruta para el crud de libros
    Route::resource('libros', BooksController::class)->names('libros-asistente')->middleware('roleorcan:asistenteDireccion,leer-lista-libros');

    // Ruta para el filtrado de libros (Igual podria quitarse aun no estoy seguro)
    Route::get('/buscar/libros', [BooksController::class, 'searchBooks'])->name('search.books');

    Route::get('/Download/SancionView/{id}', [ReportsController::class, 'printReportSancion'])->name('download.sansion')->middleware('roleorcan:asistenteDireccion,generar-reportes-documentos');
    Route::get('/Download/MemoriaView/{id}', [ReportsController::class, 'printReportCartaMemoria'])->name('download.memoria')->middleware('roleorcan:asistenteDireccion,generar-reportes-documentos');
    Route::get('/Download/AprobacionView/{id}', [ReportsController::class, 'printReportCartaAprobacion'])->name('download.aprobacion')->middleware('roleorcan:asistenteDireccion,generar-reportes-documentos');

    // Rutas para el listado de documentos
    // Route::post('documentos/busqueda', [DocumentsController::class, 'search'])->name('docs.search')->middleware('roleorcan:asistenteDireccion,gestionar-documentos');
    Route::delete('documentos/delete/{id}', [DocumentsController::class, 'destroy'])->name('docs.destroy-assistant');

    // });


    //TODO - Administrador

    // inicio admin
    Route::resource('admin', AdministratorController::class)->names('admin')->middleware('role:admin');
    
    // CRUD de Grupos
    Route::resource('panel-groups', GroupController::class)->names('panel-groups')->middleware('roleorcan:admin,crud-usuarios');
    
    // CRUD de Usuarios
    Route::resource('panel-users', UserController::class)->names('panel-users')->middleware('roleorcan:admin,crud-usuarios');

    // BUSQUEDA DE USUARIOS
    Route::get('/search/groups', [GroupController::class, 'searchGroups'])->name('search.groups');

    // BUSQUEDA DE GRUPOS
    Route::get('/search/users', [UserController::class, 'searchUsers'])->name('search.users');
    
    // BUSQUEDA DE ROLES
    Route::get('/search/roles', [UserController::class, 'searchRoles'])->name('search.roles');

    // BUSQUEDA DE COMPAÑIAS
    Route::get('/search/companies', [companiesController::class, 'searchCompany'])->name('search.company');

    // BUSQUEDA DE ASESOR EMPRESARIAL
    Route::get('/search/businessAdvisors', [AdvisorController::class, 'searchBusinessAdvisors'])->name('search.advisors');

    // CRUD de Roles
    Route::resource('panel-roles', RoleController::class)->names('panel-roles')->middleware('roleorcan:admin,crud-roles-permisos');

    // Rutas para CRUD de Empresas
    Route::resource('/panel-companies', CompaniesController::class)->names(['index' => 'companies.index'])->middleware('roleorcan:admin,crud-empresas');
   

    // RUTAS PARA EL CRUD SE ASESORES EMPRESARIALES
    Route::resource('/panel-advisors', AdvisorController::class)->names('panel-advisors')->middleware('roleorcan:admin,crud-asesores');



    // Rutas para CRUD de Carreras y Academias
    Route::resource('/panel-careers', carrerasController::class)->names('panel-careers')->middleware('roleorcan:admin,crud-carreras-divisiones');
    Route::resource('/panel-divisions', DivisionsController::class)->names('panel-divisions')->middleware('roleorcan:admin,crud-carreras-divisiones');
    Route::resource('/panel-academies', AcademiesController::class)->names('panel-academies')->middleware('roleorcan:admin,crud-carreras-divisiones');
   
    // ! PERFIL
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');


    Route::get('/search/careers', [carrerasController::class, 'searchCareers'])->name('search.careers');
    Route::get('/search/academies', [AcademiesController::class, 'searchAcademies'])->name('search.academies');
    Route::get('/search/divisions', [DivisionsController::class, 'searchDivisions'])->name('search.divisions');
    
});


require __DIR__ . '/auth.php';

    // Route::get('/perfil', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/perfil', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/perfil', [ProfileController::class, 'destroy'])->name('profile.destroy');
