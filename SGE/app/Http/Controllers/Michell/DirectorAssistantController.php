<?php

namespace App\Http\Controllers\Michell;

use App\Http\Controllers\Controller;
use App\Models\Division;
use App\Models\Intern;
use App\Models\Academy;
use App\Models\Career;
use App\Models\Project;
use DateTime;
use Illuminate\Http\Request;

use function Laravel\Prompts\select;

class DirectorAssistantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        setlocale(LC_TIME, 'es_ES.UTF-8');

        // Obtener estudiantes para el listado
        $interns = Intern::join('users', 'interns.user_id', '=', 'users.id')
        ->join('student_status', 'interns.student_status_id', '=', 'student_status.id')
        ->select('interns.id', 'users.name', 'student_status.name AS estatus')
        ->where('student_status.id', 2)
        ->paginate(3);

        // Obtener ID de usuario
        $idUser = auth()->user()->id;

        // Obtener la división del usuario
        $userDivision = Division::where('director_id', $idUser)
            ->orWhere('directorAsistant_id', $idUser)
            ->first();

        // dd($userDivision);

        // Obtener academias de la división
        $academies = Academy::where("division_id", $userDivision->id)->get();

        // dd($academies);

        // Obtener carreras de las academias
        $careers = Career::whereIn('academy_id', $academies->pluck('id'))
        ->where('name', 'like', '%TSU%')
        ->get();
        $careersId = [];
        foreach ($careers as $career) {
            $careersId[] = $career["id"];
        }

        // Contar penalizaciones
        $penalizationsNum = Intern::whereIn("career_id", $careers->pluck('id'))
            ->whereNotNull("penalty_id")
            ->count();

        // Obtener periodo actual
        $period = Intern::whereIn("interns.career_id", $careersId)->latest()->select("period")->first();

        // Contar proyectos aprobados, en revisión y totales
        $projectMetrics = [
            'approvedCount' => Intern::whereIn('career_id', $careers->pluck('id'))
                ->join('projects', 'interns.project_id', '=', 'projects.id')
                ->where('projects.status', 'aprobado')
                ->count(),
            'inRevisionCount' => Intern::whereIn('career_id', $careers->pluck('id'))
                ->join('projects', 'interns.project_id', '=', 'projects.id')
                ->where('projects.status', 'en revision')
                ->count(),
            'totalProjects' => Intern::whereIn('career_id', $careers->pluck('id'))
                ->join('projects', 'interns.project_id', '=', 'projects.id')
                ->count(),
        ];

        $approvedProjectsByMonth = Intern::whereIn('career_id', $careers->pluck('id'))
        ->join('projects', 'interns.project_id', '=', 'projects.id')
        ->join('careers', 'interns.career_id', '=', 'careers.id') 
        ->where('projects.status', 'aprobado')
        ->get(['projects.approval date', 'careers.name'])
        ->map(function ($item) {
            $approvalDate = new DateTime($item['approval date']);
            $month = strftime('%B', $approvalDate->getTimestamp());
            $careerName = explode(' ', $item['name']);
            $careerName = end($careerName);
            return ['month' => $month, 'career' => $careerName];
        })
        ->groupBy('month')
        ->map(function ($group, $month) {
            return [
                'month' => $month,
                'careers' => $group->map(function ($item) {
                    return ['name' => $item['career'], 'approvedCount' => 1];
                })->toArray()
            ];
        })->values()->toArray();

        // dd($approvedProjectsByMonth);

        return view("Michell.assistant.index", compact(
            "interns",
            "careers",
            "userDivision",
            "penalizationsNum",
            "projectMetrics",
            "period",
            "approvedProjectsByMonth"
        ));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
