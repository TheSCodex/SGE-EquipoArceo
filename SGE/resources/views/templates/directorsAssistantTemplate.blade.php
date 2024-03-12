<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo') | Sistema Gestor de Estadias</title>
    @vite('resources/css/app.css')

</head>

<body>
    <header class="p-1 md:p-[1rem] md:flex justify-around items-center border-b-[1px] border-secondaryColor">
        <a href="#" class=" text-center flex justify-center">
            <img src="/img/logos/logo-utCancún.png" class="w-20 h-7" alt="Logo-ut">
        </a>

        <ul class="hidden md:flex md:gap-10 justify-center font-roboto items-center text-sm">
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
                <a href="/books" class="hover:border-b-2 hover:border-primaryColor">Libros</a>
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

    <main class="min-h-screen h-full w-full">
        @yield('contenido')
    </main>
    <footer class="border-t border-secondaryColor text-black text-center p-5">
        Copyright © 2024. SM51
    </footer>

    @yield('scripts-book')

</body>

</html>
