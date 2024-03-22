<?php

namespace App\Http\Controllers\Michell;

use App\Http\Controllers\Controller;
use App\Models\AcademicAdvisor;
use App\Models\Intern;
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

    public function asesoradosIndex()
    {
        $userId = auth()->user()->id;    
        $academicAdvisor = AcademicAdvisor::where('user_id', $userId)->first();    
        if ($academicAdvisor) {
            $interns = Intern::where('academic_advisor_id', $academicAdvisor->id)->get();            
            return view('michell.academicadvisor.alumnosAsesor', compact('interns'));
        }    
        return null;
    }
    
}
