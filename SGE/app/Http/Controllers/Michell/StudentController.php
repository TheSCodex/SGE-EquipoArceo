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
        $user  = auth()->user();
        $student = $user->id;
        if ($student === null) {
            $student = 1;
        }
        // dd($student);
        // Obtener el nombre del asesor académico
        $advisor = DB::table('users')
            ->join('interns', 'users.id', '=', 'interns.academic_advisor_id')
            ->where('interns.user_id', $student)
            ->select('users.name as advisor_name')
            ->first();

        // Obtener el nombre del asesor empresarial
        $empresarial = DB::table('interns')
            ->join('users', 'interns.user_id', '=', 'users.id')
            ->join('business_advisors', 'interns.project_id', '=', 'business_advisors.id')
            ->select('users.name as estudiante', 'business_advisors.name as asesor_empresarial')
            ->where('users.id', $student)
            ->whereNotNull('interns.project_id')
            ->get();

            // dd($empresarial);
        return view('Michell.StudentHome.studentHome', ['advisor' => $advisor, 'empresarial' => $empresarial]);
    }

    public function studentEvents()
    {
        return view('Michell.StudentEvents.studentEvents');
    }
}