@extends('templates.authTemplate')

@section('titulo')
   Editar asesor
@endsection
@section('contenido')

{{-- <p>{{ $advisor->user_id }}</p>
<p>{{ $advisor->career_id }}</p>
<p>{{ $advisor->max_advisors }}</p>
<p>{{ $advisor->quantity_advised }}</p> --}}


    <section class="w-full h-full mt-20 mb-96">
        <h1 class="text-center text-2xl font-bold">Editar asesor academico</h1>
        <div class="w-full flex justify-center items-center justify-items-center">
            <form action="{{ route('asesores.update', $advisor->id) }}" method="POST" class="w-1/4 max-md:w-1/2 max-lg:w-1/2 max-sm:w-full max-sm:mr-3 max-sm:ml-3">
                @csrf
                @method('PUT')
                <div class=" mt-2">
                    <label class="block">Nombre asesor: </label>
                    <p class="rounded-lg border-2 p-2 w-full border-[#00AB84]" readonly>{{$user->name}}</p>
                </div>
                <div class=" mt-2">
                    <label  class="block">Carrera: </label>
                    <p class="rounded-lg border-2 p-2 w-full border-[#00AB84]" readonly>{{$career->name}}</p>
                </div>
                <div class=" mt-2">
                    <label for="max_advisors" class="block">Máximos asesorados:</label>
                    <input type="number" id="max_advisors" class="rounded-lg border-1 w-full border-[#00AB84]" name="max_advisors"
                        value="{{ old('max_advisors',$advisor->max_advisors) }}" required>
                    @error('max_advisors')
                        <p class="text-rose-700  text-center">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex justify-between mt-2">
                    <button type="submit" class="bg-[#00AB84]  my-3 rounded-lg py-2 px-4 text-white">Actualizar</button>
                    <a href="lista-asesores" class="bg-[#c5c5c5] text-gray-700 py-1 px-4 rounded-lg my-3 flex items-center text-center">Cancelar</a>
                </div>
            </form>
        </div>
    </section>
@endsection
