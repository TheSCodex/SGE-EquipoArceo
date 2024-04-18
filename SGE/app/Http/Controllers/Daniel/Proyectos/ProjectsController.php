<?php

namespace App\Http\Controllers\Daniel\Proyectos;

use App\Notifications\ProyectoEditado;
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
use Illuminate\Support\Facades\Gate;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //if (Gate::denies('ver-anteproyecto')) {
        //    abort(403, 'No tienes permiso para acceder a esta sección.');
        //}
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

        //dd($intern);

        return view('Daniel.Projects.ProjectView', compact('comments', 'project', 'company', 'businessAdvisor', 'DirCommenters', 'PrezCommenters', 'AdvCommentersNames', 'InternCommenters', 'intern', 'interns', 'user', 'career', 'division', 'userIds', 'AdvCommenters'));
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
        if (Gate::denies('crear-anteproyecto')) {
            abort(403, 'No tienes permiso para acceder a esta sección.');
        }
        $user = auth()->user();
        $intern = Intern::where('user_id', $user->id)->first();
        $divisionId = $intern->career->academy->division_id;
        $division = Division::find($divisionId);

        $interns = Intern::whereHas('career.academy.division', function ($query) use ($divisionId) {
            $query->where('id', $divisionId);
        })->where('user_id', '!=', $user->id)->get();
        //dd($interns);

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
        if (Gate::denies('crear-anteproyecto')) {
            abort(403, 'No tienes permiso para acceder a esta sección.');
        }
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
                'career_id' => $validatedData['proyecto_educativo'],
                'business_advisor_id' => $businessAdvisor->id,
            ]);
        } else {
            $intern->performance_area = $validatedData['position_student'];
            $intern->Group = $validatedData['Group'];
            $intern->project_id = $project->id;
            $intern->career_id = $validatedData['proyecto_educativo'];
            $intern->business_advisor_id = $businessAdvisor->id;
        }
        $intern->save();

        $user = User::where('id', $userId)->first();
        $user->phoneNumber = $validatedData['Numero'];
        $user->save();

        $project->adviser_id = $businessAdvisor->id;
        $project->save();

        $intern->business_advisor_id = $businessAdvisor->id;
        $intern->save();

        
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
        if (Gate::denies('editar-anteproyecto')) {
            abort(403, 'No tienes permiso para acceder a esta sección.');
        }
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
        if (Gate::denies('editar-anteproyecto')) {
            abort(403, 'No tienes permiso para acceder a esta sección.');
        }

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

        $businessAdvisor = BusinessAdvisor::findOrFail($project->adviser_id);
        $businessAdvisor->update([
            'name' => $validatedData['name_advisor'],
            'email' => $validatedData['email_advisor'],
            'phone' => $validatedData['Phone_advisor'],
            'position' => $validatedData['advisor_position'],
        ]);

        if ($businessAdvisor->company) {
            // Actualizar el modelo Company
            $businessAdvisor->company->update([
                'name' => $validatedData['name_enterprise'],
                'address' => $validatedData['direction_enterprise'],
            ]);
        }

        $intern = Intern::where('project_id', $project->id)->first();
        $intern->update([
            'performance_area' => $validatedData['position_student'],
            'group' => $validatedData['Group']
        ]);


        $advisorId = AcademicAdvisor::where('id', $intern->academic_advisor_id)->first();
        if ($advisorId) {
            // $advisorId no es nulo, por lo tanto, podemos continuar con la lógica
            $advisor = User::find($advisorId->user_id);
            $student = User::find($intern->user_id);
            $notification = $advisor->notify(new ProyectoEditado($student->name));
        }

        // Send the notification to the user
        return redirect('/anteproyecto')->with('Edit', 'Proyecto actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
