<?php

namespace App\Http\Controllers\Daniel\Asesor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AcademicAdvisor;
use App\Models\BusinessAdvisor;
use App\Models\BusinessSector;
use App\Models\Company;
use App\Models\Intern;
use App\Models\Project;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ProjectDraftController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $userId = Auth::id();
        $AcadAdvi = AcademicAdvisor::where("user_id", $userId)->first();
        $intern = Intern::where("academic_advisor_id", $AcadAdvi->id)->first();
        
        if(!$intern){
            return view('Daniel.asesor.AcademicAdvisorProjectDraft');
        }
        
        $projectId = $intern->project_id;
        $project = Project::find($projectId);

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
    
        return view('Daniel.asesor.AcademicAdvisorProjectDraft', compact('comments', 'project', 'company', 'businessAdvisor', 'businessSector', 'commenters'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'content' => 'required',
        ]);

        // Obtener el ID del usuario autenticado
        $academicAdvisorId = Auth::id();

        // Obtener el ID del proyecto desde la URL
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
