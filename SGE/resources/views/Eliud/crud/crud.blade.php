@extends('templates.directorsAssistantTemplate')
@section('titulo', 'Panel de Usuarios')
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


    <main class="flex flex-col h-full min-h-screen">
        <div class="w-11/12 pb-2 mx-auto mt-5 border-b border-gray-200 md:flex md:items-center md:justify-between">
            <h1 class="mb-2 text-xl font-bold text-center font-montserrat md:text-left">Lista de Documentos</h1>
            <div class="flex flex-row items-center justify-end">
                <div class="flex-1 md:mr-2">
                    <form action="{{ route('docs.search') }}" method="POST" class="hidden md:block">
                        @csrf
                        <div class="flex items-center space-x-4">
                            <div class="relative">
                                <input class="px-4 py-2 border-b rounded-md border-primaryColor placeholder-primaryColor focus:outline-none focus:border-blue-500" type="search" name="search" placeholder="Buscar....">
                            </div>
                            <button type="submit" class="hidden px-4 py-2 text-lg text-white rounded-md md:block bg-primaryColor md:ml-4">Filtrar</button>
                        </div>
                    </form>
                </div>
                {{-- <div class="hidden md:flex md:flex-col md:items-center md:mx-3">
                    <button class="px-3 py-1 mb-1 text-base text-white rounded-md bg-green">▲</button>
                    <button class="px-3 py-1 text-base text-white rounded-md bg-green">▼</button>
                </div> --}}
            </div>
            <!-- Elementos que se mostrarán solo en dispositivos móviles -->
            <div class="flex justify-between mx-auto mt-2 md:hidden">
                {{-- <div class="flex">
                    <button class="px-4 py-2 mr-2 text-white rounded-md bg-green">▲</button>
                    <button class="px-4 py-2 text-white rounded-md bg-green">▼</button>
                </div> --}}
                <a href="" class="px-4 py-2 ml-2 text-lg text-white rounded-md bg-green">Generar Nuevo Documento</a>
            </div>
        </div>
        <div class="flex items-center justify-between w-11/12 mx-auto mt-6">
            {{-- cards --}}
            <div class="w-full mb-5 lg:hidden">
                <div class="grid w-full gap-4 md:grid-cols-2">
                    @foreach ($docs as $doc)
                        <div class="p-4 bg-white rounded-lg shadow-md drop-shadow-2xl">
                            <h2 class="text-lg font-bold">{{ $doc['titulo'] }}</h2>
                            <h2 class="text-lg font-bold">{{ $doc['descripcion'] }}</h2>
                            <p class="text-sm text-gray-500">Destinatario: {{ $doc['destinatario'] }}</p>
                            <p class="text-sm text-gray-500">{{ $doc['origen'] }}</p>
                            <div class="flex justify-end mt-4">
                                <img src="/img/logos/pencil.svg" alt="Edit" class="cursor-pointer">
                                <img src="/img/logos/trash.svg" alt="Delete" class="ml-2 cursor-pointer">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- Display table on larger screens -->
            <div class="hidden w-full lg:block">
                <table class="text-center">
                    <tr>
                        <th class="text-[#ACACAC] font-roboto text-xs">Título</th>
                        <th class="text-[#ACACAC] font-roboto text-xs">Descripción</th>
                        <th class="text-[#ACACAC] font-roboto text-xs">Destinatario</th>
                        <th class="text-[#ACACAC] font-roboto text-xs">Origen</th>
                        <th class="text-[#ACACAC] font-roboto text-xs"></th>
                        <th class="text-[#ACACAC] font-roboto text-xs"></th>
                        <th class="text-[#ACACAC] font-roboto text-xs"></th>
                    </tr>
                    @foreach ($docs as $doc)
                        <tr>
                            <td class="py-5 font-bold font-roboto">{{ $doc['titulo'] }}</td>
                            <td class="py-5 font-bold font-roboto">{{ $doc['descripcion'] }}</td>
                            <td class="py-5 font-bold font-roboto">{{ $doc['destinatario'] }}</td>
                            <td class="py-5 font-bold font-roboto">{{ $doc['origen'] }}</td>
                            <td class="py-5 font-bold font-roboto"><img src="/img/logos/pencil.svg"></td>
                            <td class="py-5 font-bold font-roboto"><img src="/img/logos/trash.svg"></td>
                            <td class="py-5 font-bold font-roboto"><img src="/img/logos/descarga.png"></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </main>
@endsection