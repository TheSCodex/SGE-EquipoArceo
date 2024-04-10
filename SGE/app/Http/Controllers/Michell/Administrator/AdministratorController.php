<?php

namespace App\Http\Controllers\Michell\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Academy;
use App\Models\Intern;
use Illuminate\Http\Request;

class AdministratorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $idUser = auth()->user()->id;
        $academies = Academy::with(['careers.interns.project' => function ($query) {
            $query->whereIn('status', ['aprobado', 'en revision']);
        }])->get()->map(function ($academy) {
            $projectCounts = $academy->careers->flatMap(function ($career) {
                return $career->interns->filter(function ($intern) {
                    $status = optional($intern->project)->status;
                    return $status === 'aprobado' || $status === 'en revision';
                });
            });
        
            $approvedProjectsCount = $projectCounts->where('project.status', 'aprobado')->count();
            $revisionProjectsCount = $projectCounts->where('project.status', 'en revision')->count();
        
            $academy->approved_projects_count = $approvedProjectsCount;
            $academy->revision_projects_count = $revisionProjectsCount;
        
            return $academy;
        });

        // dd($academies);

        return view('Michell.Admisnistrator.inicioAdministrator', compact(
            "academies"
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
