@extends('templates/authTemplate')
@section('contenido')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="w-full h-fit flex justify-center md:justify-start px-[8%]">
   
    
</div>
<div class="flex mt-[2%] px-[12%] ">
    <h1 class="text-3xl font-bold pt-[4%]">Crear division</h1>
  </div>
<div class="w-full md:px-[7em] md:mt-[2em] h-screen flex bg-white">

    <form action="{{url('panel-divisions')}}" method="POST" class="flex flex-col font-montserrat space-y-5 w-full mt-4 md:mt-0 md:w-full ">
            
            @csrf
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
                <div class=" space-y-2">
                    <p class="text-sm">Director</p>
                    <select name="director_id" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]">
                        <option value="" disabled selected>Selecciona un director</option>
                        @foreach($directors as $user) 
                        <option value="{{ $user->id }}" 
                            @if(old('director_id') == $user->id) selected @endif>
                            {{ $user->name }}
                        </option>
                        @endforeach
                    </select>
                    
                    @error('director_id')
                        <p class="text-[#ff0000] text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                
            </div>
            <div class="flex md:flex-row flex-col items-center md:items-start justify-around">
                <div class="space-y-2">
                    <p class="text-sm">Asistente del director</p>
                    <select name="directorAsistant_id" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]">
                        <option value="" disabled selected>Selecciona un asistente</option>
                        @foreach($assistants as $user) 
                        <option value="{{ $user->id }}" 
                            @if(old('directorAsistant_id') == $user->id) selected @endif>
                            {{ $user->name }}
                        </option>
                        @endforeach
                    </select>
                    
                    @error('directorAsistant_id')
                        <p class="text-[#ff0000] text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class=" space-y-2">
                    <p class="text-sm md:py-2"></p>
                    <p  class="text-sm rounded-md border-white px-4 py-3 w-[20em] md:w-[35em]">
                        
                    </p>
                    
                  
                </div>
            </div>

            <div class="mx-auto">
                <button type="submit" class="p-2 mt-10 px-20  self-center bg-primaryColor  sm:w-[20rem] md:w-[30rem] rounded-md text-white hover:bg-darkgreen" id="submitBtn">Añadir division</button>
            </div>

    </form>
</div>



@endsection('contenido')