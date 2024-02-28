<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nuevo Evento</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 py-8">
    <div class="max-w-md mx-auto bg-white rounded-xl p-6 shadow-md">
        <h1 class="text-2xl font-semibold mb-4 font-montserrat">Agregar Nuevo Evento</h1>
        <form action="{{url('newEvent')}}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="event_type" class="block text-gray-700 font-montserrat mb-2">Tipo de evento:</label>
                <input type="text" id="event_type" name="event_type" class="w-full border-2 border-zinc-100  rounded-md px-4 py-2 focus:outline-none focus:border-primaryColor" required placeholder="Introduce el tipo de evento">
            </div>
            <div class="mb-4">
                <label for="event_title" class="block text-gray-700 font-montserrat mb-2">Titulo:</label>
                <input type="text" id="event_title" name="event_title" class="w-full border-2 border-zinc-100  rounded-md px-4 py-2 focus:outline-none focus:border-primaryColor" required placeholder="Introduce el titulo del evento">
            </div>
            <div class="mb-4">
                <label for="event_desc" class="block text-gray-700 font-montserratmb-2">Descripción:</label>
                <input type="text" id="event_desc" name="event_desc" class="w-full border-2 border-zinc-100 rounded-md px-4 py-2 focus:outline-none focus:border-blue-primaryColor" required placeholder="Describe brevemente de que tratara el evento">
            </div>
            <div class="mb-4">
                <label for="event_location" class="block text-gray-700font-montserrat mb-2">Ubicación del evento:</label>
                <textarea id="event_location" name="event_location" class="w-full border-2 border-zinc-100 rounded-md px-4 py-2 focus:outline-none focus:border-primaryColor" rows="3" required placeholder="Indica donde se llevara a cabo el evento"></textarea>
            </div>
            <div class="mb-4">
                <label for="event_datetime" class="block text-gray-700font-montserrat mb-2">Hora y fecha del evento:</label>
                <input type="datetime-local" id="event_datetime" name="event_datetime" class="w-full border-2 border-zinc-100 rounded-md px-4 py-2 focus:outline-none focus:border-primaryColor" required placeholder="Indica la hora dle evento">
            </div>
            <div class="mt-6 flex">
                <button type="submit" class="bg-primaryColor text-white py-2 px-20 rounded-md hover:bg-secondaryColor focus:outline-none focus:bg-secondaryColor mx-auto">Añadir evento</button>
            </div>
        </form>
    </div>
</body>
</html>
