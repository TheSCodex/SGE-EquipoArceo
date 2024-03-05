<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nuevo Evento</title>
    @vite('resources/css/app.css')
</head>
<body class="py-8">
    @extends('templates.academicAdvisorTemplate')
    @section('contenido')
    <main class="w-10/12 md:w-7/12 xl:w-1/3 mx-auto rounded-xl p-6 shadow-2xl border-2 border-secondaryColor my-10">
        <h1 class="text-2xl font-semibold mb-4 font-montserrat bg-white">Agregar Nuevo Evento</h1>
        <form action="{{route('eventos.store')}}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="event_type" class="block text-gray-700 font-montserrat mb-2">Tipo de evento:</label>
                <input type="text" id="event_type" name="eventType" value="{{ old('eventType') }}" class="w-full border-2 border-zinc-100  rounded-md px-4 py-2 focus:outline-none focus:border-primaryColor" placeholder="Introduce el tipo de evento">
            </div>
            <div class="mb-4">
                <label for="event_title" class="block text-gray-700 font-montserrat mb-2">Titulo:</label>
                <input type="text" id="event_title" name="title" value="{{ old('title') }}" class="w-full border-2 border-zinc-100  rounded-md px-4 py-2 focus:outline-none focus:border-primaryColor" placeholder="Introduce el titulo del evento">
            </div>
            <div class="mb-4">
                <label for="event_desc" class="block text-gray-700 font-montserratmb-2">Descripción:</label>
                <input type="text" id="event_desc" name="description" value="{{ old('description') }}" class="w-full border-2 border-zinc-100 rounded-md px-4 py-2 focus:outline-none focus:border-blue-primaryColor" placeholder="Describe brevemente de que tratara el evento">
            </div>
            <div class="mb-4">
                <label for="event_location" class="block text-gray-700font-montserrat mb-2">Ubicación del evento:</label>
                <textarea id="event_location" name="location" class="w-full border-2 border-zinc-100 rounded-md px-4 py-2 focus:outline-none focus:border-primaryColor" rows="3" placeholder="Indica donde se llevara a cabo el evento">{{ old('location') }}</textarea>
            </div>
            <div class="mb-4">
                <label for="event_datetime" class="block text-gray-700font-montserrat mb-2">Hora y fecha del evento:</label>
                <input type="datetime-local" id="event_datetime" name="date" value="{{ old('date') }}" class="w-full border-2 border-zinc-100 rounded-md px-4 py-2 focus:outline-none focus:border-primaryColor" placeholder="Indica la hora dle evento">
            </div>
            <div class="mt-6 flex">
                <button type="submit" class="bg-primaryColor text-white py-2 px-20 rounded-md hover:bg-secondaryColor focus:outline-none focus:bg-secondaryColor mx-auto">Añadir evento</button>
            </div>
        </form>
    </main>
    @endsection
</body>
</html>
