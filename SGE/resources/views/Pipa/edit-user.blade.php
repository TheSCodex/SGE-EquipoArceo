@extends('templates.administratorTemplate')
@section('contenido')
<div class="w-full h-screen flex justify-center items-center bg-white">
    <form action="{{route('panel-users.update',$user -> id)}}" method="POST" class="flex flex-col font-montserrat space-y-5 w-[20rem] md:w-[30rem]">
        <div class="w-full h-fit flex justify-start">
            <h1 class="text-3xl font-bold">Editar usuario</h1>
            @csrf
            @method('put')
        </div>
        <div class="w-full h-fit flex flex-col space-y-2">
            <div class="w-full space-y-2">
                <p class="text-sm">Nombre</p>
                <input type="text" name="name_user" value="{{$user->name}}" class="text-sm w-full rounded-md border-lightGray border-2 px-4 py-3" placeholder="Nombre">
                @error('name_user')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="w-full space-y-2">
                <p class="text-sm">Apellidos</p>
                <input type="text" name="lastname_user" value="{{$user->last_name}}" class="text-sm w-full rounded-md border-lightGray border-2 px-4 py-3" placeholder="Apellidos">
                @error('lastname_user')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="w-full space-y-2">
                <p class="text-sm space-y-2">Correo</p>
                <input type="text" name="email_user" value="{{$user->email}}" class="text-sm w-full rounded-md border-lightGray border-2 px-4 py-3" placeholder="Correo">
                @error('email_user')
                <p class="text-[#ff0000] text-sm">
                    {{ $message }}
                </p>
                @enderror
            </div>
            <div class="w-full space-y-2">
                <p class="text-sm">Rol</p>
                {{-- <input type="text" name="role_user" value="{{$user->role->title}}" class="text-sm w-full rounded-md border-lightGray border-2 px-4 py-3" placeholder="Rol"> --}}
                <input type="text" name="role_user" value="{{$user->rol_id}}" class="text-sm w-full rounded-md border-lightGray border-2 px-4 py-3" placeholder="Rol">
                @error('role_user')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="w-full space-y-2">
                <p class="text-sm">Nomina</p>
                <input type="text" name="id_user" value="{{$user->identifier}}" class="text-sm w-full rounded-md border-lightGray border-2 px-4 py-3" placeholder="Nomina">
                @error('id_user')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="w-full space-y-2">
                <p class="text-sm">Especialidad</p>
                {{-- <input type="text" name="field_user" value="{{$user->careerAcademy->career->name}}" class="text-sm w-full rounded-md border-lightGray border-2 px-4 py-3" placeholder="Especialidad"> --}}
                <input type="text" name="field_user" value="{{$user->career_academy_id}}" class="text-sm w-full rounded-md border-lightGray border-2 px-4 py-3" placeholder="Especialidad">
                @error('field_user')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
        </div>
        <button type="submit" class="p-2 bg-primaryColor sm:w-[20rem] md:w-[30rem] rounded-md text-white">Editar usuario</button>
        {{-- <button class="p-2 bg-primaryColor sm:w-[20rem] md:w-[30rem] rounded-md text-white">Cancelar</button> --}}
    </form>
</div>
@endsection('contenido')