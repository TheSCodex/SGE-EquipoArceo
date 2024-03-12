<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Libros</title>
    @vite('resources/css/app.css')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        table {
            border-collapse: separate;
            border-spacing: 0 10px; /* Espacio vertical entre filas */
            width: 100%;
        }

        /* Estilo para las celdas de la tabla */
        th, td {
            padding: 10px; /* Espacio interno de las celdas */
        }
    </style>
</head>
<body>
    @extends('templates.directorsAssistantTemplate')
        {{-- Test --}}
        {{-- @php
        $books = [
            ['nombre' => 'Clean Code: A Handbook of  Software ', 'autor' => 'Robert C. Martin', 'isbn' => '978-0-13-235088-4', 'proporcionadopor' => '2239XXXX', 'fecha' => '08-Dec-2021',  ],
            ['nombre' => 'The Pragmatic Programmer', 'autor' => 'Andrew Hunt, David Thomas', 'isbn' => '978-0-13-595705-9', 'proporcionadopor' => '2239XXXX', 'fecha' => '08-Dec-2021',  ],
            ['nombre' => 'Code Complete: Practical Handbook', 'autor' => 'Steve McConnell', 'isbn' => '978-0-7356-1967-8', 'proporcionadopor' => '2239XXXX', 'fecha' => '08-Dec-2021',  ],
            ['nombre' => 'Refactoring: Improving the Design ', 'autor' => 'Maritin Fowler', 'isbn' => '978-0-201-48567-7', 'proporcionadopor' => '2239XXXX', 'fecha' => '08-Dec-2021',  ],
            ['nombre' => 'Continuous Delivery: Reliable Software ', 'autor' => 'Jez Humble, David Farley', 'isbn' => '978-0-321-60191-9', 'proporcionadopor' => '2239XXXX', 'fecha' => '08-Dec-2021',  ],
            ['nombre' => 'The Mythical Man-Month', 'autor' => 'Frederick P. Brooks Jr.', 'isbn' => '978-0-201-83595-3', 'proporcionadopor' => '2239XXXX', 'fecha' => '08-Dec-2021',  ],
           
        ];
        @endphp --}}
    @section('contenido')
    <main class="min-h-screen h-full flex flex-col">
        <div class="border-b border-gray-200 mt-5 pb-2 mx-auto w-11/12 md:flex md:items-center md:justify-between">
            <h1 class="font-bold font-montserrat text-xl mb-2 text-center md:text-left">Lista de libros</h1>
            <div class="flex items-center flex-row justify-end">
                <div class="flex-1 md:mr-2">
                    <div class="flex justify-between border border-primaryColor items-center rounded-xl py-2 px-4">
                        <input id="search" placeholder="Buscador" type="text" class="placeholder-primaryColor focus:outline-none font-montserrat py-1 px-2 justify-start">
                        <img class="w-6 h-6 mx-2 justify-end" src="/img/logos/buscar.svg">
                    </div>
                </div>
                <div class="hidden md:flex md:flex-col  md:items-center md:mx-3">
                    <button class="bg-green text-base py-1 px-3 mb-1 rounded-md text-white">▲</button>
                    <button class="bg-green text-base py-1 px-3 rounded-md text-white">▼</button>
                </div>
                <a href="{{route('libros.create')}}" class="bg-green text-lg py-2 px-4 rounded-md text-white ml-2 hidden md:block create-book">Agregar nuevo libro</a>
            </div>
            <!-- Elementos que se mostrarán solo en dispositivos móviles -->
            <div class="flex justify-between md:hidden mt-2 mx-auto">
                <div class="flex">
                    <button class="bg-green text-lg py-2 px-4 rounded-md text-white mr-2">▲</button>
                    <button class="bg-green text-lg py-2 px-4 rounded-md text-white">▼</button>
                </div>
                <a href="{{route('libros.create')}}" class="bg-green text-lg py-2 px-4 rounded-md text-white ml-2">Agregar nuevo libro</a>
            </div>
        </div>
            <div class="mt-6 w-11/12 mx-auto flex flex-col items-center justify-between">
                {{-- cards --}}
                <div class="lg:hidden w-full mb-5">
                    <div class="grid md:grid-cols-2 gap-4 w-full">
                        @foreach($books as $book)
                            <div class="bg-white rounded-lg shadow-md p-4 drop-shadow-2xl">
                                <h2 class="text-lg font-bold">{{ $book['title'] }}</h2>
                                <p class="text-sm text-gray-500">Autor: {{ $book['author'] }}</p>
                                <p class="text-sm text-gray-500">ISBN: {{ $book['isbn'] }}</p>
                                <p class="text-sm text-gray-500">Proporcionado por: {{ $book['isbn'] }}</p>
                                <p class="text-sm text-gray-500">Fecha de adición: {{ substr($book['created_at'], 0, 10) }}</p>
                                <div class="flex justify-end mt-4">
                                    <div class="flex justify-center align-middle">
                                        <a href="{{route('libros.edit', $book->id)}}">
                                            <img src="/img/logos/pencil.svg"></td>
                                        </a>
                                    </div>
                                    {{-- <img src="/img/logos/pencil.svg" alt="Edit" class="cursor-pointer"> --}}
                                    {{-- <img src="/img/logos/trash.svg" alt="Delete" class="ml-2 cursor-pointer"> --}}
                                    <div class="flex justify-center align-middle">
                                        <form action="{{ route('libros.destroy', $book->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">
                                                <img src="/img/logos/trash.svg">
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- Display table on larger screens -->
                <div class="hidden lg:block w-full mb-10">
                    <table class="text-center">
                        <tr>
                            <th class="text-[#ACACAC] font-roboto text-xs">Nombre</th>
                            <th class="text-[#ACACAC] font-roboto text-xs">Autor</th>
                            <th class="text-[#ACACAC] font-roboto text-xs">ISBN</th>
                            <th class="text-[#ACACAC] font-roboto text-xs ">Proporcionado por</th>
                            <th class="text-[#ACACAC] font-roboto text-xs ">Fecha de adición</th> 
                            <th class="text-[#ACACAC] font-roboto text-xs"></th>
                            <th class="text-[#ACACAC] font-roboto text-xs"></th>
                        </tr>
                        @foreach($books as $book)
                        <tr>
                            <td class="font-roboto font-bold py-5 w-3/12">{{ $book['title'] }}</td>
                            <td class="font-roboto font-bold py-5">{{ $book['author'] }}</td>
                            <td class="font-roboto font-bold py-5">{{ $book['isbn'] }}</td>
                            <td class="font-roboto font-bold py-5">{{ $book['isbn'] }}</td>
                            <td class="font-roboto font-bold py-5">{{ substr($book['created_at'], 0, 10) }}</td>
                            <td class="font-roboto font-bold py-5 cursor-pointer">
                                <a href="{{route('libros.edit', $book->id)}}">
                                    <img src="/img/logos/pencil.svg"></td>
                                </a>
                            <td class="font-roboto font-bold py-5 cursor-pointer">
                                <form action="{{ route('libros.destroy', $book->id) }}" class="delete-book" method="POST" >
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">
                                        <img src="/img/logos/trash.svg">
                                    </button>
                                </form>    
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="my-5 mx-auto">
                {{$books->links()}}
            </div>
    </main>
    @endsection
</body>


@section('scripts-book')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   
    @if (session('success'))
    <script>
        Swal.fire({
            title: "¡Agregado!",
            text: "{{ session('success') }}",
            icon: "success"
        });
    </script>
    @endif

    @if (session('edit_success'))
    <script>
        Swal.fire({
            title: "¡Editado!",
            text: "{{ session('edit_success') }}",
            icon: "success"
        });
    </script>
    @endif
   
   
   
   
    @if (session('delete') == 'ok')
        <script>
            Swal.fire({
                title: "¡Eliminado!",
                text: "El libro ha sido eliminado con éxito",
                icon: "success"
                });
        </script>
        
    @endif

   


    <script>
        $('.delete-book').submit(function(e){
            e.preventDefault();

            Swal.fire({
            title: "¿Estás Seguro?",
            text: "Este libro se eliminara definitivamente",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "¡Si, eliminar!",
            cancelButtonText: "Cancelar"
            }).then((result) => {
            if (result.isConfirmed) {
                // Swal.fire({
                // title: "Deleted!",
                // text: "Your file has been deleted.",
                // icon: "success"
                // });

                this.submit();
            }
            });

        });

        

        
    </script>
 
@endsection

</html>
