<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario</title>
    @vite('resources/css/app.css')
</head>
<body>
    @extends('templates/authTemplate')
    @section('contenido')
    <main class="w-full h-full overflow-auto font-montserrat ">
        <div class="flex  w-full ">
            <!-- left side -->
            <div class=" w-72 bg-primaryColor hidden sm:block h-auto">
                <div class=" justify-between items-center p-4 ">
                    <div>
                    <button class=" bg-darkBlue text-white rounded mb-4 font-bold"><a href="{{route('actividades.create')}}" class="px-4 py-2 text-center flex">+</a></button>
                    <button class=" bg-darkBlue text-white rounded mb-4 font-bold"><a href="actividades" class="px-4 py-2 text-center flex">Ver actividades</a></button>
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
                <div class="flex flex-col overflow-y-hidden hover:overflow-y-auto w-full h-[600px]">
                    @if ($todayEvents)
                        @foreach($todayEvents as $todayEvent)
                            <div class="px-4 mb-2">
                                <p class="font-bold text-[#193c45]">Hoy <span class="text-sm text-[#054759]"> {{$day}}/{{$month}}/{{$year}}</span></p>
                            </div>
                            <div class="px-4 mt-4 text-white text-sm">
                                <p class=" font-semibold italic"><span class="inline-block w-4 h-4 rounded-full bg-white mr-2"></span>{{ substr($todayEvent->date_start, 11)}} - {{ substr($todayEvent->date_end, 11)}}</p>
                                <p class=" ml-6 font-semibold"><span class="font-semibold text-darkBlue">Con:</span>{{ $todayEvent['receiver']['user']['name'] }}</p>
                                <p class=" ml-6 font-semibold"><span class="font-semibold text-darkBlue">Asunto:</span> {{ $todayEvent->title }}</p>
                                <p class=" ml-6 font-semibold"><span class="font-semibold text-darkBlue">Propósito:</span> {{ $todayEvent->eventType }}</p>
                                <p class=" ml-6 font-semibold"><span class="font-semibold text-darkBlue">Descripción:</span> {{ $todayEvent->description }}</p>
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
                            <div class="px-4 text-white text-sm">
                                <p class="font-semibold italic"><span class="inline-block w-4 h-4 rounded-full bg-white mr-2"></span>{{ substr($tomorrowEvent->date_start, 11)}} - {{ substr($tomorrowEvent->date_end, 11)}}</p>
                                <p class=" ml-6 font-semibold"><span class="font-semibold text-darkBlue">Con:</span>{{ $tomorrowEvent['receiver']['user']['name'] }}</p>
                                <p class=" ml-6 font-semibold"><span class="font-semibold text-darkBlue">Asunto:</span> {{ $tomorrowEvent->title }}</p>
                                <p class=" ml-6 font-semibold"><span class="font-semibold text-darkBlue">Proposito:</span> {{ $tomorrowEvent->eventType }}</p>
                                <p class=" ml-6 font-semibold"><span class="font-semibold text-darkBlue">Descripción:</span> {{ $tomorrowEvent->description }}</p>
                                <p class=" ml-6 font-semibold"><span class="font-semibold text-darkBlue">Lugar:</span> {{ $tomorrowEvent->location }}</p>
                                <p class=" ml-6 font-semibold"><span class="font-semibold text-darkBlue">Estatus:</span> {{ $tomorrowEvent->status }}</p>
                            </div>
                            <hr class="border-white my-4 w-5/4 m-4">
                        @endforeach
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
                                            <td class="px-2 py-3 md:py-4 text-center border-l-2 border-t-2 border-r-2 border-[#332941] bg-{{ ($event->status === 'Terminada') ? 'primaryColor' : (($event->status === 'Cancelada') ? 'darkBlue' : 'secondaryColor') }} cursor-pointer ">
                                                <a href="{{route('actividades.show', $event->id)}}">
                                                    <div class="px-4">
                                                        <p class="font-bold text-white text-center">{{substr($event['date_start'], 11, 5)}} {{$hour >= 12 ? 'PM' : 'AM'}}</p>

                                                    </div>
                                                </a>
                                            </td>
                                            @php
                                                $infoShown = true;
                                            @endphp
                                        @elseif($hour == $endHour)
                                            <td class="px-2 py-3 md:py-4 border-l-2 border-b-2 border-r-2 border-[#332941] text-center  bg-{{ ($event->status === 'Terminada') ? 'primaryColor' : (($event->status === 'Cancelada') ? 'darkBlue' : 'secondaryColor') }} cursor-pointer">
                                                <a href="{{route('actividades.show', $event->id)}}">
                                                    <div class="px-4">
                                                        {{-- <p class="font-bold text-white text-center">{{substr($event['date_start'], 11, 5)}} {{substr($event['date_start'], 11, 5) > 12 ? 'AM' : 'PM'}}</p> --}}
                                                        <p class="font-bold text-white text-center">{{substr($event['date_end'], 11, 5)}} {{$hour >= 12 ? 'PM' : 'AM'}}</p>
                                                        {{-- <p class="font-bold text-white text-center">Cita</p> --}}
                                                    </div>
                                                </a>
                                            </td>
                                        @else
                                            <td class="px-2 py-3 md:py-4 text-center border-l-2 border-r-2 border-[#332941]  bg-{{ ($event->status === 'Terminada') ? 'primaryColor' : (($event->status === 'Cancelada') ? 'darkBlue' : 'secondaryColor') }} cursor-pointer">
                                                <a href="{{route('actividades.show', $event->id)}}">
                                                    <div class="px-4">
                                                        <p class="font-bold  text-{{ ($event->status === 'Terminada') ? 'primaryColor' : (($event->status === 'Cancelada') ? 'darkBlue' : 'secondaryColor') }} text-center"> - </p>
                                                    </div>
                                                </a>
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
                    <button class="bg-green py-2 px-2 rounded-md text-white mb-5 md:hidden">
                        <a href="{{route('actividades.create')}}">Agregar nuevo evento</a>
                    </button>
                </div>
                <div class="md:hidden w-11/12 grid grid-cols-1 gap-3 mt-5 mx-auto mb-5">
                    @foreach($todayEvents as $todayEvent)
                    <div class="bg-green rounded-lg mx-auto flex flex-col align-middle justify-center">
                        <p class="font-bold text-white mt-5 text-center">{{$day}}/{{$month}}/{{$year}}</p>
                        <p class="font-bold text-white text-center mb-2">{{ substr($todayEvent->date_start, 11)}} - {{ substr($todayEvent->date_end, 11)}}</p>
                        <div class="bg-white rounded-2xl w-11/12 mx-auto mb-2 text-darkGreen">
                            <h1 class="p-3 font-montserrat font-semibold">{{ $todayEvent->title }}</h1>
                            <p class="p-3 font-montserrat font-semibold">Con: {{ $todayEvent['receiver']['user']['name'] }}</p>
                            <p class="p-3 font-montserrat font-semibold">Propósito: {{ $todayEvent->eventType }}</p>
                            <p class="p-3 font-montserrat font-semibold">Descripción: {{ $todayEvent->description }}</p>
                            <p class="p-3 font-montserrat font-semibold">Lugar: {{ $todayEvent->location }}</p>
                            <p class="p-3 font-montserrat font-semibold">Estatus: {{ $todayEvent->status }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>                
            </div>
        </div>
    </main>
    @endsection
</body>
</html>