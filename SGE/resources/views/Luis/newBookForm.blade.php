{{-- <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nuevo Libro</title>
    @vite('resources/css/app.css')
</head>
<body class="py-8">
    @extends('templates.directorsAssistantTemplate')
    @section('contenido')
    <main class="w-10/12 md:w-7/12 xl:w-1/3 mx-auto bg-white rounded-xl p-6 shadow-2xl border-2 border-secondaryColor my-10">
        <h1 class="text-2xl font-semibold mb-4 font-montserrat">Agregar Nuevo Libro</h1>
        <form action="{{route('libros.store')}}" method="POST" class="add-book">
            @csrf
            <div class="mb-4">
                <label for="title_book" class="block text-gray-700 font-montserrat mb-2">Nombre:</label>
                <input type="text" id="title_book" name="title_book" class="w-full border-2 border-zinc-100  rounded-md px-4 py-2 focus:outline-none focus:border-primaryColor" required placeholder="Introduce el nombre del libro">
            </div>
            <div class="mb-4">
                <label for="author_book" class="block text-gray-700 font-montserrat mb-2">Autor:</label>
                <input type="text" id="author_book" name="author_book" class="w-full border-2 border-zinc-100  rounded-md px-4 py-2 focus:outline-none focus:border-primaryColor" required placeholder="Introduce el autor del libro">
            </div>
            <div class="mb-4">
                <label for="isbn_book" class="block text-gray-700 font-montserratmb-2">ISBN:</label>
                <input type="text" id="isbn_book" name="isbn_book" class="w-full border-2 border-zinc-100 rounded-md px-4 py-2 focus:outline-none focus:border-blue-primaryColor" required placeholder="Introduce el ISBN del libro">
            </div>
            <div class="mb-4">
                <label for="identifier_student" class="block text-gray-700font-montserrat mb-2">Matrículas:</label>
                <textarea id="identifier_student" name="identifier_student" class="w-full border-2 border-zinc-100 rounded-md px-4 py-2 focus:outline-none focus:border-primaryColor" rows="3" required placeholder="Introduce la o las matriculas de los estudiantes que han entregado el libro"></textarea>
            </div>
            <div class="mt-6 flex">
                <button type="submit" class="bg-primaryColor text-white py-2 px-20 rounded-md hover:bg-secondaryColor focus:outline-none focus:bg-secondaryColor mx-auto create-book">Añadir libro</button>
            </div>
        </form>
    </main>
    @endsection
</body>
</html>
 --}}


@extends('templates.directorsAssistantTemplate')
@section('contenido')
<section class="flex flex-col justify-center items-center  min-h-full flex-grow">
    <div class="sm:p-8 text-left w-[90%] mb-[2vh] sm:mb-0">
        <div class="w-full md:px-[7em] md:my-[2em] flex bg-white"> 
            <form action="{{route('libros.store')}}" method="POST" class="flex flex-col font-montserrat space-y-5 w-full mt-4 md:mt-0">
                    @csrf
                    <div class="w-full h-fit flex justify-center md:justify-start">
                        <h1 class="text-3xl font-bold">Añadir libro</h1>
                    </div>
                    <div class="w-full flex flex-col space-y-1">
                        <div class="flex lg:flex-row flex-col items-center md:items-start justify-around">
                            <div class="space-y-2 mb-4 lg:mx-5">
                                <p class="text-sm">Nombre:</p>
                                <input type="text" id="title" name="title" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Introduce el nombre del libro" >
                                @error('title')
                                    <p class="text-[#ff0000] text-sm">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            <div class="space-y-2 mb-4 lg:mx-5">
                                <p class="text-sm">Autor:</p>
                                <input type="text" id="author" name="author" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Introduce el autor del libro" >
                                @error('author')
                                    <p class="text-[#ff0000] text-sm">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                        <div class="flex lg:flex-row flex-col items-center md:items-start justify-around">
                            <div class="space-y-2 mb-4 lg:mx-5">
                                <p class="text-sm space-y-2">ISBN:</p>
                                <input type="text" id="isbn" name="isbn" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Introduce el ISBN del libro" >
                                @error('isbn')
                                <p class="text-[#ff0000] text-sm">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            <div class="space-y-2 mb-4 lg:mx-5">
                                <p class="text-sm space-y-2">Matrículas:</p>
                                <textarea id="identifier_student" name="identifier_student" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" rows="1"  placeholder="Introduce la o las matriculas de los estudiantes que han entregado el libro, separa cada matricula con una coma"></textarea>
                                @error('identifier_student')
                                <p class="text-[#ff0000] text-sm">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                        </div>
                    <button type="submit" class="p-2 self-center bg-primaryColor w-[18rem] md:w-[30rem] rounded-md text-white hover:bg-darkgreen">Añadir evento</button>
                </form>
            </div>
    </div>
</section>
@endsection