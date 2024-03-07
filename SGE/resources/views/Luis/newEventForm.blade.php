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
                <input type="text" id="title" name="title" value="{{ old('title') }}" class="w-full border-2 border-zinc-100  rounded-md px-4 py-2 focus:outline-none focus:border-primaryColor" placeholder="Introduce el titulo del evento">
            </div>
            <div class="mb-4">
                <label for="eventType" class="block text-gray-700 font-montserrat mb-2">Tipo de evento:</label>
                @error('eventType')
                <h1 class="text-red text-md font-semibold">{{ $message }}</h1>
                @enderror
                <input type="text" id="eventType" name="eventType" value="{{ old('eventType') }}" class="w-full border-2 border-zinc-100  rounded-md px-4 py-2 focus:outline-none focus:border-primaryColor" placeholder="Introduce el tipo de evento">
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-montserratmb-2">Descripción:</label>
                @error('description')
                <h1 class="text-red text-md font-semibold">{{ $message }}</h1>
                @enderror
                <textarea id="description" name="description" class="w-full border-2 border-zinc-100 rounded-md px-4 py-2 focus:outline-none focus:border-primaryColor" rows="3" placeholder="Describe brevemente de que tratara el evento">{{ old('description') }}</textarea>
            </div>
            <div class="mb-4">
                <label for="location" class="block text-gray-700font-montserrat mb-2">Ubicación del evento:</label>
                @error('location')
                <h1 class="text-red text-md font-semibold">{{ $message }}</h1>
                @enderror
                <input type="text" id="location" name="location" value="{{ old('location') }}" class="w-full border-2 border-zinc-100 rounded-md px-4 py-2 focus:outline-none focus:border-blue-primaryColor" placeholder="Indica donde se llevara a cabo el evento">
            </div>
            <div class="mb-4">
                <label for="date_start" class="block text-gray-700font-montserrat mb-2">Fecha y hora de inicio del evento:</label>
                @error('date_start')
                <h1 class="text-red text-md font-semibold">{{ $message }}</h1>
                @enderror
                <input type="datetime-local" id="date_start" name="date_start" value="{{ old('date_start') }}" class="w-full border-2 border-zinc-100 rounded-md px-4 py-2 focus:outline-none focus:border-primaryColor" placeholder="Indica la hora del evento">
            </div>
            <div class="mb-4">
                <label for="date_end" class="block text-gray-700font-montserrat mb-2">Fecha y hora de fin del evento:</label>
                @error('date_end')
                <h1 class="text-red text-md font-semibold">{{ $message }}</h1>
                @enderror
                <input type="datetime-local" id="date_end" name="date_end" value="{{ old('date_end') }}" class="w-full border-2 border-zinc-100 rounded-md px-4 py-2 focus:outline-none focus:border-primaryColor" placeholder="Indica la hora del evento">
            </div>
            <div class="mb-4">
                <label for="status" class="block text-gray-700font-montserrat mb-2">Estatus del evento:</label>
                @error('status')
                <h1 class="text-red text-md font-semibold">{{ $message }}</h1>
                @enderror
                <select type="text" id="status" name="status" value="{{old('status')}}" class="w-full border-2 border-zinc-100 rounded-md px-4 py-2 focus:outline-none focus:border-primaryColor" placeholder="Indica la hora del evento">
                    <option value='Programada' selected>Programada</option>
                    {{-- <option value='En proceso'>En proceso</option>
                    <option value='Terminada'>Terminada</option>
                    <option value='Cancelada'>Cancelada</option> --}}
                </select>
            </div>
            <div class="mt-6 flex">
                <button type="submit" class="bg-primaryColor text-white py-2 px-20 rounded-md hover:bg-secondaryColor focus:outline-none focus:bg-secondaryColor mx-auto">Añadir evento</button>
            </div>
        </form>
    </main>
    @endsection
</body>
</html>