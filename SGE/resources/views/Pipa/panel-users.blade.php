@extends('templates.administratorTemplate')
@section('titulo', 'Panel de Usuarios')
@section('contenido')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<main class="min-h-screen h-full flex flex-col">
    <div class="border-b border-gray-200 mt-5 pb-2 mx-auto w-11/12 md:flex md:items-center md:justify-between">
        <h1 class="font-bold font-montserrat text-xl mb-2 text-center md:text-left">Lista de usuarios</h1>
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
            <a href="/panel-users/create"
                class="hidden md:block bg-green text-lg py-2 px-4 rounded-md text-white md:ml-4">Agregar nuevo
                usuario</a>
        </div>
        <div class="flex justify-between md:hidden mt-2 mx-auto">
            <div class="flex">
                <button class="bg-green text-lg py-2 px-4 rounded-md text-white mr-2">▲</button>
                <button class="bg-green text-lg py-2 px-4 rounded-md text-white">▼</button>
            </div>
            <a href="/panel-users/create" class="bg-green text-lg py-2 px-4 rounded-md text-white ml-2">Agregar nuevo
                usuario</a>
        </div>
    </div>
    <div class="mt-6 w-11/12 mx-auto flex items-center justify-between">
        <div class="lg:hidden w-full mb-5">
            <div class="grid md:grid-cols-2 gap-4 w-full">
                @foreach ($users as $user)
                <div class="bg-white rounded-lg shadow-md p-4 drop-shadow-2xl">
                    <h2 class="text-lg font-bold">{{ $user->name }} {{ $user->last_name }}</h2>
                    <p class="text-sm text-gray-500">Correo: {{ $user->email }}</p>
                    <p class="text-sm text-gray-500">Rol: {{ $user->role->title }}</p>
                    {{-- <p class="text-sm text-gray-500">Rol: {{ $user->rol_id }}</p> --}}
                    <p class="text-sm text-gray-500">Academia: {{ $user->careerAcademy->name }}</p>
                    {{-- <p class="text-sm text-gray-500">Academia: {{ $user->career_academy_id }}</p> --}}
                    <div class="flex justify-end mt-4">
                        <img src="/img/logos/pencil.svg" alt="Edit" class="cursor-pointer">
                        <img src="/img/logos/trash.svg" alt="Delete" class="ml-2 cursor-pointer">
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="hidden lg:block w-full">
            <table class="text-center w-full">
                <tr>
                    <th class="text-[#ACACAC] font-roboto text-xs">Nombre</th>
                    <th class="text-[#ACACAC] font-roboto text-xs">Apellidos</th>
                    <th class="text-[#ACACAC] font-roboto text-xs">Correo</th>
                    <th class="text-[#ACACAC] font-roboto text-xs">Rol</th>
                    <th class="text-[#ACACAC] font-roboto text-xs">Nomina</th>
                    <th class="text-[#ACACAC] font-roboto text-xs">Especialidad</th>
                    <th class="text-[#ACACAC] font-roboto text-xs"></th>
                    <th class="text-[#ACACAC] font-roboto text-xs"></th>
                </tr>
                @foreach ($users as $user)
                <tr>
                    <td class="font-roboto font-bold py-5">{{ $user->name }}</td>
                    <td class="font-roboto font-bold py-5">{{ $user->last_name }}</td>
                    <td class="font-roboto font-bold py-5">{{ $user->email }}</td>
                    <td class="font-roboto font-bold py-5">{{ $user->role->title }}</td>
                    {{-- <td class="font-roboto font-bold py-5">{{ $user->rol_id }}</td> --}}
                    <td class="font-roboto font-bold py-5">{{ $user->identifier }}</td>
                    {{-- <td class="font-roboto font-bold py-5">{{ $user->career_academy_id->career->name}}</td> --}}
                    <td class="font-roboto font-bold py-5">{{ $user->career_academy_id}}</td>
                    <td class="font-roboto font-bold py-5 cursor-pointer">
                        <a href="{{ route('panel-users.edit', $user->id) }}">
                            <img src="/img/logos/pencil.svg">
                        </a>
                    </td>
                    <td class="font-roboto font-bold py-5 cursor-pointer" onclick="confirmDelete('{{ $user->name }} {{ $user->last_name }}', '{{ $user->id }}')">
                        <form id="deleteForm{{ $user->id }}" action="{{ route('panel-users.destroy', $user->id) }}" method="POST">
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
