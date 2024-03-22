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
        $role = "estudiante";
        $interns = User::whereHas("role", function ($query) use ($role) {
                $query->where("title", $role);
            })
            ->with("interns.studentStatus", "interns.penalization")
            ->paginate(10);
    
        return view('Michell.studentList.studentList', compact("interns"));
    }

    public function edit(int $id)
    {
        $student = User::find($id);
        return view("Michell.studentList.editStudent");
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