@extends('templates.administratorTemplate')
@section('contenido')
<div class="w-full h-screen flex justify-center items-center bg-white">
    <form action="{{ url('panel-roles') }}" method="POST" class="flex flex-col font-montserrat space-y-5 w-[20rem] md:w-[30rem]">
        <div class="w-full h-fit flex justify-start">
            <h1 class="text-3xl font-bold">Añadir nuevo rol</h1>
            @csrf
        </div>
        <div class="w-full h-fit flex flex-col space-y-2">
            <div class="w-full space-y-2">
                <p class="text-sm">Nombre del rol</p>
                <input type="text" name="rol_name" value="{{ old('rol_name') }}" class="text-sm w-full rounded-md border-lightGray border-2 px-4 py-3" placeholder="Nombre del rol">
                @error('rol_name')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="w-full space-y-2">
                <p class="text-sm">Permisos</p>
                <div class="flex flex-col space-y-2">
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" name="permissions[permiso1]" value="true" class="text-sm rounded border-lightGray border-2 px-4 py-3" {{ isset($role->permissions['permiso1']) && $role->permissions['permiso1'] ? 'checked' : '' }}>
                        <label for="permiso1" class="text-sm">Permiso 1</label>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" name="permissions[permiso2]" value="true" class="text-sm rounded border-lightGray border-2 px-4 py-3" {{ isset($role->permissions['permiso2']) && $role->permissions['permiso2'] ? 'checked' : '' }}>
                        <label for="permiso2" class="text-sm">Permiso 2</label>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" name="permissions[permiso3]" value="true" class="text-sm rounded border-lightGray border-2 px-4 py-3" {{ isset($role->permissions['permiso3']) && $role->permissions['permiso3'] ? 'checked' : '' }}>
                        <label for="permiso3" class="text-sm">Permiso 3</label>
                    </div>
                </div>
                @error('permissions')
                    <p class="text-[#ff0000] text-sm">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <button type="submit" class="p-2 bg-primaryColor sm:w-[20rem] md:w-[30rem] rounded-md text-white">Añadir rol</button>
    </form>
</div>
@endsection
