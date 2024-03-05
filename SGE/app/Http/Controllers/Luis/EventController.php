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
        $events = CalendarEvent::paginate(5);
        return view('Luis.eventsDash', compact('events'));
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
        $event->status = 'programada';
        $event->save();
        return redirect('eventos');
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
        return redirect('eventos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $event = CalendarEvent::find($id);

        $event->delete();
        return redirect('eventos');
    }
}
