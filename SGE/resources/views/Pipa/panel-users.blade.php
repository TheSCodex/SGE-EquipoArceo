@extends('templates/authTemplate')
@section('titulo', 'Panel de Usuarios')
@section('contenido')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<section class="flex flex-col justify-center items-center  min-h-full flex-grow">
        <div class="sm:p-8 text-left w-[90%] mb-[2vh] sm:mb-0 ">
            <div class="border-b border-gray-200 mt-5 pb-2 mx-auto w-11/12 md:flex md:items-center md:justify-between">
            <h1 class="font-bold font-montserrat text-xl mb-2 text-center md:text-left">Lista de usuarios</h1>
            <div class="flex items-center flex-row justify-end">
                <div>
                    <div class="hidden md:flex items-center relative" >
                        <input  id='search' class="border-primaryColor placeholder-primaryColor border-b border rounded-md " type="search" placeholder="Buscar...." style="color: green;">
                    </div>
                </div>
                <a href="/panel-users/create"
                    class="hidden md:block bg-primaryColor text-lg py-2 px-4 rounded-md text-white md:ml-4">Agregar nuevo usuario
                </a>
            </div>
            
            <div class="flex flex-col sm:flex-row justify-between md:hidden mt-2 mx-auto">
                
                <div>
                    <div class="flex items-center relative" >
                        <input id='searchMovil' class="border-primaryColor placeholder-primaryColor border-b border rounded-md w-full mb-2 sm:mb-0 " type="search" placeholder="Buscar...." style="color: green;">
                    </div>
                </div>


                <a href="/panel-users/create"
                    class=" bg-primaryColor text-lg py-2 px-4 rounded-md text-white md:ml-4">Agregar nuevo usuario
                </a>
            </div>
        </div>

    <div class="mt-6 w-11/12 mx-auto flex items-center justify-between">

        <div class="lg:hidden w-full mb-5">
            <div class="grid md:grid-cols-2 gap-4 w-full">
                @foreach ($users as $user)
                <div class="bg-white rounded-lg shadow-md p-4 drop-shadow-2xl">
                    <h2 class="text-lg font-bold">{{ $user->name }} {{ $user->last_name }}</h2>
                    <p class="text-sm text-gray-500">Correo: {{ $user->email }}</p>
                    <p class="text-sm text-gray-500">Rol: 
                    @if ($user->role->title == "estudiante")
                        Estudiante
                    @elseif ($user->role->title == "asesorAcademico")
                        Asesor Académico
                    @elseif ($user->role->title == "presidenteAcademia")
                        Presidente de Academia
                    @elseif ($user->role->title == "director")
                        Director
                    @elseif ($user->role->title == "asistenteDireccion")
                        Asistente Dirección
                    @elseif ($user->role->title == "admin")
                        Administrador
                    @else
                        {{$user->role->title}}
                    @endif</p>
                    <div class="flex justify-end mt-4 space-x-2">
                        <td>                        
                            <a href="{{route('panel-users.show', $user->id)}}" class="bg-primaryColor hover:bg-darkBlue ease-in duration-100 py-2 px-4 text-white rounded-xl font-semibold">Ver detalles</a>
                        </td>
                        <td class="font-roboto font-bold py-5 cursor-pointer ">
                            <a href="{{ route('panel-users.edit', $user->id) }}" class="flex justify-center">
                                <img src="/img/logos/pencil.svg">
                            </a>
                        </td>
                        <td class="font-roboto font-bold py-5 cursor-pointer">
                            <form class="flex justify-start delete-form" data-user-name="{{ $user->name }} {{ $user->last_name }}" data-user-id="{{ $user->id }}" action="{{ route('panel-users.destroy', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <img src="/img/logos/trash.svg">
                            </form>
                        </td>
                    </div>
                </div>
                @endforeach
            </div>
        </div>


        <div class="hidden lg:block w-full">
            {{-- sweet alert para mostrar el error al mandar un correo --}}
            @if(session('error'))
            <script>
                Swal.fire({
                    title: 'Oops...',
                    text: '{{ session("error") }}',
                    icon: 'error'
                });
            </script>
            @endif
            {{-- sweet alert para indicar que el usuario se agregó :3 --}}
            @if(session('success'))
                <script>
                    Swal.fire({
                        title: '¡Éxito!',
                        text: '{{ session("success") }}',
                        icon: 'success'
                    });
                </script>
            @endif
            
            <table class="text-start w-full">
                <tr class="w-full">
                    <th class="text-[#ACACAC] font-roboto text-xs text-start pl-5">Nombre completo</th>
                    <th class="text-[#ACACAC] font-roboto text-xs text-start w-[30%]">Correo</th>
                    <th class="text-[#ACACAC] font-roboto text-xs text-start">Rol</th>
                    <th class="text-[#ACACAC] font-roboto text-xs">Identificador</th>
                    <th class="text-[#ACACAC] font-roboto text-xs ">Detalles</th>
                    <th class="text-[#ACACAC] font-roboto text-xs ">Editar</th>
                    <th class="text-[#ACACAC] font-roboto text-xs ">Eliminar</th>
                </tr>
                @foreach ($users as $user)
                <tr class="w-full transition duration-100 ease-in-out hover:bg-lightGray/20">
                    <td class="font-roboto font-bold py-5 pl-5">{{ $user->name }} {{ $user->last_name }}</td>
                    <td class="font-roboto font-bold py-5">{{ $user->email }}</td>
                    <td class="font-roboto font-bold py-5">
                        @if ($user->role->title == "estudiante")
                            Estudiante
                        @elseif ($user->role->title == "asesorAcademico")
                            Asesor Académico
                        @elseif ($user->role->title == "presidenteAcademia")
                            Presidente de Academia
                        @elseif ($user->role->title == "director")
                            Director
                        @elseif ($user->role->title == "asistenteDireccion")
                            Asistente Dirección
                        @elseif ($user->role->title == "admin")
                            Administrador
                        @else
                            {{$user->role->title}}
                        @endif
                    </td>
                    {{-- <td class="font-roboto font-bold py-5">{{ $user->rol_id }}</td> --}}
                    <td class="font-roboto font-bold py-5 text-center">{{ $user->identifier }}</td>
                    {{-- <td class="font-roboto font-bold py-5">
                        @isset($user->career_academy_id)
                            @php
                                $career = App\Models\Career::find($user->career_academy_id);
                            @endphp
                            @if($career)
                                {{ $career->name }}
                            @else
                                Sin especialidad
                            @endif
                        @else
                            Sin especialidad
                        @endisset
                    </td> --}}
                    <td class="font-roboto font-bold py-5 cursor-pointer">
                        <a href="{{ route('panel-users.show', $user->id )}}" class="flex justify-center">
                            <img src="/img/ojoGreen.svg" class="w-7">
                        </a>
                    </td>
                    <td class="font-roboto font-bold py-5 cursor-pointer ">
                        <a href="{{ route('panel-users.edit', $user->id) }}" class="flex justify-center">
                            <img src="/img/logos/pencil.svg">
                        </a>
                    </td>
                    <td class="font-roboto font-bold py-5 cursor-pointer" onclick="confirmDelete('{{ $user->name }} {{ $user->last_name }}', '{{ $user->id }}')">
                        <form class="flex justify-center" id="deleteForm{{ $user->id }}" action="{{ route('panel-users.destroy', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                                <img src="/img/logos/trash.svg">
                        </form>
                    </td>                    
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    <div id="no-users-message" class="hidden text-[#ACACAC] font-roboto text-center mt-6 ">No se encontraron usuarios.</div>

