<?php

namespace App\Http\Controllers\Eliud\Documentos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $docs = [
            ['titulo' => 'Control Estadía', 'descripcion' => 'El formato de control...', 'destinatario' => 'rarceo@utcancun.edu.mx', 'origen' => 'Elsa Rios'],
            ['titulo' => 'Reporte de libros', 'descripcion' => 'Los libros totales al...', 'destinatario' => 'rarceo@utcancun.edu.mx', 'origen' => 'Elsa Rios'],
            ['titulo' => 'Control Estadía', 'descripcion' => 'El formato de control...', 'destinatario' => 'rarceo@utcancun.edu.mx', 'origen' => 'Elsa Rios'],
            ['titulo' => 'Reporte de libros', 'descripcion' => 'Los libros totales al...', 'destinatario' => 'rarceo@utcancun.edu.mx', 'origen' => 'Elsa Rios'],
            ['titulo' => 'Control Estadía', 'descripcion' => 'El formato de control...', 'destinatario' => 'rarceo@utcancun.edu.mx', 'origen' => 'Elsa Rios'],
            ['titulo' => 'Reporte de libros', 'descripcion' => 'Los libros totales al...', 'destinatario' => 'rarceo@utcancun.edu.mx', 'origen' => 'Elsa Rios'],
            ['titulo' => 'Control Estadía', 'descripcion' => 'El formato de control...', 'destinatario' => 'rarceo@utcancun.edu.mx', 'origen' => 'Elsa Rios'],
            ['titulo' => 'Reporte de libros', 'descripcion' => 'Los libros totales al...', 'destinatario' => 'rarceo@utcancun.edu.mx', 'origen' => 'Elsa Rios'],
        ];
    
        //$docs = Docs::paginate(10);

        return view('Eliud.crud.crud', compact('docs'));
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
        // dd($searchTerm);
    
        $filteredDocs = collect([
            ['titulo' => 'Control Estadía', 'descripcion' => 'El formato de control...', 'destinatario' => 'rarceo@utcancun.edu.mx', 'origen' => 'Elsa Rios'],
            ['titulo' => 'Reporte de libros', 'descripcion' => 'Los libros totales al...', 'destinatario' => 'rarceo@utcancun.edu.mx', 'origen' => 'Elsa Rios'],
            ['titulo' => 'Control Estadía', 'descripcion' => 'El formato de control...', 'destinatario' => 'rarceo@utcancun.edu.mx', 'origen' => 'Elsa Rios'],
            ['titulo' => 'Reporte de libros', 'descripcion' => 'Los libros totales al...', 'destinatario' => 'rarceo@utcancun.edu.mx', 'origen' => 'Elsa Rios'],
            ['titulo' => 'Control Estadía', 'descripcion' => 'El formato de control...', 'destinatario' => 'rarceo@utcancun.edu.mx', 'origen' => 'Elsa Rios'],
            ['titulo' => 'Reporte de libros', 'descripcion' => 'Los libros totales al...', 'destinatario' => 'rarceo@utcancun.edu.mx', 'origen' => 'Elsa Rios'],
            ['titulo' => 'Control Estadía', 'descripcion' => 'El formato de control...', 'destinatario' => 'rarceo@utcancun.edu.mx', 'origen' => 'Elsa Rios'],
            ['titulo' => 'Reporte de libros', 'descripcion' => 'Los libros totales al...', 'destinatario' => 'rarceo@utcancun.edu.mx', 'origen' => 'Elsa Rios'],
        ]);
    
        if (!empty($searchTerm)) {
            $filteredDocs = $filteredDocs->filter(function ($doc) use ($searchTerm) {
                return stripos($doc['titulo'], $searchTerm) !== false || stripos($doc['descripcion'], $searchTerm) !== false || stripos($doc['origen'], $searchTerm) !== false;
            });
        }

        $docs = $filteredDocs;
    
        return view('Eliud.crud.crud', compact('docs',));
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
    public function destroy(string $id)
    {
        //
    }
}
