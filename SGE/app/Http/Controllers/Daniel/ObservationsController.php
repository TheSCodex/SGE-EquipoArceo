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
                ->whereNotIn('id', function ($query) use ($academicAdvisorId) {
                    $query->select('id')
                        ->from('comments')
                        ->where('academic_advisor_id', $academicAdvisorId);
                })
                ->get();

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
        // Validar el formulario
        $request->validate([
            'content' => 'required|string',
        ]);

        // Obtenemos el ID del usuario autenticado
        $userId = Auth::id();

        // Buscamos el intern relacionado con el usuario autenticado
        $intern = Intern::where('user_id', $userId)->first();

        if ($intern) {
            try {
                // Obtener el ID del proyecto del intern
                $projectId = $intern->project_id;

                // Obtener el ID del intern
                $internId = $intern->id;

                // Guardar el comentario en la base de datos
                $comment = new Comment();
                $comment->content = $request->input('content');
                $comment->fecha_hora = now(); // Fecha y hora actual
                $comment->status = 1;
                $comment->project_id = $projectId;
                $comment->interns_id = $internId;
                $comment->save();

                return redirect()->back()->with('success', 'Comentario guardado exitosamente.');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Ocurrió un error al guardar el comentario: ' . $e->getMessage());
            }
        } else {
            // Si no se encuentra un intern relacionado con el usuario autenticado, retorna un error o redirecciona según la lógica de tu aplicación
            return redirect()->route('/estudiante')->with('error', 'No se encontró intern relacionado con este usuario.');
        }
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
