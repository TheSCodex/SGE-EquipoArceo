@extends('templates/authTemplate')
@section('contenido')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="w-full h-fit flex justify-center md:justify-start px-[8%]">
    <h1 class="text-3xl font-bold pt-[4%]">Editar academia</h1>
    
</div>

<div class="w-full md:px-[7em] md:mt-[2em] h-screen flex bg-white">

    <form action="{{ url('panel-academies/' . $academy->id) }}" method="POST" class="flex flex-col font-montserrat space-y-5 w-full mt-4 md:mt-0 md:w-full ">
        @csrf
        @method('PUT')
        <div class="w-full flex flex-col space-y-2 ">

            <div class="flex md:flex-row flex-col items-center md:items-start justify-around">
             
                <div class=" space-y-2">
                    <p class="text-sm">Academia</p>
                    <input name="name" value={{ $academy->name }} class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]"
                    placeholder="Academia"/>
                
                    
                    @error('name')
                        <p class="text-[#ff0000] text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="space-y-2">
                    <p class="text-sm">Presidente</p>
                    <select name="president_id" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]">
                        <option value="" disabled selected>Selecciona un presidente</option>
                        @foreach($users as $user)
                        <option value="{{ $user->id }}" @if($user->id == $academy->president_id) selected @endif>{{ $user->name }}</option>
                        @endforeach
                    </select>
                    @error('president_id')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
                </div>
                
            </div>
            <div class="flex md:flex-row flex-col items-center md:items-start justify-around">
           
                <div class=" space-y-2">
                    <p class="text-sm">División</p>
                    <select name="division_id" class="text-sm rounded-md border-lightGray border-2  py-3 w-[20em] md:w-[35em]">
                        <option value="" disabled selected>Selecciona una academia</option>
                        @foreach($divisions as $division)
                            <option value="{{ $division->id }}" @if($division->id == $academy->division_id) selected @endif>{{ $division->name }}</option>
                        @endforeach
                    </select>
                    
                    @error('division_id')
                        <p class="text-[#ff0000] text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class=" space-y-2">
                    <p class="text-sm md:py-2"></p>
                    <p  class="text-sm rounded-md border-white px-4 py-3 w-[20em] md:w-[35em]">
                        
                    </p>
                    
                    @error('director_id')
                        <p class="text-[#ff0000] text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                
            </div>
            
            </div>

            <div class="mx-auto mt-10">
                <button type="submit" class="text-sm rounded-md px-4 py-3 w-[20em] sm:w-[60vw] text-white md:w-[30vw] bg-primaryColor">Editar academia</button>
            </div>
                 
            </form>
  
    </form>
</div>



@endsection('contenido')