<?php

namespace App\Http\Controllers;

use App\Models\BusinessSector;
use Illuminate\Http\Request;
use App\Models\Company;

class companiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies =  Company::all();
        return view('Elizabeth/Companies/companies', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $businessSector = BusinessSector::all();
        return view('Elizabeth/Companies/companies_form', compact('businessSector'));
    }

    /**
     * Store a newly created resource in storage.
     */
   

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'email' => 'required|string|email|max:255',
        'registration_date' => 'required|date',
        'rfc' => 'required|string|max:255',
        'business_sector_id' => 'required|exists:business_sector,id', // Asegúrate de que el business_sector_id exista en la tabla business_sectors
    ]);

    $company = new Company();
    $company->fill($validatedData);
    $company->save();

    return redirect()->route('companies.index')->with('success', '¡Empresa creada exitosamente!');
}


    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
{
    $businessSector = BusinessSector::all(); // Asegúrate de tener los sectores empresariales disponibles para el formulario
    $company = Company::findOrFail($id); // Encuentra la empresa que se está editando
    return view('Elizabeth/Companies/companies_form_edit', compact('company', 'businessSector'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        // Validar los datos entrantes
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|string|email|max:255',
            'registration_date' => 'required|date',
            'rfc' => 'required|string|max:255',
            'business_sector_id' => 'required|exists:business_sector,id', // Asegúrate de que el business_sector_id exista en la tabla business_sectors
        ]);
    
        // Encuentra la empresa por su ID
        $company = Company::findOrFail($id);
    
        // Actualiza los datos de la empresa con los datos validados
        $company->update($validatedData);
    
        // Redirige con un mensaje de éxito
        return redirect()->route('companies.index')->with('success', '¡Empresa creada exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Encuentra la empresa por su ID
        $company = Company::findOrFail($id);

        // Elimina la empresa
        $company->delete();

        // Retorna un mensaje de éxito
        return redirect()->back()->with('success', '¡Empresa eliminada exitosamente!');
    }
}
