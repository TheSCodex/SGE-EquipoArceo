@extends('templates/authTemplate')
@section('contenido')
<div class="w-full h-screen flex justify-center items-center bg-white">
    <form action="{{url('user')}}" method="POST" class="flex flex-col font-montserrat space-y-5 w-[500px]">
        <div class="w-full h-fit flex justify-start">
            <h1 class="text-3xl font-bold">Editar Registro</h1>
            @csrf
        </div>
        <div class="w-full h-fit flex flex-col space-y-2">
            <div class="w-full space-y-2">
                <p class="text-sm">Nombre</p>
                <input type="text" name="name_user" value="{{ old('name_user') }}" class="text-sm w-full rounded-md border-lightGray border-2 px-4 py-3" placeholder="Nombre">
                @error('name_user')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="w-full space-y-2">
                <p class="text-sm">Apellidos</p>
                <input type="text" name="lastname_user" value="{{old('lastname_user')}}" class="text-sm w-full rounded-md border-lightGray border-2 px-4 py-3" placeholder="Apellidos">
                @error('lastname_user')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="w-full space-y-2">
                <p class="text-sm space-y-2">Correo</p>
                <input type="text" name="email_user" value="{{old('email_user')}}" class="text-sm w-full rounded-md border-lightGray border-2 px-4 py-3" placeholder="Correo">
                @error('email_user')
                <p class="text-[#ff0000] text-sm">
                    {{ $message }}
                </p>
                @enderror
            </div>
            <div class="w-full space-y-2">
                <p class="text-sm">Rol</p>
                <input type="text" name="role_user" value="{{old('role_user')}}" class="text-sm w-full rounded-md border-lightGray border-2 px-4 py-3" placeholder="Rol">
                @error('role_user')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="w-full space-y-2">
                <p class="text-sm">Nomina</p>
                <input type="text" name="id_user" value="{{old('id_user')}}" class="text-sm w-full rounded-md border-lightGray border-2 px-4 py-3" placeholder="Nomina">
                @error('id_user')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="w-full space-y-2">
                <p class="text-sm">Especialidad</p>
                <input type="text" name="field_user" value="{{old('field_user')}}" class="text-sm w-full rounded-md border-lightGray border-2 px-4 py-3" placeholder="Especialidad">
                @error('field_user')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
        </div>
        <button type="submit" class="p-2 bg-primaryColor w-[500px] rounded-md text-white">Añadir usuario</button>
    </form>
</div>
@endsection('contenido')