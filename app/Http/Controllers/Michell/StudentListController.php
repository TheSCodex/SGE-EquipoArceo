<?php

namespace App\Http\Controllers\Michell;

use App\Http\Controllers\Controller;
use App\Models\Intern;
use App\Models\User;
use Illuminate\Http\Request;

class StudentListController extends Controller
{
    public function index()
    {
        $interns = Intern::with("user", "studentStatus")->get();

        // dd($interns);

        return view('Michell.studentList.studentList', compact("interns"));
    }

    public function destroy(int $id) 
    {
        $intern = Intern::find($id);

        if ($intern) {
            $intern->delete();
        }

        return redirect()->route("studentL.index");
    }
}
