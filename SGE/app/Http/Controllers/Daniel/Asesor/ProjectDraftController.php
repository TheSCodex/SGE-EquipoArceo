<?php

namespace App\Http\Controllers\Daniel\Asesor;

use App\Http\Controllers\Controller;
use App\Models\Academy;
use Illuminate\Http\Request;
use App\Models\AcademicAdvisor;
use App\Models\BusinessAdvisor;
use App\Models\BusinessSector;
use App\Models\Career;
use App\Models\Division;
use App\Models\Company;
use App\Models\Intern;
use App\Models\Project;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ProjectDraftController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(project $id)
    {   
        $userId = Auth::id();
        $AcadAdvi = AcademicAdvisor::where("user_id", $userId)->first();
        
        $interns = Intern::where("academic_advisor_id", $id->id)->first();
        
        if(!$interns){
            return view('Daniel.asesor.AcademicAdvisorProjectDraft');
        }
        
        $projectId = $id->id;
        $project = Project::find($projectId);

        $businessSector = null;
        $businessAdvisor = null;
        $company = null;
    
        if ($project->adviser_id) {
            $businessAdvisor = BusinessAdvisor::find($project->adviser_id);
            //dd($project);
            if ($businessAdvisor) {
                $company = Company::find($businessAdvisor->companie_id);
                //dd($company);
            }
        }
    
        $comments = Comment::where("project_id", $projectId)->get();
        $commenterIds = $comments->pluck('academic_advisor_id')->toArray();
        $commenters = AcademicAdvisor::whereIn("id", $commenterIds)->get();    

        $project = Project::find($interns->project_id);
    
        if (!$project) {
            return view('Daniel.Projects.ProjectView');
        }
    

        
        $user = User::where("id", $interns->user_id)->first();
        
        // dd($user);

        // $comments = Comment::where("project_id", $intern->project_id)->get();
        // $commenterIds = $comments->pluck('academic_advisor_id')->toArray();
        // $commenters = AcademicAdvisor::whereIn("id", $commenterIds)->get();

        $career = Career::where("id", $interns->career_id)->first();
        
        if(!$career || !$career->academy_id){
            return view('Daniel.Projects.ProjectView', compact( 'project', 'company', 'businessAdvisor','comments','commenters','interns','user'));
        }
        $academy = Academy::where("id", $career->academy_id)->first();
        $division = Division::where("id", $academy->division_id)->first();

        $projectLikes = DB::table('projects_likes')->where('id_academic_advisor', $userId)->first(); //Reemplazar tan pronto como haya un modelo
        
        if (!$projectLikes) {
            return view('Daniel.asesor.AcademicAdvisorProjectDraft', compact('comments', 'project', 'company', 'businessAdvisor', 'commenters', 'interns', 'user', 'career', 'division'));
        } else {
            return view('Daniel.asesor.AcademicAdvisorProjectDraft', compact('comments', 'project', 'company', 'businessAdvisor', 'commenters', 'interns', 'user', 'career', 'division', 'projectLikes'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */

    public function storeLike(project $id){
        $userId = Auth::id();
        $projectId = $id->id;
        $project = Project::where('id', $projectId)->first();
        
        
        DB::table('projects_likes')->insert([
            'id_academic_advisor' => ($userId),
            'id_projects' => ($projectId),
        ]);
        if(!$project->like){
            Project::where('id', $projectId)->update(['like' => 0]);
        }
        Project::where('id', $projectId)->increment('like');
        return redirect()->back()->with('success', 'Like añadido correctamente.');
    }

    public function deleteLike(Project $id)
    {
        $userId = Auth::id();
        $projectId = $id->id;
        
        // Check if the user has already liked the project
        $existingLike = DB::table('projects_likes')
                            ->where('id_academic_advisor', $userId)
                            ->where('id_projects', $projectId)
                            ->first();
        
        // If the user has already liked the project, delete the like
        if ($existingLike) {
            DB::table('projects_likes')
                ->where('id_academic_advisor', $userId)
                ->where('id_projects', $projectId)
                ->delete();
            
            // Decrement the like count for the project
            Project::where('id', $projectId)->decrement('like');
            
            return redirect()->back()->with('success', 'Like eliminado correctamente.');
        } else {

            return redirect()->back()->with('error', 'El usuario no ha dado like a este proyecto.');
        }
    }
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'content' => 'required',
        ]);
        $academicAdvisorId = Auth::id();
        $projectId = $request->input('project_id');

        // Obtener el ID del intern relacionado con el proyecto
        $internId = Intern::where('project_id', $projectId)->value('id');

        // Crear un nuevo comentario
        $comment = new Comment();
        $comment->content = $request->input('content');
        $comment->fecha_hora = Carbon::now(); // Fecha y hora actual
        $comment->status = 1; // Estado del comentario
        $comment->academic_advisor_id = $academicAdvisorId;
        $comment->project_id = $projectId;
        $comment->interns_id = $internId;
        $comment->save();

        // Redirigir a la página anterior o a donde desees
        return redirect()->back()->with('success', 'Comentario añadido correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    // Métodos adicionales como create, edit, update, destroy, etc.
}
