@extends('templates/authTemplate')
@section('titulo', 'Lista de Roles')
@section('contenido')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<section class="flex flex-col justify-start items-center  min-h-screen flex-grow">
    <div class="sm:p-8 text-left w-[90%] mb-[2vh] sm:mb-0 ">
        <div class="border-b border-gray-200 mt-5 pb-2 mx-auto w-11/12 md:flex md:items-center md:justify-between">
            <h1 class="font-bold font-montserrat text-xl mb-2 text-center md:text-left">Lista de roles</h1>
            <div class="flex items-center flex-row justify-end">
                <form action="{{ route('panel-roles.index') }}" method="GET" id="search-form">
                    <div class="hidden md:flex items-center relative">
                        <input name="query" id="search" class="border-primaryColor placeholder-primaryColor border-b border rounded-md" type="search" placeholder="Buscar...." style="color: green;">
                    </div>
                </div>
                {{-- <a href="/panel-roles/create"
                    class="hidden md:block bg-primaryColor text-lg py-2 px-4 rounded-md text-white md:ml-4">Agregar nuevo rol
                </a> --}}
            </div>
            
            <div class="flex flex-col sm:flex-row justify-between md:hidden mt-2 mx-auto">
                
                <div>
                    <div class="flex items-center relative" >
                        <input id='searchMovil' class="border-primaryColor placeholder-primaryColor border-b border rounded-md w-full mb-2 sm:mb-0 " type="search" placeholder="Buscar...." style="color: green;">
                    </div>
                </div>


                {{-- <a href="/panel-roles/create"
                    class=" bg-primaryColor text-lg py-2 px-4 rounded-md text-white md:ml-4">Agregar nuevo rol
                </a> --}}
            </div>

        </div>
        
        <div class="mt-6 w-11/12 mx-auto flex items-center justify-between">

            <div class="lg:hidden w-full mb-5">
                <div class="grid md:grid-cols-2 gap-4 w-full">
                    @foreach ($roles as $role)
                    <div class="bg-white rounded-lg shadow-md p-4 drop-shadow-2xl">
                        <h2 class="text-lg">Rol: 
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
                        @endif</h2>
                        <ul class="font-roboto py-2">
                            @php
                                $decodedPermissions = json_decode($role->permissions, true);
                            @endphp
                            @if ($decodedPermissions)
                                @foreach($decodedPermissions as $permission => $value)
                                    @if($value)
                                        <li class="text-gray-500">
                                            {{ $permission }}
                                        </li>
                                    @endif
                                @endforeach
                            @else
                                Sin permisos
                            @endif
                        </ul>
                        <div class="flex justify-end mt-4 space-x-2">
                            <td class="font-roboto py-5 cursor-pointer">
                                <a href="{{ route('panel-roles.edit', $role->id) }}" class="flex justify-center">
                                    <img src="/img/logos/pencil.svg">
                                </a>
                            </td>
                            <td class="font-roboto py-5 cursor-pointer">
                                {{-- Responsive --}}
                                <form class="flex justify-center delete-form" id="deleteForm{{ $role->id }}" action="{{ route('panel-roles.destroy', $role->id) }}" method="POST"  onclick="confirmDelete('{{ $role->title }}', '{{ $role->id }}')">
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
                <table class="text-start w-[80%] ml-32">
                    <tr>
                        <th class="text-[#ACACAC] font-roboto text-xs text-start pl-5">N°</th>
                        <th class="text-[#ACACAC] font-roboto text-xs text-start pl-5">Nombre</th>
                        <th class="text-[#ACACAC] font-roboto text-xs text-start">Permisos</th>
                        <th class="text-[#ACACAC] font-roboto text-xs px-5">Editar</th>
                        <th class="text-[#ACACAC] font-roboto text-xs">Eliminar</th>
                    </tr>
                    @foreach ($roles as $role)
                        @php
                            $counter = ($roles->currentPage() - 1) * $roles->perPage() + $loop->index + 1;
                        @endphp
                        <tr class="w-full transition duration-100 ease-in-out hover:bg-lightGray/20 border-b-gray-200 border-b-[0.5px]">
                            <td class="font-roboto py-5 cursor-pointer pl-5">{{ $counter }}</td>
                            <td class="font-roboto py-5 text-start pl-5">
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
                            </td>
                            <td class="font-roboto py-5 text-start select-none">
                                @php
                                    $decodedPermissions = json_decode($role->permissions, true);
                                @endphp
                                @if ($decodedPermissions)
                                    <div class="flex flex-wrap gap-1">
                                        @foreach($decodedPermissions as $permission => $value)
                                            @if($value)
                                                @php
                                                    $permissionFormatted = ucwords(str_replace('-', ' ', $permission)); // Primera letra mayúscula en cada palabra
                                                @endphp
                                                @if (strpos($permissionFormatted, 'Crear') !== false)
                                                    <span class="bg-primaryColor/50 px-2 py-1 rounded hover:opacity-90">{{ $permissionFormatted }}</span>
                                                @elseif (strpos($permissionFormatted, 'Leer') !== false)
                                                    <span class="bg-blue-300 px-2 py-1 rounded hover:opacity-90">{{ $permissionFormatted }}</span>
                                                @elseif (strpos($permissionFormatted, 'Editar') !== false)
                                                    <span class="bg-yellow-300 px-2 py-1 rounded hover:opacity-90">{{ $permissionFormatted }}</span>
                                                @elseif (strpos($permissionFormatted, 'Eliminar') !== false)
                                                    <span class="bg-red/40 px-2 py-1 rounded hover:opacity-90">{{ $permissionFormatted }}</span>
                                                @elseif (strpos($permissionFormatted, 'Comentar') !== false)
                                                    <span class="bg-violet-500/40 px-2 py-1 rounded hover:opacity-90">{{ $permissionFormatted }}</span>
                                                @elseif (strpos($permissionFormatted, 'Votar') !== false)
                                                    <span class="bg-amber-700/40 px-2 py-1 rounded hover:opacity-90">{{ $permissionFormatted }}</span>
                                                @elseif (strpos($permissionFormatted, 'Crud') !== false)
                                                    <span class="bg-pink-400/40 px-2 py-1 rounded hover:opacity-90">{{ $permissionFormatted }}</span>
                                                @elseif (strpos($permissionFormatted, 'Generar') !== false)
                                                    <span class="bg-primaryColor/50 px-2 py-1 rounded hover:opacity-90">{{ $permissionFormatted }}</span>
                                                @elseif (strpos($permissionFormatted, 'Gestionar') !== false)
                                                    <span class="bg-pink-400/40 px-2 py-1 rounded hover:opacity-90">{{ $permissionFormatted }}</span>
                                                @else
                                                    <span class="bg-gray-400/60 px-2 py-1 rounded hover:opacity-90">{{ $permissionFormatted }}</span>
                                                @endif
                                            @endif
                                        @endforeach
                                    </div>
                                @else
                                    Sin permisos
                                @endif
                            </td>
                            <td class="font-roboto font-bold py-5 cursor-pointer">
                                <a href="{{ route('panel-roles.edit', $role->id) }}" class="flex justify-center">
                                    <img src="/img/logos/pencil.svg">
                                </a>
                            </td>
                            <td class="font-roboto font-bold py-5 cursor-pointer"  onclick="confirmDelete('{{ $role->title }}', '{{ $role->id }}')">
                                <form class="flex justify-center" id="deleteForm{{ $role->id }}" action="{{ route('panel-roles.destroy', $role->id) }}" method="POST" onclick="confirmDelete('{{ $role->title }}', '{{ $role->id }}')">
                                    @csrf
                                    @method('DELETE')
                                    <img src="/img/logos/trash.svg" >
                                </form>

                                
                            </td>
                        </tr>
                    @endforeach

                </table>
                
            </div>
        </div>
        </div>
    </div>
    <div class="sm:p-8 text-left w-[90%] mb-[2vh] sm:mb-0 ">
        <div class="mt-6 w-11/12 mx-auto flex items-center justify-between">
            <div class="my-5 mx-auto md:w-full">
                {{$roles->links()}}
            </div>
        </div>
    </div>

