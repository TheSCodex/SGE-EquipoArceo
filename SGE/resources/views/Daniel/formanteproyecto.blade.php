@extends('templates/authTemplate')
@section('titulo')
    Agregar anteproyecto
@endsection

@section('contenido')
    <section class="flex flex-col justify-center items-center bg-[#F3F5F9] min-h-full flex-grow">
        <div class="sm:p-8 text-left w-[90%] mb-[2vh] sm:mb-0 h-auto mx-auto bg-white rounded-md my-6">
            {{-- Datos Personales --}}
            <div class="my-4">
                <h1 class="font-roboto text-xl font-semibold my-4 ml-4">Datos del alumno</h1>
            </div>
            <div class="Linea separadora bg-[#000000] h-[2px] my-2 w-[98%] mx-4"></div>
            <form action="{{ route('formanteproyecto.store') }}" method="POST" class="space-y-4 ml-4">
                <div class="Datos Personales flex gap-5">
                    <div class="w-[48%]">
                        <h2 class="font-roboto mb-1 font-medium">Nombre completo:</h2>
                        @csrf
                        <input type="text" name="name_student" placeholder="Introduzca su nombre completo"
                            value="{{ old('name_student', $user->name . ' ' . $user->last_name) }}" required
                            class="w-full border-lightGray border-2 px-4 py-3 rounded-md p-2" readonly><br>
                        @error('name_student')
                            <div style='color:red'>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="w-[15%]">
                        <h2 class="font-roboto mb-1 font-medium">Matricula:</h2>
                        <input type="number" name="matricula" placeholder="Matricula"
                            value="{{ old('matricula', $user->identifier) }}" required
                            class="w-full border-lightGray border-2 px-4 py-3 rounded-md p-2" readonly><br>
                        @error('matricula')
                            <div style='color:red'>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="w-[10%]">
                        <h2 class="font-roboto mb-1 font-medium">Grupo:</h2>
                        <input type="text" name="Group" placeholder="SM51"
                            value="{{ old('Group', $intern->group->name ?? '') }}" required
                            class="w-full border-lightGray border-2 px-4 py-3 rounded-md p-2" readonly><br>
                        @error('Group')
                            <div style='color:red'>{{ $message }}</div>
                        @enderror
                    </div>
                    <input type="hidden" name="selectedIds" id="selectedIds" value="">

                    <div class="w-[20%] justifify-end items-end p-4">
                        <button type="button"
                            class="bg-primaryColor mt-3 text-white text-md font-roboto rounded-lg h-auto p-3"
                            id="openModalButton">
                            Colaborar
                        </button>
                    </div>
                </div>
                <div id="myModal" class="modal hidden bg-opacity-50 fixed z-10 inset-0 overflow-y-auto">
                    <div class="flex items-center justify-center min-h-screen">
                        <div class="bg-white w-full max-w-md p-6 rounded-lg shadow-lg">
                            <div class="text-center mb-4">
                                <h3 class="text-xl font-semibold">Invitar a colaborar</h3>
                            </div>
                            <div>
                                <input type="text" id="searchInput" placeholder="Buscar usuario"
                                    class="w-full border-gray-300 rounded-md p-2">

                                <div id="searchResults">
                                    @foreach ($interns as $intern)
                                        @if ($intern->project_id === null)
                                            <div
                                                class="result flex items-center justify-between bg-white rounded-lg shadow-md p-4 mb-2 hover:bg-gray-100">
                                                <div class="flex items-center">
                                                    <input type="checkbox"
                                                        class="internCheckbox mr-4 h-6 w-6 rounded-full border-2 border-primaryColor focus:outline-none"
                                                        data-id="{{ $intern->user->id }}">
                                                    <div>
                                                        <p class="name text-lg font-semibold text-gray-800">
                                                            {{ $intern->user->name }}
                                                        </p>
                                                        <p class="identifier text-sm text-gray-600">
                                                            {{ $intern->user->identifier }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="mt-6 flex justify-end">
                                <button type="button" class="bg-gray-300 text-gray-700 rounded-lg px-4 py-2 mr-2"
                                    id="closeModalButton">Cerrar
                                </button>
                                <input type="hidden" name="selectedIds" id="selectedIds">
                                <button type="submit" class="bg-primaryColor text-white rounded-lg px-4 py-2">Enviar
                                    invitación</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="Datos escolares flex gap-5">
                    <div class="w-[48%]">
                        <h2 class="font-roboto mb-1 font-medium">División Académica:</h2>
                        <select name="division_academica" required
                            class="w-full border-lightGray border-2 px-4 py-3 rounded-md p-2">
                            <option value="" disabled>Selecciona una división académica</option>
                            @foreach ($defaultDivision as $divisionId => $divisionName)
                                <option value="{{ $divisionId }}" selected>{{ $divisionName }}</option>
                            @endforeach
                            <optgroup label="Otras divisiones">
                                @foreach ($divisions as $division)
                                    <option value="{{ $division->id }}">{{ $division->name }}</option>
                                @endforeach
                            </optgroup>
                        </select>
                        <br>
                        @error('division_academica')
                            <div style='color:red'>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="w-[48%]">
                        <h2 class="font-roboto mb-1 font-medium">Programa Educativo:</h2>
                        <select name="proyecto_educativo" required
                            class="w-full border-lightGray border-2 px-4 py-3 rounded-md p-2">
                            <option value="" disabled>Selecciona tu programa educativo</option>
                            @foreach ($defaultCareer as $careerId => $careerName)
                                <option value="{{ $careerId }}" selected>{{ $careerName }}</option>
                            @endforeach
                            <optgroup label="Otras carreras">
                                @foreach ($careersDivision as $career)
                                    <option value="{{ $career->id }}">{{ $career->name }}</option>
                                @endforeach
                            </optgroup>
                        </select>
                        <br>
                        @error('proyecto_educativo')
                            <div style='color:red'>{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="Datos Personales 2 flex gap-5">
                    <div class="w-[48%]">
                        <h2 class="font-roboto mb-1 font-medium">Correo Electronico:</h2>
                        <input type="email" name="email_student" placeholder="Introduzca su correo electronico"
                            value="{{ old('email_student', $user->email) }}" required
                            class="w-full border-lightGray border-2 px-4 py-3 rounded-md p-2"><br>
                        @error('email_student')
                            <div style='color:red'>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="w-[15%]">
                        <h2 class="font-roboto mb-1 font-medium">Numero:</h2>
                        <input type="tel" name="Numero" placeholder="Teléfono"
                            value="{{ old('Numero', $user->phoneNumber) }}" required
                            class="w-full border-lightGray border-2 px-4 py-3 rounded-md p-2"><br>
                        @error('Numero')
                            <div style='color:red'>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="w-[15%]">
                        <h2 class="font-roboto mb-1 font-medium">Fecha Inicio:</h2>
                        <input type="date" name="Fecha_Inicio" placeholder="SM51"
                            value="{{ old('Fecha_Inicio', date('Y-m-d')) }}" required
                            class="w-full border-lightGray border-2 px-4 py-3 rounded-md p-2"><br>
                        @error('Fecha_Inicio')
                            <div style='color:red'>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="w-[15%]">
                        <h2 class="font-roboto mb-1 font-medium">Fecha Final:</h2>
                        <input type="date" name="Fecha_Final" placeholder="SM51" value="{{ old('Fecha_Final') }}"
                            required class="w-full border-lightGray border-2 px-4 py-3 rounded-md p-2"><br>
                        @error('Fecha_Final')
                            <div style='color:red'>{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                {{-- Parte Empresa --}}
                <div class="my-4">
                    <h1 class="font-roboto text-xl font-semibold mt-4">Datos de la empresa</h1>
                </div>
                <div class="Linea separadora bg-[#000000] h-[2px] mb-2 w-[98%] "></div>
                <div class="Datos de la empresa 2 flex gap-5">
                    <div class="w-[48%]">
                        <h2 class="font-roboto mb-1 font-medium">Nombre de la empresa:</h2>
                        <input type="text" name="name_enterprise" placeholder="Introduzca el nombre de la empresa"
                            value="{{ old('name_enterprise') }}" required
                            class="w-full border-lightGray border-2 px-4 py-3 rounded-md p-2"><br>
                        @error('name_enterprise')
                            <div style='color:red'>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="w-[48%]">
                        <h2 class="font-roboto mb-1 font-medium">Dirección :</h2>
                        <input type="text" name="direction_enterprise"
                            placeholder="Introduzca la direccion de la empresa" value="{{ old('direction_enterprise') }}"
                            required class="w-full border-lightGray border-2 px-4 py-3 rounded-md p-2"><br>
                        @error('direction_enterprise')
                            <div style='color:red'>{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="Datos del asesor flex gap-5">
                    <div class="w-[48%]">
                        <h2 class="font-roboto mb-1 font-medium">Nombre del asesor:</h2>
                        <input type="text" name="name_advisor"
                            placeholder="Introduzca el nombre del asesor empresarial" value="{{ old('name_advisor') }}"
                            required class="w-full border-lightGray border-2 px-4 py-3 rounded-md p-2"><br>
                        @error('name_advisor')
                            <div style='color:red'>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="w-[48%]">
                        <h2 class="font-roboto mb-1 font-medium">Cargo que desempeña:</h2>
                        <input type="text" name="advisor_position" placeholder="Introduzca el cargo del asesor"
                            value="{{ old('advisor_position') }}" required
                            class="w-full border-lightGray border-2 px-4 py-3 rounded-md p-2"><br>
                        @error('advisor_position')
                            <div style='color:red'>{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="Datos Personales 2 flex gap-5">
                    <div class="w-[48%]">
                        <h2 class="font-roboto mb-1 font-medium">Correo Electronico:</h2>
                        <input type="email" name="email_advisor"
                            placeholder="Introduzca el correo electronico del asesor" value="{{ old('email_advisor') }}"
                            required class="w-full border-lightGray border-2 px-4 py-3 rounded-md p-2"><br>
                        @error('email_advisor')
                            <div style='color:red'>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="w-[15%]">
                        <h2 class="font-roboto mb-1 font-medium">Numero:</h2>
                        <input type="tel" name="Phone_advisor" placeholder="Teléfono"
                            value="{{ old('Phone_advisor') }}" required
                            class="w-full border-lightGray border-2 px-4 py-3 rounded-md p-2"><br>
                        @error('Phone_advisor')
                            <div style='color:red'>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="w-[31%]">
                        <h2 class="font-roboto mb-1 font-medium">Area de desempeño:</h2>
                        <input type="text" name="position_student" placeholder="Introduzca el area donde trabajara"
                            value="{{ old('position_student') }}" required
                            class="w-full border-lightGray border-2 px-4 py-3 rounded-md p-2"><br>
                        @error('position_student')
                            <div style='color:red'>{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                {{-- Parte Proyecto --}}
                <div class="my-4">
                    <h1 class="font-roboto text-xl font-semibold mt-4">Datos del anteproyecto</h1>
                </div>
                <div class="Linea separadora bg-[#000000] h-[2px] mb-2 w-[98%] mr-4"></div>
                <div class="w-[97%]">
                    <h2 class="font-roboto mb-1 font-medium">Nombre del anteproyecto:</h2>
                    {{-- Introduzca el nombre del anteproyecto --}}
                    <input type="text" name="name_proyect" placeholder="Sistema de Gestión de Biblioteca Virtual"
                        value="{{ old('name_proyect') }}" required
                        class="w-full border-lightGray border-2 px-4 py-3 rounded-md p-2"><br>
                    @error('name_proyect')
                        <div style='color:red'>{{ $message }}</div>
                    @enderror
                </div>
                <div class="w-[97%]">
                    {{-- Define el objetivo general del anteproyecto --}}
                    <h2 class="font-roboto mb-1 font-medium">Objetivo General:</h2>
                    <textarea name="objetivo_general" rows="8"
                        placeholder="Desarrollar un sistema de gestión de biblioteca virtual que permita a usuarios acceder, buscar, prestar y devolver libros de manera eficiente y automatizada, optimizando así los procesos de gestión de la biblioteca"
                        required class="w-full border-lightGray border-2 px-4 py-3 rounded-md p-2">{{ old('objetivo_general') }}</textarea><br>
                    @error('objetivo_general')
                        <div style='color:red'>{{ $message }}</div>
                    @enderror
                </div>
                <div class="w-[97%]">
                    <h2 class="font-roboto mb-1 font-medium">Planteamiento del problema:</h2>
                    {{-- Exponen los aspectos, elementos y relaciones del problema de tu proyecto. --}}
                    <textarea name="planteamiento" rows="8"
                        placeholder="Actualmente, la biblioteca de la institución carece de un sistema automatizado para la gestión de préstamos y devoluciones de libros. Los procesos se realizan de manera manual, lo que ocasiona demoras, pérdida de información y dificultades en el seguimiento de los libros prestados. Esto afecta la eficiencia del servicio ofrecido a los usuarios y genera una experiencia desfavorable en la utilización de los recursos bibliográficos."
                        required class="w-full border-lightGray border-2 px-4 py-3 rounded-md p-2">{{ old('planteamiento') }}</textarea><br>
                    @error('planteamiento')
                        <div style='color:red'>{{ $message }}</div>
                    @enderror
                </div>
                <div class="w-[97%]">
                    <h2 class="font-roboto mb-1 font-medium">Justificación:</h2>
                    {{-- Escribe tu justificación, debe manifestarse de manera clara y precisa del por qué y para qué se va llevar a cabo el estudio. Incluye causas y propósitos que motivan la investigación. Contesta las preguntas: ¿Cuáles son los beneficios que este trabajo proporcionará? ¿Quiénes serán los beneficiados? ¿Cuál es su utilidad? --}}
                    <textarea name="Justificacion" rows="8"
                        placeholder="La implementación de un sistema de gestión de biblioteca virtual permitirá agilizar los procesos de préstamo y devolución de libros, mejorar la experiencia del usuario al proporcionar un acceso más rápido y eficiente a los recursos bibliográficos, así como facilitar el seguimiento y control de los materiales prestados. Además, contribuirá a la modernización de la biblioteca, posicionando a la institución a la vanguardia en tecnología aplicada a la gestión de información."
                        required class="w-full border-lightGray border-2 px-4 py-3 rounded-md p-2">{{ old('Justificacion') }}</textarea>
                    @error('Justificacion')
                        <div style='color:red'>{{ $message }}</div>
                    @enderror
                </div>
                <div class="w-[97%]">
                    <h2 class="font-roboto mb-4 m font-medium">Actividades a realizar:</h2>
                    {{-- Enlista las actividades que vas a llevar a cabo de manera ordenada. --}}
                    <textarea name="activities" rows="16"
                        placeholder=
                        "1. Investigación y análisis de requisitos del sistema. 
2. Diseño de la arquitectura del sistema y la interfaz de usuario. 
3. Desarrollo de la base de datos para el almacenamiento de información de libros y usuarios.
4. Implementación de las funcionalidades principales del sistema, incluyendo la búsqueda, préstamo y devolución de libros.
5. Pruebas unitarias y de integración para garantizar el correcto funcionamiento del sistema.
6. Despliegue del sistema en un entorno de producción y capacitación del personal de la biblioteca en su uso.
7. Evaluación del sistema por parte de los usuarios y ajustes según retroalimentación recibida.
8. Documentación completa del sistema para futuras referencias y mantenimiento."
                        required class="w-full border-lightGray border-2 px-4 py-3 rounded-md p-2">{{ old('activities') }}</textarea><br>
                    @error('activities')
                        <div style='color:red'>{{ $message }}</div>
                    @enderror
                </div>
                <div class="my-4 mr-4 gap-4 flex justify-end">
                    <button class="bg-primaryColor text-white text-md font-roboto rounded-lg h-auto p-3">
                        Guardar
                    </button>
                    <a href="{{ url('anteproyecto') }}"
                        class="bg-[#EEF4FB] text-primaryColor text-md font-roboto rounded-lg h-auto p-3">
                        Cerrar
                    </a>
                </div>
            </form>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const openModalButton = document.getElementById('openModalButton');
            const modal = document.getElementById('myModal');
            const closeModalButton = document.getElementById('closeModalButton');
            const submitButton = document.querySelector('#myModal button[type="submit"]');
            const selectedIdsInput = document.getElementById('selectedIds');
            let selectedIds = [];

            function openModal() {
                modal.classList.remove('hidden');
            }

            function closeModal() {
                modal.classList.add('hidden');
                // Limpiar los IDs seleccionados al cerrar el modal
                selectedIds = [];
                selectedIdsInput.value = '';
            }

            function updateSelectedIds() {
                selectedIds = [];
                document.querySelectorAll('.internCheckbox:checked').forEach(function(checkbox) {
                    selectedIds.push(checkbox.dataset.id);
                });
                selectedIdsInput.value = selectedIds.join(',');
                console.log(selectedIds); // Imprimir los IDs seleccionados en la consola
            }

            openModalButton.addEventListener('click', openModal);
            closeModalButton.addEventListener('click', closeModal);

            submitButton.addEventListener('click', function(event) {
                // Prevenir el envío del formulario por defecto
                event.preventDefault();
                // Actualizar los IDs seleccionados antes de enviar el formulario
                updateSelectedIds();
                // Mostrar alerta de SweetAlert
                Swal.fire({
                    title: '¡Datos guardados!',
                    text: 'Los IDs seleccionados se han guardado correctamente.',
                    icon: 'success',
                    confirmButtonText: 'Aceptar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Cerrar el modal después de confirmar la alerta
                        closeModal();
                    }
                });
            });

            // Filtrar resultados según el término de búsqueda
            const searchInput = document.getElementById('searchInput');
            const searchResults = document.getElementById('searchResults').querySelectorAll('.result');

            searchInput.addEventListener('input', function() {
                const searchTerm = searchInput.value.trim().toLowerCase();

                searchResults.forEach(function(result) {
                    const name = result.querySelector('.name').textContent.toLowerCase();
                    const identifier = result.querySelector('.identifier').textContent
                        .toLowerCase();

                    if (name.includes(searchTerm) || identifier.includes(searchTerm)) {
                        result.style.display = 'block';
                    } else {
                        result.style.display = 'none';
                    }
                });
            });
        });
    </script>

    </div>
@endsection
