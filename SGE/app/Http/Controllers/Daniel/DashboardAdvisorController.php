<?php

namespace App\Http\Controllers\Daniel;

use App\Http\Controllers\Controller;
use App\Models\AcademicAdvisor;
use App\Models\Comment;
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

        // Buscar el registro en la tabla academic_advisor donde user_id sea igual al ID del usuario logueado
        $academicAdvisor = AcademicAdvisor::where('user_id', $userId)->value('id');

        // Obtener todos los comentarios relacionados con el AcademicAdvisor
        $comments = Comment::where('academic_advisor_id', $academicAdvisor)
        ->orderBy('fecha_hora', 'desc')
        ->take(3)
        ->get();
        // Pasar los comentarios a la vista
        return view('daniel.asesor.DashboardAdvisor', compact('comments'));
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
