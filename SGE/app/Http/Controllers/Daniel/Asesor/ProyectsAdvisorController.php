<?php

namespace App\Http\Controllers\Daniel\asesor;

use App\Http\Controllers\Controller;
use App\Models\AcademicAdvisor;
use App\Models\Academy;
use App\Models\Career;
use App\Models\Intern;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProyectsAdvisorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();
        $academicAdvisor = User::find($userId)->academicAdvisor;
        $projectsAdvisor = Intern::where('academic_advisor_id', $academicAdvisor->id)
            ->with('project.adviser')
            ->get()
            ->map(function ($intern) {
                return $intern->project;
            })
            ->filter(function ($project) {
                return $project && in_array(strtolower($project->status), ['aprobado', 'en revision', 'asesoramiento']);
            });

        $AdvisorCareer = User::find($userId)->academicAdvisor->career->id;
        $academyId  = Career::find($AdvisorCareer)->academy_id;
        $divisionId = Academy::find($academyId)->division->id;

        // Obtener todos los proyectos asociados a la misma división que el asesor académico
        $projects = Project::whereHas('interns', function ($query) use ($divisionId) {
            $query->whereHas('career', function ($query) use ($divisionId) {
                $query->whereHas('academy', function ($query) use ($divisionId) {
                    $query->where('division_id', $divisionId);
                });
            });
        })
        ->whereIn('status', ['aprobado', 'en revision'])
        ->with([
            'adviser',
            'interns.user',
            'interns.academicAdvisor.user' // Cargar la relación para obtener el nombre del asesor académico
        ])
        ->paginate(10);
        dd($projects);

        return view('Daniel.asesor.ProyectsAdvisor')->with(['projects' => $projects, 'projectsAdvisor' => $projectsAdvisor]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
