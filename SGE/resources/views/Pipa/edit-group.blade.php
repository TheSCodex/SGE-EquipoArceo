@extends('templates/authTemplate')
@section('contenido')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="w-full md:px-[7em] md:mt-[2em] h-fit flex bg-white sm:h-screen mb-8">
    <form action="{{ url('panel-groups/' . $group->id) }}" method="POST" 
        class="min-h-screen flex flex-col font-montserrat space-y-5 w-full mt-4 md:mt-0 md:w-full ">
        @csrf
        @method('PUT')
        <div class="w-full h-fit flex justify-center md:justify-start md:px-20">
            <h1 class="text-3xl font-bold">Editar grupo</h1>
        </div>
        @if(session('error'))
        <script>
            Swal.fire({
                title: '¡Error!',
                text: '{{ session("error") }}',
                icon: 'error'
            });
        </script>
        @endif

        <div class="w-full flex flex-col space-y-2 ">
            <div class="flex md:flex-row flex-col items-center md:items-start justify-around">
                <div class="space-y-2">
                    <p class="text-sm">Nombre</p>
                    <input type="text" name="name" value="{{ $group->name }}" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Nombre">
                    
                    @error('name')
                        <p class="text-[#ff0000] text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class=" space-y-2">
                    <p class="text-sm">Carrera</p>
                    <select name="career_id" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]">
                        <option disabled selected>Seleccionar una carrera</option>
                        @foreach($careers as $career)
                            @if($career->name !="Sin especialidad"){
                                <option 
                                {{ $oldCareer->id == $career->id ? 'selected' : '' }}

                                value="{{ $career->id }}">{{ $career->name }}
                            
                                </option>
                            }
                            @endif
                        @endforeach
                    </select>                    @error('career_id')
                        <p class="text-[#ff0000] text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>
            <div class="p-5 flex justify-center">
                <button type="submit" class=" p-2 self-center bg-primaryColor w-[17.5em] md:w-[30rem] rounded-md text-white hover:bg-darkgreen" id="submitBtn">Editar grupo</button>
            </div>
    </form>
</div>

@endsection('contenido')
