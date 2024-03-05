@extends('templates.administratorTemplate')
@section('contenido')
<div class="w-full h-screen flex justify-center items-center bg-white">
    <form action="{{url('panel-empresas.store')}}" method="POST" class="flex flex-col font-montserrat mx-10 space-y-5 lg:w-[40vw] sm:w-[60vw]">
        <div class="w-full h-fit flex justify-center mt-4">
            <h1 class="text-3xl font-bold">Editar Carrera y División</h1>
            @csrf
        </div>
        <div class="w-full h-fit flex flex-col space-y-2">
            <div class="w-full space-y-2">
                <p class="text-sm">Carrera</p>
                <input type="text" name="" value="{{ old('') }}" class="text-sm  w-full rounded-md border-lightGray border-2 px-[2%] py-[3%]" placeholder="Carrera">
                @error('')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="w-full space-y-2">
                <p class="text-sm">Director</p>
                <input type="text" name="" value="{{old('')}}" class="text-sm  w-full rounded-md border-lightGray border-2 px-[2%] py-[3%]" placeholder="Director">
                @error('')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="w-full space-y-2">
                <p class="text-sm space-y-2">División</p>
                <input type="text" name="" value="{{old('')}}" class="text-sm  w-full rounded-md border-lightGray border-2 px-[2%] py-[3%]" placeholder="División">
                @error('')
                <p class="text-[#ff0000] text-sm">
                    {{ $message }}
                </p>
                @enderror
            </div>
            <div class="w-full space-y-2">
                <p class="text-sm">Nivel</p>
                <input type="text" name="" value="{{old('')}}" class="text-sm  w-full rounded-md border-lightGray border-2 px-[2%] py-[3%]" placeholder="Nivel">
                @error('')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="w-full space-y-2">
                <p class="text-sm">Clave</p>
                <input type="text" name="" value="{{old('')}}" class="text-sm  w-full rounded-md border-lightGray border-2 px-[2%] py-[3%]" placeholder="Clave">
                @error('')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
        </div>
        <button type="submit" class="p-[1%] bg-primaryColor lg:w-[40vw] rounded-md text-white">Añadir carrera y división</button>
    </form>
</div>
</div>
@endsection('contenido')