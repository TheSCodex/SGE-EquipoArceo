<?php

namespace App\Http\Controllers\Elizabeth;

use App\Http\Controllers\Controller;
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
        $careers = Career::all();
        return view('Elizabeth.cruds.carreras',compact('careers'));
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

    $career = new Career();
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
    public function edit(string $id)
    {

        $careers = Career::all(); 
        $careers = Career::findOrFail($id);
        return view('Elizabeth.cruds.editCareer', compact('careers'));


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
            {
            
                $career = Career::findOrFail($id);
                $career->delete();
                return redirect()->back()->with('success', '¡Carrera eliminada exitosamente!');
            }        
    }
}
