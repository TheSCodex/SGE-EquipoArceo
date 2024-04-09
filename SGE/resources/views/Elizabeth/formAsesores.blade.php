
@extends('templates/authTemplate')
@section('contenido')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="w-full md:px-[7em] md:mt-[2em] h-screen flex bg-white">
    <form action="{{ route('panel-advisors.store') }}" method="POST" class="flex flex-col font-montserrat space-y-5 w-full mt-4 md:mt-0 md:w-full">
    
        @method('POST')
        <div class="w-full h-fit flex justify-center md:justify-start">
            <h1 class="text-3xl font-bold">Crear Asesor Empresial</h1>
            @csrf
        </div>
        <div class="w-full flex flex-col space-y-2 ">
            <div class="flex md:flex-row flex-col items-center md:items-start justify-around">
            <div class="space-y-2">
                <p class="text-sm">Nombre</p>
                <input type="text" name="name" value="{{ old('name') }}" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Nombre">
                @error('name')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="space-y-2">
                <p class="text-sm">Correo</p>
                <input type="text" name="email" value="{{ old('email') }}" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Correo">
                @error('email')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
        </div> 
    </div>
        <div class="w-full flex flex-col space-y-2 ">
            <div class="flex md:flex-row flex-col items-center md:items-start justify-around">
            <div class="space-y-2">
                <p class="text-sm">Número telefónico</p>
                <input type="text" name="phone" value="{{ old('phone') }}" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Teléfono">
                @error('phone')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="space-y-2">
                <p class="text-sm">Posición</p>
                <input type="text" name="position" value="{{ old('position') }}" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Posición">
                @error('position')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
        </div>
    </div>
    <div class="flex md:flex-row flex-col items-center md:items-start justify-around">
        <div class="space-y-2">
            <div class="form-group">
                <p class="text-sm">Compañias</p>
                <select class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" id="companie_id" name="companie_id">
                    <option value="">Selecciona una empresa</option>
                    @foreach($companies as $company)
                        <option value="{{ $company->id }}" {{ old('companie_id') == $company->id ? 'selected' : '' }}>
                            {{ $company->name }}
                        </option>
                    @endforeach
                </select>     
                
            </div>
        </div>
    </div>
    <div class="w-full flex flex-col space-y-5">
        <button type="submit" class="p-2 bg-primaryColor w-full  rounded-md text-white">Crear Asesor</button>
        <a  href="/panel-advisors" class="p-2 block text-center  bg-slate-300 w-full  rounded-md text-white">Cancelar</a>
    </div>
    </form>
</div>


@endsection('contenido')
