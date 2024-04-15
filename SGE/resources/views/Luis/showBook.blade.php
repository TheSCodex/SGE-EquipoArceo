<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información Libro</title>
    @vite('resources/css/app.css')
</head>
<body>
@extends('templates.authTemplate')
@section('contenido')
    <section class="flex flex-col justify-center items-center  min-h-full flex-grow font-montserrat">
        <div class="sm:p-8 text-left w-[90%] mb-[2vh] sm:mb-0 ">
            <div class="w-full md:px-[7em] md:my-[2em] flex ">
                <div  class="flex flex-col font-montserrat space-y-5 w-full mt-4 md:mt-0 min-h-[400px]">
                    <h1 class="text-2xl font-bold mb-5 mt-20 lg:mt-0 text-center lg:text-left">Información sobre el libro</h1>
                    <div class="w-full flex flex-col space-y-1">
                        <div class="flex lg:flex-row flex-col items-center md:items-start justify-around">
                            <div class="space-y-2 mb-4 lg:mx-5">
                                <p class="text-sm">Nombre del libro:</p>
                                <input type="text" id="title" name="title" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Introduce el nombre del libro" value="{{ $book->title }}" readonly>
                            </div>
                            <div class="space-y-2 mb-4 lg:mx-5">
                                <p class="text-sm">Autor:</p>
                                <input type="text" id="author" name="author" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Introduce el autor del libro" value="{{ $book->author }}" readonly>
                            </div>
                        </div>
                        <div class="flex lg:flex-row flex-col items-center md:items-start justify-around">
                            <div class="space-y-2 mb-4 lg:mx-5">
                                <p class="text-sm">ISBN:</p>
                                <input type="text" id="isbn" name="isbn" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Introduce el ISBN del libro" value="{{ $book->isbn }}" readonly>
                            </div>
                            <div class="space-y-2 mb-4 lg:mx-5">
                                <div class="flex flex-row w-full justify-between">
                                    <p class="text-sm space-y-2">Matrículas:</p>
                                </div>                        
                                <textarea id="identifier_student" name="identifier_student" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em] resize-none" rows="1" placeholder="Introduce cada matricula separada por una coma" readonly>@foreach ($internsIdentifier as $index => $internIdentifier){{$internIdentifier}}{{ $index < count($internsIdentifier) - 1 ? ', ' : '' }}@endforeach</textarea>
                            </div>
                        </div>
                        <div class="flex lg:flex-row flex-col items-center md:items-start justify-start">
                            <div class="space-y-2 mb-4 lg:mx-5">
                                <p class="text-sm">Precio:</p>
                                <input type="text" id="price" name="price" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Introduce el precio del libro" value="{{ $book->price }}" readonly>
                            </div>
                        </div>

                    </div>
                    @foreach ($interns as $intern)
                    <div class="w-full flex flex-col space-y-1 ">
                        <h1 class="text-xl font-semibold mb-5 text-center lg:text-start">Estudiante: </h1>
                        <div class="flex lg:flex-row flex-col items-center md:items-start justify-around">
                            <div class="space-y-2 mb-4 lg:mx-5">
                                <p class="text-sm">Matricula del alumno:</p>
                                <input type="text" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Introduce el nombre del libro" value="{{$intern['user']['identifier']}}" readonly>
                            </div>
                            <div class="space-y-2 mb-4 lg:mx-5">
                                <p class="text-sm">Nombre del alumno</p>
                                <input type="text" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Introduce el autor del libro" value="{{ $intern['user']['name']}} {{$intern['user']['last_name']}}" readonly>
                            </div>
                        </div>
                        <div class="flex lg:flex-row flex-col items-center md:items-start justify-around">
                            <div class="space-y-2 mb-4 lg:mx-5">
                                <p class="text-sm">Correo del alumno:</p>
                                <input type="text" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Introduce el ISBN del libro" value="{{ $intern['user']['email'] }}" readonly>
                            </div>
                            <div class="space-y-2 mb-4 lg:mx-5">
                                <div class="flex flex-row w-full justify-between">
                                    <p class="text-sm space-y-2">Asesor academico del alumno:</p>
                                </div>                        
                                <input type="text" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em] resize-none" readonly value="{{ $intern['academic_advisor'] ? $intern['academic_advisor']['user'] ? $intern['academic_advisor']['user']['name'] . ' ' . $intern['academic_advisor']['user']['last_name'] : '' : 'El estudiante no tiene ningun asesor academico asignado' }}">
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
</body>
</html>
