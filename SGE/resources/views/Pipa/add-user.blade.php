@extends('templates/authTemplate')
@section('contenido')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="w-full md:px-[7em] md:mt-[2em] h-screen flex bg-white mb-10 md:mb-0 ">
    <form action="{{url('panel-users')}}" method="POST" 
    class="flex flex-col font-montserrat space-y-5 w-full mt-4 md:mt-0 md:w-full">
    <div class="w-full h-fit flex justify-center md:justify-start md:px-20">
        <h1 class="text-3xl font-bold">Añadir usuario</h1>
            @csrf
        </div>  

        @if(session('error'))
        <script>
            Swal.fire({
                title: 'Oops...',
                text: '{{ session("error") }}',
                icon: 'error'
            });
        </script>
        @endif
        
        <div class="w-full flex flex-col space-y-2">
            <div class="flex md:flex-row flex-col items-center md:items-start justify-around">
                <div id="nameDiv" class="space-y-2">
                    <p class="text-sm">Nombre</p>
                    <input type="text" name="name" value="{{ old('name') }}" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Nombre">
                    @error('name')
                        <p class="text-[#ff0000] text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class=" space-y-2" id="lastNameDiv">
                    <p class="text-sm">Apellidos</p>
                    <input type="text" name="last_name" value="{{old('last_name')}}" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Apellidos">
                    @error('last_name')
                        <p class="text-[#ff0000] text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>
            <div class="flex md:flex-row flex-col items-center md:items-start justify-around">
                <div id="emailDiv" class=" space-y-2">
                    <p class="text-sm space-y-2">Correo</p>
                    <input type="text" name="email" value="{{old('email')}}" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Correo">
                    @error('email')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div class=" space-y-2" id="rolDiv">
                    <p class="text-sm">Rol</p>
                    <select name="rol_id" id="rolSelect" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]">
                        <option disabled selected>Seleccionar un rol</option>
                        @foreach($roles as $role)
                            <option 
                            @if(old('rol_id') == $role->id) selected @endif
                            value="{{ $role->id }}">
                                @if ($role->title == "estudiante")
                                Estudiante
                                @elseif ($role->title == "asesorAcademico")
                                    Asesor Académico
                                @elseif ($role->title == "presidenteAcademia")
                                    Presidente de Academia
                                @elseif ($role->title == "director")
                                    Director
                                @elseif ($role->title == "asistenteDireccion")
                                    Asistente Dirección
                                @elseif ($role->title == "admin")
                                    Administrador
                                @else
                                    {{$role->title}}
                                @endif
                            </option>
                        @endforeach
                    </select>
                    @error('rol_id')
                        <p class="text-[#ff0000] text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>
            <div class="flex md:flex-row flex-col items-center md:items-start justify-around">
                <div class=" space-y-2">
                    <div class="flex space-x-2">
                        <p class="text-sm" id="textIdInput">Nómina o matrícula</p>
                        <div id="infoId" class="hidden">
                            <div class=" relative before:content-[attr(data-tip)] before:absolute before:px-3 before:py-2 before:-left-3 before:-top-2 before:w-max before:max-w-xs before:-translate-x-1/2 before:-translate-y-full before:bg-gray-700 before:text-white before:rounded-md before:opacity-0 before:transition-all after:absolute after:-left-1.5 after:-top-2 after:h-0 after:w-0 after:translate-x-1/2 after:border-8 after:border-t-gray-700 after:border-l-transparent after:border-b-transparent after:border-r-transparent after:opacity-0 after:transition-all hover:before:opacity-100 hover:after:opacity-100" data-tip="Ej: 22393171, 22393172, 22393173">
                                <img src="/img/Eliud/info.png" alt="Información" class="w-5 h-5 my-auto cursor-pointer" id="info-icon">
                            </div>
                        </div>
                    </div>
                    
                    <input id="idInput" type="text" name="identifier" value="{{old('identifier')}}" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Nomina">
                    @error('identifier')
                        <p class="text-[#ff0000] text-sm">
                            {{ $message }}
                        </p>
                    @enderror

                    <input id="idInputMassive" type="text" name="identifiers[]" class="hidden text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Matrículas de los estudiantes">
                    @error('identifiers')
                        <p class="text-[#ff0000] text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class=" space-y-2" id="careerDiv">
                    <p class="text-sm">Especialidad</p>
                    <select name="career_id" id="careerSelect" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" disabled>
                        <option disabled selected value="">Seleccionar una carrera</option>
                        <option disabled value="noNecesario">El rol seleccionado no requiere seleccionar una carrera</option>
                        @foreach($careers as $career)
                            <option 
                            @if(old('career_id') == $career->id) selected @endif
                            value="{{ $career->id }}">{{ $career->name }}</option>
                        @endforeach
                    </select>
                    @error('career_id')
                        <p class="text-[#ff0000] text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>
            <div class="flex md:flex-row flex-col items-center md:items-start justify-around">
                <div class=" space-y-2" id="groupDiv">
                    <p class="text-sm">Grupo</p>
                    <select name="group_id" id="groupSelect" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" disabled>
                        <option disabled selected value="">Seleccionar un grupo</option>
                        <option disabled value="noNecesario">El rol seleccionado no requiere seleccionar un grupo</option>
                        {{-- @foreach($groups as $group)
                            <option 
                            @if(old('group_id') == $group->id) selected @endif
                            value="{{ $group->id }}">{{ $group->name }}</option>
                        @endforeach --}}
                    </select>
                    @error('group_id')
                        <p class="text-[#ff0000] text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="space-y-2 invisible hidden" id="placeholder-addUsers">
                    <p class="text-sm"></p>
                    <input type="text" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]">

                </div>
                <div class="space-y-2 invisible" id="add-users-automatic">
                    <button type="button" class="w-[20em] md:w-[30em] bg-transparent  px-4 py-3 mt-6">
                        <span class="text-primaryColor underline" id="addUsersAutomaticLink">Añadir usuarios masivamente</span>
                    </button>
                </div>
                
            </div>
            
            <button id="buttonSubmitNormal" type="submit" class="p-2 self-center bg-primaryColor w-[17.5em] md:w-[30rem] rounded-md text-white hover:bg-darkgreen">Añadir usuario</button>
            <button id="buttonSubmitMassiveMode" type="submit" class=" hidden p-2 self-center bg-primaryColor w-[17.5em] md:w-[30rem] rounded-md text-white hover:bg-darkgreen" name="modo" value="masivo">Añadir usuarios</button>

    </form>
