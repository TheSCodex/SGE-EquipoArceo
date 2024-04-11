@extends('templates/authTemplate')
@section('contenido')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="w-full h-fit flex justify-center md:justify-start px-[8%]">
   
    
</div>
<div class="flex mt-[2%] px-[12%] ">
    <h1 class="text-3xl font-bold pt-[4%]">Crear división</h1>
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
                <div class="space-y-2">
                    <p class="text-sm">Iniciales de la division</p>
                    <input type="text" name="initials" value="{{ old('initials') }}" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Iniciales">
                    @error('initials')
                        <p class="text-[#ff0000] text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
   
               
                
            </div>
            <div class="flex md:flex-row flex-col items-center md:items-start justify-around">
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
            </div>

 
    <div class="mx-auto mt-10">
        <button type="submit" class="text-sm rounded-md px-4 py-3 w-[20em] sm:w-[60vw] text-white md:w-[77vw] bg-primaryColor">Añadir división</button>
    </div>                
         
    </form>
    <div class="mx-auto">
        <a href="/panel-divisions" type="submit" class="text-sm text-center rounded-md px-4 py-3 w-[20em] sm:w-[60vw] text-white md:w-[77vw] bg-lightGray" >Cancelar</a>
    </div>
    
</div>



@endsection('contenido')