</div>
<div class="my-5 mx-auto">
    {{$users->links()}}
</div>
</section>

<script>
   
</script>

<script>
    // Esta función confirma la eliminación de un usuario
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
                // Envía el formulario de eliminación si se confirma
                document.getElementById('deleteForm' + userId).submit();
            }
        });
    }

  // Esta función realiza la búsqueda en la tabla cuando se modifica el contenido del campo de búsqueda
  function searchTable() {
        var searchText = document.getElementById("search").value.toLowerCase();
        var rows = document.querySelectorAll("table tr");
        var noUsersMessage = document.getElementById("no-users-message");
        var usersFound = false; // Variable para verificar si se encontraron usuarios

        for (var i = 1; i < rows.length; i++) {
            var row = rows[i];
            var found = false;
            for (var j = 0; j < row.cells.length; j++) {
                var cell = row.cells[j];
                if (cell.textContent.toLowerCase().indexOf(searchText) > -1) {
                    found = true;
                    usersFound = true; // Se encontró al menos un usuario
                    break;
                }
            }
            if (found) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        }

        // Mostrar el mensaje de no se encontraron usuarios si no se encontraron usuarios
        if (!usersFound) {
            noUsersMessage.classList.remove('hidden');
        } else {
            noUsersMessage.classList.add('hidden');
        }
    }

    // Llama a la función searchTable() cuando se modifica el contenido del campo de búsqueda
    document.getElementById("search").addEventListener("input", searchTable);





    // Obtiene todos los formularios de eliminación y agrega un manejador de eventos clic para mostrar el SweetAlert
    document.querySelectorAll('.delete-form').forEach(form => {
        form.addEventListener('click', function(event) {
            event.preventDefault(); // Evita que el formulario se envíe automáticamente

            var userName = this.dataset.userName;
            var userId = this.dataset.userId;

            // Muestra el SweetAlert para confirmar la eliminación
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
                    // Envía el formulario si se confirma la eliminación
                    document.getElementById('deleteForm' + userId).submit();
                }
            });
        });
    });
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

        // Mostrar el mensaje de no se encontraron usuarios si no se encontraron usuarios
        var noUsersMessage = document.getElementById("no-users-message");
        var usersFound = [...advisors].some(advisor => advisor.style.display !== "none");
        if (!usersFound) {
            noUsersMessage.classList.remove('hidden');
        } else {
            noUsersMessage.classList.add('hidden');
        }
    }

    document.getElementById("searchMovil").addEventListener("input", searchMobileTable);
</script>



@endsection