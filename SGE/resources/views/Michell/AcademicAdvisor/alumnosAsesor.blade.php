@extends('templates/authTemplate')
@section('contenido')

    <div class="flex flex-col items-center min-h-screen bg-white">
        <section class="flex items-center w-full p-4 mt-7">
            <h1 class="ml-20 text-2xl font-bold font-kanit">Estudiantes Asesorados</h1>
            {{-- buscador --}}
            <div class="w-[50%] flex justify-evenly ml-auto">
                <input id="searchInput" placeholder="Buscador" type="search" name="d"
                    class="w-[50%] placeholder:text-green placeholder:px-3 rounded-md mb-4 border-2 border-green focus:outline-none px-3">
                <svg width="28" height="38" viewBox="0 0 14 22" class="mt-3" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <clipPath id="clip0_641_2165">
                            <rect width="14" height="22" fill="white" transform="translate(0.00585938)" />
                        </clipPath>
                    </defs>
                </svg>
            </div>
        </section>

        <section class="w-full px-2 lg:px-16">
            <div class="mx-8 my-5">
                <table class="w-full min-w-[600px] divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-xs font-bold tracking-wider text-left uppercase text-black-500">
                                Matrícula</th>
                            <th class="px-6 py-3 text-xs font-bold tracking-wider text-left uppercase text-black-500">Nombre
                                de estudiante</th>
                            <th class="px-6 py-3 text-xs font-bold tracking-wider text-left uppercase text-black-500">Estado
                            </th>
                            <th class="px-6 py-3 text-xs font-bold tracking-wider text-left uppercase text-black-500">
                                Amonestacion</th>
                            <th class="px-6 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
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
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }} {{ $user->last_name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $intern->studentStatus->name ?? 'N/A' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $intern->penalization->penalty_name ?? 'N/A' }}</td>
                                    <td>
                                        <div class="flex justify-center gap-3">
                                            <button id="editBtn" type="button" data-toggle="modal" data-target="#getSancion{{ $user->id }}"
                                                class="px-4 py-1 font-bold text-white rounded bg-[#3E5366] hover:bg-[#212c36]">
                                                Sanción
                                            </button>
                                            
                                            <button id="editBtn" type="button" data-toggle="modal" data-target="#getCartaAprobacion{{ $user->id }}"
                                                class="px-4 py-1 font-bold text-white rounded bg-[#0FA987] hover:bg-[#185c4d]">
                                                Aprobación
                                            </button>
                                            
                                            <button id="editBtn" type="button" data-toggle="modal" data-target="#getCartaDigitalizacion{{ $user->id }}"
                                                class="px-4 py-1 font-bold text-white rounded bg-[#0FA987] hover:bg-[#185c4d]">
                                                Digitalización
                                            </button>
                                            
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
                                                            <form action="{{ route('download.sanon', $user->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                <div class="flex flex-col justify-between mt-2">
                                                                    <label for="motivo">Elija el tipo de Sanción por motivo</label>
                                                                    <select name="motivo" id="motivo">
                                                                        <option value="1" >Por motivos académicos</option>
                                                                        <option value="2" >Por temas Relacionados con la gestión empresarial</option>
                                                                    </select>
                                                                </div>
                                                                <div class="flex flex-col justify-between mt-2">
                                                                    <label for="tipo">Elija el tipo de Sanción</label>
                                                                    <select name="tipo" id="tipo">
                                                                        <option value="1">Amonestación escrita</option>
                                                                        <option value="2">Amonestación con horas de labor social</option>
                                                                        <option value="3">Cancelación de Estadía</option>
                                                                    </select>
                                                                </div>
                                                                <button type="submit"
                                                                    class="bg-[#00AB84] w-full my-3 rounded-lg py-1 text-white">Generar</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div id="getCartaAprobacion{{ $user->id }}" tabindex="-1" role="dialog"
                                                aria-labelledby="myModalLabel" aria-hidden="true"
                                                class="myModal2 fade fixed hidden inset-0 h-[100%] w-[100%] justify-center items-center bg-black bg-opacity-50">
                                                <div role="document"
                                                    class="flex justify-center p-10 justify-items-center mt-80">
                                                    <div class="modal-content  w-[24%]">
                                                        <div
                                                            class="flex items-center justify-between p-3 font-bold bg-white rounded-tl-2xl rounded-tr-2xl">
                                                            <h5 class="ml-2" id="modalAgregarEstudianteLabel">Generar
                                                                Carta de Aprobacion de Memoria
                                                            </h5>
                                                            <button type="button"
                                                                class="flex items-center justify-center w-6 h-6 text-white rounded-full bg-red"
                                                                id="clo" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <div class="p-3 bg-white rounded-bl-2xl rounded-br-2xl">
                                                            <form action="{{ route('download.meria', $user->id) }}"
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
                                                            <h5 class="ml-2" id="modalAgregarEstudianteLabel">Generar
                                                                Carta de Digitalizacion de Memoria
                                                            </h5>
                                                            <button type="button"
                                                                class="flex items-center justify-center w-6 h-6 text-white rounded-full bg-red"
                                                                id="clo" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="p-3 bg-white rounded-bl-2xl rounded-br-2xl">
                                                            <form action="{{ route('download.aproba', $user->id) }}"
                                                                method="GET">
                                                                @csrf


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
            </div>
        </section>

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
@endsection
