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
    {{-- <main class="w-10/12 md:w-7/12 xl:w-1/3 mx-auto rounded-xl p-6 shadow-2xl border-2 border-secondaryColor my-10">
        <h1 class="text-2xl font-semibold mb-4 font-montserrat bg-white">Editar Evento</h1>
        <form action="{{ route('eventos.update', $event->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="receiver_id" class="block text-gray-700 font-montserrat mb-2">¿Con quien desea la cita?:</label>
                @error('receiver_id')
                <h1 class="text-red text-md font-semibold">{{ $message }}</h1>
                @enderror
                <input type="text" id="receiver_id" name="receiver_id" class="w-full border-2 border-zinc-100  rounded-md px-4 py-2 focus:outline-none focus:border-primaryColor" placeholder="Introduce la persona con quien desea la cita">
            </div>
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-montserrat mb-2">Titulo:</label>
                @error('title')
                <h1 class="text-red text-md font-semibold">{{ $message }}</h1>
                @enderror
                <input type="text" id="title" name="title" value="{{ $event->title }}" class="w-full border-2 border-zinc-100  rounded-md px-4 py-2 focus:outline-none focus:border-primaryColor" placeholder="Introduce el titulo del evento">
            </div>
            <div class="mb-4">
                <label for="eventType" class="block text-gray-700 font-montserrat mb-2">Tipo de evento:</label>
                @error('eventType')
                <h1 class="text-red text-md font-semibold">{{ $message }}</h1>
                @enderror
                <input type="text" id="eventType" name="eventType" value="{{ $event->eventType }}" class="w-full border-2 border-zinc-100  rounded-md px-4 py-2 focus:outline-none focus:border-primaryColor" placeholder="Introduce el tipo de evento">
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-montserratmb-2">Descripción:</label>
                @error('description')
                <h1 class="text-red text-md font-semibold">{{ $message }}</h1>
                @enderror
                <textarea id="description" name="description" class="w-full border-2 border-zinc-100 rounded-md px-4 py-2 focus:outline-none focus:border-primaryColor" rows="3" placeholder="Describe brevemente de que tratara el evento">{{ $event->description }}</textarea>
            </div>
            <div class="mb-4">
                <label for="location" class="block text-gray-700font-montserrat mb-2">Ubicación del evento:</label>
                @error('location')
                <h1 class="text-red text-md font-semibold">{{ $message }}</h1>
                @enderror
                <input type="text" id="location" name="location" value="{{ $event->location }}" class="w-full border-2 border-zinc-100 rounded-md px-4 py-2 focus:outline-none focus:border-blue-primaryColor" placeholder="Indica donde se llevara a cabo el evento">
            </div>
            <div class="mb-4">
                <label for="date_start" class="block text-gray-700font-montserrat mb-2">Fecha y hora de inicio del evento:</label>
                @error('date_start')
                <h1 class="text-red text-md font-semibold">{{ $message }}</h1>
                @enderror
                <input type="datetime-local" id="date_start" name="date_start" value="{{ $event->date_start }}" class="w-full border-2 border-zinc-100 rounded-md px-4 py-2 focus:outline-none focus:border-primaryColor" placeholder="Indica la hora del evento">
            </div>
            <div class="mb-4">
                <label for="date_end" class="block text-gray-700font-montserrat mb-2">Fecha y hora de fin del evento:</label>
                @error('date_end')
                <h1 class="text-red text-md font-semibold">{{ $message }}</h1>
                @enderror
                <input type="datetime-local" id="date_end" name="date_end" value="{{ $event->date_end }}" class="w-full border-2 border-zinc-100 rounded-md px-4 py-2 focus:outline-none focus:border-primaryColor" placeholder="Indica la hora del evento">
            </div>
            <div class="mb-4">
                <label for="status" class="block text-gray-700font-montserrat mb-2">Estatus del evento:</label>
                @error('status')
                <h1 class="text-red text-md font-semibold">{{ $message }}</h1>
                @enderror
                <select type="text" id="status" name="status" value="{{ $event->status }}" class="w-full border-2 border-zinc-100 rounded-md px-4 py-2 focus:outline-none focus:border-primaryColor" placeholder="Indica la hora del evento">
                    <option value='Programada'>Programada</option>
                    <option value='En proceso'>En proceso</option>
                    <option value='Terminada'>Terminada</option>
                    <option value='Cancelada'>Cancelada</option>
                </select>
            </div>
            <div class="mt-6 flex">
                <button type="submit" class="bg-primaryColor text-white py-2 px-20 rounded-md hover:bg-secondaryColor focus:outline-none focus:bg-secondaryColor mx-auto">Actualizar evento</button>
            </div>
        </form>
    </main> --}}
    <section class="flex flex-col justify-center items-center  min-h-full flex-grow">
        <div class="sm:p-8 text-left w-[90%] mb-[2vh] sm:mb-0 ">
            <div class="w-full md:px-[7em] md:my-[2em] flex bg-white">        
                <form action="{{route('eventos.update', $event->id)}}" method="POST" class="flex flex-col font-montserrat space-y-5 w-full mt-4 md:mt-0  ">
                    @csrf
                    @method('PUT')
                    <div class="w-full h-fit flex justify-center md:justify-start">
                        <h1 class="text-3xl font-bold">Editar evento</h1>
                    </div>
                    <div class="w-full flex flex-col space-y-1">
                        <div class="flex lg:flex-row flex-col items-center md:items-start justify-around">
                            <div class="space-y-2 mb-4 lg:mx-5">
                                <p class="text-sm">¿Con quien desea la cita?:</p>
                                <select type="text" id="receiver_id" name="receiver_id" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Introduce la persona con quien desea la cita">
                                    @foreach ($internsWithUser as $internWithUser)
                                        <option value="{{$internWithUser['id']}}" @if ($event['receiver_id'] == $internWithUser['id']) selected @endif>{{$internWithUser['user']['name']}} {{$internWithUser['user']['lastname']}}</option>
                                    @endforeach
                                </select>
                                @error('receiver_id')
                                    <p class="text-[#ff0000] text-sm">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            <div class=" space-y-2 mb-4 lg:mx-5">
                                <p class="text-sm">Titulo:</p>
                                <input type="text" id="title" name="title" value="{{ $event->title }}" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Introduce el titulo del evento">
                                @error('title')
                                    <p class="text-[#ff0000] text-sm">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                        <div class="flex lg:flex-row flex-col items-center md:items-start justify-around">
                            <div class=" space-y-2 mb-4 lg:mx-5">
                                <p class="text-sm space-y-2">Tipo de evento:</p>
                                <select type="text" id="eventType" name="eventType" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Introduce el tipo de evento">
                                    <option value="Planificación de proyecto" @if($event->eventType == 'Planificación de proyecto') selected @endif>Planificación de proyecto</option>
                                    <option value="Revisión de memoria" @if($event->eventType == 'Revisión de memoria') selected @endif>Revisión de memoria</option>
                                    <option value="Asesoria" @if($event->eventType == 'Asesoria') selected @endif>Asesoría</option>
                                    <option value="Liberación de documento" @if($event->eventType == 'Liberación de documento') selected @endif>Liberación de documento</option>
                                    <option value="Sanción" @if($event->eventType == 'Sanción') selected @endif>Sanción</option>
                                </select>
                                
                                @error('eventType')
                                <p class="text-[#ff0000] text-sm">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            <div class=" space-y-2 mb-4 lg:mx-5">
                                <p class="text-sm space-y-2">Descripción:</p>
                                <input id="description" name="description" value="{{ $event->description }}" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Describe brevemente de que tratara el evento"></input>
                                @error('description')
                                    <p class="text-[#ff0000] text-sm">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                        <div class="flex lg:flex-row flex-col items-center md:items-start justify-around">
                            <div class=" space-y-2 mb-4 lg:mx-5">
                                <p class="text-sm space-y-2">Ubicación del evento:</p>
                                <input type="text" id="location" name="location" value="{{ $event->location }}" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Indica donde se llevara a cabo el evento">
                                @error('location')
                                    <p class="text-[#ff0000] text-sm">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            <div class=" space-y-2 mb-4 lg:mx-5">
                                <p class="text-sm space-y-2">Fecha y hora de inicio del evento:</p>
                                <input type="datetime-local" id="date_start" name="date_start" value="{{ $event->date_start }}" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Indica la hora del evento">
                                @error('date_start')
                                    <p class="text-[#ff0000] text-sm">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                        <div class="flex lg:flex-row flex-col items-center md:items-start justify-around">
                            <div class=" space-y-2 mb-4 lg:mx-5">
                                <p class="text-sm space-y-2">Fecha y hora de fin del evento:</p>
                                <input type="datetime-local" id="date_end" name="date_end" value="{{ $event->date_end }}" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Indica la hora del evento">
                                @error('date_end')
                                    <p class="text-[#ff0000] text-sm">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            <div class=" space-y-2 mb-4 lg:mx-5">
                                <p class="text-sm space-y-2">Estatus del evento:</p>
                                <select type="text" id="status" name="status" value="{{ $event->status }}" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Indica la hora del evento">
                                    <option @if($event->status == 'Programada') selected @endif>Programada</option>
                                    <option @if($event->status == 'En proceso') selected @endif>En proceso</option>
                                    <option @if($event->status == 'Terminada') selected @endif>Terminada</option>
                                    <option @if($event->status == 'Cancelada') selected @endif>Cancelada</option>                                    
                                </select>                                
                                @error('status')
                                    <p class="text-[#ff0000] text-sm">
                                        {{ $message }}
                                    </p>
                                    @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="p-2 self-center mx-auto bg-primaryColor w-[18rem] md:w-[30rem] rounded-md text-white hover:bg-darkgreen">Editar evento</button>
                </form>
            </div>
        </div>
    </section>
    @endsection
</body>
</html>
