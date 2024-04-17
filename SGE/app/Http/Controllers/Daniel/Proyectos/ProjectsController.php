<?php

namespace App\Http\Controllers\Daniel\Proyectos;


use App\Models\AcademicAdvisor;
use App\Models\Academy;
use App\Models\BusinessSector;
use App\Notifications\CollabInvitation;
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
use App\Notifications\ProyectoEnRevision;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

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
            return view('Daniel.Projects.ProjectView');
        }

        $project = Project::find($intern->project_id);

        if (!$project) {
            return view('Daniel.Projects.ProjectView');
        }

        if ($project->adviser_id) {
            $businessAdvisor = BusinessAdvisor::find($project->adviser_id);
            //dd($project);
            if ($businessAdvisor) {
                $company = Company::find($businessAdvisor->companie_id);
                $area = BusinessSector::find($company->business_sector_id);
                //dd($company);
            }
        }

        $user = User::where("id", $userId)->first();
        // dd($user);

        $comments = Comment::where("project_id", $intern->project_id)->get();
        
        $DirIds = $comments->pluck('director_id')->toArray();
        $DirCommenters = User::whereIn("id", $DirIds)->get();

        $PrezIds = $comments->pluck('president_id')->toArray();
        $PrezCommenters = User::whereIn("id", $PrezIds)->get();

        $AdvIds = $comments->pluck('academic_advisor_id')->toArray();
        $AdvCommenters = AcademicAdvisor::whereIn("id", $AdvIds)->get();
        $userIds = $AdvCommenters->pluck('user_id')->toArray();
        $AdvCommentersNames = User::whereIn("id", $userIds)->get();

        $InternIds = $comments->pluck('interns_id')->toArray();
        $InternCommenters = User::whereIn("id", $InternIds)->get();

        $career = Career::where("id", $intern->career_id)->first();
        if (!$career || !$career->academy_id) {
        $userIds = $AdvCommenters->pluck('user_id')->toArray();
        return view('Daniel.Projects.ProjectView', compact('project', 'company', 'businessAdvisor', 'comments', 'DirCommenters', 'PrezCommenters', 'AdvCommentersNames', 'InternCommenters', 'interns', 'user', 'area','userIds','AdvCommenters'));
        }

        $academy = Academy::where("id", $career->academy_id)->first();
        $division = Division::where("id", $academy->division_id)->first();

        return view('Daniel.Projects.ProjectView', compact('comments', 'project', 'company', 'businessAdvisor', 'DirCommenters', 'PrezCommenters', 'AdvCommentersNames', 'InternCommenters', 'interns', 'user', 'career', 'division', 'area', 'userIds', 'AdvCommenters'));
    }

    public function ForRev(request $id)
    {
        Project::where('id', $id->id)->update(['status' => 'Asesoramiento']);
        return redirect()->back()->with('success', 'Anteproyecto ahora asesoramiento.');
    }

    public function Colaborar(Request $request)
    {
        $user = auth()->user();
        $intern = $user->intern;
        $ProjectId = $intern->project_id;
    }

    public function DeleteCollab(Request $request, $id)
    {
        $notification = DatabaseNotification::find($id);
        $notification->delete();
        return redirect()->back()->with('droppped', 'Notificacion eliminada con exito.');
    }
    public function AcceptCollab(Request $request, $id)
    {
        $userId = Auth::id();
        $notification = DatabaseNotification::find($id);
        Intern::where('user_id', $userId)->update(['project_id'=>$notification->data['idProject']]);
        $notification->delete();
        return redirect()->back()->with('droppped', 'Notificacion eliminada con exito.');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();
        $intern = Intern::where('user_id', $user->id)->first();
        $divisionId = $intern->career->academy->division_id;
        $division = Division::find($divisionId);

        $interns = Intern::whereHas('career.academy.division', function ($query) use ($divisionId) {
            $query->where('id', $divisionId);
        })->where('user_id', '!=', $user->id)->get();

        $careersDivision = $division->academies->flatMap(function ($academy) {
            return $academy->careers;
        });

        $divisions = Division::all();
        // Construye un array asociativo para la opción predeterminada
        $defaultDivision = [$division->id => $division->name];
        // Construye un array asociativo para la opción predeterminada
        $defaultCareer = [$intern->career->id => $intern->career->name];
        

        return view('daniel.formanteproyecto', compact('user', 'intern', 'divisions', 'careersDivision', 'defaultCareer', 'defaultDivision', 'interns'));
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
            'end_date' => $validatedData['Fecha_Final'],
            'status' => 'Borrador',
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
                'career_id' => $validatedData['proyecto_educativo']
            ]);
        } else {
            $intern->performance_area = $validatedData['position_student'];
            $intern->Group = $validatedData['Group'];
            $intern->project_id = $project->id;
            $intern->career_id = $validatedData['proyecto_educativo'];
        }
        $intern->save();

        // $user = auth()->user();
        // $user->phoneNumber = $validatedData['Numero'];
        // $user->save();

        $project->adviser_id = $businessAdvisor->id;
        $project->save();

        
        if($request->selectedIds){
            $idString = explode(',', $request->selectedIds);
            foreach ( $idString as $id){
                $member = User::find($id);
                $notification = $member->notify(new CollabInvitation($project));
            };
            dd($project);
        }

        $businessAdvisor->companie_id = $company->id;
        $businessAdvisor->save();

        $selectedIds = $request->input('selectedIds');



        return redirect('/anteproyecto')->with('Created', 'Proyecto creado correctamente');
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
            return redirect()->route('/anteproyecto')->with('error', 'Proyecto no encontrado.');
        }

        $businessAdvisor = BusinessAdvisor::findOrFail($project->adviser_id);
        $company = Company::findOrFail($businessAdvisor->companie_id);
        $intern = Intern::where('project_id', $project->id)->first();
        $user = auth()->user();

        $divisionId = $intern->career->academy->division_id;
        $division = Division::find($divisionId);
        $careersDivision = $division->academies->flatMap(function ($academy) {
            return $academy->careers;
        });

        $divisions = Division::all();
        $defaultDivision = [$division->id => $division->name];
        $defaultCareer = [$intern->career->id => $intern->career->name];

        return view('daniel.editAnteproyecto', compact('project', 'businessAdvisor', 'company', 'intern', 'user', 'divisions', 'careersDivision', 'defaultDivision', 'defaultCareer'));
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
        return redirect('/anteproyecto')->with('success', 'Proyecto actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
