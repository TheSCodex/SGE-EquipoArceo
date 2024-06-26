@extends('templates.authTemplate')

@section('contenido')
    <div class="bg-[#F3F5F9] grid grid-cols-1 lg:grid-cols-3 lg:gap-5 px-5 py-7">
        <section class="col-span-2 flex flex-col gap-3">

            <div class="bg-white rounded-md p-2">
                <h1 class="text-lg font-medium font-kanit ml-6">Bienvenido, Administrador!</h1>
            </div>

            <div class="grid grid-cols-2 gap-x-3 h-full">
                <div class="bg-[#02AB82] rounded-md grid place-content-center gap-3 px-2 py-5 md:gap-9">
                    <p class="text-lg md:text-2xl text-white font-bold">Empresas</p>

                    <a href="panel-companies" type="button" class="bg-white text-gray-500 rounded-md w-fit m-auto px-6 py-1 text-xs md:text-sm shadow-md">
                        Ver todo
                    </a>
                </div>
                <div class="bg-[#02AB82] rounded-md grid place-content-center px-2 py-5 gap-3 md:gap-9">
                    <p class="text-lg md:text-2xl text-white font-bold">Carreras y divisiones</p>

                    <a href="panel-careers" type="button" class="bg-white text-gray-500 rounded-md w-fit m-auto px-6 py-1 text-xs md:text-sm shadow-md">
                        Ver todo
                    </a>
                </div>
            </div>

            <div class="bg-white rounded-md py-7 px-10">
                <div class="flex justify-between">
                    <p class="text-[#828282] uppercase text-sm md:text-lg font-bold">Aprobación de anteproyectos</p>
                   
                </div>

                <p class="text-[#828282]">Por academias</p>

                <hr class="border-2 border-[#ECECEC] my-5" />

                <canvas id="myChart" class="max-h-[250px]"></canvas>
            </div>
        </section>

        <section class="col-span-1 flex flex-col gap-3 mt-5 lg:mt-0">

            <div class="bg-white rounded-md">
                <h3 class="text-lg font-medium font-kanit ml-6 py-2">Empresas</h3>
            </div>

            <div class="flex font-roboto text-base items-center space-x-5 bg-white rounded-md py-2">
                <div class="bg-primaryColor rounded-full p-1 ml-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="white" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <p>{{$company->name}}</p>
            </div>

            <div class="bg-white rounded-md py-2">
                <h3 class="text-lg font-medium font-kanit ml-6">Asesores empresariales</h3>
            </div>

            <div class="flex font-roboto text-base items-center space-x-5 bg-white rounded-md py-2">
                <div class="bg-primaryColor rounded-full p-1 ml-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="white" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <p>{{$advisor->name}}</p>
            </div>

            <div class="bg-white rounded-md py-2">
                <h3 class="text-lg font-medium font-kanit ml-6">Carreras y Divisiones</h3>
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
                    <p>{{$division->name}}</p>
                </div>
            </div>

            <div class="bg-white rounded-md px-6 py-8 font-roboto">
                <h3 class="text-sm md:text-lg text-center text-[#828282] font-semibold">Indice de aprobación</h3>
                <hr class="border-2 border-[#ECECEC] my-5">
                
                <canvas id="total-proyectos" class="max-h-[200px]"></canvas>
            </div>
        </section>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>

        let academies = {{ Js::from($academies) }}
        let academyNames = academies.map(academy => academy.name);
        let approvedProjectsCount = academies.map(academy => academy.approved_projects_count);
        let revisionProjectsCount = academies.map(academy => academy.revision_projects_count)

        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: academyNames,
                datasets: [{
                        label: 'Proyetos aprobados',
                        data: approvedProjectsCount,
                        backgroundColor: '#0FA987',
                        borderColor: '#ffffffff',
                        borderWidth: 1
                    },
                    {
                        label: 'Proyetos revisión',
                        data: revisionProjectsCount,
                        backgroundColor: '#3E5366',
                        borderColor: '#ffffffff',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                scales: {
                    x: {
                        ticks: {
                            min: 0,
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
                        barThickness: 100 
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                    }
                }
            }

        });
    </script>

    <script>
        var ctx = document.getElementById('total-proyectos').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ["En revision", "Aprobado"],
                datasets: [{
                    label: 'Anteproyectos',
                    data: [{{$revisionProjects}}, {{$approvedProjects}}],
                    backgroundColor: [
                        '#3E5366',
                        '#0FA987'
                    ],
                    borderColor: [
                        '#ffffffff'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                legend: {
                    position: 'right'
                }
            }
        });
    </script>
    @endsection

