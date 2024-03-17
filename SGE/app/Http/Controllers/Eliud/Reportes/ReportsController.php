<?php

namespace App\Http\Controllers\Eliud\Reportes;

use App\Http\Controllers\Controller;
use App\Models\Academy;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ReportsController extends Controller
{
    public function printReportSancion() {
        $pdf = App::make('dompdf.wrapper');
        $pdf-> loadView('Eliud.reports.docs.sancion');
        return $pdf -> stream();
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

    public function printReportCartaAprobacion() {
        $pdf = App::make('dompdf.wrapper');
        $pdf-> loadView('Eliud.reports.docs.aprobacion');
        return $pdf -> stream();
    }

    public function printCartaMemoria()
    {
        $path = public_path('img\Eliud\docs\CartaMemoria.pdf');

        return response()->make(file_get_contents($path), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . 'CartaMemoria' . '"'
        ]);
    }

    public function printReportCartaMemoria() {
        $pdf = App::make('dompdf.wrapper');
        $pdf-> loadView('Eliud.reports.docs.memoria');
        return $pdf -> stream();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {        
        $academie = Academy::paginate(1);
        return view('Eliud.reports.directorsReports', compact('academie'));
    }

    public function directorIndex()
    {
        $academie = Academy::paginate(1);
        return view('Eliud.reports.directorsReports', compact('academie'));
    }

    public function assistantIndex()
    {
        return view('Eliud.reports.assistantsReports');
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
