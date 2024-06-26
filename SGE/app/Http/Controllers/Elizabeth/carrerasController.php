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
use Illuminate\Support\Facades\DB;

    // Cuando pase de nuevo, puedes ir linea por linea, viendo que opcion impe menos todo y ya decides en base a eso

class carrerasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function searchCareers(Request $request)
    {

        $query = $request->input('query');
        
        $careers = Career::where('name', 'like', '%' . $query . '%')
        ->orWhereHas('academy', function ($academiesQuery) use ($query) {
            $academiesQuery->where('name', 'like', '%' . $query . '%');
        })->paginate(5);
        
        $academies = Academy::where('name', 'like', '%' . $query . '%')
        ->orWhereHas('careers', function ($careersQuery) use ($query) {
            $careersQuery->where('name', 'like', '%' . $query . '%');
        })->paginate(10);

        // Cargar la vista y pasar los datos
        return view('Elizabeth.cruds.carreras', compact('careers','academies'));


    }
    public function index()
{
    $careers = Career::paginate(10);

    $academies = Academy::whereIn('id', $careers->pluck('academy_id'))->get();
    $divisions = Division::whereIn('id', $academies->pluck('division_id'))->get();
    $presidents = User::whereIn('id',$academies->pluck('president_id'))->get();


    return view('Elizabeth.cruds.carreras', compact('careers', 'academies','divisions','presidents'))->with('careers', $careers);
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $academies = Academy::all();
        $divisions = Division::all();
        $presidents = User::all();
        return view('Elizabeth.cruds.newCareer',compact('academies','divisions','presidents'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{   
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'academy_id' => 'required|integer'
    ]);
    

    $career = new Career();
    $career->name = $validatedData['name'];
    $career->academy_id = $validatedData['academy_id'];
    $career->save();

    return redirect('/panel-careers')->with('successAdd', 'Carrera agregada exitosamente!');
}
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * 
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
        'academy_id' => 'required|integer',
    ]);
    
    $career->update([
        'name'=>$validatedData['name'],
        'academy_id'=>$validatedData['academy_id']
    ]);
    
    return redirect('/panel-careers')->with('successEdit', 'Career actualizada exitosamente!');
 

}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        try {
            DB::beginTransaction();
            DB::select('CALL proc_delete_career(?)', [$id]);
            DB::commit();
            
            return redirect()->back()->with('successDelete', '¡Carrera eliminada exitosamente!');
        } catch (\Exception $e) {
            DB::rollback();
            
            return redirect()->back()->with('error', 'Error al eliminar la carrera: ' . $e->getMessage());
        }

}
}