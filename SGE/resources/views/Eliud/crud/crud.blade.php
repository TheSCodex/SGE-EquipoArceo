@extends('templates/authTemplate')
@section('titulo', 'Histórico de Documentos')
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
                        <div class="flex items-center space-x-4">
                            <div class="relative items-center hidden md:flex">
                                <input id='search'
                                    class="border border-b rounded-md border-primaryColor placeholder-primaryColor "
                                    type="search" placeholder="Buscar...." style="color: green;">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Elementos que se mostrarán solo en dispositivos móviles -->
            </div>
            @if (isset($message))
                <p class="mt-12 font-montserrat text-center text-3xl">{{ $message }}</p>
            @else
                @php
                    if (!function_exists('getDownloadRoute')) {
                        function getDownloadRoute($title)
                        {
                            $userRole = Auth::user()->role->title;

                            switch ($title) {
                                case 'Control de Estadías':
                                    return $userRole == 'director'
                                        ? 're-download.control.director'
                                        : 're-download.control.asistente';
                                case 'Amonestación':
                                    return $userRole == 'director'
                                        ? 're-download.sancion.director'
                                        : 're-download.sancion.asistente';
                                case 'Aprobación de Memoria':
                                    return $userRole == 'director'
                                        ? 're-download.aprobacion.director'
                                        : 're-download.aprobacion.asistente';
                                case 'Digitalización de Memoria':
                                    return $userRole == 'director'
                                        ? 're-download.digitalizacion.director'
                                        : 're-download.digitalizacion.asistente';
                            }
                        }
                    }
                    // dd($docs);
                @endphp
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
                                            <button type="submit" class="delete-button">
                                                <img src="/img/logos/trash.svg">
                                            </button>
                                        </form>
                                        <form method="{{ $doc['title'] == 'Amonestación' ? 'POST' : 'GET' }}"
                                            action="{{ route(getDownloadRoute($doc['title']), $doc['title'] == 'Amonestación' ? ['id' => $doc->user_id, 'type' => $doc->type, 'reason' => $doc->reason] : ($doc['title'] == 'Control de Estadías' ? $doc->academic_advisor_id : $doc->user_id)) }}">
                                            @csrf
                                            <button type="submit">
                                                <img src="/img/logos/descarga.png" alt="Download"
                                                    class="ml-2 cursor-pointer">
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- Display table on larger screens -->
                    <div class="hidden w-full lg:block">
                        <table class="text-center">
                            <tr clas>
                                <th class="text-[#ACACAC] font-roboto text-xs text-start pl-5">N°</th>
                                <th class="text-[#ACACAC] font-roboto text-xs">Título</th>
                                <th class="text-[#ACACAC] font-roboto text-xs">Identificador</th>
                                <th class="text-[#ACACAC] font-roboto text-xs">Correo</th>
                                <th class="text-[#ACACAC] font-roboto text-xs">Nombre</th>
                                <th class="text-[#ACACAC] font-roboto text-xs"></th>
                                <th class="text-[#ACACAC] font-roboto text-xs"></th>
                            </tr>
                            @foreach ($docs as $doc)
                                @php
                                    $counter = ($docs->currentPage() - 1) * $docs->perPage() + $loop->index + 1;
                                @endphp
                                <tr
                                    class="w-full transition duration-100 ease-in-out hover:bg-lightGray/20 border-b-gray-200 border-b-[0.5px]">
                                    <td class="font-roboto font-bold py-5 cursor-pointer">{{ $counter }}</td>
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
                                            <button type="submit" class="delete-button-2">
                                                <img src="/img/logos/trash.svg">
                                            </button>
                                        </form>
                                    </td>
                                    <td class="py-5 font-bold font-roboto">
                                        <form method="{{ $doc['title'] == 'Amonestación' ? 'POST' : 'GET' }}"
                                            action="{{ route(getDownloadRoute($doc['title']), $doc['title'] == 'Amonestación' ? ['id' => $doc->user_id, 'type' => $doc->type, 'reason' => $doc->reason] : ($doc['title'] == 'Control de Estadías' ? $doc->academic_advisor_id : $doc->user_id)) }}">
                                            @csrf
                                            <button type="submit">
                                                <img src="/img/logos/descarga.png" alt="Download"
                                                    class="ml-2 cursor-pointer">
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div id="no-docs-message" class="hidden text-[#ACACAC] font-roboto text-center mt-6 ">Sin registros.</div>
                <div class="mt-6 w-11/12 mx-auto flex items-center justify-between">
                    <div class="my-5 mx-auto md:w-full">
                        {{ $docs->links() }}
                    </div>
                </div>
            @endif
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                window.onload = function() {
                    // For 'delete-button'
                    var deleteButtons = document.querySelectorAll('.delete-button');
                    deleteButtons.forEach(function(button) {
                        button.addEventListener('click', function(e) {
                            e.preventDefault();
                            Swal.fire({
                                title: '¿Estás seguro?',
                                text: "Esto no se puede deshacer",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Eliminar',
                                cancelButtonText: 'Cancelar'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    e.target.closest("form").submit();
                                }
                            })
                        });
                    });

                    var deleteButtons2 = document.querySelectorAll('.delete-button-2');
                    deleteButtons2.forEach(function(button) {
                        button.addEventListener('click', function(e) {
                            e.preventDefault();
                            Swal.fire({
                                title: '¿Estás seguro?',
                                text: "Esto no se puede deshacer",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Eliminar',
                                cancelButtonText: 'Cancelar'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    e.target.closest("form").submit();
                                }
                            })
                        });
                    });

                }

                document.querySelectorAll('.delete-button-2').addEventListener('click', function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: '¿Estás seguro?',
                        text: "Esto no se puede deshacer",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Eliminar',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            e.target.closest("form").submit();
                        }
                    })
                });
            </script>
        </div>
    </main>
    <script>
        function searchTable() {
            var searchText = document.getElementById("search").value.toLowerCase();
            var rows = document.querySelectorAll("table tr");
            var noDocsMessage = document.getElementById("no-docs-message");
            var docsFound = false;

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
                    docsFound = true;
                } else {
                    row.style.display = "none";
                }
            }

            if (!docsFound) {
                noDocsMessage.classList.remove('hidden');
            } else {
                noDocsMessage.classList.add('hidden');
            }
        }
        document.getElementById("search").addEventListener("input", searchTable);
    </script>
@endsection
