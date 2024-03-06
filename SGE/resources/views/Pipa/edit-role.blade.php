@extends('templates.administratorTemplate')
@section('contenido')
<div class="w-full h-screen flex justify-center items-center bg-white">
    <form action="{{ route('panel-roles.update', $role->id) }}" method="POST" class="flex flex-col font-montserrat space-y-5 w-[20rem] md:w-[30rem]">
        @csrf
        @method('PUT')
        <div class="w-full h-fit flex justify-start">
            <h1 class="text-3xl font-bold">Editar rol</h1>
        </div>
        <div class="w-full h-fit flex flex-col space-y-2">
            <div class="w-full space-y-2">
                <p class="text-sm">Nombre del rol</p>
                <input type="text" name="rol_name" value="{{ $role->title }}" class="text-sm w-full rounded-md border-lightGray border-2 px-4 py-3" placeholder="Nombre del rol">
                @error('rol_name')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="w-full space-y-2">
                <p class="text-sm">Permisos</p>
                <div class="flex flex-col space-y-2">
                    @php
                        $permissions = json_decode($role->permissions, true);
                    @endphp
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" name="permissions[permiso1]" value="true" class="text-sm rounded border-lightGray border-2 px-4 py-3" {{ isset($permissions['permiso1']) && $permissions['permiso1'] ? 'checked' : '' }}>
                        <label for="permiso1" class="text-sm">Permiso 1</label>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" name="permissions[permiso2]" value="true" class="text-sm rounded border-lightGray border-2 px-4 py-3" {{ isset($permissions['permiso2']) && $permissions['permiso2'] ? 'checked' : '' }}>
                        <label for="permiso2" class="text-sm">Permiso 2</label>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" name="permissions[permiso3]" value="true" class="text-sm rounded border-lightGray border-2 px-4 py-3" {{ isset($permissions['permiso3']) && $permissions['permiso3'] ? 'checked' : '' }}>
                        <label for="permiso3" class="text-sm">Permiso 3</label>
                    </div>
                </div>
                @error('permissions')
                    <p class="text-[#ff0000] text-sm">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <button type="submit" class="p-2 bg-primaryColor sm:w-[20rem] md:w-[30rem] rounded-md text-white">Actualizar rol</button>
    </form>
</div>
@endsection
