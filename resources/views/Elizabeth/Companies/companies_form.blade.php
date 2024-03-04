@extends('templates.administratorTemplate')
@section('contenido')
<div class="w-full h-screen flex justify-center items-center bg-white">
    <form action="{{url('panel-empresas.store')}}" method="POST" class="flex flex-col font-montserrat mx-10 space-y-5 w-[500px]">
        <div class="w-full h-fit flex justify-center mt-4">
            <h1 class="text-3xl font-bold">Añadir Empresa</h1>
            @csrf
        </div>
        <div class="w-full h-fit flex flex-col space-y-2">
            <div class="w-full space-y-2">
                <p class="text-sm">Nombre de la empresa</p>
                <input type="text" name="" value="{{ old('') }}" class="text-sm  w-full rounded-md border-lightGray border-2 px-4 py-3" placeholder="Nombre">
                @error('')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="w-full space-y-2">
                <p class="text-sm">Correo Electrónico</p>
                <input type="text" name="" value="{{old('')}}" class="text-sm  w-full rounded-md border-lightGray border-2 px-4 py-3" placeholder="Apellidos">
                @error('')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="w-full space-y-2">
                <p class="text-sm space-y-2">Celular </p>
                <input type="text" name="" value="{{old('')}}" class="text-sm  w-full rounded-md border-lightGray border-2 px-4 py-3" placeholder="Correo">
                @error('')
                <p class="text-[#ff0000] text-sm">
                    {{ $message }}
                </p>
                @enderror
            </div>
            <div class="w-full space-y-2">
                <p class="text-sm">Fecha de registro</p>
                <input type="text" name="" value="{{old('')}}" class="text-sm  w-full rounded-md border-lightGray border-2 px-4 py-3" placeholder="Rol">
                @error('')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="w-full space-y-2">
                <p class="text-sm">Dirección </p>
                <input type="text" name="" value="{{old('')}}" class="text-sm  w-full rounded-md border-lightGray border-2 px-4 py-3" placeholder="Nomina">
                @error('')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="w-full space-y-2">
                <p class="text-sm">RFC</p>
                <input type="text" name="" value="{{old('')}}" class="text-sm  w-full rounded-md border-lightGray border-2 px-4 py-3" placeholder="Especialidad">
                @error('')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="w-full space-y-2">
                <p class="text-sm">Area de especialización</p>
                <input type="text" name="" value="{{old('')}}" class="text-sm  w-full rounded-md border-lightGray border-2 px-4 py-3" placeholder="Especialidad">
                @error('')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
        </div>
        <button type="submit" class="p-2 bg-primaryColor w-[md:500px] rounded-md text-white">Añadir usuario</button>
    </form>
</div>
@endsection('contenido')