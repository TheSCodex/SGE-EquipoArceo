@extends('templates.administratorTemplate')
@section('titulo','CRUD Carreras y Divisiones')
@section('contenido')
    {{-- Test --}}
    @php
    $usuarios = [
        ['Carrera' => 'Desarrollo de software', 'Director' => 'Juan Pérez', 'Division' => 'Software', 'Nivel' => 'TSU', 'Clave' => '7305477760',],
        ['Carrera' => 'Desarrollo de software', 'Director' => 'Juan Pérez', 'Division' => 'Software', 'Nivel' => 'TSU', 'Clave' => '7305477760',],
        ['Carrera' => 'Desarrollo de software', 'Director' => 'Juan Pérez', 'Division' => 'Software', 'Nivel' => 'TSU', 'Clave' => '7305477760',],
        ['Carrera' => 'Desarrollo de software', 'Director' => 'Juan Pérez', 'Division' => 'Software', 'Nivel' => 'TSU', 'Clave' => '7305477760',],
        ['Carrera' => 'Desarrollo de software', 'Director' => 'Juan Pérez', 'Division' => 'Software', 'Nivel' => 'TSU', 'Clave' => '7305477760',],
        ['Carrera' => 'Desarrollo de software', 'Director' => 'Juan Pérez', 'Division' => 'Software', 'Nivel' => 'TSU', 'Clave' => '7305477760',],
        ['Carrera' => 'Desarrollo de software', 'Director' => 'Juan Pérez', 'Division' => 'Software', 'Nivel' => 'TSU', 'Clave' => '7305477760',],
        ['Carrera' => 'Desarrollo de software', 'Director' => 'Juan Pérez', 'Division' => 'Software', 'Nivel' => 'TSU', 'Clave' => '7305477760',],
    ];
    @endphp
    <main class="min-h-screen h-full">
        <div class="md:py-8 md:px-20">
            <div class="border-b border-gray-200 pb-2 flex flex-row items-center">
                <div class="md:w-4/6">
                    <h1 class="font-bold text-2xl font-roboto">Carreras y Divisiones</h1>
                </div>
                <div class="flex items-center space-x-5">
                    <div class="flex flex-row border border-primaryColor md:p-1 items-center rounded-md">
                        <input id='search' placeholder="Buscador" type="text" class="placeholder-primaryColor focus:outline-none font-roboto">
                        <label for="search" class="items-center"><img src="/img/logos/search.svg"></label>
                    </div>
                    <div class="p-1 flex flex-x-0 flex-col">
                        <button><img src="/img/logos/caret.svg"></button>
                    </div>
                    <div class="w-56">
                        <button class="bg-primaryColor text-white md:p-2 rounded-md  font-semibold ">Agregar carrera y division</button>
                    </div>

                </div>
            </div>
            <div class="md:mt-6 md:w-full flex items-center justify-between">
                <table class="w-full text-center">
                    <tr>
                        <th class="text-[#ACACAC] font-roboto text-xs">Carrera</th>
                        <th class="text-[#ACACAC] font-roboto text-xs">Director</th>
                        <th class="text-[#ACACAC] font-roboto text-xs">Division</th>
                        <th class="text-[#ACACAC] font-roboto text-xs">Nivel</th>
                        <th class="text-[#ACACAC] font-roboto text-xs">Clave</th>
                        <th class="text-[#ACACAC] font-roboto text-xs"></th>
                        <th class="text-[#ACACAC] font-roboto text-xs"></th>
                        <th class="text-[#ACACAC] font-roboto text-xs"></th>
                        <th class="text-[#ACACAC] font-roboto text-xs"></th>
                        <th class="text-[#ACACAC] font-roboto text-xs"></th>
                    
                    </tr>
                    @foreach($usuarios as $usuario)
                    <tr>
                        <td class="font-roboto font-bold py-5">{{ $usuario['Carrera'] }}</td>
                        <td class="font-roboto font-bold py-5">{{ $usuario['Director'] }}</td>
                        <td class="font-roboto font-bold py-5">{{ $usuario['Division'] }}</td>
                        <td class="font-roboto font-bold py-5">{{ $usuario['Nivel'] }}</td>
                        <td class="font-roboto font-bold py-5">{{ $usuario['Clave'] }}</td>
                        <td class="font-roboto font-bold py-5"><img src="/img/logos/pencil.svg"></td>
                        <td class="font-roboto font-bold py-5"><img src="/img/logos/trash.svg"></td>
                    </tr>
                    @endforeach
                                </table>
            </div>
        </div>
    </main>
@endsection