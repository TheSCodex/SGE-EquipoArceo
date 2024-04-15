@extends('templates/authTemplate')
@section('contenido')
<div class="w-full h-screen flex justify-center items-center bg-white p-4">
    <div class="overflow-y-auto max-h-screen"> <!-- Agregado -->
    <form action="{{ route('panel-roles.update', $role->id) }}" method="POST" class="flex flex-col font-montserrat space-y-5 w-full md:w-[40rem]">
        @csrf
        @method('PUT')
        <div class="w-full h-fit flex justify-start">
            <h1 class="text-3xl font-bold">Editar rol</h1>
        </div>
        <div class="w-full h-fit flex flex-col space-y-2">
            <div class="w-full space-y-2">
                <p class="text-sm">Nombre del rol</p>
                <div class="text-sm w-full rounded-md border-lightGray border-2 px-4 py-3">
                    {{ $role->title }}
                </div>
                @error('rol_name')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            
            <div class="w-full space-y-2">
                <p class="text-sm">Permisos</p>
                <div class="grid grid-cols-2 gap-4 overflow-y-scroll h-[250px]">
                    <div class="flex flex-col space-y-2"> <!-- Primera columna -->
                        @php
                            $permissionsArray = json_decode($role->permissions, true);
                        @endphp
                        @foreach($permissionsArray as $permission => $value)
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" name="permissions[{{ $permission }}]" value="true" class="text-sm rounded border-lightGray border-2 px-4 py-3" {{ $value ? 'checked' : '' }}>
                                <label for="{{ $permission }}" class="text-sm">{{ $permission }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                @error('permissions')
                    <p class="text-[#ff0000] text-sm">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <button type="submit" class="p-2 bg-primaryColor sm:w-[20rem] md:w-[40rem] rounded-md text-white">Actualizar rol</button>
    </form>
    </div>
</div>
@endsection
