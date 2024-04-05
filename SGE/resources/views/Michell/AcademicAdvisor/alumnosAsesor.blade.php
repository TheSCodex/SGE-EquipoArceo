@extends('templates/authTemplate')
@section('titulo', 'Estudiantes Asesorados')
@section('contenido')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <section class="flex flex-col items-center justify-start flex-grow h-screen min-h-full">
        <div class="sm:p-8 text-left w-[90%] mb-[2vh] sm:mb-0 ">
            <div class="w-11/12 pb-2 mx-auto mt-5 border-b border-gray-200 md:flex md:items-center md:justify-between">
                <h1 class="mb-2 text-xl font-bold text-center font-montserrat md:text-left">Estudiantes Asesorados</h1>
                <div class="flex flex-row items-center justify-end">
                    <div>
                        <div class="relative items-center hidden md:flex">
                            <input id='search'
                                class="border border-b rounded-md border-primaryColor placeholder-primaryColor "
                                type="search" placeholder="Buscar...." style="color: green;">
                        </div>
                    </div>

                </div>

                <div class="flex flex-col justify-between mx-auto mt-2 sm:flex-row md:hidden">

                    <div>
                        <div class="relative flex items-center">
                            <input id='searchMovil'
                                class="w-full mb-2 border border-b rounded-md border-primaryColor placeholder-primaryColor sm:mb-0 "
                                type="search" placeholder="Buscar...." style="color: green;">
                        </div>
                    </div>


                </div>
            </div>

            <section class="w-full px-2 lg:px-16">
                <div class="mx-8 my-5">
                    <table class="w-full min-w-[600px] divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-xs font-bold tracking-wider text-left uppercase text-black-500">
                                    Matrícula</th>
                                <th class="px-6 py-3 text-xs font-bold tracking-wider text-left uppercase text-black-500">
                                    Nombre
                                    de estudiante</th>
                                <th class="px-6 py-3 text-xs font-bold tracking-wider text-left uppercase text-black-500">
                                    Estado
                                </th>
                                <th class="px-6 py-3 text-xs font-bold tracking-wider text-left uppercase text-black-500">
                                    Amonestacion</th>
                                <th
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                                    Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @if ($interns->count() > 0)
                                @foreach ($interns as $intern)
                                    @php
                                        $user = \App\Models\User::find($intern->user_id);
                                    @endphp
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $user->identifier }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }} {{ $user->last_name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $intern->studentStatus->name ?? 'N/A' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $intern->penalization->penalty_name ?? 'N/A' }}</td>
                                        <td>
                                            <div class="flex justify-center gap-3">
                                                <button id="editBtn" type="button" data-toggle="modal"
                                                    data-target="#getSancion{{ $user->id }}"
                                                    class="px-4 py-1 font-bold text-white rounded bg-[#3E5366] hover:bg-[#212c36]">
                                                    Sanción
                                                </button>

                                                <button id="editBtn" type="button" data-toggle="modal"
                                                    data-target="#getCartaAprobacion{{ $user->id }}"
                                                    class="px-4 py-1 font-bold text-white rounded bg-[#0FA987] hover:bg-[#185c4d]">
                                                    Aprobación
                                                </button>

                                                <button id="editBtn" type="button" data-toggle="modal"
                                                    data-target="#getCartaDigitalizacion{{ $user->id }}"
                                                    class="px-4 py-1 font-bold text-white rounded bg-[#0FA987] hover:bg-[#185c4d]">
                                                    Digitalización
                                                </button>
                                                <form action="{{ route('alumno.edit', $intern->user_id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')

                                                    <button type="submit"
                                                        class="bg-rose-800 delete-button text-white px-4 py-1 font-bold rounded-md hover:bg-[#421818]">
                                                        Dar de baja
                                                    </button>
                                                </form>

                                                {{-- <form action="{{ route('intern.destroy', $intern->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" onclick="return confirm('¿Estás seguro de que quieres eliminar este registro?')" class="px-5 py-1 text-sm text-white rounded-md bg-rose-500">
                                                Eliminar
                                            </button>
                                        </form> --}}


                                                <div id="getSancion{{ $user->id }}" tabindex="-1" role="dialog"
                                                    aria-labelledby="myModalLabel" aria-hidden="true"
                                                    class="myModal2 fade fixed hidden inset-0 h-[100%] w-[100%] justify-center items-center bg-black bg-opacity-50">
                                                    <div role="document"
                                                        class="flex justify-center p-10 justify-items-center mt-72">
                                                        <div class="modal-content  w-[24%]">
                                                            <div
                                                                class="flex items-center justify-between p-3 font-bold bg-white rounded-tl-2xl rounded-tr-2xl">
                                                                <h5 class="ml-2" id="modalAgregarEstudianteLabel">Generar
                                                                    Sancion para el estudiante
                                                                </h5>
                                                                <button type="button"
                                                                    class="flex items-center justify-center w-6 h-6 text-white rounded-full bg-red"
                                                                    id="clo" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <div class="p-3 bg-white rounded-bl-2xl rounded-br-2xl">
                                                                <form target="_blank"
                                                                    action="{{ route('download.sancion', $user->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    
                                                                    <div class="flex flex-col justify-between mt-2">
                                                                        <label for="motivo">Elija el tipo de Sanción por
                                                                            motivo</label>
                                                                        <select name="motivo" id="motivo">
                                                                            <option value="1">Por motivos académicos
                                                                            </option>
                                                                            <option value="2">Por temas Relacionados
                                                                                con la gestión empresarial</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="flex flex-col justify-between mt-2">
                                                                        <label for="tipo">Elija el tipo de
                                                                            Sanción</label>
                                                                        <select name="tipo" id="tipo"
                                                                            onchange="toggleServiceHours(this)">
                                                                            <option value="1">Amonestación escrita
                                                                            </option>
                                                                            <option value="2">Amonestación con horas de
                                                                                labor social</option>
                                                                            <option value="3">Cancelación de Estadía
                                                                            </option>
                                                                        </select>
                                                                        <div id="serviceHoursContainer"
                                                                            class="flex flex-col justify-between w-full mt-2">
                                                                            <label for="serviceHours">Horas de
                                                                                Servicio</label>
                                                                            <input class="w-full" type="number"
                                                                                name="serviceHours" id="serviceHours" />
                                                                        </div>
                                                                    </div>
                                                                    <button type="submit"
                                                                        class="bg-[#00AB84] w-full my-3 rounded-lg py-1 text-white">Generar</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div id="getCartaAprobacion{{ $user->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
                                                    class="myModal2 fade fixed hidden inset-0 h-[100%] w-[100%] justify-center items-center bg-black bg-opacity-50">
                                                    <div role="document"
                                                        class="flex justify-center p-10 justify-items-center mt-80">
                                                        <div class="modal-content  w-[24%]">
                                                            <div
                                                                class="flex items-center justify-between p-3 font-bold bg-white rounded-tl-2xl rounded-tr-2xl">
                                                                <h5 class="ml-2" id="modalAgregarEstudianteLabel">
                                                                    Generar
                                                                    Carta de Aprobacion de Memoria
                                                                </h5>
                                                                <button type="button"
                                                                    class="flex items-center justify-center w-6 h-6 text-white rounded-full bg-red"
                                                                    id="clo" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <div class="p-3 bg-white rounded-bl-2xl rounded-br-2xl">
                                                                <form target="_blank"
                                                                    action="{{ route('download.aprobacion', $user->id) }}"
                                                                    method="GET">
                                                                    @csrf


                                                                    <button type="submit"
                                                                        class="bg-[#00AB84] w-full my-3 rounded-lg py-1 text-white">Generar</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div id="getCartaDigitalizacion{{ $user->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
                                                    class="myModal2 fade fixed hidden inset-0 h-[100%] w-[100%] justify-center items-center bg-black bg-opacity-50">
                                                    <div role="document"
                                                        class="flex justify-center p-10 justify-items-center mt-80">
                                                        <div class="modal-content  w-[24%]">
                                                            <div
                                                                class="flex items-center justify-between p-3 font-bold bg-white rounded-tl-2xl rounded-tr-2xl">
                                                                <h5 class="ml-2" id="modalAgregarEstudianteLabel">
                                                                    Generar
                                                                    Carta de Digitalizacion de Memoria
                                                                </h5>
                                                                <button type="button"
                                                                    class="flex items-center justify-center w-6 h-6 text-white rounded-full bg-red"
                                                                    id="clo" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="p-3 bg-white rounded-bl-2xl rounded-br-2xl">
                                                                <form target="_blank"
                                                                    action="{{ route('download.digitalizacion', $user->id) }}"
                                                                    method="POST">
                                                                    @csrf

                                                                    <div class="flex flex-col justify-between mt-2">
                                                                        <label for="motivo">Elija el tipo de
                                                                            Estadía</label>
                                                                        <select name="motivo" id="motivo">
                                                                            <option value="1">
                                                                                Excelencia académica
                                                                            </option>
                                                                            <option value="2">
                                                                                Experiencia Laboral
                                                                            </option>
                                                                            <option value="3">
                                                                                Movilidad internacional
                                                                            </option>
                                                                            <option value="4">
                                                                                Proyecto de investigación
                                                                            </option>
                                                                            <option value="5">
                                                                                Certificación Profesional
                                                                            </option>
                                                                        </select>
                                                                    </div>

                                                                    <button type="submit"
                                                                        class="bg-[#00AB84] w-full my-3 rounded-lg py-1 text-white">Generar</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-sm text-center text-gray-500">
                                        No hay estudiantes asesorados.
                                    </td>
                                </tr>

                            @endif
                        </tbody>
                    </table>
                    {{ $interns->links() }}
                </div>
            </section>
            <script>
                function toggleServiceHours(select) {
                    var serviceHoursContainer = document.getElementById('serviceHoursContainer');
                    serviceHoursContainer.style.display = select.value == '2' ? 'block' : 'none';
                }
            </script>
            <script>
                window.onload = function() {
                    toggleServiceHours(document.getElementById('tipo'));
                };
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

                    const closeBtns = document.querySelectorAll('#clo');

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
        </div>

        <script>
            function confirmDelete(advisorName, advisorId) {
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: Estás a punto de eliminar a $ {
                        advisorName
                    }.Esta acción no se puede revertir.,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Sí, eliminarlo'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('deleteForm' + advisorId).submit();
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


        <script>
            function searchMobileTable() {
                var searchText = document.getElementById("searchMovil").value.toLowerCase();
                var advisors = document.querySelectorAll(".grid.md\\:grid-cols-2.gap-4.w-full > div");

                advisors.forEach(function(advisor) {
                    var advisorText = advisor.innerText.toLowerCase();
                    var found = advisorText.indexOf(searchText) > -1;
                    advisor.style.display = found ? "" : "none";
                });
            }

            document.getElementById("searchMovil").addEventListener("input", searchMobileTable);
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
                            confirmButtonText: 'Sí, dar de baja'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                form.submit();
                            }
                        });
                    });
                });
            });
        </script>
    @endsection
