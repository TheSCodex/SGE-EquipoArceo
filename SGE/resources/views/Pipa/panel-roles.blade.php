@extends('templates.administratorTemplate')
@section('titulo', 'Lista de Roles')
@section('contenido')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<section class="flex flex-col justify-center items-center  min-h-full flex-grow">
    <div class="sm:p-8 text-left w-[90%] mb-[2vh] sm:mb-0 ">
        <main class="min-h-screen h-full flex flex-col">

            <div class="sm:p-8 text-left w-[90%] mb-[2vh] sm:mb-0 ">
                <div class="border-b border-gray-200 mt-5 pb-2 mx-auto w-11/12 md:flex md:items-center md:justify-between">
                <h1 class="font-bold font-montserrat text-xl mb-2 text-center md:text-left">Lista de roles</h1>
                <div class="flex items-center flex-row justify-end">
                    <div>
                        <div class="hidden md:flex items-center relative" >
                            <input class="border-primaryColor placeholder-primaryColor border-b border rounded-md " type="search" placeholder="Buscar...." style="color: green;">
                        </div>
                    </div>
                    <a href="/panel-roles/create"
                        class="hidden md:block bg-primaryColor text-lg py-2 px-4 rounded-md text-white md:ml-4">Agregar nuevo rol
                    </a>
                </div>
                
                <div class="flex flex-col sm:flex-row justify-between md:hidden mt-2 mx-auto">
                    
                    <div>
                        <div class="flex items-center relative" >
                            <input class="border-primaryColor placeholder-primaryColor border-b border rounded-md w-full mb-2 sm:mb-0 " type="search" placeholder="Buscar...." style="color: green;">
                        </div>
                    </div>
                    <a href="/panel-roles/create"
                        class=" bg-primaryColor text-lg py-2 px-4 rounded-md text-white md:ml-4">Agregar nuevo rol
                    </a>

                </div>
            </div>









            <div class="mt-6 w-11/12 mx-auto flex items-center justify-between">
                <div class="lg:hidden w-full mb-5">
                    <div class="grid md:grid-cols-2 gap-4 w-full">
                        @foreach ($roles as $role)
                            <div class="bg-white rounded-lg shadow-md p-4 drop-shadow-2xl" onclick="togglePermissions('{{ $role->id }}')">
                                <h2 class="text-lg font-bold cursor-pointer">{{ $role->title }}</h2>
                                <div id="permissions_{{ $role->id }}" class="hidden">
                                    <h3 class="font-bold">Permisos:</h3>
                                    <ul>
                                        @isset($role->permissions)
                                            @php
                                                $decodedPermissions = json_decode($role->permissions, true);
                                            @endphp
                                            @foreach($decodedPermissions as $permission => $value)
                                                @if($value)
                                                    <li>{{ $permission }}</li>
                                                @endif
                                            @endforeach
                                        @else  
                                            Sin permisos
                                        @endisset
                                    </ul>
                                </div>
                                <div class="flex justify-end mt-4">
                                    <a href="{{ route('panel-roles.edit', $role->id) }}"><img src="/img/logos/pencil.svg" alt="Edit" class="cursor-pointer"></a>
                                    <form action="{{ route('panel-roles.destroy', $role->id) }}" method="POST" class="ml-2">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"><img src="/img/logos/trash.svg" alt="Delete" class="cursor-pointer"></button>
                                    </form>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
                <div class="hidden lg:block w-full">
                    <table class="text-center w-full">
                        <tr>
                            <th class="text-[#ACACAC] font-roboto text-xs">Nombre</th>
                            <th class="text-[#ACACAC] font-roboto text-xs">Permisos</th>
                            <th class="text-[#ACACAC] font-roboto text-xs">Editar</th>
                            <th class="text-[#ACACAC] font-roboto text-xs">Eliminar</th>
                        </tr>
                        @foreach ($roles as $role)
                        <tr>
                            <td class="font-roboto font-bold py-5">{{ $role->title }}</td>
                            <td class="font-roboto font-bold py-5">
                                @isset($role->permissions)
                                @php
                                    $decodedPermissions = json_decode($role->permissions, true);
                                @endphp
                                @foreach($decodedPermissions as $permission => $value)
                                    @if($value)
                                        <li>{{ $permission }}</li>
                                    @endif
                                @endforeach
                            @else  
                                Sin permisos
                            @endisset
                            </td>
                            <td class="font-roboto font-bold py-5 cursor-pointer ">
                                <a href="{{ route('panel-roles.edit', $role->id) }}" class="flex justify-center">
                                    <img src="/img/logos/pencil.svg">
                                </a>
                            </td>
                            <td class="font-roboto font-bold py-5 cursor-pointer" onclick="confirmDelete('{{ $role->title }}', '{{ $role->id }}')">
                                <form class="flex justify-center" id="deleteForm{{ $role->id }}" action="{{ route('panel-roles.destroy', $role->id) }}" method="POST">
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
        </main>
    </div>
</section>

<script>
    function togglePermissions(role) {
        var permissionsList = document.getElementById('permissions_' + role);
        permissionsList.classList.toggle('hidden');

        var permissionsRow = document.getElementById('permissions_row_' + role);
        permissionsRow.classList.toggle('hidden');
    }
</script>

<script>
    function togglePermissions(roleId) {
        var permissionsList = document.getElementById('permissions_' + roleId);
        permissionsList.classList.toggle('hidden');
    }
</script>

<script>
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
                document.getElementById('deleteForm' + userId).submit();
            }
        });
    }
</script>


@endsection
