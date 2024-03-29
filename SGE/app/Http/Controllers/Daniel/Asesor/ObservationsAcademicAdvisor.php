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

        // Buscar el intern relacionado con el proyecto y el usuario autenticado
        $intern = Intern::where('academic_advisor_id', $userId)
                        ->where('project_id', $project->id)
                        ->first();

        if ($intern) {
            // Obtener el comentario del tutor
            $tutorComment = Comment::where('academic_advisor_id', $intern->academic_advisor_id)
                                    ->where('project_id', $intern->project_id)
                                    ->first();

            // Obtener los comentarios normales relacionados con el proyecto
            $normalComments = Comment::where('project_id', $intern->project_id)
                                    ->whereNotIn('id', function ($query) use ($intern) {
                                        $query->select('id')
                                            ->from('comments')
                                            ->where('academic_advisor_id', $intern->academic_advisor_id);
                                    })
                                    ->get();

            return view('Daniel.asesor.ObservationsAdvisor', compact('project', 'tutorComment', 'normalComments'));
        } else {
            return redirect()->route('/student')->with('error', 'No se encontró intern relacionado con este usuario o proyecto.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Implementar si es necesario.
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
        $intern = Intern::where('academic_advisor_id', $userId)
                        ->where('project_id', $projectId)
                        ->first();

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
            return redirect()->route('/student')->with('error', 'No se encontró intern relacionado con este usuario o proyecto.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Implementar si es necesario.
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Implementar si es necesario.
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Implementar si es necesario.
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Implementar si es necesario.
    }
}
