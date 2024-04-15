<?php

namespace App\Http\Controllers\Elizabeth;
use App\Models\Academy; 
use App\Models\Division;
use App\Models\User; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AcademiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function searchAcademies(Request $request)
{
    $query = $request->input('query');

    $academies = Academy::where('name', 'like', '%' . $query . '%')
        ->orWhereHas('president', function ($userQuery) use ($query) {
            $userQuery->where('name', 'like', '%' . $query . '%');
        })
        ->orWhereHas('division', function ($divisionQuery) use ($query) {
            $divisionQuery->where('name', 'like', '%' . $query . '%');
        })
        ->paginate(10);
    $presidents = User::whereIn('id', $academies->pluck('president_id'))->get();
    $divisions = Division::whereIn('id',$academies->pluck('division_id'))->get();
    return view('Elizabeth.Academies.crudAcademies', compact('academies','presidents','divisions'));
}

    public function index()
    {
        $academies = Academy::paginate(10);
        $presidents = User::whereIn('id', $academies->pluck('president_id'))->get();
        $divisions = Division::whereIn('id',$academies->pluck('division_id'))->get();
        return view('Elizabeth.Academies.crudAcademies', compact('academies', 'presidents','divisions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $divisions = Division::all();
        $users = User::where('rol_id', 3)->get();
        return view('Elizabeth.Academies.newAcademies', compact('divisions', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'president_id' => 'required|integer',
            'division_id' => 'required|integer'
        ]);

        $academy = new Academy;
        $academy->name = $validatedData['name'];
        $academy->president_id = $validatedData['president_id'];
        $academy->division_id = $validatedData['division_id'];
        $academy->save();

        return redirect('/panel-academies')->with('successAdd', 'Academia agregada exitosamente!');
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
        $academy = Academy::findOrFail($id);
        $divisions = Division::all();
        $users = User::where('rol_id', 3)->get();
        return view('Elizabeth.Academies.editAcademies', compact('divisions', 'users','academy'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $academy = Academy::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'president_id' => 'required|integer',
            'division_id' => 'required|integer'
        ]);

        $president = User::findOrFail($validatedData['president_id']);
        $president->update(['rol_id' => 3]);

        $academy->update([
            'name'=> $validatedData['name'],
            'division_id'=> $validatedData['division_id'],
            'president_id'=> $validatedData['president_id'],
        ]); 

        return redirect('/panel-academies')->with('successEdit', 'Academia actualizada exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();
            DB::select('CALL proc_delete_academy(?)', [$id]);
            DB::commit();
            
            return redirect()->back()->with('successDelete', '¡Academia eliminada exitosamente!');
        } catch (\Exception $e) {
            DB::rollback();
            
            return redirect()->back()->with('error', 'Error al eliminar la academia: ' . $e->getMessage());
        }
        
    }
}
