<?php

namespace App\Http\Controllers\Michell;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
<<<<<<< HEAD
    //
    public function index()
    {
        return view('Michell.Student.Student');
=======
    public function index()
    {
        return view('Michell.StudentHome.studentHome');
    }
    public function studentEvents(){
        return view('Michell.StudentEvents.studentEvents');
>>>>>>> a4ebba3753bedf5aa7616c8a34d5bac770765c36
    }
}
