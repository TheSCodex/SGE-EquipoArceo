<?php

namespace App\Http\Controllers\Daniel;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Intern;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ObservationsController extends Controller
{
    public function index($projectId)
    {
        $intern = Intern::where('user_id', Auth::id())
            ->where('project_id', $projectId) //por si hacen lo del id por url
            ->first();

        $tutorComment = Comment::where('academic_advisor_id', $intern->academic_advisor_id) //id del tutor jeje
            ->first();

        $otherComments = Comment::where('project_id', $projectId)
            ->where('academic_advisor_id', '<>', $intern->academic_advisor_id)
            ->get();

        return view('Daniel.Observation', compact('tutorComment', 'otherComments'));// los comentarios x (ya dejenme dormir)
    }

    public function create()
    {
        // Implementar si es necesario.
    }

    public function store(Request $request)
    {
        // Implementar si es necesario.
    }

    public function show($id)
    {
        // Implementar si es necesario.
    }

    public function edit(string $id)
    {
        // Implementar si es necesario.
    }

    public function update(Request $request, string $id)
    {
        // Implementar si es necesario.
    }

    public function destroy(string $id)
    {
        // Implementar si es necesario.
    }
}
//por si no jala jajaja
/*
<?php

namespace App\Http\Controllers\Daniel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ObservationsController extends Controller
{
   ¿
    public function index()
    {
        return view('Daniel.Observation');
    }

   
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        //
    }

   
    public function show(string $id)
    {
        //
    }

  
    public function edit(string $id)
    {
        //
    }

   
    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
*/