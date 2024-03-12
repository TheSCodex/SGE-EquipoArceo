<?php

namespace App\Http\Controllers\Michell;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Project_division;

class AcademicAdvisorController extends Controller
{
    public function index()
    {
        // ! Jalo los datos del factory ¡por que no se estan guardando en la base de datos!
        $datos = Project_division::factory()->count(20)->make();
        // ? Este show es para paginar los datos creados en factory OSEA SE VEA BONITO 
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 10;
        // * Aqui ya unimos todo paginado con datos y se va a la vista pero el PAGINADOR NO APARECE POR QUE NO GUARDO DATOS EN LA BD
        $paginados = new LengthAwarePaginator($datos->forPage($currentPage, $perPage), $datos->count(), $perPage, $currentPage);

        return view('Michell.academicAdvisor.academicAdvisor')->with('datos', $paginados);
    }
}
