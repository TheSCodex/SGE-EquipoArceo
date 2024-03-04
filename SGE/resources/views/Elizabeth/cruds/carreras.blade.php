@extends('templates.administratorTemplate')
@section('titulo','Panel Carreras y Divisiones')
@section('contenido')
    {{-- Test --}}
    @php
    $usuarios = [
        ['carrera' => 'Desarrollo de software',  'Director' => 'Juan Perez', 'Division' => 'Software', 'Nivel' => 'TSU', 'Clave' => '7305477760',],
        ['carrera' => 'Desarrollo de software',  'Director' => 'Juan Perez', 'Division' => 'Software', 'Nivel' => 'TSU', 'Clave' => '7305477760',],
        ['carrera' => 'Desarrollo de software',  'Director' => 'Juan Perez', 'Division' => 'Software', 'Nivel' => 'TSU', 'Clave' => '7305477760',],
        ['carrera' => 'Desarrollo de software',  'Director' => 'Juan Perez', 'Division' => 'Software', 'Nivel' => 'TSU', 'Clave' => '7305477760',],
        ['carrera' => 'Desarrollo de software',  'Director' => 'Juan Perez', 'Division' => 'Software', 'Nivel' => 'TSU', 'Clave' => '7305477760',],
        ['carrera' => 'Desarrollo de software',  'Director' => 'Juan Perez', 'Division' => 'Software', 'Nivel' => 'TSU', 'Clave' => '7305477760',],
        ['carrera' => 'Desarrollo de software',  'Director' => 'Juan Perez', 'Division' => 'Software', 'Nivel' => 'TSU', 'Clave' => '7305477760',],
    ];
    @endphp
    <main class="min-h-screen h-full">
        <div class="py-8 sm:px-20">
            <div class="border-b border-gray-200 pb-2 flex  flex-row max-sm:flex-col items-center">
                <div class="md:w-4/6">
                    <h1 class="font-bold text-2xl font-roboto">Carreras y Divisiones</h1>
                </div>

                    <div class="flex justify-center items-center">
                        <div class="hidden p-1 md:flex flex-row border border-primaryColor sm:p-1 items-center rounded-md">
                            <input id='search' placeholder="Buscador" type="text" class="placeholder-primaryColor  max-sm:w-20  focus:outline-none font-roboto">
                            <label for="search" class="items-center"><img src="/img/logos/search.svg"></label>
                        </div>
                        <div class="hidden p-1 md:flex flex-x-0 flex-col justify-center items-center px-5">
                            <button><img src="/img/logos/caret.svg"></button>
                        </div>
                        <div class="my-5 md:m-0 md:w-[15.5vw]">
                            <button class="bg-primaryColor text-white p-2 rounded-md font-semibold ">Agregar carrera y division</button>
                        </div>
                    </div>
                    
                    

            </div>
            <div class="sm:mt-[2%] w-full flex items-center justify-between">
                <table class="w-full text-center">
                    <tr>
                        <th class="text-[#ACACAC] font-roboto text-xs">carrera</th>
                        <th class="text-[#ACACAC] font-roboto sm:hidden text-xs">Acciones</th>
                        <th class="text-[#ACACAC] font-roboto  max-sm:hidden text-xs">Director </th>
                        <th class="text-[#ACACAC] font-roboto  max-sm:hidden text-xs">Division</th>
                        <th class="text-[#ACACAC] font-roboto  max-sm:hidden text-xs">Nivel</th>
                        <th class="text-[#ACACAC] font-roboto  max-sm:hidden text-xs">Clave</th>
                        <th class="text-[#ACACAC] font-roboto  max-sm:hidden text-xs"></th>
                        <th class="text-[#ACACAC] font-roboto text-xs"></th>
                    </tr>
                    @foreach($usuarios as $index => $usuario)
                    <tr>
                        <td class="font-roboto font-bold py-[2.5%]">{{ $usuario['carrera'] }}</td>
                        <td class="font-roboto font-bold max-sm:hidden py-[2.5%]">{{ $usuario['Director'] }}</td>
                        <td class="font-roboto font-bold max-sm:hidden py-[2.5%]">{{ $usuario['Division'] }}</td>
                        <td class="font-roboto font-bold max-sm:hidden py-[2.5%]">{{ $usuario['Nivel'] }}</td>
                        <td class="font-roboto font-bold max-sm:hidden py-[2.5%]">{{ $usuario['Clave'] }}</td>
                        <td class="font-roboto font-bold  py-[2.5%]">
                            <div class=" flex  items-center justify-center gap-5">
                                <button class="font-roboto font-bold py-[2.5%]"><img src="/img/logos/pencil.svg"></button>
                                <button class="font-roboto font-bold py-[2.5%]"><img src="/img/logos/trash.svg"></button>
                                <button id="openModalBtn{{ $index }}" class="md:hidden openModalBtn">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#1DAF90" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                        <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                 @endforeach
                </table>
            </div>
        </div>
    </main>

    @foreach($usuarios as $index => $usuario)
    <div id="myModal{{ $index }}" class="myModal hidden fixed inset-0 z-50 overflow-auto bg-black bg-opacity-50">
        <div class="modal my-[6%] p-[3%]  bg-white  w-[74vw] mx-auto h-[75vh] rounded-lg shadow-lg ">
            <h2 class="text-2xl  font-extrabold text-center mb-3">Detalles de las carreras y divisiones</h2>

            <div class="border-b-2 border-t-2 items-center flex flex-row justify-between">
                <p class="text-[#ACACAC] font-roboto">Director</p>
                <p class="font-roboto font-bold py-[2.5%]">{{ $usuario['Director'] }}</p>
            </div>
            <div class="border-b-2 border-t-2 items-center flex flex-row justify-between">
                <p class="text-[#ACACAC] font-roboto">Division</p>
                <p class="font-roboto font-bold py-[2.5%]">{{ $usuario['Division'] }}</p>
            </div>
      
            <div class="border-b-2 border-t-2 items-center flex flex-row justify-between">
                <p class="text-[#ACACAC] font-roboto">Nivel</p>
                <p class="font-roboto font-bold py-[2.5%]">{{ $usuario['Nivel'] }}</p>
            </div>
            <div class="border-b-2 border-t-2 items-center flex flex-row justify-between">
                <p class="text-[#ACACAC] font-roboto">Clave</p>
                <p class="font-roboto font-bold py-[2.5%]">{{ $usuario['Clave'] }}</p>
            </div>
            <button class="close bg-red rounded-lg md:px-2 lg:py-4 md:mt-6 w-full text-white">Cerrar Modal</button>
        </div>
    </div>

    @endforeach

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Seleccionar todos los botones de apertura de modal
        var modalBtns = document.querySelectorAll(".openModalBtn");

        // Asignar el evento click a cada botón
        modalBtns.forEach(function(btn, index) {
            btn.addEventListener("click", function() {
                // Obtener el modal correspondiente al índice actual
                var modal = document.getElementById("myModal" + index);
                // Mostrar el modal
                modal.style.display = "block";
            });
        });

        // Asignar el evento click al botón de cierre de modal y al fondo oscuro
        var closeBtns = document.querySelectorAll(".close");
        closeBtns.forEach(function(btn) {
            btn.addEventListener("click", function() {
                // Ocultar el modal al hacer clic en el botón de cierre
                this.closest('.myModal').style.display = "none";
            });
        });

        // Ocultar el modal al hacer clic en el fondo oscuro
        window.onclick = function(event) {
            if (event.target.classList.contains('myModal')) {
                event.target.style.display = "none";
            }
        };
    });
    </script>
@endsection
