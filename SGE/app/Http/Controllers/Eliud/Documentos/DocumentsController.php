<?php

namespace App\Http\Controllers\Eliud\Documentos;

use App\Http\Controllers\Controller;
use App\Models\DocRevisions;
use App\Models\FileHistory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class DocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $docs = FileHistory::all();
    
        if ($docs->isEmpty()) {
            $message = "No se encontraron registros.";
            return view('Eliud.crud.crud', compact('message'));
        } else {
            $docs = FileHistory::paginate(10);
            return view('Eliud.crud.crud', compact('docs'));
        }
    }
    

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
    
        if (!empty($searchTerm)) {
            $docs = FileHistory::where('title', 'like', '%' . $searchTerm . '%')
                ->orWhere('advisor_identifier', 'like', '%' . $searchTerm . '%')
                ->orWhere('advisor_email', 'like', '%' . $searchTerm . '%')
                ->orWhere('advisor_name', 'like', '%' . $searchTerm . '%')
                ->orWhere('advisor_lastName', 'like', '%' . $searchTerm . '%')
                ->get();
        } else {
            $docs = FileHistory::all();
        }
    
        $docs = FileHistory::paginate(10);
        return view('Eliud.crud.crud', compact('docs'));
    }
    
    public function UpdateDocRevision(Request $request, $id)  
    {
        $request->validate([
            'revision_number' => 'required',
            'revision_id' => 'required',
        ]);
        
        $doc = DocRevisions::find($id);
        if (!$doc) {
            return redirect()->back()->with('error', 'Document not found.');
        }
    
        $doc->update($request->all());
        $doc->save();

        return redirect()->route('reportes-director')
            ->with('success', 'Documento actualizado exitosamente.');
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id):RedirectResponse
    {
        $doc = FileHistory::find($id);    
        if ($doc) {
            $doc->delete();    
        } else {
            return response()->json(['message' => 'Documento no encontrado'], 404);
        }
       
        if (Auth::user()->role->title == 'director') {
            return redirect()->route('documentos-director.index');
        } else {
            return redirect()->route('documentos-asistente.index');
        }
    }

}    