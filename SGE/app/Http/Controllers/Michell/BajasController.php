<?php

namespace App\Http\Controllers\Michell;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BajasController extends Controller


{
    public function index()
    {
        // Obtener solo los alumnos con student_status_id igual a 2 (Cancelado)
        $interns = DB::table('interns')
        ->join('users', 'interns.user_id', '=', 'users.id')
        ->join('careers', 'interns.career_id', '=', 'careers.id')
        ->join('users as academic', 'interns.academic_advisor_id', '=', 'academic.id')
        ->select('interns.id', 'users.name','users.last_name as lastname' ,'careers.name as careers', 'academic.name as advisor_name')
        ->where('interns.student_status_id', 2)
        ->get();
        return view('Michell.bajas.bajas', ['dataStudents'=> $interns]);
    }
}
