@extends('templates/authTemplate')
@section('contenido')
    <div class="bg-[#F3F5F9] p-5 lg:gap-5 grid grid-cols-1 lg:grid-cols-3 grow">
        <section class="col-span-2 gap-3 flex flex-1 flex-col">
            <div class="bg-white rounded-md py-2">
                <h1 class="text-lg font-medium font-kanit ml-6 max-md:text-center">Anteproyecto</h1>
            </div>
            <div class="font-kanit">
                <div class=" bg-primaryColor text-white rounded-md p-7">
                    <h3 class="font-bold text-lg md:text-xl">Tu propuesta</h3>
                    <p class="my-3">Desarrollar un software integral para la gestión eficiente de eventos académicos,
                        facilitando la planificación, organización y seguimiento de conferencias seminarios, talleres y
                        actividades similares en entornos educativos...</p>
                    <a href="estudiante/anteproyecto"
                        class="text-[#555] bg-white py-2 px-7 font-normal font-roboto rounded-md text-sm">
                        Iniciar
                    </a>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-2 grow">
                <div class="bg-white font-kanit flex gap-4 rounded-md items-center p-3">
                    <div class=" bg-primaryColor rounded-full p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                            stroke="white" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <p class="font-bold text-2xl">2</p>
                        <p class="text-sm text-black opacity-50">Comentarios de alumnos</p>
                    </div>
                </div>

                <div class="bg-white font-kanit flex gap-4 rounded-md items-center p-3">
                    <div class=" bg-primaryColor rounded-full p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                            stroke="white" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <p class="font-bold text-2xl">2</p>
                        <p class="text-sm text-black opacity-50">Votos de los asesores</p>
                    </div>
                </div>

                <div class="bg-white font-kanit flex gap-4 rounded-md items-center p-3">
                    <div class=" bg-primaryColor rounded-full p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                            stroke="white" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <p class="font-bold text-2xl">24 / 120</p>
                        <p class="text-sm text-black opacity-50">Dias restantes</p>
                    </div>
                </div>

            </div>

            <div class="bg-white rounded-md font-kanit py-8">
                <h3 class="font-semibold ml-10 md:text-center mb-5">Observaciones recientes</h3>
                <div class="mx-10 flex flex-col justify-between">
                    <div class="flex flex-col gap-5">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                            <div class="col-span-2">
                                <p class="text-xl text-[#555]">Elsa Luz Rios</p>
                                <p class=" text-[#888] line-clamp-3">La estructura de tu propuesta es correcta pero necesito
                                    que expandas tu justificación e incluyas referencias para tus argumentos</p>
                            </div>
                            <div class="col-span-1 grid place-content-center">
                                <a href="estudiante/anteproyecto/observaciones"
                                    class="bg-primaryColor rounded-md text-white text-center py-2 px-5 text-sm">
                                    Ampliar observación
                                </a>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                            <div class="col-span-2">
                                <p class="text-xl text-[#555]">Elsa Luz Rios</p>
                                <p class=" text-[#888] line-clamp-3">La estructura de tu propuesta es correcta pero necesito
                                    que expandas tu justificación e incluyas referencias para tus argumentos</p>
                            </div>
                            <div class="col-span-1 grid place-content-center">
                                <a href="estudiante/anteproyecto/observaciones"
                                    class="bg-primaryColor rounded-md text-white text-center py-2 px-5 text-sm">
                                    Ampliar observación
                                </a>
                            </div>
                        </div>
                    </div>

                    <a href="estudiante/anteproyecto/observaciones" class="text-end text-[#888] text-sm mt-5 md:mt-0">
                        Ver todo
                    </a>
                </div>
            </div>
        </section>
        <section class="flex flex-col flex-1 gap-3 w-full col-span-1">

            <div class="bg-white rounded-md py-1 mt-3 lg:mt-0">
                <h3 class="text-lg font-medium font-kanit ml-6 max-md:text-center">Asesores academicos</h3>
            </div>

            <div class="space-y-2">
                <div class="flex font-roboto text-base items-center space-x-5 bg-white rounded-md py-2">
                    <div class="bg-primaryColor rounded-full p-1 ml-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="white" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <p>{{ $advisor->advisor_name }}</p>
                </div>
            </div>

            <div class="bg-white rounded-md py-1">
                <h3 class="text-lg font-medium font-kanit ml-6 max-md:text-center">Asesores empresariales</h3>
            </div>

            <div class="space-y-2">
                <div class="flex font-roboto text-base items-center space-x-5 bg-white rounded-md py-2">
                    <div class="bg-primaryColor rounded-full p-1 ml-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="white" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    @foreach ($empresarial as $item)
                        <p>{{ $item->asesor_empresarial }}</p>
                    @endforeach

                </div>
            </div>

            <div class=" font-roboto bg-white p-5 rounded-md">

                <h3 class="text-lg font-medium font-kanit mb-3">Actividades importantes</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-3 place-items-center">
                    <div class="">
                        <h3 class="text-darkBlue text-sm font-bold mb-2">Hoy 15/05/2024</h3>
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
                    <div class="">
                        <h3 class="text-darkBlue font-bold text-sm  mb-2">Martes 20/07/2024</h3>
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

                <div class="flex justify-center">
                    <a href="estudiante/calendario"
                        class="bg-primaryColor text-white px-6 font-bold text-center text-sm py-1 rounded-md mt-3">
                        Ver más
                    </a>
                </div>

            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                <div class="bg-white p-5 font-black flex flex-col justify-center">
                    <p class="text-center mb-5">No has recibido ninguna penalización hasta el momento, buen trabajo!</p>
                    <div class="flex justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-thumb-up-filled"
                            width="70" height="70" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M13 3a3 3 0 0 1 2.995 2.824l.005 .176v4h2a3 3 0 0 1 2.98 2.65l.015 .174l.005 .176l-.02 .196l-1.006 5.032c-.381 1.626 -1.502 2.796 -2.81 2.78l-.164 -.008h-8a1 1 0 0 1 -.993 -.883l-.007 -.117l.001 -9.536a1 1 0 0 1 .5 -.865a2.998 2.998 0 0 0 1.492 -2.397l.007 -.202v-1a3 3 0 0 1 3 -3z"
                                stroke-width="0" fill="currentColor" />
                            <path
                                d="M5 10a1 1 0 0 1 .993 .883l.007 .117v9a1 1 0 0 1 -.883 .993l-.117 .007h-1a2 2 0 0 1 -1.995 -1.85l-.005 -.15v-7a2 2 0 0 1 1.85 -1.995l.15 -.005h1z"
                                stroke-width="0" fill="currentColor" />
                        </svg>
                    </div>
                </div>
                <div class="bg-white p-5 font-black max-md:w-full max-md:text-center max-xl:w-full">
                    <p class="mb-5 text-center">Progreso</p>
                    <div class="flex justify-center max-h-[150px]">
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
                labels: ["falta", 'completada'],
                datasets: [{
                    label: 'Horas',
                    data: [2, 3],
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
