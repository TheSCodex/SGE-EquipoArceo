<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Evento</title>
    @vite('resources/css/app.css')
</head>
<body>
    @extends('templates.academicAdvisorTemplate')
    @section('contenido')
    <section class="flex flex-col justify-center items-center  min-h-full flex-grow">
        <div class="sm:p-8 text-left w-[90%] mb-[2vh] sm:mb-0 ">
            <div class="w-full md:px-[7em] md:my-[2em] flex bg-white">        
                <div class="flex flex-col font-montserrat space-y-5 w-full mt-4 md:mt-0">
                    @csrf
                    <div class="w-full h-fit flex justify-center md:justify-start">
                        <h1 class="text-3xl font-bold">Información de la actividad</h1>
                    </div>
                    <div class="w-full flex flex-col space-y-1">
                        <div class="flex lg:flex-row flex-col items-center md:items-start justify-around">
                            <div class="space-y-2 mb-4 lg:mx-5">
                                <p class="text-sm">¿Con quien desea la cita?:</p>
                                <input type="text" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]"  readonly value='{{$intern['user']['name']}} {{$intern['user']['last_name']}}'>
                            </div>
                            <div class=" space-y-2 mb-4 lg:mx-5">
                                <p class="text-sm">Titulo:</p>
                                <input type="text" id="title" name="title" value="{{ $event->title }}" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Introduce el titulo de la actividad" readonly>
                            </div>
                        </div>
                        <div class="flex lg:flex-row flex-col items-center md:items-start justify-around">
                            <div class=" space-y-2 mb-4 lg:mx-5">
                                <p class="text-sm space-y-2">Tipo de actividad:</p>
                                <input type="text" id="eventType" name="eventType" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Introduce el tipo de actividad" value="{{$event->eventType}}" readonly>
                            </div>
                            <div class=" space-y-2 mb-4 lg:mx-5">
                                <p class="text-sm space-y-2">Descripción:</p>
                                <input id="description" name="description" value="{{ $event->description }}" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Describe brevemente de que tratara la actividad" readonly>
                            </div>
                        </div>
                        <div class="flex lg:flex-row flex-col items-center md:items-start justify-around">
                            <div class=" space-y-2 mb-4 lg:mx-5">
                                <p class="text-sm space-y-2">Ubicación de la actividad:</p>
                                <input type="text" id="location" name="location" value="{{ $event->location }}" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Indica donde se llevara a cabo la actividad" readonly>
                            </div>
                            <div class=" space-y-2 mb-4 lg:mx-5">
                                <p class="text-sm space-y-2">Fecha y hora de inicio de la actividad:</p>
                                <input type="datetime-local" id="date_start" name="date_start" value="{{ $event->date_start }}" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Indica la hora de la actividad" readonly>
                            </div>
                        </div>
                        <div class="flex lg:flex-row flex-col items-center md:items-start justify-around">
                            <div class=" space-y-2 mb-4 lg:mx-5">
                                <p class="text-sm space-y-2">Fecha y hora de fin de la actividad:</p>
                                <input type="datetime-local" id="date_end" name="date_end" value="{{ $event->date_end }}" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Indica la hora de la actividad" readonly>
                            </div>
                            <div class=" space-y-2 mb-4 lg:mx-5 pb-10">
                                <p class="text-sm space-y-2">Estatus de la actividad:</p>
                                <input type="text" id="status" name="status" value="{{ $event->status }}" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Indica el estatus de la actividad" readonly>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
</body>
</html>