@extends('templates.authTemplate')

@section('titulo')
   Crear asesor
@endsection
@section('contenido')
    <section class="w-full h-full mt-20 mb-96">
        <h1 class="text-center text-2xl font-bold">Crear asesor academico</h1>
        <div class="w-full flex justify-center items-center justify-items-center">
            <form action="{{ route('asesores.create') }}" method="POST" class="w-1/4 max-md:w-1/2 max-lg:w-1/2 max-sm:w-full max-sm:mr-3 max-sm:ml-3">
                @csrf
                <div class=" mt-2">
                    <label for="user_id" class="block">Nombre asesor: </label>
                    <select name="user_id" id="user_id" class="rounded-lg border-1 w-full border-[#00AB84]">
                        @foreach ($advisors as $a)    
                        <option value={{$a->id}}>{{$a->name}}</option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <p class="text-rose-700 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <div class=" mt-2">
                    <label for="career_id" class="block">Carrera: </label>
                    <select name="career_id" id="career_id" class="rounded-lg border-1 w-full border-[#00AB84]">
                        @foreach ($career as $c)    
                        <option value={{$c->id}}>{{$c->name}}</option>
                        @endforeach
                    </select>
                    @error('career_id')
                        <p class="text-rose-700  text-center">{{ $message }}</p>
                    @enderror
                </div>
                <div class=" mt-2">
                    <label for="max_advisors" class="block">Máximos asesorados:</label>
                    <input type="number" id="max_advisors" class="rounded-lg border-1 w-full border-[#00AB84]" name="max_advisors"
                        value="" required>
                    @error('max_advisors')
                        <p class="text-rose-700  text-center">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-full flex flex-col space-y-5">
                    <button type="submit" class="bg-[#00AB84]  my-3 rounded-lg py-2 px-4 text-white">Agregar</button>
                    <a href="lista-asesores" class="text-center text-[#888] hover:text-[#444] bg-gray-200 hover:bg-gray-300 font-bold rounded-md py-2">Cancelar</a>
                </div>
            </form>
        </div>
    </section>
@endsection
