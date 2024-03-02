<?php

namespace App\Http\Controllers\Michell;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AcademicHomeController extends Controller
{
    public function index()
    {
        return view('Michell.academicHome.academicHome');
    }
}
