@extends('templates/authTemplate')
@section('contenido')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="w-full md:px-[7em] md:mt-[2em] h-fit flex bg-white">
    <form action="{{ route('panel-advisors.update', $advisor->id) }}" method="POST" class="flex flex-col font-montserrat space-y-5 w-full mt-4 md:mt-0 md:w-full">
        @csrf
        @method('PUT')
        <div class="w-full h-fit flex justify-center md:justify-start">
            <h1 class="text-3xl font-bold">Editar Asesor</h1>
        </div>
        <div class="w-full flex flex-col md:flex-row justify-around md:items-start">
            <div class="space-y-2">
                <p class="text-sm">Nombre</p>
                <input type="text" name="name" value="{{ old('name', $advisor->name) }}" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Nombre">
                @error('name')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="space-y-2">
                <p class="text-sm">Correo</p>
                <input type="text" name="email" value="{{ old('email', $advisor->email) }}" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Correo">
                @error('email')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
        </div>
        <div class="w-full flex flex-col md:flex-row justify-around md:items-start">
            <div class="space-y-2">
                <p class="text-sm">Número telefónico</p>
                <input type="text" name="phone" value="{{ old('phone', $advisor->phone) }}" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Teléfono">
                @error('phone')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="space-y-2">
                <p class="text-sm">Posición</p>
                <input type="text" name="position" value="{{ old('position', $advisor->position) }}" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Posición">
                @error('position')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
        </div>
        <button type="submit" class="p-2 self-center bg-primaryColor sm:w-[20rem] md:w-[30rem] rounded-md text-white hover:bg-darkgreen" id="submitBtn">Editar Asesor</button>
    </form>
</div>
@endsection
