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
                <a href="#" class="hover:border-b-2 hover:border-primaryColor">Empresas</a>
            </li>
            <li>
                <a href="#" class="hover:border-b-2 hover:border-primaryColor">Asesores empresariales</a>
            </li>
            <li>
                <a href="#" class="hover:border-b-2 hover:border-primaryColor">Carreras y Divisones</a>
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
    </header>

    <main class="min-h-screen h-screen bg-[#F3F5F9]">
        @yield('contenido')
    </main>
    <footer class="border-t border-secondaryColor text-black text-center p-5">
        Copyright © 2024. SM51
    </footer>
</body>

</html>
