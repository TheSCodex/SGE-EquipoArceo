<?php

namespace App\Http\Controllers\Daniel\Proyectos;

use App\Http\Controllers\Controller;
use App\Http\Requests\Daniel\AnteproyectoRequest;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();
        return view('Daniel.Projects.ProjectView')->with('userId', $userId);

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
        return view ('daniel.formanteproyecto');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnteproyectoRequest $request)
    {
        $validateData = $request->validated();
        $project = new Project([

        ]);
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
