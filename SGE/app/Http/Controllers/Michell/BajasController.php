<?php

namespace App\Http\Controllers\Michell;

use App\Http\Controllers\Controller;
use App\Models\Intern;
use Illuminate\Http\Request;

class BajasController extends Controller


{
    public function index()
    {
        // Obtener solo los alumnos con student_status_id igual a 3 (Cancelado)
        $dataStudents = Intern::whereHas('studentStatus', function ($query) {
            $query->where('id', 3);
        })->with('academicAdvisor.user', 'user.careerAcademy.career')->get();

        return view('Michell.bajas.bajas', compact('dataStudents'));
    }
}
