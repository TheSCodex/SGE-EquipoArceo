<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Libro</title>
    @vite('resources/css/app.css')
</head>
<body class="py-8">
    @extends('templates.directorsAssistantTemplate')
    @section('contenido')
    <main class="w-10/12 md:w-7/12 xl:w-1/3 mx-auto bg-white rounded-xl p-6 shadow-2xl border-2 border-secondaryColor my-10">
        <form action="{{ route('libros.update', $book->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-montserrat mb-2">Nombre:</label>
                <input type="text" id="title" name="title" class="w-full border-2 border-zinc-100  rounded-md px-4 py-2 focus:outline-none focus:border-primaryColor" required placeholder="Introduce el nombre del libro" value="{{ $book->title }}"> {{-- Prellenamos con el valor actual --}}
            </div>
            <div class="mb-4">
                <label for="author" class="block text-gray-700 font-montserrat mb-2">Autor:</label>
                <input type="text" id="author" name="author" class="w-full border-2 border-zinc-100  rounded-md px-4 py-2 focus:outline-none focus:border-primaryColor" required placeholder="Introduce el autor del libro" value="{{ $book->author }}"> {{-- Prellenamos con el valor actual --}}
            </div>
            <div class="mb-4">
                <label for="isbn" class="block text-gray-700 font-montserratmb-2">ISBN:</label>
                <input type="text" id="isbn" name="isbn" class="w-full border-2 border-zinc-100 rounded-md px-4 py-2 focus:outline-none focus:border-blue-primaryColor" required placeholder="Introduce el ISBN del libro" value="{{ $book->isbn }}"> {{-- Prellenamos con el valor actual --}}
            </div>
            <div class="mb-4">
                <label for="identifier_student" class="block text-gray-700font-montserrat mb-2">Matrículas:</label>
                <textarea id="identifier_student" name="identifier_student" class="w-full border-2 border-zinc-100 rounded-md px-4 py-2 focus:outline-none focus:border-primaryColor" rows="3" required placeholder="Introduce la o las matriculas de los estudiantes que han entregado el libro">{{ $book->identifier_student }}</textarea> {{-- Prellenamos con el valor actual --}}
            </div>
            <div class="mt-6 flex">
                <button type="submit" class="bg-primaryColor text-white py-2 px-20 rounded-md hover:bg-secondaryColor focus:outline-none focus:bg-secondaryColor mx-auto">Editar libro</button> {{-- Cambiamos el texto del botón --}}
            </div>
        </form>
    </main>
    @endsection
</body>
</html>
