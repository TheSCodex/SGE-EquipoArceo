<?php

namespace App\Http\Controllers\Daniel\Proyectos;


use App\Models\AcademicAdvisor;
use App\Models\Academy;
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
        $interns = Intern::where("user_id", $userId)->get();

        
        // dd($intern);
    
        if (!$intern || !$intern->project_id) {
            return view('Daniel.Projects.ProjectView')->with('message', 'No intern record or project ID found.');
        }
    
        $project = Project::find($intern->project_id);
    
        if (!$project) {
            return view('Daniel.Projects.ProjectView')->with('message', 'Project not found.');
        }
    
        if ($project->adviser_id) {
            $businessAdvisor = BusinessAdvisor::find($project->adviser_id);
            //dd($project);
            if ($businessAdvisor) {
                $company = Company::find($businessAdvisor->companie_id);
                //dd($company);
            }
        }
        
        $user = User::where("id", $userId)->first();
        // dd($user);
        $career = Career::where("id", $user->career_id)->first();
        //dd($career);
        $division = Division::where("id", $career->division_id)->first();
        $comments = Comment::where("project_id", $intern->project_id)->get();
        $commenterIds = $comments->pluck('academic_advisor_id')->toArray();
        $commenters = AcademicAdvisor::whereIn("id", $commenterIds)->get();
    
        return view('Daniel.Projects.ProjectView', compact('comments', 'project', 'company', 'businessAdvisor', 'commenters', 'interns','user', 'career','division'));
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

        $userId = auth()->id();
        // Crear y guardar el internado
        $intern = Intern::where('user_id', $userId)->first();

        if (!$intern) {
            $intern = new Intern([
                'user_id' => $userId,
                'performance_area' => $validatedData['position_student'],
                'Group' => $validatedData['Group'],
                'project_id' => $project->id,
            ]);
        } else {
            $intern->performance_area = $validatedData['position_student'];
            $intern->Group = $validatedData['Group'];
            $intern->project_id = $project->id;
        }
        $intern->save();

        // $user->phoneNumber = $validatedData['Numero'];
        // $user->save();
        $user = auth()->user();

        $project->adviser_id = $businessAdvisor->id;
        $project->save();

        $businessAdvisor->companie_id = $company->id;
        $businessAdvisor->save();

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
