<?php

namespace App\Http\Controllers\Michell;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BajasController extends Controller


{
    public function index()
    {
        return view('Michell.bajas.bajas');
    }
}
