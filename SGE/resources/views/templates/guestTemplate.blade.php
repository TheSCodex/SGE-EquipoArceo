<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo') | Sistema Gestor de Estadias</title>
    @vite('resources/css/app.css')

</head>
<body>
<header class="p-1 md:p-1 grid grid-cols-3 gap-10">
    <a href="#" class=" text-center flex justify-center">
        <img src="/img/logos/logo-utCancún.png" class="w-28" alt="">
    </a>

    <ul class="hidden md:flex gap-6 justify-center">
        <li>
            <a href="#"></a>
        </li>
        <li>
            <a href="#"></a>
        </li>
    </ul>

    <ul class="hidden md:flex gap-6 justify-center">
        <button class="p-2 px-2 text-red-600 font-light text-white transition duration-300 ease-in-out rounded-full bg-lightGray">
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
