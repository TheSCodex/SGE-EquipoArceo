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
</head>
<body>
    @extends('templates/authTemplate')
    @section('contenido')
    <section class="flex flex-col justify-center items-center  min-h-full flex-grow ">
        <div class="sm:p-8 text-left w-[90%] mb-[2vh] sm:mb-0 ">
            <div class="border-b border-gray-200 mt-5 pb-2 mx-auto w-11/12 md:flex md:items-center md:justify-between">
            <h1 class="font-bold font-montserrat text-xl mb-2 text-center md:text-left">Lista de libros</h1>
            <div class="flex items-center flex-row justify-end">
                <div>
                    <div class="hidden md:flex items-center relative" >
                        <input  id='search' class="border-primaryColor placeholder-primaryColor border-b border rounded-md " type="search" placeholder="Buscar...." style="color: green;">
                    </div>
                </div>
                @if(Auth::user()->can('crear-libro'))
                    <a href="{{route('libros-asistente.create')}}"
                        class="hidden md:block bg-primaryColor text-lg py-2 px-4 rounded-md text-white md:ml-4">Agregar nuevo libro
                    </a>
                @endif
            </div>
            <div class="flex flex-col sm:flex-row justify-between md:hidden mt-2 mx-auto">
                <div>
                    <div class="flex items-center relative" >
                        <input class="border-primaryColor placeholder-primaryColor border-b border rounded-md w-full mb-2 sm:mb-0 " type="search" placeholder="Buscar...." style="color: green;">
                    </div>
                </div>
                @if(Auth::user()->can('crear-libro'))
                    <a href="{{route('libros-asistente.create')}}"
                        class="hidden md:block bg-primaryColor text-lg py-2 px-4 rounded-md text-white md:ml-4">Agregar nuevo libro
                    </a>
                @endif
            </div>
        </div>
        <div class="mt-6 w-11/12 mx-auto flex items-start justify-between min-h-72 ">
            <div class="lg:hidden w-full mb-5">
                <div class="grid md:grid-cols-2 gap-4 w-full">
                    @if ($books->isEmpty())
                        <h1 class="text-xl font-bold text-center text-lightGray">Sin resultados</h1>
                        @else
                            @php
                                $showSinResultados = false;
                                $userAuthInfo = auth()->user();
                            @endphp
                            @foreach ($books as $book)
                                @if(isset($userInfoByBookId[$book->id]))
                                        @if ($userAuthInfo->rol_id == 5)
                                        @if (count($booksByDivision) == 0)
                                        @if ($showSinResultados)
                                        
                                        @else
                                        @php
                                                        $showSinResultados = true;
                                                        @endphp
                                                    <h1 class="text-xl font-bold text-center text-lightGray">Sin resultados</h1>
                                                    @endif
                                                    @else
                                                    @foreach ($booksByDivision as $bookByDivision)
                                                    <div class="bg-white rounded-lg shadow-md p-4 drop-shadow-2xl">
                                                        <h2 class="text-lg font-bold">Titulo: {{ $book->title }}</h2>
                                                        <p class="text-sm text-gray-500">Autor: {{ $book->author }}</p>
                                                        <p class="text-sm text-gray-500">ISBN: {{ $book->isbn }}</p>
                                                        <p class="text-sm text-gray-500">proporcionado por: 
                                                            @if (isset($userInfoByBookId[$book->id]))
                                                                @foreach ($userInfoByBookId[$book->id] as $user)
                                                                <p class="text-sm text-gray-500">{{ $user['user']->identifier }}</p>
                                                                @endforeach
                                                            @else
                                                                <p class="text-sm text-gray-500">Sin información</p>
                                                            @endif
                                                        </p>
                                                        <p class="text-sm text-gray-500">Fecha de adición: {{ substr($book->created_at, 0, 10) }}</p>
                                                        <div class="flex justify-end mt-4 space-x-4">
                                                            @if(Auth::user()->can('leer-lista-libros'))
                                                            <a href="{{route('libros-asistente.show', $book->id)}}" class="bg-primaryColor hover:bg-darkBlue ease-in duration-100 py-2 px-4 text-white rounded-xl font-semibold">Ver detalles</a>
                                                            @endif
                                                            @if(Auth::user()->can('editar-libro'))
                                                            <a href="{{route('libros-asistente.edit', $book->id)}}" class="flex justify-center">
                                                                <img src="/img/logos/pencil.svg">
                                                            </a>
                                                            @endif
                                                            @if(Auth::user()->can('eliminar-libro'))
                                                            <form action="{{ route('libros-asistente.destroy', $book->id) }}" class="delete-book flex justify-center" method="POST" >
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit">
                                                                    <img src="/img/logos/trash.svg">
                                                                </button>
                                                            </form>    
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        @endif
                                        @if ($userAuthInfo->rol_id == 2)
                                            @if (count($booksByAcademy) == 0)
                                                <h1 class="text-xl font-bold text-center text-lightGray">Sin resultados</h1>
                                                @else
                                                @foreach ($booksByAcademy as $bookByAcademy)
                                                    <div class="bg-white rounded-lg shadow-md p-4 drop-shadow-2xl">
                                                        <h2 class="text-lg font-bold">Titulo: {{ $book->title }}</h2>
                                                        <p class="text-sm text-gray-500">Autor: {{ $book->author }}</p>
                                                        <p class="text-sm text-gray-500">ISBN: {{ $book->isbn }}</p>
                                                        <p class="text-sm text-gray-500">proporcionado por: 
                                                            @if (isset($userInfoByBookId[$book->id]))
                                                                @foreach ($userInfoByBookId[$book->id] as $user)
                                                                <p class="text-sm text-gray-500">{{ $user['user']->identifier }}</p>
                                                                @endforeach
                                                            @else
                                                                <p class="text-sm text-gray-500">Sin información</p>
                                                            @endif
                                                        </p>
                                                        <p class="text-sm text-gray-500">Fecha de adición: {{ substr($book->created_at, 0, 10) }}</p>
                                                        <div class="flex justify-end mt-4 space-x-4">
                                                            @if(Auth::user()->can('leer-lista-libros'))
                                                            <a href="{{route('libros-asistente.show', $book->id)}}" class="bg-primaryColor hover:bg-darkBlue ease-in duration-100 py-2 px-4 text-white rounded-xl font-semibold">Ver detalles</a>
                                                            @endif
                                                            @if(Auth::user()->can('editar-libro'))
                                                            <a href="{{route('libros-asistente.edit', $book->id)}}" class="flex justify-center">
                                                                <img src="/img/logos/pencil.svg">
                                                            </a>
                                                            @endif
                                                            @if(Auth::user()->can('eliminar-libro'))
                                                            <form action="{{ route('libros-asistente.destroy', $book->id) }}" class="delete-book flex justify-center" method="POST" >
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit">
                                                                    <img src="/img/logos/trash.svg">
                                                                </button>
                                                            </form>    
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        @endif
                                    @else
                                    <h1 class="text-xl font-bold text-center text-lightGray">Sin resultados</h1>
                                @endif
                            @endforeach
                    @endif
                </div>
            </div>
            <div class="hidden lg:block w-full">
                @if ($books->isEmpty())
                    <h1 class="text-xl font-bold text-center text-lightGray">Sin resultados</h1>
                @else
                    @php
                        $userAuthInfo = auth()->user();
                    @endphp
                    @if ($userAuthInfo->rol_id == 2 && count($booksByAcademy) > 0)
                        <table class="text-start w-full">
                            <thead>
                                <tr>
                                    <th class="text-[#ACACAC] font-roboto text-xs text-left pl-5">N°</th>
                                    <th class="text-[#ACACAC] font-roboto text-xs text-left">Nombre</th>
                                    <th class="text-[#ACACAC] font-roboto text-xs text-left">Autor</th>
                                    <th class="text-[#ACACAC] font-roboto text-xs text-left">ISBN</th>
                                    <th class="text-[#ACACAC] font-roboto text-xs text-left">Proporcionado por</th>
                                    <th class="text-[#ACACAC] font-roboto text-xs text-left">Fecha de adición</th>
                                    @if(Auth::user()->can('leer-lista-libros'))
                                    <th class="text-[#ACACAC] font-roboto text-xs text-left">Detalles</th>
                                    @endif
                                    @if(Auth::user()->can('editar-libro'))
                                    <th class="text-[#ACACAC] font-roboto text-xs text-left">Editar</th>
                                    @endif
                                    @if(Auth::user()->can('eliminar-libro'))
                                    <th class="text-[#ACACAC] font-roboto text-xs text-left">Eliminar</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($books as $book)
                                    @php
                                        $counter = ($books->currentPage() - 1) * $books->perPage() + $loop->index + 1;
                                    @endphp
                                    @if(isset($userInfoByBookId[$book->id]))
                                        @if (count($booksByAcademy) > 0)
                                            @foreach ($booksByAcademy as $bookByAcademy)    
                                                <tr class="w-full transition duration-100 ease-in-out hover:bg-lightGray/20 border-b-gray-200 border-b-[0.5px]">
                                                    <td class="font-roboto  py-5 w-1/12 pl-5">{{ $counter }}</td>
                                                    <td class="font-roboto  py-5  w-3/12 pr-10">{{ $book->title }}</td>
                                                    <td class="font-roboto  py-5  text-left ">{{ $book->author }}</td>
                                                    <td class="font-roboto  py-5  text-left w-1/12">{{ $book->isbn }}</td>
                                                    <td class="font-roboto  py-5  text-left ">
                                                        @if (isset($userInfoByBookId[$book->id]))
                                                        @foreach ($userInfoByBookId[$book->id] as $user)
                                                                <p>{{$user['user']->identifier}}</p>
                                                            @endforeach
                                                        @else
                                                            <p>Sin información</p>
                                                        @endif
                                                    </td>
                                                    <td class="font-roboto  py-5  text-left">{{ substr($book->created_at, 0, 10) }}</td>
                                                    @if(Auth::user()->can('leer-lista-libros'))
                                                    <td class="font-roboto font-bold py-5 cursor-pointer">
                                                        <a href="{{route('libros-asistente.show', $book->id)}}" class="flex justify-center">
                                                            <img src="/img/ojoGreen.svg" class="w-7">
                                                        </a>
                                                    </td>
                                                    @endif
                                                    @if(Auth::user()->can('editar-libro'))
                                                        <td class="font-roboto font-bold py-5 cursor-pointer ">
                                                            <a href="{{route('libros-asistente.edit', $book->id)}}" class="flex justify-center">
                                                                <img src="/img/logos/pencil.svg">
                                                            </a>
                                                        </td>
                                                    @endif
                                                    @if(Auth::user()->can('eliminar-libro'))
                                                        <td class="font-roboto font-bold py-5 cursor-pointer">
                                                            <form class="delete-book flex justify-center " action="{{ route('libros-asistente.destroy', $book->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit">
                                                                    <img src="/img/logos/trash.svg">
                                                                </button>
                                                            </form>
                                                        </td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        @endif
                                    @else
                                        <h1 class="text-xl font-bold text-center text-lightGray">Sin resultados</h1>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                    @if ($userAuthInfo->rol_id == 5 && count($booksByDivision) > 0)
                        <table class="text-start w-full">
                            <thead>
                                <tr>
                                    <th class="text-[#ACACAC] font-roboto text-xs text-left pl-5">N°</th>
                                    <th class="text-[#ACACAC] font-roboto text-xs text-left">Nombre</th>
                                    <th class="text-[#ACACAC] font-roboto text-xs text-left">Autor</th>
                                    <th class="text-[#ACACAC] font-roboto text-xs text-left">ISBN</th>
                                    <th class="text-[#ACACAC] font-roboto text-xs text-left">Proporcionado por</th>
                                    <th class="text-[#ACACAC] font-roboto text-xs text-left">Fecha de adición</th>
                                    @if(Auth::user()->can('leer-lista-libros'))
                                    <th class="text-[#ACACAC] font-roboto text-xs text-left">Detalles</th>
                                    @endif
                                    @if(Auth::user()->can('editar-libro'))
                                    <th class="text-[#ACACAC] font-roboto text-xs text-left">Editar</th>
                                    @endif
                                    @if(Auth::user()->can('eliminar-libro'))
                                    <th class="text-[#ACACAC] font-roboto text-xs text-left">Eliminar</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($books as $book)
                                    @php
                                        $counter = ($books->currentPage() - 1) * $books->perPage() + $loop->index + 1;
                                    @endphp
                                    @if(isset($userInfoByBookId[$book->id]))
                                        @if (count($booksByDivision) > 0)
                                            @foreach ($booksByDivision as $bookByDivision)    
                                                <tr class="w-full transition duration-100 ease-in-out hover:bg-lightGray/20 border-b-gray-200 border-b-[0.5px]">
                                                    <td class="font-roboto  py-5 w-1/12 pl-5">{{ $counter }}</td>
                                                    <td class="font-roboto  py-5  w-3/12 pr-10">{{ $book->title }}</td>
                                                    <td class="font-roboto  py-5  text-left ">{{ $book->author }}</td>
                                                    <td class="font-roboto  py-5  text-left w-1/12">{{ $book->isbn }}</td>
                                                    <td class="font-roboto  py-5  text-left ">
                                                        @if (isset($userInfoByBookId[$book->id]))
                                                            @foreach ($userInfoByBookId[$book->id] as $user)
                                                                <p>{{$user['user']->identifier}}</p>
                                                            @endforeach
                                                        @else
                                                            <p>Sin información</p>
                                                        @endif
                                                    </td>
                                                    <td class="font-roboto  py-5  text-left">{{ substr($book->created_at, 0, 10) }}</td>
                                                    @if(Auth::user()->can('leer-lista-libros'))
                                                    <td class="font-roboto font-bold py-5 cursor-pointer">
                                                        <a href="{{route('libros-asistente.show', $book->id)}}" class="flex justify-center">
                                                            <img src="/img/ojoGreen.svg" class="w-7">
                                                        </a>
                                                    </td>
                                                    @endif
                                                    @if(Auth::user()->can('editar-libro'))
                                                        <td class="font-roboto font-bold py-5 cursor-pointer ">
                                                            <a href="{{route('libros-asistente.edit', $book->id)}}" class="flex justify-center">
                                                                <img src="/img/logos/pencil.svg">
                                                            </a>
                                                        </td>
                                                    @endif
                                                    @if(Auth::user()->can('eliminar-libro'))
                                                        <td class="font-roboto font-bold py-5 cursor-pointer">
                                                            <form class="delete-book flex justify-center " action="{{ route('libros-asistente.destroy', $book->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit">
                                                                    <img src="/img/logos/trash.svg">
                                                                </button>
                                                            </form>
                                                        </td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        @endif
                                    @else
                                        <h1 class="text-xl font-bold text-center text-lightGray">Sin resultados</h1>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                @endif
                @if($userAuthInfo->rol_id == 2)
                @if (count($booksByAcademy) == 0)
                    <h1 class="text-xl font-bold text-center text-lightGray">Sin resultados</h1>                        
                @endif    
            @endif
            @if($userAuthInfo->rol_id == 5)     
                @if ( count($booksByDivision) == 0)
                    <h1 class="text-xl font-bold text-center text-lightGray">Sin resultados</h1>                        
                @endif
            @endif
            </div>
        </div>
        <div class="sm:p-8 text-left w-[90%] mb-[2vh] sm:mb-0 ">
            <div class="mt-6 w-11/12 mx-auto flex items-center justify-between">
                <div class="my-5 mx-auto md:w-full">
                    {{$books->links()}}
                </div>
            </div>
        </div>
    </section>
    <script>
        function searchTable() {
            var searchText = document.getElementById("search").value.toLowerCase();
            var rows = document.querySelectorAll("table tr");
            for (var i = 1; i < rows.length; i++) {
                var row = rows[i];
                var found = false;
                for (var j = 0; j < row.cells.length; j++) {
                    var cell = row.cells[j];
                    if (cell.textContent.toLowerCase().indexOf(searchText) > -1) {
                        found = true;
                        break;
                    }
                }
                if (found) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            }
        }
        // Llamamos a la función searchTable() cuando se modifica el contenido del input de búsqueda
        document.getElementById("search").addEventListener("input", searchTable);
    </script>
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
                this.submit();
            }
            });
        });        
    </script>
@endsection
</html>