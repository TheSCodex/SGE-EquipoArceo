<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo') | Sistema Gestor de Estadias</title>
    @vite('resources/css/app.css')

</head>

<body>
<header class="p-1 md:py-[15px] flex justify-around items-center">
    <a href="{{route('admin.index')}}">
        <img src="http://www.utcancun.edu.mx/wp-content/uploads/2016/06/1200px-LogoBIS-01.png" class="w-20"
            alt="Logo UT">
    </a>

        <ul class="hidden md:flex gap-10 justify-center font-roboto text-sm">
            <li>
                <a href="#" class="hover:border-b-2 hover:border-primaryColor">Usuarios</a>
            </li>
            <li>
                <a href="/empresas" class="hover:border-b-2 hover:border-primaryColor">Empresas</a>
            </li>
            <li>
                <a href="/asesores" class="hover:border-b-2 hover:border-primaryColor">Asesores empresariales</a>
            </li>
            <li>
                <a href='/carreras' class="hover:border-b-2 hover:border-primaryColor">Carreras y Divisones</a>
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
    <main class="min-h-screen h-full">
        @yield('contenido')
    </main>
    <footer class="border-t border-secondaryColor text-black text-center p-5">
        Copyright © 2024. SM51
    </footer>
</body>

</html>
