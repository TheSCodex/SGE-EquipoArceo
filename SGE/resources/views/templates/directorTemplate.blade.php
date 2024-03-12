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
                <a href="/calendar">Calendario</a>
            </li>
        </ul>
    
        <ul class="hidden md:flex gap-6 justify-center">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                @method('post')
                <x-dropdown-link :href="route('logout')"
                    class="flex justify-center items-center px-4 p-2 transition duration-300 pr-2 ease-in-out rounded-full text-red-600 font-light text-white bg-[#999999]">
                    <img src="/img/logos/cerrar-sesion.svg"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('Cerrar sesión') }}
                </x-dropdown-link>
            </form>
            {{-- <button
                class="flex justify-center items-center px-4 p-2 transition duration-300 ease-in-out rounded-full text-red-600 font-light text-white bg-[#999999]">
                <img src="/img/logos/cerrar-sesion.svg" alt="" class="pr-2">
                <a href="/logout">Sign Out</a>
            </button> --}}
        </ul>
    </header>

    <main class="bg-[#F3F5F9] p-4">
        @yield('contenido')
    </main>
    <footer class="border-t border-secondaryColor text-xs text-black text-center p-5">
        Copyright © 2024. SM51
    </footer>
    <script src="{{ asset('js/director.js') }}"></script>
</body>

</html>