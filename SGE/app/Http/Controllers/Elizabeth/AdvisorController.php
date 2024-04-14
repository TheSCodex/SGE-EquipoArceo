<?php

namespace App\Http\Controllers\Elizabeth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BusinessAdvisor;
use Illuminate\Http\RedirectResponse;
use App\Models\Company;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;


class AdvisorController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function searchBusinessAdvisors(Request $request)
    {

        $query = $request->input('query');
        $advisors = BusinessAdvisor::where('name', 'like', '%' . $query . '%')
        ->orWhere('email', 'like', '%' . $query . '%')
        ->orWhere('phone', 'like', '%' . $query . '%')
        ->orWhere('position', 'like', '%' . $query . '%')
        ->orWhereHas('companie_id', function ($companiesQuery) use ($query) {
            $companiesQuery->where('title', 'like', '%' . $query . '%');
        })
        
        ->paginate(5);
        
        // Cargar la vista y pasar los datos
        return view('Elizabeth.crudAsesores', compact('advisors'));


    }

    public function index(Request $request)
{
    $query = $request->input('query');
    $advisorsQuery = BusinessAdvisor::query();

    // Aplicar el filtro de búsqueda si se proporciona una consulta
    if (!empty($query)) {
        $advisorsQuery->where('name', 'like', '%' . $query . '%')
                ->orWhere('email', 'like', '%' . $query . '%');
    }

    $advisors = $advisorsQuery->paginate(5);

    return view('Elizabeth.crudAsesores', compact('advisors', 'query'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::all();
        return view('Elizabeth.formAsesores', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:business_advisors|max:255',
        'phone' => 'required|string|size:10|regex:/^[0-9]+$/',
        'position'=> 'required|string|max:50',
        'companie_id' => 'required|exists:companies,id',

        // Agrega más reglas de validación según sea necesario
    ]);

    BusinessAdvisor::create($request->all());

    return redirect()->route('panel-advisors.index')->with('successAdd', 'Asesor añadido exitosamente');
}



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $advisor=BusinessAdvisor::findOrFail($id);
        return view('Elizabeth.showAsesor', compact('advisor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $companies = Company::all();
    $advisor = BusinessAdvisor::findOrFail($id);
    return view('Elizabeth.editAsesor', compact('advisor', 'companies'));
}
    
    public function update(Request $request, $id)
    {
        $advisor = BusinessAdvisor::findOrFail($id);
    
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:business_advisors,email,'.$id.'|max:255',
            'phone' => 'required|string|size:10|regex:/^[0-9]+$/',
            'position'=> 'required|string|max:50',
            'companie_id' => 'required|exists:companies,id',

            // Agrega más reglas de validación según sea necesario
        ]);
    
        $advisor->update($request->all());
    
        return redirect()->route('panel-advisors.index')->with('successEdit', 'Asesor actualizado exitosamente');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            DB::select('CALL delete_business_advisor(?)', [$id]);
            DB::commit();
            
            return redirect()->back()->with('successDelete', '¡Division eliminada exitosamente!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Error al eliminar la division: ' . $e->getMessage());
        }
    }
    }

    
