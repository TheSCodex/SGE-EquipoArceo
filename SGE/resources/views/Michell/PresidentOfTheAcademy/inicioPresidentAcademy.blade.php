@extends('templates.presidentOfTheAcademyTemplate')
@section('contenido')
    <div class="bg-[#F3F5F9] flex h-screen gap-8">
        <section class="mt-[10px] ml-[30px] w-2/3">
            <div class="bg-white rounded-md py-1">
                <h1 class="text-lg font-medium font-kanit ml-6">Asignación de asesorados</h1>
            </div>
            <div class="font-kanit mt-3 flex space-x-5 h-1/3">
                <div class=" bg-primaryColor text-white rounded-md w-1/2 flex flex-col justify-evenly items-center">
                    <h3 class="font-bold text-3xl">Estudiantes</h3>
                    <a href="lista-estudiantes"
                        class="text-[#555] bg-white hover:bg-[#eee] py-2 px-10 font-normal font-roboto rounded-md text-center">Ver todo</a>
                </div>
                <div class=" bg-primaryColor text-white rounded-md w-1/2 flex flex-col justify-evenly items-center">
                    <h3 class="font-bold text-3xl">Proyectos</h3>
                    <a href="lista-proyectos"
                        class="text-[#555] bg-white hover:bg-[#eee] py-2 px-10 font-normal font-roboto rounded-md text-center">Ver todo</a>
                </div>
            </div>
            <div class="h-[10%] flex space-x-5 mt-5">
                <div class="bg-white font-kanit flex w-1/2 rounded-md space-x-5 items-center">
                    <div class=" bg-primaryColor rounded-full p-2 ml-10">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                            stroke="white" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <p class="font-bold text-2xl">2</p>
                        <p class="text-sm text-lightGray">Votos</p>
                    </div>
                </div>
                <div class="bg-white font-kanit flex w-1/2 rounded-md space-x-5 items-center">
                    <div class=" bg-primaryColor rounded-full p-2 ml-10">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                            stroke="white" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <p class="font-bold text-2xl">2</p>
                        <p class="text-sm text-lightGray">Comentarios de alumnos</p>
                    </div>
                </div>
            </div>
            <div class="bg-white mt-5 rounded-md font-kanit py-8">
                <h3 class="font-semibold ml-10">Observaciones recientes</h3>
                <div class="mx-10 flex flex-col h-full justify-between">
                    <div>
                        <div class="flex items-center space-x-8 mt-4">
                            <div>
                                <p class="text-xl text-[#555]">Asesor</p>
                                <p class=" text-[#888] w-3/4 line-clamp-3">La estructura de tu propuesta es correcta pero
                                    necesito que expandas tu
                                    justificación e incluyas
                                    referencias para tus argumentos</p>
                            </div>
                            <button onclick="window.location.href='/observaciones'" class="bg-primaryColor rounded-md text-white py-1 w-[28%]">Ampliar observación</button>
                        </div>
                        <div class="flex items-center space-x-8 mt-7">
                            <div>
                                <p class="text-xl text-[#555]">Asesor</p>
                                <p class=" text-[#888] w-3/4 line-clamp-3">La estructura de tu propuesta es correcta pero
                                    necesito que expandas tu
                                    justificación e incluyas
                                    referencias para tus argumentos</p>
                            </div>
                            <button onclick="window.location.href='/observaciones'" class="bg-primaryColor rounded-md text-white py-1 w-[28%]">Ampliar observación</button>
                        </div>
                    </div>
                    <a href="observaciones" class="flex w-full justify-end items-end text-[#888] text-sm">Ver todo</a>
                </div>
            </div>
        </section>
        <section class="mt-[10px] mr-[30px] w-1/3">
            <div>
                <div class="bg-white rounded-md py-1">
                    <h3 class="text-lg font-medium font-kanit ml-6">Asesores academicos</h3>
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
                        <p>Elsa Luz Rios</p>
                    </div>
                    <div class="flex font-roboto text-base items-center space-x-5 bg-white rounded-md py-2">
                        <div class="bg-primaryColor rounded-full p-1 ml-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="white" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <p>Elsa Luz Rios</p>
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
            <div class="mt-2 font-roboto space-y-3">
                <div class="bg-white rounded-md py-1">
                    <h3 class="text-lg font-medium font-kanit ml-6">Eventos importantes</h3>
                </div>
                <div class="flex flex-col justify-center items-center bg-white">
                    <div class="flex mt-3 space-x-10 mb-5">
                        <div>
                            <h3 class="text-darkBlue text-sm font-bold">Hoy 15/02/2024</h3>
                            <ol class="border-l border-dashed border-primaryColor font-roboto">
                                <li>
                                    <div class="flex-start flex items-center pt-3">
                                        <div
                                            class="-ml-[5px] mr-3 h-[9px] w-[9px] rounded-full bg-primaryColor">
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
                                        <div
                                            class="-ml-[5px] mr-3 h-[9px] w-[9px] rounded-full bg-primaryColor">
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
                            <h3 class="text-darkBlue font-bold text-sm">Martes 20/02/2024</h3>
                            <ol class="border-l border-dashed border-primaryColor font-roboto">
                                <li>
                                    <div class="flex-start flex items-center pt-3">
                                        <div
                                            class="-ml-[5px] mr-3 h-[9px] w-[9px] rounded-full bg-primaryColor">
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
                                        <div
                                            class="-ml-[5px] mr-3 h-[9px] w-[9px] rounded-full bg-primaryColor">
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
                    <a href="eventos" class="bg-primaryColor text-white px-14 font-bold text-sm py-1 rounded-md mb-3">Ver
                        más</a>
                </div>
            </div>
            <div class="mt-3 flex h-auto gap-4">
                <div class="bg-white w-1/2">
                    <p>Penalizaciones</p>
                </div>
                <div class="bg-white w-1/2">
                    <p>Progreso de estadias</p>
                </div>
            </div>
        </section>
    </div>
@endsection
