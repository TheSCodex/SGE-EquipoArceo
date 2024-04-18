<?php

namespace App\Http\Controllers\Daniel;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Intern;
use App\Models\User;
use App\Models\AcademicAdvisor;
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
            $normalComments = Comment::where('project_id', $projectId)->get();

            // Iteramos sobre los comentarios normales y asignamos el nombre del usuario correspondiente
            foreach ($normalComments as $comment) {
                if ($comment->interns_id) {
                    // Si el comentario es de un estudiante, obtenemos su nombre
                    $student = User::find($comment->interns_id);
                    $comment->loggedUserName = $student ? $student->name : "Estudiante Desconocido";
                } else {
                    // Si el comentario es del asesor, obtenemos su nombre a partir del academic_advisor_id
                    $advisor = AcademicAdvisor::find($comment->academic_advisor_id);
                    if ($advisor) {
                        $user = User::find($advisor->user_id);
                        $comment->loggedUserName = $user ? $user->name . ' ' . $user->last_name : "Asesor Desconocido";
                    } else {
                        $comment->loggedUserName = "Asesor Desconocido";
                    }
                }
            }

            return view('Daniel.Projects.Observation')->with([
                'userId' => $userId,
                'tutorComment' => $tutorComment,
                'normalComments' => $normalComments,
            ]);
        } else {
            // Si no se encuentra un intern relacionado con el usuario autenticado, retorna un error o redirecciona según la lógica de tu aplicación
            return redirect()->route('/estudiante')->with('error', 'No se encontró intern relacionado con este usuario.');
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
