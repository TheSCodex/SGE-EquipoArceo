<?php

namespace App\Http\Controllers\Daniel\Director;

use App\Http\Controllers\Controller;
use App\Models\AcademicAdvisor;
use App\Models\Academy;
use App\Models\BusinessAdvisor;
use App\Models\BusinessSector;
use App\Models\Career;
use App\Models\Comment;
use App\Models\Company;
use App\Models\Division;
use App\Models\Intern;
use App\Models\Project;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectsDirectorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::with('adviser')->paginate(10);
        return view('daniel.directorAcademy.projects')->with('projects', $projects);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function View(request $id)
    {
        //dd($id);
        $userId = Auth::id();
        $AcadAdvi = AcademicAdvisor::where("user_id", $userId)->first();
        
        $interns = Intern::where("project_id", $id->id)->first();
        
        if(!$interns){
            return view('Daniel.directorAcademy.viewProject');
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
                $area = BusinessSector::find($company->business_sector_id);
                //dd($company);
            }
        }
    
        $comments = Comment::where("project_id", $projectId)->get(); 
        $project = Project::find($interns->project_id);
    
        if (!$project) {
            return view('Daniel.directorAcademy.viewProject');
        }
    

        
        $user = User::where("id", $interns->user_id)->first();
        
        // dd($user);

        // $comments = Comment::where("project_id", $intern->project_id)->get();
        // $commenterIds = $comments->pluck('academic_advisor_id')->toArray();
        // $commenters = AcademicAdvisor::whereIn("id", $commenterIds)->get();

        $career = Career::where("id", $interns->career_id)->first();
        
        if(!$career || !$career->academy_id){
            return view('Daniel.directorAcademy.viewProject', compact( 'project', 'company', 'businessAdvisor','comments','commenters','interns','user'));
        }
        $academy = Academy::where("id", $career->academy_id)->first();
        $division = Division::where("id", $academy->division_id)->first();

        $projectLikes = DB::table('projects_likes')->where('id_academic_advisor', $userId)->where('id_projects', $projectId)->first();
 //Reemplazar tan pronto como haya un modelo
        
        if (!$projectLikes) {
            return view('Daniel.directorAcademy.viewProject', compact('comments', 'project', 'company', 'businessAdvisor', 'interns', 'user', 'career', 'area', 'division'));
        } else {
            return view('Daniel.directorAcademy.viewProject', compact('comments', 'project', 'company', 'businessAdvisor', 'interns', 'user', 'career', 'area', 'division', 'projectLikes'));
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
    public function store(Request $request, $id)
    {

        // Validar los datos del formulario
        $request->validate([
            'content' => 'required',
        ]);
        $director = Auth::id();
        $projectId = $id;

        // Obtener el ID del intern relacionado con el proyecto
        $internId = Intern::where('project_id', $projectId)->value('id');

        // Crear un nuevo comentario
        $comment = new Comment();
        $comment->content = $request->input('content');
        $comment->fecha_hora = Carbon::now(); // Fecha y hora actual
        $comment->status = 1; // Estado del comentario
        $comment->director_id = $director;
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
