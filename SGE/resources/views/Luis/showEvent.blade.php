<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Evento</title>
    @vite('resources/css/app.css')
</head>
<body>
    @extends('templates.academicAdvisorTemplate')
    @section('contenido')

    <div class="w-full min-h-screen	m-auto flex flex-col">
        <div class="w-6/12 bg-white rounded-xl shadow-2xl p-6 border-2 border-secondaryColor m-auto">
            <h1 class="text-2xl font-semibold mb-4 font-montserrat text-primaryColor">Detalles del Evento</h1>
            <div class="mb-4">
                <p><strong class="text-primaryColor">Fecha de inicio:</strong> {{ $event->date_start }}</p>
                <p><strong class="text-primaryColor">Fecha de fin:</strong> {{ $event->date_end }}</p>
                <p><strong class="text-primaryColor">Con:</strong> {{ $event->receiver_id }}</p>
                <p><strong class="text-primaryColor">Asunto:</strong> {{ $event->title }}</p>
                <p><strong class="text-primaryColor">Propósito:</strong> {{ $event->eventType }}</p>
                <p><strong class="text-primaryColor">Descripción:</strong> {{ $event->description }}</p>
                <p><strong class="text-primaryColor">Lugar:</strong> {{ $event->location }}</p>
                <p><strong class="text-primaryColor">Estatus:</strong> {{ $event->status }}</p>
            </div>
        </div>
    </div>
    @endsection

</body>
</html>
