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
    <header class="p-1 md:p-5 grid grid-cols-3 gap-10 border-b-[1px] border-secondaryColor">
        <a href="{{ route('inicio-asistente') }}" class=" text-center flex justify-center">
            <img src="/img/logos/logo-utCancún.png" class="w-28" alt="">
        </a>
    
        <ul class="hidden md:flex gap-6 justify-center items-center">
            <li>
                <a href="{{ route('inicio-asistente') }}">Inicio</a>
            </li>    
            <li>
                <a href="{{ route('estudiantes-asistente') }}">Estudiantes</a>
            </li>
            <li>
                <a href="#">Anteproyectos</a>
            </li>
            <li>
                <a href="{{ route('reportes-asistente.index') }}">Reportes</a>
            </li>
            <li>
                <a href="{{ route('documentos-asistente.index') }}">Documentos</a>
            </li>
            <li>
                <a href="{{ route('libros-asistente.index') }}" class="hover:border-b-2 hover:border-primaryColor">Libros</a>
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

    <main class="bg-[#F3F5F9] p-4 h-full">
        @yield('contenido')
    </main>
    <footer class="border-t border-secondaryColor text-xs text-black text-center p-5">
        Copyright © 2024. SM51
    </footer>
</body>

</html>