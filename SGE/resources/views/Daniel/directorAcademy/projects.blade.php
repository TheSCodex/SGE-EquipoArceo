@extends('templates/authTemplate')
@section('titulo', 'Proyectos')
@section('contenido')
    {{-- Test --}}
    <style>
        table {
            border-collapse: separate;
            border-spacing: 0 10px;
            /* Espacio vertical entre filas */
            width: 100%;
        }
        /* Estilo para las celdas de la tabla */
        th,
        td {
            /* Espacio interno de las celdas */
            padding: 10px;
        }
    </style>


    <main class="min-h-screen h-full flex flex-col">
        <div class="border-b border-gray-200 mt-5 pb-2 mx-auto w-11/12 md:flex md:items-center md:justify-between">
            <h1 class="font-bold font-montserrat text-xl mb-2 text-center md:text-left">Anteproyectos de la division</h1>
            <div class="flex items-center flex-row justify-end">
                <div class="flex-1 md:mr-2">
                    <div class="flex justify-between border border-primaryColor items-center rounded-xl py-2 px-4">
                        <input id="search" placeholder="Buscador" type="text"
                            class="placeholder-primaryColor focus:outline-none font-montserrat py-1 px-2 justify-start">
                        <img class="w-6 h-6 mx-2 justify-end" src="/img/logos/buscar.svg">
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-6 w-11/12 mx-auto flex items-center justify-between">
            {{-- cards --}}
            <div class="lg:hidden w-full mb-5">
                <div class="grid md:grid-cols-2 gap-4 w-full">
                    @foreach ($users as $user)
                        <div class="bg-white rounded-lg shadow-md p-4 drop-shadow-2xl">
                            <h2 class="text-lg font-bold">{{ $user['Nombre del Anteproyecto'] }}</h2>
                            <h2 class="text-lg font-bold">{{ $user['Estudiantes Designados'] }}</h2>
                            <p class="text-sm text-gray-500">Votos: {{ $user['Votos recibidos'] }}</p>
                            <p class="text-sm text-gray-500"> Asesor academico: {{ $user['Asesor Academico'] }}</p>
                            <p class="text-sm text-gray-500">Fecha: {{ $user['Fecha de publicacion'] }}</p>
                            <p class="text-sm text-gray-500">Estado: {{ $user['Estado'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- Display table on larger screens -->
            <div class="hidden lg:block w-full">
                <table class="text-center">
                    <tr>
                        <th class="text-[#ACACAC] font-roboto text-xs">Estudiantes Designados</th>
                        <th class="text-[#ACACAC] font-roboto text-xs">Nombre del Anteproyecto</th>
                        <th class="text-[#ACACAC] font-roboto text-xs">Votos recibidos</th>
                        <th class="text-[#ACACAC] font-roboto text-xs">Asesor Academico</th>
                        <th class="text-[#ACACAC] font-roboto text-xs">Fecha de publicacion</th>
                        <th class="text-[#ACACAC] font-roboto text-xs">Estado</th>
                        <th class="text-[#ACACAC] font-roboto text-xs"></th>
                        <th class="text-[#ACACAC] font-roboto text-xs"></th>
                    </tr>
                    @foreach ($users as $user)
                        <tr>
                            <td class="font-roboto font-bold py-5">{{ $user['Estudiantes Designados'] }}</td>
                            <td class="font-roboto font-bold py-5">{{ $user['Nombre del Anteproyecto'] }}</td>
                            <td class="font-roboto font-bold py-5">Votos: {{ $user['Votos recibidos'] }}</td>
                            <td class="font-roboto font-bold py-5">{{ $user['Asesor Academico'] }}</td>
                            <td class="font-roboto font-bold py-5">{{ $user['Fecha de publicacion'] }}</td>
                            <td class="font-roboto font-bold py-5">{{ $user['Estado'] }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </main>
@endsection