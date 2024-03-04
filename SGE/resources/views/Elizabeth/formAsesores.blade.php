@extends('templates.administratorTemplate')
@section('contenido')
<div class="w-full md:h-full xl:h-screen flex justify-center xl:items-center bg-white">
    <form action="{{url('panel-empresas.store')}}" method="POST" class="flex flex-col font-montserrat mx-10 space-y-5 lg:w-[40vw] sm:w-[60vw]">
        <div class="w-full h-fit flex justify-center mt-4">
            <h1 class="text-3xl font-bold">Añadir Asesores</h1>
            @csrf
        </div>
        <div class="w-full h-fit flex flex-col space-y-2">
            <div class="w-full space-y-2">
                <p class="text-sm">Nombre</p>
                <input type="text" name="" value="{{ old('') }}" class="text-sm  w-full rounded-md border-lightGray border-2 px-[2%] py-[3%]" placeholder="Nombre">
                @error('')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="w-full space-y-2">
                <p class="text-sm">Correo Electronico</p>
                <input type="text" name="" value="{{old('')}}" class="text-sm  w-full rounded-md border-lightGray border-2 px-[2%] py-[3%]" placeholder="nombre@ejemplo.com">
                @error('')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="w-full space-y-2">
                <p class="text-sm space-y-2">Numero Celular</p>
                <input type="text" name="" value="{{old('')}}" class="text-sm  w-full rounded-md border-lightGray border-2 px-[2%] py-[3%]" placeholder="Numero celular">
                @error('')
                <p class="text-[#ff0000] text-sm">
                    {{ $message }}
                </p>
                @enderror
            </div>
            <div class="w-full space-y-2">
                <p class="text-sm">Grado academico</p>
                <input type="text" name="" value="{{old('')}}" class="text-sm  w-full rounded-md border-lightGray border-2 px-[2%] py-[3%]" placeholder="Grado academico">
                @error('')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="w-full space-y-2">
                <p class="text-sm">Departamento</p>
                <input type="text" name="" value="{{old('')}}" class="text-sm  w-full rounded-md border-lightGray border-2 px-[2%] py-[3%]" placeholder="Departamento">
                @error('')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
        </div>
        <button type="submit" class="p-[1%] bg-primaryColor lg:w-[40vw] rounded-md text-white">Añadir asesor</button>
    </form>
</div>
@endsection('contenido')