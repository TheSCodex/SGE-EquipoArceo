<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    @extends('./templates/studenTemplate')

    @section('contenido')
        <div class="flex h-full gap-8">
            <section class="mt-[10px] ml-[30px] w-2/3">
                <div class="bg-white rounded-md py-1">
                    <h1 class="text-lg font-medium font-kanit ml-6">Bienvenido, Estudiante!</h1>
                </div>
                <div class="font-kanit mt-3 flex space-x-5 h-[36%]">
                    <div class=" bg-primaryColor text-white rounded-md w-1/2 flex flex-col justify-evenly items-center">
                        <h3 class="font-bold text-3xl">Estudiantes</h3>
                        <a href="#"
                            class="text-[#555] bg-white hover:bg-[#eee] py-2 px-10 font-normal font-roboto rounded-md text-center">Ver
                            todo</a>
                    </div>
                    <div class=" bg-primaryColor text-white rounded-md w-1/2 flex flex-col justify-evenly items-center">
                        <h3 class="font-bold text-3xl">Proyectos</h3>
                        <a href="/academic"
                            class="text-[#555] bg-white hover:bg-[#eee] py-2 px-10 font-normal font-roboto rounded-md text-center">Ver
                            todo</a>
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
                                    <p class=" text-[#888] w-3/4 line-clamp-3">La estructura de tu propuesta es correcta
                                        pero
                                        necesito que expandas tu
                                        justificación e incluyas
                                        referencias para tus argumentos</p>
                                </div>
                                <button class="bg-primaryColor rounded-md text-white py-1 w-[28%]">Ampliar
                                    observación</button>
                            </div>
                            <div class="flex items-center space-x-8 mt-7">
                                <div>
                                    <p class="text-xl text-[#555]">Asesor</p>
                                    <p class=" text-[#888] w-3/4 line-clamp-3">La estructura de tu propuesta es correcta
                                        pero
                                        necesito que expandas tu
                                        justificación e incluyas
                                        referencias para tus argumentos</p>
                                </div>
                                <button class="bg-primaryColor rounded-md text-white py-1 w-[28%]">Ampliar
                                    observación</button>
                            </div>
                        </div>
                        <a href="#" class="flex w-full justify-end items-end text-[#888] text-sm">Ver todo</a>
                    </div>
                </div>
            </section>
            </section>
            <section class="mt-[10px] mr-[30px] w-1/3">
                <div>
                    <div class="bg-white rounded-md py-1">
                        <h3 class="text-lg font-medium font-kanit ml-6">Tu asesor academico</h3>
                    </div>
                    <div class="font-kanit mt-3 flex ml-3 w-auto">
                        <div class="bg-[#6FCBD8] text-white rounded-md flex flex-col justify-evenly items-centermx-4 p-4">
                            <h3 class="font text-2xl">Elsa Luz Rios</h3>
                            <h4 class="mt-4 mb-12">Kevin, tu propuesta es bastante atractiva sin embargo, necesito que
                                clarifiques un poco más acerca
                                de la metodología de desarrollo que estarás realizando y los beneficios esperados para la
                                empresa.
                                ¿Crees que puedas tener esta información lista en nuestra siguiente reunión? Debo aprobar tu
                                propuesta pronto para que pases lo antes a revisión.</h4>
                            <a href="#"
                                class="text-[#555] bg-white hover:bg-[#eee] py-2 px-10 font-normal font-roboto rounded-md text-center">Contactar</a>
                        </div>
                    </div>

                    <div class="mt-5 mb-4">
                        <div class="bg-white rounded-md mb-12 py-1">
                            <h3 class="text-lg font-medium font-kanit mb-6 ml-6">Informacion relevante</h3>
                            <div class="mt-3 mg flex h-auto gap-4">
                                <div class="bg-white mt-3 w-1/2 p-5 font-bold">
                                    <p>No has recibido ninguna penalización hasta el momento, ¡buen trabajo!</p>
                                    <div class="flex justify-center p-5">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-thumb-up-filled" width="130"
                                            height="130" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50"
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
                                <div class="bg-white w-1/2 p-5 font-bold">
                                    <p class="mb-5">Progreso de tu estadía</p>
                                    <div class="flex justify-center">
                                        <canvas id="myChart"></canvas>
                                    </div>
                                </div>
                            </div>
                            <script>
                                var ctx = document.getElementById('myChart').getContext('2d');
                                var myChart = new Chart(ctx, {
                                    type: 'doughnut',
                                    data: {
                                        labels: ["falta", "completada"],
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
                            <div class="bg-white rounded-lg shadow-md mt-3 py-3 px-6 font-roboto h-[53%]">
                                <div class="space-y-1 flex flex-col w-full pt-5 pl-5">

                                </div>
                            </div>
            </section>
        </div>


    </body>

    </html>
@endsection
