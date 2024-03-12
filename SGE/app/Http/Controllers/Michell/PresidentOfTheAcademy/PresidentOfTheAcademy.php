<?php

namespace App\Http\Controllers\Michell\PresidentOfTheAcademy;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\AcademicAdvisor;
use App\Http\Controllers\Controller;

class PresidentOfTheAcademy extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $advisors=AcademicAdvisor::all();
        $businessConsultants = User::where('rol_id', 7)->get();
        return view('Michell.PresidentOfTheAcademy.inicioPresidentAcademy', compact('advisors', 'businessConsultants'));
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
