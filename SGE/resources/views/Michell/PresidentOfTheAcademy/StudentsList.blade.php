@extends('templates.presidentOfTheAcademyTemplate')

@section('titulo')
    Lista de estudiantes
@endsection

@section('contenido')
    <section class="flex flex-col justify-center items-center  min-h-full flex-grow font-montserrat">
        <div class="sm:p-8 text-left w-[90%] mb-[2vh] sm:mb-0 ">
            <div class="md:w-full md:h-[80%] md:flex justify-center md:mt-3">
                <section class="space-y-6 max-md:mt-5">
                    <div class="md:flex items-center justify-between max-md:space-y-2 border-b pb-3">
                        <h1 id="tableTitle" class="text-xl font-bold">Lista de alumnos</h1>
                        <div class="flex items-center">
                            {{-- Buscador --}}
                            <div class="flex items-center border border-primaryColor rounded-md px-4">
                                <input type="text" id="bajaSearch" name="bajaSearch" placeholder="Buscardor"
                                    class="text-sm font-bold placeholder-primaryColor border-none rounded-md focus:ring-0 text-[#888]">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-primaryColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                </svg>
                            </div>

                        </div>
                    </div>
                    <section class="font-bold text-sm md:space-x-6 space-x-2">
                        <button id="btnAll"
                            class="hover:text-white hover:bg-primaryColor focus:bg-primaryColor focus:text-white bg-[#eee] rounded px-5 py-1 shadow-lg">Todos</button>
                        <button id="btnWithAdvisor"
                            class="hover:text-white hover:bg-primaryColor focus:bg-primaryColor focus:text-white bg-[#eee] rounded md:px-5 px-4 py-1 shadow-lg">Con
                            asesor</button>
                        <button id="btnWithOutAdvisor"
                            class="hover:text-white hover:bg-primaryColor focus:bg-primaryColor focus:text-white bg-[#eee] rounded px-5 py-1 shadow-lg">Sin
                            asesor</button>
                    </section>
                    {{-- Seccion de la tabla --}}
                    <section class="hidden md:block">
                        <table id="dataTable" class=" divide-y divide-[#999] w-full">
                            <thead id="tableHeader" class="text-[#555] text-base">
                                <tr>
                                    <th scope="col" class="pr-[13rem] pb-4">Nombre de estudiantes</th>
                                    <th scope="col" class="pr-[13rem] pb-4">Nombre del proyecto</th>
                                    <th scope="col" {{-- ¡No mover! no es un error --}}
                                        class="pb-4 @unless ($showAssignButton) pr-0 @else pr-[9rem] @endunless">
                                        Asesor académico</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm">
                                @foreach ($dataStudents as $data)
                                    <tr
                                        class="font-semibold data-row @if ($data->academicAdvisor) has-advisor @else no-advisor @endif">
                                        <td class="py-4">{{ $data->user->name }}</td>
                                        <td class="py-4">Sistema de Estadias</td>
                                        <td class="py-4">
                                            @unless ($data->academicAdvisor)
                                                <span class="text-gray-500">Sin asesor asignado</span>
                                            @else
                                                {{ $data->academicAdvisor->user->name }}
                                            @endunless
                                        </td>
                                        {{-- Boton de asigancion de asesor --}}
                                        <td class="py-4">
                                            @unless ($data->academicAdvisor)
                                                <a href="{{ route('presidente.edit', $data->id) }}"
                                                    class="text-primaryColor flex space-x-1 hover:bg-gray-100 p-1 rounded">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                                        fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    <p class="font-bold">Asignar asesor</p>
                                                </a>
                                            @endunless
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <p id="noDataMessage"
                            class="mt-4 text-red-500 hidden text-center text-lightGray font-bold text-2xl">
                            Sin resultados</p>
                    </section>
                </section>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const searchInput = document.getElementById('bajaSearch');
                const rows = document.querySelectorAll('#dataTable tbody tr');
                const noDataMessage = document.getElementById('noDataMessage');
                const tableTitle = document.getElementById('tableTitle');
                const tableHeader = document.getElementById('tableHeader');
                const allButton = document.getElementById('btnAll');
                const withAdvisorButton = document.getElementById('btnWithAdvisor');
                const withoutAdvisorButton = document.getElementById('btnWithOutAdvisor');

                // Eventos para los botones de filtro
                allButton.addEventListener('click', showAllRows);
                withAdvisorButton.addEventListener('click', showAdvisorRows);
                withoutAdvisorButton.addEventListener('click', showNoAdvisorRows);

                // Evento de escucha para la búsqueda
                searchInput.addEventListener('input', function() {
                    const searchText = this.value.toLowerCase();
                    rows.forEach(row => {
                        const nameColumn = row.querySelector('td:first-child').textContent
                            .toLowerCase();

                        if (nameColumn.includes(searchText)) {
                            row.style.display = '';
                        } else {
                            row.style.display = 'none';
                        }
                    });

                    const visibleRows = document.querySelectorAll('#dataTable tbody tr[style=""]');
                    if (visibleRows.length === 0) {
                        noDataMessage.style.display = 'block';
                    } else {
                        noDataMessage.style.display = 'none';
                    }
                });

                // Función para mostrar todas las filas
                function showAllRows() {
                    rows.forEach(row => {
                        row.style.display = '';
                    });
                    const visibleRows = document.querySelectorAll('#dataTable tbody tr[style=""]');
                    if (visibleRows.length === 0) {
                        noDataMessage.style.display = '';
                    } else {
                        noDataMessage.style.display = 'none';
                    }
                }

                // Función para mostrar solo las filas con asesor
                function showAdvisorRows() {
                    rows.forEach(row => {
                        if (row.classList.contains('has-advisor')) {
                            row.style.display = '';
                        } else {
                            row.style.display = 'none';
                        }
                    });
                    const visibleRows = document.querySelectorAll('#dataTable tbody tr[style=""]');
                    if (visibleRows.length === 0) {
                        noDataMessage.style.display = '';
                    } else {
                        noDataMessage.style.display = 'none';
                    }
                }

                // Función para mostrar solo las filas sin asesor
                function showNoAdvisorRows() {
                    rows.forEach(row => {
                        if (row.classList.contains('no-advisor')) {
                            row.style.display = '';
                        } else {
                            row.style.display = 'none';
                        }
                    });
                    const visibleRows = document.querySelectorAll('#dataTable tbody tr[style=""]');
                    if (visibleRows.length === 0) {
                        noDataMessage.style.display = 'block';
                    } else {
                        noDataMessage.style.display = 'none';
                    }
                }
            });
        </script>

    </section>
@endsection
