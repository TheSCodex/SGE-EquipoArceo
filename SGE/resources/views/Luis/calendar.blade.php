<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario</title>
    @vite('resources/css/app.css')
    <style>
        .divEvent {
            position: relative; /* Asegura que el tooltip se posicione correctamente respecto a este elemento */
        }
        .divEvent .contentTip {
            position: absolute;
            top: -25px;
            left: -120px; /* Alinea el tooltip horizontalmente */
            transform: translateX(-50%); /* Centra el tooltip horizontalmente */
            width: 200px;
            background: #374151;
            padding: 20px;
            box-sizing: border-box;
            border-radius: 4px;
            visibility: hidden;
            opacity: 0;
            transition: 0.5s;
            z-index: 999; /* Asegura que el tooltip se muestre sobre otros elementos */
        }
        .divEvent .contentTip::before {
            content: '';
            position: absolute;
            width: 30px;
            height: 30px;
            background: #374151;
            bottom: 50%;
            left: 180px; /* Coloca el pseudo-elemento a la derecha del tooltip */
            transform: translateY(50%) rotate(45deg); /* Alinea el pseudo-elemento */
            z-index: -1;
        }
        .divEvent:hover .contentTip{
            visibility: visible;
            opacity: 1;

        }
    </style>
</head>
<body>
    @extends('templates/authTemplate')
    @section('contenido')
    {{-- <main class="w-full h-full overflow-auto font-montserrat"> --}}
    <main class="sm:p-8 text-left w-[90%] mb-[2vh] sm:mb-0 mx-auto ">
        <div class="flex  w-full">
            <!-- left side -->
            <div class=" w-72 bg-primaryColor hidden sm:block h-auto">
                <div class=" justify-between items-center p-4 ">
                    <div class="flex justify-center align-middle">
                        @if ($isAcademicAdvisor == True)
                        <button class=" bg-darkBlue text-white rounded mb-4 font-bold mx-auto"><a href="{{route('actividades.create')}}" class="px-4 py-2 text-center flex">Agregar actividad</a></button>
                        {{-- <button class=" bg-darkBlue text-white rounded mb-4 font-bold"><a href="actividades" class="px-4 py-2 text-center flex">Ver actividades</a></button>                         --}}
                        @endif
                    </div>
                    <div class="flex ">
                        <h2 class="text-lg text-white font-roboto font-semibold">{{$months[$month]}} <span class=" text-[#054759]"> {{$year}} </span> </h2>
                    </div>
                </div>
                <!-- Calendario -->
                <div class=" px-4 py-2 ">
                    <div class="grid grid-cols-7 text-sm text-white font-mono">
                        <div class="mx-auto">Dom</div>
                        <div class="mx-auto">Lun</div>
                        <div class="mx-auto">Mar</div>
                        <div class="mx-auto">Mie</div>
                        <div class="mx-auto">Jue</div>
                        <div class="mx-auto">Vie</div>
                        <div class="mx-auto">Sab</div>
                    </div>
                    <div class="grid grid-cols-7 gap-2">
                        @if ($inicialday != 7) {{-- Si el primer día del mes no es domingo --}}
                            @for ($e = 0; $e < $inicialday; $e++) {{-- Creamos divs vacíos para los días anteriores al inicio del mes --}}
                                <div></div>
                            @endfor
                        @endif
                        @for ($i = 1; $i <= $daysMonth; $i++)
                        @php
                            $dayOfMonth = str_pad($i, 2, '0', STR_PAD_LEFT);
                        @endphp
                        <div class="flex flex-col cursor-default text-center w-full justify-center align-middle">
                            @if ($i == $day)
                                <h1 class="mx-auto text-zinc-900 font-mono rounded-full bg-white px-1 text-center">{{ $dayOfMonth }}</h1>
                            @else
                                <h1 class="mx-auto text-white font-mono">{{ $dayOfMonth }}</h1>
                            @endif
                            @if ($eventsPerDay[$dayOfMonth] > 0)
                                @php
                                    $quantityEvents = $eventsPerDay[$dayOfMonth];
                                @endphp
                                <div class="flex m-auto justify-between align-middle mt-0.5">
                                    @for($j = 1; $j <= $quantityEvents && $j <= 3; $j++)
                                        <div class="w-1 h-1 rounded-full bg-white mx-0.5"></div>
                                    @endfor
                               </div>
                            @endif
                        </div>
                    @endfor
                    </div>
                </div>
                <hr class="border-white my-4 w-5/4 m-4">
                <div class="flex flex-col overflow-y-hidden hover:overflow-y-auto w-full h-[700px]">
                    @if (count($todayEvents) == 0 )
                    <p class="font-bold text-white text-xl text-center ">¡No hay eventos pendientes para hoy!</p>
                    <hr class="border-white my-4 w-5/4 m-4">
                    @endif
                    @if ($todayEvents)
                        @foreach($todayEvents as $todayEvent)
                            <div class="px-4 mb-2">
                                <p class="font-bold text-[#193c45]">Hoy <span class="text-sm text-[#054759]"> {{$day}}/{{$month}}/{{$year}}</span></p>
                            </div>
                            <div class="px-4 mt-4 text-white text-sm break-words">
                                <p class=" font-semibold italic"><span class="inline-block w-4 h-4 rounded-full bg-white mr-2"></span>{{ substr($todayEvent->date_start, 11)}} - {{ substr($todayEvent->date_end, 11)}}</p>
                                @if ($isAcademicAdvisor == True)
                                    <p class=" ml-6 "><span class="font-semibold text-darkBlue">Con:</span> {{ $todayEvent['receiver']['user']['name'] }}</p>
                                     
                                 @else
                                     
                                 <p class=" ml-6 font-semibold"><span class="font-semibold text-darkBlue">Con:</span> {{ $todayEvent['requester']['user']['name'] }}</p>
                                @endif
                                {{-- <p class=" ml-6 font-semibold"><span class="font-semibold text-darkBlue">Asunto:</span> {{ $todayEvent->title }}</p> --}}
                                {{-- <p class=" ml-6 font-semibold"><span class="font-semibold text-darkBlue">Propósit}o:</span> {{ $todayEvent->eventType }}</p> --}}
                                {{-- <p class=" ml-6 font-semibold"><span class="font-semibold text-darkBlue">Descripción:</span> {{ $todayEvent->description }}</p> --}}
                                <p class=" ml-6 font-semibold"><span class="font-semibold text-darkBlue">Lugar:</span> {{ $todayEvent->location }}</p>
                                <p class=" ml-6 font-semibold"><span class="font-semibold text-darkBlue">Estatus:</span> {{ $todayEvent->status }}</p>
                            </div>
                            <hr class="border-white my-4 w-5/4 m-4">
                        @endforeach
                    @endif
                    @if ($tomorrowEvents)
                        @if($day < $daysMonth)
                            @php
                                $nextDay = $day + 1;
                                $nextMonth = $month;
                                $nextYear = $year;
                            @endphp
                        @else
                            @php
                                $nextDay = 1;
                                $nextMonth = ($month == 12) ? 1 : $month + 1;
                                $nextYear = ($month == 12) ? $year + 1 : $year;
                            @endphp
                        @endif
                        <!-- Mañana -->
                        @foreach($tomorrowEvents as $tomorrowEvent)
                            <div class="px-4 mb-2 ">
                                <p class="font-bold text-[#193c45]">Mañana <span class="text-sm text-[#054759]">{{$nextDay }}/{{$month}}/{{$year}}</span></p>
                            </div>
                            <!-- Detalles del evento de mañana -->
                            <div class="px-4 text-white text-sm  break-words">
                                <p class="font-semibold italic"><span class="inline-block w-4 h-4 rounded-full bg-white mr-2"></span>{{ substr($tomorrowEvent->date_start, 11)}} - {{ substr($tomorrowEvent->date_end, 11)}}</p>
                                @if ($isAcademicAdvisor == True)
                                <p class=" ml-6 font-semibold"><span class="font-semibold text-darkBlue">Con:</span> {{ $tomorrowEvent['receiver']['user']['name'] }}</p>
                                @else
                                <p class=" ml-6 font-semibold"><span class="font-semibold text-darkBlue">Con:</span> {{ $tomorrowEvent['requester']['user']['name'] }}</p>
                                @endif
                                <p class=" ml-6 font-semibold"><span class="font-semibold text-darkBlue">Asunto:</span> {{ $tomorrowEvent->title }}</p>
                                <p class=" ml-6 font-semibold"><span class="font-semibold text-darkBlue">Proposito:</span> {{ $tomorrowEvent->eventType }}</p>
                                <p class=" ml-6 font-semibold"><span class="font-semibold text-darkBlue">Descripción:</span> {{ $tomorrowEvent->description }}</p>
                                <p class=" ml-6 font-semibold"><span class="font-semibold text-darkBlue">Lugar:</span> {{ $tomorrowEvent->location }}</p>
                                <p class=" ml-6 font-semibold"><span class="font-semibold text-darkBlue">Estatus:</span> {{ $tomorrowEvent->status }}</p>
                            </div>
                            <hr class="border-white my-4 w-5/4 m-4">
                        @endforeach
                    @endif
                    @if (count($tomorrowEvents) == 0)
                    <p class="font-bold text-white text-xl text-center">¡No hay eventos pendientes para mañana!</p>
                    <hr class="border-white my-4 w-5/4 m-4">
                    @endif
                </div>
            </div>

            <!-- right side -->
            <div class="w-full overflow-auto md:overflow-hidden ">
                <table class="w-full text-sm text-left h-auto font-montserrat ">
                    <thead class="text-xs uppercase w-full">
                        @php
                        $actualDate = date('Y-m-d');                        
                        $actualDayWeek = date('w', strtotime($actualDate));                        
                        $sundayDate = date('Y-m-d', strtotime("-$actualDayWeek days", strtotime($actualDate)));                        
                        $weekDays = array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado');
                        $weekDayscel = array('Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb');
                        
                        @endphp                    
                        <tr class="text-center w-full">
                            <th class="px-2 py-2 text-gray-500">EST <br>GMT-5</br></th>
                            @for ($i = 0; $i < 7; $i++)
                                <th class="px-2 lg:px-6 py-3 border text-gray-500 bg-gray-50">
                                    <h1 class="hidden lg:block">{{ $weekDays[$i] }}</h1>
                                    <h1 class="lg:hidden">{{ $weekDayscel[$i] }}</h1>
                                    <p class="text-lg text-black">{{ date('d', strtotime("$sundayDate +$i days")) }}</p>
                                </th>
                            @endfor
                            <th class="px-2 py-2 text-gray-500 hidden lg:block">EST <br>GMT-5</br></th>
                        </tr>
                    </thead>
                    <tbody class="w-full">
                        @for ($hour = 07; $hour <= 17; $hour++)
                            <tr class="bg-white">
                                <td class="px-2 py-2 md:py-8 border font-medium text-gray-500 whitespace-nowrap">
                                    {{ $hour < 10 ? '0'.$hour : $hour }} {{ $hour < 12 ? 'AM' : 'PM' }}
                                </td>
                                @for ($i = 0; $i < 7; $i++)
                                    	@php
                                            $currentHour = str_pad($hour, 2, '0', STR_PAD_LEFT) . ':00:00';
                                            $eventInHour = null;
                                            $infoShown = false;
                                            foreach ($events as $event) {
                                                $startHour = (int)substr($event['date_start'], 11, 2);
                                                $endHour = (int)substr($event['date_end'], 11, 2);
                                                if ((date('d', strtotime("$sundayDate +$i days")) === substr($event['date_start'], 8, 2)) && ($month === substr($event['date_start'], 5, 2))) {
                                                    if ($hour >= $startHour && $hour <= $endHour) {
                                                        $eventInHour = $event;
                                                        break;
                                                    }
                                                }
                                            }
                                        @endphp
                                    @if ($eventInHour)
                                        @if ($hour == $startHour && !$infoShown)
                                            <td class="divEvent px-2 py-3 md:py-4 text-center border-l-2 border-t-2 border-r-2 border-[#332941] cursor-pointer {{ ($event['status'] == 'Programada') ? 'bg-primaryColor' : (($event['status'] == 'Terminada') ? 'bg-[#B2B2B2]' : (($event['status'] == 'Cancelada') ? 'bg-[#eb7575]' : 'bg-[#344D67]')) }}" data-href="{{ $isAcademicAdvisor ? 'actividades' : route('estudiante-actividades.show', $event->id) }}">
                                                {{-- <td class="divEvent px-2 py-3 md:py-4 text-center border-l-2 border-t-2 border-r-2 border-[#332941] cursor-pointer {{ ($event['status'] == 'Programada') ? 'bg-primaryColor' : (($event['status'] == 'Terminada') ? 'bg-[#B2B2B2]' : (($event['status'] == 'Cancelada') ? 'bg-[#eb7575]' : 'bg-[#344D67]')) }}" data-href="{{ $isAcademicAdvisor ? route('actividades.show', $event->id) : route('estudiante-actividades.show', $event->id) }}"> --}}
                                                @if ($isAcademicAdvisor == True)
                                                    <a href="actividades">
                                                        {{-- <a href="{{route('actividades.show', $event->id)}}"> --}}
                                                        <div class="px-4">
                                                            <p class="font-bold text-white text-center">{{substr($event['date_start'], 11, 5)}} {{$hour >= 12 ? 'PM' : 'AM'}}</p>
                                                            {{-- <p class="font-bold text-white text-center">{{substr($event['date_end'], 11, 5)}} {{substr($event['date_end'], 11, 5) > 12 ? 'AM' : 'PM'}}</p> --}}
                                                            {{-- <p class="font-bold text-white text-center">Cita</p> --}}
                                                        </div>
                                                    </a>
                                                @else
                                                        <a href="{{route('estudiante-actividades.show', $event->id)}}">
                                                            <div class="px-4">
                                                                <p class="font-bold text-white text-center">{{substr($event['date_start'], 11, 5)}} {{$hour >= 12 ? 'PM' : 'AM'}}</p>
                                                                {{-- <p class="font-bold text-white text-center">{{substr($event['date_end'], 11, 5)}} {{substr($event['date_end'], 11, 5) > 12 ? 'AM' : 'PM'}}</p> --}}
                                                                {{-- <p class="font-bold text-white text-center">Cita</p> --}}
                                                            </div>
                                                        </a>
                                                @endif
                                                <div class="contentTip break-words">
                                                    <p class="text-white"><span class="font-semibold italic">Titulo: </span>{{$eventInHour->title}}</p>
                                                    <p class="text-white"><span class="font-semibold italic">Tipo: </span>{{$eventInHour->eventType}}</p>
                                                    <p class="text-white"><span class="font-semibold italic">Descripción: </span>{{$eventInHour->description}}</p>
                                                    <p class="text-white"><span class="font-semibold italic">Lugar: </span>{{$eventInHour->location}}</p>
                                                    <p class="text-white"><span class="font-semibold italic">Estatus: </span>{{$eventInHour->status}}</p>
                                                </div>

                                            </td>
                                            @php
                                                $infoShown = true;
                                            @endphp
                                        @elseif($hour == $endHour)
                                            <td class="divEvent px-2 py-3 md:py-4 border-l-2 border-b-2 border-r-2 border-[#332941] text-center  {{ ($event['status'] == 'Programada') ? 'bg-primaryColor' : (($event['status'] == 'Terminada') ? 'bg-[#B2B2B2]' : (($event['status'] == 'Cancelada') ? 'bg-[#eb7575]' : 'bg-[#344D67]')) }} cursor-pointer" data-href="{{ $isAcademicAdvisor ? 'actividades' : route('estudiante-actividades.show', $event->id) }}">
                                                {{-- <td class="divEvent px-2 py-3 md:py-4 border-l-2 border-b-2 border-r-2 border-[#332941] text-center  {{ ($event['status'] == 'Programada') ? 'bg-primaryColor' : (($event['status'] == 'Terminada') ? 'bg-[#B2B2B2]' : (($event['status'] == 'Cancelada') ? 'bg-[#eb7575]' : 'bg-[#344D67]')) }} cursor-pointer" data-href="{{ $isAcademicAdvisor ? route('actividades.show', $event->id) : route('estudiante-actividades.show', $event->id) }}"> --}}
                                                @if ($isAcademicAdvisor == True)
                                                    <a href="actividades">
                                                        {{-- <a href="{{route('actividades.show', $event->id)}}"> --}}
                                                        <div class="px-4">
                                                            {{-- <p class="font-bold text-white text-center">{{substr($event['date_start'], 11, 5)}} {{substr($event['date_start'], 11, 5) > 12 ? 'AM' : 'PM'}}</p> --}}
                                                            <p class="font-bold text-white text-center">{{substr($event['date_end'], 11, 5)}} {{$hour >= 12 ? 'PM' : 'AM'}}</p>
                                                            {{-- <p class="font-bold text-white text-center">Cita</p> --}}
                                                        </div>
                                                    </a>
                                                    @else
                                                    <a href="{{route('estudiante-actividades.show', $event->id)}}">
                                                        <div class="px-4">
                                                            {{-- <p class="font-bold text-white text-center">{{substr($event['date_start'], 11, 5)}} {{substr($event['date_start'], 11, 5) > 12 ? 'AM' : 'PM'}}</p> --}}
                                                            <p class="font-bold text-white text-center">{{substr($event['date_end'], 11, 5)}} {{$hour >= 12 ? 'PM' : 'AM'}}</p>
                                                            {{-- <p class="font-bold text-white text-center">Cita</p> --}}
                                                        </div>
                                                    </a>

                                                @endif
                                                <div class="contentTip break-words">
                                                    <p class="text-white"><span class="font-semibold italic">Titulo: </span>{{$eventInHour->title}}</p>
                                                    <p class="text-white"><span class="font-semibold italic">Tipo: </span>{{$eventInHour->eventType}}</p>
                                                    <p class="text-white"><span class="font-semibold italic">Descripción: </span>{{$eventInHour->description}}</p>
                                                    <p class="text-white"><span class="font-semibold italic">Lugar: </span>{{$eventInHour->location}}</p>
                                                    <p class="text-white"><span class="font-semibold italic">Estatus: </span>{{$eventInHour->status}}</p>
                                                </div>                                         
                                            </td>
                                        @else
                                            <td class="divEvent px-2 py-3 md:py-4 text-center border-l-2 border-r-2 border-[#332941]  {{ ($event['status'] == 'Programada') ? 'bg-primaryColor' : (($event['status'] == 'Terminada') ? 'bg-[#B2B2B2]' : (($event['status'] == 'Cancelada') ? 'bg-[#eb7575]' : 'bg-[#344D67]')) }} cursor-pointer" data-href="{{ $isAcademicAdvisor ? 'actividades' : route('estudiante-actividades.show', $event->id) }}">
                                                {{-- <td class="divEvent px-2 py-3 md:py-4 text-center border-l-2 border-r-2 border-[#332941]  {{ ($event['status'] == 'Programada') ? 'bg-primaryColor' : (($event['status'] == 'Terminada') ? 'bg-[#B2B2B2]' : (($event['status'] == 'Cancelada') ? 'bg-[#eb7575]' : 'bg-[#344D67]')) }} cursor-pointer" data-href="{{ $isAcademicAdvisor ? route('actividades.show', $event->id) : route('estudiante-actividades.show', $event->id) }}"> --}}
                                                @if ($isAcademicAdvisor == True)
                                                    <a href="actividades">
                                                        {{-- <a href="{{route('actividades.show', $event->id)}}"> --}}
                                                        <div class="px-4">
                                                            <p class="font-bold  {{ ($event['status'] == 'Programada') ? 'text-primaryColor' : (($event['status'] == 'Terminada') ? 'text-[#B2B2B2]' : (($event['status'] == 'Cancelada') ? 'text-[#eb7575]' : 'bg-[#344D67]')) }} text-center"> - </p>
                                                        </div>
                                                    </a>
                                                        
                                                    @else
                                                        <a href="{{route('estudiante-actividades.show', $event->id)}}">
                                                            <div class="px-4">
                                                                <p class="font-bold  {{ ($event['status'] == 'Programada') ? 'text-primaryColor' : (($event['status'] == 'Terminada') ? 'text-[#B2B2B2]' : (($event['status'] == 'Cancelada') ? 'text-[#eb7575]' : 'bg-[#344D67]')) }} text-center"> - </p>
                                                            </div>
                                                        </a>
                                                @endif
                                                <div class="contentTip break-words">
                                                    <p class="text-white"><span class="font-semibold italic">Titulo: </span>{{$eventInHour->title}}</p>
                                                    <p class="text-white"><span class="font-semibold italic">Tipo: </span>{{$eventInHour->eventType}}</p>
                                                    <p class="text-white"><span class="font-semibold italic">Descripción: </span>{{$eventInHour->description}}</p>
                                                    <p class="text-white"><span class="font-semibold italic">Lugar: </span>{{$eventInHour->location}}</p>
                                                    <p class="text-white"><span class="font-semibold italic">Estatus: </span>{{$eventInHour->status}}</p>
                                                </div>
                                            </td>
                                        @endif
                                    @else
                                            <td class="px-2 py-3 md:py-4 border">
                                                <div class="px-4 mb-2">
                                                    <p class="font-bold text-[#054759]"></span></p>
                                                </div>
                                                <div class="px-4 mt-4 text-sm">
                                                    <p class="ml-6"></p>
                                                </div>
                                                <hr class="border-white my-4 w-5/1 m-4">
                                            </td>
                                    @endif
                                    {{-- <th class="px-2 lg:px-6 py-3 border text-gray-500 bg-gray-50">
                                        <h1 class="hidden lg:block">{{ $weekDays[$i] }}</h1>
                                        <h1 class="lg:hidden">{{ $weekDayscel[$i] }}</h1>
                                        <p class="text-lg text-black">{{ date('d', strtotime("$sundayDate +$i days")) }}</p>
                                    </th> --}}
                                    {{-- <td class="px-2 py-3 md:py-4 border">
                                        <div class="px-4 mb-2">
                                            <p class="font-bold text-[#193c45]"><span class="text-sm text-[#054759]"></span></p>
                                        </div>
                                        <div class="px-4 mt-4 text-sm">
                                            <p class="ml-6"></p>
                                        </div>
                                        <hr class="border-white my-4 w-5/1 m-4">
                                    </td> --}}
                                @endfor
                                <td class="px-2 py-2 md:py-8 border font-medium text-gray-500 whitespace-nowrap hidden lg:block">
                                    {{ $hour < 10 ? '0'.$hour : $hour }} {{ $hour < 12 ? 'AM' : 'PM' }}
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
                {{-- <hr class="border-zinc-100 w-full mt-5 md:hidden"> --}}
                <div class="flex w-11/12 mx-auto flex-col items-center">
                    <h1 class=" text-center font-montserrat font-semibold md:hidden text-xl my-5">Eventos de hoy: {{$eventsPerDay[$day]}}</h1>
                    @if ($isAcademicAdvisor == True)
                    <button class="bg-primaryColor py-2 px-2 rounded-md text-white mb-5 md:hidden">
                        <a href="{{route('actividades.create')}}">Agregar nuevo evento</a>
                    </button>
                        
                    @endif
                </div>
                <div class="md:hidden w-11/12 grid grid-cols-1 gap-3 mt-5 mx-auto mb-5">
                    @foreach($todayEvents as $todayEvent)
                    <div class="{{ ($todayEvent['status'] == 'Programada') ? 'bg-primaryColor' : (($event['status'] == 'Terminada') ? 'bg-darkBlue' : (($event['status'] == 'Cancelada') ? 'bg-[#B31312]' : 'bg-[#968C83]')) }} rounded-lg mx-auto flex flex-col align-middle justify-center">
                        <p class="font-bold text-white mt-5 text-center">{{$day}}/{{$month}}/{{$year}}</p>
                        <p class="font-bold text-white text-center mb-2">{{ substr($todayEvent->date_start, 11)}} - {{ substr($todayEvent->date_end, 11)}}</p>
                        <div class="bg-white rounded-2xl w-11/12 mx-auto mb-2 {{ ($todayEvent['status'] == 'Programada') ? 'text-primaryColor' : (($event['status'] == 'Terminada') ? 'text-darkBlue' : (($event['status'] == 'Cancelada') ? 'text-[#B31312]' : 'text-[#968C83]')) }}">
                            <h1 class="px-3 py-2 font-montserrat font-semibold">{{ $todayEvent->title }}</h1>
                            @if ($isAcademicAdvisor == True)
                            <p class="p-3 font-montserrat font-semibold">Con: {{ $todayEvent['receiver']['user']['name'] }}</p>
                            @endif
                            <p class="p-3 font-montserrat font-semibold">Con: {{ $todayEvent['requester']['user']['name'] }}</p>
                            <p class="px-3 py-2 font-montserrat font-semibold">Propósito: {{ $todayEvent->eventType }}</p>
                            <p class="px-3 py-2 font-montserrat font-semibold">Descripción: {{ $todayEvent->description }}</p>
                            <p class="px-3 py-2 font-montserrat font-semibold">Lugar: {{ $todayEvent->location }}</p>
                            <p class="px-3 py-2 font-montserrat font-semibold">Estatus: {{ $todayEvent->status }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>                
            </div>
        </div>
    </main>
    @endsection
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var tdElements = document.querySelectorAll("td[data-href]");
            tdElements.forEach(function(td) {
                td.addEventListener("click", function() {
                    var url = this.getAttribute("data-href");
                    if (url) {
                        window.location.href = url;
                    }
                });
            });
        });
    </script>
    
</body>
</html>