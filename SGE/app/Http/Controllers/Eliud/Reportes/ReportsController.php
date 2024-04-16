<?php

namespace App\Http\Controllers\Eliud\Reportes;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Michell\PresidentOfTheAcademy\PresidentOfTheAcademy;
use App\Models\AcademicAdvisor;
use App\Models\Academy;
use App\Models\BusinessAdvisor;
use App\Models\Career;
use App\Models\Division;
use App\Models\DocRevisions;
use App\Models\FileHistory;
use App\Models\Group;
use App\Models\Intern;
use App\Models\lastDocCreated;
use App\Models\Project;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Mockery\Undefined;

class ReportsController extends Controller
{
    public function printReportSancion(Request $request, string $id, string $tipo = null, string $motivo = null, string $serviceHours = null)
    {
        if ($request->input('tipo') == '2') {

            $request->validate([
                'serviceHours' => 'required|numeric|    max:525',
            ]);
        }

        $user = auth()->user();
        $userData = User::find($user->id);
        $motivo = $motivo ?? $request->input('motivo');
        $tipo = $tipo ?? $request->input('tipo');
        $serviceHours = $serviceHours ?? $request->input('serviceHours');
        $student = User::find($id);
        $interns = Intern::where('user_id', $id)->first();
        $project = Project::find($interns->project_id);
        $career = Career::find($interns->career_id);
        $academie = Academy::find($career->academy_id);

        $division = Division::find($academie->division_id);
        $director = User::find($division->director_id);
        $group = Group::find($interns->group_id);
        $docRevision = DocRevisions::find(4);

        $penaltyType = $request->input('tipo');
        $penaltyReason = $request->input('motivo');

        $penaltyTypeMapping = [
            '1' => 'Amonestación escrita',
            '2' => 'Amonestación con horas de labor social',
            '3' => 'Cancelación de Estadía'
        ];

        $penaltyReasonMapping = [
            '1' => 'POR MOTIVOS ACADÉMICOS',
            '2' => 'POR TEMAS RELACIONADOS EN GESTIÓN EMPRESARIAL'
        ];

        $penaltyTypeText = $penaltyTypeMapping[$penaltyType];
        $penaltyReasonText = $penaltyReasonMapping[$penaltyReason];

        $penalty = DB::table('penalizations')
            ->whereRaw('LOWER(penalty_name) = LOWER(?)', [$penaltyTypeText])
            ->whereRaw('LOWER(description) = LOWER(?)', [$penaltyReasonText])
            ->first();

        if ($penalty) {
            $interns->penalty_id = $penalty->id;
        } else {
            $defaultPenalty = DB::table('penalizations')
                ->where('penalty_name', 'Penalización no definida')
                ->first();
            $interns->penalty_id = $defaultPenalty->id;

            if ($serviceHours) {
                $interns->service_hour = $serviceHours;
            }
        }

        $interns->save();


        $jsonData[] = [

            'title' => "Amonestación",
            'advisor_identifier' => $user->identifier,
            'advisor_email' => $user->email,
            'advisor_name' => $user->name,
            'advisor_lastName' => $user->last_name,
            'user_id' => $id,
            'academic_advisor_id' => $interns?->academic_advisor_id,
            'student' => $student?->name . ' ' . $student->last_name,
            'student_service_hours' => $interns->service_hour,
            'division' => $division?->name,
            'director' => $director?->name . ' ' . $director?->last_name,
            'career' => $career?->name,
            'project' => $project?->name,
            'interns' => $interns?->id,
            'type' => $tipo,
            'reason' => $motivo,
            'serviceHours' => $serviceHours,
        ];

        $authUser = auth()->user();
        if ($authUser->role->title != 'director' && $authUser->role->title != 'asistenteDireccion') {
            $fileHistory = new FileHistory($jsonData[0]);
            $fileHistory->save();
        }

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('Eliud.reports.docs.sancion', compact('student', 'director', 'division', 'group', 'career', 'project', 'motivo', 'tipo', 'interns', 'docRevision', 'serviceHours', 'user'));
        session()->flash('form_success', true);
        return $pdf->stream();

        return redirect()->back()->withErrors('Las horas de servicio no pueden ser mayores a 525.')->withInput();
    }


