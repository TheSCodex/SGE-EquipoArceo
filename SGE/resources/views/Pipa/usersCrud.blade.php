<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Usuarios | Sistema Gestor de Estadias</title>
    @vite('resources/css/app.css')

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>
<body>
<header class="p-1 md:p-1 grid grid-cols-3 gap-10">
    <a href="#" class=" text-center flex justify-center">
        <img src="http://www.utcancun.edu.mx/wp-content/uploads/2016/06/1200px-LogoBIS-01.png" class="w-28" alt="">
    </a>

    <ul class="hidden md:flex gap-6 justify-center items-center">
        <li>
            <a href="#">Usuarios</a>
        </li>
        <li>
            <a href="#">Empresas</a>
        </li>
        <li>
            <a href="#">Asesores empresariales</a>
        </li>
        <li>
            <a href="#">Carreras y Divisiones</a>
        </li>
    </ul>
    

    <ul class="hidden md:flex gap-6 justify-center">
        <button class="p-2 px-2 text-red-600 font-light text-white transition duration-300 ease-in-out rounded-full bg-lightGray">
            <a href="#">Sign Out</a>
        </button>
    </ul>
</header>
    {{-- Test --}}
    @php
    $usuarios = [
        ['nombre' => 'Manuel', 'apellido' => 'Pasos', 'correo' => '22393126@gmail.com', 'rol' => 'Estudiante', 'nomina' => '22393126', 'especialidad' => 'Desarrollo de software',],
        ['nombre' => 'Kevin', 'apellido' => 'Bello', 'correo' => '22393124@gmail.com', 'rol' => 'Estudiante', 'nomina' => '22393124', 'especialidad' => 'Desarrollo de software',],
        ['nombre' => 'Luis', 'apellido' => 'Broca', 'correo' => '22393177@gmail.com', 'rol' => 'Estudiante', 'nomina' => '22393177', 'especialidad' => 'Desarrollo de software',],
        ['nombre' => 'Manuel', 'apellido' => 'Pasos', 'correo' => '22393126@gmail.com', 'rol' => 'Estudiante', 'nomina' => '22393126', 'especialidad' => 'Desarrollo de software',],
        ['nombre' => 'Kevin', 'apellido' => 'Bello', 'correo' => '22393124@gmail.com', 'rol' => 'Estudiante', 'nomina' => '22393124', 'especialidad' => 'Desarrollo de software',],
        ['nombre' => 'Luis', 'apellido' => 'Broca', 'correo' => '22393177@gmail.com', 'rol' => 'Estudiante', 'nomina' => '22393177', 'especialidad' => 'Desarrollo de software',],
        ['nombre' => 'Manuel', 'apellido' => 'Pasos', 'correo' => '22393126@gmail.com', 'rol' => 'Estudiante', 'nomina' => '22393126', 'especialidad' => 'Desarrollo de software',],
        ['nombre' => 'Kevin', 'apellido' => 'Bello', 'correo' => '22393124@gmail.com', 'rol' => 'Estudiante', 'nomina' => '22393124', 'especialidad' => 'Desarrollo de software',],
    ];
    @endphp
    <main class="min-h-screen h-full">
        <div class="py-8 px-20">
            <div class="border-b border-gray-200 pb-2 flex flex-row items-center">
                <div class="w-4/6">
                    <h1 class="font-bold text-2xl font-roboto">Lista de usuarios</h1>
                </div>
                <div class="flex items-center space-x-5">
                    <div class="flex flex-row border border-primaryColor p-1 items-center rounded-md">
                        <input id='search' placeholder="Buscador" type="text" class="placeholder-primaryColor focus:outline-none font-montserrat text-sm font-semibold px-2">
                        <label for="search" class="items-center"><img src="/img/logos/search.svg"></label>
                    </div>
                    <div class="p-1 flex flex-x-0 flex-col">
                        <button><img src="/img/logos/caret.svg"></button>
                    </div>
                    <div class="w-[200px]">
                        <a class="bg-primaryColor text-white p-2 rounded-md font-montserrat w-[200px] text-sm font-semibold"  href="/user/create">Agregar nuevo usuario</a>
                    </div>
                </div>
            </div>
            <div class="mt-6 w-full flex items-center justify-between">
                <table class="w-full text-center">
                    <tr>
                        <th class="text-[#ACACAC] font-roboto text-xs">Nombre</th>
                        <th class="text-[#ACACAC] font-roboto text-xs">Apellidos</th>
                        <th class="text-[#ACACAC] font-roboto text-xs">Correo</th>
                        <th class="text-[#ACACAC] font-roboto text-xs">Rol</th>
                        <th class="text-[#ACACAC] font-roboto text-xs">Nomina</th>
                        <th class="text-[#ACACAC] font-roboto text-xs">Especialidad</th>
                        <th class="text-[#ACACAC] font-roboto text-xs"></th>
                        <th class="text-[#ACACAC] font-roboto text-xs"></th>
                    </tr>
                    @foreach($usuarios as $usuario)
                    <tr>
                        <td class="font-roboto font-bold py-5">{{ $usuario['nombre'] }}</td>
                        <td class="font-roboto font-bold py-5">{{ $usuario['apellido'] }}</td>
                        <td class="font-roboto font-bold py-5">{{ $usuario['correo'] }}</td>
                        <td class="font-roboto font-bold py-5">{{ $usuario['rol'] }}</td>
                        <td class="font-roboto font-bold py-5">{{ $usuario['nomina'] }}</td>
                        <td class="font-roboto font-bold py-5">{{ $usuario['especialidad'] }}</td>
                        <td class="font-roboto font-bold py-5"><img src="/img/logos/pencil.svg"></td>
                        <td class="font-roboto font-bold py-5"><img src="/img/logos/trash.svg"></td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </main>
    <footer class="border-t border-secondaryColor text-black text-center p-5">
        Copyright © 2024. SM51
    </footer>
</body>
</html>