<?php

namespace App\Http\Controllers\Luis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Luis\NewEventFormRequest;
use App\Models\AcademicAdvisor;
use App\Models\CalendarEvent;
use App\Models\Intern;
use App\Models\Role;
use App\Models\User;
use DateTime;
use Carbon\Carbon;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        $academicAdvisor = AcademicAdvisor::where('user_id', $user->id)->first();        
        // Aqui deberia ser UserId
        $allEvents = CalendarEvent::with('receiver.user')->where('requester_id', $academicAdvisor->id)->paginate(6);
        
        foreach($allEvents as $event){
            if($event->status !== 'Cancelada'){
                if($event->date_end <= now()){
                    $event->status = 'Terminada';
                    $event->save();
                }
                // if($event->date_start >= now()){
                //     $event->status = 'Programada';
                //     $event->save();
                // }
                // if($event->date_start <= now() && $event->date_end >= now()){
                //     $event->status = 'En curso';
                //     $event->save();
                // }
            }
        }

        return view('Luis.eventsDash', compact('allEvents'));
    }
    
    /**
     * Change status activity
     */

     public function cancelActivity($id){
        // dd($id);
        $event = CalendarEvent::find($id);
        $event->status = 'Cancelada';
        $event->save();

        return redirect('asesor/actividades');
    }
    

    /**
     * Display a calendar view.
     */
    public function calendar()
    {
        $user = auth()->user();

        $rol = Role::where('id', $user->rol_id)->first();
        $events = [];
        $isAcademicAdvisor = False;
        $isIntern = False;


        if($rol->title === 'asesorAcademico'){
            $academicAdvisor = AcademicAdvisor::where('user_id', $user['id'])->first();   
            $events = CalendarEvent::with('receiver.user')->where('requester_id', $academicAdvisor->id)->get();
            $isAcademicAdvisor = True;
        }

        if($rol->title === 'estudiante'){
            $intern = Intern::where('user_id', $user['id'])->first();
            $events = CalendarEvent::with('requester.user')->where('receiver_id', $intern->id)->get();
            // dd($events);
            $isIntern = True;
        }
    
        
        
        // Cambiar el estatus cuando el evento ya pasó
        foreach($events as $event){
            if($event->status !== 'Cancelada'){
                if($event->date_end <= now()){
                    $event->status = 'Terminada';
                    $event->save();
                }
                // if($event->date_start >= now()){
                //     $event->status = 'Programada';
                //     $event->save();
                // }
                // if($event->date_start <= now() && $event->date_end >= now()){
                //     $event->status = 'En proceso';
                //     $event->save();
                // }
            }
        }
    
        // Obtener el evento para hoy
        $todayEvents = $events->where('date_start', '>=', now()->startOfDay())
                                ->where('date_start', '<', now()->endOfDay());
    
        // Obtener el evento para mañana
        $tomorrowEvents = $events->where('date_start', '>=', now()->addDay()->startOfDay())
                                    ->where('date_start', '<', now()->addDay()->endOfDay());
    
        $date = now()->format('Y-m-d');
        $year = now()->format('Y');
        $month = now()->format('m');
        $day = now()->format('d');
        $daysMonth = now()->daysInMonth;
        $months = [
            "01" => "Enero", "02" => "Febrero", "03" => "Marzo", "04" =>  "Abril", 
            "05" =>  "Mayo", "06" =>  "Junio", "07" =>  "Julio", "08" =>  "Agosto", 
            "09" =>  "Septiembre", "10" => "Octubre", "11" =>  "Noviembre", "12" =>  "Diciembre"
        ];
        $inicialday = now()->startOfMonth()->dayOfWeek;
    
        // Cantidad de eventos por día
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
        return view('Luis.calendar', compact('events', 'todayEvents', 'tomorrowEvents', 'date', 'year', 'month', 'day', 'daysMonth', 'months', 'inicialday', 'eventsPerDay', 'isAcademicAdvisor', 'isIntern'));
    }
    


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();

        $academicAdvisor = AcademicAdvisor::where('user_id', $user->id)->first();

        $internsWithUser = Intern::with('user')->where('academic_advisor_id', $academicAdvisor->id)->get();

        return view('Luis.newEventForm', compact('internsWithUser'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewEventFormRequest $request)
    {
        $user = auth()->user();

        $academicAdvisor = AcademicAdvisor::where('user_id', $user->id)->first();

        $event = new \App\Models\CalendarEvent;
        $event->requester_id = $academicAdvisor->id;
        $event->receiver_id = $request->receiver_id;
        $event->title = $request->title;
        $event->eventType = $request->eventType;
        $event->description = $request->description;
        $event->location = $request->location;
        $event->date_start = $request->date_start;
        $event->date_end = $request->date_end;
        $event->status = 'Programada';

        $dateOne = DateTime::createFromFormat('Y-m-d\TH:i', $request->date_start);
        $dateTwo = DateTime::createFromFormat('Y-m-d\TH:i', $request->date_end);
        
        if ($dateOne > $dateTwo) {
            return redirect()->back()->withInput()->with('errorFecha', 'La fecha de finalización de la actividad no puede ser mayor a la fecha de inicio');
        }

        // dd($event);
        $event->save();
        return redirect('asesor/actividades')->with('success', 'La actividad se ha agregado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = auth()->user();
        $rol = Role::where('id', $user->rol_id)->first();

        if($rol->title === 'asesorAcademico'){
            $rol = 'asesorAcademico';

            $academicAdvisor = AcademicAdvisor::where('user_id', $user->id)->first();

            $internsWithUser = Intern::with('user')->where('academic_advisor_id', $academicAdvisor->id)->get();
    
            $event = CalendarEvent::find($id);
    
            $intern = Intern::with('user')->where('id', $event->receiver_id)->first();
            
            return view('Luis.showEvent', compact('event', 'intern', 'rol'));
        }
        if($rol->title === 'estudiante'){
            $rol = 'estudiante';

            $intern = Intern::where('user_id', $user->id)->first();

            $event = CalendarEvent::find($id);

            $academicAdvisor = AcademicAdvisor::with('user')->where('id', $event->requester_id)->first();

            return view('Luis.showEvent', compact('event', 'academicAdvisor', 'intern', 'rol', 'user'));
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = auth()->user();

        $academicAdvisor = AcademicAdvisor::where('user_id', $user->id)->first();

        $internsWithUser = Intern::with('user')->where('academic_advisor_id', $academicAdvisor->id)->get();

        $event = CalendarEvent::find($id);


        // dd($internsWithUser);
        return view('Luis.editEventForm', compact('internsWithUser', 'event'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(NewEventFormRequest $request, string $id)
    {
        $user = auth()->user();

        $academicAdvisor = AcademicAdvisor::where('user_id', $user->id)->first();
        
        $event = CalendarEvent::find($id);
        $event->requester_id = $academicAdvisor->id;
        $event->receiver_id = $request->receiver_id;
        $event->title = $request->title;
        $event->eventType = $request->eventType;
        $event->description = $request->description;
        $event->location = $request->location;
        $event->date_start = $request->date_start;
        $event->date_end = $request->date_end;
        $event->status = $request->status;

        $dateOne = DateTime::createFromFormat('Y-m-d\TH:i', $request->date_start);
        $dateTwo = DateTime::createFromFormat('Y-m-d\TH:i', $request->date_end);

        
        if ($dateOne > $dateTwo) {
            return redirect()->back()->withInput()->with('errorFecha', 'La fecha de finalización de la actividad no puede ser mayor a la fecha de inicio');
        }

        $event->update();
        return redirect('asesor/actividades')->with('edit_success', 'La actividad ha sido editada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $event=CalendarEvent::find($id);

        $event->delete();

        return redirect('asesor/actividades')->with('delete','ok');
    }
}