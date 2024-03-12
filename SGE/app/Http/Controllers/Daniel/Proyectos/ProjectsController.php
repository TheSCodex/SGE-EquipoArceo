<?php

namespace App\Http\Controllers\Daniel\Proyectos;

use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Intern;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();
        $intern = Intern::where("user_id", $userId)->first();
        if(!$intern){
            return view('Daniel.Projects.ProjectView');
        }
        $projectId = $intern->project_id;
        $project = Project::where("id", $projectId)->first();
        $data = Json_encode([
            $userId,
            $projectId
        ]);
        return view('Daniel.Projects.ProjectView', compact('project','data'));
        

    }
    public function project()
    {
        return view('Daniel.presidenta.project');
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
