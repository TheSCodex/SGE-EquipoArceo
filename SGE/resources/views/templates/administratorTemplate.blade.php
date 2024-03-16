<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo') | Sistema Gestor de Estadias</title>
    @vite('resources/css/app.css')

</head>

<body>

    <header class="p-1 md:p-5 grid grid-cols-3 gap-10 border-b-[1px] border-secondaryColor">
        <a href="{{ route('admin.index') }}" class=" text-center flex justify-center">
            <img src="/img/logos/logo-utCancún.png" class="w-28" alt="">
        </a>
    
        <ul class="hidden md:flex gap-6 justify-center items-center w-full">
            <li>
                <a href="{{ route('admin.index') }}">Inicio</a>
            </li>    
            <li>
                <a href="{{ route('panel-users.index') }}">Usuarios</a>
            </li>
            <li>
                <a href="{{ route('panel-roles.index') }}" class="text-nowrap">Roles y permisos</a>
            </li>
            <li>
                <a href="{{ route('panel-companies.index') }}">Empresas</a>
            </li>
            <li>
                <a href="{{ route('panel-advisors.index') }}" class="text-nowrap">Asesores empresariales</a>
            </li>
            <li>
                <a href="{{ route('panel-careers.index') }}" class="text-nowrap">Carreras y divisiones</a>
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
