<?php

namespace App\Http\Controllers\Michell\PresidentOfTheAcademy;

use App\Models\Intern;
use Illuminate\Http\Request;
use App\Models\AcademicAdvisor;
use App\Http\Controllers\Controller;
use App\Http\Requests\Michell\AssignAdvisorRequest;

class StudentAndAdvisorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataStudents = Intern::with('user', 'academicAdvisor.user')->paginate(10);
        $showAssignButton = $dataStudents->contains('academicAdvisor', null);
        return view('Michell.PresidentOfTheAcademy.StudentsList', compact('dataStudents', 'showAssignButton'));
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
        $student = Intern::find($id);
        $advisors = AcademicAdvisor::with('user')->get();
        return view('Michell.PresidentOfTheAcademy.assignAdvisor', compact('student', 'advisors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AssignAdvisorRequest $request, string $id)
    {
        $intern = Intern::find($id);
        $intern->academic_advisor_id = $request->academic_advisor_id;
        $intern->save();

        return redirect()->route('presidente.index')->with('success', 'Asesor asignado correctamente.');
    }

    // public function changeAdivsor(string $id){
    //     $student = Intern::find($id);
    //     $advisors = AcademicAdvisor::with('user')->get();
    //     return view('Michell.PresidentOfTheAcademy.assignAdvisor', compact('student', 'advisors'));
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
