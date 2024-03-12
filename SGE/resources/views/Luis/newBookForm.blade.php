<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

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
                                <input id="identifier_student" name="identifier_student" class="text-sm rounded-md border-lightGray border-2 py-3 w-[20em] md:w-[35em]" rows="1"  placeholder="Introduce cada matricula separada por una coma y despues un espacio"></input>
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
</body>
</html>