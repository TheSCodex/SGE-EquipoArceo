@extends('templates/authTemplate')
@section('titulo', 'Detalles de usuario')
@section('contenido')
<div class="w-full md:px-[7em] md:mt-[2em] flex bg-white h-screen mb-8">
    <div class="flex flex-col font-montserrat space-y-5 w-full mt-4 md:mt-0 md:w-full ">
        <div class="w-full h-fit     flex justify-center md:justify-start">
            <h1 class="text-xl md:text-3xl text-center font-bold">Detalles de {{$user->name}} {{$user->last_name}}</h1>
        </div>
        <div class="w-full flex flex-col space-y-2 ">
            <div class="flex md:flex-row flex-col items-center md:items-start justify-around">
                <div class="space-y-2">
                    <p class="text-sm">Nombre</p>
                    <div class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]">
                        <p>{{$user->name}}</p> 
                    </div>
                </div>
                <div class=" space-y-2">
                    <p class="text-sm">Apellidos</p>
                    <div class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]">
                        <p>{{$user->last_name}}</p> 
                    </div>
                </div>
            </div>
            <div class="flex md:flex-row flex-col items-center md:items-start justify-around">
                <div class=" space-y-2">
                    <p class="text-sm">Correo</p>
                    <div class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]">
                        <p>{{$user->email}}</p> 
                    </div>
                </div>
                <div class=" space-y-2">
                    <p class="text-sm">Rol</p>
                    <div class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]">
                        <p>{{$user->role->title}}</p> 
                    </div>
                </div>
            </div>
            <div class="flex md:flex-row flex-col items-center md:items-start justify-around">
                <div class=" space-y-2">
                    <p class="text-sm">Identificador</p>
                    <div class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]">
                        <p>{{$user->identifier}}</p> 
                    </div>
                </div>
                @isset($career)
                <div class="space-y-2">
                    <p class="text-sm">Especialidad</p>
                    <div class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]">
                        <p>{{$career->name}}</p> 
                    </div>
                </div>
                @else
                    <div class="space-y-2">
                        <p class="text-sm">Especialidad</p>
                        <div class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]">
                            <p>Sin especialidad</p> 
                        </div>
                    </div>
                @endisset
            
            </div>
            @if ($user?->rol_id == "1")
            <div class="flex md:flex-row flex-col items-center md:items-start justify-around">
                <div class=" space-y-2">
                    <p class="text-sm">Grupo:</p>
                    <div class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]">
                        <p>{{$intern?->group?->name}}</p> 
                    </div>
                </div>
                <div class="hidden md:invisible md:block space-y-2">
                    <p class="text-sm">Identificador</p>
                    <div class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]">
                        <p>{{$user?->identifier}}</p> 
                    </div>
                </div>
            
            </div>
            @endif
        

            @php
                // Obtener la URL de la página anterior
                $previousUrl = url()->previous();

                // Determinar si la URL de la página anterior corresponde al panel de usuarios
                $isPanelUsers = Str::contains($previousUrl, 'panel-users');

                // Determinar si la URL de la página anterior corresponde al panel de grupos
                $isPanelGroups = Str::contains($previousUrl, 'panel-groups');
            @endphp

            <!-- Enlace de regreso generado dinámicamente -->
            @if ($isPanelUsers)
                <a class="p-2 self-center bg-primaryColor w-[17.5em] md:w-[30rem] rounded-md text-white hover:bg-darkgreen text-center" href="{{ route('panel-users.index') }}">Regresar al panel de usuarios</a>
            @elseif ($isPanelGroups)
                <a class="p-2 self-center bg-primaryColor w-[17.5em] md:w-[30rem] rounded-md text-white hover:bg-darkgreen text-center" href="{{ url()->previous() }}">Regresar al panel del grupo</a>

                {{-- <a class="p-2 self-center bg-primaryColor w-[17.5em] md:w-[30rem] rounded-md text-white hover:bg-darkgreen text-center" href="{{ route('panel-groups.index') }}">Regresar al panel de grupos</a> --}}
            @else
                <!-- Si la URL anterior no corresponde a ninguno de los paneles -->
            @endif


        </div>
    </div>
</div>
@endsection