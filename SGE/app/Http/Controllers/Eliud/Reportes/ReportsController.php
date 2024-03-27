<?php

namespace App\Http\Controllers\Eliud\Reportes;

use App\Http\Controllers\Controller;
use App\Models\Academy;
use App\Models\Career;
use App\Models\Division;
use App\Models\Intern;
use App\Models\Project;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ReportsController extends Controller
{
    public function printReportSancion( Request $request, string $id)
    {
        $motivo = $request->input('motivo');
        $tipo = $request->input('tipo');

        $student = User::find($id);
        $interns = Intern::where('user_id', $id)->get();
        $project = Project::find($interns[0]->project_id);
        $career = Career::find($interns[0]->career_id);
        $academie = Academy::find($career->academy_id);
        $division = Division::find($academie->division_id);
        $director = User::find($division->director_id);
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('Eliud.reports.docs.sancion', compact('student', 'director', 'division', 'career', 'project', 'motivo', 'tipo', 'interns' ));
        return $pdf->stream();
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

    public function printReportCartaAprobacion(string $id)
    {
        $student = User::find($id);
        $interns = Intern::where('user_id', $id)->get();
        $project = Project::find($interns[0]->project_id);
        $career = Career::find($interns[0]->career_id);
        $academie = Academy::find($career->academy_id);
        $division = Division::find($academie->division_id);
        $director = User::find($division->director_id);
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('Eliud.reports.docs.aprobacion', compact('student', 'director', 'division', 'interns', 'project' ));
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

    public function printReportCartaMemoria(string $id)
    {
        $student = User::find($id);
        $interns = Intern::where('user_id', $id)->get();
        $project = Project::find($interns[0]->project_id);
        $career = Career::find($interns[0]->career_id);
        $academie = Academy::find($career->academy_id);
        $division = Division::find($academie->division_id);
        $director = User::find($division->director_id);
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('Eliud.reports.docs.memoria', compact('student', 'director', 'division', 'project' ));
        return $pdf->stream();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $userData = User::find($user->id);
        $academie = Academy::paginate(1);
        return view('Eliud.reports.directorsReports', compact('academie', 'userData'));
    }

    public function directorIndex()
    {
        
        $user = auth()->user();
        $userData = User::find($user->id);
        $academie = Academy::paginate(1);
        return view('Eliud.reports.directorsReports', compact('academie', 'userData'));
    }

    public function assistantIndex()
    {
        
        $user = auth()->user();
        $userData = User::find($user->id);
        $academie = Academy::paginate(1);
        return view('Eliud.reports.assistantsReports', compact('academie','userData'));
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
