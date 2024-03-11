@extends('templates.administratorTemplate')
@section('contenido')
<div class="w-full md:h-full xl:h-screen flex justify-center xl:items-center bg-white">
    <form action="{{ route('panel-advisors.update', $advisor->id) }}" method="POST" class="flex flex-col font-montserrat mx-10 space-y-5 lg:w-[40vw] sm:w-[60vw]">
        @method('PUT') {{-- Agrega este campo para indicar que es una solicitud PUT --}}
        <div class="w-full h-fit flex justify-start">
            <h1 class="text-3xl font-bold">Editar Asesor</h1>
            @csrf
        </div>
        <div class="w-full h-fit flex flex-col space-y-2">
            <div class="w-full space-y-2">
                <p class="text-sm">Nombre</p>
                <input type="text" name="name" value="{{ old('name', $advisor->name) }}" class="text-sm w-full rounded-md border-lightGray border-2 px-[2%] py-[3%]" placeholder="Nombre">
                @error('name')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
                </div>
            <div class="w-full space-y-2">
                <p class="text-sm space-y-2">Correo</p>
                <input type="text" name="email" value="{{ old('email', $advisor->email) }}" class="text-sm w-full rounded-md border-lightGray border-2 px-[2%] py-[3%]" placeholder="Correo">
                @error('email')
                <p class="text-[#ff0000] text-sm">
                    {{ $message }}
                </p>
                @enderror
            </div>
            <div class="w-full space-y-2">
                <p class="text-sm space-y-2">Numero Celular</p>
                <input type="text" name="phone" value="{{ old('phone', $advisor->phone) }}" class="text-sm w-full rounded-md border-lightGray border-2 px-[2%] py-[3%]" placeholder="Numero celular">
                @error('phone')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
        </div>
        <button type="submit" class="p-[1%] bg-primaryColor lg:w-[40vw] rounded-md text-white">Confirmar edición</button>
    </form>
</div>
@endsection('contenido')
