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
    <a href="#" class=" text-center flex justify-center">
        <img src="/img/logos/logo-utCancún.png" class="w-28" alt="">
    </a>

    <ul class="hidden md:flex gap-6 justify-center items-center">
        <li>
            <a href="#"></a>
        </li>
        <li>
            <a href="#"></a>
        </li>
    </ul>

    <ul class="hidden md:flex gap-6 justify-center">
        <button class="p-2 px-2 text-red-600 font-light text-primaryColor transition duration-300 ease-in-out rounded-full border-primaryColor border-2">
            <a href="/login" class="font-roboto font-medium px-6">Login</a>
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
