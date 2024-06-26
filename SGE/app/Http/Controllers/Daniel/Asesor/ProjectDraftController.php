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
        $CurrentUser = $userId;
        $AcadAdvi = AcademicAdvisor::where("user_id", $userId)->first();
        
        
        $interns = Intern::where("project_id", $id->id)->first();
        //dd($interns);
        
        if(!$interns){
            return view('Daniel.asesor.AcademicAdvisorProjectDraft');
        }
        
        $projectId = $id->id;
        $project = Project::find($projectId);

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
        
        $DirIds = $comments->pluck('director_id')->toArray();
        $DirCommenters = User::whereIn("id", $DirIds)->get();

        $PrezIds = $comments->pluck('president_id')->toArray();
        $PrezCommenters = User::whereIn("id", $PrezIds)->get();

        $AdvIds = $comments->pluck('academic_advisor_id')->toArray();
        $AdvCommenters = AcademicAdvisor::whereIn("id", $AdvIds)->get();
        $userIds = $AdvCommenters->pluck('user_id')->toArray();
        $AdvCommentersNames = User::whereIn("id", $userIds)->get();

        $InternIds = $comments->pluck('interns_id')->toArray();
        $UserInterns = Intern::whereIn('id', $InternIds)->get();
        $UIIds = $UserInterns->pluck('user_id')->toArray();
        $InternCommenters = User::whereIn("id", $UIIds)->get();
        $project = Project::find($interns->project_id);
        
    
        if (!$project) {
            return view('Daniel.asesor.AcademicAdvisorProjectDraft');
        }
    

        
        $user = User::where("id", $interns->user_id)->first();
        
        // dd($user);

        // $comments = Comment::where("project_id", $intern->project_id)->get();
        // $commenterIds = $comments->pluck('academic_advisor_id')->toArray();
        // $commenters = AcademicAdvisor::whereIn("id", $commenterIds)->get();

        $career = Career::where("id", $interns->career_id)->first();
        
        if(!$career || !$career->academy_id){
            return view('Daniel.asesor.AcademicAdvisorProjectDraft', compact( 'project', 'company', 'businessAdvisor','comments','DirCommenters', 'PrezCommenters', 'AdvCommentersNames', 'InternCommenters','interns' , 'AdvCommenters', 'CurrentUser', 'UserInterns','user'));
        }
        $academy = Academy::where("id", $career->academy_id)->first();
        $division = Division::where("id", $academy->division_id)->first();

        $projectLikes = DB::table('projects_likes')->where('id_academic_advisor', $userId)->where('id_projects', $projectId)->first();
 //Reemplazar tan pronto como haya un modelo
        //dd($division);
        if (!$projectLikes) {
            return view('Daniel.asesor.AcademicAdvisorProjectDraft', compact('project', 'company', 'businessAdvisor', 'comments', 'UserInterns','DirCommenters', 'PrezCommenters', 'AdvCommentersNames', 'InternCommenters', 'interns', 'user','career', 'division', 'userIds','AdvCommenters', 'CurrentUser'));
        } else {
            return view('Daniel.asesor.AcademicAdvisorProjectDraft', compact('comments', 'project', 'company', 'businessAdvisor', 'UserInterns','DirCommenters', 'PrezCommenters', 'AdvCommentersNames', 'InternCommenters', 'interns', 'user', 'career', 'division',  'userIds', 'AdvCommenters', 'CurrentUser'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */

    public function onRev(request $id){
        Project::where('id', $id->id)->update(['status' => 'en revision']);
        return redirect()->back()->with('onRev', 'Anteproyecto ahora en revision.');   
    }

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

        $projectAfter = Project::where('id', $projectId)->first(); //Es para asegurarse que el numero de likes sea el correcto, elimina el riesgo de que algo haya salido mal
        $inReview = Comment::where('project_id', $projectId)->where('status', 'Pendiente')->get();
        $likeCount = $projectAfter->like;

        if($likeCount >= 3 && isset($inReview)){
            Project::where('id', $projectId)->update([
                'status' => 'aprobado',
                'approval date' => DB::raw('now()')
            ]);
        }

        return redirect()->back()->with('liked', 'Like añadido correctamente.');
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
            
            return redirect()->back()->with('disliked', 'Like eliminado correctamente.');
        } else {

            return redirect()->back()->with('error', 'El usuario no ha dado like a este proyecto.');
        }
    }
    public function store(Request $request, Project $id)    {
        $projectId = $id->id;
        // Validar los datos del formulario
        $request->validate([
            'content' => 'required',
        ]);
        // Obtener el ID del usuario logueado
        $userId = Auth::id();

        // Buscar el registro en la tabla academic_advisor donde user_id sea igual al ID del usuario logueado
        $academicAdvisorId = AcademicAdvisor::where('user_id', $userId)->value('id');
        
        // Crear un nuevo comentario
        $comment = new Comment();
        $comment->content = $request->input('content');
        $comment->fecha_hora = Carbon::now(); // Fecha y hora actual
        $comment->status = 1; // Estado del comentario
        $comment->academic_advisor_id = $academicAdvisorId;
        $comment->project_id = $projectId;
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
