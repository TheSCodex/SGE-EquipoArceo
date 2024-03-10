<?php

namespace App\Http\Controllers\Luis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Luis\NewEventFormRequest;
use App\Models\CalendarEvent;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('Luis.events');
        $events = CalendarEvent::paginate(9);
        return view('Luis.eventsDash', compact('events'));
    }

    /**
     * Display a calendar view.
     */
    public function calendar(){
        $events = CalendarEvent::all();
        
        // Cambiar el estatus cuando el evento ya paso
        foreach ($events as $event) {
            if ($event->date_end <= date('Y-m-d H:i:s')) {
                $event->status = 'Terminada';
                $event->save();
            }
        }
        
        // Obtener el evento para hoy
        $todayEvents = $events->where('date_start', '>=', now()->startOfDay())
                            ->where('date_start', '<', now()->endOfDay());
    
        // Obtener el evento para mañana
        $tomorrowEvents = $events->where('date_start', '>=', now()->addDay()->startOfDay())
                                ->where('date_start', '<', now()->addDay()->endOfDay());


        $date = date('Y-m-d');
        $year = date('Y', strtotime($date));
        $month = date('m', strtotime($date));
        $day = date('d', strtotime($date));
        $daysMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $months = ["01" => "Enero","02" => "Febrero", "03" => "Marzo", "04" =>  "Abril", "05" =>  "Mayo", "06" =>  "Junio", "07" =>  "Julio", "08" =>  "Agosto", "09" =>  "Septiembre", "10" => "Octubre", "11" =>  "Noviembre", "12" =>  "Diciembre"];
        $inicialday = date('N', strtotime("$year-$month-01")); 
        // quantity of events per day
        $eventsPerDay = [];
        for ($i = 1; $i <= $daysMonth; $i++) {
            $dayOfMonth = str_pad($i, 2, '0', STR_PAD_LEFT);
            $eventsPerDay[$dayOfMonth] = 0;
        }
        foreach ($events as $event) {
    // Solo contar los eventos pendientes
        if ($event->status === 'Programada') {
            $eventDate = $event->date_start;
            $eventDay = date('d', strtotime($eventDate));
            $eventsPerDay[$eventDay]++;
        }
        }
        // dd($eventsPerDay);
        return view('Luis.calendar', compact('events', 'todayEvents', 'tomorrowEvents', 'date', 'year', 'month', 'day', 'daysMonth', 'months', 'inicialday', 'eventsPerDay'));
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
    public function store(NewEventFormRequest $request)
    {
        $validatedData = $request->validated();

        $event = new \App\Models\CalendarEvent;
        $event->title = $request->title;
        $event->eventType = $request->eventType;
        $event->description = $request->description;
        $event->location = $request->location;
        $event->date_start = $request->date_start;
        $event->date_end = $request->date_end;
        $event->status = 'Programada';
        $event->save();
        return redirect('eventos')->with('success', 'El evento se ha agregado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $event = CalendarEvent::find($id);
        return view('Luis.showEvent', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $event = CalendarEvent::find($id);
        return view('Luis.editEventForm', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NewEventFormRequest $request, string $id)
    {
        $event = CalendarEvent::find($id);

        $event->title = $request->title;
        $event->eventType = $request->eventType;
        $event->description = $request->description;
        $event->location = $request->location;
        $event->date_start = $request->date_start;
        $event->date_end = $request->date_end;
        $event->status = $request->status;
        $event->update();
        return redirect('eventos')->with('edit_success', 'El Evento ha sido editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $event=CalendarEvent::find($id);

        $event->delete();

        return redirect()->route('eventos.index')->with('delete','ok');
    }
}