</div>

{{-- para filtrar grupos --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    const rolSelect = document.getElementById('rolSelect');
    const careerSelect = document.getElementById('careerSelect');
    const groupSelect = document.getElementById('groupSelect');
    const groupsByCareer = {!! json_encode($groupsByCareer) !!};
    const selectedRoleId = rolSelect.value;
    const selectedCareerId = careerSelect.value;
    const placeholderAddUsers = document.getElementById('placeholder-addUsers');
    const addUsersAutomatic = document.getElementById('add-users-automatic');
    const idInput = document.getElementById('idInput');
    const careerDiv = document.getElementById('careerDiv');
    const groupDiv = document.getElementById('groupDiv');
    const addUsersAutomaticLink = document.getElementById('addUsersAutomaticLink');
    const infoId = document.getElementById('infoId');
    const textIdInput = document.getElementById('textIdInput');
    const buttonSubmitNormal = document.getElementById('buttonSubmitNormal');
    const buttonSubmitMassiveMode = document.getElementById('buttonSubmitMassiveMode');
    const idInputMassive = document.getElementById('idInputMassive');
    const nameDiv = document.getElementById('nameDiv');
    const emailDiv = document.getElementById('emailDiv');
    const rolDiv = document.getElementById('rolDiv');
    const lastNameDiv = document.getElementById('lastNameDiv')

        if(selectedRoleId === "1") {
                groupSelect.disabled = false; // Deshabilitar la selección de carrera
                careerSelect.disabled = false; // Deshabilitar la selección de carrera
        }

        if(selectedRoleId === "2") {
                careerSelect.disabled = false; // Deshabilitar la selección de carrera
        }

        if (selectedRoleId === "1" && selectedCareerId && groupsByCareer[selectedCareerId] && groupsByCareer[selectedCareerId].length > 0) {
            groupSelect.innerHTML = '<option disabled value="">Seleccionar un grupo</option>'; // Cambiar el contenido del input
    
            groupsByCareer[selectedCareerId].forEach(group => {
                const option = document.createElement('option');
                option.value = group.id;
                option.textContent = group.name;    
                option.selected = group.id === {{ $user->interns?->group->id ?? 'null' }}; // Seleccionar el grupo actual del usuario si coincide con la lista filtrada
                groupSelect.appendChild(option);
            });        
            toggleGroupSelection(true, true); // Habilitar selección de grupo con mensaje si es estudiante
        } else if (selectedRoleId === "1" && selectedCareerId && (!groupsByCareer[selectedCareerId] || groupsByCareer[selectedCareerId].length === 0)) {
            // Si no hay grupos disponibles para la carrera seleccionada
            groupSelect.innerHTML = '<option value="">No hay grupos disponibles para esta carrera</option>'; // Cambiar el contenido del input
            toggleGroupSelection(false, false); // Deshabilitar selección de grupo sin mensaje
        } else {
            groupSelect.innerHTML = '<option value="">El rol seleccionado no requiere seleccionar un grupo</option>'; // Cambiar el contenido del input
            toggleGroupSelection(false, false); // Si no se cumple la condición, deshabilitar selección de grupo sin mensaje
        }

    // Función para habilitar o deshabilitar la selección de grupo
    function toggleGroupSelection(enabled, isStudent) {
        groupSelect.disabled = !enabled;
        // groupSelect.innerHTML = ''; // Limpiar opciones anteriores
        if (!enabled && isStudent) {
            const placeholderOption = document.createElement('option');
            placeholderOption.value = 'noNecesario';
            // groupSelect.appendChild(placeholderOption);
        }
        
    }

    rolSelect.addEventListener('change', function() {
        const selectedRoleId = rolSelect.value;
        const isStudent = selectedRoleId === "1"; // Verificar si el rol es estudiante

        careerSelect.disabled = (selectedRoleId !== "1" && selectedRoleId !== "2"); // Habilitar/deshabilitar especialidad según el rol seleccionado
        toggleGroupSelection(false, isStudent); // Deshabilitar grupo hasta que se seleccione una especialidad

        // Limpiar selección de carrera y grupo al cambiar de rol
        careerSelect.value = '';
        groupSelect.value = '';

        // Si el rol es diferente a estudiante o asesor, no permite elegir una carrera o un grupo
        if(selectedRoleId !== "1" && selectedRoleId !== "2") {
            careerSelect.value = "noNecesario"; // Mostrar mensaje de aviso
            careerSelect.disabled = true; // Deshabilitar la selección de carrera
            toggleGroupSelection(false, false); // Deshabilitar la selección de grupo sin mensaje adicional
        }

        if(selectedRoleId !== "1") {
                groupSelect.innerHTML = '<option value="">El rol seleccionado no requiere seleccionar un grupo</option>'; // Cambiar el contenido del input
                groupSelect.disabled = true; // Deshabilitar la selección de carrera
                toggleGroupSelection(false, false); // Deshabilitar la selección de grupo sin mensaje adicional
            }else{
                groupSelect.innerHTML = '<option value="">Seleccionar un grupo</option>'; // Cambiar el contenido del input
            }
        
    });

    // Cuando se modifique el valor de la carrera se desencadenará este evento
    careerSelect.addEventListener('change', function() {
        const selectedRoleId = rolSelect.value;
        const selectedCareerId = careerSelect.value;
        groupSelect.innerHTML = '';


    if (selectedRoleId === "1" && selectedCareerId && groupsByCareer[selectedCareerId] && groupsByCareer[selectedCareerId].length > 0) {
        groupSelect.innerHTML = '<option disabled selected value="">Seleccionar un grupo</option>'; // Cambiar el contenido del input

        groupsByCareer[selectedCareerId].forEach(group => {
            const option = document.createElement('option');
            option.value = group.id;
            option.textContent = group.name;
            groupSelect.appendChild(option);
        });        
        toggleGroupSelection(true, true); // Habilitar selección de grupo con mensaje si es estudiante
    } else if (selectedRoleId === "1" && selectedCareerId && (!groupsByCareer[selectedCareerId] || groupsByCareer[selectedCareerId].length === 0)) {
        // Si no hay grupos disponibles para la carrera seleccionada
        groupSelect.innerHTML = '<option value="">No hay grupos disponibles para esta carrera</option>'; // Cambiar el contenido del input
        toggleGroupSelection(false, false); // Deshabilitar selección de grupo sin mensaje
    } else {
        groupSelect.innerHTML = '<option value="">El rol seleccionado no requiere seleccionar un grupo</option>'; // Cambiar el contenido del input
        toggleGroupSelection(false, false); // Si no se cumple la condición, deshabilitar selección de grupo sin mensaje
    }

        });

    // Función para habilitar el link de añadir usuarios masivamente
    rolSelect.addEventListener('change', function(){
        const selectedRoleId = rolSelect.value;
        const isStudent = selectedRoleId === "1"; // Verificar si el rol es estudiante

        if (isStudent) {
            addUsersAutomatic.classList.remove('invisible', 'hidden'); // Habilitar el botón para añadir usuarios masivamente
            placeholderAddUsers.classList.add('invisible');
        } else {
            addUsersAutomatic.classList.add('invisible');
            placeholderAddUsers.classList.remove('invisible');
        }
    });

    // Para mostrar el input especial de las matrículas
    addUsersAutomatic.addEventListener('click', function(){
        if (!careerDiv.classList.contains('hidden') && !groupDiv.classList.contains('hidden') && infoId.classList.contains('hidden') && !buttonSubmitNormal.classList.contains('hidden')){
            careerDiv.classList.add('hidden');
            groupDiv.classList.add('hidden');
            infoId.classList.remove('hidden');
            addUsersAutomaticLink.textContent = 'Añadir estudiantes manualmente';
            textIdInput.textContent = 'Inserte las matrículas de los estudiantes';
            buttonSubmitNormal.classList.add('hidden');
            buttonSubmitMassiveMode.classList.remove('hidden');
            idInput.classList.add('hidden');
            idInputMassive.classList.remove('hidden');
            nameDiv.classList.add('hidden');
            emailDiv.classList.add('hidden');
            rolDiv.classList.add('hidden');
            lastNameDiv.classList.add('hidden')
        } else {
            careerDiv.classList.remove('hidden');
            groupDiv.classList.remove('hidden');
            infoId.classList.add('hidden');
            addUsersAutomaticLink.textContent = 'Añadir estudiantes masivamente';
            textIdInput.textContent = 'Nómina o matrícula';
            buttonSubmitNormal.classList.remove('hidden');
            buttonSubmitMassiveMode.classList.add('hidden');
            idInput.classList.remove('hidden');
            idInputMassive.classList.add('hidden');
            nameDiv.classList.remove('hidden');
            emailDiv.classList.remove('hidden');
            rolDiv.classList.remove('hidden');
            lastNameDiv.classList.remove('hidden')
        }
    })

    // Para la validación del Input de añadir estudiantes masivamente
    idInputMassive.addEventListener('input', function(){
        const value = idInputMassive.value.trim()
        const formatoValido = /^(\d{8}(, )?)*\d{8}$/.test(value);
        idInputMassive.style.borderColor = formatoValido ? 'green' : 'red';
        buttonSubmitMassiveMode.disabled = !formatoValido;
        if (formatoValido) {
            buttonSubmitMassiveMode.classList.add('bg-primaryColor');
            buttonSubmitMassiveMode.classList.remove('bg-gray-400');
        } else {
            buttonSubmitMassiveMode.classList.remove('bg-primaryColor');
            buttonSubmitMassiveMode.classList.add('bg-gray-400');
        }
        
    })

    });


</script>


@endsection('contenido')
