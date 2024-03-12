<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario</title>
    @vite('resources/css/app.css')
    

</head>
<body>
    @extends('templates.academicAdvisorTemplate')
    @section('contenido')
    @php
        $date = date('Y-m-d');
        $year = date('Y', strtotime($date));
        $month = date('m', strtotime($date));
        $day = date('d', strtotime($date));
        $daysMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $months = ["01" => "Enero","02" => "Febrero", "03" => "Marzo", "04" =>  "Abril", "05" =>  "Mayo", "06" =>  "Junio", "07" =>  "Julio", "08" =>  "Agosto", "09" =>  "Septiembre", "10" => "Octubre", "11" =>  "Noviembre", "12" =>  "Diciembre"];
        $inicialday = date('N', strtotime("$year-$month-01")); 
    @endphp
    <main class="w-full h-full overflow-auto ">
        <div class="flex  w-full ">
            <!-- Lado izquierdo -->
            <div class=" w-72 bg-green hidden sm:block">
                <div class=" justify-between items-center p-4 ">
                    <div>
                    <button class=" bg-[#57c0b4] text-white rounded mb-4 font-bold"><a href="{{route('eventos.create')}}" class="px-4 py-2 text-center flex">+</a></button>
                    </div>
                    <div class="flex ">
                        <h2 class="text-lg text-white font-roboto">{{$months[$month]}} <span class=" text-[#054759]"> {{$year}} </span> </h2>
                    {{-- <div class="ml-12">
                        <button class="text-white text-lg mr-2 font-bold">&lt;</button>
                        <button class="text-white text-lg font-bold">&gt;</button>
                    </div> --}}
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
                            <div class="flex flex-col cursor-default">
                                @if ($i == $day)
                                <h1 class="mx-auto text-zinc-900 font-mono rounded-full bg-white px-2 text-center">{{$i}}</h1>
                                <div class="flex mt-1">
                                    <div class="mr-1 w-1 h-1 rounded-full bg-blue-500"></div>
                                    <div class="mr-1 w-1 h-1 rounded-full bg-purple-500"></div>
                                    <div class=" w-1 h-1 rounded-full bg-emerald-900"></div>
                                </div>                                    
                                @else
                                <h1 class="mx-auto text-white font-mono">{{$i}}</h1>
                                <div class="flex mt-1">
                                    <div class="mr-1 w-1 h-1 rounded-full bg-blue-500"></div>
                                    <div class="mr-1 w-1 h-1 rounded-full bg-purple-500"></div>
                                    <div class=" w-1 h-1 rounded-full bg-emerald-900"></div>
                                </div>
                                @endif

                            </div>
                        @endfor
                    </div>
                </div>
                <!-- Línea gris -->
                <hr class="border-white my-4 w-5/4 m-4">
                <!-- Hoy y fecha -->
                <div class="px-4 mb-2">
                    <p class="font-bold text-[#193c45]">Hoy <span class="text-sm text-[#054759]"> {{$day}}/{{$month}}/{{$year}}</span></p>
                </div>
                <!-- Eventos -->
                <div class="px-4 text-white text-sm">
                    <p><span class="inline-block w-4 h-4 rounded-full bg-white mr-2"></span>8:00 - 9:00 AM</p>
                    <p class=" ml-6">Reunion con Jose Roberto</p>
                </div>
                <div class="px-4 mt-4 text-white text-sm">
                    <p><span class="inline-block w-4 h-4 rounded-full bg-white mr-2"></span>8:00 - 9:00 AM</p>
                    <p class=" ml-6">Revision De Documentacion</p>
                </div>
    
                <hr class="border-white my-4 w-5/4 m-4">
                <!-- Mañana -->
                <div class="px-4 mb-2 ">
                    <p class="  text-white">Mañana <span class="text-sm"> {{$day+1}}/{{$month}}/{{$year}}</span></p>
                </div>
                <!-- Eventos -->
                <div class="px-4 text-white text-sm">
                    <p><span class="inline-block w-4 h-4 rounded-full bg-white mr-2"></span>8:00 - 9:00 AM</p>
                    <p class=" ml-6">Reunion con Jose Roberto</p>
                </div>
                <div class="px-4 mt-4 text-white text-sm">
                    <p><span class="inline-block w-4 h-4 rounded-full bg-white mr-2"></span>8:00 - 9:00 AM</p>
                    <p class=" ml-6">Reunion con Jose Roberto</p>
                </div>
    
                <hr class="border-white my-4 w-5/4 m-4">
            </div>
            <!-- Lado derecho -->
            <div class="w-full overflow-hidden">
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
                        <tr class="bg-white w-full">
                            <th class="px-2 py-2 md:py-8 border font-medium text-gray-500 whitespace-nowrap">7 AM</th>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-2 py-3 md:py-8 border font-medium text-gray-500 whitespace-nowrap hidden lg:block">7 AM</td>
                        </tr>
                        <tr class="bg-white">
                            <th class="px-2 py-2 md:py-8 border  font-medium text-gray-500 whitespace-nowrap">8 AM</th>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-2 py-3 md:py-8 border font-medium text-gray-500 whitespace-nowrap hidden lg:block">8 AM</td>
                        </tr>
                        <tr class="bg-white">
                            <th class="px-2 py-2 md:py-8 border  font-medium text-gray-500 whitespace-nowrap">9 AM</th>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-2 py-3 md:py-8 border font-medium text-gray-500 whitespace-nowrap hidden lg:block">9 AM</td>
                        </tr>
                        <tr class="bg-white">
                            <th class="px-2 py-2 md:py-8 border  font-medium text-gray-500 whitespace-nowrap">10 AM</th>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-2 py-3 md:py-8 border font-medium text-gray-500 whitespace-nowrap hidden lg:block">10 AM</td>
                        </tr>
                        <tr class="bg-white">
                            <th class="px-2 py-2 md:py-8 border  font-medium text-gray-500 whitespace-nowrap">11 AM</th>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-2 py-3 md:py-8 border font-medium text-gray-500 whitespace-nowrap hidden lg:block">11 AM</td>
                        </tr>
                        <tr class="bg-white">
                            <th class="px-2 py-2 md:py-8 border  font-medium text-gray-500 whitespace-nowrap">12 AM</th>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-2 py-3 md:py-8 border font-medium text-gray-500 whitespace-nowrap hidden lg:block">12 AM</td>
                        </tr>
                        <tr class="bg-white">
                            <th class="px-2 py-2 md:py-8 border  font-medium text-gray-500 whitespace-nowrap">1  PM</th>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-2 py-3 md:py-8 border font-medium text-gray-500 whitespace-nowrap hidden lg:block">1 PM</td>
                        </tr>
                        <tr class="bg-white">
                            <th class="px-2 py-2 md:py-8 border  font-medium text-gray-500 whitespace-nowrap">2  PM</th>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-2 py-3 md:py-8 border font-medium text-gray-500 whitespace-nowrap hidden lg:block">2 PM</td>
                        </tr>
                        <tr class="bg-white">
                            <th class="px-2 py-2 md:py-8 border  font-medium text-gray-500 whitespace-nowrap">3  PM</th>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-2 py-3 md:py-8 border font-medium text-gray-500 whitespace-nowrap hidden lg:block">3 PM</td>
                        </tr>
                        <tr class="bg-white">
                            <th class="px-2 py-2 md:py-8 border  font-medium text-gray-500 whitespace-nowrap">4  PM</th>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-2 py-3 md:py-8 border font-medium text-gray-500 whitespace-nowrap hidden lg:block">4 PM</td>
                        </tr>
                        <tr class="bg-white">
                            <th class="px-2 py-2 md:py-8 border  font-medium text-gray-500 whitespace-nowrap">5  PM</th>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-6 py-3 md:py-4 border "></td>
                            <td class="px-2 py-3 md:py-8 border font-medium text-gray-500 whitespace-nowrap hidden lg:block">5 PM</td>
                        </tr>
                    </tbody>
                </table>
                {{-- <hr class="border-zinc-100 w-full mt-5 md:hidden"> --}}
                <div class="flex w-11/12 mx-auto flex-col items-center">
                    <h1 class=" text-center font-montserrat font-semibold md:hidden text-xl my-5">Eventos proximos</h1>
                    <button class="bg-green py-2 px-2 rounded-md text-white mb-5 md:hidden">
                        <a href="{{route('eventos.create')}}">Agregar nuevo evento</a>
                    </button>
                </div>
                <div class="md:hidden w-11/12 grid grid-cols-2 gap-3 mt-5 mx-auto mb-5">
                    <div class="bg-green rounded-lg mx-auto flex flex-col align-middle justify-center">
                        <p class="font-bold text-white mt-5 text-center">{{$day}}/{{$month}}/{{$year}}</p>
                        <p class="font-bold text-white text-center mb-5">8:00 - 9:00 AM</p>
                        <div class="bg-white rounded-2xl w-11/12 mx-auto mb-5 text-darkGreen">
                            <h1 class="p-3 font-montserrat font-semibold">Reunión con Jose Roberto</h1>
                        </div>
                    </div>
                    <div class="bg-green rounded-lg mx-auto flex flex-col align-middle justify-center">
                        <p class="font-bold text-white mt-5 text-center">{{$day}}/{{$month}}/{{$year}}</p>
                        <p class="font-bold text-white text-center mb-5">8:00 - 9:00 AM</p>
                        <div class="bg-white rounded-2xl w-11/12 mx-auto mb-5 text-darkGreen">
                            <h1 class="p-3 font-montserrat font-semibold">Reunión con Jose Roberto</h1>
                        </div>
                    </div>
                    <div class="bg-green rounded-lg mx-auto flex flex-col align-middle justify-center">
                        <p class="font-bold text-white mt-5 text-center">{{$day}}/{{$month}}/{{$year}}</p>
                        <p class="font-bold text-white text-center mb-5">8:00 - 9:00 AM</p>
                        <div class="bg-white rounded-2xl w-11/12 mx-auto mb-5 text-darkGreen">
                            <h1 class="p-3 font-montserrat font-semibold">Reunión con Jose Roberto</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @endsection
</body>
</html>
