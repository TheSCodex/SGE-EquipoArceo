<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo') | Sistema Gestor de Estadias</title>
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>

<body class="min-h-screen">
    <header class="py-5 grid content-center grid-cols-3 gap-10 border-[#92D2C8] border">
        <a href="/" class=" text-center flex justify-center">
            <img src="http://www.utcancun.edu.mx/wp-content/uploads/2016/06/1200px-LogoBIS-01.png" class="w-28" alt="">
        </a>

        <ul class="hidden md:flex gap-6 justify-center items-center font-['Roboto'] text-sm">
            <li class="">
<body>
    <header class="p-1 md:p-5 grid grid-cols-3 gap-10 border-b-[1px] border-secondaryColor">
        <a href="#" class=" text-center flex justify-center">
            <img src="/img/logos/logo-utCancún.png" class="w-28" alt="">
        </a>
    
        <ul class="hidden md:flex gap-6 justify-center items-center">
            <li>
                <a href="#">Estudiantes</a>
            </li>
            <li>
                <a href="#">Proyectos</a>
            </li>
            <li>
                <a href="#">Reportes</a>
            </li>
            <li>
                <a href="#">Cartas</a>
            </li>
            <li>
                <a href="#">Calendario</a>
            </li>
        </ul>
                <a href="/calendar">Calendario</a>
            </li>
        </ul>
    
        <ul class="hidden md:flex gap-6 justify-center">
            <button
                class="flex justify-center items-center px-4 p-2 transition duration-300 ease-in-out rounded-full text-red-600 font-light text-white bg-[#999999]">
                <img src="/img/logos/cerrar-sesion.svg" alt="" class="pr-2">
                <a href="/logout">Sign Out</a>
            </button>
        </ul>
    </header>

        <ul class="hidden md:flex gap-6 justify-center">
            <button class="flex gap-3 h-fit items-center py-2 px-4 text-red-600 text-xs font-medium text-white transition duration-300 font-['Roboto'] ease-in-out rounded-full bg-[#999999]">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <rect width="18" height="18" fill="url(#pattern0)" /><
                    <defs>
                        <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                            <use xlink:href="#image0_594_1149" transform="scale(0.00195312)" />
                        </pattern>
                        <image id="image0_594_1149" width="512" height="512" xlink:href="data:image/png;base64,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" />
                    </defs>
                </svg>
                <a href="#">Sign Out</a>
            </button>
        </ul>
    </header>

    <main class="bg-[#F3F5F9] p-4">
        @yield('contenido')
    </main>
    <footer class="border-t border-secondaryColor text-xs text-black text-center p-5">
        Copyright © 2024. SM51
    </footer>
</body>

</html>