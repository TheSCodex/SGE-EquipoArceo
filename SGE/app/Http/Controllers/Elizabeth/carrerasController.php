<?php

namespace App\Http\Controllers\Elizabeth;

use App\Http\Controllers\Controller;
use App\Models\careers_info_view;
use Illuminate\Http\Request;
use App\Models\Career;   
use App\Models\Division;


class carrerasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  public function index()
{
    $careers = careers_info_view::all();
    
    return view('Elizabeth.cruds.carreras', compact('careers'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Elizabeth.cruds.newCareer');
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'division_id' => 'required|string|max:255',
    ]);

    $division = Division::where('name', $validatedData['division'])->first();

    $career = new careers_info_view();
    $career->name = $validatedData['name'];

    $career->division_id = $division->id;

    $career->save();

    return redirect('/panel-careers'); 
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
    public function edit($id)
{
    $career = careers_info_view::findOrFail($id);
    return view('Elizabeth.cruds.editCareer', compact('career'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    // Validar los datos del formulario
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'division_name' => 'required|string|max:255',
        'academy_name' => 'required|string|max:255',
        'president_name' => 'required|string|max:255',
    ]);

    // Encontrar la carrera que se va a actualizar
    $career = careers_info_view::findOrFail($id);

    // Actualizar los datos de la carrera
    $career->update([
        'name' => $validatedData['name'],
        'division_name' => $validatedData['division_name'],
        'academy_name' => $validatedData['academy_name'],
        'president_name' => $validatedData['president_name'],
    ]);

    // Redireccionar a alguna vista después de la actualización
    return redirect()->back()->with('success', '¡Carrera actualizada exitosamente!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $career = Career::findOrFail($id);
    $career->delete();
    
    return redirect()->back()->with('success', '¡Carrera eliminada exitosamente!');
}

}
