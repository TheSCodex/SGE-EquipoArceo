<?php

namespace App\Http\Controllers\Daniel\Proyectos;


use App\Models\AcademicAdvisor;
use App\Models\BusinessSector;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Daniel\AnteproyectoRequest;
use App\Models\BusinessAdvisor;
use App\Models\Career;
use App\Models\Comment;
use App\Models\Company;
use App\Models\Division;
use App\Models\Intern;
use App\Models\Project;
use App\Models\User;
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
        if (!$intern) {
            return view('Daniel.Projects.ProjectView');
        }
        $projectId = $intern->project_id;
        if (!$projectId){
            return view('Daniel.Projects.ProjectView');
        }
        $project = Project::where("id", $projectId)->first();


        $businessSector = null;
        $businessAdvisor = null;
        $company = null;
    
            if ($project->adviser_id) {
                $businessAdvisor = BusinessAdvisor::find($project->adviser_id);
    
                if ($businessAdvisor) {
                    $company = Company::find($businessAdvisor->companie_id);
                    if ($company) {
                        $businessSector = BusinessSector::find($company->business_sector_id);
                }
            }
        }
    
        $comments = Comment::where("project_id", $projectId)->get();
        $commenterIds = $comments->pluck('academic_advisor_id')->toArray();
        $commenters = AcademicAdvisor::whereIn("id", $commenterIds)->get();
    
        return view('Daniel.Projects.ProjectView', compact('comments', 'project', 'company', 'businessAdvisor', 'businessSector', 'commenters'));
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
        $divisions = Division::all();
        $careers = Career::all();
        $user = auth()->user();
        $intern = Intern::where('user_id', $user->id)->first();
        return view('daniel.formanteproyecto', compact('divisions', 'careers', 'user', 'intern'));
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
            'project_justificaction' => $validatedData['Justificacion'],
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
            'Group' => $validatedData['Group']
        ]);
        $intern->save();


        // $user->phoneNumber = $validatedData['Numero'];
        // $user->save();
        $user = auth()->user();


        $intern->project_id = $project->id;
        $intern->user_id = $user->id;
        $intern->save();

        $project->adviser_id = $businessAdvisor->id;
        $project->save();



        $businessAdvisor->companie_id = $company->id;

        return redirect('estudiante/anteproyecto')->with('success', 'Proyecto creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $project = Project::find($id);
        if (!$project) {
            return redirect()->route('estudiante/anteproyecto')->with('error', 'Proyecto no encontrado.');
        }

        $businessAdvisor = BusinessAdvisor::findOrFail($project->adviser_id);
        $company = Company::findOrFail($businessAdvisor->companie_id);
        $intern = Intern::where('project_id', $project->id)->first();
        $user = auth()->user();

        return view('daniel.editAnteproyecto', compact('project', 'businessAdvisor', 'company', 'intern', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnteproyectoRequest $request, $id)
    {
        $project = Project::findOrFail($id);
        $validatedData = $request->validated();

        $project->update([
            'name' => $validatedData['name_proyect'],
            'description' => $validatedData['objetivo_general'],
            'problem_statement' => $validatedData['planteamiento'],
            'project_justificaction' => $validatedData['Justificacion'],
            'activities_to_do' => $validatedData['activities'],
            'start_date' => $validatedData['Fecha_Inicio'],
            'end_date' => $validatedData['Fecha_Final']
        ]);

        if ($project->BusinessAdvisor) {
            $project->BusinessAdvisor->Company()->update([
                'name' => $validatedData['name_enterprise'],
                'address' => $validatedData['direction_enterprise'],
            ]);
        }

        if ($project->BusinessAdvisor) {
            $project->BusinessAdvisor->update([
                'name' => $validatedData['name_advisor'],
                'email' => $validatedData['email_advisor'],
                'phone' => $validatedData['Phone_advisor'],
                'position' => $validatedData['advisor_position'],
            ]);

            // También puedes actualizar la compañía si existe
            if ($project->BusinessAdvisor->companie) {
                $project->BusinessAdvisor->companie->update([
                    'name' => $validatedData['name_enterprise'],
                    'address' => $validatedData['direction_enterprise'],
                ]);
            }
        }

        $intern = Intern::where('project_id', $project->id)->first();
        $intern->update([
            'performance_area' => $validatedData['position_student'],
            'group' => $validatedData['Group']
        ]);
        return redirect('estudiante/anteproyecto')->with('success', 'Proyecto actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
