@extends('templates.directorsAssistantTemplate')

@section('titulo')
    Inicio
@endsection

@section('contenido')
    <article class="grid grid-cols-1 lg:grid-cols-3 gap-3 h-full bg-[#F3F5F9]">
        <section class="lg:col-span-2 flex flex-col gap-3 flex-1">
            <p class="font-semibold px-2 bg-white py-2 rounded-md">Propuestas</p>

            <div class="grid grid-cols-2 gap-x-3 h-full">
                <div class="bg-[#02AB82] rounded-md grid place-content-center gap-3 px-2 py-5 md:gap-9">
                    <p class="text-lg md:text-2xl text-white font-bold">Estudiantes</p>

                    <a href="director/estudiantes" type="button" class="bg-white text-gray-500 rounded-md w-fit m-auto px-6 py-1 text-xs md:text-sm shadow-md">
                        Ver todo
                    </a>
                </div>
                <div class="bg-[#02AB82] rounded-md grid place-content-center px-2 py-5 gap-3 md:gap-9">
                    <p class="text-lg md:text-2xl text-white font-bold">Anteproyectos</p>

                    <a href="director/anteproyectos" type="button" class="bg-white text-gray-500 rounded-md w-fit m-auto px-6 py-1 text-xs md:text-sm shadow-md">
                        Ver todo
                    </a>
                </div>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-2">

                <div class="bg-white grid grid-cols-3 px-2 py-5 rounded-md">
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
                        <p class="text-2xl font-medium">1</p>
                        <p class="text-gray-500 text-xs">Anteproyectos aprobados</p>
                    </div>
                </div>

                <div class="bg-white grid grid-cols-3 px-2 py-5 rounded-md">
                    <!-- ICON -->
                    <div class="flex items-center justify-center">
                        <svg width="60" height="60" viewBox="0 0 77 76" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <ellipse cx="38.5" cy="38" rx="38.5" ry="38" fill="#02AB82"/>
                            <g clip-path="url(#clip0_18_2)">
                            <path d="M20.25 36.5C20.25 38.8145 20.735 41.1064 21.6773 43.2448C22.6195 45.3832 24.0006 47.3261 25.7417 48.9628C27.4828 50.5994 29.5498 51.8976 31.8247 52.7834C34.0995 53.6691 36.5377 54.125 39 54.125C41.4623 54.125 43.9005 53.6691 46.1753 52.7834C48.4502 51.8976 50.5172 50.5994 52.2582 48.9628C53.9993 47.3261 55.3805 45.3832 56.3227 43.2448C57.265 41.1064 57.75 38.8145 57.75 36.5C57.75 31.8256 55.7746 27.3426 52.2582 24.0372C48.7419 20.7319 43.9728 18.875 39 18.875C34.0272 18.875 29.2581 20.7319 25.7417 24.0372C22.2254 27.3426 20.25 31.8256 20.25 36.5Z" stroke="white" stroke-width="4.16667" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M39 26.7085V36.5002L45.25 42.3752" stroke="white" stroke-width="4.16667" stroke-linecap="round" stroke-linejoin="round"/>
                            </g>
                            <defs>
                            <clipPath id="clip0_18_2">
                            <rect width="50" height="47" fill="white" transform="translate(14 13)"/>
                            </clipPath>
                            </defs>
                        </svg>
                    </div>

                    <!-- INFO -->
                    <div class="col-span-2 flex flex-col justify-center">
                        <p class="text-base font-normal">24/120</p>
                        <p class="text-gray-500 text-xs">Días restantes</p>
                    </div>
                </div>

            </div>

            <div class="bg-white rounded-md py-7 px-10">
                <div class="flex justify-between">
                    <p class="text-[#828282] uppercase text-sm md:text-lg font-bold">Aprobación de anteproyectos</p>
                    <svg width="25" height="22" viewBox="0 0 25 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <ellipse cx="12.8856" cy="10.8065" rx="12.0282" ry="10.3881" fill="#BDBDBD"/>
                    <rect x="10.8809" y="8.49805" width="4.00938" height="9.23382" rx="2.00469" fill="white"/>
                    <rect x="10.8809" y="3.88135" width="4.00938" height="3.46268" rx="1.73134" fill="white"/>
                    </svg>
                </div>

                <p class="text-[#828282]">Carreras de la division</p>

                <hr class="border-2 border-[#ECECEC] my-5" />

                <canvas id="myChart" class="max-h-[250px]"></canvas>
            </div>
        </section>


        <section class="flex flex-col gap-3 flex-1">
            <p class="font-semibold px-2 bg-white py-2 rounded-md">Bajas de estudiantes</p>

            <div class="bg-white rounded-md py-5 flex flex-col gap-3">
                <div class="flex gap-3 justify-center items-center">
                    <svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="16.6907" cy="15.8763" r="15.8763" fill="#02AB82"/>
                        <path d="M20.5713 11.8188C20.5713 12.7545 20.1996 13.6519 19.538 14.3136C18.8763 14.9752 17.979 15.3469 17.0433 15.3469C16.1076 15.3469 15.2102 14.9752 14.5485 14.3136C13.8869 13.6519 13.5152 12.7545 13.5152 11.8188C13.5152 10.8831 13.8869 9.98576 14.5485 9.32412C15.2102 8.66248 16.1076 8.29077 17.0433 8.29077C17.979 8.29077 18.8763 8.66248 19.538 9.32412C20.1996 9.98576 20.5713 10.8831 20.5713 11.8188ZM17.0433 17.9929C15.4058 17.9929 13.8354 18.6434 12.6775 19.8013C11.5196 20.9592 10.8691 22.5296 10.8691 24.1671H23.2174C23.2174 22.5296 22.5669 20.9592 21.409 19.8013C20.2511 18.6434 18.6807 17.9929 17.0433 17.9929Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <p class="font-medium text-sm">Rodrigo Bojorquez Chi</p>
                </div>

                <div class="flex gap-3 justify-center items-center">
                    <svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="16.6907" cy="15.8763" r="15.8763" fill="#02AB82"/>
                        <path d="M20.5713 11.8188C20.5713 12.7545 20.1996 13.6519 19.538 14.3136C18.8763 14.9752 17.979 15.3469 17.0433 15.3469C16.1076 15.3469 15.2102 14.9752 14.5485 14.3136C13.8869 13.6519 13.5152 12.7545 13.5152 11.8188C13.5152 10.8831 13.8869 9.98576 14.5485 9.32412C15.2102 8.66248 16.1076 8.29077 17.0433 8.29077C17.979 8.29077 18.8763 8.66248 19.538 9.32412C20.1996 9.98576 20.5713 10.8831 20.5713 11.8188ZM17.0433 17.9929C15.4058 17.9929 13.8354 18.6434 12.6775 19.8013C11.5196 20.9592 10.8691 22.5296 10.8691 24.1671H23.2174C23.2174 22.5296 22.5669 20.9592 21.409 19.8013C20.2511 18.6434 18.6807 17.9929 17.0433 17.9929Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <p class="font-medium text-sm">Rodrigo Bojorquez Chi</p>
                </div>

                <div class="flex gap-3 justify-center items-center">
                    <svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="16.6907" cy="15.8763" r="15.8763" fill="#02AB82"/>
                        <path d="M20.5713 11.8188C20.5713 12.7545 20.1996 13.6519 19.538 14.3136C18.8763 14.9752 17.979 15.3469 17.0433 15.3469C16.1076 15.3469 15.2102 14.9752 14.5485 14.3136C13.8869 13.6519 13.5152 12.7545 13.5152 11.8188C13.5152 10.8831 13.8869 9.98576 14.5485 9.32412C15.2102 8.66248 16.1076 8.29077 17.0433 8.29077C17.979 8.29077 18.8763 8.66248 19.538 9.32412C20.1996 9.98576 20.5713 10.8831 20.5713 11.8188ZM17.0433 17.9929C15.4058 17.9929 13.8354 18.6434 12.6775 19.8013C11.5196 20.9592 10.8691 22.5296 10.8691 24.1671H23.2174C23.2174 22.5296 22.5669 20.9592 21.409 19.8013C20.2511 18.6434 18.6807 17.9929 17.0433 17.9929Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <p class="font-medium text-sm">Rodrigo Bojorquez Chi</p>
                </div>

                <div class="flex gap-3 justify-center items-center">
                    <svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="16.6907" cy="15.8763" r="15.8763" fill="#02AB82"/>
                        <path d="M20.5713 11.8188C20.5713 12.7545 20.1996 13.6519 19.538 14.3136C18.8763 14.9752 17.979 15.3469 17.0433 15.3469C16.1076 15.3469 15.2102 14.9752 14.5485 14.3136C13.8869 13.6519 13.5152 12.7545 13.5152 11.8188C13.5152 10.8831 13.8869 9.98576 14.5485 9.32412C15.2102 8.66248 16.1076 8.29077 17.0433 8.29077C17.979 8.29077 18.8763 8.66248 19.538 9.32412C20.1996 9.98576 20.5713 10.8831 20.5713 11.8188ZM17.0433 17.9929C15.4058 17.9929 13.8354 18.6434 12.6775 19.8013C11.5196 20.9592 10.8691 22.5296 10.8691 24.1671H23.2174C23.2174 22.5296 22.5669 20.9592 21.409 19.8013C20.2511 18.6434 18.6807 17.9929 17.0433 17.9929Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <p class="font-medium text-sm">Rodrigo Bojorquez Chi</p>
                </div>
            </div>

            <p class="bg-white font-semibold px-2 py-2 rounded-md">Divisiones</p>

            <div class="flex flex-col gap-2">
                <div class="bg-white rounded-md p-3 flex gap-4 items-center">
                    <svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="16.6907" cy="15.8763" r="15.8763" fill="#02AB82"/>
                        <path d="M20.5713 11.8188C20.5713 12.7545 20.1996 13.6519 19.538 14.3136C18.8763 14.9752 17.979 15.3469 17.0433 15.3469C16.1076 15.3469 15.2102 14.9752 14.5485 14.3136C13.8869 13.6519 13.5152 12.7545 13.5152 11.8188C13.5152 10.8831 13.8869 9.98576 14.5485 9.32412C15.2102 8.66248 16.1076 8.29077 17.0433 8.29077C17.979 8.29077 18.8763 8.66248 19.538 9.32412C20.1996 9.98576 20.5713 10.8831 20.5713 11.8188ZM17.0433 17.9929C15.4058 17.9929 13.8354 18.6434 12.6775 19.8013C11.5196 20.9592 10.8691 22.5296 10.8691 24.1671H23.2174C23.2174 22.5296 22.5669 20.9592 21.409 19.8013C20.2511 18.6434 18.6807 17.9929 17.0433 17.9929Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>  
                    <p class="text-sm">Tecnologías de la información</p> 
                </div>
                <div class="bg-white rounded-md p-3 flex gap-4 items-center">
                    <svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="16.6907" cy="15.8763" r="15.8763" fill="#02AB82"/>
                        <path d="M20.5713 11.8188C20.5713 12.7545 20.1996 13.6519 19.538 14.3136C18.8763 14.9752 17.979 15.3469 17.0433 15.3469C16.1076 15.3469 15.2102 14.9752 14.5485 14.3136C13.8869 13.6519 13.5152 12.7545 13.5152 11.8188C13.5152 10.8831 13.8869 9.98576 14.5485 9.32412C15.2102 8.66248 16.1076 8.29077 17.0433 8.29077C17.979 8.29077 18.8763 8.66248 19.538 9.32412C20.1996 9.98576 20.5713 10.8831 20.5713 11.8188ZM17.0433 17.9929C15.4058 17.9929 13.8354 18.6434 12.6775 19.8013C11.5196 20.9592 10.8691 22.5296 10.8691 24.1671H23.2174C23.2174 22.5296 22.5669 20.9592 21.409 19.8013C20.2511 18.6434 18.6807 17.9929 17.0433 17.9929Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>  
                    <p class="text-sm">Tecnologías de la información</p>
                </div>
            </div>


            <p class="bg-white font-semibold px-2 py-2 rounded-md">Información relevante</p>

            <div class="grid grid-cols-2 gap-2">
                <div class="bg-white rounded-md flex flex-col gap-5 justify-center items-center px-5 py-7">
                    <p class="text-md text-lg text-center font-medium">Penalizaciones</p>
                    <p class="text-5xl font-light">6</p>
                </div>

                <div class="bg-white rounded-md flex flex-col gap-5 justify-center items-center px-5 py-7">
                    <p class="text-md text-lg text-center font-medium">Total de proyectos</p>
                    <canvas id="total-proyectos" class="max-h-[200px]"></canvas>
                </div>
            </div>
        </section>
    </article>

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

    <script>
        var ctx = document.getElementById('total-proyectos').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ["En revision", "Aprobado"],
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
            },
            options: {
                legend: {
                    position: 'right'
                }
            }
        });
    </script>
@endsection