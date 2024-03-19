@extends('templates.presidentOfTheAcademyTemplate')
@section('contenido')
<div class="bg-[#F3F5F9] grid grid-cols-1 lg:grid-cols-3 lg:gap-5 p-5">

    <section class="col-span-2 flex flex-col flex-1 gap-3">

        <div class="bg-white rounded-md py-2">
            <h1 class="text-base md:text-lg font-bold font-kanit ml-6">¡Bienvenido, Presidente de academia!</h1>
        </div>

        <div class="font-kanit grid grid-cols-2 gap-4">
            <div class=" bg-primaryColor text-white rounded-md flex flex-col justify-center items-center py-10 gap-5">
                <h3 class="font-bold text-lg md:text-2xl lg:text-3xl text-center">Anteproyectos</h3>
                <a href="presidente/anteproyectos" class="text-[#555] bg-white hover:bg-[#eee] py-1 md:py-2 px-5 md:px-10 font-semibold font-roboto rounded-md text-center text-sm md:text-base">
                    Ver todo
                </a>
            </div>

            <div class=" bg-primaryColor text-white rounded-md flex flex-col justify-center items-center py-10 gap-5">
                <h3 class="font-bold text-lg md:text-2xl lg:text-3xl text-center">Asesores académicos</h3>
                <a href="presidente/lista-asesores" class="text-[#555] bg-white hover:bg-[#eee] py-1 md:py-2 px-5 md:px-10 font-semibold font-roboto rounded-md text-center text-sm md:text-base">
                    Ver todo
                </a>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="bg-white font-kanit flex rounded-md items-center gap-6 px-5 py-7">
                <div class=" bg-primaryColor rounded-full p-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-auto" fill="none" viewBox="0 0 24 24" stroke="white" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z" />
                    </svg>
                </div>
                <div>
                    <p class="font-bold text-3xl">{{$votes}}</p>
                    <p class="text-base text-black opacity-50">Votos</p>
                </div>
            </div>

            <div class="bg-white font-kanit flex rounded-md items-center gap-6 px-5 py-7">
                <div class=" bg-primaryColor rounded-full p-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-auto" fill="none" viewBox="0 0 24 24" stroke="white" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z" />
                    </svg>
                </div>
                <div>
                    <p class="font-bold text-3xl">2</p>
                    <p class="text-base text-black opacity-50">Comentarios de alumnos</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-md font-kanit py-10">
                <h3 class="font-semibold ml-10 md:text-center mb-5">Observaciones recientes</h3>
                <div class="mx-10 flex flex-col justify-between">
                    <div class="flex flex-col gap-6">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                            <div class="col-span-2">
                                <p class="text-xl text-[#555]">Elsa Luz Rios</p>
                                <p class=" text-[#888] line-clamp-3">La estructura de tu propuesta es correcta pero necesito que expandas tu justificación e incluyas referencias para tus argumentos</p>
                            </div>
                            <div class="col-span-1 grid place-content-center">
                                <a 
                                    href="estudiante/observaciones"
                                    class="bg-primaryColor rounded-md text-white text-center py-2 px-5 text-sm"
                                >
                                    Ampliar observación
                                </a>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                            <div class="col-span-2">
                                <p class="text-xl text-[#555]">Elsa Luz Rios</p>
                                <p class=" text-[#888] line-clamp-3">La estructura de tu propuesta es correcta pero necesito que expandas tu justificación e incluyas referencias para tus argumentos</p>
                            </div>
                            <div class="col-span-1 grid place-content-center">
                                <a 
                                    href="estudiante/observaciones"
                                    class="bg-primaryColor rounded-md text-white text-center py-2 px-5 text-sm"
                                >
                                    Ampliar observación
                                </a>
                            </div>
                        </div>
                    </div>

                    <a 
                        href="estudiante/observaciones" 
                        class="text-end text-[#888] text-sm mt-7 md:mt-3"
                    >
                        Ver todo
                    </a>
                </div>
            </div>
    </section>

    <section class="col-span-1 flex flex-col flex-1 gap-3 mt-5 lg:mt-0">
        <div>
            <div class="bg-white rounded-md py-1">
                <h3 class="text-lg font-medium font-kanit ml-6">Alumnos sin asesorar</h3>
            </div>
        </div>

        <div class="bg-white rounded-md p-5 grow flex flex-col gap-5">
            <a href="" class="flex gap-4 items-center">
                <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="17.5" cy="17.5" r="17.5" fill="#02AB82"/>
                    <path d="M21.7784 13.0278C21.7784 14.0592 21.3687 15.0484 20.6394 15.7777C19.9101 16.507 18.9209 16.9167 17.8895 16.9167C16.8581 16.9167 15.869 16.507 15.1397 15.7777C14.4104 15.0484 14.0007 14.0592 14.0007 13.0278C14.0007 11.9964 14.4104 11.0073 15.1397 10.2779C15.869 9.54864 16.8581 9.13892 17.8895 9.13892C18.9209 9.13892 19.9101 9.54864 20.6394 10.2779C21.3687 11.0073 21.7784 11.9964 21.7784 13.0278ZM17.8895 19.8334C16.0846 19.8334 14.3536 20.5504 13.0773 21.8267C11.801 23.103 11.084 24.834 11.084 26.6389H24.6951C24.6951 24.834 23.9781 23.103 22.7018 21.8267C21.4255 20.5504 19.6945 19.8334 17.8895 19.8334Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <p class="font-semibold">Israel Boquin</p>
            </a>

            <a href="" class="flex gap-4 items-center">
                <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="17.5" cy="17.5" r="17.5" fill="#02AB82"/>
                    <path d="M21.7784 13.0278C21.7784 14.0592 21.3687 15.0484 20.6394 15.7777C19.9101 16.507 18.9209 16.9167 17.8895 16.9167C16.8581 16.9167 15.869 16.507 15.1397 15.7777C14.4104 15.0484 14.0007 14.0592 14.0007 13.0278C14.0007 11.9964 14.4104 11.0073 15.1397 10.2779C15.869 9.54864 16.8581 9.13892 17.8895 9.13892C18.9209 9.13892 19.9101 9.54864 20.6394 10.2779C21.3687 11.0073 21.7784 11.9964 21.7784 13.0278ZM17.8895 19.8334C16.0846 19.8334 14.3536 20.5504 13.0773 21.8267C11.801 23.103 11.084 24.834 11.084 26.6389H24.6951C24.6951 24.834 23.9781 23.103 22.7018 21.8267C21.4255 20.5504 19.6945 19.8334 17.8895 19.8334Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <p class="font-semibold">Rodrigo Bojorquez</p>
            </a>
        </div>

        <div class="bg-white rounded-md py-1">
            <h3 class="text-lg font-medium font-kanit ml-6">Eventos importantes</h3>
        </div>
        <div class="bg-white p-5">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-3 place-items-center">
                <div>
                    <h3 class="text-darkBlue text-sm font-bold mb-4">Hoy 15/02/2024</h3>
                    <ol class="border-l border-dashed border-primaryColor font-roboto">
                        <li>
                            <div class="flex-start flex items-center pt-3">
                                <div class="-ml-[5px] mr-3 h-[9px] w-[9px] rounded-full bg-primaryColor">
                                </div>
                                <h4 class="text-sm font-semibold">Revision de memoria</h4>
                            </div>
                            <div class="ml-4">
                                <time class="text-[#888] text-sm">
                                    8:40 a 9:30
                                </time>
                            </div>
                        </li>
                        <li>
                            <div class="flex-start flex items-center pt-3">
                                <div class="-ml-[5px] mr-3 h-[9px] w-[9px] rounded-full bg-primaryColor">
                                </div>
                                <h4 class="text-sm font-semibold">Reunión con Mario Hugo</h4>
                            </div>
                            <div class="ml-4">
                                <time class="text-[#888] text-sm">
                                    10:50 a 11:40
                                </time>
                            </div>
                        </li>
                    </ol>
                </div>
                <div>
                    <h3 class="text-darkBlue font-bold text-sm mb-4">Martes 20/02/2024</h3>
                    <ol class="border-l border-dashed border-primaryColor font-roboto">
                        <li>
                            <div class="flex-start flex items-center pt-3">
                                <div class="-ml-[5px] mr-3 h-[9px] w-[9px] rounded-full bg-primaryColor">
                                </div>
                                <h4 class="text-sm font-semibold">Revision de memoria</h4>
                            </div>
                            <div class="ml-4">
                                <time class="text-[#888] text-sm">
                                    8:40 a 9:30
                                </time>
                            </div>
                        </li>
                        <li>
                            <div class="flex-start flex items-center pt-3">
                                <div class="-ml-[5px] mr-3 h-[9px] w-[9px] rounded-full bg-primaryColor">
                                </div>
                                <h4 class="text-sm font-semibold">Reunión con Mario Hugo</h4>
                            </div>
                            <div class="ml-4">
                                <time class="text-[#888] text-sm">
                                    10:50 a 11:40
                                </time>
                            </div>
                        </li>
                    </ol>
                </div>

            </div>
            <div class="flex justify-center mt-5">
                <a href="presidente/eventos/calendario" class="bg-primaryColor text-white px-6 font-bold text-sm py-1 rounded-md">
                    Ver más
                </a>
            </div>
        </div>
    </section>
</div>
@endsection