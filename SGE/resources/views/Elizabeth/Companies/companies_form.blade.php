@extends('templates.administratorTemplate')
@section('contenido')
<div class="w-full h-screen flex justify-center items-center bg-white">
    <form action="{{url('panel-empresas.store')}}" method="POST" class="flex flex-col font-montserrat mx-30 space-y-5 lg:w-[40vw]  sm:w-[90vw]">
        <div class="w-full h-fit flex justify-center mt-4">
            <h3 class="text-3xl font-bold">Añadir Empresa</h3>
            @csrf
        </div>
        <div class="w-full h-fit flex flex-col space-y-2">
            <div class="w-full space-y-2">
                <p class="text-sm">Nombre de la empresa</p>
                <input type="text" name="" value="{{ old('') }}" class="text-sm  w-full rounded-md border-lightGray border px-[2%] py-[1%]" placeholder="Nombre">
                @error('')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="w-full space-y-2">
                <p class="text-sm">Correo Electrónico</p>
                <input type="text" name="" value="{{old('')}}" class="text-sm  w-full rounded-md border-lightGray border  px-[2%] py-[1%]" placeholder="Apellidos">
                @error('')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="w-full space-y-2">
                <p class="text-sm space-y-2">Celular </p>
                <input type="text" name="" value="{{old('')}}" class="text-sm  w-full rounded-md border-lightGray border px-[2%] py-[1%]" placeholder="Correo">
                @error('')
                <p class="text-[#ff0000] text-sm">
                    {{ $message }}
                </p>
                @enderror
            </div>
            <div class="w-full space-y-2">
                <p class="text-sm">Fecha de registro</p>
                <input type="text" name="" value="{{old('')}}" class="text-sm  w-full rounded-md border-lightGray border px-[2%] py-[1%]" placeholder="Rol">
                @error('')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="w-full space-y-2">
                <p class="text-sm">Dirección </p>
                <input type="text" name="" value="{{old('')}}" class="text-sm  w-full rounded-md border-lightGray border px-[2%] py-[1%]" placeholder="Nomina">
                @error('')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="w-full space-y-2">
                <p class="text-sm">RFC</p>
                <input type="text" name="" value="{{old('')}}" class="text-sm  w-full rounded-md border-lightGray border px-[2%] py-[1%]" placeholder="Especialidad">
                @error('')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="w-full space-y-2">
                <p class="text-sm">Area de especialización</p>
                <input type="text" name="" value="{{old('')}}" class="text-sm  w-full rounded-md border-lightGray border  px-[4%]  sm:py-[1%]" placeholder="Area">
                @error('')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
        </div>
        <button type="submit" class="p-[3%] bg-primaryColor lg:w-[40vw] rounded-md text-white">Añadir usuario</button>
    </form>
</div>
@endsection('contenido')