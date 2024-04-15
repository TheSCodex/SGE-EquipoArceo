@extends('templates/authTemplate')
@section('titulo')
    Inicio
@endsection

@section('contenido')

<article class="grid grid-cols-1 lg:grid-cols-3 gap-3 h-full pt-4 bg-[#f3f5f9] min-h-screen p-6">
        <section class="lg:col-span-2 flex flex-col gap-3 flex-1">
            <p class="font-semibold px-2 bg-white py-2 rounded-md">Bienvenido, Director</p>

            <div class="grid grid-cols-2 gap-x-3 h-full">
                <div class="bg-[#02AB82] rounded-md grid place-content-center gap-3 px-2 py-10 md:gap-9">
                    <p class="text-lg md:text-2xl text-white font-bold">Estudiantes</p>

                    <a href="estudiantes" type="button" class="bg-white text-gray-500 rounded-md w-fit m-auto px-6 py-1 text-xs md:text-sm shadow-md">
                        Ver todo
                    </a>
                </div>
                <div class="bg-[#02AB82] rounded-md grid place-content-center px-2 py-10 gap-3 md:gap-9">
                    <p class="text-lg md:text-2xl text-white font-bold">Anteproyectos</p>

                    <a href="director/anteproyectos" type="button" class="bg-white text-gray-500 rounded-md w-fit m-auto px-6 py-1 text-xs md:text-sm shadow-md">
                        Ver todo
                    </a>
                </div>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-1 gap-2">

                <div class="bg-white flex gap-5 justify-center items-center px-2 py-5 rounded-md">
                    <!-- ICON -->
                    <div class="flex items-center justify-center">
                        <svg width="60" height="60" viewBox="0 0 78 76" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <ellipse cx="38.632" cy="38.0331" rx="38.5148" ry="37.6507" fill="#02AB82"/>
                            <g clip-path="url(#clip0_18_2)">
                            <path d="M40.7988 26.1348H54.1373" stroke="white" stroke-width="2.75" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M40.7988 32.6543H49.1354" stroke="white" stroke-width="2.75" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M40.7988 42.4341H54.1373" stroke="white" stroke-width="2.75" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M40.7988 48.9536H49.1354" stroke="white" stroke-width="2.75" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M24.126 26.1348C24.126 25.7025 24.3016 25.2879 24.6143 24.9823C24.927 24.6766 25.3511 24.5049 25.7933 24.5049H32.4625C32.9047 24.5049 33.3288 24.6766 33.6415 24.9823C33.9542 25.2879 34.1298 25.7025 34.1298 26.1348V32.6544C34.1298 33.0867 33.9542 33.5012 33.6415 33.8069C33.3288 34.1126 32.9047 34.2843 32.4625 34.2843H25.7933C25.3511 34.2843 24.927 34.1126 24.6143 33.8069C24.3016 33.5012 24.126 33.0867 24.126 32.6544V26.1348Z" stroke="white" stroke-width="2.75" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M24.126 42.4341C24.126 42.0018 24.3016 41.5873 24.6143 41.2816C24.927 40.9759 25.3511 40.8042 25.7933 40.8042H32.4625C32.9047 40.8042 33.3288 40.9759 33.6415 41.2816C33.9542 41.5873 34.1298 42.0018 34.1298 42.4341V48.9537C34.1298 49.386 33.9542 49.8006 33.6415 50.1062C33.3288 50.4119 32.9047 50.5836 32.4625 50.5836H25.7933C25.3511 50.5836 24.927 50.4119 24.6143 50.1062C24.3016 49.8006 24.126 49.386 24.126 48.9537V42.4341Z" stroke="white" stroke-width="2.75" stroke-linecap="round" stroke-linejoin="round"/>
                            </g>
                            <defs>
                            <clipPath id="clip0_18_2">
                            <rect width="40.0154" height="39.1176" fill="white" transform="translate(19.124 17.9854)"/>
                            </clipPath>
                            </defs>
                        </svg>
                    </div>

                    <!-- INFO -->
                    <div class="col-span-2 flex flex-col justify-center">
                        <p class="text-2xl font-medium">{{ $projectMetrics['approvedCount'] ?? 0 }}</p>
                        <p class="text-gray-500 text-xs">Anteproyectos aprobados</p>
                    </div>
                </div>

            </div>

            <div class="bg-white rounded-md py-7 px-10 min-h-[350px] flex flex-col justify-start">
                <div class="flex justify-between">
                    <p class="text-[#828282] uppercase text-sm md:text-lg font-bold">Aprobación de anteproyectos</p>      
                </div>

                <p class="text-[#828282]">Carreras de la division</p>

                <hr class="border-2 border-[#ECECEC] my-5" />

                @if ($period == null)
                    <div class="h-full flex justify-center items-center">
                        <p class="text-center text-[#828282] text-sm font-bold py-5">Aún no hay estudiantes en la división</p>
                    </div>
                @else
                    @if (count($approvedProjectsByMonth) == 0)
                        <div class="h-full flex justify-center items-center">
                            <p class="text-[#888] text-center w-full font-bold">Sin proyectos aprobados</p>                        
                        </div>
                    @else
                        <canvas id="myChart" class="max-h-[200px]"></canvas>       
                    @endif
                @endif
            </div>
        </section>


        <section class="flex flex-col gap-3 flex-1">
            <p class="font-semibold px-3 bg-white py-2 rounded-md flex justify-between items-center">Bajas de estudiantes <a href="bajas" class="text-xs text-[#02AB82] font-bold">Ver más</a></p>
            @if ($interns)
                @foreach ($interns as $i)
                    <div class="bg-white rounded-md py-1.5 flex flex-col gap-3">
                        <div class="flex gap-3  ml-10 items-center">
                            <svg width="33" height="32" viewBox="0 0 33 32" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="16.6907" cy="15.8763" r="15.8763" fill="#02AB82" />
                                <path
                                    d="M20.5713 11.8188C20.5713 12.7545 20.1996 13.6519 19.538 14.3136C18.8763 14.9752 17.979 15.3469 17.0433 15.3469C16.1076 15.3469 15.2102 14.9752 14.5485 14.3136C13.8869 13.6519 13.5152 12.7545 13.5152 11.8188C13.5152 10.8831 13.8869 9.98576 14.5485 9.32412C15.2102 8.66248 16.1076 8.29077 17.0433 8.29077C17.979 8.29077 18.8763 8.66248 19.538 9.32412C20.1996 9.98576 20.5713 10.8831 20.5713 11.8188ZM17.0433 17.9929C15.4058 17.9929 13.8354 18.6434 12.6775 19.8013C11.5196 20.9592 10.8691 22.5296 10.8691 24.1671H23.2174C23.2174 22.5296 22.5669 20.9592 21.409 19.8013C20.2511 18.6434 18.6807 17.9929 17.0433 17.9929Z"
                                    stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <p class="font-medium text-sm">{{ $i->name }}</p>
                        </div>
                    </div>
                @endforeach  
            @else
                <div class="bg-white rounded-md py-1.5 flex flex-col gap-3 min-h-[100px] grow justify-center   ">
                    <p class="text-[#888] w-full text-center font-bold text-sm">No hay bajas</p>
                </div>   
            @endif

            <p class="bg-white font-semibold px-2 py-2 rounded-md">Divisiones</p>

            <div class="flex flex-col gap-2">
                <div class="bg-white rounded-md p-3 flex gap-4 items-center">
                    @if ($userDivision?->name)
                        <svg width="33" height="32" viewBox="0 0 33 32" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <circle cx="16.6907" cy="15.8763" r="15.8763" fill="#02AB82" />
                            <path
                                d="M20.5713 11.8188C20.5713 12.7545 20.1996 13.6519 19.538 14.3136C18.8763 14.9752 17.979 15.3469 17.0433 15.3469C16.1076 15.3469 15.2102 14.9752 14.5485 14.3136C13.8869 13.6519 13.5152 12.7545 13.5152 11.8188C13.5152 10.8831 13.8869 9.98576 14.5485 9.32412C15.2102 8.66248 16.1076 8.29077 17.0433 8.29077C17.979 8.29077 18.8763 8.66248 19.538 9.32412C20.1996 9.98576 20.5713 10.8831 20.5713 11.8188ZM17.0433 17.9929C15.4058 17.9929 13.8354 18.6434 12.6775 19.8013C11.5196 20.9592 10.8691 22.5296 10.8691 24.1671H23.2174C23.2174 22.5296 22.5669 20.9592 21.409 19.8013C20.2511 18.6434 18.6807 17.9929 17.0433 17.9929Z"
                                stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <p class="text-sm">{{ $userDivision->name }}</p>    
                    @else
                        <p class="text-[#888] w-full text-center text-sm font-bold">Sin división</p>        
                    @endif
                </div>   
            </div>


            <p class="bg-white font-semibold px-2 py-2 rounded-md">Información relevante</p>

            <div class="grid grid-cols-2 gap-2 min-h-[250px] grow">
                <div class="bg-white rounded-md flex flex-col gap-5 justify-center items-center px-5 py-7">
                    <p class="text-md text-lg text-center font-medium">Amonestaciones</p>
                    <p class="text-5xl font-light">{{ $penalizationsNum }}</p>
                </div>

                <div class="bg-white rounded-md flex flex-col gap-5 justify-center items-center px-5 py-7">
                    <p class="text-md text-lg text-center font-medium">Total de proyectos</p>
                    @if (!$projectMetrics)
                        <p class="text-center text-sm w-full text-[#888] font-bold">Sin división</p>
                    @else
                        @if ($projectMetrics["totalProjects"] == 0)
                            <p class="text-center text-sm text-[#888] font-bold py-14">Aún no hay proyectos en la división</p> 
                        @else
                            <canvas id="total-proyectos" class="max-h-[200px]"></canvas> 
                        @endif
                    @endif
                </div>
            </div>
        </section>
    </article>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        function obtenerMesesEnIntervalo(intervalo) {
            const meses = {
                "Enero": 1, "Febrero": 2, "Marzo": 3, "Abril": 4, "Mayo": 5, "Junio": 6,
                "Julio": 7, "Agosto": 8, "Septiembre": 9, "Octubre": 10, "Noviembre": 11, "Diciembre": 12
            };

            const [mesInicial, mesFinal] = intervalo.split(" - ");
            const mesInicialNumero = meses[mesInicial];
            const mesFinalNumero = meses[mesFinal];
            const mesesEnIntervalo = [];

            for (let i = mesInicialNumero; i <= mesFinalNumero; i++) {
                mesesEnIntervalo.push(Object.keys(meses).find(key => meses[key] === i));
            }

            return mesesEnIntervalo;
        }

        let approvedProjects = {{ Js::from($approvedProjectsByMonth ?? 0) }};
        let careers = {{ Js::from($careers ?? 0) }};
        let serverPeriod = {{ Js::from($period ?? 0) }};
        let mesesEnIntervalo = obtenerMesesEnIntervalo(serverPeriod);

        const allCareers = [];
        approvedProjects.forEach(item => {
            item.careers.forEach(career => {
                if (!allCareers.includes(career.name)) {
                    allCareers.push(career.name);
                }
            });
        });

        const datasets = approvedProjects.map(item => {
            const careerCounts = {};
            item.careers.forEach(career => {
                careerCounts[career.name] = career.approvedCount;
            });

            const dataForMonth = allCareers.map(career => careerCounts[career] || 0);
            const randomColor = `rgba(${Math.floor(Math.random() * 256)}, ${Math.floor(Math.random() * 256)}, ${Math.floor(Math.random() * 256)}, 0.2)`;

            return {
                label: item.month,
                data: dataForMonth,
                backgroundColor: randomColor,
                borderColor: randomColor,
                borderWidth: 1
            };
        });

        try {
            // Primera grafica
            let ctxBar = document.getElementById('myChart').getContext('2d');
            const myChart = new Chart(ctxBar, {
                type: 'bar',
                data: {
                    labels: allCareers,
                    datasets: datasets
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        } catch (err) {
            console.log("error al crear la grafica")
        }

        // Segunda grafica
        let approvedCount = {{ Js::from($projectMetrics['approvedCount'] ?? 0) }};
        let inRevisionCount = {{ Js::from($projectMetrics['inRevisionCount'] ?? 0)}};

        try {
            var ctxDoughnut = document.getElementById('total-proyectos').getContext('2d');
            var myChartDoughnut = new Chart(ctxDoughnut, {
                type: 'doughnut',
                data: {
                    labels: ["En revisión", "Aprobado"],
                    datasets: [{
                        label: 'Proyectos',
                        data: [inRevisionCount, approvedCount],
                        backgroundColor: ['#3E5366', '#0FA987'],
                        borderColor: '#ffffffff',
                        borderWidth: 1
                    }]
                },
                options: {
                    legend: {
                        position: 'right'
                    }
                }
            });
        } catch (err) {
            console.log("error al crear la grafica")
        }
    </script>

    @endsection