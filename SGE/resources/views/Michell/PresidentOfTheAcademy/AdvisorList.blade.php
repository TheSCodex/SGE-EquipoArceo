@extends('templates.authTemplate')

@section('titulo')
    Lista de asesores
@endsection

@section('contenido')
    <section class="flex flex-col justify-center items-center min-h-full flex-grow font-montserrat">
        <div class="sm:p-8 text-left w-[90%] mb-[2vh] sm:mb-0 ">
            <div class="md:w-full md:h-[80%] md:flex justify-center md:mt-3">
                <section class="space-y-6 max-md:mt-5">
                    <div class="md:flex items-center justify-between max-md:space-y-2 border-b pb-3">
                        <h1 id="tableTitle" class="text-xl font-bold">Lista de asesores</h1>
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
                            Estudiantes</button>
                        <button id="btnWithOutAdvisor"
                            class="hover:text-white hover:bg-primaryColor focus:bg-primaryColor focus:text-white bg-[#eee] rounded px-5 py-1 shadow-lg">Sin
                            Estudiantes</button>
                    </section>
                    {{-- Seccion de la tabla --}}
                    <section class="hidden md:block">
                        <table id="dataTable" class="divide-y divide-[#999] w-full">
                            <thead id="tableHeader" class="text-[#555] text-base">
                                <tr>
                                    <th scope="col" class="pr-[13rem] pb-4">Nombre</th>
                                    <th scope="col" class="pr-[13rem] pb-4">Carrera</th>
                                    <th scope="col" class="pr-[13rem] pb-4">Estudiantes asesorados</th>
                                    <th scope="col" class="pr-[13rem] pb-4">Máximo de asesorados</th>
                            </thead>
                            <tbody class="text-sm">
                                @foreach ($advisors as $data)
                                    <tr
                                        class="font-semibold data-row @if ($data->academicAdvisor) has-advisor @else no-advisor @endif">
                                        <td class="py-4">{{ $data->name }}</td>
                                        <td class="py-4 pr-12">{{ $data->career_name }}</td>
                                        <td class="py-4">{{ $data->max_advisors }} Estudiantes</td>
                                        <td class="py-4">{{ $data->quantity_advised }} Estudiantes</td>
                                        <td class="py-4 w-44 flex justify-evenly">
                                            <button id="editBtn" type="button" data-toggle="modal"
                                                data-target="#editStudentModal{{ $data->id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-pencil" width="44"
                                                    height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#02AB82"
                                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                                                    <path d="M13.5 6.5l4 4" />
                                                </svg>
                                            </button>
                                            <form action="{{ route('asesores.destroy', $data->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="delete-button" id="delete-button-{{ $data->id }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-trash" width="44"
                                                        height="44" viewBox="0 0 24 24" stroke-width="1.5"
                                                        stroke="#02AB82" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M4 7l16 0" />
                                                        <path d="M10 11l0 6" />
                                                        <path d="M14 11l0 6" />
                                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>

                                    <!-- Modificar el modal -->
                                    <div id="editStudentModal{{ $data->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel" aria-hidden="true"
                                        class="myModal2 fade absolute hidden inset-0 h-[100%] w-[100%] justify-center items-center bg-black bg-opacity-50">
                                        <div role="document" class="flex justify-center justify-items-center mt-96">
                                            <div class="modal-content  w-[20%]">
                                                <div
                                                    class="bg-white flex justify-between items-center font-bold rounded-tl-2xl rounded-tr-2xl">
                                                    <h5 class="ml-2" id="modalAgregarEstudianteLabel">Agregar Estudiante
                                                    </h5>
                                                    <button type="button"
                                                        class="close m-2 bg-red-500 text-white rounded-full px-2"
                                                        id="clo" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="bg-white p-3 rounded-bl-2xl rounded-br-2xl">
                                                    <form action="{{ route('asesores.update', $data->id) }}" method="POST">
                                                        @csrf
                                                        @method('put')
                                                        <div class="flex justify-between mt-2">
                                                            <label for="max_advisors" class="mr-2">Máximos asesorados:</label>
                                                            <input type="number" class="rounded-lg w-1/2 border-1 border-[#00AB84]" id="max_advisors{{ $data->id }}" name="max_advisors" value="{{ $data->max_advisors }}" required>
                                                            @error('max_advisors')
                                                                <p class="text-red-500 font-bold text-center">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                        <div class="flex justify-between mt-2">
                                                            <label for="quantity_advised">Asesorados:</label>
                                                            <input type="number" class="rounded-lg w-1/2 border-1 border-[#00AB84]" id="quantity_advised{{ $data->id }}" name="quantity_advised" value="{{ $data->quantity_advised }}" required>
                                                            @error('quantity_advised')
                                                                <p class="text-red-500 font-bold text-center">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                        <button type="submit" class="bg-[#00AB84] w-full my-3 rounded-lg py-1 text-white">Actualizar</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>

                        </table>
                        <p id="noDataMessage"
                            class="mt-4 text-red-500 hidden text-center text-lightGray font-bold text-2xl">
                            Sin resultados</p>
                    </section>
                    {{-- Seccion responsiva --}}
                    <section class="font-montserrat md:hidden">
                        @foreach ($advisors as $data)
                            <div class="student-card bg-white rounded-lg shadow-lg border p-5 font-bold space-y-2
                                @if ($data->academicAdvisor) has-advisor
                                @else
                                    no-advisor @endif"
                                data-student-name="{{ strtolower($data->name) }}">
                                <div>
                                    <h3 class="text-[#555]">Nombre del alumno:</h3>
                                    <p class="text-lg">{{ $data->name }}</p>
                                </div>
                                <div>
                                    <h3 class="text-[#555]">Nombre del proyecto:</h3>
                                    <p class="text-lg">Sistema de estadias</p>
                                </div>
                                <div>
                                    <h3 class="text-[#555]">Asesor academico:</h3>
                                    @unless ($data)
                                        <span class="text-gray-500 text-lg">Sin asesor asignado</span>
                                    @else
                                        {{-- {{ $data->academicAdvisor->name }} --}}
                                    @endunless
                                </div>
                                <div>
                                </div>
                            </div>
                        @endforeach
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
                        return;
                    }
                    studentCards.forEach(card => {
                        const studentName = card.getAttribute('data-student-name');
                        if (studentName.includes(searchText)) {
                            card.style.display = '';
                        } else {
                            card.style.display = 'none';
                        }
                    });
                    const visibleCards = document.querySelectorAll('.student-card[style=""]');
                    if (visibleCards.length === 0) {
                        noDataMessage.style.display = 'block';
                    } else {
                        noDataMessage.style.display = 'none';
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
                    const visibleCards = document.querySelectorAll('.student-card[style=""]');
                    if (visibleCards.length === 0) {
                        noDataMessage.style.display = 'block';
                    } else {
                        noDataMessage.style.display = 'none';
                    }
                }
            });
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const editBtns = document.querySelectorAll('#editBtn');

                editBtns.forEach(editBtn => {
                    editBtn.addEventListener('click', function() {
                        const modalId = this.getAttribute('data-target');
                        const modal = document.querySelector(modalId);
                        modal.style.display = 'block';
                    });
                });

                const closeBtns = document.querySelectorAll('.close');

                closeBtns.forEach(closeBtn => {
                    closeBtn.addEventListener('click', function() {
                        const modal = this.closest('.myModal2');
                        modal.style.display = 'none';
                    });
                });

                window.addEventListener('click', function(event) {
                    const modals = document.querySelectorAll('.myModal2');
                    modals.forEach(modal => {
                        if (event.target === modal) {
                            modal.style.display = 'none';
                        }
                    });
                });
            });
        </script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Obtener todos los botones de eliminar y agregar un listener para mostrar la alerta
                const deleteButtons = document.querySelectorAll('.delete-button');
                deleteButtons.forEach(button => {
                    button.addEventListener('click', function(event) {
                        event.preventDefault();
                        const form = this.closest('form');
                        Swal.fire({
                            title: '¿Estás seguro?',
                            text: 'Esta acción no se puede deshacer',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Sí, eliminar'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                form.submit();
                            }
                        });
                    });
                });
            });
        </script>


    </section>
@endsection
