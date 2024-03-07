@extends('templates.administratorTemplate')
@section('titulo', 'Lista de Roles')
@section('contenido')
<main class="min-h-screen h-full flex flex-col">
    <div class="border-b border-gray-200 mt-5 pb-2 mx-auto w-11/12 md:flex md:items-center md:justify-between">
        <h1 class="font-bold font-montserrat text-xl mb-2 text-center md:text-left">Lista de roles</h1>
        <div class="flex items-center flex-row justify-end">
            <div class="flex-1 md:mr-2">
                <div class="flex justify-between border border-primaryColor items-center rounded-xl py-2 px-4">
                    <input id="search" placeholder="Buscador" type="text"
                        class="placeholder-primaryColor focus:outline-none font-montserrat py-1 px-2 justify-start">
                    <img class="w-6 h-6 mx-2 justify-end" src="/img/logos/buscar.svg">
                </div>
            </div>
            <div class="hidden md:flex md:flex-col  md:items-center md:mx-3">
                <button class="bg-green text-base py-1 px-3 mb-1 rounded-md text-white">▲</button>
                <button class="bg-green text-base py-1 px-3 rounded-md text-white">▼</button>
            </div>
            <a href="/panel-roles/create"
                class="hidden md:block bg-green text-lg py-2 px-4 rounded-md text-white md:ml-4">Agregar nuevo
                rol</a>
        </div>
        <div class="flex justify-between md:hidden mt-2 mx-auto">
            <div class="flex">
                <button class="bg-green text-lg py-2 px-4 rounded-md text-white mr-2">▲</button>
                <button class="bg-green text-lg py-2 px-4 rounded-md text-white">▼</button>
            </div>
            <a href="/panel-roles/create" class="bg-green text-lg py-2 px-4 rounded-md text-white ml-2">Agregar nuevo
                rol</a>
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
                                @php
                                    $decodedPermissions = json_decode($role->permissions, true);
                                @endphp
                                @foreach($decodedPermissions as $permission => $value)
                                    @if($value)
                                        <li>{{ $permission }}</li>
                                    @endif
                                @endforeach
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
                    <th class="text-[#ACACAC] font-roboto text-xs"></th>
                    <th class="text-[#ACACAC] font-roboto text-xs"></th>
                </tr>
                @foreach ($roles as $role)
                <tr>
                    <td class="font-roboto font-bold py-5">{{ $role->title }}</td>
                    <td class="font-roboto font-bold py-5">
                        @php
                            $decodedPermissions = json_decode($role->permissions, true);
                        @endphp
                
                        @foreach($decodedPermissions as $permission => $value)
                            @if($value)
                                {{ $permission }}<br>
                            @endif
                        @endforeach
                    </td>
                    <td class="font-roboto font-bold py-5"><a href="{{ route('panel-roles.edit', $role->id) }}"><img src="/img/logos/pencil.svg" alt="Edit"></a></td>
                    <td class="font-roboto font-bold py-5">
                        <form action="{{ route('panel-roles.destroy', $role->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"><img src="/img/logos/trash.svg" alt="Delete"></button>
                        </form>
                    </td>
                </tr>
                @endforeach
                
            </table>
        </div>
    </div>
</main>

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


@endsection
