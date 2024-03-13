<?php

namespace App\Http\Controllers\Daniel;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Intern;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ObservationsController extends Controller
{
    public function index()
    {
        // Obtenemos el ID del usuario autenticado
        $userId = Auth::id();

        // Buscamos el intern relacionado con el usuario autenticado
        $intern = Intern::where('user_id', $userId)->first();
        
        if ($intern) {
            // Obtenemos el academic_advisor_id y el project_id del intern
            $academicAdvisorId = $intern->academic_advisor_id;
            $projectId = $intern->project_id;

            // Buscamos el comentario del tutor
            $tutorComment = Comment::where('academic_advisor_id', $academicAdvisorId)
                                    ->where('project_id', $projectId)
                                    ->first();

            // Buscamos los comentarios normales relacionados con el project_id del intern
            $normalComments = Comment::where('project_id', $projectId)
                                    ->where('academic_advisor_id', '!=', $academicAdvisorId)
                                    ->get();

            return view('Daniel.Observation')->with([
                'userId' => $userId,
                'tutorComment' => $tutorComment,
                'normalComments' => $normalComments,
            ]);
        } else {
            // Si no se encuentra un intern relacionado con el usuario autenticado, retorna un error o redirecciona según la lógica de tu aplicación
            return redirect()->route('/student')->with('error', 'No se encontró intern relacionado con este usuario.');
        }
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