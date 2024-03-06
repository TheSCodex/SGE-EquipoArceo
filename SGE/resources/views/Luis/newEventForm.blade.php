<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Evento</title>
    @vite('resources/css/app.css')
</head>
<body class="py-8">
    @extends('templates.academicAdvisorTemplate')
    @section('contenido')
    <main class="w-10/12 md:w-7/12 xl:w-1/3 mx-auto rounded-xl p-6 shadow-2xl border-2 border-secondaryColor my-10">
        <h1 class="text-2xl font-semibold mb-4 font-montserrat bg-white">Agregar Nuevo Evento</h1>
        <form action="{{ route('eventos.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="eventType" class="block text-gray-700 font-montserrat mb-2">Tipo de evento:</label>
                <input type="text" id="eventType" name="eventType" class="w-full border-2 border-zinc-100 rounded-md px-4 py-2 focus:outline-none focus:border-primaryColor" required placeholder="Introduce el tipo de evento">
            </div>
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-montserrat mb-2">Titulo:</label>
                <input type="text" id="title" name="title" class="w-full border-2 border-zinc-100 rounded-md px-4 py-2 focus:outline-none focus:border-primaryColor" required placeholder="Introduce el titulo del evento">
            </div>  
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-montserrat mb-2">Descripción:</label>
                <input type="text" id="description" name="description" class="w-full border-2 border-zinc-100 rounded-md px-4 py-2 focus:outline-none focus:border-blue-primaryColor" required placeholder="Describe brevemente de que trata el evento">
            </div>
            <div class="mb-4">
                <label for="location" class="block text-gray-700 font-montserrat mb-2">Ubicación del evento:</label>
                <textarea id="location" name="location" class=" resize-none w-full border-2  border-zinc-100 rounded-md px-4 py-2 focus:outline-none focus:border-primaryColor" rows="3" required placeholder="Indica donde se llevara a cabo el evento"></textarea>
            </div>
            <div class="mb-4">
                <label for="date" class="block text-gray-700 font-montserrat mb-2">Hora y fecha del evento:</label>
                <input type="datetime-local" id="date" name="date" class="w-full border-2 border-zinc-100 rounded-md px-4 py-2 focus:outline-none focus:border-primaryColor" required placeholder="Indica la hora del evento">
            </div>
            <div class="mt-6 flex">
                <button type="submit" class="bg-primaryColor text-white py-2 px-20 rounded-md hover:bg-secondaryColor focus:outline-none focus:bg-secondaryColor mx-auto">Añadir evento</button>
            </div>
        </form>
    </main>
    @endsection
</body>
</html>
