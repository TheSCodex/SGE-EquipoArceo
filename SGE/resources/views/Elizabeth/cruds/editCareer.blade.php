@extends('templates/authTemplate')
@section('contenido')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="w-full md:px-[7em] md:mt-[2em] h-screen flex bg-white">
    <form action="{{ url('panel-careers/' . $career->id) }}" method="POST" class="flex flex-col font-montserrat space-y-5 w-full mt-4 md:mt-0 md:w-full ">
        @csrf
        @method('PUT')
        <div class="w-full h-fit flex justify-center md:justify-start">
            <h1 class="text-3xl font-bold">Editar carrera</h1>
        </div>
        <div class="w-full flex flex-col space-y-2 ">
            <div class="flex md:flex-row flex-col items-center md:items-start justify-around">
                <div class="space-y-2">
                    <p class="text-sm">Nombre</p>
                    <input type="text" name="name" value="{{ $career->name }}" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Nombre">
                    @error('name')
                        <p class="text-[#ff0000] text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class=" space-y-2">
                    <p class="text-sm space-y-2">Academia</p>
                    <select name="academy_id" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Academia">
                        <option value="" disabled selected>Selecciona un asistente</option>
                        @foreach($academies as $academy)
                            <option value="{{ $academy->id }}"  @if($academy->id == $career->academy_id) selected @endif>{{ $academy->name }}</option>
                        @endforeach
                    </select>
                    @error('name')
                        <p class="text-[#ff0000] text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>
            <div class="mx-auto mt-10">
                <button type="submit" class="text-sm rounded-md px-4 py-3 w-[20em] sm:w-[60vw] text-white md:w-[77vw] bg-primaryColor">Editar carrera</button>
            </div>                
                 
            </form>
            <div class="mx-auto">
                <a href="/panel-careers" type="submit" class="text-sm text-center rounded-md px-4 py-3 w-[20em] sm:w-[60vw] text-white md:w-[77vw] bg-lightGray" >Cancelar</a>
            </div>
</div>

@endsection('contenido')
