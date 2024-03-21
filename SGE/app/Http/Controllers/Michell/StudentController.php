<?php

namespace App\Http\Controllers\Michell;

use App\Http\Controllers\Controller;
use App\Models\Intern;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return view('Michell.Student.Student');
    }

    public function studentHome()
    {
        $advisor=Intern::with('user','academicAdvisor.user')->first();
        return view('Michell.StudentHome.studentHome', compact('advisor'));
    }

    public function studentEvents()
    {
        return view('Michell.StudentEvents.studentEvents');
    }
}