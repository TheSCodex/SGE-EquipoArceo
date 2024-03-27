@extends('templates/authTemplate')
@section('titulo', 'Panel de Usuarios')
@section('contenido')
    {{-- Test --}}

    <style>
        table {
            border-collapse: separate;
            border-spacing: 0 10px;
            /* Espacio vertical entre filas */
            width: 100%;
        }

        /* Estilo para las celdas de la tabla */
        th,
        td {
            /* Espacio interno de las celdas */
            padding: 10px;
        }
    </style>


    <main class="min-h-screen h-full">
        <div class="lg:py-8 lg:px-10">
            <div class="w-11/12 pb-2 mx-auto mt-5 border-b border-gray-200 md:flex md:items-center md:justify-between">
                <h1 class="mb-2 text-xl font-bold text-center font-montserrat md:text-left">Lista de Documentos</h1>
                <div class="flex flex-row items-center justify-end">
                    <div class="flex-1 md:mr-2">
                        <form method="POST" class="hidden md:block"
                            @if (Auth::user()->role->title == 'director') action="{{ route('docs.search-director') }}"
                        @elseif(Auth::user()->role->title == 'asistenteDireccion')
                        action="{{ route('docs.search-assistant') }}" @endif>
                            @csrf
                            <div class="flex items-center space-x-4">
                                <div class="relative items-center hidden md:flex">
                                    <input id='search'
                                        class="border border-b rounded-md border-primaryColor placeholder-primaryColor "
                                        type="search" placeholder="Buscar...." style="color: green;">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Elementos que se mostrarán solo en dispositivos móviles -->
            </div>
            @if (isset($message))
                <p>{{ $message }}</p>
            @else
                <div class="flex items-center justify-between w-11/12 mx-auto mt-6">
                    {{-- cards --}}
                    <div class="w-full mb-5 lg:hidden">
                        <div class="grid w-full gap-4 md:grid-cols-2">
                            @foreach ($docs as $doc)
                                <div class="p-4 bg-white rounded-lg shadow-md drop-shadow-2xl">
                                    <h2 class="text-lg font-bold">{{ $doc['title'] }}</h2>
                                    <h2 class="text-lg font-bold">{{ $doc['advisor_identifier'] }}</h2>
                                    <p class="text-sm text-gray-500">Correo: {{ $doc['advisor_email'] }}</p>
                                    <p class="text-sm text-gray-500">Nombre: {{ $doc['advisor_name'] }}
                                        {{ $doc['advisor_lastName'] }}</p>
                                    <div class="flex justify-end mt-4">
                                        <form method="POST"
                                            @if (Auth::user()->role->title == 'director') action="{{ route('docs.destroy-director', $doc->id) }}"
                                @elseif(Auth::user()->role->title == 'asistenteDireccion')
                                action="{{ route('docs.destroy-assistant', $doc->id) }}" @endif>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">
                                                <img src="/img/logos/trash.svg">
                                            </button>
                                        </form>
                                        <img src="/img/logos/descarga.png" alt="Delete" class="ml-2 cursor-pointer">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- Display table on larger screens -->
                    <div class="hidden w-full lg:block">
                        <table class="text-center">
                            <tr>
                                <th class="text-[#ACACAC] font-roboto text-xs">Título</th>
                                <th class="text-[#ACACAC] font-roboto text-xs">Identificador</th>
                                <th class="text-[#ACACAC] font-roboto text-xs">Correo</th>
                                <th class="text-[#ACACAC] font-roboto text-xs">Nombre</th>
                                <th class="text-[#ACACAC] font-roboto text-xs"></th>
                                <th class="text-[#ACACAC] font-roboto text-xs"></th>
                            </tr>
                            @foreach ($docs as $doc)
                                <tr>
                                    <td class="py-5 font-bold font-roboto">{{ $doc['title'] }}</td>
                                    <td class="py-5 font-bold font-roboto">{{ $doc['advisor_identifier'] }}</td>
                                    <td class="py-5 font-bold font-roboto">{{ $doc['advisor_email'] }}</td>
                                    <td class="py-5 font-bold font-roboto">{{ $doc['advisor_name'] }}
                                        {{ $doc['advisor_lastName'] }}</td>
                                    <td class="py-5 font-bold font-roboto">
                                        <form method="POST"
                                            @if (Auth::user()->role->title == 'director') action="{{ route('docs.destroy-director', $doc->id) }}"
                                @elseif(Auth::user()->role->title == 'asistenteDireccion')
                                action="{{ route('docs.destroy-assistant', $doc->id) }}" @endif>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">
                                                <img src="/img/logos/trash.svg">
                                            </button>
                                        </form>
                                    </td>
                                    <td class="py-5 font-bold font-roboto"><img src="/img/logos/descarga.png"></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            @endif

            <script>
                function confirmDelete(userName, userId) {
                    Swal.fire({
                        title: '¿Estás seguro?',
                        text: `Estás a punto de eliminar a ${userName}. Esta acción no se puede revertir.`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Sí, eliminarlo'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById('deleteForm' + userId).submit();
                        }
                    });
                }

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
        </div>
    </main>
@endsection
