<?php

namespace App\Http\Controllers\Michell;

use App\Http\Controllers\Controller;
use App\Models\Intern;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\AcademicAdvisor;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;
use Carbon\Carbon;

class StudentController extends Controller
{
    public function index()
    {
        return view('Michell.Student.Student');
    }

    public function studentHome()
    {
        $user  = auth()->user();
        $student = $user->id;
        // if ($student === null) {
        //     $student = 1;
        // }
        $intern = Intern::where("user_id", $student)->first();

        // dd($intern);

        $studentProject = Intern::join("projects", "interns.project_id", "=", "projects.id")
            ->where("interns.id", "=", $student)
            ->first();

   
        $advisor = $intern->load("academicAdvisor.user");

        // dd($advisor);

        // Obtener el nombre del asesor empresarial
        $empresarial = DB::table('interns')
            ->join('users', 'interns.user_id', '=', 'users.id')
            ->join('business_advisors', 'interns.project_id', '=', 'business_advisors.id')
            ->select('users.name as estudiante', 'business_advisors.name as asesor_empresarial')
            ->where('users.id', $student)
            ->whereNotNull('interns.project_id')
            ->get();
        // dd($empresarial);


        $studentsCommentsCount = null;
        $comments = [];
        //comentarios
        if ($studentProject) {
            $studentsCommentsCount = Comment::where("project_id", "=", $studentProject->id)
            ->whereNotNull("interns_id")
            ->count();

            $comments = Comment::where("project_id", "=", $studentProject->id)
            ->whereNotNull("interns_id")
            ->get();
        $comments = $comments->take(3);
        }


        //Obtener los dias faltantes
        $userId = Auth::id();
        $intern = Intern::where("user_id", $userId)->first();

        $TotalDeDias = null;
        $diaActual = null;
        $mensaje = null;

        $project = Project::find($intern->project_id);
        if ($project) {
            $start_date = Carbon::parse($project->start_date);
            $end_date = Carbon::parse($project->end_date);
            $current_date = Carbon::now();
    
            $diasTranscurridos = $current_date->diffInDays($start_date);
            $TotalDeDias = $start_date->diffInDays($end_date);
            // dd($TotalDeDias);
            $diaActual = $diasTranscurridos + 1;
        }
        else {
            $mensaje = "Aún no se ha agregado un proyecto";
        }


        // Obtener votos
        $votes = Intern::where('user_id', $student)
        ->join('projects', 'interns.project_id', '=', 'projects.id')
        ->select('projects.like')
        ->first();
        // dd($votes);

        // Obtener penalizaciones
        $penalizations = Intern::where('user_id', $student)
        ->join('penalizations', 'interns.penalty_id', '=','penalizations.id')
        ->select('penalizations.penalty_name','penalizations.description')
        ->first();
        // dd($penalizations);


        return view('Michell.StudentHome.studentHome', [
    
            'advisor' => $advisor,
            'empresarial' => $empresarial,
            'comments' => $comments,
            "studentProject" => $studentProject,
            'diaActual' => $diaActual,
            'TotalDeDias' => $TotalDeDias,
            
            "studentsCommentsCount" => $studentsCommentsCount,
            'votes' => $votes,
            'penalty' => $penalizations,
            "mensaje" => $mensaje
        ]);
    }

    public function studentEvents()
    {
        return view('Michell.StudentEvents.studentEvents');
    }
}
