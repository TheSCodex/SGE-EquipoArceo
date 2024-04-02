@extends('templates.authTemplate')

@section('titulo')
    Lista de estudiantes
@endsection

@section('contenido')
    <section class="flex flex-col justify-center items-center px-0 lg:px-10 min-h-full flex-grow font-montserrat">
        <div class="sm:p-8 text-left w-[90%] mb-[2vh] sm:mb-0 ">
            <div class="md:w-full md:h-[80%] md:flex flex-col justify-center md:mt-3">
                <section class=" space-y-5 mb-5">
                    <div class="md:flex items-center justify-between max-md:space-y-2 border-b pb-3">
                        <h1 id="tableTitle" class="text-xl font-bold">Lista de alumnos</h1>
                        <div class="flex items-center">
                            {{-- Buscador --}}
                            <div class="flex items-center border border-primaryColor rounded-md px-4">
                                <input type="text" id="bajaSearch" name="bajaSearch" placeholder="Buscador"
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
                </section>
                <section class="space-y-6 max-md:mt-10">
                    {{-- Seccion de la tabla --}}
                    <section class="hidden md:block md:h-full">
                        <table id="dataTable" class="divide-y divide-[#999] w-full">
                            <thead id="tableHeader" class="text-[#555] text-base">
                            <tr>
                                    <th scope="col" class="pr-[13rem] pb-4">Nombre de estudiantes</th>
                                    <th scope="col" class="pr-[13rem] pb-4">Nombre del proyecto</th>
                                    <th scope="col" class="pb-4 pr-[5rem]">Asesor académico</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm">
                                @foreach ($dataStudents as $data)
                                                      <tr class="w-full transition duration-100 ease-in-out hover:bg-lightGray/20 border-b-gray-200 border-b-[0.5px]">

                                        <class="font-semibold data-row @if ($data->academicAdvisor) has-advisor @else no-advisor @endif">
                                        <td class="py-4">{{ $data->user->name }}</td>
                                        <td class="py-4">Sistema de Estadias</td>
                                        <td class="py-4">
                                            @unless ($data->academicAdvisor)
                                                <span class="text-gray-500">Sin asesor asignado</span>
                                            @else
                                                {{ $data->academicAdvisor->user->name }}
                                            @endunless
                                        </td>

                                        <td class="py-4">
                                            @if ($data->academicAdvisor)
                                                {{-- Boton para cambiar de asesor --}}
                                                <a href="{{ route('presidente.edit', $data->id) }}"
                                                    class="text-primaryColor flex space-x-1 hover:bg-gray-100 p-1 rounded">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                                    </svg>
                                                    <p class="font-bold">Cambias asesor</p>
                                                </a>
                                            @else
                                                {{-- Boton de asignacion de asesor --}}
                                                <a href="{{ route('presidente.edit', $data->id) }}"
                                                    class="text-primaryColor flex space-x-1 hover:bg-gray-100 p-1 rounded">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    <p class="font-bold">Asignar asesor</p>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <p id="noDataMessage"
                            class="mt-20 text-red-500 hidden h-screen text-center text-lightGray font-bold text-2xl">
                            Sin resultados</p>
                        @if ($dataStudents->lastPage() > 1)
                            <div class="pagination">
                                {{ $dataStudents->links() }}
                            </div>
                        @endif
                    </section>
                    {{-- Seccion responsiva --}}
                    <section class="font-montserrat md:hidden">
                        @foreach ($dataStudents as $data)
                            <div class="student-card bg-white rounded-lg shadow-lg border p-5 font-bold space-y-2 mb-5
                                @if ($data->academicAdvisor) has-advisor
                                @else
                                    no-advisor @endif"
                                data-student-name="{{ strtolower($data->user->name) }}">
                                <div>
                                    <h3 class="text-[#555]">Nombre del alumno:</h3>
                                    <p class="text-lg">{{ $data->user->name }}</p>
                                </div>
                                <div>
                                    <h3 class="text-[#555]">Nombre del proyecto:</h3>
                                    <p class="text-lg">Sistema de estadias</p>
                                </div>
                                <div>
                                    <h3 class="text-[#555]">Asesor academico:</h3>
                                    @unless ($data->academicAdvisor)
                                        <span class="text-gray-500 text-lg">Sin asesor asignado</span>
                                    @else
                                        {{ $data->academicAdvisor->user->name }}
                                    @endunless
                                </div>
                                <div>
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
                                </div>
                            </div>
                        @endforeach
                        <p id="noDataMessage"
                            class="mt-20 text-red-500 hidden text-center text-lightGray font-bold text-2xl">
                            Sin resultados</p>
                        @if ($dataStudents->lastPage() > 1)
                            <div class="pagination">
                                {{ $dataStudents->links() }}
                            </div>
                        @endif
                    </section>
                </section>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const searchInput = document.getElementById('bajaSearch');
                const tableRows = document.querySelectorAll('#dataTable tbody tr');
                const studentCards = document.querySelectorAll('.student-card');
                const noDataMessage = document.getElementById('noDataMessage');
                const allButton = document.getElementById('btnAll');
                const withAdvisorButton = document.getElementById('btnWithAdvisor');
                const withoutAdvisorButton = document.getElementById('btnWithOutAdvisor');

                // Eventos para los botones de filtro
                allButton.addEventListener('click', showAll);
                withAdvisorButton.addEventListener('click', showWithAdvisor);
                withoutAdvisorButton.addEventListener('click', showWithoutAdvisor);

                // Evento de escucha para la búsqueda
                searchInput.addEventListener('input', function() {
                    const searchText = this.value.trim().toLowerCase();
                    if (searchText === '') {
                        showAll();
                        showTableAndPagination(); // Mostrar tabla y paginador
                        return;
                    }

                    // Buscar en la tabla de escritorio
                    tableRows.forEach(row => {
                        const studentName = row.querySelector('td:first-child').textContent.trim()
                            .toLowerCase();
                        if (studentName.includes(searchText)) {
                            row.style.display = '';
                        } else {
                            row.style.display = 'none';
                        }
                    });

                    // Buscar en las tarjetas de estudiante (vista móvil)
                    studentCards.forEach(card => {
                        const studentName = card.getAttribute('data-student-name');
                        if (studentName.includes(searchText)) {
                            card.style.display = '';
                        } else {
                            card.style.display = 'none';
                        }
                    });

                    const visibleRows = document.querySelectorAll('#dataTable tbody tr[style=""]');
                    const visibleCards = document.querySelectorAll('.student-card[style=""]');
                    if (visibleRows.length === 0 && visibleCards.length === 0) {
                        noDataMessage.style.display = 'block';
                        hideTableAndPagination(); // Ocultar tabla y paginador
                    } else {
                        noDataMessage.style.display = 'none';
                        showTableAndPagination(); // Mostrar tabla y paginador
                    }
                });

                // Función para mostrar todas las filas
                function showAll() {
                    tableRows.forEach(row => row.style.display = '');
                    studentCards.forEach(card => card.style.display = '');
                    noDataMessage.style.display = 'none';
                }

                // Función para mostrar solo las filas con asesor
                function showWithAdvisor() {
                    tableRows.forEach(row => {
                        if (row.classList.contains('has-advisor')) {
                            row.style.display = '';
                        } else {
                            row.style.display = 'none';
                        }
                    });
                    studentCards.forEach(card => {
                        if (card.classList.contains('has-advisor')) {
                            card.style.display = '';
                        } else {
                            card.style.display = 'none';
                        }
                    });
                    updateNoDataMessage();
                }

                // Función para mostrar solo las filas sin asesor
                function showWithoutAdvisor() {
                    tableRows.forEach(row => {
                        if (row.classList.contains('no-advisor')) {
                            row.style.display = '';
                        } else {
                            row.style.display = 'none';
                        }
                    });
                    studentCards.forEach(card => {
                        if (card.classList.contains('no-advisor')) {
                            card.style.display = '';
                        } else {
                            card.style.display = 'none';
                        }
                    });
                    updateNoDataMessage();
                }

                // Función para actualizar el mensaje de sin resultados
                function updateNoDataMessage() {
                    const visibleRows = document.querySelectorAll('#dataTable tbody tr[style=""]');
                    const visibleCards = document.querySelectorAll('.student-card[style=""]');
                    if (visibleRows.length === 0 && visibleCards.length === 0) {
                        noDataMessage.style.display = 'block';
                    } else {
                        noDataMessage.style.display = 'none';
                    }
                }

                // Función para mostrar la tabla y el paginador
                function showTableAndPagination() {
                    const table = document.getElementById('dataTable');
                    const pagination = document.querySelector('.pagination');
                    table.style.display = '';
                    if (pagination) {
                        pagination.style.display = '';
                    }
                }

                // Función para ocultar la tabla y el paginador
                function hideTableAndPagination() {
                    const table = document.getElementById('dataTable');
                    const pagination = document.querySelector('.pagination');
                    table.style.display = 'none';
                    if (pagination) {
                        pagination.style.display = 'none';
                    }
                }
            });
        </script>
    </section>
@endsection
