@extends('templates.directorsAssistantTemplate')

@section('titulo')
    Reportes
@endsection

@section('contenido')
    <div class="container mx-auto px-4 py-4 bg-[#F3F5F9] font-roboto w-full">
        <div class="flex flex-col">
            <div class="flex items-center justify-between">
                <h1 class="text-2xl mt-2 font-bold">Buenos días Norma!</h1>
            </div>
            <div class="bg-black opacity-25 h-[2px] mb-6 mt-6"></div> <!-- Linea separador -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                <!-- Cuadros de Reportes  -->
                <div class="bg-white rounded-lg shadow-md relative">
                    <h2 class="font-bold opacity-30 p-4 font-montserrat">Formato Control de Estadías</h2>
                    <p class='p-4'>Formato donde asesores llevan el registro de sus asesorados a lo largo del proceso
                        de estadías.
                    </p>
                    <div
                        class="flex justify-between bg-[#02ab82] text-white py-6 px-4 mt-8 h-[67px] w-full rounded-b-lg">
                        <a href="/asistente/exportar/1" class="hover:cursor-pointer ">Generar</a>
                    </div>
                    <div class='absolute right-5 rounded-full h-8 w-8 opacity-50 bg-[#02ab82] top-5'></div>
                </div>

                <div class="bg-white rounded-lg shadow-md relative">
                    <h2 class="font-bold opacity-30 p-4 font-montserrat">Formato Carta de Aprobación</h2>
                    <p class='p-4'>Formato de la carta de aprobación generada por los asesores para los alumnos a la
                        conclusión de sus estadías.</p>
                    <div
                        class="flex justify-between bg-[#02ab82] text-white py-6 px-4 mt-8 h-[67px] w-full rounded-b-lg">
                        <a href="asistente/Download/CartaAprobacion" class="hover:cursor-pointer">Generar</a>
                    </div>
                    <div class='absolute right-5 rounded-full h-8 w-8 opacity-50 bg-[#02ab82] top-5'></div>
                </div>


                <div class="bg-white rounded-lg shadow-md relative">
                    <h2 class="font-bold opacity-30 p-4 font-montserrat">Formato Carta de Digitalización</h2>
                    <p class='p-4'>Formato de la carta de digitalización generada por los asesores para los alumnos a
                        la
                        conclusión de sus estadías.</p>
                    <div
                        class="flex justify-between bg-[#02ab82] text-white py-6 px-4 mt-8 h-[67px] w-full m-0 rounded-b-lg">
                        <a href="asistente/Download/CartaMemoria" class="hover:cursor-pointer">Generar</a>
                    </div>
                    <div class='absolute right-5 rounded-full h-8 w-8 opacity-50 bg-[#02ab82] top-5'></div>
                </div>
            </div>
            <div class="flex lg:flex-row sm:flex-col gap-12 h-full mb-8">

                <div class="w-[70vw] h-[55vh] bg-white mt-[2%] rounded-md shadow-md relative">
                    <div class="absolute left-[95%]">
                        <img src="{{ asset('img/Eliud/info.png') }}" class="mr-16 mt-5 "/>
                    </div>
                    <div class=" m-5 ml-16 absolute">
                        <h2 class=" text-[#828282]">APROBACIÓN DE PROYECTOS</h2>
                        <p class="text-[#828282] text-xs">Por academia</p>
                    </div>
                    <div class="h-96 mt-20 ml-10 mr-10">
                        <canvas id="myChart" width="1000" height="300"></canvas>
                    </div>
                </div>
                <div class="bg-white w-[25%] rounded-lg shadow-md h-[55vh] mt-[2%]">

                    <div id="reportSummary" style="display:block;" class="h-full">
                        <h3 class="text-xl opacity-30 font-bold mb-4 pl-6 pt-6">Documentos</h3>
                        <div class="bg-black opacity-25 h-[1px]"></div> <!-- Linea separador -->
                        <div class="flex items-center flex-col p-6 space-y-4">
                            <div class="text-xs mb-2 font-semibold">
                                Elsa Luz Rios generó la carta de aprobación para el estudiante:
                                <p>Maldonado Kevin Alexis</p>
                                <span class="text-gray-500 font-light text-xs mt-2">El 22 de Julio de 2024</span>
                            </div>
                            <div class="text-xs mb-2 font-semibold">
                                Elsa Luz Rios generó la carta de aprobación para el estudiante:
                                <p>Maldonado Kevin Alexis</p>
                                <span class="text-gray-500 font-light text-xs mt-2">El 22 de Julio de 2024</span>
                            </div>
                            <div class="text-xs mb-2 font-semibold">
                                Elsa Luz Rios generó la carta de aprobación para el estudiante:
                                <p>Maldonado Kevin Alexis</p>
                                <span class="text-gray-500 font-light text-xs mt-2">El 22 de Julio de 2024</span>
                            </div>
                            <button
                                class="bg-[#02ab82] text-white py-2 w-[243px] h-[35px] mt-5 rounded hover:bg-[rgb(2,151,171)]">
                                <a href="/asistente/documentos">
                                    Visitar Listado
                                </a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Mayo", "Junio", "Julio"],
                datasets: [{
                        label: 'Tecnologías de la Información',
                        data: [65, 20, 10],
                        backgroundColor: '#0FA987',
                        borderColor: '#ffffffff',
                        borderWidth: 1
                    },
                    {
                        label: 'Mantenimiento',
                        data: [39, 45, 85],
                        backgroundColor: '#3E5366',
                        borderColor: '#ffffffff',
                        borderWidth: 2
                    }
                ]
            },
            options: {
                scales: {
                    x: {
                        ticks: {
                            min: 0,
                            max: 120,
                            stepSize: 20
                        }
                    }
                },
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                },
                indexAxis: 'x', 
                elements: {
                    bar: {
                        borderWidth: 2, 
                        borderRadius: 5, 
                        barThickness: 200 
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        suggestedMax: 120
                    }
                }
            }

        });
    </script>
@endsection
