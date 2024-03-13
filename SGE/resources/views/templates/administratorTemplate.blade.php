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
<<<<<<< HEAD
        <a href="{{ route('admin.index') }}">
            <img src="/img/logos/logo-utCancún.png" class="w-28"
=======
        <a href="">
            <img src="http://www.utcancun.edu.mx/wp-content/uploads/2016/06/1200px-LogoBIS-01.png" class="w-20"
>>>>>>> web
                alt="Logo UT">
        </a>

        <ul class="hidden md:flex gap-10 justify-center font-roboto text-sm">
            <li>
                <a href="/panel-users" class="hover:border-b-2 hover:border-primaryColor">Usuarios</a>
            </li>
            <li>
                <a href="/panel-roles" class="hover:border-b-2 hover:border-primaryColor">Roles y permisos</a>
            </li>
            <li>
                <a href="/panel-companies" class="hover:border-b-2 hover:border-primaryColor">Empresas</a>
            </li>
            <li>
                <a href="/panel-advisors" class="hover:border-b-2 hover:border-primaryColor">Asesores empresariales</a>
            </li>
            <li>
                <a href='/panel-careers' class="hover:border-b-2 hover:border-primaryColor">Carreras y Divisones</a>
            </li>
        </ul>

        <ul class="hidden md:flex gap-6 justify-center">
            <form id="logout-form" method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex justify-center items-center px-4 p-2 transition duration-300 pr-2 ease-in-out rounded-full text-red-600 font-light text-white bg-[#999999]" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <img src="/img/logos/cerrar-sesion.svg">
                    {{ __('Cerrar sesión') }}
                </button>
            </form>
            {{-- <button
                class="flex justify-center items-center px-4 p-2 transition duration-300 ease-in-out rounded-full text-red-600 font-light text-white bg-[#999999]">
                <img src="/img/logos/cerrar-sesion.svg" alt="" class="pr-2">
                <a href="/logout">Sign Out</a>
            </button> --}}
        </ul>
    </header>
    <main class="min-h-screen h-full">
        {{-- <div class="sm:p-8 text-left w-[90%]"> --}}

        @yield('contenido')
        {{-- </div> --}}
    </main>
    <footer class="border-t border-secondaryColor text-black text-center p-5">
        Copyright © 2024. SM51
    </footer>
</body>

</html>