    public function printSansion()
    {
        $path = public_path('img\Eliud\docs\Sansion.pdf');

        return response()->make(file_get_contents($path), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . 'Sansion' . '"'
        ]);
    }

    public function printCartaAprobacion()
    {

        $path = public_path('img\Eliud\docs\CartAprobacion.pdf');

        return response()->make(file_get_contents($path), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . 'CartaAprobacion' . '"'
        ]);
    }

    public function printReportCartaDigitalizacion(Request $request, string $id, string $motivo = null)
    {
        $user = auth()->user();
        $motivo = $motivo ?? $request->input('motivo');
        $userData = User::find($user->id);
        $student = User::find($id);
        $interns = Intern::where('user_id', $id)->get();
        $project = Project::find($interns[0]->project_id);
        $career = Career::find($interns[0]->career_id);
        $academie = Academy::find($career->academy_id);
        $division = Division::find($academie->division_id);
        
        $president = User::find($academie->president_id);
        $director = User::find($division->director_id);
        $docRevision = DocRevisions::find(3);
        $group = Group::find($interns[0]->group_id);
        $lastDocCreated = lastDocCreated::where('division_id', $division->id)->first();

        if ($lastDocCreated == null) {
            DB::table('last_doc_createds')->insert([
                'division_id' => ($division->id),
                'number' => 1,
            ]);
        
            $lastDocCreated = DB::table('last_doc_createds')
                ->where('division_id', $division->id)
                ->orderByDesc('id')
                ->first();
        }
        
        $getNumber = $lastDocCreated->number;
        
        if ($interns[0]->foolscapNumber == null) {
            $interns[0]->foolscapNumber = $getNumber;
            $interns[0]->save();
        
            DB::table('last_doc_createds')
                ->where('id', $lastDocCreated->id)
                ->update(['number' => $getNumber + 1]);
        
            $lastDocCreated = DB::table('last_doc_createds')
                ->where('division_id', $division->id)
                ->orderByDesc('id')
                ->first();
        }
        
        $jsonData[] = [

            'title' => "Digitalización de Memoria",
            'advisor_identifier' => $user->identifier,
            'advisor_email' => $user->email,
            'advisor_name' => $user->name,
            'advisor_lastName' => $user->last_name,
            'user_id' => $id,
            'academic_advisor_id' => $interns[0]?->academic_advisor_id,
            'student' => $student?->name . ' ' . $student?->last_name,
            'student_identifier' => $student->identifier,
            'student_group' => $group?->name,
            'division' => $division?->name,
            'director' => $director?->name . ' ' . $director?->last_name,
            'career' => $career?->name,
            'project' => $project?->name,
            'reason' => $motivo,
            'interns' => $interns[0]?->id,
            'docNumberCreated' => $getNumber ? $getNumber : $interns[0]->foolscapNumber,
            'president' =>  $president?->name . ' ' . $president?->last_name,

        ];

        $authUser = auth()->user();
        if ($authUser->role->title != 'director' && $authUser->role->title != 'asistenteDireccion') {
            $fileHistory = new FileHistory($jsonData[0]);
            $fileHistory->save();
        }

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('Eliud.reports.docs.aprobacion', compact('student', 'user', 'director', 'division', 'group', 'interns', 'project', 'docRevision', 'motivo', 'getNumber', 'president'));
        return $pdf->stream();
    }

    public function printCartaMemoria()
    {
        $path = public_path('img\Eliud\docs\CartaMemoria.pdf');

        return response()->make(file_get_contents($path), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . 'CartaMemoria' . '"'
        ]);
    }

    public function printReportCartaAprobacion(string $id)
    {
        $user = auth()->user();
        $userData = User::find($user->id);
        $student = User::find($id);
        $interns = Intern::where('user_id', $id)->get();
        $project = Project::find($interns[0]->project_id);
        $group = Group::find($interns[0]->group_id);
        $career = Career::find($interns[0]->career_id);
        $academie = Academy::find($career->academy_id);
        $division = Division::find($academie->division_id);
        $director = User::find($division->director_id);
        $docRevision = DocRevisions::find(2);
        $business_advisors = BusinessAdvisor::find($interns[0]->business_advisor_id);

        $jsonData[] = [

            'title' => "Aprobación de Memoria",
            'title' => "Aprobación de Memoria",
            'advisor_identifier' => $user->identifier,
            'advisor_email' => $user->email,
            'advisor_name' => $user->name,
            'advisor_lastName' => $user->last_name,
            'user_id' => $id,
            'academic_advisor_id' => $interns[0]?->academic_advisor_id,
            'student' => $student?->name . ' ' . $student?->last_name,
            'division' => $division?->name,
            'director' => $director?->name . ' ' . $director?->last_name,
            'career' => $career?->name,
            'project' => $project?->name,
            'interns' => $interns[0]?->id,
            'business_advisors' => $business_advisors->name,
        ];

        $authUser = auth()->user();
        if ($authUser->role->title != 'director' && $authUser->role->title != 'asistenteDireccion') {
            $fileHistory = new FileHistory($jsonData[0]);
            $fileHistory->save();
        }

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('Eliud.reports.docs.memoria', compact('student', 'director', 'division', 'group', 'project', 'docRevision', 'business_advisors', 'user', ));
        return $pdf->stream();
    }

    /**
     * Display a listing of the resource.
     */
    public function directorIndex()
    {
        $files = FileHistory::all();
        $user = auth()->user();
        $userData = User::find($user->id);
        $division = Division::where('director_id', $userData?->id)->orWhere('directorAsistant_id', $userData?->id)->first();
        $academies = Academy::where('division_id', $division?->id)->get();

        $academiesData = [];
        foreach ($academies as $academy) {
            $academyData = [
                'name' => $academy->name,
                'careers' => []
            ];

            $careers = Career::where('academy_id', $academy->id)->get();

            foreach ($careers as $career) {
                $interns = Intern::where('career_id', $career->id)->get();
                $careerData = [
                    'name' => $career->name,
                    'projects' => []
                ];

                foreach ($interns as $intern) {
                    $project = Project::find($intern->project_id);
                    if ($project && $project->status == 'aprobado') {
                        $careerData['projects'][] = $project;
                    }
                }

                $academyData['careers'][] = $careerData;
            }

            $academiesData[] = $academyData;
        }

        return view('Eliud.reports.directorsReports', compact('academiesData', 'userData', 'files', 'division', 'group', 'user'));
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
