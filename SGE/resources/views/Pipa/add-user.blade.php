@extends('templates.administratorTemplate')
@section('contenido')
<div class="w-full h-screen flex justify-center items-center bg-white">
    <form action="{{url('panel-users')}}" method="POST" class="flex flex-col font-montserrat space-y-5 w-[20rem] md:w-[30rem]">
        <div class="w-full h-fit flex justify-start">
            <h1 class="text-3xl font-bold">Añadir usuario</h1>
            @csrf
        </div>
        <div class="w-full h-fit flex flex-col space-y-2">
            <div class="w-full space-y-2">
                <p class="text-sm">Nombre</p>
                <input type="text" name="name" value="{{ old('name') }}" class="text-sm w-full rounded-md border-lightGray border-2 px-4 py-3" placeholder="Nombre">
                @error('name')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="w-full space-y-2">
                <p class="text-sm">Apellidos</p>
                <input type="text" name="last_name" value="{{old('last_name')}}" class="text-sm w-full rounded-md border-lightGray border-2 px-4 py-3" placeholder="Apellidos">
                @error('last_name')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="w-full space-y-2">
                <p class="text-sm space-y-2">Correo</p>
                <input type="text" name="email" value="{{old('email')}}" class="text-sm w-full rounded-md border-lightGray border-2 px-4 py-3" placeholder="Correo">
                @error('email')
                <p class="text-[#ff0000] text-sm">
                    {{ $message }}
                </p>
                @enderror
            </div>
            <div class="w-full space-y-2">
                <p class="text-sm">Rol</p>
                <input type="text" name="rol_id" value="{{old('rol_id')}}" class="text-sm w-full rounded-md border-lightGray border-2 px-4 py-3" placeholder="Rol">
                @error('rol_id')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="w-full space-y-2">
                <p class="text-sm">Nómina o matrícula</p>
                <input type="text" name="identifier" value="{{old('identifier')}}" class="text-sm w-full rounded-md border-lightGray border-2 px-4 py-3" placeholder="Nomina">
                @error('identifier')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="w-full space-y-2">
                <p class="text-sm">Especialidad</p>
                <input type="text" name="career_academy_id" value="{{old('career_academy_id')}}" class="text-sm w-full rounded-md border-lightGray border-2 px-4 py-3" placeholder="Especialidad">
                @error('career_academy_id')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
        </div>
        <button type="submit" class="p-2 bg-primaryColor sm:w-[20rem] md:w-[30rem] rounded-md text-white">Añadir usuario</button>
    </form>
</div>
@endsection('contenido')