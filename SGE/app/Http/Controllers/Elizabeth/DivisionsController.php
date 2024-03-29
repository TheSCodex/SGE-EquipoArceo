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
        $academies = Academy::all();
        $divisions = Division::all();
        $presidents = User::all();
        return view('Elizabeth.Divisions.newDivision',compact('academies','divisions','presidents'));
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
