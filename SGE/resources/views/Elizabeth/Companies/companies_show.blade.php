@extends('templates/authTemplate')
@section('titulo', 'Detalles de usuario')
@section('contenido')
    <div class="w-full py-8 md:px-[7em] md:mt-[2em] items-center sm:h-screen justify-center flex bg-white">
        <div class="flex flex-col font-montserrat space-y-5 w-full mt-4 md:mt-0 md:w-full ">
            <div class="w-full h-fit flex md:justify-start">
                <h1 class="text-xl md:text-3xl text-center max-w-[70rem] truncate font-bold">Detalles de {{ $companies->name }}
                </h1>
            </div>

            <div class=" grid   place-content-center gap-4 lg:grid-cols-2 ">
                <div>
                    <p class="text-sm">Nombre de la empresa</p>
                    <div class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]">
                        <p class="sm:max-w-[20em] truncate">{{ $companies->name }}</p>
                    </div>
                </div>

                <div class="">
                    <p class="text-sm">Celular</p>
                    <div class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]">
                        <p class="max-w-[20em] truncate">{{ $companies->phone }}</p>
                    </div>
                </div>
                <div class="">
                    <p class="text-sm">Direccion</p>
                    <div class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]">
                        <p class="max-w-[30em] truncate">{{ $companies->address }}</p>
                    </div>
                </div>
                <div class="">
                    <p class="text-sm">Correo electronico</p>
                    <div class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]">
                        <p class="max-w-[20em] truncate">{{ $companies->email }}</p>
                    </div>
                </div>
                <div class="">
                    <p class="text-sm">Fecha de registro</p>
                    <div class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]">
                        <p class="max-w-[20em] truncate">{{ $companies->registration_date }}</p>
                    </div>
                </div>
                <div class="">
                    <p class="text-sm">RFC</p>
                    <div class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]">
                        <p class="max-w-[20em] truncate">{{ $companies->rfc }}</p>
                    </div>
                </div>
                <div class="">
                    <p class="text-sm">Área de especialización</p>
                    <div class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]">
                        <p class="sm:max-w-[20em] truncate">{{ $companies->businessSector->title }}</p>
                    </div>
                </div>


            </div>

            <a class="p-2 self-center bg-primaryColor w-[17.7rem] md:w-[30rem] rounded-md text-white hover:bg-darkgreen text-center"
                href="/panel-companies">Regresar al panel de empresas</a>

        </div>
    @endsection('contenido')
