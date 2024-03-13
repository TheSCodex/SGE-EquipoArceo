<?php

namespace App\Http\Controllers\Eliud\Reportes;

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ReportsController extends Controller
{
    public function printReport() {
        $pdf = Pdf::loadView('Eliud.reports.docs.sancion');
        Pdf::setOption(['dpi' => 150, 'debugCss' => true]);
        return $pdf->stream();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Eliud.reports.directorsReports');
    }

    public function directorIndex()
    {
        return view('Eliud.reports.directorsReports');
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
