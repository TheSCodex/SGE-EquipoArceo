@extends('templates/authTemplate')
@section('titulo', 'Detalles de grupos')
@section('contenido')

<div class="min-h-screen flex flex-col justify-start items-center space-y-2">
    <div class="w-[90%] md:px-[7em] md:mt-[2em] flex flex-col bg-white">
        <div class="flex flex-col font-montserrat space-y-5 w-full mt-4 md:mt-0 md:w-full ">
            <div class="w-full h-fit flex justify-center md:justify-start">
                <h1 class="text-xl md:text-3xl text-center font-bold">Detalles de {{$group->name}}</h1>
                
            </div>
            <div>
                <p class="text-xs text-center px-4 md:p-0 md:text-start md:text-xl text-gray-600 py-3 md:w-fit"> <span class="font-semibold">Carrera: </span> {{$group->career->name}}</p>
            </div>
        </div>
        <section class="flex flex-col justify-start items-center flex-grow">
            <div class="w-[90%] md:w-full min-h-screen">
                <div class="sm:p-8 md:p-0 md:mt-5 text-left w-full mb-[2vh] sm:mb-0 ">
                    <div class="border-b border-gray-200 mt-5 pb-2 mx-auto w-full md:flex md:items-center md:justify-between">
                        <h1 class="font-semibold text-gray-600 font-montserrat text-xl mb-2 text-center md:text-left">Lista de estudiantes asociados al grupo</h1>
                        <div class="flex items-center flex-row justify-end">
                            {{-- <form action="{{ route('panel-users.index') }}" method="GET" id="search-form">
                                <div class="hidden md:flex items-center relative">
                                    <input name="query" id="search" class="border-primaryColor placeholder-primaryColor border-b border rounded-md" type="search" placeholder="Buscar...." style="color: green;">
                                </div>
                            </form>              --}}
                        </div>
    
                    </div>
                </div>
        
                <div class="mt-6 w-full mx-auto flex items-center justify-between mb-5">
        
                    <div class="lg:hidden w-full mb-5">
                        <div class="grid md:grid-cols-2 gap-4 w-full">
                            @foreach ($interns as $intern)  
                            <div class="bg-white rounded-lg shadow-md p-4 drop-shadow-2xl ">
                                <h2 class="text-lg font-bold text-ellipsis overflow-hidden">{{ $intern->user->name }} {{ $intern->user->last_name }}</h2>
                                <p class="text-sm text-gray-500 text-nowrap text-ellipsis overflow-hidden w-56">Correo: {{ $intern->user->email }}</p>
                                <p class="text-sm text-gray-500 text-nowrap text-ellipsis overflow-hidden w-56">Identificador: {{ $intern->user->identifier }}</p>
                                <div class="flex justify-end mt-4 space-x-2">
                                    <td>                    
                                        <a href="{{route('panel-users.show', $intern->user->id)}}" class="bg-primaryColor hover:bg-darkBlue ease-in duration-100 py-2 px-4 text-white rounded-xl font-semibold">Ver detalles</a>
                                    </td>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="hidden lg:block w-full">
                        {{-- sweet alert para mostrar el error al mandar un correo --}}
                        @if(session('error'))
                        <script>
                            Swal.fire({
                                title: 'Oops...',
                                text: '{{ session("error") }}',
                                icon: 'error'
                            });
                        </script>
                        @endif
                        {{-- sweet alert para indicar que el usuario se agregó :3 --}}
                        @if(session('success'))
                            <script>
                                Swal.fire({
                                    title: '¡Éxito!',
                                    text: '{{ session("success") }}',
                                    icon: 'success'
                                });
                            </script>
                        @endif
                        
                        <table class="text-start w-full">
                            <tr class="w-full">
                                <th class="text-[#ACACAC] font-roboto text-xs text-start pl-5">N°</th>
                                <th class="text-[#ACACAC] font-roboto text-xs text-start pl-5">Nombre completo</th>
                                <th class="text-[#ACACAC] font-roboto text-xs text-start w-[30%]">Correo</th>
                                <th class="text-[#ACACAC] font-roboto text-xs">Identificador</th>
                                <th class="text-[#ACACAC] font-roboto text-xs">Detalles</th>
                            </tr>
        
                            @if(count($interns) > 0)
    
                                @foreach ($interns as $intern)
                                    @php
                                        $counter = ($interns->currentPage() - 1) * $interns->perPage() + $loop->index + 1;
                                    @endphp
                                    <tr class="w-full transition duration-100 ease-in-out hover:bg-lightGray/20 border-b-gray-200 border-b-[0.5px]">
                                        <td class="font-roboto py-5 cursor-pointer pl-5">{{ $counter }}</td>
                                        <td class="font-roboto py-5 pl-5">{{ $intern->user->name }} {{ $intern->user->last_name }}</td>
                                        <td class="font-roboto py-5">{{ $intern->user->email }}</td>
                                        <td class="font-roboto py-5 text-center">{{ $intern->user->identifier }}</td>
                                        <td class="font-roboto py-5 cursor-pointer">
                                            <a href="{{ route('panel-users.show', $intern->user->id )}}" class="flex justify-center">
                                                <img src="/img/ojoGreen.svg" class="w-7">
                                            </a>
                                        </td>
                                    </tr>
    
                                @endforeach
                            </table>
    
                            @else
                        </table>
    
                            <p id="noDataMessage" class="mt-4 text-red-500 hidden text-center  text-lightGray font-bold text-2xl" style="display: block;">
                                Sin resultados</p>
                            @endif
        
                    </div>
                </div>
                <div id="no-users-message" class="hidden mt-20 text-red-500 h-screen text-center text-lightGray font-bold text-2xl">Sin resultados.
                </div>
                <div class="my-5 mx-auto mt-auto md:w-full">
                    {{$interns->links()}}
                </div>
            </div>      
            <a class="p-2 mb-4 self-center bg-primaryColor w-[17.5em] md:w-[30rem] rounded-md text-white hover:bg-darkgreen text-center" href="/panel-groups">Regresar al panel de grupos</a>
           
        </section>
        
        
    </div>
</div>
@endsection