</section>

<!-- Funciones JavaScript -->g
<script>
    function togglePermissions(roleId) {
        var permissionsList = document.getElementById('permissions_' + roleId);
        permissionsList.classList.toggle('hidden');
    }

    // function confirmDelete(userName, userId) {
    //     Swal.fire({
    //         title: '¿Estás seguro?',
    //         text: `Estás a punto de eliminar a ${userName}. Esta acción no se puede revertir.`,
    //         icon: 'warning',
    //         showCancelButton: true,
    //         confirmButtonColor: '#d33',
    //         cancelButtonColor: '#3085d6',
    //         confirmButtonText: 'Sí, eliminarlo'
    //     }).then((result) => {
    //         if (result.isConfirmed) {
    //             document.getElementById('deleteForm' + userId).submit();
    //         }
    //     });
    // }

    @if(session('error'))
        Swal.fire({
            title: 'Oops...',
            text: '{{ session("error") }}',
            icon: 'error'
        });
    @endif

    @if(session('success'))
        Swal.fire({
            title: '¡Éxito!',
            text: '{{ session("success") }}',
            icon: 'success'
        });
    @endif
</script>

<script>
    function searchRoles() {
        var query = document.getElementById('search').value;
        window.location.href = '{{ route("search.roles") }}?query=' + query;
    }
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
    // document.getElementById("search").addEventListener("input", searchTable);





    // // Obtiene todos los formularios de eliminación y agrega un manejador de eventos clic para mostrar el SweetAlert
    // document.querySelectorAll('.delete-form').forEach(form => {
    //     form.addEventListener('click', function(event) {
    //         event.preventDefault(); // Evita que el formulario se envíe automáticamente

    //         var userName = this.dataset.userName;
    //         var userId = this.dataset.userId;

    //         // Muestra el SweetAlert para confirmar la eliminación
    //         Swal.fire({
    //             title: '¿Estás seguro?',
    //             text: `Estás a punto de eliminar a ${userName}. Esta acción no se puede revertir.`,
    //             icon: 'warning',
    //             showCancelButton: true,
    //             confirmButtonColor: '#d33',
    //             cancelButtonColor: '#3085d6',
    //             confirmButtonText: 'Sí, eliminarlo'
    //         }).then((result) => {
    //             if (result.isConfirmed) {
    //                 // Envía el formulario si se confirma la eliminación
    //                 document.getElementById('deleteForm' + userId).submit();
    //             }
    //         });
    //     });
    // });
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
