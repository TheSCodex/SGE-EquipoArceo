<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo') | Sistema Gestor de Estadias</title>
    @vite('resources/css/app.css')

</head>

<body>
<<<<<<< HEAD
    <header class="p-1 md:py-[15px] flex justify-around items-center">
        <a href="{{route('presidenteDeLaAcademia.index')}}">
            <img src="http://www.utcancun.edu.mx/wp-content/uploads/2016/06/1200px-LogoBIS-01.png" class="w-20"
                alt="Logo UT">
        </a>

        <ul class="hidden md:flex gap-10 justify-center font-roboto text-sm">
            <li>
                <a href="#" class="hover:border-b-2 hover:border-primaryColor">Estudiantes</a>
            </li>
            <li>
                <a href="#" class="hover:border-b-2 hover:border-primaryColor">Proyectos</a>
            </li>
            <li>
                <a href="#" class="hover:border-b-2 hover:border-primaryColor">Reportes</a>
            </li>
            <li>
                <a href="#" class="hover:border-b-2 hover:border-primaryColor">Cartas</a>
            </li>
            <li>
                <a href="#" class="hover:border-b-2 hover:border-primaryColor">Calendario</a>
            </li>
        </ul>

        <a href="#" class="flex items-center gap-1 text-gray-500 hover:text-black">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
            </svg>
            <p class="text-sm font-semibold font-roboto">Sign Out</p>
        </a>
=======
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
>>>>>>> 5dfc9f01a74e51026eceff19603eb67ac12452a4
    </header>

    <main class="min-h-screen h-full">
        @yield('contenido')
    </main>
    <footer class="border-t border-secondaryColor text-black text-center p-5">
        Copyright © 2024. SM51
    </footer>
</body>

</html>
