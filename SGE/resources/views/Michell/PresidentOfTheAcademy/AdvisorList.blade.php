@extends('templates.authTemplate')

@section('titulo')
    Lista de asesores
@endsection

@section('contenido')
    <section class="flex flex-col justify-center items-center min-h-full flex-grow font-montserrat">
        <div class="sm:p-8 text-left w-[90%] mb-[2vh] sm:mb-0 ">
            <div class="md:w-full md:h-[80%] md:flex justify-center md:mt-3">
                @if (session()->has('success'))
                    <div class="usuario"></div>
                @endif


                <section class="space-y-6 max-md:mt-5">
                    <div class="md:flex items-center justify-between max-md:space-y-2 border-b pb-3">
                        <h1 id="tableTitle" class="text-xl font-bold">Lista de asesores</h1>
                        <div class="flex items-center justify-evenly w-1/3 max-sm:w-full">
                            {{-- Buscador --}}
                            <div class="hidden md:flex items-center relative">
                                <input type="text" id="bajaSearch" name="bajaSearch" placeholder="Buscar..."
                                    class="border-primaryColor placeholder-primaryColor border-b border rounded-md">

                            </div>
                            <button {{-- class="bg-[#02AB82] p-2 rounded-lg max-lg:w-44 text-white" --}}
                                class="hidden md:block bg-primaryColor text-lg py-2 px-4 rounded-md text-white md:ml-4"
                                onclick="location.href='crear-asesores'">Crear asesor</button>
                        </div>
                    </div>
                    <section id="filterButtons" class="font-bold text-sm md:space-x-6 space-x-2">
                        <button id="btnAll"
                            class="hover:text-white hover:bg-primaryColor focus:bg-primaryColor focus:text-white bg-[#eee] rounded px-5 py-1 shadow-lg  filter-btn"
                            data-filter="all">Todos</button>
                        <button id="btnWithtSudent"
                            class="hover:text-white hover:bg-primaryColor focus:bg-primaryColor focus:text-white bg-[#eee] rounded md:px-5 px-4 py-1 shadow-lg  filter-btn"
                            data-filter="with_students">Con Estudiantes</button>
                        <button id="btnWithOutStudent"
                            class="hover:text-white hover:bg-primaryColor focus:bg-primaryColor focus:text-white bg-[#eee] rounded px-5 py-1 shadow-lg  filter-btn"
                            data-filter="without_students">Sin estudiantes</button>
                    </section>
                    {{-- Seccion de la tabla --}}
                    <section class="hidden md:block h-screen">
                        <div class="h-[calc(100%-4rem)] overflow-y-hidden">
                            <table id="advisorsTable" class="divide-y divide-[#999] w-[84rem]">
                                <thead id="tableHeader" class="text-[#555] text-base">
                                    <tr>
                                        <th scope="col" class="pr-[13rem] pb-4">Nombre</th>
                                        <th scope="col" class="pr-[13rem] pb-4">Carrera</th>
                                        <th scope="col" class="pr-[10rem] pb-4">Estudiantes asesorados</th>
                                        <th scope="col" class="pr-[5rem] pb-4">Máximo de asesorados</th>
                                </thead>
                                <tbody class="text-sm">
                                    @foreach ($advisors as $data)
                                        <tr
                                            class="data-row {{ $data->quantity_advised > 0 ? 'has-advisor' : 'no-advisor' }}">
                                            <td class="py-4">{{ $data->name }}</td>
                                            <td class="py-4 pr-12">{{ $data->career_name }}</td>
                                            @if ($data->quantity_advised >= 0)
                                                @php
                                                    $percentage = ($data->quantity_advised / $data->max_advisors) * 100;
                                                    if ($percentage <= 33) {
                                                        $colorClass = 'text-primaryColor'; // Verde
                                                    } elseif ($percentage <= 66) {
                                                        $colorClass = 'text-orange'; // Naranja
                                                    } else {
                                                        $colorClass = 'text-red'; // Rojo
                                                    }
                                                @endphp
                                                <td class="py-4"><span
                                                        class="{{ $colorClass }}">{{ $data->quantity_advised }}</span>
                                                    Estudiantes</td>
                                            @else
                                                <td class="py-4"><span class="text-primaryColor ">0</span> Estudiantes
                                                </td>
                                            @endif
                                            <td class="py-4"><span
                                                    class="text-primaryColor">{{ $data->max_advisors }}</span> Estudiantes
                                            </td>
                                            <td class="py-4 w-44 flex justify-evenly">
                                                <button id="editBtn" type="button"
                                                    onclick="location.href='editar-asesor/{{ $data->id }}'"
                                                    data-toggle="modal" data-target="#editStudentModal{{ $data->id }}">
                                                    <img src="/img/logos/pencil.svg" alt="">
                                                </button>
                                                <form action="{{ route('asesores.destroy', $data->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="delete-button" id="delete-button-{{ $data->id }}">
                                                        <img src="/img/logos/trash.svg">
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <p id="noDataMessage"
                            class="mt-20 text-red-500 hidden h-screen text-center text-lightGray font-bold text-2xl">
                            Sin resultados</p>
                        </div>
                    </section>
                    <div class="max-md:hidde ">
                        {{ $advisors->links() }}
                    </div>

                    {{-- Seccion responsiva --}}
                    <section class="font-montserrat md:hidden">
                        @foreach ($advisors as $data)
                            <div class="student-card bg-white rounded-lg shadow-lg border mt-4 p-5 font-bold space-y-2
                                @if ($data->academicAdvisor) has-advisor
                                @else
                                    no-advisor @endif"
                                data-student-name="{{ strtolower($data->name) }}">
                                <div>
                                    <h3 class="text-[#555]">Nombre del asesor:</h3>
                                    <p class="text-lg">{{ $data->name }}</p>
                                </div>
                                <div>
                                    <h3 class="text-[#555]">Nombre de la carrera:</h3>
                                    <p class="text-lg">{{ $data->career_name }}</p>
                                </div>
                                <div>
                                    <h3 class="text-[#555]">Estudiantes asesorados:</h3>
                                    <p class="text-lg">{{ $data->quantity_advised }} Estudiantes</p>
                                </div>
                                <div>
                                    <h3 class="text-[#555]">Máximo de asesorados:</h3>
                                    <p class="text-lg">{{ $data->max_advisors }} Estudiantes</p>
                                </div>
                                <div class="flex justify-evenly">
                                    <button id="editBtn" type="button"
                                        onclick="location.href='editar-asesor/{{ $data->id }}'" data-toggle="modal"
                                        data-target="#editStudentModal{{ $data->id }}">
                                        <img class="w-[2rem]" src="/img/logos/pencil.svg" alt="">

                                    </button>
                                    <form action="{{ route('asesores.destroy', $data->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">
                                            <img class="w-[2rem]" src="/img/logos/trash.svg">
                                        </button>
                                    </form>
                                </div>
                                <div>
                                </div>
                            </div>
                        @endforeach
                        <div class="mt-5 lg:hidden">
                            {{ $advisors->links() }}
                        </div>
                    </section>
                </section>
            </div>
        </div>

        {{-- filtrar --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                $(document).ready(function() {
                    // Filtrar todos los asesores
                    $('#btnAll').click(function() {
                        $('tbody tr').show();
                    });

                    // Filtrar asesores con estudiantes
                    $('#btnWithtSudent').click(function() {
                        $('tbody tr').hide();
                        $('tbody tr').each(function() {
                            if (parseInt($(this).find('td:eq(2)').text(), 10) > 0) {
                                $(this).show();
                            }
                        });
                    });


                    // Filtrar asesores sin estudiantes
                    $('#btnWithOutStudent').click(function() {
                        $('tbody tr').hide();
                        $('tbody tr').each(function() {
                            if (parseInt($(this).find('td:eq(2)').text(), 10) == 0) {
                                $(this).show();
                            }
                        });
                    });
                });

                $(document).ready(function() {
                    $('#bajaSearch').on('input', function() {
                        var value = $(this).val().toLowerCase();
                        if (value !== "") {
                            $("table tr").filter(function() {
                                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                            });
                            if ($("table tr:visible").length === 0) {}
                        } else {
                            $("table tr").show();
                        }
                    });
                });


            });
        </script>


        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const searchInput = document.getElementById('bajaSearch');
                const tableRows = document.querySelectorAll('#dataTable tbody tr');
                const studentCards = document.querySelectorAll('.student-card');
                const noDataMessage = document.getElementById('noDataMessage');

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
                function showWithStudent() {
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

            document.getElementById('bajaSearch').addEventListener('input', function() {
                let searchText = this.value.toLowerCase();
                let rows = document.querySelectorAll('.data-row');

                rows.forEach(function(row) {
                    let name = row.querySelector('td:nth-child(1)').textContent.toLowerCase();
                    let career = row.querySelector('td:nth-child(2)').textContent.toLowerCase();

                    if (name.includes(searchText) || career.includes(searchText)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
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
                const usuarios = document.querySelectorAll('.usuario');
                usuarios.forEach(usuario => {
                    Swal.fire({
                        position: "top-center",
                        icon: "success",
                        title: "{{ session()->get('success') }}",
                        showConfirmButton: false,
                        timer: 1500,
                        target: usuario
                    });
                });
            });
        </script>


    </section>
    </div>
@endsection
