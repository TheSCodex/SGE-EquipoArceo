@extends('templates.administratorTemplate')
@section('contenido')
<div class="w-full h-screen flex justify-center items-center bg-white">
    <form action="{{ route('panel-advisors.update', $advisor->id) }}" method="POST" class="flex flex-col font-montserrat space-y-5 w-[20rem] md:w-[30rem]">
        @csrf
        @method('PUT')
        <div class="w-full h-fit flex justify-start">
            <h1 class="text-3xl font-bold">Editar Asesor</h1>
        </div>
        <div class="w-full h-fit flex flex-col space-y-2">
            <div class="w-full space-y-2">
                <p class="text-sm">Nombre del Asesor</p>
                <input type="text" name="name" value="{{ old('name', $advisor->name) }}" class="text-sm w-full rounded-md border-lightGray border-2 px-4 py-3" placeholder="Nombre del Asesor">
                @error('name')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="w-full h-fit flex flex-col space-y-2">
                <div class="w-full space-y-2">
                    <p class="text-sm">Correo electronico</p>
                    <input type="text" name="email" value="{{ old('email', $advisor->email) }}" class="text-sm w-full rounded-md border-lightGray border-2 px-4 py-3" placeholder="Correo electronico">
                    @error('email')
                        <p class="text-[#ff0000] text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="w-full h-fit flex flex-col space-y-2">
                    <div class="w-full space-y-2">
                        <p class="text-sm">Numero telefonico</p>
                        <input type="text" name="phone" value="{{ old('phone', $advisor->phone) }}" class="text-sm w-full rounded-md border-lightGray border-2 px-4 py-3" placeholder="Telefono">
                        @error('phone')
                            <p class="text-[#ff0000] text-sm">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="w-full h-fit flex flex-col space-y-2">
                        <div class="w-full space-y-2">
                            <p class="text-sm">Posición</p>
                            <input type="text" name="position" value="{{ old('position', $advisor->position) }}" class="text-sm w-full rounded-md border-lightGray border-2 px-4 py-3" placeholder="Posición">
                            @error('position')
                                <p class="text-[#ff0000] text-sm">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
        </div>
        <button type="submit" class="p-2 bg-primaryColor sm:w-[20rem] md:w-[30rem] rounded-md text-white">Actualizar Asesor</button>
    </form>
</div>
@endsection
