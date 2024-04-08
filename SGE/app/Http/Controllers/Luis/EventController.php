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
use Illuminate\Support\Facades\Gate;
use Carbon\Carbon;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // if(Gate::denies('crear-actividad-calendario')){
        //     abort(403,'No tienes permiso para acceder a esta sección.');
        // }
        $user = auth()->user();

        $academicAdvisor = AcademicAdvisor::where('user_id', $user->id)->first();        
        // Aqui deberia ser UserId
        $allEvents = CalendarEvent::with('receiver.user')->where('requester_id', $academicAdvisor->id)->paginate(6);
        
        foreach($allEvents as $event){
            if($event->status !== 'Cancelada'){
                if($event->date_end <= now()) {
                    // Cambiar el estado a 'Terminada' si la fecha de finalización es anterior a la fecha y hora actual
                    $event->status = 'Terminada';
                    $event->save();
                } elseif($event->date_start <= now() && now() < $event->date_end) {
                    // Cambiar el estado a 'En proceso' si la fecha de inicio es anterior a la fecha y hora actual y la fecha de finalización es posterior
                    $event->status = 'En proceso';
                    $event->save();
                } else {
                    // Cambiar el estado a 'Programada' si la fecha de inicio es posterior a la fecha y hora actual
                    $event->status = 'Programada';
                    $event->save();
                }

            }
        }

        return view('Luis.eventsDash', compact('allEvents'));
    }
    
    /**
     * Change status activity
    */

    public function cancelActivity($id){
        // if(Gate::denies('crear-actividad-calendario')){
        //     abort(403,'No tienes permiso para acceder a esta sección.');
        // }
        // dd($id);
        $event = CalendarEvent::find($id);
        $event->status = 'Cancelada';
        $event->save();

        return redirect()->route('actividades.index')->with('cancel_success', 'La actividad ha sido cancelada correctamente');;
    }

    public function ReprogramActivity($id){
        // if(Gate::denies('crear-actividad-calendario')){
        //     abort(403,'No tienes permiso para acceder a esta sección.');
        // }
        // dd($id);
        $event = CalendarEvent::find($id);
        $event->status = 'Programada';
        $event->save();

        return redirect()->route('actividades.index')->with('reprogram_success', 'La actividad ha sido reprogramada correctamente');
    }
    

    /**
     * Display a calendar view.
    */
    public function calendar()
    {
        // if(Gate::denies('leer-calendario')){
        //     abort(403,'No tienes permiso para acceder a esta sección.');
        // }

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
                if($event->date_end <= now()) {
                    // Cambiar el estado a 'Terminada' si la fecha de finalización es anterior a la fecha y hora actual
                    $event->status = 'Terminada';
                    $event->save();
                } elseif($event->date_start <= now() && now() < $event->date_end) {
                    // Cambiar el estado a 'En proceso' si la fecha de inicio es anterior a la fecha y hora actual y la fecha de finalización es posterior
                    $event->status = 'En proceso';
                    $event->save();
                } else {
                    // Cambiar el estado a 'Programada' si la fecha de inicio es posterior a la fecha y hora actual
                    $event->status = 'Programada';
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
                $eventDate = new DateTime($event->date_start);
                //Validar que el mes sea el mismo que el mes actual
                if($eventDate->format('m') === $month){
                    $eventDay = $eventDate->format('d');
                    $eventsPerDay[$eventDay]++;
                }
            }
        }
        return view('Luis.calendar', compact('events', 'todayEvents', 'tomorrowEvents', 'date', 'year', 'month', 'day', 'daysMonth', 'months', 'inicialday', 'eventsPerDay', 'isAcademicAdvisor', 'isIntern'));
    }
    


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // if(Gate::denies('crear-actividad-calendario')){
        //     abort(403,'No tienes permiso para acceder a esta sección.');
        // }
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
        // if(Gate::denies('crear-actividad-calendario')){
        //     abort(403,'No tienes permiso para acceder a esta sección.');
        // }
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

        // Crear objetos DateTime para las fechas proporcionadas
        $date_start = new DateTime($request->date_start);
        $date_end = new DateTime($request->date_end);


        // Validar que no se puedan agregar actividades antes de la hora y fecha actual
        $current_date = new DateTime();
        // dd($current_date);
        if ($date_start < $current_date || $date_end < $current_date) {
            return redirect()->back()->withInput()->with('errorHorario', 'Las sesiones no pueden ser antes de la fecha y hora actual.');
        }
                
        if ($dateOne > $dateTwo) {
            return redirect()->back()->withInput()->with('errorFecha', 'La fecha de finalización de la actividad no puede ser menor a la fecha de inicio');
        }

        //Validar que no haya actividades en el mismo horario
        $events = CalendarEvent::where('date_start', '>=', $request->date_start)
                                ->where('date_start', '<', $request->date_end)
                                ->where('requester_id', $academicAdvisor->id)
                                ->get();

        if (count($events) > 0) {
            return redirect()->back()->withInput()->with('errorHorario', 'Ya existe una actividad programada en este horario');
        }

        // Validar que las citas no sean despues de las 5 pm


        // Obtener la hora límite inicial (8:00 AM)
        $limit_time_start = new DateTime('07:00:00');
        // Obtener la hora límite (5:00 PM)
        $limit_time_end = new DateTime('17:00:00');

        // Comparar las fechas con la hora límite (5:00 PM)
        if ($date_start->format('H:i:s') > $limit_time_end->format('H:i:s') || $date_end->format('H:i:s') > $limit_time_end->format('H:i:s')) {
            return redirect()->back()->withInput()->with('errorHorario', 'Las sesiones no pueden ser después de las 5:00 PM.');
        }
        // Comparar las fechas con la hora límite (7:00 AM)
        if ($date_start->format('H:i:s') < $limit_time_start->format('H:i:s') || $date_end->format('H:i:s') < $limit_time_start->format('H:i:s')) {
            return redirect()->back()->withInput()->with('errorHorario', 'Las sesiones no pueden ser antes de las 7:00 AM.');
        }

        
        // Validar que que las citas no duren más de 4 horas y esten en el mismo dia
        // $diff = $date_end->diff($date_start);
        // $hours = $diff->h;
        // $days = $diff->d;

        // if($hours > 4 || $days > 0){
        //     return redirect()->back()->withInput()->with('errorHorario', 'La actividad no puede durar más de 4 horas');
        // }
        // Validar que las citas sean en el mismo dia
        $diff = $date_end->diff($date_start);
        $days = $diff->d;
        if ($days > 0) {
            return redirect()->back()->withInput()->with('errorHorario', 'Las sesiones deben ser en el mismo día.');
        }

        // Validar que no se puedan agregar actividades los sabados y domingos
        $day = $date_start->format('l');
        if ($day === 'Saturday' || $day === 'Sunday') {
            return redirect()->back()->withInput()->with('errorHorario', 'No se pueden agregar actividades los sabados y domingos');
        }


        // dd($event);
        $event->save();
        return redirect('actividades')->with('success', 'La actividad se ha agregado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // if(Gate::denies('leer-calendario')){
        //     abort(403,'No tienes permiso para acceder a esta sección.');
        // }
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
        // if(Gate::denies('crear-actividad-calendario')){
        //     abort(403,'No tienes permiso para acceder a esta sección.');
        // }
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
        if(Gate::denies('crear-actividad-calendario')){
            abort(403,'No tienes permiso para acceder a esta sección.');
        }
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
    
        // Validar que la fecha de finalización no sea mayor a la fecha de inicio
        if ($dateOne > $dateTwo) {
            return redirect()->back()->withInput()->with('errorFecha', 'La fecha de finalización de la actividad no puede ser mayor a la fecha de inicio');
        }
    
        // Validar que no se puedan agregar actividades antes de la hora y fecha actual
        $current_date = new DateTime();
        if ($dateOne < $current_date || $dateTwo < $current_date) {
            return redirect()->back()->withInput()->with('errorHorario', 'Las sesiones no pueden ser antes de la fecha y hora actual.');
        }
    
        // Validar que no haya actividades en el mismo horario
        $activities = CalendarEvent::where('date_start', '>=', $request->date_start)
                                ->where('date_start', '<', $request->date_end)
                                ->where('requester_id', $academicAdvisor->id)
                                ->get();
    

        foreach ($activities as $activity) {
            if($activity->id != $id){
                $event_start = new DateTime($activity->date_start);
                $event_end = new DateTime($activity->date_end);
                if ($dateOne >= $event_start && $dateTwo <= $event_end) {
                    return redirect()->back()->withInput()->with('errorHorario', 'Ya existe una actividad programada en este horario');
                }
            }
        }
    
        // Obtener la hora límite inicial (8:00 AM) y la hora límite (5:00 PM)
        $limit_time_start = new DateTime('07:00:00');
        $limit_time_end = new DateTime('17:00:00');
    
        // Validar que las sesiones no sean antes de las 8:00 AM ni después de las 5:00 PM
        if ($dateOne->format('H:i:s') < $limit_time_start->format('H:i:s') || $dateTwo->format('H:i:s') < $limit_time_start->format('H:i:s')) {
            return redirect()->back()->withInput()->with('errorHorario', 'Las sesiones no pueden ser antes de las 7:00 AM.');
        }
    
        if ($dateOne->format('H:i:s') > $limit_time_end->format('H:i:s') || $dateTwo->format('H:i:s') > $limit_time_end->format('H:i:s')) {
            return redirect()->back()->withInput()->with('errorHorario', 'Las sesiones no pueden ser después de las 5:00 PM.');
        }

    
        $date_start = new DateTime($request->date_start);
        $date_end = new DateTime($request->date_end);
        // Validar que las citas sean en el mismo dia
        $diff = $date_end->diff($date_start);
        $days = $diff->d;
        if ($days > 0) {
            return redirect()->back()->withInput()->with('errorHorario', 'Las sesiones deben ser en el mismo día.');
        }


        // Validar que no se puedan agregar actividades los sabados y domingos
        $day = $date_start->format('l');
        if ($day === 'Saturday' || $day === 'Sunday') {
            return redirect()->back()->withInput()->with('errorHorario', 'No se pueden agregar actividades los sabados y domingos');
        }
    
        // Actualizar el evento
        $event->update();
        return redirect('actividades')->with('edit_success', 'La actividad ha sido editada correctamente');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // if(Gate::denies('crear-actividad-calendario')){
        //     abort(403,'No tienes permiso para acceder a esta sección.');
        // }

        $event=CalendarEvent::find($id);

        $event->delete();

        return redirect('actividades')->with('delete','ok');
    }
}