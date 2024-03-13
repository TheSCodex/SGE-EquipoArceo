@extends('templates.administratorTemplate')

@section('contenido')
    <div class="flex h-full gap-8">
        <section class="mt-[10px] ml-[30px] w-2/3">
            <div class="bg-white rounded-md py-1">
                <h1 class="text-lg font-medium font-kanit ml-6">Bienvenido, Administrador!</h1>
            </div>
            <div class="font-kanit mt-3 flex space-x-5 h-[36%]">
                <div class=" bg-primaryColor text-white rounded-md w-1/2 flex flex-col justify-evenly items-center">
                    <h3 class="font-bold text-3xl">Estudiantes</h3>
                    <a href="panel-users"
                        class="text-[#555] bg-white hover:bg-[#eee] py-2 px-10 font-normal font-roboto rounded-md text-center">Ver todo</a>
                </div>
                <div class=" bg-primaryColor text-white rounded-md w-1/2 flex flex-col justify-evenly items-center">
                    <h3 class="font-bold text-3xl">Proyectos</h3>
                    <a href="#"
                        class="text-[#555] bg-white hover:bg-[#eee] py-2 px-10 font-normal font-roboto rounded-md text-center">Ver todo</a>
                </div>
            </div>
            <div class="bg-white font-roboto shadow-md py-3 mt-3 rounded-md h-[53%]">
                <div class="flex w-full justify-between items-center px-10 border-b-2 pb-3">
                    <div>
                        <h3 class="text-[#828282] font-semibold uppercase text-sm">Aprobación de proyectos</h3>
                        <p class="text-[#4f4f4f] text-xs">Por academia</p>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-lightGray" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
        </section>
        <section class="mt-[10px] mr-[30px] w-1/3">
            <div>
                <div class="bg-white rounded-md py-1">
                    <h3 class="text-lg font-medium font-kanit ml-6">Empresas</h3>
                </div>
                <div class="mt-3 space-y-2">
                    <div class="flex font-roboto text-base items-center space-x-5 bg-white rounded-md py-2">
                        <div class="bg-primaryColor rounded-full p-1 ml-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="white" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <p>Bimbo SA de CV</p>
                    </div>
                </div>
            </div>
            <div class="mt-5">
                <div class="bg-white rounded-md py-1">
                    <h3 class="text-lg font-medium font-kanit ml-6">Asesores empresariales</h3>
                </div>
                <div class="mt-2 space-y-2">
                    <div class="flex font-roboto text-base items-center space-x-5 bg-white rounded-md py-2">
                        <div class="bg-primaryColor rounded-full p-1 ml-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="white" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <p>Luis Villafaña</p>
                    </div>
                </div>
            </div>
            <div class="mt-5">
                <div class="bg-white rounded-md py-1">
                    <h3 class="text-lg font-medium font-kanit ml-6">Carreras y Divisiones</h3>
                </div>
                <div class="mt-2 space-y-2">
                    <div class="flex font-roboto text-base items-center space-x-5 bg-white rounded-md py-2">
                        <div class="bg-primaryColor rounded-full p-1 ml-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="white" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <p>Ingenieria y Tecnologia</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-md mt-3 py-3 px-6 font-roboto h-[53%]">
                <div class="space-y-1 flex flex-col w-full pt-5 pl-5">
                    <h3 class="text-sm text-[#828282] font-semibold">Total de proyectos</h3>
                    <p class="text-xs text-[#4f4f4f]">Índice de aprobacion</p>
                </div>
            </div>
        </section>
    </div>
@endsection
