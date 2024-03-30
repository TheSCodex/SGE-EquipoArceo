<?php

namespace App\Http\Controllers\Elizabeth;
use App\Models\Academy; 
use App\Models\Division; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\Support\Facades\DB;


class DivisionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $divisions = Division::paginate(10);
       $principals = User::whereIn('id', $divisions->pluck('director_id'))->get();
       $assistants = User::whereIn('id',$divisions->pluck('directorAsistant_id'))->get();
        return view('Elizabeth.Divisions.crudDivisiones',compact('divisions','principals','assistants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('Elizabeth.Divisions.newDivision',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'director_id' => 'required|integer',
            'directorAsistant_id' => 'required|integer'
        ]);

        $division = new Division;
        $division->name = $validatedData['name'];
        $division->director_id = $validatedData['director_id'];
        $division->directorAsistant_id = $validatedData['directorAsistant_id'];
        $division->save();

        return redirect('/panel-divisions')->with('success', 'Division added successfully!');
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
        $division = Division::findOrFail($id);
        $users = User::all();
        return view('Elizabeth.Divisions.editDivision',compact('users','division'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $division = Division::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'director_id' => 'required|integer',
            'directorAsistant_id' => 'required|integer'
        ]);

        $director = User::findOrFail($validatedData['director_id']);
        $director->update(['rol_id' => 4]);

        $directorAsistant = User::findOrFail($validatedData['directorAsistant_id']);
        $directorAsistant->update(['rol_id' => 4]);

        $division->update([
            'name'=>$validatedData['name'],
            'director_id'=>$validatedData['director_id'],
            'directorAsistant_id'=>$validatedData['directorAsistant_id']
        ]);

        return redirect('/panel-divisions')->with('success', 'Division updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
                
        try {
            DB::beginTransaction();
            DB::select('CALL proc_delete_division(?)', [$id]);
            DB::commit();
            
            return redirect()->back()->with('success', '¡Division eliminada exitosamente!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Error al eliminar la division: ' . $e->getMessage());
        }
    }
}
