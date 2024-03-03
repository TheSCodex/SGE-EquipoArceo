<?php

namespace App\Http\Controllers\Michell;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AcademicAdvisorController extends Controller
{
    public function index()
    {
        return view('Michell.academicAdvisor.academicAdvisor');
    }
}
