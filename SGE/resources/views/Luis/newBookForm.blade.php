<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @extends('templates/authTemplate')
    @section('contenido')
    <section class="flex flex-col justify-center items-center  min-h-full flex-grow mb-6">
        <div class="sm:p-8 text-left w-[90%] mb-[2vh] sm:mb-0">
            <div class="w-full md:px-[7em] md:my-[2em] flex "> 
                <form action="{{route('libros-asistente.store')}}" method="POST" class="flex flex-col font-montserrat space-y-5 w-full mt-4 md:mt-0">
                        @csrf
                        @if(session('problems'))
                            <div class=" w-full bg-[#eb7575] rounded-xl flex flex-col justify-center align-middle">
                                <ul class="my-5 w-full">
                                    @foreach(session('problems') as $problem)
                                        <li class=" text-lg text-white font-montserrat ml-2">&bull; {{ $problem }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <h1 class="text-3xl font-bold text-center lg:text-left  lg:px-5">Añadir libro</h1>
                        <div class="w-full flex flex-col space-y-1">
                            <div class="flex lg:flex-row flex-col items-center md:items-start justify-around">
                                <div class="space-y-2 mb-4 lg:mx-5">
                                    <p class="text-sm">Nombre:</p>
                                    <input type="text" id="title" name="title" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Introduce el nombre del libro" value="{{ old('title') }}">
                                    @error('title')
                                        <p class="text-[#ff0000] text-sm">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="space-y-2 mb-4 lg:mx-5">
                                    <p class="text-sm">Autor:</p>
                                    <input type="text" id="author" name="author" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Introduce el autor del libro" value="{{ old('author') }}">
                                    @error('author')
                                        <p class="text-[#ff0000] text-sm">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex lg:flex-row flex-col items-center md:items-start justify-around " >
                                <div class="space-y-2 mb-4 lg:mx-5">
                                    <div class="flex flex-row w-full justify-between">
                                        <p class="text-sm space-y-2">ISBN:</p>
                                        {{-- <div>
                                            <div class=" relative before:content-[attr(data-tip)] before:absolute before:px-3 before:py-2 before:-left-3 before:-top-2 before:w-max before:max-w-xs before:-translate-x-1/2 before:-translate-y-full before:bg-gray-700 before:text-white before:rounded-md before:opacity-0 before:transition-all after:absolute after:-left-1.5 after:-top-2 after:h-0 after:w-0 after:translate-x-1/2 after:border-8 after:border-t-gray-700 after:border-l-transparent after:border-b-transparent after:border-r-transparent after:opacity-0 after:transition-all hover:before:opacity-100 hover:after:opacity-100" data-tip="ISBN (International Standard Book Number) es un identificador único para libros y otros productos editoriales. Es un número de identificación estándar que se utiliza para identificar un libro de manera única.">
                                                <img src="/img/Eliud/info.png" alt="Información" class="w-5 h-5 my-auto cursor-pointer" id="info-icon2">
                                            </div>
                                        </div> --}}
                                    </div>
                                    <input type="text" id="isbn" name="isbn" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Introduce el ISBN del libro" value="{{ old('isbn') }}" >
                                    @error('isbn')
                                    <p class="text-[#ff0000] text-sm">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                                <div class="space-y-2 mb-4 lg:mx-5">
                                    <div class="flex flex-row w-full justify-between">
                                        <p class="text-sm space-y-2">Precio:</p>
                                    </div>
                                    <input id="price" name="price" class="text-sm rounded-md border-lightGray border-2 py-3 w-[20em] md:w-[35em]" placeholder="Introduce el precio del libro" value="{{ old('price') }}"></input>
                                    @error('price')
                                    <p class="text-[#ff0000] text-sm">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex lg:flex-row flex-col items-center md:items-start justify-start">
                                {{-- <div class="space-y-2 mb-4 lg:mx-5">
                                    <p class="text-sm">ISBN:</p>
                                    <input type="text" id="isbn" name="isbn" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Introduce el ISBN del libro" value="{{ $book->isbn }}">
                                    @error('isbn')
                                        <p class="text-[#ff0000] text-sm">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div> --}}
                                <div class="space-y-2 mb-4 lg:mx-5 ">
                                    <div class="flex flex-row w-full justify-between">
                                        <p class="text-sm space-y-2">Matrículas:</p>
                                        <div>
                                            <div class=" relative before:content-[attr(data-tip)] before:absolute before:px-3 before:py-2 before:-left-3 before:-top-2 before:w-max before:max-w-xs before:-translate-x-1/2 before:-translate-y-full before:bg-gray-700 before:text-white before:rounded-md before:opacity-0 before:transition-all after:absolute after:-left-1.5 after:-top-2 after:h-0 after:w-0 after:translate-x-1/2 after:border-8 after:border-t-gray-700 after:border-l-transparent after:border-b-transparent after:border-r-transparent after:opacity-0 after:transition-all hover:before:opacity-100 hover:after:opacity-100" data-tip="Ej: 22393171, 22393172, 22393173">
                                                <img src="/img/Eliud/info.png" alt="Información" class="w-5 h-5 my-auto cursor-pointer" id="info-icon">
                                            </div>
                                        </div>
                                    </div>                        
                                    <input id="identifier_student" name="identifier_student" class="text-sm rounded-md border-lightGray border-2 py-3 w-[20em] md:w-[35em]" placeholder="Introduce cada matricula separada por una coma" value="{{ old('identifier_student') }}"></input>
                                    @error('identifier_student')
                                        <p class="text-[#ff0000] text-sm">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="p-2 self-center bg-primaryColor w-[18rem] md:w-[30rem] rounded-md text-white hover:bg-darkgreen">Añadir libro</button>
                    </form>
            </div>
        </div>
    </section>
@endsection
</body>
</html>