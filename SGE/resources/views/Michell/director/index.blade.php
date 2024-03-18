@extends('templates/authTemplate')

@section('titulo')
    Inicio
@endsection

@section('contenido')
    <article class="grid grid-cols-1 lg:grid-cols-3 gap-3 h-full">
        <section class="lg:col-span-2 flex flex-col gap-3 flex-1">
            <p class="font-semibold px-2 bg-white py-1 rounded-md">Propuestas</p>

            <div class="grid grid-cols-2 gap-x-3 h-full">
                <div class="bg-[#02AB82] rounded-md grid place-content-center gap-3 p-2 lg:p-0 md:gap-9">
                    <p class="text-lg md:text-2xl text-white font-semibold">Estudiantes</p>

                    <a href="director/estudiantes" type="button" class="bg-white text-gray-500 rounded-md w-fit m-auto px-6 py-1 text-xs md:text-sm shadow-md">
                        Ver todo
                    </a>
                </div>
                <div class="bg-[#02AB82] rounded-md grid place-content-center p-2 lg:p-0 gap-3 md:gap-9">
                    <p class="text-lg md:text-2xl text-white font-bold">Proyectos</p>

                    <a href="director/anteproyectos" type="button" class="bg-white text-gray-500 rounded-md w-fit m-auto px-6 py-1 text-xs md:text-sm shadow-md">
                        Ver todo
                    </a>
                </div>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-2">
                <div class="bg-white grid grid-cols-3 p-2 rounded-md">
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
                        <p class="text-2xl font-medium">2</p>
                        <p class="text-gray-500 text-xs">Comentarios en la versión más reciente de propuestas</p>
                    </div>
                </div>

                <div class="bg-white grid grid-cols-3 p-2 rounded-md">
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
                        <p class="text-gray-500 text-xs">Votos de aprobaciones</p>
                    </div>
                </div>

                <div class="bg-white grid grid-cols-3 p-2 rounded-md">
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
                        <p class="text-base font-normal">24/400hrs</p>
                        <p class="text-gray-500 text-xs">Horas de servicio completadas</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-md py-7 px-10">
                <p class="uppercase text-gray-700 font-medium text-center mb-5">Proyectos de estudiantes</p>

                <div class="md:grid md:grid-cols-4 px-3">
                    <div class="col-span-3">
                        <p class="text-gray-700 mb-1">Rodrigo Bojorquez Chi</p>
                        <p class="text-gray-500 text-sm md:text-base">Tu introducción es demasiado ambigua y redundante, por favor reestructurala o hazla de nuevo</p>
                    </div>
                    <div class="flex items-center justify-normal mt-3 md:mt-0 md:justify-center">
                        <button type="button" class="bg-[#02AB82] text-white text-xs rounded-md px-5 py-1 w-fit h-fit">
                            Ver propuesta
                        </button>
                    </div>
                </div>

                <hr class="border-[0.5px] border-[#999999] w-[75%] my-5">

                <div class="md:grid md:grid-cols-4 px-3">
                    <div class="col-span-3">
                        <p class="text-gray-700 mb-1">Rodrigo Bojorquez Chi</p>
                        <p class="text-gray-500 text-sm md:text-base">Tu introducción es demasiado ambigua y redundante, por favor reestructurala o hazla de nuevo</p>
                    </div>
                    <div class="flex items-center justify-normal mt-3 md:justify-center md:mt-0">
                        <button type="button" class="bg-[#02AB82] text-white text-xs rounded-md px-5 py-1 w-fit h-fit">
                            Ver propuesta
                        </button>
                    </div>
                </div>

                <p class="opacity-50 text-right text-sm mt-2">
                    <a href="">Ver más</a>
                </p>
            </div>
        </section>


        <section class="flex flex-col gap-3 flex-1">
            <p class="font-semibold px-2 bg-white py-1 rounded-md">Bajas de estudiantes</p>

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

            <p class="bg-white font-semibold px-2 py-1 rounded-md">Divisiones</p>

            <div class="flex flex-col gap-2">
                <div class="bg-white rounded-md p-2 flex gap-4 items-center">
                    <svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="16.6907" cy="15.8763" r="15.8763" fill="#02AB82"/>
                        <path d="M20.5713 11.8188C20.5713 12.7545 20.1996 13.6519 19.538 14.3136C18.8763 14.9752 17.979 15.3469 17.0433 15.3469C16.1076 15.3469 15.2102 14.9752 14.5485 14.3136C13.8869 13.6519 13.5152 12.7545 13.5152 11.8188C13.5152 10.8831 13.8869 9.98576 14.5485 9.32412C15.2102 8.66248 16.1076 8.29077 17.0433 8.29077C17.979 8.29077 18.8763 8.66248 19.538 9.32412C20.1996 9.98576 20.5713 10.8831 20.5713 11.8188ZM17.0433 17.9929C15.4058 17.9929 13.8354 18.6434 12.6775 19.8013C11.5196 20.9592 10.8691 22.5296 10.8691 24.1671H23.2174C23.2174 22.5296 22.5669 20.9592 21.409 19.8013C20.2511 18.6434 18.6807 17.9929 17.0433 17.9929Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>  
                    <p class="text-sm">Tecnologías de la información</p> 
                </div>
                <div class="bg-white rounded-md p-2 flex gap-4 items-center">
                    <svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="16.6907" cy="15.8763" r="15.8763" fill="#02AB82"/>
                        <path d="M20.5713 11.8188C20.5713 12.7545 20.1996 13.6519 19.538 14.3136C18.8763 14.9752 17.979 15.3469 17.0433 15.3469C16.1076 15.3469 15.2102 14.9752 14.5485 14.3136C13.8869 13.6519 13.5152 12.7545 13.5152 11.8188C13.5152 10.8831 13.8869 9.98576 14.5485 9.32412C15.2102 8.66248 16.1076 8.29077 17.0433 8.29077C17.979 8.29077 18.8763 8.66248 19.538 9.32412C20.1996 9.98576 20.5713 10.8831 20.5713 11.8188ZM17.0433 17.9929C15.4058 17.9929 13.8354 18.6434 12.6775 19.8013C11.5196 20.9592 10.8691 22.5296 10.8691 24.1671H23.2174C23.2174 22.5296 22.5669 20.9592 21.409 19.8013C20.2511 18.6434 18.6807 17.9929 17.0433 17.9929Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>  
                    <p class="text-sm">Tecnologías de la información</p>
                </div>
            </div>


            <p class="bg-white font-semibold px-2 py-1 rounded-md">Información relevante</p>

            <div class="grid grid-cols-2 gap-2">
                <div class="bg-white rounded-md flex flex-col gap-5 justify-center items-center p-5">
                    <p class="text-md font-medium">Penalizaciones</p>
                    <p class="text-5xl font-light">6</p>
                </div>

                <div class="bg-white rounded-md flex flex-col gap-5 justify-center items-center p-5">
                    <p class="text-md font-medium">Progreso de estadías</p>
                    <div>
                        <svg width="100" height="100" viewBox="0 0 143 140" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M96.7607 20.9314C84.0435 13.5659 68.9159 11.5681 54.7073 15.3737C40.4994 19.1791 28.3741 28.4754 20.9957 41.2149C13.6173 53.9544 11.5877 69.0978 15.3573 83.3154C19.1269 97.5335 28.3877 109.661 41.105 117.026" stroke="#3E5366" stroke-width="10"/>
                            <path d="M59.1205 69.2647C58.8305 69.2647 58.5055 69.2447 58.1455 69.2047C57.7955 69.1747 57.4455 69.1247 57.0955 69.0547C56.7555 68.9847 56.4555 68.8947 56.1955 68.7847V66.7747C56.4355 66.8747 56.7055 66.9647 57.0055 67.0447C57.3155 67.1147 57.6205 67.1697 57.9205 67.2097C58.2305 67.2497 58.5055 67.2697 58.7455 67.2697C59.3655 67.2697 59.8205 67.1747 60.1105 66.9847C60.4105 66.7947 60.5605 66.4697 60.5605 66.0097C60.5605 65.5997 60.4555 65.3047 60.2455 65.1247C60.0455 64.9347 59.6555 64.8397 59.0755 64.8397H56.1505V63.6247L56.4055 59.4547H62.4055L62.2255 61.3147H58.4755L58.3705 63.0697H59.6305C60.8005 63.0697 61.6555 63.3297 62.1955 63.8497C62.7455 64.3597 63.0205 65.1097 63.0205 66.0997C63.0205 67.0597 62.6955 67.8297 62.0455 68.4097C61.4055 68.9797 60.4305 69.2647 59.1205 69.2647ZM68.4578 69.3847C67.3778 69.3847 66.5078 69.1897 65.8478 68.7997C65.1878 68.4097 64.7078 67.8397 64.4078 67.0897C64.1178 66.3297 63.9728 65.4147 63.9728 64.3447C63.9728 63.2747 64.1178 62.3647 64.4078 61.6147C64.7078 60.8647 65.1878 60.2947 65.8478 59.9047C66.5078 59.5047 67.3778 59.3047 68.4578 59.3047C69.5478 59.3047 70.4178 59.5047 71.0678 59.9047C71.7278 60.2947 72.2078 60.8647 72.5078 61.6147C72.8078 62.3647 72.9578 63.2747 72.9578 64.3447C72.9578 65.4147 72.8078 66.3297 72.5078 67.0897C72.2078 67.8397 71.7278 68.4097 71.0678 68.7997C70.4178 69.1897 69.5478 69.3847 68.4578 69.3847ZM68.4578 67.3147C69.2178 67.3147 69.7428 67.0647 70.0328 66.5647C70.3328 66.0547 70.4828 65.3147 70.4828 64.3447C70.4828 63.3747 70.3328 62.6397 70.0328 62.1397C69.7428 61.6297 69.2178 61.3747 68.4578 61.3747C67.6978 61.3747 67.1678 61.6297 66.8678 62.1397C66.5778 62.6397 66.4328 63.3747 66.4328 64.3447C66.4328 65.3147 66.5778 66.0547 66.8678 66.5647C67.1678 67.0647 67.6978 67.3147 68.4578 67.3147ZM76.1098 63.8797C75.3798 63.8797 74.8248 63.6747 74.4448 63.2647C74.0748 62.8547 73.8898 62.3297 73.8898 61.6897C73.8898 60.9497 74.0748 60.3697 74.4448 59.9497C74.8248 59.5197 75.3798 59.3047 76.1098 59.3047C76.8498 59.3047 77.4048 59.5197 77.7748 59.9497C78.1548 60.3697 78.3448 60.9497 78.3448 61.6897C78.3448 62.3297 78.1548 62.8547 77.7748 63.2647C77.4048 63.6747 76.8498 63.8797 76.1098 63.8797ZM75.4198 69.1147L80.4748 59.4547H82.7698L77.6998 69.1147H75.4198ZM76.1098 62.5597C76.4298 62.5597 76.6548 62.4797 76.7848 62.3197C76.9248 62.1497 76.9948 61.9247 76.9948 61.6447C76.9948 60.9647 76.6998 60.6247 76.1098 60.6247C75.5298 60.6247 75.2398 60.9647 75.2398 61.6447C75.2398 61.9247 75.3048 62.1497 75.4348 62.3197C75.5748 62.4797 75.7998 62.5597 76.1098 62.5597ZM82.0798 69.2647C81.3498 69.2647 80.7948 69.0647 80.4148 68.6647C80.0448 68.2547 79.8598 67.7297 79.8598 67.0897C79.8598 66.3497 80.0448 65.7697 80.4148 65.3497C80.7948 64.9197 81.3498 64.7047 82.0798 64.7047C82.8198 64.7047 83.3748 64.9197 83.7448 65.3497C84.1248 65.7697 84.3148 66.3497 84.3148 67.0897C84.3148 67.7297 84.1248 68.2547 83.7448 68.6647C83.3748 69.0647 82.8198 69.2647 82.0798 69.2647ZM82.0798 67.9597C82.3998 67.9597 82.6248 67.8797 82.7548 67.7197C82.8948 67.5497 82.9648 67.3247 82.9648 67.0447C82.9648 66.3647 82.6698 66.0247 82.0798 66.0247C81.4998 66.0247 81.2098 66.3647 81.2098 67.0447C81.2098 67.3247 81.2748 67.5497 81.4048 67.7197C81.5448 67.8797 81.7698 67.9597 82.0798 67.9597Z" fill="black" fill-opacity="0.6"/>
                            <path d="M44.9449 118.766C57.6096 126.213 72.7138 128.324 86.9348 124.634C101.156 120.944 113.329 111.757 120.776 99.092C128.222 86.4273 130.333 71.3231 126.644 57.1021C122.954 42.8811 113.766 30.7082 101.102 23.2613" stroke="#0FA987" stroke-width="10"/>
                        </svg>
                    </div>
                </div>
            </div>
        </section>
    </article>
@endsection