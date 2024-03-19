<?php

namespace App\Http\Controllers\Elizabeth;
// testeando que todo funcione
use App\Http\Controllers\Controller;
use App\Models\Academy;
use App\Models\careers_info_view;
use Illuminate\Http\Request;
use App\Models\Career;   
use App\Models\Division;
use App\Models\User;

    // Cuando pase de nuevo, puedes ir linea por linea, viendo que opcion impe menos todo y ya decides en base a eso

class carrerasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $careers = Career::all();
    $academies = Academy::whereIn('id', $careers->pluck('academy_id'))->get();
    $divisions = Division::whereIn('id', $academies->pluck('division_id'))->get();
    $presidents = User::whereIn('id',$divisions->pluck('director_id'))->get();


    return view('Elizabeth.cruds.carreras', compact('careers', 'academies','divisions','presidents'));
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
    public function edit($id)
{
    $career = Career::findOrFail($id);
    $divisions = Division::all();
    $academies = Academy::all();
    $users = User::where('rol_id', '!=', 1)->get();
    return view('Elizabeth.cruds.editCareer', compact('career','divisions','academies','users'));
}


    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, $id)
{
    $career = Career::findOrFail($id);
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',

    ]);
    $career->update($validatedData);
    return redirect('/panel-careers')->with('success', 'Career updated successfully!');
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
