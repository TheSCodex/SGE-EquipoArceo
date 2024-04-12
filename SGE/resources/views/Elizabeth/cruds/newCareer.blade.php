@extends('templates/authTemplate')
@section('contenido')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="w-full h-fit flex justify-center md:justify-start px-[8%]">
   
    
</div>
<div class="flex mt-[2%] px-[12%] ">
    <h1 class="text-3xl font-bold pt-[4%]">Crear carrera</h1>
  </div>
<div class="w-full md:px-[7em] md:mt-[2em] h-screen flex bg-white">

    <form action="{{url('panel-careers')}}" method="POST" class="flex flex-col font-montserrat space-y-5 w-full mt-4 md:mt-0 md:w-full ">
            
            @csrf
        <div class="w-full flex flex-col space-y-2 ">

            <div class="flex md:flex-row flex-col items-center md:items-start justify-around">
                <div class="space-y-2">
                    <p class="text-sm">Carrera</p>
                    <input type="text" name="name" value="{{ old('name') }}" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Nombre">
                    @error('name')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror  
                </div>
                <div class=" space-y-2">
                    <p class="text-sm">Academia</p>
                    <select name="academy_id" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]">
                        <option value="" disabled @if(old('academy_id') == null) selected @endif>Selecciona una academia</option>
                        @foreach($academies as $academy)
                        <option value="{{ $academy->id }}" @if(old('academy_id') == $academy->id) selected @endif>{{ $academy->name }}</option>
                        @endforeach
                    </select>
                    
                    @error('academy_id')
                        <p class="text-[#ff0000] text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>

    
            <div class="mx-auto mt-10">
                <button type="submit" class="text-sm rounded-md px-4 py-3 w-[20em] sm:w-[60vw] text-white md:w-[30vw] bg-primaryColor">Añadir carrera</button>
            </div>                
            
            </form>




@endsection('contenido')