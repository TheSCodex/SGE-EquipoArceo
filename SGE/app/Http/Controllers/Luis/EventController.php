<?php

namespace App\Http\Controllers\Luis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CalendarEvent;
use Carbon\Carbon;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('Luis.events');
        
        return view('Luis.eventsDash');
    }

    /**
     * Display a calendar view.
     */
    public function calendar(){
        return view('Luis.calendar');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Luis.newEventForm');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    // Validar los datos del formulario
    $request->validate([
        'eventType' => 'required',
        'title' => 'required',
        'description' => 'required',
        'location' => 'required',
        'date' => 'required|date_format:Y-m-d\TH:i', // Asegura que la fecha sea en el formato correcto
    ]);

    // Convertir la fecha y hora en un objeto Carbon
    $date = Carbon::createFromFormat('Y-m-d\TH:i', $request->input('date'));

    // Crear un nuevo evento en la base de datos
    $event = CalendarEvent::create([
        'event_type' => $request->input('eventType'),
        'title' => $request->input('title'),
        'description' => $request->input('description'),
        'location' => $request->input('location'),
        'date' => $date,
    ]);

    // Redirigir a la página deseada después de guardar el evento
    return redirect()->route('calendar')->with('success', 'Evento creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
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
        //
    }
}
