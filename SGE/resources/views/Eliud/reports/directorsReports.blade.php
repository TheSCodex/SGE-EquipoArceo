@extends('templates/authTemplate')

@section('titulo')
    Reportes
@endsection

@section('contenido')
    <section class="pt-4 bg-[#f3f5f9] flex flex-col items-center justify-center flex-grow min-h-full">
        <div class="lg:px-8 px-6 text-left w-full mb-[2vh] sm:mb-0">
            <div class="container mx-auto  font-roboto">
                <div class="flex flex-col">
                    <div class="flex items-center justify-between">
                        <h1 class="mt-2 text-2xl font-bold">Buenos días {{$userData->name}} {{$userData->last_name}}!</h1>
                    </div>
                </div>
                <div class="bg-black opacity-25 h-[2px] mb-6 mt-6"></div>

                <div class="grid grid-cols-1 gap-4 lg:grid-cols-3">
                    <!-- Cuadros de Reportes  -->
                    <div class="relative bg-white rounded-lg shadow-md">
                        <h2 class="p-4 font-bold opacity-30 font-montserrat">Formato Control de Estadías</h2>
                        <p class='p-4'>Formato donde asesores llevan el registro de sus asesorados a lo largo del proceso
                            de estadías.
                        </p>
                        <div
                            class="flex justify-between bg-[#02ab82] text-white py-6 px-4 mt-8 h-[67px] w-full rounded-b-lg">
                            <a href="/exportar/1" class="hover:cursor-pointer ">Generar</a>
                            <svg id="toggleInputs" class="hover:cursor-pointer" xmlns="http://www.w3.org/2000/svg"
                                width="19" height="19" viewBox="0 0 19 19" fill="none">
                                <path
                                    d="M18.3042 2.08777L16.9123 0.695801C16.4488 0.231934 15.8409 0 15.2331 0C14.6252 0 14.0174 0.231934 13.5535 0.69543L0.476893 13.772L0.00560345 18.0107C-0.0537716 18.5443 0.366678 19 0.888807 19C0.921834 19 0.954861 18.9981 0.988631 18.9944L5.2243 18.5265L18.3046 5.44617C19.232 4.51881 19.232 3.01514 18.3042 2.08777ZM4.67916 17.3924L1.22687 17.775L1.61133 14.3175L11.4041 4.52475L14.4757 7.59629L4.67916 17.3924ZM17.4648 4.60676L15.3151 6.7565L12.2435 3.68496L14.3933 1.53521C14.6174 1.31107 14.9158 1.1875 15.2331 1.1875C15.5504 1.1875 15.8483 1.31107 16.0729 1.53521L17.4648 2.92719C17.9276 3.39031 17.9276 4.14363 17.4648 4.60676Z"
                                    fill="white" />
                            </svg>
                        </div>
                        <div class='absolute right-5 rounded-full h-8 w-8 opacity-50 bg-[#02ab82] top-5'></div>
                    </div>

                    <div class="relative bg-white rounded-lg shadow-md">
                        <h2 class="p-4 font-bold opacity-30 font-montserrat">Formato Carta de Aprobación</h2>
                        <p class='p-4'>Formato de la carta de aprobación generada por los asesores para los alumnos a la
                            conclusión de sus estadías.</p>
                        <div
                            class="flex justify-between bg-[#02ab82] text-white py-6 px-4 mt-8 h-[67px] w-full rounded-b-lg">
                            <a href="/Download/CartaAprobacion" class="hover:cursor-pointer">Generar</a>
                            <svg id="toggleInputs" class="hover:cursor-pointer" xmlns="http://www.w3.org/2000/svg"
                                width="19" height="19" viewBox="0 0 19 19" fill="none">
                                <path
                                    d="M18.3042 2.08777L16.9123 0.695801C16.4488 0.231934 15.8409 0 15.2331 0C14.6252 0 14.0174 0.231934 13.5535 0.69543L0.476893 13.772L0.00560345 18.0107C-0.0537716 18.5443 0.366678 19 0.888807 19C0.921834 19 0.954861 18.9981 0.988631 18.9944L5.2243 18.5265L18.3046 5.44617C19.232 4.51881 19.232 3.01514 18.3042 2.08777ZM4.67916 17.3924L1.22687 17.775L1.61133 14.3175L11.4041 4.52475L14.4757 7.59629L4.67916 17.3924ZM17.4648 4.60676L15.3151 6.7565L12.2435 3.68496L14.3933 1.53521C14.6174 1.31107 14.9158 1.1875 15.2331 1.1875C15.5504 1.1875 15.8483 1.31107 16.0729 1.53521L17.4648 2.92719C17.9276 3.39031 17.9276 4.14363 17.4648 4.60676Z"
                                    fill="white" />
                            </svg>
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
                            <a href="/Download/CartaMemoria" class="hover:cursor-pointer">Generar</a>
                            <svg id="toggleInputs" class="hover:cursor-pointer" xmlns="http://www.w3.org/2000/svg"
                                width="19" height="19" viewBox="0 0 19 19" fill="none">
                                <path
                                    d="M18.3042 2.08777L16.9123 0.695801C16.4488 0.231934 15.8409 0 15.2331 0C14.6252 0 14.0174 0.231934 13.5535 0.69543L0.476893 13.772L0.00560345 18.0107C-0.0537716 18.5443 0.366678 19 0.888807 19C0.921834 19 0.954861 18.9981 0.988631 18.9944L5.2243 18.5265L18.3046 5.44617C19.232 4.51881 19.232 3.01514 18.3042 2.08777ZM4.67916 17.3924L1.22687 17.775L1.61133 14.3175L11.4041 4.52475L14.4757 7.59629L4.67916 17.3924ZM17.4648 4.60676L15.3151 6.7565L12.2435 3.68496L14.3933 1.53521C14.6174 1.31107 14.9158 1.1875 15.2331 1.1875C15.5504 1.1875 15.8483 1.31107 16.0729 1.53521L17.4648 2.92719C17.9276 3.39031 17.9276 4.14363 17.4648 4.60676Z"
                                    fill="white" />
                            </svg>
                        </div>
                        <div class='absolute right-5 rounded-full h-8 w-8 opacity-50 bg-[#02ab82] top-5'></div>
                    </div>

                </div>

            </div>

            <div class="flex h-full gap-12 lg:flex-row sm:flex-col">

                <div class="lg:block hidden w-[70vw] h-[55vh] bg-white mt-[2%] rounded-md shadow-md relative">
                    
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
                    <div class="duration-300" id="updateInputs" style="display:none;">
                        <div class="border-b-2 border-gray-2 00">
                            <h1 class="pt-4 pl-4 mb-4 font-bold opacity-30 font-montserrat">Reporte</h1>
                        </div>
                        <p class="p-4 font-bold">Haz seleccionado actualizar reporte con el título (reporte)</p>
                        <div class="flex flex-col items-center justify-center p-4 mt-4">
                            <input type="text" placeholder="Nuevo código..."
                                class="rounded-md px-3 py-2 mb-2 w-full h-[32px] bg-gray-100 mt-2">
                            <input type="text" placeholder="Nueva fecha de revisión..."
                                class="rounded-md px-3 py-2 mb-2 w-full h-[32px] bg-gray-100 mt-2">
                            <button
                                class="bg-[#02ab82] text-white w-[120px] h-[35px] rounded hover:bg-blue-600 mt-16">Actualizar</button>
                        </div>
                    </div>
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
                                <a href="/director/documentos">
                                    Visitar Listado
                                </a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="sm:p-8 text-left w-[90%] mb-[2vh] sm:mb-0 ">
    </section>

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
