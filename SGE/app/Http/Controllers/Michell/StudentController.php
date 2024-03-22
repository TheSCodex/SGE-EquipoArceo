<?php

namespace App\Http\Controllers\Michell;

use App\Http\Controllers\Controller;
use App\Models\Intern;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class StudentController extends Controller
{
    public function index()
    {
        return view('Michell.Student.Student');
    }

    public function studentHome()
    {
        $user = Auth::user();
        $student = $user->intern;
        if ($student === null) {
            $student = 12;
        }
        // dd($student);
        // Obtener el nombre del asesor académico
        $advisor = DB::table('users')
        ->join('interns', 'users.id', '=', 'interns.academic_advisor_id')
        ->where('interns.user_id', $student)
        ->select('users.name as advisor_name')
        ->first();
            // dd($advisor);
        return view('Michell.StudentHome.studentHome', compact('advisor'));
    }

    public function studentEvents()
    {
        return view('Michell.StudentEvents.studentEvents');
    }
}
