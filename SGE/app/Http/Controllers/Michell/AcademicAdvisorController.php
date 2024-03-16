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
        $paginados = Project_division::paginate(10);

        return view('Michell.academicAdvisor.academicAdvisor')->with('datos', $paginados);
    }
}
