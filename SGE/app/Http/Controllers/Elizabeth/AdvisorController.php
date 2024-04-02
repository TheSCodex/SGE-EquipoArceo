<?php

namespace App\Http\Controllers\Elizabeth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BusinessAdvisor;
use Illuminate\Http\RedirectResponse;
use App\Models\Company;


class AdvisorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener los asesores de la base de datos
        $advisors = BusinessAdvisor::paginate(10);
        // Cargar la vista y pasar los datos
        return view('Elizabeth.crudAsesores', compact('advisors'));
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

    return redirect()->route('panel-advisors.index')->with('success', 'Asesor añadido exitosamente');
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
    
        return redirect()->route('panel-advisors.index')->with('success', 'Asesor actualizado exitosamente');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $advisor = BusinessAdvisor::findOrFail($id);
        $advisor->delete();
    
        return redirect()->route('panel-advisors.index')->with('success', 'Asesor eliminado exitosamente');
    }
    
}
