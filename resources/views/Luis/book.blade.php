<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Libros </title>
    @vite('resources/css/app.css')

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>
<body>
    @extends('templates.directorsAssistantTemplate')
        {{-- Test --}}
        @php
        $usuarios = [
            ['nombre' => 'Clean Code: A Handbook of  Software ', 'autor' => 'Robert C. Martin', 'isbn' => '978-0-13-235088-4', 'proporcionadopor' => '2239XXXX', 'fecha' => '08-Dec-2021',  ],
            ['nombre' => 'The Pragmatic Programmer', 'autor' => 'Andrew Hunt, David Thomas', 'isbn' => '978-0-13-595705-9', 'proporcionadopor' => '2239XXXX', 'fecha' => '08-Dec-2021',  ],
            ['nombre' => 'Code Complete: Practical Handbook', 'autor' => 'Steve McConnell', 'isbn' => '978-0-7356-1967-8', 'proporcionadopor' => '2239XXXX', 'fecha' => '08-Dec-2021',  ],
            ['nombre' => 'Refactoring: Improving the Design ', 'autor' => 'Maritin Fowler', 'isbn' => '978-0-201-48567-7', 'proporcionadopor' => '2239XXXX', 'fecha' => '08-Dec-2021',  ],
            ['nombre' => 'Continuous Delivery: Reliable Software ', 'autor' => 'Jez Humble, David Farley', 'isbn' => '978-0-321-60191-9', 'proporcionadopor' => '2239XXXX', 'fecha' => '08-Dec-2021',  ],
            ['nombre' => 'The Mythical Man-Month', 'autor' => 'Frederick P. Brooks Jr.', 'isbn' => '978-0-201-83595-3', 'proporcionadopor' => '2239XXXX', 'fecha' => '08-Dec-2021',  ],
           
        ];
        @endphp
    @section('contenido')
    <main class=" min-h-screen h-full px-10">
        <div class="py-8 px-20 w-full">
            <div class="border-b border-gray-200 pb-2 flex flex-row items-center justify-between w-full">
                <div class="w-4/6">
                    <h1 class="font-bold font-montserrat text-xl">Lista de libros</h1>
                </div>
                <div class="flex items-center space-x-7">
                    <div class="flex flex-row border border-primaryColor p-1 items-center rounded-md">
                        <input id='search' placeholder="Buscador" type="text" class="placeholder-primaryColor focus:outline-none font-montserrat">
                        <label for="search" class="items-center"><img src="/img/logos/buscar.svg"></label>
                    </div>
                    <div class="flex flex-col">
                        <button class="text-primaryColor">▲</button>
                        <button class="text-primaryColor">▼</button>
                    </div>
                    <div>
                        <button class="bg-primaryColor text-white py-2 whitespace-nowrap px-4 rounded-md font-montserrat">
                        <a href="{{ route('newBookForm') }}" class="h-10 font-montserrat text-white">Agregar nuevo libro</a>
                        </button>
                    </div>
                </div>
            </div>
            <div class="mt-6 w-full flex items-center justify-between">
                <table class="w-full text-center">
                    <thead class="text-lightGray">
                        <tr>
                            <th class="text-[#ACACAC] font-montserrat py-5 px-6">Nombre</th>
                            <th class="text-[#ACACAC] font-montserrat py-5 px-6">Autor</th>
                            <th class="text-[#ACACAC] font-montserrat py-5 px-6">ISBN</th>
                            <th class="text-[#ACACAC] font-montserrat whitespace-nowrap py-5 px-6">Proporcionado por</th>
                            <th class="text-[#ACACAC] font-montserrat whitespace-nowrap py-5 px-6">Fecha de adicion</th> 
                            <th class="text-[#ACACAC] font-montserrat py-5 px-6"></th>
                            <th class="text-[#ACACAC] font-montserrat py-5 px-6"></th>
                        </tr>
                    </thead>
                    @foreach($usuarios as $usuario)
                    <tr>
                        <td class="font-montserrat font-bold py-5 px-6">{{ $usuario['nombre'] }}</td>
                        <td class="font-montserrat font-bold py-5 px-6">{{ $usuario['autor'] }}</td>
                        <td class="font-montserrat font-bold py-5 px-6">{{ $usuario['isbn'] }}</td>
                        <td class="font-montserrat font-bold py-5 px-6">{{ $usuario['proporcionadopor'] }}</td>
                        <td class="font-montserrat font-bold py-5 px-6">{{ $usuario['fecha'] }}</td>
                        <td class="font-montserrat font-bold py-5 px-6 cursor-pointer"><img src="/img/logos/editar.svg" width="60px"></td>
                        <td class="font-montserrat font-bold py-5 px-6 cursor-pointer"><img src="/img/logos/eliminar.svg" width="60px"></td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </main>
    @endsection
{{-- <header class="p-6 md:p-1 grid grid-cols-3 gap-16 shadow-[0px_0px_0px_1px_rgba(0,0,0,0.06),0px_1px_1px_-0.5px_rgba(0,0,0,0.06),0px_3px_3px_-1.5px_rgba(0,0,0,0.06),_0px_6px_6px_-3px_rgba(0,0,0,0.06),0px_12px_12px_-6px_rgba(0,0,0,0.06),0px_24px_24px_-12px_rgba(0,0,0,0.06)]">
    <a href="#" class=" text-center flex justify-center">
        <img src="http://www.utcancun.edu.mx/wp-content/uploads/2016/06/1200px-LogoBIS-01.png" class="w-28" alt="">
    </a>

    <ul class="hidden md:flex gap-6 justify-center items-center">
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
            <a href="#">Libros</a>
        </li>
    </ul>
    

    <ul class="hidden md:flex gap-6 justify-center">
        <button class="p-2 px-2 text-red-600 font-light text-white transition duration-300 ease-in-out rounded-full bg-lightGray">
            <a href="#">Sign Out</a>
        </button>
    </ul>
</header> --}}


    {{-- <footer class="border-t border-secondaryColor text-black text-center p-5  ">
        Copyright © 2024. SM51
    </footer> --}}
</body>
</html>