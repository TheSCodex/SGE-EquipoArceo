<?php

namespace App\Http\Controllers\Daniel;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Intern;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ObservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param int $projectId
     * @return \Illuminate\Contracts\View\View
     */
    public function index($projectId)
    {
        $intern = Intern::where('user_id', Auth::id())
            ->where('project_id', $projectId)
            ->first();

        $tutorComment = Comment::where('academic_advisor_id', $intern->academic_advisor_id)
            ->first();

        $otherComments = Comment::where('project_id', $projectId)
            ->where('academic_advisor_id', '<>', $intern->academic_advisor_id)
            ->get();

        return view('Daniel.Observation', compact('tutorComment', 'otherComments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Puedes implementar esto si es necesario
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Puedes implementar esto si es necesario
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Puedes implementar esto si es necesario
    }

    // Resto de las funciones...
}
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