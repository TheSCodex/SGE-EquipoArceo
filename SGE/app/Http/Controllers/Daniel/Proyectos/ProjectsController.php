<?php

namespace App\Http\Controllers\Daniel\Proyectos;

use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Daniel\AnteproyectoRequest;
use App\Models\BusinessAdvisor;
use App\Models\Company;
use App\Models\Intern;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();
        $intern = Intern::where("user_id", $userId)->first();
        $project = $intern->project_id;
        $data = Json_encode([
            $userId,
            $project
         ]);
        return view('Daniel.Projects.ProjectView', compact('data'));
        

    }
    public function project()
    {
        return view('Daniel.presidenta.project');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('daniel.formanteproyecto');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnteproyectoRequest $request)
    {
        $validatedData = $request->validated();

        $project = new Project([
            'name' => $validatedData['name_proyect'],
            'description' => $validatedData['objetivo_general'],
            'problem_statement' => $validatedData['planteamiento'],
            'project_justification' => $validatedData['Justificacion'],
            'activities_to_do' => $validatedData['activities'],
            'start_date' => $validatedData['Fecha_Inicio'],
            'end_date' => $validatedData['Fecha_Final']
        ]);
        $project->save();
    
        $company = new Company([
            'name' => $validatedData['name_enterprise'],
            'address' => $validatedData['direction_enterprise'],
        ]);
        $company->save();
    
        $businessAdvisor = new BusinessAdvisor([
            'name' => $validatedData['name_advisor'],
            'email' => $validatedData['email_advisor'],
            'phone' => $validatedData['Phone_advisor'],
            'position' => $validatedData['advisor_position'],
        ]);
        $businessAdvisor->save();
    
        // Crear y guardar el internado
        $intern = new Intern([
            'performance_area' => $validatedData['position_student'],
            'group' => $validatedData['Group']
        ]);
        $intern->save();

        $user = auth()->user();

        $intern->project_id = $project->id;
        $intern->user_id = $user->id;
        $intern->save();

        $project->adviser_id = $businessAdvisor->id; 
        $project->save();

        $businessAdvisor->companie_id = $company->id;

        return redirect('/Mi-anteproyecto')->with('success', 'Proyecto creado correctamente');
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
