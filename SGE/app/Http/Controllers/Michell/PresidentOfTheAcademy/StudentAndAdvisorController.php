<?php

namespace App\Http\Controllers\Michell\PresidentOfTheAcademy;

use App\Models\Intern;
use Illuminate\Http\Request;
use App\Models\AcademicAdvisor;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
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
        $student = Intern::with('academicAdvisor.user')->find($id);
        $advisors = AcademicAdvisor::with('user')->get();
        return view('Michell.PresidentOfTheAcademy.assignAdvisor', compact('student', 'advisors'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(AssignAdvisorRequest $request, string $id)
    // {
    //     $intern = Intern::find($id);
    //     $intern->academic_advisor_id = $request->academic_advisor_id;
    //     $intern->save();

    //     return redirect()->route('presidente.index')->with('success', 'Asesor asignado correctamente.');
    // }
    public function update(AssignAdvisorRequest $request, string $id)
    {
        $intern = Intern::find($id);
        $academicAdvisorId = $request->academic_advisor_id;

        // Verificar si el asesor tiene espacio para otro estudiante
        $academicAdvisor = AcademicAdvisor::find($academicAdvisorId);
        if ($academicAdvisor->quantity_advised >= $academicAdvisor->max_advisors) {
            return redirect()->route('presidente.index')->with('error', 'El asesor ya tiene la cantidad máxima de estudiantes permitidos.');
        }

        // Actualizar el asesor académico del estudiante
        $intern->academic_advisor_id = $academicAdvisorId;
        $intern->save();

        // Contar la cantidad de estudiantes que tiene el asesor y actualizar quantity_advised
        // Actualizar la cantidad de estudiantes asesorados por el asesor en la tabla academic_advisor
        DB::update("
        UPDATE academic_advisor AS aa
        LEFT JOIN (
            SELECT academic_advisor_id, COUNT(*) AS total_students
            FROM interns
            GROUP BY academic_advisor_id
        ) AS intern_counts ON aa.id = intern_counts.academic_advisor_id
        SET aa.quantity_advised = COALESCE(intern_counts.total_students, 0)
    ");
    

        return redirect()->route('presidente.index')->with('success', 'Asesor asignado correctamente.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
