@extends('templates.administratorTemplate')
@section('titulo', 'Panel de Usuarios')
@section('contenido')
    {{-- Test --}}
    @php
    $users = [
        ['nombre' => 'Empresa', 'correo' => 'Empresa@empresa.com', 'celular' => '22393126@gmail.com', 'fecha_de_registro' => '12/12/12', 'dirección' => 'calle bonita', 'rfc' => '121221', 'rfc' => '121221', 'area_de_especialización' => 'Hotelería'],
        ['nombre' => 'Empresa', 'correo' => 'Empresa@empresa.com', 'celular' => '22393126@gmail.com', 'fecha_de_registro' => '12/12/12', 'dirección' => 'calle bonita', 'rfc' => '121221', 'rfc' => '121221', 'area_de_especialización' => 'Hotelería'],
        ['nombre' => 'Empresa', 'correo' => 'Empresa@empresa.com', 'celular' => '22393126@gmail.com', 'fecha_de_registro' => '12/12/12', 'dirección' => 'calle bonita', 'rfc' => '121221', 'rfc' => '121221', 'area_de_especialización' => 'Hotelería'],
        ['nombre' => 'Empresa', 'correo' => 'Empresa@empresa.com', 'celular' => '22393126@gmail.com', 'fecha_de_registro' => '12/12/12', 'dirección' => 'calle bonita', 'rfc' => '121221', 'rfc' => '121221', 'area_de_especialización' => 'Hotelería'],
        ['nombre' => 'Empresa', 'correo' => 'Empresa@empresa.com', 'celular' => '22393126@gmail.com', 'fecha_de_registro' => '12/12/12', 'dirección' => 'calle bonita', 'rfc' => '121221', 'rfc' => '121221', 'area_de_especialización' => 'Hotelería'],

    
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
            <h1 class="font-bold font-montserrat text-xl mb-2 text-center md:text-left">Lista de Empresas</h1>
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
                <a href="/panel-empresas-create"
                    class="hidden md:block bg-green text-lg py-2 px-4 rounded-md text-white md:ml-4">Agregar nueva empresa
                </a>
            </div>
            <!-- Elementos que se mostrarán solo en dispositivos móviles -->
            <div class="flex justify-between md:hidden mt-2 mx-auto">
                <div class="flex">
                    <button class="bg-green text-lg py-2 px-4 rounded-md text-white mr-2">▲</button>
                    <button class="bg-green text-lg py-2 px-4 rounded-md text-white">▼</button>
                </div>
                <a href="/panel-empresas-create" class="bg-green text-lg py-2 px-4 rounded-md text-white ml-2">Agregar nueva empresa
                    </a>
            </div>
        </div>
        <div class="mt-6 w-11/12 mx-auto flex items-center justify-between">
            {{-- cards --}}
            <div class="lg:hidden w-full mb-5">
                <div class="grid md:grid-cols-2 gap-4 w-full">
                    @foreach ($users as $user)
                        <div class="bg-white rounded-lg shadow-md p-4 drop-shadow-2xl">
                            <h2 class="text-lg font-bold">{{ $user['nombre'] }}</h2>
                            <h2 class="text-lg font-bold">{{ $user['correo'] }}</h2>
                            <p class="text-sm text-gray-500">celular: {{ $user['celular'] }}</p>
                            <p class="text-sm text-gray-500">Fecha de registro: {{ $user['fecha_de_registro'] }}</p>
                            <p class="text-sm text-gray-500">dirección: {{ $user['dirección'] }}</p>
                            <p class="text-sm text-gray-500">rfc: {{ $user['rfc'] }}</p>
                            <p class="text-sm text-gray-500">Especialidad: {{ $user['area_de_especialización'] }}</p>
                            <div class="flex justify-end mt-4">
                                <img src="/img/logos/pencil.svg" alt="Edit" class="cursor-pointer">
                                <img src="/img/logos/trash.svg" alt="Delete" class="ml-2 cursor-pointer">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- Display table on larger screens -->
            <div class="hidden lg:block w-full">
                <table class="text-center">
                    <tr>
                        <th class="text-[#ACACAC] font-roboto text-xs">Nombre</th>
                        <th class="text-[#ACACAC] font-roboto text-xs">Correo Electrónico</th>
                        <th class="text-[#ACACAC] font-roboto text-xs">Celular</th>
                        <th class="text-[#ACACAC] font-roboto text-xs">Fecha de registro</th>
                        <th class="text-[#ACACAC] font-roboto text-xs">Dirección</th>
                        <th class="text-[#ACACAC] font-roboto text-xs">RFC</th>
                        <th class="text-[#ACACAC] font-roboto text-xs">Area de especialización</th>
                        <th class="text-[#ACACAC] font-roboto text-xs"></th>
                        <th class="text-[#ACACAC] font-roboto text-xs"></th>
                    </tr>
                    @foreach ($users as $user)
                        <tr>
                            <td class="font-roboto font-bold py-5">{{ $user['nombre'] }}</td>
                            <td class="font-roboto font-bold py-5">{{ $user['correo'] }}</td>
                            <td class="font-roboto font-bold py-5">{{ $user['celular'] }}</td>
                            <td class="font-roboto font-bold py-5">{{ $user['fecha_de_registro'] }}</td>
                            <td class="font-roboto font-bold py-5">{{ $user['dirección'] }}</td>
                            <td class="font-roboto font-bold py-5">{{ $user['rfc'] }}</td>
                            <td class="font-roboto font-bold py-5">{{ $user['area_de_especialización'] }}</td>
                            <td class="font-roboto font-bold py-5"><img src="/img/logos/pencil.svg"></td>
                            <td class="font-roboto font-bold py-5"><img src="/img/logos/trash.svg"></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </main>
@endsection