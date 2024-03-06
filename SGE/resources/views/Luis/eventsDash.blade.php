<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eventos</title>
</head>
<body>
    @extends('templates.academicAdvisorTemplate')
    @section('contenido')
    {{-- @php
        $eventos = [
            ['id' => 1, 'date' => 'Martes 20/02/2024', 'cont1' => 'Revision de memoria', 'time1' => '8:40 a 9:30', 'cont2' => 'Reunion con Mario Hugo', 'time2' => '10:50 a 11:40'],
            ['id' => 2, 'date' => 'Martes 20/02/2024', 'cont1' => 'Revision de memoria', 'time1' => '8:40 a 9:30', 'cont2' => 'Reunion con Mario Hugo', 'time2' => '10:50 a 11:40'],
            ['id' => 3, 'date' => 'Martes 20/02/2024', 'cont1' => 'Revision de memoria', 'time1' => '8:40 a 9:30', 'cont2' => 'Reunion con Mario Hugo', 'time2' => '10:50 a 11:40'],
            ['id' => 4, 'date' => 'Martes 20/02/2024', 'cont1' => 'Revision de memoria', 'time1' => '8:40 a 9:30', 'cont2' => 'Reunion con Mario Hugo', 'time2' => '10:50 a 11:40'],
            ['id' => 5, 'date' => 'Martes 20/02/2024', 'cont1' => 'Revision de memoria', 'time1' => '8:40 a 9:30', 'cont2' => 'Reunion con Mario Hugo', 'time2' => '10:50 a 11:40'],
            ['id' => 6, 'date' => 'Martes 20/02/2024', 'cont1' => 'Revision de memoria', 'time1' => '8:40 a 9:30', 'cont2' => 'Reunion con Mario Hugo', 'time2' => '10:50 a 11:40'],
            ['id' => 7, 'date' => 'Martes 20/02/2024', 'cont1' => 'Revision de memoria', 'time1' => '8:40 a 9:30', 'cont2' => 'Reunion con Mario Hugo', 'time2' => '10:50 a 11:40'],
            ['id' => 8, 'date' => 'Martes 20/02/2024', 'cont1' => 'Revision de memoria', 'time1' => '8:40 a 9:30', 'cont2' => 'Reunion con Mario Hugo', 'time2' => '10:50 a 11:40'],
            ['id' => 9, 'date' => 'Martes 20/02/2024', 'cont1' => 'Revision de memoria', 'time1' => '8:40 a 9:30', 'cont2' => 'Reunion con Mario Hugo', 'time2' => '10:50 a 11:40']
        ];
    @endphp --}}


    <main class="bg-white flex flex-col justify-center align-middle">
        <div class="border-b border-gray-200 pb-2 mx-auto mt-5 w-11/12 md:flex md:items-center md:justify-between">
            <h1 class="font-bold font-montserrat text-xl mb-2 text-center md:text-left">Eventos</h1>
            <div class="flex items-center flex-row justify-end">
                <div class="flex-1 md:mr-2">
                    <div class="flex justify-between border border-primaryColor items-center rounded-xl py-2 px-4">
                        <input id="search" placeholder="Buscador" type="text" class="placeholder-primaryColor focus:outline-none font-montserrat py-1 px-2 justify-start">
                        <img class="w-6 h-6 mx-2 justify-end" src="/img/logos/buscar.svg">
                    </div>
                </div>
                <div class="hidden md:flex md:flex-col  md:items-center md:mx-3">
                    <button class="bg-green text-base py-1 px-3 mb-1 rounded-md text-white">▲</button>
                    <button class="bg-green text-base py-1 px-3 rounded-md text-white">▼</button>
                </div>
                <a href="{{route('eventos.create')}}" class="hidden md:block bg-green text-lg py-2 px-4 rounded-md text-white md:ml-4">Agregar nuevo evento</a>
            </div>
            <!-- Elementos que se mostrarán solo en dispositivos móviles -->
            <div class="flex justify-between md:hidden mt-2 mx-auto">
                <div class="flex">
                    <button class="bg-green text-lg py-2 px-4 rounded-md text-white mr-2">▲</button>
                    <button class="bg-green text-lg py-2 px-4 rounded-md text-white">▼</button>
                </div>
                <a href="{{route('eventos.create')}}" class="bg-green text-lg py-2 px-4 rounded-md text-white ml-2">Agregar nuevo evento</a>
            </div>
        </div>
        
        
        </div>
        <div class="w-10/12 mx-auto grid md:grid-cols-2 lg:grid-cols-3 gap-4 mt-5 mb-5">
            @foreach ($events as $event)
                <div class="mx-auto mb-5 bg-white rounded-xl drop-shadow-2xl">
                    <div class="p-4">
                        <h3 class="text-darkBlue font-bold text-xl">{{$event['date']}}</h3>
                        <ul class="border-l border-dashed border-primaryColor font-montserrat">
                            <li>
                                <div class="flex-start flex items-center pt-3">
                                    <div class="-ml-[5px] mr-3 h-[9px] w-[9px] rounded-full bg-primaryColor"></div>
                                    <h4 class="text-lg font-semibold">{{$event['title']}}</h4>
                                </div>
                                <div class="ml-4">
                                    <time class="text-[#888] text-sm">Proposito: {{$event['eventType']}}</time>
                                </div>
                                <div class="ml-4">
                                    <time class="text-[#888] text-sm">Lugar: {{$event['location']}}</time>
                                </div>
                                <div class="ml-4">
                                    <time class="text-[#888] text-sm">Estatus: {{$event['status']}}</time>
                                </div>
                                <div class="ml-4">
                                    <time class="text-[#888] text-sm">Hora: {{ substr($event['date_start'], 11)}} - {{ substr($event['date_end'], 11)}}</time>
                                </div>
                            </li>
                        </ul>
                        <div class="flex justify-center space-x-12 mt-4">
                            <div class="flex justify-center align-middle">
                                <a href="{{route('eventos.edit', $event->id)}}">
                                    <img src="/img/logos/pencil.svg">
                                </a>
                            </div>
                            <div class="flex justify-center align-middle">
                                <form action="{{ route('eventos.destroy', $event->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">
                                        <img src="/img/logos/trash.svg">
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>      
@endsection

</body>
</html>