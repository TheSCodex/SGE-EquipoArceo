<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirmar Eliminación</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="bg-white flex flex-col justify-center align-middle">
        <div class="w-11/12 mx-auto mt-5">
            <h1 class="font-bold font-montserrat text-xl mb-2">Confirmar Eliminación</h1>
            <p class="text-gray-700 mb-4">¿Estás seguro de que deseas eliminar este evento?</p>
            <form action="{{ route('eventos.destroy', $event->id) }}" method="POST">
                @csrf
                @method('delete')
                <div class="flex justify-between">
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-md">Eliminar</button>
                    <a href="{{ route('eventos.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 py-2 px-4 rounded-md">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
