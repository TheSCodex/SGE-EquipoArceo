@extends('templates.administratorTemplate')
@section('contenido')
<div class="w-full h-screen flex justify-center items-center bg-white">
    <form action="{{url('user')}}" method="POST" class="flex flex-col font-montserrat space-y-5 w-[50%]">
        <div class="w-full h-fit flex justify-start">
            <h1 class="text-3xl font-bold">Añadir carrera y division</h1>
            @csrf
        </div>
        <div class="w-full h-fit flex flex-col space-y-2">
            <div class="w-full space-y-2">
                <p class="text-sm">Carrera</p>
                <input type="text" name="name_user" value="{{ old('name_user') }}" class="text-sm w-full rounded-md border-lightGray border-2 px-[2%] py-[2%]" placeholder="Carrera">
                @error('name_user')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="w-full space-y-2">
                <p class="text-sm">Director</p>
                <input type="text" name="lastname_user" value="{{old('lastname_user')}}" class="text-sm w-full rounded-md border-lightGray border-2 px-[2%] py-[2%]" placeholder="Director">
                @error('lastname_user')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="w-full space-y-2">
                <p class="text-sm space-y-2">Division</p>
                <input type="text" name="email_user" value="{{old('email_user')}}" class="text-sm w-full rounded-md border-lightGray border-2 px-[2%] py-[2%]" placeholder="Division">
                @error('email_user')
                <p class="text-[#ff0000] text-sm">
                    {{ $message }}
                </p>
                @enderror
            </div>
            <div class="w-full space-y-2">
                <p class="text-sm">Nivel</p>
                <input type="text" name="role_user" value="{{old('role_user')}}" class="text-sm w-full rounded-md border-lightGray border-2 px-[2%] py-[2%]" placeholder="Nivel">
                @error('role_user')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="w-full space-y-2">
                <p class="text-sm">Clave</p>
                <input type="text" name="id_user" value="{{old('id_user')}}" class="text-sm w-full rounded-md border-lightGray border-2 px-[2%] py-[2%]" placeholder="Clave">
                @error('id_user')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
        </div>
        <button type="submit" class="sm:p-2 bg-primaryColor w-[100%] rounded-md text-white">Añadir carrera y division</button>
    </form>
</div>
@endsection('contenido')