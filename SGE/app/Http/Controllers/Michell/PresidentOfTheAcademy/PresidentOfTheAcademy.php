<?php

namespace App\Http\Controllers\Michell\PresidentOfTheAcademy;

use App\Models\User;
use App\Models\Intern;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\AcademicAdvisor;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;


class PresidentOfTheAcademy extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $advisors=AcademicAdvisor::all();
        $businessConsultants = User::where('rol_id', 7)->get();
        $votes=Project::sum('like');
        $dataStudents = Intern::with('user', 'academicAdvisor.user')->get();
        return view('Michell.PresidentOfTheAcademy.inicioPresidentAcademy', compact('advisors', 'businessConsultants', 'votes', 'dataStudents'));
    }

    public function AdvisorList(){
        $advisors = AcademicAdvisor::join('users', 'academic_advisor.user_id', '=', 'users.id')
        ->join('careers', 'academic_advisor.career_id', '=', 'careers.id')
        ->where('users.rol_id', 2)
        ->select('academic_advisor.id','users.name', 'careers.name AS career_name', 'academic_advisor.max_advisors', 'academic_advisor.quantity_advised')
        ->get();

        return view('Michell.PresidentOfTheAcademy.AdvisorList', ['advisors' => $advisors]);

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
    public function update(Request $request, $id): RedirectResponse
{
    $advisor = AcademicAdvisor::find($id);
    $advisor->max_advisors = $request->input('max_advisors');
    $advisor->quantity_advised = $request->input('quantity_advised');
    $advisor->save();

    return redirect()->route('lista-asesores')->with('success', 'Asesor notificado correctamente');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $academic = AcademicAdvisor::findOrFail($id);
        $academic->delete();

        return redirect()->route('lista-asesores')->with('notificacion', 'Asesor eliminado correctamente');
    }
}
