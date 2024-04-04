<?php

namespace App\Http\Controllers\Daniel;

use App\Http\Controllers\Controller;
use App\Models\AcademicAdvisor;
use App\Models\Comment;
use App\Models\Intern;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardAdvisorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();
        //Obtener el id del asesor
        $academicAdvisor = AcademicAdvisor::where('user_id', $userId)->value('id');
        // Obtener comentarios del asesor
        $comments = Comment::with('project')
            ->where('academic_advisor_id', $academicAdvisor)
            ->orderBy('fecha_hora', 'desc')
            ->take(3)
            ->get();

        // Contar la cantidad de proyectos en revisión
        $revisionProjects = Project::where('status', 'En revisión')->count();
        // Contar la cantidad de proyectos aprobados
        $approvedProjects = Project::where('status', 'Aprobado')->count();

        $totalComments = Comment::where('academic_advisor_id', $academicAdvisor)->count();

        //Trae los datos de los asesorados
        $internUserIds = Intern::where('academic_advisor_id', $academicAdvisor)->pluck('user_id');
        $Intern = User::whereIn('id', $internUserIds)->get();

        // Obtener las notificaciones del usuario actual
        $notificaciones = Auth::user()->unreadNotifications;

        return view('daniel.asesor.DashboardAdvisor', [
            'revisionProjects' => $revisionProjects,
            'approvedProjects' => $approvedProjects,
            'comments' => $comments,
            'Intern' => $Intern,
            'totalComments' => $totalComments,
            'notificaciones' => $notificaciones, 
        ]);
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
