@extends('templates/authTemplate')
@section('contenido')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="w-full md:px-[7em] md:mt-[2em] h-fit flex bg-white">
    <form action="{{ url('panel-carrers/' . $career->id) }}" method="POST" class="flex flex-col font-montserrat space-y-5 w-full mt-4 md:mt-0 md:w-full ">
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
                    <p class="text-sm">Division</p>
                    <select name="division_id" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Division">
                        @foreach($divisions as $division)
                            <option value="{{ $division->id }}">{{ $division->name }}</option>
                        @endforeach
                    </select>
                    @error('name')
                        <p >
                            {{ $message }}
                        </p>
                    @enderror
    
                </div>
            </div>
            <div class="flex md:flex-row flex-col items-center md:items-start justify-around">
                <div class=" space-y-2">
                    <p class="text-sm space-y-2">Academia</p>
                    <select name="academy_id" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Academia">
                        @foreach($academies as $academy)
                            <option value="{{ $academy->id }}">{{ $academy->name }}</option>
                        @endforeach
                    </select>
                    @error('name')
                        <p>
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class=" space-y-2">
                    <p class="text-sm">Presidente</p>
                    <select name="academy_id" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Presidente" >
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
                @error('name')
                    <p>
                        {{ $message }}
                    </p>
                @enderror

                </div>
            </div>

            <button type="submit" class="p-2 self-center bg-primaryColor sm:w-[20rem] md:w-[30rem] rounded-md text-white hover:bg-darkgreen" id="submitBtn">Editar carrera</button>

    </form>
</div>

@endsection('contenido')
