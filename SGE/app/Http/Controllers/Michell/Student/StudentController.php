<?php

namespace App\Http\Controllers\Michell;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return view('Michell.Student.student');
    }

    public function studentHome()
    {
        return view('Michell.StudentHome.studentHome');
    }

    public function studentEvents()
    {
        return view('Michell.StudentEvents.studentEvents');
    }
}