<?php

namespace App\Http\Controllers\Elizabeth;

use App\Http\Controllers\Controller;


class AsesorController extends Controller
{
    public function index()
    {
        return view('Elizabeth.crudAsesores');
    }

    public function crear()
    {
        return view('Elizabeth.formAsesores');
    }
}
