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
                    <input type="text" name="career" value="{{ old('career') }}" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Nombre">
                    @error('career  ')
                        <p class="text-[#ff0000] text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class=" space-y-2">
                    <p class="text-sm">Academia</p>
                    <select name="academy_id" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]">
                        <option value="" disabled selected>Selecciona una academia</option>
                        @foreach($academies as $academy)
                            <option value="{{ $academy->id }}">{{ $academy->name }}</option>
                        @endforeach
                    </select>
                    
                    @error('academy_id')
                        <p class="text-[#ff0000] text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>

            <div class="mx-auto">
                <button type="submit" class="p-2 mt-10 px-20  self-center bg-primaryColor  sm:w-[20rem] md:w-[30rem] rounded-md text-white hover:bg-darkgreen" id="submitBtn">Añadir carrera</button>
            </div>
    </form>
</div>



@endsection('contenido')