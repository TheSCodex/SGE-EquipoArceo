@extends('templates/authTemplate')
@section('contenido')

    <div class="bg-[#F3F5F9] flex max-md:block h-screen max-md:h-full gap-8">
        <section class="mt-[10px] ml-[30px] max-md:mx-3 w-2/2">
            <div class="bg-white rounded-md py-1">
                <h1 class="text-lg font-medium font-kanit ml-6 max-md:text-center">Proyecto</h1>
            </div>
            <div class="font-kanit mt-3 flex space-x-5 h-1/3 max-xl:h-1/4">
                <div class=" bg-primaryColor text-white rounded-md w-[100%] flex flex-col justify-evenly max-md:block max-xl:w-full max-xl:h-full max-md:pb-3">
                    <h3 class="font-bold text-3xl px-5 max-md:text-2xl ">Tu propuesta</h3>
                    <p class="px-4 max-md:mb-3">Desarrollar un software integral para la gestión eficiente de eventos académicos, facilitando la planificación, organización y seguimiento de conferencias  seminarios, talleres y actividades similares en entornos educativos...</p>
                    <a href="estudidante/anteproyecto"
                        class="text-[#555] bg-white py-2 px-10 font-normal font-roboto rounded-md w-36 ml-3 max-md:px-36">iniciar</a>
                </div>
            </div>
            <div class="h-[10%] flex space-x-5 max-md:block max-md:space-x-0 mt-5 max-xl:block max-xl:space-x-0 max-xl:mb-3 max-xl:h-48">    
                <div class="bg-white font-kanit flex w-2/6 max-md:w-full max-md:p-3 max-md:my-2 rounded-md space-x-5 items-center max-xl:w-full max-xl:justify-center max-xl:mb-3">
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
                <div class="bg-white font-kanit flex w-2/6 max-md:w-full max-md:p-3 max-md:my-2 rounded-md space-x-5 items-center max-xl:w-full max-xl:justify-center max-xl:mb-3">
                    <div class=" bg-primaryColor rounded-full p-2 ml-10">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                            stroke="white" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <p class="font-bold text-2xl">2</p>
                        <p class="text-sm text-lightGray">Votos de los asesores</p>
                    </div>
                </div>
                <div class="bg-white font-kanit flex w-2/6 max-md:w-full max-md:p-3 max-md:my-2 rounded-md space-x-5 items-center max-xl:w-full max-xl:justify-center max-xl:mb-3">
                    <div class=" bg-primaryColor rounded-full p-2 ml-10">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                            stroke="white" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <p class="font-bold text-2xl">24 / 400 hrs</p>
                        <p class="text-sm text-lightGray">Horas completadas</p>
                    </div>
                </div>
            </div>
            <div class="bg-white mt-5 rounded-md font-kanit py-8 max-xl:mt-3">
                <h3 class="font-semibold ml-10 max-md:text-center">Observaciones recientes</h3>
                <div class="mx-10 flex flex-col h-full justify-between">
                    <div>
                        <div class="flex items-center space-x-8 max-md:block max-md:space-x-0 mt-4">
                            <div>
                                <p class="text-xl text-[#555]">Elsa Luz Rios</p>
                                <p class=" text-[#888] w-3/4 line-clamp-3 max-md:w-full">La estructura de tu propuesta es correcta pero necesito que expandas tu justificación e incluyas referencias para tus argumentos</p>
                            </div>
                            <a href="estudiante/observaciones" class="bg-primaryColor rounded-md text-white text-center max-md:w-full py-1 w-[28%] max-xl:px-14 max-md:py-2">Ampliar observación</a>
                        </div>
                        <div class="flex items-center space-x-8 max-md:block max-md:space-x-0 mt-4">
                            <div>
                                <p class="text-xl text-[#555]">Elsa Luz Rios</p>
                                <p class=" text-[#888] w-3/4 line-clamp-3 max-md:w-full">La estructura de tu propuesta es correcta pero necesito que expandas tu justificación e incluyas referencias para tus argumentos</p>
                            </div>
                            <a href="estudiante/observaciones" class="bg-primaryColor rounded-md text-white max-md:w-full py-1 w-[28%] text-center max-xl:px-14 max-md:py-2">Ampliar observación</a>
                        </div>
                    </div>
                    <a href="estudiante/observaciones"observaciones class="flex w-full justify-end items-end text-[#888] text-sm max-md:justify-center max-md:my-6">Ver todo</a>
                </div>
            </div>
        </section>
        <section class="mt-[10px] mr-[30px] w-1/3 max-md:w-full">
            <div>
                <div class="bg-white rounded-md py-1 max-md:m-3">
                    <h3 class="text-lg font-medium font-kanit ml-6 max-md:text-center">Asesores academicos</h3>
                </div>
                <div class="mt-3 space-y-2 max-md:m-3">
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
            <div class="mt-5 max-md:m-3">
                <div class="bg-white rounded-md py-1">
                    <h3 class="text-lg font-medium font-kanit ml-6 max-md:text-center">Asesores empresariales</h3>
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
            <div class="mt-4 font-roboto space-y-3 max-md:m-3">
                <div class="bg-white rounded-md py-1">
                    <h3 class="text-lg font-medium font-kanit ml-6">Eventos importantes</h3>
                </div>
                <div class="flex flex-col justify-center items-center bg-white max-md:block ">
                    <div class="flex mt-3 space-x-10 mb-5 max-md:block max-md:space-x-0 max-md:ml-6 max-xl:block max-xl:space-x-0 ">
                        <div class="max-xl:mt-3">
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
                        <div class="max-xl:mt-3">
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
                    <a href="estudiante/eventos" class="block bg-primaryColor text-white px-14 font-bold text-center text-sm py-1 rounded-md mb-3 max-md:w-[90%] max-md:ml-4">Ver más</a>

                </div>
            </div>
            <div class="mt-3 flex h-auto gap-4 max-md:block max-md:m-3 max-xl:block">
                <div class="bg-white w-1/2 p-5 font-black max-md:w-full max-md:text-justify max-md:mb-3 max-xl:w-full">
                    <p>No has recebido ninguna penalización hasta el momento, buen trabajo!</p>
                    <div class="flex justify-center p-5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-thumb-up-filled" width="130" height="130" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M13 3a3 3 0 0 1 2.995 2.824l.005 .176v4h2a3 3 0 0 1 2.98 2.65l.015 .174l.005 .176l-.02 .196l-1.006 5.032c-.381 1.626 -1.502 2.796 -2.81 2.78l-.164 -.008h-8a1 1 0 0 1 -.993 -.883l-.007 -.117l.001 -9.536a1 1 0 0 1 .5 -.865a2.998 2.998 0 0 0 1.492 -2.397l.007 -.202v-1a3 3 0 0 1 3 -3z" stroke-width="0" fill="currentColor" />
                            <path d="M5 10a1 1 0 0 1 .993 .883l.007 .117v9a1 1 0 0 1 -.883 .993l-.117 .007h-1a2 2 0 0 1 -1.995 -1.85l-.005 -.15v-7a2 2 0 0 1 1.85 -1.995l.15 -.005h1z" stroke-width="0" fill="currentColor" />
                        </svg>
                    </div>
                </div>
                <div class="bg-white w-1/2 p-5 font-black max-md:w-full max-md:text-center max-md:h-full max-xl:w-full">
                    <p class="mb-5">Progreso de tu estadía</p>
                    <div class="flex justify-center">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ["falta",'completada'],
                datasets: [{
                    label: 'Horas',
                    data: [ 2, 3],
                    backgroundColor: [
                        '#3E5366',
                        '#0FA987'
                    ],
                    borderColor: [
                        '#ffffffff'
                    ],
                    borderWidth: 1
                }]
            }
        });
    </script>
@endsection
