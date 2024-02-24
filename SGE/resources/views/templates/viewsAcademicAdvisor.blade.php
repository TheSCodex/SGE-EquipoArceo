<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="/img/icons/SIC-icon.png">

    <title>@yield('titulo') | Sistema Gestor de Estadias</title>
    @vite('resources/css/app.css')

</head>
<body>
<header class="p-1 md:p-1">

</header>

    <main class="min-h-screen h-full">
        @yield('contenido')
    </main>
    <footer class="bg-primaryColor text-white text-center p-5">
    Copyright © 2024. Todos los derechos reservados.
    </footer>
</body>
</html>
