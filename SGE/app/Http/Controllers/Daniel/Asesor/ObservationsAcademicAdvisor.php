<?php

namespace App\Http\Controllers\Daniel\Asesor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Models\Intern;
use App\Models\Project;

class ObservationsAcademicAdvisor extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Project $id)
    {
        // Obtener el proyecto usando el ID proporcionado en la ruta
        $project = $id;

        // Obtener el ID del usuario autenticado (asesor académico)
        $userId = Auth::id();

        // Obtener todos los comentarios relacionados con el proyecto
        $comments = Comment::where('project_id', $project->id)->get();

        // Verificar si hay algún comentario del tutor
        $tutorComment = $comments->where('academic_advisor_id', $userId)->first();

        // Filtrar los comentarios normales y los comentarios del estudiante
        $normalComments = $comments->filter(function ($comment) {
            return is_null($comment->interns_id) || $comment->interns_id === 1; // Ajustar el valor según corresponda
        });

        return view('Daniel.asesor.ObservationsAdvisor', compact('project', 'tutorComment', 'normalComments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar el formulario si es necesario

        // Obtener el ID del usuario autenticado
        $userId = Auth::id();

        // Obtener el ID del proyecto desde el formulario
        $projectId = $request->input('projectId');

        // Verificar si el usuario autenticado es un asesor académico
        $intern = Intern::where('academic_advisor_id', $userId)->where('project_id', $projectId)->first();

        if ($intern) {
            try {
                // Guardar el comentario en la base de datos
                $comment = new Comment();
                $comment->content = $request->input('content');
                $comment->fecha_hora = now();
                $comment->status = 1;
                $comment->project_id = $projectId;
                $comment->academic_advisor_id = $userId;
                $comment->save();

                return redirect()->back()->with('success', 'Comentario guardado exitosamente.');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Ocurrió un error al guardar el comentario: ' . $e->getMessage());
            }
        } else {
            return redirect()->route('asesor')->with('error', 'No se encontró intern relacionado con este usuario o proyecto.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    /**
 * Update the specified resource in storage.
 */
public function update(Request $request, $id)
{
    try {
        // Buscar el comentario por su ID
        $comment = Comment::findOrFail($id);

        // Actualizar el estado del comentario a 3 (resuelto y enviado a revisión)
        $comment->status = 3;
        $comment->save();

        // Buscar y actualizar todos los comentarios relacionados
        Comment::where('parent_comment_id', $comment->id)->update(['status' => 3]);

        return redirect()->back()->with('success', 'El comentario y sus comentarios relacionados han sido marcados como resueltos y enviados a revisión.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Ocurrió un error al marcar el comentario como resuelto y enviar a revisión: ' . $e->getMessage());
    }
}

}
