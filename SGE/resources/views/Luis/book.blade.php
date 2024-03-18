<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Libros</title>
    @vite('resources/css/app.css')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>
    @extends('templates.directorsAssistantTemplate')
    @section('contenido')
    <section class="flex flex-col justify-center items-center  min-h-full flex-grow ">
        <div class="sm:p-8 text-left w-[90%] mb-[2vh] sm:mb-0 ">
            <div class="border-b border-gray-200 mt-5 pb-2 mx-auto w-11/12 md:flex md:items-center md:justify-between">
                <h1 class="font-bold font-montserrat text-xl mb-2 text-center md:text-left whitespace-nowrap my-auto">Lista de libros</h1>
                <div class="flex items-center flex-col md:flex-row md:justify-end w-full space-x-2 ">
                    <div class="flex items-center md:ml-auto lg:mr-4 w-11/12 md:w-auto ">
                        <input  id='search' class=" border-primaryColor placeholder-primaryColor border-b border rounded-md w-full " type="search" placeholder="Buscar...." style="color: green;">
                    </div>
                    <div class=" w-11/12 md:w-auto">
                        <a href="{{route('libros-asistente.create')}}"
                        class=" text-center block bg-primaryColor text-lg py-2 px-2 md:px-4 rounded-md text-white mt-2 md:mt-0 w-full">Agregar nuevo libro
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-6 mx-auto flex items-center justify-between w-[90%] ">
            <div class="lg:hidden w-full mb-5 min-h-[500px]">
                <div class="grid md:grid-cols-2 gap-4 w-full">
                    @foreach ($books as $book)
                    <div class="bg-white rounded-lg shadow-md p-4 drop-shadow-2xl">
                        <h2 class="text-lg font-bold">Titulo: {{ $book->title }}</h2>
                        <p class="text-sm text-gray-500">Autor: {{ $book->author }}</p>
                        <p class="text-sm text-gray-500">ISBN: {{ $book->isbn }}</p>
                        <p class="text-sm text-gray-500">proporcionado por: 
                            @if (isset($userInfoByBookId[$book->id]))
                            @foreach ($userInfoByBookId[$book->id] as $user)
                                <p class="text-sm text-gray-500">{{ $user->identifier }}</p>
                            @endforeach
                            @else
                                <p class="text-sm text-gray-500">Sin información</p>
                            @endif
                        </p>
                        <p class="text-sm text-gray-500">Fecha de adición: {{ substr($book->created_at, 0, 10) }}</p>
                        <div class="flex justify-end mt-4 space-x-4">
                            <a href="{{route('libros-asistente.show', $book->id)}}" class="bg-primaryColor hover:bg-darkBlue ease-in duration-100 py-2 px-4 text-white rounded-xl font-semibold">Ver detalles</a>
                            <a href="{{route('libros-asistente.edit', $book->id)}}" class="flex justify-center">
                                <img src="/img/logos/pencil.svg">
                            </a>
                            <form action="{{ route('libros-asistente.destroy', $book->id) }}" class="delete-book flex justify-center" method="POST" >
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    <img src="/img/logos/trash.svg">
                                </button>
                            </form>    
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="hidden lg:block min-h-80 w-11/12  mx-auto">
                <table class="text-center w-full">
                    <tr>
                        <th class="text-[#ACACAC] font-roboto text-xs">Nombre</th>
                        <th class="text-[#ACACAC] font-roboto text-xs">Autor</th>
                        <th class="text-[#ACACAC] font-roboto text-xs">ISBN</th>
                        <th class="text-[#ACACAC] font-roboto text-xs">Proporcionado por</th>
                        <th class="text-[#ACACAC] font-roboto text-xs">Fecha de adición</th>
                        <th class="text-[#ACACAC] font-roboto text-xs">Detalles</th>
                        <th class="text-[#ACACAC] font-roboto text-xs">Editar</th>
                        <th class="text-[#ACACAC] font-roboto text-xs">Eliminar</th>
                    </tr>
                    @foreach ($books as $book)
                    <tr>
                        <td class="font-roboto font-bold py-5 w-3/12 text-left ">{{ $book->title }}</td>
                        <td class="font-roboto font-bold py-5">{{ $book->author }}</td>
                        <td class="font-roboto font-bold py-5">{{ $book->isbn }}</td>
                        <td class="font-roboto font-bold py-5">
                            @if (isset($userInfoByBookId[$book->id]))
                                @foreach ($userInfoByBookId[$book->id] as $user)
                                    <p>{{ $user->identifier }}</p>
                                @endforeach
                            @else
                                <p>Sin información</p>
                            @endif
                        </td>
                        <td class="font-roboto font-bold py-5">{{ substr($book->created_at, 0, 10) }}</td>
                        <td class="font-roboto font-bold py-5 "><a href="{{route('libros-asistente.show', $book->id)}}" class="text-primaryColor hover:text-darkBlue ease-in duration-100">Ver detalles</a></td>
                        <td class="font-roboto font-bold py-5 cursor-pointer ">
                            <a href="{{route('libros-asistente.edit', $book->id)}}" class="flex justify-center">
                                <img src="/img/logos/pencil.svg">
                            </a>
                        </td>
                        <td class="font-roboto font-bold py-5 cursor-pointer">
                            <form action="{{ route('libros-asistente.destroy', $book->id) }}" class="delete-book flex justify-center" method="POST" >
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
    </div>
    <div class="my-5 mx-auto">
        {{$books->links()}}
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
