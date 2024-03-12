@extends('templates.academicAdvisorTemplate')
@section('titulo', 'Proyectos')
@section('contenido')
    {{-- Test --}}
    @php
    $users = [
        ['id'=> '3','Estudiantes Designados' => 'Luis Broca', 'Nombre del Anteproyecto' => 'Nombre proyecto', 'Votos recibidos' => '1', 'Asesor Academico' => 'Irvin Chan', 'Fecha de publicacion' => '05/03/2024', 'Estado' => 'Publicado',],
        ['id'=> '4','Estudiantes Designados' => 'Michelle Meza', 'Nombre del Anteproyecto' => 'Nombre proyecto', 'Votos recibidos' => '0', 'Asesor Academico' => 'Irvin Chan', 'Fecha de publicacion' => '05/03/2024', 'Estado' => 'Borrador',],
        ['id'=> '5','Estudiantes Designados' => 'Pipa peguero', 'Nombre del Anteproyecto' => 'Nombre proyecto', 'Votos recibidos' => '2', 'Asesor Academico' => 'Luis Villafaña', 'Fecha de publicacion' => '05/03/2024', 'Estado' => 'Publicado',],
        ['id'=> '6','Estudiantes Designados' => 'Emmanuel Arceo', 'Nombre del Anteproyecto' => 'Nombre proyecto', 'Votos recibidos' => '0', 'Asesor Academico' => 'Luis Villafaña', 'Fecha de publicacion' => '05/03/2024', 'Estado' => 'Borrador',],
        ['id'=> '7','Estudiantes Designados' => 'Elizabeth Chuc', 'Nombre del Anteproyecto' => 'Nombre proyecto', 'Votos recibidos' => '1', 'Asesor Academico' => 'Franklin Aranda', 'Fecha de publicacion' => '05/03/2024', 'Estado' => 'Publicado',],
        ['id'=> '8','Estudiantes Designados' => 'Daniel Dolores', 'Nombre del Anteproyecto' => 'Nombre proyecto', 'Votos recibidos' => '1', 'Asesor Academico' => 'Franklin Aranda', 'Fecha de publicacion' => '05/03/2024', 'Estado' => 'Publicado',],
    ];

    $proyects = [
        ['id'=> '1', 'Estudiantes Designados' => 'Manuel Pasos', 'Nombre del Anteproyecto' => 'Nombre proyecto', 'Votos recibidos' => '1', 'Asesor Academico' => 'Rafael Villegas', 'Fecha de publicacion' => '05/03/2024', 'Estado' => 'Publicado',],
        ['id'=> '2','Estudiantes Designados' => 'Kevin Bello', 'Nombre del Anteproyecto' => 'Nombre proyecto', 'Votos recibidos' => '2', 'Asesor Academico' => 'Rafael Villegas', 'Fecha de publicacion' => '05/03/2024', 'Estado' => 'Publicado',],
];
    @endphp
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
            <h1 class="font-bold font-montserrat text-xl mb-2 text-center md:text-left">Anteproyectos de asesorados</h1>
            <div class="flex items-center flex-row justify-end">
                <div class="flex-1 md:mr-2">
                    <div class="flex justify-between border border-primaryColor items-center rounded-xl py-2 px-4">
                        <input id="search" placeholder="Buscador" type="text"
                            class="placeholder-primaryColor focus:outline-none font-montserrat py-1 px-2 justify-start">
                        <img class="w-6 h-6 mx-2 justify-end" src="/img/logos/buscar.svg">
                    </div>
                </div>
                <div class="hidden md:flex md:flex-col  md:items-center md:mx-3">
                    <button class="bg-green text-base py-1 px-3 mb-1 rounded-md text-white">▲</button>
                    <button class="bg-green text-base py-1 px-3 rounded-md text-white">▼</button>
                </div>
            </div>
            <!-- Elementos que se mostrarán solo en dispositivos móviles -->
            <div class="flex justify-between md:hidden mt-2 mx-auto">
                <div class="flex">
                    <button class="bg-green text-lg py-2 px-4 rounded-md text-white mr-2">▲</button>
                    <button class="bg-green text-lg py-2 px-4 rounded-md text-white">▼</button>
                </div>
            </div>
        </div>
        {{-- Seccion 1 de los asesorados --}}
        <div class="mt-6 w-11/12 mx-auto flex items-center justify-between">
            <div class="lg:hidden w-full mb-5">
                <div class="grid md:grid-cols-2 gap-4 w-full">
                    @foreach ($proyects as $proyect)
                        <div class="bg-white rounded-lg shadow-md p-4 drop-shadow-2xl">
                            <h2 class="text-lg font-bold">{{ $proyect['Nombre del Anteproyecto'] }}</h2>
                            <h2 class="text-lg font-bold">{{ $proyect['Estudiantes Designados'] }}</h2>
                            <p class="text-sm text-gray-500">Votos: {{ $proyect['Votos recibidos'] }}</p>
                            <p class="text-sm text-gray-500"> Asesor academico: {{ $proyect['Asesor Academico'] }}</p>
                            <p class="text-sm text-gray-500">Fecha: {{ $proyect['Fecha de publicacion'] }}</p>
                            <p class="text-sm text-gray-500">Estado: {{ $proyect['Estado'] }}</p>
                        </div>
                    @endforeach
                </div>
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
                @foreach ($proyects as $proyect)
                 <tr {{-- onclick="window.location.href = '/anteproyecto-Asesor' {{ route('/anteproyecto-Asesor' ,  ['id' => $proyect->id]-) }}'; " style="cursor:pointer;" --}}>  
                        <td class="font-roboto font-bold py-5">{{ $proyect['Estudiantes Designados'] }}</td>
                        <td class="font-roboto font-bold py-5">{{ $proyect['Nombre del Anteproyecto'] }}</td>
                        <td class="font-roboto font-bold py-5">Votos: {{ $proyect['Votos recibidos'] }}</td>
                        <td class="font-roboto font-bold py-5">{{ $proyect['Asesor Academico'] }}</td>
                        <td class="font-roboto font-bold py-5">{{ $proyect['Fecha de publicacion'] }}</td>
                        <td class="font-roboto font-bold py-5">{{ $proyect['Estado'] }}</td>
                </tr>
                @endforeach
            </table>
        </div>
        {{-- Seccion 2 Division --}}
        <div class="border-b border-gray-200 mt-5 pb-2 mx-auto w-11/12 md:flex md:items-center md:justify-between">
            <h1 class="font-bold font-montserrat text-xl mb-2 text-center md:text-left">Anteproyectos de la division</h1>
           
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