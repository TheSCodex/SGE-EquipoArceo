<?php

namespace App\Http\Controllers\Michell;

use App\Http\Controllers\Controller;
use App\Models\Intern;
use Illuminate\Http\Request;

class BajasController extends Controller


{
    public function index()
    {
        // Obtener solo los alumnos con student_status_id igual a 1
        $dataStudents = Intern::whereHas('studentStatus', function ($query) {
            $query->where('id', 1);
        })->get();

        return view('Michell.bajas.bajas', compact('dataStudents'));
    }
}
