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
    public function destroy($id)
    {
        
        try {
            DB::beginTransaction();
            DB::select('CALL proc_delete_academy(?)', [$id]);
            DB::commit();
            
            return redirect()->back()->with('success', '¡Academia eliminada exitosamente!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Error al eliminar la academia: ' . $e->getMessage());
        }
    }
}
