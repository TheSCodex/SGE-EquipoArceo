@extends('templates/authTemplate')

@section('titulo')
    Reportes
@endsection

@section('contenido')
    <div class="container mx-auto px-4 py-4 bg-[#F3F5F9] font-roboto w-full">
        <div class="flex flex-col">
            <div class="flex items-center justify-between">
                <h1 class="mt-2 text-2xl font-bold">Buenos días {{$userData->name}} {{$userData->last_name}}!</h1>
            </div>
            <div class="bg-black opacity-25 h-[2px] mb-6 mt-6"></div> <!-- Linea separador -->
            <div class="grid grid-cols-1 gap-4 lg:grid-cols-3">
                <!-- Cuadros de Reportes  -->
                <div class="relative bg-white rounded-lg shadow-md">
                    <h2 class="p-4 font-bold opacity-30 font-montserrat">Formato Control de Estadías</h2>
                    <p class='p-4'>Formato donde asesores llevan el registro de sus asesorados a lo largo del proceso
                        de estadías.
                    </p>
                    <div class="flex justify-between bg-[#02ab82] text-white py-6 px-4 mt-8 h-[67px] w-full rounded-b-lg">
                        <a href="/asistente/exportar/1" class="hover:cursor-pointer ">Generar</a>
                    </div>
                    <div class='absolute right-5 rounded-full h-8 w-8 opacity-50 bg-[#02ab82] top-5'></div>
                </div>

                <div class="relative bg-white rounded-lg shadow-md">
                    <h2 class="p-4 font-bold opacity-30 font-montserrat">Formato Carta de Aprobación</h2>
                    <p class='p-4'>Formato de la carta de aprobación generada por los asesores para los alumnos a la
                        conclusión de sus estadías.</p>
                    <div class="flex justify-between bg-[#02ab82] text-white py-6 px-4 mt-8 h-[67px] w-full rounded-b-lg">
                        <a href="asistente/Download/CartaAprobacion" class="hover:cursor-pointer">Generar</a>
                    </div>
                    <div class='absolute right-5 rounded-full h-8 w-8 opacity-50 bg-[#02ab82] top-5'></div>
                </div>


                <div class="relative bg-white rounded-lg shadow-md">
                    <h2 class="p-4 font-bold opacity-30 font-montserrat">Formato Carta de Digitalización</h2>
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
            <div class="flex h-full gap-12 mb-8 lg:flex-row sm:flex-col">
                <div class="w-[70vw] h-[55vh] bg-white mt-[2%] rounded-md shadow-md relative">

                    {{ $academie->links('Eliud.reports.paginate') }}
                    <div class="absolute m-5 ml-16 ">
                        <h2 class=" text-[#828282]">APROBACION DE PROYECTOS de la {{ $academie[0]->name }}</h2>
                        <p class="text-[#828282] text-xs">Por academia</p>
                    </div>
                    <div class="mt-20 ml-10 mr-10 h-96">
                        <canvas id="myChart" width="1000" height="300"></canvas>
                    </div>
                </div>

                <div class="bg-white w-[25%] rounded-lg shadow-md h-[55vh] mt-[2%]">

                    <div id="reportSummary" style="display:block;" class="h-full">
                        <h3 class="pt-6 pl-6 mb-4 text-xl font-bold opacity-30">Documentos</h3>
                        <div class="bg-black opacity-25 h-[1px]"></div> <!-- Linea separador -->
                        <div class="flex flex-col items-center p-6 space-y-4">
                            <div class="mb-2 text-xs font-semibold">
                                Elsa Luz Rios generó la carta de aprobación para el estudiante:
                                <p>Maldonado Kevin Alexis</p>
                                <span class="mt-2 text-xs font-light text-gray-500">El 22 de Julio de 2024</span>
                            </div>
                            <div class="mb-2 text-xs font-semibold">
                                Elsa Luz Rios generó la carta de aprobación para el estudiante:
                                <p>Maldonado Kevin Alexis</p>
                                <span class="mt-2 text-xs font-light text-gray-500">El 22 de Julio de 2024</span>
                            </div>
                            <div class="mb-2 text-xs font-semibold">
                                Elsa Luz Rios generó la carta de aprobación para el estudiante:
                                <p>Maldonado Kevin Alexis</p>
                                <span class="mt-2 text-xs font-light text-gray-500">El 22 de Julio de 2024</span>
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
