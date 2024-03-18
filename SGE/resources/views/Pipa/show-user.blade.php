@extends('templates/authTemplate')
@section('titulo', 'Detalles de usuario')
@section('contenido')
<div class="w-full md:px-[7em] md:mt-[2em] h-fit flex bg-white">
    <div class="flex flex-col font-montserrat space-y-5 w-full mt-4 md:mt-0 md:w-full ">
        <div class="w-full h-fit flex justify-center md:justify-start">
            <h1 class="text-3xl font-bold">Detalles de {{$user->name}} {{$user->last_name}}</h1>
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
                <div class=" space-y-2">
                    <p class="text-sm">Especialidad</p>
                    <div class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]">
                        <p>{{$user->career->name}}</p> 
                    </div>
                </div>
            </div>

            <a class="p-2 self-center bg-primaryColor sm:w-[20rem] md:w-[30rem] rounded-md text-white hover:bg-darkgreen text-center" href="/panel-users">Regresar al panel de usuarios</a>


    </form>
</div>
@endsection